<?php 


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
class NotificationController extends Controller
{
    

  public function Notification_show( Request $request)
  {


 return view('pages.admin.notifications.index');
  }



    public function Notification_send(Request $request)
    {
    	dd($request->users);

for($i=0;$i<count($request->users);$i++)
{


 $members_messages = \DB::table('members_messages')
                              ->insertGetId([
                                              'sender_id'=>auth()->guard('admin')->user()->id,
                                              'receiver_id'=>$request->users[$i],
                                              'subject'=>$request->title,
                                              'message'=>$request->message,
                                              'status'=>0,
                                              'type'=>1,
                                              'created_by'=>auth()->guard('admin')->user()->id,
                                              
                                              
                                            ]);

}
session::flash('message_sent');

 return \Redirect::back();

    	
    }


}