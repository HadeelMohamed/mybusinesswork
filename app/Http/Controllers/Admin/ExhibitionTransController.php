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

class ExhibitionTransController extends Controller
{
    public function Exhibition_list_translation(Request $request){
      if ($request->isMethod('post') == false) {
          $all_exhibitions = DB::select("SELECT exhibitions.id,
                              exhibitions.start,
                              exhibitions.end,
                              exhibitions.sub_scribe_limit,
                              exhibition_langs.lang_id,
                              exhibitions.cost,
                              exhibitions.shown,
                              exhibition_langs.name
                              FROM exhibition_langs exhibition_langs
                              INNER JOIN exhibitions exhibitions
                              ON (exhibition_langs.exhibition_id = exhibitions.id)
                              where(exhibition_langs.lang_id = 1)
                                ");

      return view('pages.admin.exhibition_trans.get_add_translations')
                    ->with('all_exhibitions',$all_exhibitions);
      }else{

        $all_exhibitions = DB::select("SELECT exhibitions.id,
                             exhibitions.start,
                             exhibitions.end,
                             exhibitions.sub_scribe_limit,
                             exhibitions.cost,
                             exhibitions.shown,
                             exhibition_langs.name
                             FROM exhibition_langs exhibition_langs
                             INNER JOIN exhibitions exhibitions
                             ON (exhibition_langs.exhibition_id = exhibitions.id)
                             where(exhibition_langs.lang_id = 1)");

      if($request->exhibition_id == null){
        $all_exhibitions_trans = DB::select("SELECT exhibition_langs.exhibition_id,
                                     exhibition_langs.active,
                                     exhibition_langs.content,
                                     exhibition_langs.summary,
                                     exhibition_langs.name AS exhibition_name,
                                     languages.name,
                                     exhibition_langs.lang_id
                              FROM (exhibition_langs exhibition_langs
                                    INNER JOIN languages languages
                                       ON (exhibition_langs.lang_id = languages.id))
                                   INNER JOIN exhibitions exhibitions
                                      ON (exhibition_langs.exhibition_id = exhibitions.id)");
        $selected = 0;
      }else{
        $all_exhibitions_trans = DB::select("SELECT exhibition_langs.exhibition_id,
                                     exhibition_langs.active,
                                     exhibition_langs.content,
                                     exhibition_langs.summary,
                                     exhibition_langs.name AS exhibition_name,
                                     languages.name,
                                     exhibition_langs.lang_id
                              FROM (exhibition_langs exhibition_langs
                                    INNER JOIN languages languages
                                       ON (exhibition_langs.lang_id = languages.id))
                                   INNER JOIN exhibitions exhibitions
                                      ON (exhibition_langs.exhibition_id = exhibitions.id)
                              WHERE (exhibition_langs.exhibition_id = $request->exhibition_id)");
        $selected = $request->exhibition_id;
      }

      return view('pages.admin.exhibition_trans.list_translations_exhibition')
      ->with('all_exhibitions',$all_exhibitions)
      ->with('all_exhibitions_trans',$all_exhibitions_trans)
      ->with('selected',$selected);
      }
      
    }

    


    public function Exhibition_add_translation(Request $request){
      //$all_countries = DB::table('countries')->select('id','code','name','shown')->get();
      //$all_languages = DB::table('languages')->get();
      
        // return session::get('exhibition_id');

      
        $other_languages = DB::select('SELECT id, name FROM languages WHERE id NOT IN (SELECT lang_id FROM exhibition_langs where exhibition_id = '.$request->exhibition_id.')');

      // return dd($other_languages);
      // $other_languages = DB::select('SELECT id, name FROM languages WHERE id NOT IN (SELECT lang_id FROM exhibition_langs where exhibition_id = '.$request->exhibition_id.')');
// return dd($other_languages);
      if(count($other_languages) > 0){
        return view('pages.admin.exhibition_trans.add')
                    //->with('all_languages',$all_languages)
                    ->with('exhibition_id',$request->exhibition_id)
                    ->with('other_languages',$other_languages);
      }else{
        Session::flash('no_language');
        return redirect()->route('Exhibition_list_translation');
      }
      
    }

    public function Exhibition_trans_active(Request $request){
      $get_exhibition_trans_activation = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->lang_id)->select('exhibition_id','lang_id','active')->first();

      if($get_exhibition_trans_activation->active == 0){ // not active = deactive
        $change = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->lang_id)->update(['active'=>1]);
        // return dd('0',$change);
        session::flash('active','Exhibition Now Is Active!');
        return redirect()->route('Exhibition_list_translation');
      }else{
        $change = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->lang_id)->update(['active'=>0]);
        // return dd('1',$change);
        session::flash('deactive','Exhibition Now Is Deactive!');
        return redirect()->route('Exhibition_list_translation');
      }
    }

   public function Exhibition_store_translation(Request $request){
      $validatedData = $request->validate([
          'title' => 'required|string',
          'language_id'=>'required'
      ]);

      //check_duplicate
      $count_duplicated = DB::table('exhibition_langs')->where('name',$request->title)->count();

      if($count_duplicated > 0){
          session::flash('error','The Name Already Exist');
          return redirect()->back();
      }else{

        $lang = DB::table('languages')->where('id',$request->language_id)->first();

        //get id from db
        $slug_meta_keywords = str_replace(' ','-',$request->meta_keywords);
        $slug_title = str_replace(' ','-',$request->title);

        // create folder and upload img db and files thumbnail
        $path_images = public_path().'/'.$lang->lang.'/images';
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

        /******************** get photo and rename to new trans *******************************************************/
        $old_image = DB::table('exhibition_langs')->where('exhibition_id',$request->exh_id)->select('photo')->first();
        
        // if($old_image->photo){
        //   return dd('yes', $old_image);
        // }else{
        //   return dd('no', $old_image);
        // }
        if(Input::hasFile('photo'))
        {

          // $photo = Input::file('photo');
          // $ext = Input::file('photo')->getClientOriginalExtension();
          // $photo->move($lang->lang.'/images/raw/',$slug_title.'.'.$ext);

          // thumbnail
          $photo = Image::make('/raw/'.$request->exh_id.'.'.$ext);
          $photo->resize(50, 50);
          $photo->save($lang->lang.'/images/thumb/'.$slug_title.'.'.$ext);

          $photo = Image::make('/raw/'.$request->exhibition_id.'.'.$ext);
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
            
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_slug)) {
              
            } else {
             
            }
            

            $exhibition_trans = DB::table('exhibition_langs')
                                  ->insertGetId([
                                                  'exhibition_id'=> $request->exh_id,
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
                                                    'exhibition_id'=> $request->exh_id,
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
     
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_name_slug)) {
                  
                } else {
                 
                }
              $exhibition_trans = DB::table('exhibition_langs')
                                      ->insertGetId([
                                                      'exhibition_id'=> $request->exh_id,
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
                                                      'exhibition_id'=> $request->exh_id,
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

            //File::deleteDirectory(public_path($lang->lang.'/images/raw'));
            // Session('exhibition_id_session', $request->exh_id);
            // Session::set('exhibition_id_session', $request->exh_id);
          $request->session()->put('exhibition_id_session',$request->exh_id);
            Session::flash('success','Exhibition Added Success');

            return redirect()->route('Exhibition_list_translation');
        } // end condition

    }


    public function Exhibition_view_translations(Request $request){
      $all_countries = DB::table('countries')->select('id','code','name','shown')->get();
      $all_languages = DB::table('languages')->get();
      $all_cities = DB::table('cities')->get();
      $all_categories = DB::select('SELECT categories.id, category_langs.name, categories.shown
                                        FROM category_langs category_langs
                                             INNER JOIN categories categories
                                                ON (category_langs.cat_id = categories.id)');
      $exhibition_data = DB::table('exhibitions')->where('id',$request->exhibition_id)->first();
      $exhibition_trans = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)->first();
      $curr_lang = DB::table('languages')->where('id',$request->language_id)->first();
      return view('pages.admin.exhibition_trans.view')
      ->with('all_countries',$all_countries)
      ->with('all_categories',$all_categories)
      ->with('all_languages',$all_languages)
      ->with('all_cities',$all_cities)
      ->with('exhibition_id',$request->exhibition_id)
      ->with('exhibition_data',$exhibition_data)
      ->with('exhibition_trans',$exhibition_trans)
      ->with('curr_lang',$curr_lang->lang);
    }

    public function Exhibition_edit_translation(){
      return 'edit page';
    }

    public function Exhibition_update_translation(){
      return 'update page';
    }


}
