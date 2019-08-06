<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class CategoriesController extends Controller
{
    // to show category page

     public function  Categories_show(){


  	return view('pages.admin.categories.index');
  }
// to list all category in datatable

public function Categories_all(Request $request)
    { 
    	
      error_reporting(E_ALL);
ini_set('display_errors', '1');
        $columns = array( 
                                    0 =>'Name', 
                                    1 =>'Language',
                                    2 =>'Active',
                                   
                    

                        );
  
        $totalData = DB::table('exh_cat_trans')
                     ->join('languages','languages.id','=','exh_cat_trans.lang_id')
                     ->select('exh_cat_trans.cat_name','exh_cat_trans.active','languages.lang','exh_cat_trans.exh_cat_id','exh_cat_trans.lang_id')->count();

            
        $totalFiltered = $totalData; 
        $order_columns=$request->order;
 
       $limit = $request->length;
       $start = $request->start;
       $order = $columns[ $order_columns[0]['column']];
       $dir = $order_columns[0]['dir'];
       $searchall=$request->search;

   //dd(empty($searchall['value']));
        if(empty($searchall['value']))
        { 
                  
            $Categories =  DB::table('exh_cat_trans')
                     ->join('languages','languages.id','=','exh_cat_trans.lang_id')
                     ->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->select('exh_cat_trans.cat_name','exh_cat_trans.active','languages.lang','exh_cat_trans.exh_cat_id','exh_cat_trans.lang_id')
                         ->get();



                       
        }
        else {
            $search =$searchall['value']; 

            $Categories =   DB::table('exh_cat_trans')
                            ->join('languages','languages.id','=','exh_cat_trans.lang_id')
                            ->orWhere('exh_cat_trans.cat_name', 'LIKE',"%{$search}%")
                            ->orWhere('exh_cat_trans.active', 'LIKE',"%{$search}%")
                            ->orWhere('languages.lang', 'LIKE',"%{$search}%")
                           
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
                           

            $totalFiltered =  DB::table('exh_cat_trans')
                            ->join('languages','languages.id','=','exh_cat_trans.lang_id')
                            ->orWhere('exh_cat_trans.cat_name', 'LIKE',"%{$search}%")
                            ->orWhere('exh_cat_trans.active', 'LIKE',"%{$search}%")
                            ->orWhere('languages.lang', 'LIKE',"%{$search}%")
                           
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                             ->count();


        }

        $data = array();

       
        if(!empty($Categories))
        {
            foreach ($Categories as $Categorie)
            {
            	
               
            
                  $catid = $Categorie->exh_cat_id;
                  $langid = $Categorie->lang_id;
                  $activeno = $Categorie->active;
                   $catname = $Categorie->cat_name;
                  
                $nestedData['Category Name'] = $Categorie->cat_name;
                $nestedData['Language'] = $Categorie->lang;
                if($Categorie->active == 1)
                {
                	$nestedData['Active'] = '<a class="text-info">Active</a>';
                }

                else
                {
                	 $nestedData['Active'] = ' <a class="text-danger">Deactive</a>';

                }
                

            
                                                                                  
                                                                                
                  if($Categorie->active == 1)
                                             {                                 
                                                                                
                $nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                          <a class="dropdown-item waves-light waves-effect btn waves-light" activity-name="'.$catname.'" lang-id="'.$langid.'"  active-id="'.$activeno.'"  catid="'.$catid.'" data-toggle="modal" data-target="#EditModal">Edit</a>

                                                                                     	<a class="dropdown-item waves-light waves-effect btn" onclick="active_id('.$catid.','.$langid.')" href="#">Deactive</a>

                                                                             <a onclick="get_id('.$catid.','.$langid.')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Category
                                                                                </a>

             
                                                                        </div></div>      

                                ';

                                                                               


                                                                            




    
                                                                           }

                                                                           else
                                                                           {

                                                                           	  $nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                                  <a class="dropdown-item waves-light waves-effect btn waves-light" activity-name="'.$catname.'" lang-id="'.$langid.'" active-id="'.$activeno.'"  catid="'.$catid.'" data-toggle="modal" data-target="#EditModal">Edit</a>

                                                                                 
                                                                                  	<a class="dropdown-item waves-light waves-effect btn" onclick="active_id('.$catid.','.$langid.')" href="#">Active</a>
                                                                              
                                                                               
                                                                                 <a onclick="get_id('.$catid.','.$langid.')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Category
                                                                                </a>
                                                                                  
                                                                               
                                                                             

                                                                               </div></div>


                          '


                                                                               ;



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




public function Category_delete(Request $request)
{
	

                        
	$Category_delete = DB::table('exh_cat_trans')->where('exh_cat_id',$request->category_id)->where('lang_id',$request->langcategory_id)->delete();
        session::flash('deleted_success');
        return redirect()->back();
}


     public function Category_active(Request $request){

     
      $get_category_activation = DB::table('exh_cat_trans')->where('exh_cat_id',$request->category_id)->where('lang_id',$request->langcategory_id)->select('active')->first();


      if($get_category_activation->active == 0){ // not active = deactive

        $change =DB::table('exh_cat_trans')->where('exh_cat_id',$request->category_id)->where('lang_id',$request->langcategory_id)->update(['active'=>1]);
       
        session::flash('active','Categoryte Now Is Active!');
        return redirect()->route('Categories_show');

      }else{

        $change =DB::table('exh_cat_trans')->where('exh_cat_id',$request->category_id)->where('lang_id',$request->langcategory_id)->update(['active'=>0]);
       
        session::flash('deactive','Category Now Is Deactive!');
        return redirect()->route('Categories_show');

      }

    }

   public function  Category_add(Request $request){


   	//check category name with active unquie
$checkcategoryname =  DB::table('exh_cat_trans')->where('cat_name',$request->name)->where('lang_id',$request->languages)->count();


 if ( $checkcategoryname >0 )
 
 {
  return  redirect()->back()
    ->with('addmsg','Record is already existed')->withInput($request->all());



 }

 else


{

  //add category 

  $category = DB::table('exh_cat')
                              ->insertGetId([
                                              'active'=>'1',  
                                            ]);

                             

                               $categorydetails = DB::table('exh_cat_trans')
                              ->insert([
                              	'exh_cat_id'=>$category , 
                              	'lang_id'=>$request->languages, 
                                 'cat_name'=>$request->name,
                                 'active'=>$request->active,   
                                            ]);

                            

                                    Session::flash('add_success');
                                     return redirect()->back();
}
   }



   public function  Category_edit(Request $request)
   {

 
$getlang = DB::table('languages')->where('name',$request->languageedit)->first();

// cat exist

// lang exist

// check
$checkcategorylang =  DB::table('exh_cat_trans')
                                            ->where('exh_cat_id',$request->catid)
                                            ->where('lang_id',$getlang->id)
                                            ->count();

$checkcategorynamelangactive =  DB::table('exh_cat_trans')
                                            ->where('exh_cat_id',$request->catid)
                                            ->where('lang_id',$getlang->id)
                                            ->where('cat_name',$request->activityname)
                                            ->where('active',$request->activeedit)
                                            ->count();

$checkcategorynamelang =  DB::table('exh_cat_trans')
                                            ->where('exh_cat_id',$request->catid)
                                            ->where('lang_id',$getlang->id)
                                            ->where('cat_name',$request->activityname)
                                             ->count();


                                        


// dd($checkcategorylang ,$checkcategorynamelang,$checkcategorynamelangactive,$request->catid);  

  if ( $checkcategorylang == 1 && $checkcategorynamelang == 1 && $checkcategorynamelangactive== 1)
 
 { 


  return  redirect()->back()
     ->with('msg','Record ALeady Existed')->withInput($request->all());

 }


  if ( $checkcategorylang == 1 && $checkcategorynamelang == 1 && $checkcategorynamelangactive== 0)
 
 {  
 

  $categoryupdate = DB::table('exh_cat_trans')->where('exh_cat_id',$request->catid)
                                            ->where('lang_id',$getlang->id)
                                            ->where('cat_name',$request->activityname)
                                    ->update([
                                      'cat_name'=>$request->activityname,
    
                                                   'active'=>$request->activeedit,
                                                
                                                  ]);
                                      Session::flash('updated_success');
                                     return redirect()->back();

 }

  if ( $checkcategorylang == 1 && $checkcategorynamelang == 0 && $checkcategorynamelangactive== 0)
 
 {  

 
  $checkcategorylang =  DB::table('exh_cat_trans')
                                            ->where('exh_cat_id',$request->catid)
                                            ->where('lang_id',$getlang->id)
                                            ->count();
         if($checkcategorylang ==1) 

         { 
 
         
           return  redirect()->back()
     ->with('Alreadymsg',$request->catid)->withInput($request->all());

         }    
         else
         {
          
$categoryupdate = DB::table('exh_cat_trans')->where('exh_cat_id',$request->catid)
                                            ->where('lang_id',$getlang->id)
                                           
                                    ->update([
    
                                                   'cat_name'=>$request->activityname,
                                                   'active'=>$request->activeedit,
                                                
                                                  ]);
                                      Session::flash('updated_success');
                                     return redirect()->back();
         }                            
  

 }

  if ( $checkcategorylang == 0 && $checkcategorynamelang == 0 && $checkcategorynamelangactive== 0)
 
 {  
if(is_null($request->catid))
{
 return  redirect()->back()
     ->with('Alreadymsg',$request->catid)->withInput($request->all());
 
}


else
{

  $checkcategorynamelangdelete = 
                               DB::table('exh_cat_trans')
                                            ->where('exh_cat_id',$request->catid)
                                            ->where('cat_name',$request->activityname) ->delete();

                                  
      $categorydetails = DB::table('exh_cat_trans')
                              ->insert([
                                'exh_cat_id'=>$request->catid, 
                                'lang_id'=>$getlang->id, 
                                 'cat_name'=>$request->activityname,
                                 'active'=>$request->activeedit,   
                                            ]);

                              Session::flash('updated_success');
                                     return redirect()->back();

}

                            
                                    

 }
   

   }
  
}
