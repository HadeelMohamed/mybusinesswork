<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;   
use Intervention\Image\ImageManagerStatic as Image;

use File;
use Session;
use LaravelLocalization;


class ExhibitionsController extends Controller

{



     public function Exhibition_show(){

      

    return view('pages.admin.exhibitions.details');
  }
// to list all Exhibition in datatable

  public function Exhibition_list(Request $request){
  //dd($request->lang);

$lan_id = DB::table('languages')->where('lang',$request->lang)->first();









        $columns = array( 
                                    0 =>'Name', 
                                    1 =>'Start',
                                    2 =>'End',
                                    3 =>'Active',
                                    4 =>'Status',
                                   
                                   
                    

                        );


  
        $totalData = DB::table('exhibitions')
                     ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')
                     ->where('exhibition_langs.lang_id',$lan_id->id)
                     ->select('exhibitions.id','exhibition_langs.name','exhibitions.start','exhibitions.end','exhibition_langs.lang_id','exhibitions.shown')->count();



            
        $totalFiltered = $totalData; 
        $order_columns=$request->order;
 
       $limit = $request->length;
       $start = $request->start;
       $order = $columns[ $order_columns[0]['column']];

       $dir = $order_columns[0]['dir'];
       $searchall=$request->search;

 
        if(empty($searchall['value']))
        { 
                  
            $Exhibitions = DB::table('exhibitions')
                     ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')
                      ->where('exhibition_langs.lang_id',$lan_id->id)
                          ->select(DB::raw('DATE_FORMAT(exhibitions.start, "%Y-%m-%d  ") as start,DATE_FORMAT(exhibitions.end, "%Y-%m-%d ") as end'),'exhibitions.id','exhibition_langs.name','exhibition_langs.lang_id','exhibitions.shown') ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)->get();



                       
        }
        else {
            $search =$searchall['value']; 

           

          $Exhibitions =   DB::table('exhibitions')
                        ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')
                        ->where('exhibition_langs.lang_id',$lan_id->id)
                        ->where(function ($query) use ($search)  {
                        $query->orWhere('exhibition_langs.name', 'LIKE',"%{$search}%")
                        ->orWhere('exhibitions.shown', 'LIKE',"%{$search}%");
                        })->select(DB::raw('DATE_FORMAT(exhibitions.start, "%Y-%m-%d  ") as start,DATE_FORMAT(exhibitions.end, "%Y-%m-%d ") as end'),'exhibitions.id','exhibition_langs.name','exhibition_langs.lang_id','exhibitions.shown')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();


        

          $totalFiltered=  DB::table('exhibitions')
                        ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')
                        ->where('exhibition_langs.lang_id',$lan_id->id)
                        ->where(function ($query) use ($search)  {
                        $query->orWhere('exhibition_langs.name', 'LIKE',"%{$search}%")
                        ->orWhere('exhibitions.shown', 'LIKE',"%{$search}%");
                        })->select(DB::raw('DATE_FORMAT(exhibitions.start, "%Y-%m-%d  ") as start,DATE_FORMAT(exhibitions.end, "%Y-%m-%d ") as end'),'exhibitions.id','exhibition_langs.name','exhibition_langs.lang_id','exhibitions.shown')
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
          ->count();
               
            


        }

