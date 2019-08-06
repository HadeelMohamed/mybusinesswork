<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
Use App\User;

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
}
