<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;   
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use File;
use Session;
use LaravelLocalization;

class ExhibitionsController extends Controller
{
  public function get_exhibition_analytics(){
    session()->forget('exhibition_id');
  	$all_exhibitions = DB::select("SELECT exhibitions.id,
                exhibition_langs.name,
					       exhibitions.start,
					       exhibitions.end,
					       exhibitions.sub_scribe_limit,
					       exhibitions.shown
							FROM exhibition_langs exhibition_langs
					     INNER JOIN exhibitions exhibitions
					        ON (exhibition_langs.exhibition_id = exhibitions.id)");
  	return view('pages.admin.exhibitions.analytics')
  				->with('all_exhibitions',$all_exhibitions);
  }

  public function Exhibition_list(){
      session()->forget('exhibition_id');
  	$all_exhibitions = DB::select("SELECT exhibitions.id,
                exhibition_langs.name,
					       exhibitions.start,
					       exhibitions.end,
					       exhibitions.sub_scribe_limit,
                 exhibition_langs.lang_id,
					       exhibitions.shown
							FROM exhibition_langs exhibition_langs
					     INNER JOIN exhibitions exhibitions
					        ON (exhibition_langs.exhibition_id = exhibitions.id)
                  where(exhibition_langs.lang_id = 1)");
  	return view('pages.admin.exhibitions.details')
  				->with('all_exhibitions',$all_exhibitions);
  }



    public function Exhibition_view(Request $request){
      $all_countries = DB::table('countries')->select('id','code','name','active')->get();
      $all_languages = DB::table('languages')->get();
      $all_cities = DB::table('cities')->get();
      $all_categories = DB::select('SELECT categories.id,
       categories.name,
       languages.name AS lang_name,
       categories.active
FROM categories categories
     INNER JOIN languages languages
        ON (categories.lang_id = languages.id)');

      $exhibition_data = DB::table('exhibitions')->where('id',$request->exhibition_id)->first();
      $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->first();
      $curr_lang = DB::table('languages')->where('id',$exhibition_trans->lang_id)->first();

      return view('pages.admin.exhibitions.view')
      ->with('all_countries',$all_countries)
      ->with('all_categories',$all_categories)
      ->with('all_languages',$all_languages)
      ->with('all_cities',$all_cities)
      ->with('exhibition_id',$request->exhibition_id)
      ->with('exhibition_data',$exhibition_data)
      ->with('exhibition_trans',$exhibition_trans)
      ->with('curr_lang',$curr_lang->lang);
    }


    public function Exhibition_add(){
    	$all_countries = DB::table('countries')->select('id','code','name','active')->get();
    	$all_languages = DB::table('languages')->where('id',1)->get();
      $all_cities = DB::table('cities')->get();
    	$all_categories = DB::select('SELECT categories.id,
       categories.name,
       languages.name AS lang_name,
       categories.active
FROM categories categories
     INNER JOIN languages languages
        ON (categories.lang_id = languages.id)
        WHERE (languages.id = 1)');

      return view('pages.admin.exhibitions.add')
    				->with('all_countries',$all_countries)
    				->with('all_categories',$all_categories)
    				->with('all_languages',$all_languages)
                    ->with('all_cities',$all_cities);
    }


    public function Exhibition_store(Request $request){
      $validatedData = $request->validate([
          'category_id' => 'required',
          'country_id' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'companies_required' => 'required',
          'cost' => 'required',
          'photo' => 'mimes:jpeg,bmp,png',
          'file' => 'mimes:pdf,doc,ppt,xls,docx,pptx,xlsx,rar,zip,txt|max:1000',
          'title' => 'required|string',
          'language_id'=>'required'
      ]);

      //check_duplicate
      $count_duplicated = DB::table('exhibition_langs')->where('name',$request->title)->count();
      if($count_duplicated > 0){
          session::flash('error','The Name Already Exist');
          return redirect()->back();
      }else{
        //create main exhibition
        if($request->active){
            $exhibition_id = DB::table('exhibitions')
                                ->insertGetId([
                                                'cat_id'=>$request->category_id,
                                                'country_id'=>$request->country_id,
                                                'cost'=>$request->cost,
                                                'video'=>$request->video,
                                                'start'=>$request->start_date,
                                                'end'=>$request->end_date,
                                                'sub_scribe_limit'=>$request->companies_required,
                                                'shown'=>1,
                                                'created_by'=> Auth::user()->id
                                            ]);
            
        }else{
          $exhibition_id = DB::table('exhibitions')
                              ->insertGetId([
                                              'cat_id'=>$request->category_id,
                                              'country_id'=>$request->country_id,
                                              'cost'=>$request->cost,
                                              'video'=>$request->video,
                                              'start'=>$request->start_date,
                                              'end'=>$request->end_date,
                                              'sub_scribe_limit'=>$request->companies_required,
                                              'shown'=>0,
                                              'created_by'=> Auth::user()->id
                                            ]);

        }

        $lang = DB::table('languages')->where('id',$request->language_id)->first();
        //get id from db
        $slug_meta_keywords = str_replace(' ','-',$request->meta_keywords);
        $slug_title = str_replace(' ','-',$request->title);

        // create folder and upload img db and files thumbnail
        $path_images = public_path().'/'.$lang->lang.'/images';
        // $path_images_raw = public_path().'/'.$lang->lang.'/images/raw';
        $path_images_raw = public_path().'/raw';
        $path_images_thumb = public_path().'/'.$lang->lang.'/images/thumb';
        $path_images_med = public_path().'/'.$lang->lang.'/images/med';
        $path_images_larg = public_path().'/'.$lang->lang.'/images/larg';

        $path_files = public_path().'/'.$lang->lang.'/files';

        if(!file_exists( $lang->lang.'/images' )){
          mkdir($path_images, 0777, true);
          File::makeDirectory($path_images, $mode = 0777, true, true);
        }

        if(!file_exists( '/raw' )){
          mkdir($path_images_raw, 0777, true);
          File::makeDirectory($path_images_raw, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/thumb' )){
          mkdir($path_images_thumb, 0777, true);
          File::makeDirectory($path_images_thumb, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/med' )){
          mkdir($path_images_med, 0777, true);
          File::makeDirectory($path_images_med, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/larg' )){
          mkdir($path_images_larg, 0777, true);
          File::makeDirectory($path_images_larg, $mode = 0777, true, true);
        }


        if(!file_exists( $lang->lang.'/files' )){
          mkdir($path_files, 0777, true);
          File::makeDirectory($path_files, $mode = 0777, true, true);
        }

            

        /******************** have photo *******************************************************/
        if(Input::hasFile('photo'))
        {

          $photo = Input::file('photo');
          $ext = Input::file('photo')->getClientOriginalExtension();
          // $photo->move($path_images_raw,$slug_title.'.'.$ext);
          $photo->move($path_images_raw,$exhibition_id.'.'.$ext);
          // thumbnail
          $photo = Image::make($path_images_raw.'/'.$exhibition_id.'.'.$ext);
          $photo->resize(50, 50);
          $photo->save($lang->lang.'/images/thumb/'.$slug_title.'.'.$ext);

          $photo = Image::make($path_images_raw.'/'.$exhibition_id.'.'.$ext);
          $photo->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          $photo->save($lang->lang.'/images/med/'.$slug_title.'.'.$ext);

          $photo = Image::make($path_images_raw.'/'.$exhibition_id.'.'.$ext);
          $photo->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
          });
          $photo->save($lang->lang.'/images/larg/'.$slug_title.'.'.$ext);

          /**************** have a file in photo case ***************************************************/
          if(Input::hasFile('file'))
          {
            $file_ext = Input::file('file')->getClientOriginalExtension();
            $target_dir = $lang->lang.'/files/';
            //$slug_title_name = str_replace(" ","-",basename($_FILES["file"]["name"]));
            $slug_name = str_replace(" ","-",$slug_title.'.'.$file_ext);
            $file_name_slug = $target_dir.$slug_name;
            
            // return dd($file_name_slug);
            // $target_file = $target_dir . basename($_FILES["file"]["name"]);
            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // $target_file_slug = str_slug($target_file,'-');
            // return dd($target_file,$imageFileType,$target_file_slug);
            // $file_slug = str_slug(basename($_FILES["file"]["name"]), '-');
            // $target_file = $target_dir . $file_slug;
            // return dd($file_slug);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_slug)) {
              
            } else {
             
            }
            

            $exhibition_trans = DB::table('exhibition_langs')
                                  ->insertGetId([
                                                  'exhibition_id'=> $exhibition_id,
                                                  'lang_id'=> $request->language_id,
                                                  'name'=> $request->title,
                                                  'photo'=>$slug_title.'.'.$ext,
                                                  'file'=>$file_name_slug,
                                                  'slug'=>$slug_title,
                                                  'key_words'=>$slug_meta_keywords,
                                                  'summary'=>$request->summary ,
                                                  'content'=> $request->content,
                                                  'created_by'=>Auth::user()->id,
                                                ]);
          }else{

              $exhibition_trans = DB::table('exhibition_langs')
                                    ->insertGetId([
                                                    'exhibition_id'=> $exhibition_id,
                                                    'lang_id'=> $request->language_id,
                                                    'name'=> $request->title,
                                                    'photo'=>$slug_title.'.'.$ext,
                                                    //'file'=>$file_name_slug,
                                                    'slug'=>$slug_title,
                                                    'key_words'=>$slug_meta_keywords,
                                                    'summary'=>$request->summary ,
                                                    'content'=> $request->content,
                                                    'created_by'=>Auth::user()->id,
                                                  ]);
            }
            /************************ end have a file in photo case ***************************************************/

            /*********************************** end have photo *******************************************************/

          }else{ // no photo
            /***************************************** have file *******************************************************/
            if(Input::hasFile('file'))
            {
              $file_ext = Input::file('file')->getClientOriginalExtension();
               $target_dir = $lang->lang.'/files/';
                //$slug_name = str_replace(" ","-",basename($_FILES["file"]["name"]));
                $slug_name = str_replace(" ","-",$slug_title.'.'.$file_ext);
                $file_name_slug = $target_dir.$slug_name;
                // return dd($file_name_slug);
                // $target_file = $target_dir . basename($_FILES["file"]["name"]);
                // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // $target_file_slug = str_slug($target_file,'-');
                // return dd($target_file,$imageFileType,$target_file_slug);
                // $file_slug = str_slug(basename($_FILES["file"]["name"]), '-');
                // $target_file = $target_dir . $file_slug;
                // return dd($file_slug);
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_slug)) {
                  
                } else {
                 
                }
              $exhibition_trans = DB::table('exhibition_langs')
                                      ->insertGetId([
                                                      'exhibition_id'=> $exhibition_id,
                                                      'lang_id'=> $request->language_id,
                                                      'name'=> $request->title,
                                                      //'photo'=>$slug.'.'.$ext,
                                                      'file'=>$file_name_slug,
                                                      'slug'=>$slug_title,
                                                      'key_words'=>$request->meta_keywords ,
                                                      'summary'=>$request->summary ,
                                                      'content'=> $request->content,
                                                      'created_by'=>Auth::user()->id,
                                                    ]);
            }else{

              $exhibition_trans = DB::table('exhibition_langs')
                                      ->insertGetId([
                                                      'exhibition_id'=> $exhibition_id,
                                                      'lang_id'=> $request->language_id,
                                                      'name'=> $request->title,
                                                      //'photo'=>$slug.'.'.$ext,
                                                      //'file'=>$file_name_slug,
                                                      'slug'=>$slug_title,
                                                      'key_words'=>$request->meta_keywords ,
                                                      'summary'=>$request->summary ,
                                                      'content'=> $request->content,
                                                      'created_by'=>Auth::user()->id,
                                                    ]);
            }

          }


         


          // $file = Input::file('file');
          // $destinationPath = '/files'; // upload path
          // $name = $file->getClientOriginalName(); // getting original name
          // $extension = $file->getClientOriginalExtension(); // getting fileextension
          // $fileName = $slug . '.' . $extension; // renaming file
          //$file->save($destinationPath.'/'.$fileName); // uploading file to given path
          // $request->file->store('/files/'.$request->file);

          // inserted success
            
            
            

       
            //File::deleteDirectory(public_path($lang->lang.'/images/raw'));
            Session::flash('success','Exhibition Added Success');
            return redirect()->back();
        } // end condition

    }



    public function Exhibition_edit(Request $request){
      $all_countries = DB::table('countries')->select('id','code','name','active')->get();
      $all_languages = DB::table('languages')->get();
      $all_cities = DB::table('cities')->get();
      $all_categories = DB::select('SELECT categories.id,
       categories.name,
       languages.name AS lang_name,
       categories.active
FROM categories categories
     INNER JOIN languages languages
        ON (categories.lang_id = languages.id)');

      $exhibition_data = DB::table('exhibitions')->where('id',$request->exhibition_id)->first();
      $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->first();
      $curr_lang = DB::table('languages')->where('id',$exhibition_trans->lang_id)->first();

      return view('pages.admin.exhibitions.edit')
      ->with('all_countries',$all_countries)
      ->with('all_categories',$all_categories)
      ->with('all_languages',$all_languages)
      ->with('all_cities',$all_cities)
      ->with('exhibition_id',$request->exhibition_id)
      ->with('exhibition_data',$exhibition_data)
      ->with('exhibition_trans',$exhibition_trans)
      ->with('curr_lang',$curr_lang->lang);
    }


    public function Exhibition_update(Request $request){

      $validatedData = $request->validate([
        'category_id' => 'required',
        'country_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'companies_required' => 'required',
        'cost' => 'required',
        'photo' => 'mimes:jpeg,bmp,png',
        'file' => 'mimes:pdf,doc,ppt,xls,docx,pptx,xlsx,rar,zip,txt|max:1000',
        'title' => 'required|string'
        
      ]);

      // check language is null ?
      if(is_null($request->language_id)){
        
          $all_countries = DB::table('countries')->select('id','code','name','active')->get();
          $all_languages = DB::table('languages')->get();
          $all_cities = DB::table('cities')->get();
          $all_categories = DB::select('SELECT categories.id,
       categories.name,
       languages.name AS lang_name,
       categories.active
FROM categories categories
     INNER JOIN languages languages
        ON (categories.lang_id = languages.id)');

          $exhibition_data = DB::table('exhibitions')->where('id',$request->exhibition_id)->first();
          $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->first();
          $curr_lang = DB::table('languages')->where('id',$exhibition_trans->lang_id)->first();
          
          Session::flash('language_required');
          // session::flash('error','The Name Already Exist');
          
          
          return view('pages.admin.exhibitions.edit')
          ->with('all_countries',$all_countries)
          ->with('all_categories',$all_categories)
          ->with('all_languages',$all_languages)
          ->with('all_cities',$all_cities)
          ->with('exhibition_id',$request->exhibition_id)
          ->with('exhibition_data',$exhibition_data)
          ->with('exhibition_trans',$exhibition_trans)
          ->with('curr_lang',$curr_lang->lang);
          // return redirect()->route('Exhibition_list');
          }
          
      //check_duplicate
      $count_duplicated = DB::table('exhibition_langs')
                                ->where('exhibition_id','!=',$request->exhibition_id)
                                ->where('name','=',$request->title)
                                // ->where('lang_id',$request->language_id)
                                ->count();

      if($count_duplicated > 0){
          
            $all_countries = DB::table('countries')->select('id','code','name','active')->get();
            $all_languages = DB::table('languages')->get();
            $all_cities = DB::table('cities')->get();
            $all_categories = DB::select('SELECT categories.id,
       categories.name,
       languages.name AS lang_name,
       categories.active
FROM categories categories
     INNER JOIN languages languages
        ON (categories.lang_id = languages.id)');

            $exhibition_data = DB::table('exhibitions')->where('id',$request->exhibition_id)->first();
            $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->first();
            $curr_lang = DB::table('languages')->where('id',$exhibition_trans->lang_id)->first();
            
              session::flash('error','The Name Already Exist');
            
            
            return view('pages.admin.exhibitions.edit')
            ->with('all_countries',$all_countries)
            ->with('all_categories',$all_categories)
            ->with('all_languages',$all_languages)
            ->with('all_cities',$all_cities)
            ->with('exhibition_id',$request->exhibition_id)
            ->with('exhibition_data',$exhibition_data)
            ->with('exhibition_trans',$exhibition_trans)
            ->with('curr_lang',$curr_lang->lang);

      }else{

        //create main exhibition
        if($request->active){
          
            $exhibition_updated_case = DB::table('exhibitions')->where('id',$request->exhibition_id)
                                ->update([
                                          'cat_id'=>$request->category_id,
                                          'country_id'=>$request->country_id,
                                          'cost'=>$request->cost,
                                          'video'=>$request->video,
                                          'start'=>$request->start_date,
                                          'end'=>$request->end_date,
                                          'sub_scribe_limit'=>$request->companies_required,
                                          'shown'=>1,
                                          'created_by'=> Auth::user()->id
                                        ]);
            
        }else{
          
          $exhibition_updated_case = DB::table('exhibitions')->where('id',$request->exhibition_id)
                              ->update([
                                              'cat_id'=>$request->category_id,
                                              'country_id'=>$request->country_id,
                                              'cost'=>$request->cost,
                                              'video'=>$request->video,
                                              'start'=>$request->start_date,
                                              'end'=>$request->end_date,
                                              'sub_scribe_limit'=>$request->companies_required,
                                              'shown'=>0,
                                              'created_by'=> Auth::user()->id
                                            ]);
        }

        $lang = DB::table('languages')->where('id',$request->language_id)->first();
        //get id from db
        $slug_meta_keywords = str_replace(' ','-',$request->meta_keywords);
        $slug_title = str_replace(' ','-',$request->title);

        // create folder and upload img db and files thumbnail
        $path_images = public_path().'/'.$lang->lang.'/images';
        $path_images_raw = public_path().'/'.$lang->lang.'/images/raw';
        $path_images_thumb = public_path().'/'.$lang->lang.'/images/thumb';
        $path_images_med = public_path().'/'.$lang->lang.'/images/med';
        $path_images_larg = public_path().'/'.$lang->lang.'/images/larg';

        $path_files = public_path().'/'.$lang->lang.'/files';

        if(!file_exists( $lang->lang.'/images' )){
          mkdir($path_images, 0777, true);
          File::makeDirectory($path_images, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/raw' )){
          mkdir($path_images_raw, 0777, true);
          File::makeDirectory($path_images_raw, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/thumb' )){
          mkdir($path_images_thumb, 0777, true);
          File::makeDirectory($path_images_thumb, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/med' )){
          mkdir($path_images_med, 0777, true);
          File::makeDirectory($path_images_med, $mode = 0777, true, true);
        }

        if(!file_exists( $lang->lang.'/images/larg' )){
          mkdir($path_images_larg, 0777, true);
          File::makeDirectory($path_images_larg, $mode = 0777, true, true);
        }


        if(!file_exists( $lang->lang.'/files' )){
          mkdir($path_files, 0777, true);
          File::makeDirectory($path_files, $mode = 0777, true, true);
        }

        
        /******************** have photo *******************************************************/
        if(Input::hasFile('photo'))
        {
          $photo = Input::file('photo');
          $ext = Input::file('photo')->getClientOriginalExtension();
          $photo->move($lang->lang.'/images/raw/',$slug_title.'.'.$ext);

          // thumbnail
          $photo = Image::make($lang->lang.'/images/raw/'.$slug_title.'.'.$ext);
          $photo->resize(50, 50);
          $photo->save($lang->lang.'/images/thumb/'.$slug_title.'.'.$ext);

          $photo = Image::make($lang->lang.'/images/raw/'.$slug_title.'.'.$ext);
          $photo->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          $photo->save($lang->lang.'/images/med/'.$slug_title.'.'.$ext);

          $photo = Image::make($lang->lang.'/images/raw/'.$slug_title.'.'.$ext);
          $photo->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
          });
          $photo->save($lang->lang.'/images/larg/'.$slug_title.'.'.$ext);

          /**************** have a file in photo case ***************************************************/
          if(Input::hasFile('file'))
          {
            $file_ext = Input::file('file')->getClientOriginalExtension();
            $target_dir = $lang->lang.'/files/';
            //$slug_title_name = str_replace(" ","-",basename($_FILES["file"]["name"]));
            $slug_name = str_replace(" ","-",$slug_title.'.'.$file_ext);
            $file_name_slug = $target_dir.$slug_name;
            
            // return dd($file_name_slug);
            // $target_file = $target_dir . basename($_FILES["file"]["name"]);
            // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // $target_file_slug = str_slug($target_file,'-');
            // return dd($target_file,$imageFileType,$target_file_slug);
            // $file_slug = str_slug(basename($_FILES["file"]["name"]), '-');
            // $target_file = $target_dir . $file_slug;
            // return dd($file_slug);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_slug)) {
              
            } else {
             
            }
            


            $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)
                                  ->update([
                                            'exhibition_id'=> $request->exhibition_id,
                                            'lang_id'=> $request->language_id,
                                            'name'=> $request->title,
                                            'photo'=>$slug_title.'.'.$ext,
                                            'file'=>$file_name_slug,
                                            'slug'=>$slug_title,
                                            'key_words'=>$slug_meta_keywords,
                                            'summary'=>$request->summary ,
                                            'content'=> $request->content,
                                            'created_by'=>Auth::user()->id,
                                          ]);
          }else{

              $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)
                                    ->update([
                                                    'exhibition_id'=> $request->exhibition_id,
                                                    'lang_id'=> $request->language_id,
                                                    'name'=> $request->title,
                                                    'photo'=>$slug_title.'.'.$ext,
                                                    //'file'=>$file_name_slug,
                                                    'slug'=>$slug_title,
                                                    'key_words'=>$slug_meta_keywords,
                                                    'summary'=>$request->summary ,
                                                    'content'=> $request->content,
                                                    'created_by'=>Auth::user()->id,
                                                  ]);
            }
            /************************ end have a file in photo case ***************************************************/

            /*********************************** end have photo *******************************************************/

        }else{ // no photo
            /***************************************** have file *******************************************************/
            if(Input::hasFile('file'))
            {
              $file_ext = Input::file('file')->getClientOriginalExtension();
               $target_dir = $lang->lang.'/files/';
                //$slug_name = str_replace(" ","-",basename($_FILES["file"]["name"]));
                $slug_name = str_replace(" ","-",$slug_title.'.'.$file_ext);
                $file_name_slug = $target_dir.$slug_name;
                // return dd($file_name_slug);
                // $target_file = $target_dir . basename($_FILES["file"]["name"]);
                // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // $target_file_slug = str_slug($target_file,'-');
                // return dd($target_file,$imageFileType,$target_file_slug);
                // $file_slug = str_slug(basename($_FILES["file"]["name"]), '-');
                // $target_file = $target_dir . $file_slug;
                // return dd($file_slug);
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_slug)) {
                  
                } else {
                 
                }
              $exhibition_trans_updated = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)
                                      ->update([
                                                      'exhibition_id'=> $request->exhibition_id,
                                                      'lang_id'=> $request->language_id,
                                                      'name'=> $request->title,
                                                      //'photo'=>$slug.'.'.$ext,
                                                      'file'=>$file_name_slug,
                                                      'slug'=>$slug_title,
                                                      'key_words'=>$request->meta_keywords ,
                                                      'summary'=>$request->summary ,
                                                      'content'=> $request->content,
                                                      'created_by'=>Auth::user()->id,
                                                    ]);
            }else{
              
              $exhibition_trans_updated = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)
                                      ->update([
                                                      'exhibition_id'=> $request->exhibition_id,
                                                      'lang_id'=> $request->language_id,
                                                      'name'=> $request->title,
                                                      //'photo'=>$slug.'.'.$ext,
                                                      //'file'=>$file_name_slug,
                                                      'slug'=>$slug_title,
                                                      'key_words'=>$request->meta_keywords ,
                                                      'summary'=>$request->summary ,
                                                      'content'=> $request->content,
                                                      'created_by'=>Auth::user()->id,
                                                    ]);
            }

          }

         


          // $file = Input::file('file');
          // $destinationPath = '/files'; // upload path
          // $name = $file->getClientOriginalName(); // getting original name
          // $extension = $file->getClientOriginalExtension(); // getting fileextension
          // $fileName = $slug . '.' . $extension; // renaming file
          //$file->save($destinationPath.'/'.$fileName); // uploading file to given path
          // $request->file->store('/files/'.$request->file);

          // inserted success
            
            
            

            //File::deleteDirectory(public_path($lang->lang.'/images/raw'));
            $all_countries = DB::table('countries')->select('id','code','name','active')->get();
            $all_languages = DB::table('languages')->get();
            $all_cities = DB::table('cities')->get();
            $all_categories = DB::select('SELECT categories.id,
       categories.name,
       languages.name AS lang_name,
       categories.active
FROM categories categories
     INNER JOIN languages languages
        ON (categories.lang_id = languages.id)');

            $exhibition_data = DB::table('exhibitions')->where('id',$request->exhibition_id)->first();
            $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->first();
            $curr_lang = DB::table('languages')->where('id',$exhibition_trans->lang_id)->first();
            
              Session::flash('updated_success');
            
            
            return view('pages.admin.exhibitions.edit')
            ->with('all_countries',$all_countries)
            ->with('all_categories',$all_categories)
            ->with('all_languages',$all_languages)
            ->with('all_cities',$all_cities)
            ->with('exhibition_id',$request->exhibition_id)
            ->with('exhibition_data',$exhibition_data)
            ->with('exhibition_trans',$exhibition_trans)
            ->with('curr_lang',$curr_lang->lang);
            
        } // end condition

    }