        $data = array();

       
        if(!empty($Exhibitions))
        {
            foreach ($Exhibitions as $Exhibition)
            {
            
              
            
                   $expid = $Exhibition->id;
                   $langid = $Exhibition->lang_id;

                $date_now = date("Y-m-d");
                $nestedData['Exhibition Name'] = $Exhibition->name;
                $nestedData['Start Date'] = $Exhibition->start;
                $nestedData['End Date'] = $Exhibition->end;
                  if($Exhibition->shown == 1)
                {
                  $nestedData['Active'] = '<a class="text-info">Active</a>';
                }

                else
                {
                $nestedData['Active'] = ' <a class="text-danger">Deactive</a>';

                }


                if ($date_now < date('Y-m-d', strtotime($Exhibition->end)))
                 {
                   $nestedData['Status'] =  'Open';
    
                      }

 if ($date_now > date('Y-m-d', strtotime($Exhibition->end)))
                 {
                   $nestedData['Status'] = 'Finished';
    
                      }
if ($date_now < date('Y-m-d', strtotime($Exhibition->start)))
                 {
                   $nestedData['Status'] = 'New';
    
                      }


             // else 
             // {
             //   $nestedData['Status'] = 'Finished';
   
             //         }

                      $query = DB::table('exhibition_langs')->select('languages.id')
                    ->join('languages','languages.id','=','exhibition_langs.lang_id')
                     ->where('exhibition_langs.exhibition_id',$expid)
                     ->pluck('languages.id');
            
         $all_languages  = DB::table('languages')->whereNotIn('id', $query)->get();

if($all_languages->count()==0)
{
   $nestedData['Options'] =$nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                            <a onclick="view_id('.$expid.','.$langid.')" class="dropdown-item waves-light waves-effect btn " data-toggle="modal" >
                                                                                  View 
                                                                                </a>

                                                                             

                                                                          <a onclick="edit_id('.$expid.','.$langid.')" class="dropdown-item waves-light waves-effect btn " data-toggle="modal" >
                                                                                  Edit 
                                                                                </a>

                                                                             <a onclick="get_id('.$expid.','.$langid.')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Exhibition
                                                                                </a>

                                                                              

             
                                                                        </div></div>      

                                ';

}

else
{

   $nestedData['Options'] =$nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                            <a onclick="view_id('.$expid.','.$langid.')" class="dropdown-item waves-light waves-effect btn " data-toggle="modal" >
                                                                                  View 
                                                                                </a>

                                                                              <a href="/Admin/Exhibition_trans/'.$expid.'" class="dropdown-item waves-light waves-effect btn " >
                                                                                  Add Translation
                                                                                </a> 

                                                                          <a onclick="edit_id('.$expid.','.$langid.')" class="dropdown-item waves-light waves-effect btn " data-toggle="modal" >
                                                                                  Edit 
                                                                                </a>

                                                                             <a onclick="get_id('.$expid.','.$langid.')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Exhibition
                                                                                </a>

                                                                              

             
                                                                        </div></div>      

                                ';
}
             
               
              
                

            
                                                                                  
                                                                              

                                                           


                   



         
                $data[] = $nestedData;
            }
        }
          
       
        $json_data = array(
                    "draw"            => intval($request->draw),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered),
                   
                    "data"            => $data   
                    );
        return json_encode($json_data); 
   
  }


   public function   Exhibition_addpaage()
   {
return view('pages.admin.exhibitions.add');
   }
 public function  Exhibition_add(Request $request)

 {
  




  $exhibitionadd = DB::table('exhibitions')
                              ->insertGetId([
                      'cat_id'=>$request->cat_id,  
                      'country_id'=>$request->country_id,

                      'video'=>(isset($request->video)) ? $request->video : '0', 
                      'start'=>date("Y-m-d H:i:s",strtotime($request->start_date)),
                      'end'=>date("Y-m-d H:i:s",strtotime($request->end_date)),
                      'subscribe_exhibitors_limit'=>(isset($request->subscribe_members)) ? $request->subscribe_members : '0',



                      'subscribe_sponsors_limit'=>(isset($request->subscribe_sponsors)) ? $request->subscribe_sponsors : '0',
                      'cost'=>(isset($request->cost)) ? $request->cost : '0',
                      'shown'=>$request->active,
                      'viewers'=>(isset($request->viewers)) ? $request->viewers : '0',




                      'created_by' =>auth()->guard('admin')->user()->id, 

                                            ]);


 

   




 
return \Redirect::route('Exhibition_trans',  $exhibitionadd );


                             // return view('pages.admin.exhibitions.addtranslation',compact('exhibition_data'));

                                // Session::flash('add_success');
                                     // return redirect()->back();
 }


public function Exhibition_delete(Request $request)
{
    $Exhibition = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->exhibition_lang)->first();
$pathToYourFile = public_path('/images/en/exhibitions/med/'.$Exhibition->photo);// get file path from table


if(file_exists($pathToYourFile)) // make sure it exits inside the folder
{
  \File::delete($pathToYourFile);
}


$Exhibition = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->exhibition_lang)->delete();


    $countexp= DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->count();

if($countexp==0)

{
   $ExhibitionDelete = DB::table('exhibitions')->where('id',$request->exhibition_id)->delete();
}
         session::flash('deleted_success');
        return redirect()->back();
}

public function Exhibition_edit(Request $request)

{
 

   $exhibition_data = DB::table('exhibitions')
                     ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->exhibition_lang)->first();
               

   return view('pages.admin.exhibitions.edit',compact('exhibition_data'));
}

public function Exhibition_update(Request $request)

