<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use App\Helpers\Helper;
use Auth;
use Session;

class MemberProductsController extends Controller
{
  public function MemberProducts(){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
  	$member_products = DB::table('member_products')->where('member_id',Auth::user()->id)->where('visibility',1)->get();
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    if(count($member_details) > 0){
      return view('pages.member.products.list')
      ->with('member_products',$member_products)
      ->with('NewMessagesCount',$NewMessagesCount)
      ->with('member_details',$member_details[0]);
    }else{
      return view('pages.member.products.list')
      ->with('NewMessagesCount',$NewMessagesCount)
      ->with('member_products',$member_products);
    //->with('member_details',$member_details[0]);
    } 
  	
  }

  public function CreateProduct(Request $request)
  {
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $member_details = Helper::get_member_details(Auth::user()->id, 1);
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    $languages = DB::table('languages')->where('shown',1)->select('id','name')->where('id',1)->get();

    if(count($member_details) > 0){
      return view('pages.member.products.create')
              ->with('member_details',$member_details[0])
              ->with('NewMessagesCount',$NewMessagesCount)
              ->with('languages',$languages)
              ->with('section',1);
    }else{
      return view('pages.member.products.create')
              ->with('NewMessagesCount',$NewMessagesCount)
              ->with('languages',$languages)
              //->with('member_details',$member_details[0])
              ->with('section',2);
    }

  }

  public function CreateProductPost(Request $request){
    if ($request->isMethod('post'))
    {
      //header ('Content-type: text/html; charset=utf-8');
      // return response()->json('محمد',200, [], JSON_UNESCAPED_UNICODE);
      $curr_lang = DB::table('languages')->where('lang',$request->pro_lang)->first();
      $member_details = Helper::get_member_details(Auth::user()->id, $request->pro_lang);
      $languages = DB::table('languages')->where('shown',1)->select('id','name')->where('id',1)->get();
      //check exist duplicated
      $checkExist = DB::table('member_products')->where('name',$request->pro_name)->where('lang_id',$request->pro_lang)->where('member_id',Auth::user()->id)->count();
      if($checkExist > 0) // exist
      {
        return response()->json(['status' => 'exist','message'=>'Product Name Already Exist On Your Products!', 200, [], JSON_UNESCAPED_UNICODE]);
      }else{ // insert and get id and return with all values required
        // if lang_id == 1 -> insert english and parent_id is null
        // set parent_id == null
        // preparing slug
        $slug = mb_strtolower(str_replace(' ', '-', $request->pro_name.'-'.Auth::user()->id));
        $pro_id = DB::table('member_products')->insertGetId([
                            'lang_id'=>$request->pro_lang,
                            'member_id'=>Auth::user()->id,
                            'name'=>$request->pro_name,
                            'description'=>$request->pro_description,
                            'slug'=>$slug,
                            'visibility'=>1,
                            'created_by'=>Auth::user()->id,
                          ]);
        //return response()->json(['şâţ' => 1], 200, [], JSON_UNESCAPED_UNICODE);
        if($pro_id == null)
        {
          Session::flash('error','Product Not Created Completed! Please try Again Code: #110');
          return response()->json(['status' => 'error','message'=>'Product Not Created Completed! Please try Again Code: #110', 200, [],    JSON_UNESCAPED_UNICODE]);
        }
        return response()->json(['status' => 'success','message'=>trans('product_added_success'),'pro_id'=>$pro_id,'lang_id'=>$request->pro_lang, 200, [], JSON_UNESCAPED_UNICODE]);

      }
      
    }
    
    
  }



  public function getProductView($id){
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    // language
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    //product_details
    $product_details = DB::table('member_products')
                          ->where('member_id',Auth::user()->id)
                          ->where('id',$id)
                          ->get();
    //specifications
    $specifications = DB::table('member_pro_specifications')
                          ->where('member_id',Auth::user()->id)
                          ->where('pro_id',$id)
                          ->get();
    //galleries
    $galleries = DB::table('member_pro_images')
                          ->where('member_id',Auth::user()->id)
                          ->where('pro_id',$id)
                          ->get();
    if(count($product_details) > 0){
      return view('pages.member.products.view')
                ->with('currLangId',$curr_lang)
                ->with('product_details',$product_details[0])
                ->with('specifications',$specifications)
                ->with('member_details',$member_details[0])
                ->with('NewMessagesCount',$NewMessagesCount)
                ->with('galleries',$galleries);
    }else{
      return view('pages.member.products.view')
                ->with('currLangId',$curr_lang)
                // ->with('product_details',$product_details[0])
                ->with('specifications',$specifications)
                ->with('member_details',$member_details[0])
                ->with('NewMessagesCount',$NewMessagesCount)
                ->with('galleries',$galleries);
    }
    
  }



  public function DeleteProduct(Request $request){
    // delete product
    #delete member_pro_images
    $deleteGallery = DB::table('member_pro_images')->where('member_id',Auth::user()->id)->where('pro_id',$request->pro_id)->delete();
    // dlete specifications
    $deleteSpecification = DB::table('member_pro_specifications')->where('member_id',Auth::user()->id)->where('pro_id',$request->pro_id)->delete();
    // dlete member_products
    $delete_member_products = DB::table('member_products')->where('member_id',Auth::user()->id)->where('id',$request->pro_id)->delete();
    if($deleteGallery == 1 or $deleteSpecification == 1 or $delete_member_products == 1){
      return response()->json(['status'=>'success','message'=>'deleted Successfully!']);
    }else{
      return response()->json(['status'=>'error','message'=>'Deleting Not Deleted Correct!']);
    }
    
  }


