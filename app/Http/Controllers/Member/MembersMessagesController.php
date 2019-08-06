<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use App\Helpers\Helper;
use Auth;
use Session;


class MembersMessagesController extends Controller
{
  // list messages
  public function ListMemberMessages(Request $request){
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	// get
    $messages = DB::select('
                            SELECT members_messages.subject,
                            members_messages.message,
                            members_messages.sender_id,
                            members_messages.status,
                            member_lang.name as sender_name,
                            members_messages.created_at,
                            members_messages.receiver_id
                            FROM (member_lang 
                            INNER JOIN member_details 
                            ON (member_lang.member_id = member_details.user_id))
                            INNER JOIN members_messages 
                            ON (members_messages.sender_id = member_details.user_id)
                            WHERE (members_messages.sender_id != '.Auth::user()->id.') AND (members_messages.receiver_id = '.Auth::user()->id.')
                            ORDER BY members_messages.created_at desc
                          ');
  	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    if(count($member_details) > 0){
      return view('pages.member.messages.list')
            ->with('messages',$messages)
            ->with('member_details',$member_details[0])
            ->with('NewMessagesCount',$NewMessagesCount);
    }else{
      return view('pages.member.messages.list')
            ->with('messages',$messages)
            ->with('member_details',$member_details)
            ->with('NewMessagesCount',$NewMessagesCount);
    } 
  	
  }

  public function MemberMessageDetails(Request $request){
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	// change read status

    // $messages = DB::select('
    //                         SELECT members_messages.subject,
    //                         members_messages.message,
    //                         members_messages.sender_id,
    //                         member_lang.name as sender_name,
    //                         members_messages.created_at,
    //                         members_messages.receiver_id
    //                         FROM (member_lang 
    //                         INNER JOIN member_details 
    //                         ON (member_lang.member_id = member_details.user_id))
    //                         INNER JOIN members_messages 
    //                         ON (members_messages.sender_id = member_details.user_id)
    //                         WHERE     (members_messages.sender_id = '.$request->sender_id.')
    //                         AND (members_messages.receiver_id = '.Auth::user()->id.')
    //                         AND (members_messages.created_at = "'.$request->created_at.'")
    //                       ');

    $messages = DB::select('
                            SELECT members_messages.subject,
                            members_messages.message,
                            members_messages.created_at,
                            member_lang.name AS sender_name,
                            members_messages.sender_id,
                            members_messages.receiver_id,
                            member_lang.slug
                            FROM member_lang
                            INNER JOIN members_messages
                            ON (member_lang.member_id = members_messages.sender_id)
                            WHERE (members_messages.receiver_id = '.Auth::user()->id.')
                            AND (members_messages.created_at = "'.$request->created_at.'")
                          ');
    $update = DB::table('members_messages')->where('created_at',$request->created_at)->update(['status'=>1]);
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
  	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    if(count($member_details) > 0){
      if(count($messages) > 0){
      return view('pages.member.messages.view')->with('messages',$messages[0])->with('NewMessagesCount',$NewMessagesCount)
      ->with('member_details',$member_details[0]);
      }else{
        return view('pages.member.messages.view')->with('NewMessagesCount',$NewMessagesCount)
        ->with('member_details',$member_details[0]);
      }
    }else{
      if(count($messages) > 0){
      return view('pages.member.messages.view')->with('messages',$messages[0])->with('NewMessagesCount',$NewMessagesCount);
      }else{
        return view('pages.member.messages.view')->with('NewMessagesCount',$NewMessagesCount);
      }
    }
  	
  	
  }


  public function MemberMessageDelete(Request $request){
  	// delete 
  	$delete = DB::table('members_messages')
  							->where('sender_id',$request->sender_id)
  							->where('receiver_id',$request->receiver_id)
  							->where('created_at',$request->created_at)->delete();
		if($delete == 1){
			Session::flash('success','Message Was Deleted Success!');
			return redirect()->route('AuthedMemberMessages');
		}else{
			Session::flash('error','Not Deleted!');
			return redirect()->route('AuthedMemberMessages');
		}

  }



  public function SendMessageMember(Request $request){
  	// add mesasge
  	$CreateMessage = DB::table('members_messages')->insert([
  																														'sender_id'=>Auth::user()->id,
  																														'receiver_id'=>$request->member_id,
  																														'subject'=>$request->subject,
  																														'message'=>$request->message,
  																														'created_by'=>Auth::user()->id
  																													]);
  	if($CreateMessage == 1){
  		Session::flash('success','Message Was Sent Successfully!');
  		return redirect()->back();
  	}else{
  		Session::flash('error','Message Not Sent! Try Again');
  		return redirect()->back();
  	}
  }

}