{
 if($request->active=='on')

 {
  $active=1;
 }

 else
 {
  $active=0;
 }

$file=$request->file;

$photo=$request->photo;




$name=preg_replace('/\s+/', '-', strtolower($request->title));







          if ($request->has('file'))
          {
             $filename = $file->getClientOriginalName();


                $path=public_path("/files");
              // notation octale : valeur du mode correcte
                  

                if (!file_exists($path)) {
                  $file->move(public_path("/files/"),$filename);
                }
               
          }
if($request->language_id  !=$request->curr_lang)

{
  $count_duplicated = DB::table('exhibitions')
->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')
->where('exhibition_id',$request->exhibition_id)
->where('lang_id',$request->language_id)
->count();


if($count_duplicated > 0)

{ 
 
$exhibition_data = DB::table('exhibitions')
                     ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)->first();


  session::flash('error','The Name Already Exist');
  Session::flash('alert-class', 'alert-danger');
            return view('pages.admin.exhibitions.edit',compact('exhibition_data'));
}

else
{


   $Exhibitionupdate = DB::table('exhibitions')->where('id',$request->exhibition_id)
                                    ->update([
                      'cat_id'=>$request->category_id,  
                      'country_id'=>$request->country_id, 
                      'video'=>$request->video,
                      'start'=>date("Y-m-d",strtotime($request->start_date)),
                      'end'=>date("Y-m-d",strtotime($request->end_date)),
                      'subscribe_exhibitors_limit'=>$request->subscribe_members, 
                      'subscribe_sponsors_limit'=>(isset($request->subscribe_sponsors)) ? $request->subscribe_sponsors : '0', 

                      'cost'=>$request->cost,
                      'shown'=>$active,
                      'viewers'=> (isset($request->viewers)) ? $request->viewers : '0', 
                      'created_by' =>auth()->guard('admin')->user()->id, 
                                            ]);


                                    $Exhibidetails = DB::table('exhibition_langs')
                              ->insert([

                                    'exhibition_id'=> $request->exhibition_id, 
                                    'lang_id'=>$request->language_id, 
                                    'name'=>$request->title,
                                    'active'=>$active,  
                                    'summary'=>$request->summary,  
                                    'content'=>$request->content,
                                    'photo'=> (isset($photo)) ? $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension() : $request->photoinput,  
                                    'file'=>(isset($file)) ? $file->getClientOriginalName() : $request->fileinput, 
                                    'created_by' => auth()->guard('admin')->user()->id, 
                                    'active'=>  $active,
                                      'key_words'  => (isset($request->key_words)) ? $request->key_words : NULL,


                                            ]);


                          if ($request->has('photo')) {
         



             $input['imagename'] = $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('/images/en/exhibitions/med');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('/images/en/exhibitions/med/');
        $photo->move($destinationPath, $input['imagename']);

           
        }

         session::flash('Update_Sucess','Exhibition Updated Succeflly');
        return redirect()->route('Exhibition_show');


}


}


else
{

    $Exhibitionupdate = DB::table('exhibitions')->where('id',$request->exhibition_id)
                                    ->update([
                      'cat_id'=>$request->category_id,  
                      'country_id'=>$request->country_id, 
                      'video'=>$request->video,
                      'start'=>date("Y-m-d",strtotime($request->start_date)),
                      'end'=>date("Y-m-d",strtotime($request->end_date)),
                      'subscribe_exhibitors_limit'=>$request->subscribe_members, 
                      'subscribe_sponsors_limit'=>(isset($request->subscribe_sponsors)) ? $request->subscribe_sponsors : '0', 

                      'cost'=>$request->cost,
                      'shown'=>$active,
                       'viewers'=> (isset($request->viewers)) ? $request->viewers : '0',
                      'created_by' => auth()->guard('admin')->user()->id, 
                                            ]);


                                    $Exhibidetails = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)
                              ->update([

                                    
                                    'name'=>$request->title,
                                    'active'=>$active,  
                                    'summary'=>$request->summary,  
                                    'content'=>$request->content,
                                    'photo'=> (isset($photo)) ? $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension() : $request->photoinput,  
                                    'file'=>(isset($file)) ? $file->getClientOriginalName() : $request->fileinput, 
                                    'created_by' => auth()->guard('admin')->user()->id, 
                                    'active'=>  $active,
                                      'key_words'  => (isset($request->key_words)) ? $request->key_words : NULL


                                            ]);


                          if ($request->has('photo')) {
         



             $input['imagename'] = $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('/images/en/exhibitions/med');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('/images/en/exhibitions/med/');
        $photo->move($destinationPath, $input['imagename']);

           
        }

         session::flash('Update_Sucess','Exhibition Updated Succeflly');
        return redirect()->route('Exhibition_show');

}
                      

     }  



public function Exhibition_view(Request $request)

{
 

   $exhibition_data = DB::table('exhibitions')
                     ->join('exhibition_langs','exhibition_langs.exhibition_id','=','exhibitions.id')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->exhibition_lang)->first();
            

   return view('pages.admin.exhibitions.view',compact('exhibition_data'));
}


