<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use Auth;
use Session;
use DB;
use LaravelLocalization;

class CheckerController extends Controller
{
    public function check_redirect()
    {

      if(Auth::user()->type == 1 ) // Admin
      {
 
        return redirect()->route('Authed_Admin_analytics');

      }


      // check have a member ?
      $check = Helper::CheckMemberExistDb(Auth::user()->id);
      if($check > 0){

        $member_slug = DB::table('member_lang')->where('member_id',Auth::user()->id)->select('slug')->get();
        $url = secure_url('/').'/'.$member_slug[0]->slug;
        // set online
        DB::table('users')->where('id',Auth::user()->id)->update(['online'=>1]);
        return redirect($url);
      }

      if(Auth::user()->type == 2 ) // Member OR Company
      {
        // set online
        DB::table('users')->where('id',Auth::user()->id)->update(['online'=>1]);
        return redirect()->route('Authed_Member_Profile');

      }elseif(Auth::user()->email_verified_at == null){
        session()->flush();
        Session::flash('not_activated');
        return redirect('/');

      }else{
        // DB::table('users')->where('id',Auth::user()->id)->update(['online'=>1]);
      	session()->flush();
      	Session::flash('not_activated');
        return redirect('/');
      }
     
  
    }


}
