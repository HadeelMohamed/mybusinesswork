<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
Use App\User;
use Illuminate\Support\Facades\Hash;
Use App\Language;
use App\Code\returnCode;
use App\Nationality;
class RegistrationController extends Controller

{


   public function return_view_profile_setting()
   {
   // dd(count(returnCode::getcodes()));

  
       return view('pages.website.profile_setting');
   }

	        public function store(Request $request)
    {


       $lang_id=Language::where('lang',\Lang::locale())->pluck('id')->first();



      $user=User::create([
             //'name' => $request->firstname,
            'email' => $request->email,
            'exh_slug_session' =>$request->exh_slug_session,
            'password' => Hash::make($request->password),
            'shown' => 1,
            'type' => 2,
            'credit' => 60,
        ]);

      $userdetails=$user->Memberdetails()->create(['user_id'=> $user->id]);
      

     // If you already have a question and want to add a new answer.
$user->memberlang()->create(['lang_id' =>$lang_id,'member_id'=> $userdetails->id,'name'=>$request->firstname]);
      auth()->login($user);

return redirect()->route('profile_setting');
           

    }


}
