<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SubscribersController extends Controller
{
  public function CampaginSubcribers(Request $request){
  	if ($request->isMethod('post'))
    {
    	// check exist
    	$check = DB::table('campaign_subscribe')->where('email',$request->campagin_email)->count();
    	if($check > 0){
    		return response()->json(['status' => 'exist','message'=>'You Are Already Exist!', 200, [], JSON_UNESCAPED_UNICODE]);
    	}
    	
    	$ip = $request->ip();
    	// our_messages
    	$CampaginSubcribersInsert = DB::table('campaign_subscribe')->insert([
										    																										'email'=>$request->campagin_email,
										    																										'ip_address'=>$ip
										    																									]);
    	if($CampaginSubcribersInsert == 1){
    		return response()->json(['status' => 'success','message'=>'message was sent success!', 200, [], JSON_UNESCAPED_UNICODE]);
    	}else{
    		return response()->json(['status' => 'error','message'=>'try again!', 200, [], JSON_UNESCAPED_UNICODE]);
    	}
  	}else{
  	}
	}
}