    public function Exhibition_active(Request $request){
      $get_exhibition_activation = DB::table('exhibitions')->where('id',$request->exhibition_id)->select('shown')->first();

      if($get_exhibition_activation->shown == 0){ // not shown = deactive

        $change = DB::table('exhibitions')->where('id',$request->exhibition_id)->update(['shown'=>1]);
        DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->update(['active'=>1]);
        session::flash('active','Exhibition Now Is Active!');
        return redirect()->route('Exhibition_list');

      }else{

        $change = DB::table('exhibitions')->where('id',$request->exhibition_id)->update(['shown'=>0]);
        DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->update(['active'=>0]);
        session::flash('deactive','Exhibition Now Is Deactive!');
        return redirect()->route('Exhibition_list');

      }

    }



    public function Exhibition_delete(Request $request){
      // check if trans found for current exhibition ?
      $trans_count = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->count();
      if($trans_count > 0){
        // delete all exhibition trans
        $delete_all_exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->delete();

        // delete main exhibition
        $delete_exhibition = DB::table('exhibitions')->where('id',$request->exhibition_id)->delete();
        // delete images and files

        // reset table if not have main exhibition data records
        $exhibition_count = DB::table('exhibitions')->count();
        if($exhibition_count == 0){
          
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
          DB::table('exhibitions')->truncate();
          DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        session::flash('deleted_success');
        return redirect()->back();

      }else{

        // delete main exhibition
        $delete_exhibition = DB::table('exhibitions')->where('id',$request->exhibition_id)->delete();
        // delete images and files
        
        // reset table if not have main exhibition data records
        $exhibition_count = DB::table('exhibitions')->count();
        if($exhibition_count == 0){
          DB::table('exhibitions')->truncate();
        }
        session::flash('deleted_success');
        return redirect()->back();


      }
      

      
    }


    
    
   

    
}

