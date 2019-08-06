<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Helpers\Helper;
use Session;

class OurGuestsMessagesController extends Controller
{
  public function our_messages_ajax_post(Request $request){
  	if ($request->isMethod('post'))
    {
    	$ip = $request->ip();
    	// our_messages
    	$add_message = DB::table('our_messages')->insert([
    																										'name'=>$request->name,
    																										'email'=>$request->email,
    																										'phone'=>$request->phone,
    																										'subject'=>$request->subject,
    																										'message'=>$request->message,
    																										'ip_addrerss'=>$ip
    																									]);
    	if($add_message == 1){
    		return response()->json(['status' => 'success','message'=>'message was sent success!', 200, [], JSON_UNESCAPED_UNICODE]);
    	}else{
    		return response()->json(['status' => 'error','message'=>'try again!', 200, [], JSON_UNESCAPED_UNICODE]);
    	}

    	//
      //header ('Content-type: text/html; charset=utf-8');
      // return response()->json('محمد',200, [], JSON_UNESCAPED_UNICODE);
      // $curr_lang = DB::table('languages')->where('lang',$request->pro_lang)->first();
      // $member_details = Helper::get_member_details(Auth::user()->id, $request->pro_lang);
      // $languages = DB::table('languages')->where('shown',1)->select('id','name')->where('id',1)->get();
      // //check exist duplicated
      // $checkExist = DB::table('member_products')->where('name',$request->pro_name)->where('lang_id',$request->pro_lang)->where('member_id',Auth::user()->id)->count();
      // if($checkExist > 0) // exist
      // {
      //   return response()->json(['status' => 'exist','message'=>'Product Name Already Exist On Your Products!', 200, [], JSON_UNESCAPED_UNICODE]);
      // }else{ // insert and get id and return with all values required
      //   // if lang_id == 1 -> insert english and parent_id is null
      //   // set parent_id == null
      //   // preparing slug
      //   $slug = mb_strtolower(str_replace(' ', '-', $request->pro_name.'-'.Auth::user()->id));
      //   $pro_id = DB::table('member_products')->insertGetId([
      //                       'lang_id'=>$request->pro_lang,
      //                       'member_id'=>Auth::user()->id,
      //                       'name'=>$request->pro_name,
      //                       'description'=>$request->pro_description,
      //                       'slug'=>$slug,
      //                       'visibility'=>$request->visibility,
      //                       'created_by'=>Auth::user()->id,
      //                     ]);
      //   //return response()->json(['şâţ' => 1], 200, [], JSON_UNESCAPED_UNICODE);
      //   if($pro_id == null)
      //   {
      //     Session::flash('error','Product Not Created Completed! Please try Again Code: #110');
      //     return response()->json(['status' => 'error','message'=>'Product Not Created Completed! Please try Again Code: #110', 200, [],    JSON_UNESCAPED_UNICODE]);
      //   }
      //   return response()->json(['status' => 'success','message'=>'Product Created Successfully!','pro_id'=>$pro_id,'lang_id'=>$request->pro_lang, 200, [], JSON_UNESCAPED_UNICODE]);

      // }
      
    }else{

    }
  }


  public function our_messages_post(Request $request){
    $insert = DB::table('our_messages')->insert(['name'=>$request->name,'phone'=>$request->tel,'email'=>$request->email,'subject'=>$request->subject,'message'=>$request->message,'ip_addrerss'=>$request->ip()]);
    if($insert == 1){
      // return success
      session::flash('success','Messages Was Sent Success!');
      return redirect()->back();
    }else{
      // return failed
      session::flash('error','Messages not Sent Yet Try Again!');
      return redirect()->back();
    }
  }
}
