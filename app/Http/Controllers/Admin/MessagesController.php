<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use DateTime;

class MessagesController extends Controller
{
  // to show category page

     public function  Messages_show(){


  	return view('pages.admin.messages.index');
  }


// to list all messages in datatable

public function Messages_all(Request $request)
    { 
    	
      error_reporting(E_ALL);
ini_set('display_errors', '1');
        $columns = array( 
                                    0 =>'Name', 
                                    1 =>'Subject',
                                    2 =>'Message',
                                    3 =>'created_at',
                                    4 =>'Status',
                                    5=>'created_at',
                                   
                    

                        );
  
        $totalData = DB::table('our_messages')
                     ->count();

            
        $totalFiltered = $totalData; 
        $order_columns=$request->order;
 
       $limit = $request->length;
       $start = $request->start;
       $order = $columns[ $order_columns[0]['column']];
       $dir = $order_columns[0]['dir'];
       $searchall=$request->search;

   //dd(empty($searchall['value']));
        if(empty($searchall['value']))
        { 
                  
            $Messages =  DB::table('our_messages')
                         ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)->get();



                       
        }
        else {
            $search =$searchall['value']; 

            $Messages =  DB::table('our_messages')
                          
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('subject', 'LIKE',"%{$search}%")
                            ->orWhere('message', 'LIKE',"%{$search}%")
                            ->orWhere('status', 'LIKE',"%{$search}%")
                            ->orWhere('created_at', 'LIKE',"%{$search}%")

             
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
                           

            $totalFiltered =   DB::table('our_messages')
                          
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('subject', 'LIKE',"%{$search}%")
                            ->orWhere('message', 'LIKE',"%{$search}%")
                            ->orWhere('status', 'LIKE',"%{$search}%")
                            ->orWhere('created_at', 'LIKE',"%{$search}%")
                           
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                             ->count();


        }

        $data = array();

       
        if(!empty($Messages))
        {
            foreach ($Messages as $Message)
            {

              
            
                  $messageid = $Message->created_at;
             $date  = new DateTime($Message->created_at); //this returns the current date time
$result = $date->format('Y-m-d-H-i-s');

$krr    = explode('-', $result);
$result = implode("", $krr);



                  // // $messageid = "".$messageid."";
                  // $langid = $Categorie->lang_id;
                  // $activeno = $Categorie->active;
                  //  $catname = $Categorie->cat_name;


  
// $first_part = implode(" ", array_splice($pieces, 0, 1));
// $other_part = implode(" ", array_splice($pieces, 5));
                  
                $nestedData['Name'] = $Message->name;
                $nestedData['Subject'] = mb_substr($Message->subject,0,30,'utf-8').'...';
                $nestedData['Message'] = mb_substr($Message->message,0,30,'utf-8').'...';
                $nestedData['Date'] = $Message->created_at;
             
              
                 if($Message->status == 0)
                                             {   
                                                $nestedData['Status'] = 'New';

                                            }
                                            else
                                            {
                                            	 $nestedData['Status'] = 'Read';
                                            }

            
                                                                                  
                              $nestedData['Options'] =' <div class="dropdown-info dropdown open">
                                                                            <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">options</button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                                       

                                                                                <a class="dropdown-item waves-light waves-effect btn" onclick="view_id('.$result.')" href="#">View</a>


                                                                      <a class="dropdown-item waves-light waves-effect btn waves-light text-danger" message_id="'.$messageid.'"  data-toggle="modal" data-target="#DeleteModal">Delete Message</a>
             
                                                                        </div></div>   ';

                                                                               


                                                                            




    
                                                                                                                           
                
                


                   



         
                $data[] = $nestedData;
            }
        }
          
       
        $json_data = array(
                    "draw"            => intval($request->draw),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered),
                   
                    "data"            => $data   
                    );


        return json_encode($json_data); 
        
    }


public function Message_delete(Request $request)
{
		$Message_delete = DB::table('our_messages')->where('created_at',$request->message_id)->delete();
        session::flash('deleted_success');
        return redirect()->back();
}


public function Message_view(Request $request)

{
	
	
$date = strtotime($request->Message_id);

$Message_view = DB::table('our_messages')->where('created_at',date('Y-m-d H:i:s', $date))->first();

	return view('pages.admin.messages.view',compact('Message_view'));

}

}