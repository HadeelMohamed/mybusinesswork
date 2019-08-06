<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
Use App\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller

{

	        public function store(Request $request)
    {
       
       
      $user=User::create([
             'name' => $request->firstname,
            'email' => $request->email,
            'exh_slug_session' =>$request->exh_slug_session,
            'password' => Hash::make($request->password),
            'shown' => 1,
            'type' => 2,
            'credit' => 60,
        ]);
      auth()->login($user);
dd('return');
              return redirect()->to('/');

    }
}
