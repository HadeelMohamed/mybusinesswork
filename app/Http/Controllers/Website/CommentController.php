<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class CommentController extends Controller
{


  public function index($id)
    {

    
        return DB::table('pro_comments')->where('pro_id',$id)->latest()->get();
    }


     public function store(Request $request)
    {

     $comment = DB::table('pro_comments')
                              ->insert([
                                              'commenter_id'=>1614,
                                              'pro_id'=>142,
                                              'member_id'=>25,
                                              'comment'=>$request->comment,
                                              'created_by'=>25
                                             

                                              
                                            ]);
                            

     
      return response()->json('successfully added');
    }



}