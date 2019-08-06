<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ContactUsController extends Controller
{
	public function list_ContactUs(){
		return view('pages.website.ContactUs');
	}

	public function list_ContactUsPost(Request $request){
		$insert = DB::table('our_contact_us')->insert([
																										'name'=>$request->name,
																										'phone'=>$request->phone,
																										'email'=>$request->email,
																										'message'=>$request->message,
																									]);
		if($insert == 1){
			Session::flash('success','Your Message Have Been Sent Success!');
			return redirect()->back();
		}else{
			Session::flash('error','Please Try Again!');
			return redirect()->back();
		}
		
	}

	public function SubScribePost(Request $request){
		
		// check exist
		$check = DB::table('our_subscribe')->where('email',$request->email)->count();

		if($check > 0){
			// exist
			return response()->json(['status'=>'exist','message'=>'You Are Already Subscribed!']);
		}else{
			// subscribe
			$insert = DB::table('our_subscribe')->insert(['email'=>$request->email]);
			if($insert == 1){
				return response()->json(['status'=>'success','message'=>'You Are Subscribed Success!']);
			}else{
				return response()->json(['status'=>'error','message'=>'Error code 302 Please Try Again!']);
			}
		}
	}
}
