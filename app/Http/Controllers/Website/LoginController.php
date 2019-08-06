<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use Auth;
class LoginController extends Controller
{




     public function authenticate(Request $request)
    {
 
    	$email	       = $request->emaillogin;
    	$password      = $request->passwordlogin;
    	$rememberToken = $request->remember;


    	if($rememberToken='one')
    	{

    		$rememberToken='true';
    	}
    	else
    	{
    		$rememberToken='false';

    	}
    	

    	

    	// now we use the Auth to Authenticate the users Credentials
		// Attempt Login for members
		if (Auth::attempt(['email' => $email, 'password' => $password],$rememberToken)) {

			$msg = array(
				'status'  => 'success',
				'message' => 'Login Successful'
			);
			return response()->json($msg);
		} else {

			$msg = array(
				'status'  => 'error',
				'message' => 'Login Fail !'
			);
			return response()->json($msg);
		}


    }

}