<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use App\User;
use App\JobTitleTrans;
class AjaxController extends Controller
{
  // get about page
  public function checkEmailUser( Request $request){



$user=  DB::table('users')->where('email',$request->email)->count();


      if($user <= 0)
      {
          return \Response::json('true');


      }
      else
      {
          return \Response::json('Please enter valid email address');

      }

  }

  public function getjobtitle( Request $request){
$lang_id=\App\Language::where('lang',\Lang::locale())->pluck('id')->first();
  

   $querygetjobtitle=JobTitleTrans::where('lang_id',$lang_id)->where('cat_id',$request->jobcategoryID)->get();
   //dd( $querygetjobtitle->fetch_assoc());
 if(count($querygetjobtitle) >0){ 
       
        foreach($querygetjobtitle as $query){  
            echo '<option value="'.$query->id.'">'.$query->name.'</option>'; 
        } 
    }else{ 
        echo '<option value="">Jobtitle not available</option>'; 
    } 

  }
}
