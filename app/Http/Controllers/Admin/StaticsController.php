<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class StaticsController extends Controller
{
   public function index(){

    	if(Auth::user()->type == 1){ // admin
    		// get all statics totals
    		$members = DB::table('users')->where('type',2)->count();
    		$exhibitions = DB::table('exhibitions')->count();
    		// $auctions = DB::table('auctions')->count();
    		// $tenders = DB::table('tenders')->count();
			return view('pages.admin.analytics.analytics')
									->with('members',$members)
									->with('exhibitions',$exhibitions);
									// ->with('auctions',$auctions)
									// ->with('tenders',$tenders);

    	}else{

    		return abort(404);

    	}
    	
    }
}
