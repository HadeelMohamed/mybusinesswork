<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class MemberPostsController extends Controller
{
  public function MemberAllPosts(){
  	
  	$posts = DB::table('member_posts')->where('member_id',Auth::user()->id)->get();
  	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
  	return view('pages.member.posts.list')
  	->with('NewMessagesCount',$NewMessagesCount)
  	->with('posts',$posts);
  }

  public function MemberAllPostsCreate(Request $request){

  }

  public function MemberAllPostsTranslations(Request $request){

  }

  public function PostActive(Request $request){
  	
  	return redirect()->back();
  }


}
