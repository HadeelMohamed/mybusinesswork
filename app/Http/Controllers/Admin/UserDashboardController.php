<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class UserDashboardController extends Controller
{



public function Logindashboard(Request $request)
    { 




if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
 {


 return redirect()->route('Exhibition_show');
           // dd(auth()->guard('admin')->user());

        }

 

        return \View::make("pages.admin.login")->withErrors(['email' => 'Email or password are wrong.']);
    }


	}