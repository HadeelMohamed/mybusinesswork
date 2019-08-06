<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class UsersController extends Controller
{
    //


    


          public function Users_list(){

//list all users
     $all_users = DB::table('users')->where('deleted',0)->orderBy('email', 'desc')->get();
// dd($all_users );
  	return view('pages.admin.users.index')
  				->with('all_users',$all_users);
  }


  


    public function User_add (Request $request)
 {
 



//check users  email unquie
$checkusername =  DB::table('users')->where('email',$request->email)->count();



 if ( $checkusername >0 )
 
 {
 
  return  redirect()->back()
    ->with('addmsg','Email Must Be uniqie')->withInput($request->all());



 }

 else


{
  //add users

  $countries = DB::table('users')
                              ->insertGetId([
                                              'name'=>$request->name,
                                              'email'=>$request->email,
                                              'type'=>1,
                                              'shown'=>1,
                                              'password'=> \Hash::make($request->password),
                                              'email_verified_at'=>date('Y-m-d H:i:s')

                                              
                                            ]);

                                    Session::flash('add_success');
                                     return redirect()->back();
}
 }


 public function User_active(Request $request)
 {


   $get_users_activation = DB::table('users')->where('id',$request->user_id)->select('shown')->first();


      if($get_users_activation->shown == 0){ // not active = deactive

        $change = DB::table('users')->where('id',$request->user_id)->update(['shown'=>1]);
       
        session::flash('active','User Now Is Active!');
        return redirect()->route('Users_list');

      }else{

        $change =DB::table('users')->where('id',$request->user_id)->update(['shown'=>0]);
       
        session::flash('deactive','User Now Is Deactive!');
        return redirect()->route('Users_list');

      }
 }

 public function User_delete(Request $request)
 {

$User_delete =DB::table('users')->where('id',$request->user_id) ->update([

                                      'deleted'=> 1,
                                     
                                                
                                                  ]);

// dd($User_delete);
// $member_pro_specifications=DB::table('member_pro_specifications')->where('member_id',$request->user_id)->delete();
// $member_pro_images=DB::table('member_pro_images')->where('member_id',$request->user_id)->delete();
// $member_products=DB::table('member_products')->where('member_id',$request->user_id)->delete();
// $member_lang=DB::table('member_lang')->where('member_id',$request->user_id)->delete();
// $member_details=DB::table('member_details')->where('user_id',$request->user_id)->delete();
// $members_raters=DB::table('members_raters')->where('member_id',$request->user_id)->orWhere('rater_id', $request->user_id)->delete();
// $exh_exhibitors_subscribes=DB::table('exh_exhibitors_subscribes')->where('exhibitor_id',$request->user_id)->delete();
// $exhibitor_pro_images=DB::table('exhibitor_pro_images')->where('exhibitor_id',$request->user_id)->delete();
// $exhibitor_products=DB::table('exhibitor_products')->where('exhibitor_id',$request->user_id)->delete();
// $exhibitor_lang=DB::table('exhibitor_lang')->where('exhibitor_id',$request->user_id)->delete();
// $exhibitor_details=DB::table('exhibitor_details')->where('user_id',$request->user_id)->delete();
// $wallet_transactions=DB::table('wallet_transactions')->where('member_id',$request->user_id)->delete();
// $User =DB::table('users')->where('id',$request->user_id)->delete();
       
         session::flash('deleted_success');
        return redirect()->back();
 }

 public function User_edit(Request $request)
 {


     $userupdatecount = DB::table('users')->where('email',$request->email)->count();

     // dd($request->all());

    if ( $userupdatecount > 1)
 
 { 


  return  redirect()->back()
     ->with('Alreadymsg','Email ALeady Existed')->withInput($request->all());

 }

 else
 {


     $userupdate = DB::table('users')->where('id',$request->user_id)
                                    ->update([
                                      'name'=> $request->username,

                                      'email'=> $request->email,
                                      'type'=>1,
                                      'shown'=> $request->activeedit,
                                      'wallet'=> $request->wallet,
                                                
                                                  ]);

                                   

                                    Session::flash('updated_success');
                                     return redirect()->back();
 }

  
   }

public function Members_list(Request $request)

{



      error_reporting(E_ALL);
ini_set('display_errors', '1');
        $columns = array( 
                                    0 =>'Name', 
                                    1 =>'Language',
                                    2 =>'Active',
                                   
                    

                        );
  
        $totalData = DB::table('users')->where('deleted',0)->count();

            
        $totalFiltered = $totalData; 
        $order_columns=$request->order;
 
       $limit = $request->length;
       $start = $request->start;
       $order = $columns[ $order_columns[0]['column']];
       $dir = $order_columns[0]['dir'];
       $searchall=$request->search;

  
        if(empty($searchall['value']))
        { 
                  
            $Users =  DB::table('users')->where('deleted',0)->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();



                       
        }
        else {
            $search =$searchall['value']; 

  


                        $Users = DB::table('users')->where('deleted',0)
                        ->where(function ($query) use ($search) {
                        $query->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->orWhere('type', 'LIKE',"%{$search}%")
                        ->orWhere('shown', 'LIKE',"%{$search}%");
                        })
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();


                        $totalFiltered =DB::table('users')->where('deleted',0)
                        ->where(function ($query) use ($search)  {
                        $query->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->orWhere('type', 'LIKE',"%{$search}%")
                        ->orWhere('shown', 'LIKE',"%{$search}%");
                        })
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->count();


        }

        $data = array();

       
        if(!empty($Users))
        {
            foreach ($Users as $User)
            {
              
               
            
                  // $catid = $User->exh_cat_id;
                  // $langid = $User->lang_id;
                  // $activeno = $User->active;
                  //  $catname = $User->cat_name;
                  
                $nestedData['ID'] = $User->id;
                $nestedData['Username'] = $User->name;
                 $nestedData['Email'] = $User->email;
                if($User->online == 1)
                {
                  $nestedData['Online'] = 'Online';
                }

                else
                {
                  $nestedData['Online'] = 'Offline';

                }
                
    if($User->shown == 1)
                {
                  $nestedData['Active'] = '<a class="text-info">Active</a>';
                }

                else
                {
                  $nestedData['Active'] = ' <a class="text-danger">Deactive</a>';

                }


             if($User->shown == 1)
                {    
            
                   $nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                                       <a class="dropdown-item waves-light waves-effect btn waves-light" user-email="'.$User->email.'" wallet="'.$User->wallet.'"  active-id="'.$User->shown.'"   userid="'.$User->id.'" username="'.$User->name.'"  data-toggle="modal" data-target="#EditModal">Edit Member</a>


                                                                                                         <a onclick="active_id('.$User->id.')" class="dropdown-item waves-light waves-effect btn " >
                                                                                  Deactive
                                                                                </a>

                                                                                                 <a onclick="get_id('.$User->id.')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Member
                                                                                </a>
                                                                      
                                                                               

             
                                                                        </div></div>      

                                ';


                              }


                              else
                              {
$nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                                       <a class="dropdown-item waves-light waves-effect btn waves-light" user-email="'.$User->email.'" wallet="'.$User->wallet.'"  active-id="'.$User->shown.'"   userid="'.$User->id.'" username="'.$User->name.'"  data-toggle="modal" data-target="#EditModal">Edit Member</a>


                                                                                                         <a onclick="active_id('.$User->id.')" class="dropdown-item waves-light waves-effect btn ">
                                                                                  Active
                                                                                </a>

                                                                                                 <a onclick="get_id('.$User->id.')" class="dropdown-item waves-light waves-effect btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                                                                  Delete Member
                                                                                </a>
                                                                      
                                                                               

             
                                                                        </div></div>      

                                ';
                              }
                                                      
                                                                                
          

                                                           


                   



         
                $data[] = $nestedData;
            }
        }
          
   
        $json_data = array(
                    "draw"            => intval($request->draw),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data   
                    );

        //dd($json_data);
        return json_encode($json_data); 


}


}