public function Exhibition_trans( $id)

{



   $exhibition_data = DB::table('exhibitions')->where('id',$id)->first();
  

        


   return view('pages.admin.exhibitions.addtranslation',compact('exhibition_data'));
}
public function Exhibition_updatetrnsaltion(Request $request)

{





$file=$request->file;

$photo=$request->photo;




$name=preg_replace('/\s+/', '-', strtolower($request->title));







          if ($request->has('file'))
          {
             $filename = $file->getClientOriginalName();


                $path=public_path("/files");
              // notation octale : valeur du mode correcte
                  

                if (!file_exists($path)) {
                  $file->move(public_path("/files/"),$filename);
                }
               
          }





                                    $Exhibidetails = DB::table('exhibition_langs')
                              ->insert([

                                    'exhibition_id'=> $request->exhibition_id, 
                                    'lang_id'=>$request->language_id, 
                                    'name'=>$request->title,
                                    'active'=>$request->active,  
                                    'summary'=>$request->summary,  
                                    'content'=>$request->content,
                                    'photo'=> (isset($photo)) ? $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension() : NULL,  
                                    'file'=>(isset($file)) ? $file->getClientOriginalName() : NULL, 
                                    'created_by' =>auth()->guard('admin')->user()->id, 
                                    'slug'=>$name,
                                  
                                      'key_words'  => (isset($request->key_words)) ? $request->key_words : NULL,


                                            ]);


                          if ($request->has('photo')) 

                          {
         



             $input['imagename'] = $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('/images/en/exhibitions/med');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('/images/en/exhibitions/med/');
        $photo->move($destinationPath, $input['imagename']);

           
      }


     
return redirect()->back()->with('Update_Sucess', 'Language Added Succeflly');           


}

public function Exhibition_editfirstform(Request $request)

{
 


      $Exhibitionupdate = DB::table('exhibitions')->where('id',$request->exhibition_id)
                                    ->update([
                      'cat_id'=>$request->category_id,  
                      'country_id'=>$request->country_id, 
                      'video'=>$request->video,
                      'start'=>date("Y-m-d H:i:s",strtotime($request->start_date)),
                      'end'=>date("Y-m-d H:i:s",strtotime($request->end_date)),
                      'subscribe_exhibitors_limit'=>$request->subscribe_exhibitors, 
                      'subscribe_sponsors_limit'=>(isset($request->subscribe_sponsors)) ? $request->subscribe_sponsors : '0', 
                      'cost'=>$request->cost,
                      'shown'=>$request->active,
                       'viewers'=> (isset($request->viewers)) ? $request->viewers : '0',
                      'created_by' => auth()->guard('admin')->user()->id, 
                                            ]);


                                    return \Response::json(array('success' => true));


}


public function Exhibition_editseconendform (Request $request)

{


$file=$request->file;

$photo=$request->photo;




$name=preg_replace('/\s+/', '-', strtolower($request->name));



  if ($file !='undefined')
          {
            
             $filename = $file->getClientOriginalName();


                $path=public_path("/files");
              // notation octale : valeur du mode correcte
                  

                if (!file_exists($path)) {
                  $file->move(public_path("/files/"),$filename);
                }
               
          }


  


  $Exhibidetails = DB::table('exhibition_langs')->where('exhibition_id',$request->exhibition_id)->where('lang_id',$request->language_id)
                              ->update([

                                    
                                    'name'=>$request->name,
                                    'active'=>$request->active,  
                                    'summary'=>$request->summary,  
                                    'content'=>$request->content,
                                    'photo'=> ($photo !='undefined') ? $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension() : $request->photoinput,  
                                    'file'=>($file !='undefined') ? $file->getClientOriginalName() : $request->fileinput, 
                                    'created_by' => auth()->guard('admin')->user()->id, 
                                    'slug' =>$name, 
                                    
                                      'key_words'  => (isset($request->meta_keywords)) ? $request->meta_keywords : NULL


                                            ]);


                          if ($photo !='undefined') {
        

             $input['imagename'] = $name.'-'.$request->exhibition_id.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('/images/en/exhibitions/med');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('/images/en/exhibitions/med/');
        $photo->move($destinationPath, $input['imagename']);

           
        }


        return \Response::json(array('success' => true));


  }


  public function localise($locale)
{
    if(in_array($locale, ['en', 'fr', 'ar','tr'])) {

        localization()->setLocale($locale);

        // Set order language
        if($this->stores->orders()->hasOrder())
        {
            $this->stores->updateOrderDetails([
                'language'  => $locale
            ]);
        }
    }

    $url = \Localization::getNonLocalizedURL(\URL::previous());
    return redirect($url);
}

}