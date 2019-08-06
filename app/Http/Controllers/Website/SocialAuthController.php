<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use Socialite;
 use App\User;

class SocialAuthController extends Controller
{

public function redirect($service) 
{


        return Socialite::driver ($service)->redirect();
    }

public function callback($service) {



        $getInfo  = Socialite::with ( $service )->user ();
        $user = $this->createUser($getInfo,$service); 


       
          auth()->login($user); 

   
        return redirect()->to('/Account/Member_Profile');
    } 

     function createUser($getInfo,$service){
//dd($service);
     	if($service=='facebook')
     	{


 $user = User::where('provider_id', $getInfo->id)->first();


 if (!$user ) {
 	
      $user = User::create([
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'type' => 2,
          'shown' => 1,
          'online' => 1,
         'email_verified_at' => date('Y-m-d H:i:s'),
         'provider' => $service,
         'provider_id' => $getInfo->id
     ]);
   }

}
else
{

	 $user = User::where('email',$getInfo->email)->first();
            

          
            if (!$user ) {
 	
      $user = User::create([
         'name'     => $getInfo->name,
         'email'    => $getInfo->email,
         'type' => 2,
          'shown' => 1,
          'online' => 1,
         'email_verified_at' => date('Y-m-d H:i:s'),
         'provider' => $service,
         'provider_id' => $getInfo->id
     ]);
   }
               
            

}
   return $user;
 }

	}