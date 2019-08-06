<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class MemberProductCommentPost extends Controller
{
	public function MemberProductCommentPost(Request $request){
		// add comment
		if($request->parent_created == 'null'){
			$insert = DB::table('pro_comments')->insert([
																									
																									'commenter_id'=>$request->commenter_id,
																									'member_id'=>$request->member_id,
																									'pro_id'=>$request->pro_id,
																									'comment'=>$request->comment,
																									'created_by'=>Auth::user()->id,
																								]);
		}else{
			$insert = DB::table('pro_comments')->insert([
																									'parent_created'=>$request->parent_created,
																									'commenter_id'=>$request->commenter_id,
																									'member_id'=>$request->member_id,
																									'pro_id'=>$request->pro_id,
																									'comment'=>$request->comment,
																									'created_by'=>Auth::user()->id,
																								]);
		}
		

		if($insert == 1){
			Session::flash('success','Comment Was Sent Successfully!');
			return redirect()->back();
		}else{
			Session::flash('error','Not success, Please Try Again!');
			return redirect()->back();
		}
	}
}
