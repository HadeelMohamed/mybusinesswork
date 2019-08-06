<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use App\Helpers\Helper;
use Auth;
use Session;

class MemberProductsSpecificationsController extends Controller
{


  public function CreateProductSpecification(Request $request)
  {

  	// check duplicated as language
  	// $pro_lang = DB::table('languages')->where('lang',$request->lang_id)->first();

  	// check exist duplicate
  	$exist = DB::table('member_pro_specifications')
  						// ->where('lang_id',$request->lang_id)
  						->where('pro_id',$request->pro_id)
  						->where('specification',$request->specification)->count();
  	if($exist > 0)
  	{
  		//duplicated
  		//Session::flash('error','Already Exists On Your Specification!');
  		return response()->json(['status' => 'exist','message'=>'Product Specification Already Exist On Your Product Specifications!']);
  	}else{
  		// insert
  		$insert = DB::table('member_pro_specifications')->insert([
  								'pro_id'=>$request->pro_id,
  								'member_id'=>Auth::user()->id,
  								'lang_id'=>1,
  								'specification'=>$request->specification,
  								'description'=>$request->description,
  								'created_by' => Auth::user()->id
  							]);
  		if($insert == 1)
  		{
  			// get all specification same lang and memeber
  			$specifications = DB::table('member_pro_specifications')
  													->where('pro_id',$request->pro_id)
  													->where('member_id',Auth::user()->id)
  													->where('lang_id',1)
                            ->get();
  			//Session::flash('success','Added Successfully!');
  			//return view('pages.member.products.create');
  			return response()->json(['status' => 'success','message'=>'Product Specification Created Successfully!','specifications'=>$specifications]);
  		}else{
  			// error
  			//Session::flash('error','Error Add Specification!. Code: #111');
  			//return view('pages.member.products.create');
  			return response()->json(['status' => 'error','message'=>'Product Specification Not Created! Code:#1111 ']);
  		}
  	}

  }


  public function ProductSpecificationUpdate(request $request){
    
    $check_count = DB::table('member_pro_specifications')
                  ->where('specification',$request->specification)
                  ->where('lang_id',$request->lang_id)
                  ->where('pro_id',$request->pro_id)
                  ->where('id','!=',$request->id)
                  ->count();

    
    if($check_count > 0)
    {
      // exist
       return response()->json(['status'=>'exist','message'=>'Record Exist!']);
    }else{
      // updated
      $update = DB::table('member_pro_specifications')
                  ->where('id',$request->id)
                  ->update([
                            'specification'=>$request->specification,
                            'description'=>$request->description,
                            'lang_id'=>$request->lang_id,
                            'updated_by'=> Auth::user()->id
                          ]);
      
      if($update == 1)
      {
        return response()->json(['status'=>'success','message'=>'Updated Successfully!']);
      }else{
        return response()->json(['status'=>'nochanges','message'=>'No Changes To Save It!']);
      }
    }
  }


  public function ProductSpecificationDelete(Request $request){
    $delete = DB::table('member_pro_specifications')->where('id',$request->id)->delete();
    if($delete == 1){
      return response()->json(['status'=>'success','message'=>'Deleted Successfully!']);
    }else{
      return response()->json(['status'=>'error','message'=>'Error On Deleting Please try Again Code:#120']);
    }
  }


}