  public function DeleteExhibitionProduct(Request $request){
    $getExh_id = DB::table('exhibition_langs')->where('slug',$request->exh_slug)->select('exhibition_id as exh_id')->first();
    // delete from exhibition_products_selector
    $delete = DB::table('exhibition_products_selector')
                  ->where('pro_id',$request->pro_id)
                  ->where('exhibitor_id',Auth::user()->id)
                  ->where('exh_id',$getExh_id->exh_id)
                  ->delete();
    if($delete == 1){
      Session::flash('success','Exhibition Product Removed Success');
      return redirect()->back();
    }else{
      Session::flash('error','Exhibition Product Removing');
      return redirect()->back();
    }
    
  }


  public function EditProduct(Request $request, $pro_id){
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    // get lang
    
    $languages = DB::table('languages')->where('shown',1)->get();
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
    $product_details = DB::table('member_products')->where('id',$request->pro_id)->first();
    $specifications = DB::table('member_pro_specifications')->where('pro_id',$request->pro_id)->get();
    $galleries = DB::table('member_pro_images')->where('member_id',Auth::user()->id)->where('pro_id',$pro_id)->get();
    return view('pages.member.products.edit')
            ->with('curr_lang',$curr_lang)
            ->with('member_details',$member_details[0])
            ->with('languages',$languages)
            ->with('specifications',$specifications)
            ->with('NewMessagesCount',$NewMessagesCount)
            ->with('product_details',$product_details)
            ->with('galleries',$galleries);
  }


  public function UpdateProduct(Request $request){
    // check found another product have same name?
    $checkDuplicatedAnotherPro = DB::table('member_products')
                                ->where('member_id',Auth::user()->id)
                                ->where('name',$request->pro_name)
                                ->where('id','!=',$request->pro_id)
                                ->count();
    if($checkDuplicatedAnotherPro > 0){
      // print allready exist product name
      return response()->json(['status'=>'exist','message'=>'Product Name Already Exist On another Product!']);
    }else{
      // update and success
      $slug = mb_strtolower(str_replace(' ', '-', $request->pro_name.'-'.Auth::user()->id));
      $update = DB::table('member_products')
                  ->where('id',$request->pro_id)
                  // ->where('parent_id',$request->parent_id)
                  ->where('member_id',Auth::user()->id)
                  ->update([
                            // 'parent_id'=>$request->parent_id,
                            'lang_id'=>1,
                            'member_id'=>Auth::user()->id,
                            'name'=>$request->pro_name,
                            'description'=>$request->pro_description,
                            'slug'=>$slug,
                            'updated_by'=> Auth::user()->id
                          ]);
      
      return response()->json(['status'=>'success','message'=>'Updated Successfully!']);
    }
    




    // // check duplicated same member

    //   $check_count = DB::table('member_products')
    //                 ->where('member_id',Auth::user()->id)
    //                 ->where('name',$request->pro_name)
    //                 ->where('id','!=',$request->pro_id)
    //                 ->count();
    
    // if($check_count > 0)
    // {
    //   // return response()->json(['result 1'=>$request->pro_name,'pro_id'=>$request->pro_id]);
    //   // exist
    //    return response()->json(['status'=>'exist','message'=>'Record Exist!','count'=>$check_count,'parent_id'=>$request->parent_id]);
    // }else{
    //   // return response()->json(['result 2'=>$request->pro_name,'pro_id'=>$request->pro_id]);
    //   // updated
    //   $slug = mb_strtolower(str_replace(' ', '-', $request->pro_name.'-'.Auth::user()->id));
    //   $update = DB::table('member_products')
    //               ->where('id',$request->id)
    //               // ->where('parent_id',$request->parent_id)
    //               ->where('member_id',Auth::user()->id)
    //               ->where('lang_id',$request->pro_lang)
    //               ->update([
    //                         // 'parent_id'=>$request->parent_id,
    //                         'lang_id'=>$request->pro_lang,
    //                         'member_id'=>Auth::user()->id,
    //                         'name'=>$request->pro_name,
    //                         'description'=>$request->pro_description,
    //                         'slug'=>$slug,
    //                         'updated_by'=> Auth::user()->id
    //                       ]);
      
    //   if($update == 1)
    //   {
    //     return response()->json(['status'=>'success','message'=>'Updated Successfully!']);
    //   }else{
    //     return response()->json(['status'=>'nochanges','message'=>'No Changes To Save It!']);
    //   }

      
    }

    
  




  public function ProductSpecificationActive(Request $request){
    //$languages = DB::table('languages')->where('shown',1)->get();
    //$curr_lang = DB::table('languages')->where('lang',$request->lang)->first();
    //switch
    $check = DB::table('member_products')
                  ->where('id',$request->pro_id)
                  ->where('member_id',Auth::user()->id)
                  ->first();
    if($check->active == 1){
      $update = DB::table('member_products')
                  ->where('id',$request->pro_id)
                  ->where('member_id',Auth::user()->id)
                  ->update(['active'=>0]);
    }else{
      $update = DB::table('member_products')
                  ->where('id',$request->pro_id)
                  ->where('member_id',Auth::user()->id)
                  ->update(['active'=>1]);
    }

    if($update == 1){
      return redirect()->back();
      return response()->json(['status'=>'success','message'=>'Updated Successfully!']);
    }else{
      return redirect()->back();
      return response()->json(['status'=>'error','message'=>'Not Updated Please Try again code:# 300!']);
    }
    
  }


}
