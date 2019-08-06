<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use Auth;
use Session;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use File;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class MemberProfileController extends Controller
{
  public function MemberProfile(){

  	//get all main Categories
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $account_types = DB::select('
                                  SELECT gender_langs.gener_id AS account_type_id, gender_langs.name AS account_type_name, gender_langs.lang_id
                                  FROM gender_langs gender_langs
                                  INNER JOIN genders genders
                                  ON (gender_langs.gener_id = genders.id)
                                  WHERE (gender_langs.lang_id = '.$curr_lang->id.')
                                ');
    $member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
    $countries = DB::table('countries')->where('active',1)->select('id','name')->get();
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    $AllReadyExist = DB::table('member_details')->where('user_id',Auth::user()->id)->count();
  	// $main_categories = DB::select('
   //                                  SELECT categories_trans.name,
   //                                  categories.parent_id,
   //                                  categories_trans.lang_id,
   //                                  categories.id
   //                                  FROM categories_trans
   //                                  INNER JOIN categories
   //                                  ON (categories_trans.sector_id = categories.id)
   //                                  WHERE (categories.parent_id IS NULL) AND (categories_trans.lang_id = 1)
			// 														');
    $categories = DB::select('
                              SELECT exh_cat_trans.cat_name as name,
                              exh_cat_trans.lang_id,
                              exh_cat_trans.slug,
                              exh_cat.active AS cat_active,
                              exh_cat_trans.active AS cat_trans_active,
                              exh_cat.id
                              FROM exh_cat_trans
                              INNER JOIN exh_cat
                              ON (exh_cat_trans.exh_cat_id = exh_cat.id)
                              WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
                              AND(exh_cat_trans.active = 1)
                           ');
      if(count($member_details) > 0)
      {
        return view('pages.member.profile')
        ->with('main_categories',$categories)->with('lang_lang',Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale()))
        ->with('countries',$countries)
        ->with('member_details',$member_details[0])
        ->with('NewMessagesCount',$NewMessagesCount)
        ->with('AllReadyExist',$AllReadyExist)
        ->with('account_types',$account_types)
       
        ->with('country_id',$member_details[0]->country_id);
      }else{
        return view('pages.member.profile')
        ->with('main_categories',$categories)->with('lang_lang',Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale()))
        ->with('NewMessagesCount',$NewMessagesCount)
        ->with('AllReadyExist',$AllReadyExist)
        ->with('account_types',$account_types)
        ->with('countries',$countries);
        //->with('country_id',$member_details[0]->country_id);
      }
  		
  	

      
  	}
  


  public function MemberDashboard(Request $request){
    $exhibitionCount = DB::table('exh_members_subscribes')->where('member_id',Auth::user()->id)->count();
    $member_details = Helper::get_member_details(Auth::user()->id,1);
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    if(count($member_details) > 0){
      return view('pages.member.dashboard')
            ->with('member_details',$member_details[0])
            ->with('exhibitionCount',$exhibitionCount)
            ->with('NewMessagesCount',$NewMessagesCount);
    }else{
      return view('pages.member.dashboard')
      ->with('exhibitionCount',$exhibitionCount)
             ->with('NewMessagesCount',$NewMessagesCount);
    }
    
  }



  public function MemberProfileDetailsPost(Request $request){
  	
  	//return redirect()->route('Authed_Member_Profile_details_post');
  }



  public function MemberProfileUpdate(Request $request)
  {
    request()->validate([

            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

    //check logic of category
    if($request->country_id == 0)
    {
      // Session::flash('error','Please Check Country Form List Again');
      $message = 'Please Check Country Form List Again';
      return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
    }

    if($request->account_type_id == 0){
      // Session::flash('error','Please Check Account Type Form List Again');
      $message = 'Please Check Account Type Form List Again';
      return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
    }

    //check logic of category
    if($request->category_id == 0)
    {
      // Session::flash('error','Please Check Category Form List Again');
      $message = 'Please Check Category Form List Again';
      return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
    }

    //check logic of sub category
    // if($request->sub_category_id == 0)
    // {
    //   Session::flash('error','Please Check Sub Category Form List Again');
    //   return redirect()->back();
    // }

    //check logic of sub category
    if($request->phone == null)
    {
      // Session::flash('error','Please Check Phone Number Form List Again');
      $message = 'Please Check Phone Number Form List Again';
      return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
    }

    $FiledsFlag = 0;
    $LogoFlag = 0;
    $CoverFlag = 0;
    $TransFlag = 0;
    // get language details
    // 1elper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
    // create folders for images
    $path_images = public_path().'/images/en/';
    $path_images_raw = public_path().'/raw';
    $path_images_thumb = public_path().'/images/en/thumb';
    $path_images_med = public_path().'/images/en/med';
    $path_images_larg = public_path().'/images/en/larg';
    $slug = $request->name.' '.Auth::user()->id;
    $slug = strtolower(str_replace(' ', '-', $slug));

    if(!file_exists( $path_images )){
      mkdir($path_images, 0777, true);
      File::makeDirectory($path_images, $mode = 0777, true, true);
    }
    if(!file_exists( public_path().'/raw' )){
      mkdir($path_images_raw, 0777, true);
      File::makeDirectory($path_images_raw, $mode = 0777, true, true);
    }
    if(!file_exists( $path_images_thumb )){
      mkdir($path_images_thumb, 0777, true);
      File::makeDirectory($path_images_thumb, $mode = 0777, true, true);
    }
    if(!file_exists( $path_images_med )){
      mkdir($path_images_med, 0777, true);
      File::makeDirectory($path_images_med, $mode = 0777, true, true);
    }
    if(!file_exists( $path_images_larg )){
      mkdir($path_images_larg, 0777, true);
      File::makeDirectory($path_images_larg, $mode = 0777, true, true);
    }
    // User Is Already Member?
    if(Helper::CheckMemberExistDb(Auth::user()->id) > 0)
    {
      // Update Member Details
      /******************** have logo *******************************************************/
      if(Input::hasFile('logo'))
      {
         $validator = Validator::make($request->all(),
                [
                  'file' => 'image',
                ],
                [
                  'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
         
        // raw image
        $logo = Input::file('logo');
        $logoExt = Input::file('logo')->getClientOriginalExtension();
        $logo->move($path_images_raw,$slug.'-logo.'.$logoExt);
        // thumbnail
        $logo = Image::make($path_images_raw.'/'.$slug.'-logo.'.$logoExt);
        $logo->resize(50, 50);
        $logo->save($path_images_thumb.'/'.$slug.'-logo.'.$logoExt);
        // medium
        $logo = Image::make($path_images_raw.'/'.$slug.'-logo.'.$logoExt);
        $logo->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $logo->save($path_images_med.'/'.$slug.'-logo.'.$logoExt);
        // larg
        $logo = Image::make($path_images_raw.'/'.$slug.'-logo.'.$logoExt);
        $logo->resize(500, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $logo->save($path_images_larg.'/'.$slug.'-logo.'.$logoExt);
      }


      /******************** have cover *******************************************************/
      if(Input::hasFile('cover'))
      {
         $validator = Validator::make($request->all(),
                [
                  'file' => 'image',
                ],
                [
                  'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
         
        // raw image
        $cover = Input::file('cover');
        $coverExt = Input::file('cover')->getClientOriginalExtension();
        $cover->move($path_images_raw,$slug.'-cover.'.$coverExt);
        // thumbnail
        $cover = Image::make($path_images_raw.'/'.$slug.'-cover.'.$coverExt);
        $cover->resize(50, 50);
        $cover->save($path_images_thumb.'/'.$slug.'-cover.'.$coverExt);
        // medium
        $cover = Image::make($path_images_raw.'/'.$slug.'-cover.'.$coverExt);
        $cover->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $cover->save($path_images_med.'/'.$slug.'-cover.'.$coverExt);
        // larg
        $cover = Image::make($path_images_raw.'/'.$slug.'-cover.'.$coverExt);
        $cover->resize(500, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $cover->save($path_images_larg.'/'.$slug.'-cover.'.$coverExt);
      }


      # Member And Will Updating Only
      

      if(Input::hasFile('logo'))
      {
        $update_logo = DB::table('member_details')->where('user_id',Auth::user()->id)->update([
                                                        'profile_pic'=>$slug.'-logo.'.$logoExt,
                                                      ]);
        
        if($update_logo == 1)
        {
          $LogoFlag = 1;
        }else{
          $LogoFlag = 0;
        }

      }

      if(Input::hasFile('cover')){
        //update member details
        $update_cover = DB::table('member_details')->where('user_id',Auth::user()->id)->update([
                                                        'profile_cover'=>$slug.'-cover.'.$coverExt,
                                                      ]);
        if($update_cover == 1)
        {
          $CoverFlag =1;
        }else{
          $CoverFlag =0;
        }
      }
      //update member details
      $update = DB::table('member_details')->where('user_id',Auth::user()->id)
                                                    ->update([
                                                     'user_id'=>Auth::user()->id,
                                                     'gender'=>$request->account_type_id,
                                                     'phone'=>$request->phone,
                                                     'category_id'=>$request->category_id,
                                                     // 'sub_category_id'=>$request->sub_category_id,
                                                     'country_id'=>$request->country_id,
                                                     'ceo'=>$request->ceo,
                                                     'sales'=>$request->sales,
                                                     'marketing'=>$request->marketing,
                                                     'facebook'=>$request->facebook,
                                                     'twitter'=>$request->twitter,
                                                     'youtube'=>$request->youtube,
                                                     'instagram'=>$request->instagram,
                                                     'snapchat'=>$request->snapchat,
                                                     'website'=>$request->website,
                                                     'linkedin'=>$request->linkedin,
                                                     'updated_by'=>Auth::user()->id
                                                    ]);
      if($update == 1)
      {
        $FiledsFlag =1;
      }else{
        $FiledsFlag =0;
      }
      
      $slug = $request->name.' '.Auth::user()->id;
      $slug = strtolower(str_replace(' ', '-', $slug));
      $update_trans = DB::table('member_lang')
                          ->where('lang_id',1)
                          ->where('member_id',Auth::user()->id)
                          ->update([
                                    'lang_id'=>1,
                                    'member_id'=>Auth::user()->id,
                                    'name'=>$request->name,
                                    'slug'=>$slug,
                                    'address'=>$request->address,
                                    'about'=>$request->about,
                                    'services'=>$request->services
                                  ]);
      if($update_trans == 1)
      {
        $TransFlag =1;
      }else{
        $TransFlag =0;
      }
      
      //return dd($FiledsFlag,$LogoFlag,$CoverFlag,$TransFlag);
      if($FiledsFlag == 1 or $LogoFlag == 1 or $CoverFlag == 1 or $TransFlag == 1) 
      {
        $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
        DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
        // Session::flash('success','Your Profile Has Been Updated Successfully!');
        $message ='Your Profile Has Been Updated Successfully!';
        return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'success']);
      }else{
        //Session::flash('no_change','No Changes To Saving It!');
        $message ='No Changes To Saving It!';
        return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Information','title'=>'Information']);
      }   
        
    }else{
      # Not Member And Will Create And Discount From Wallet
      //check logic of sub category
      $checkWallet = Helper::CheckWalletProfileDiscount(Auth::user()->wallet,'member');
      #check vaild
      if($checkWallet == true)
      {
        #discount and create
        //preparing to discount 
        $cost = Helper::get_cost('member');
        $net = Auth::user()->wallet - $cost;
        // discount wallet
        $discount = DB::table('users')
                        ->where('id',Auth::user()->id)
                        ->update(['wallet'=>$net]);
        if($discount == 1) // discount success
        {
          // transaction add transaction_id 1 -> compalete profile
          $add_transaction = DB::table('wallet_transactions')->insert([
                                                                        'member_id' => Auth::user()->id,
                                                                        'transaction_id' => 1,
                                                                        'cost' => $cost,
                                                                        'created_by' => Auth::user()->id
                                                                      ]);
          
          /******************** have logo *******************************************************/
          if(Input::hasFile('logo'))
          {
             $validator = Validator::make($request->all(),
                [
                  'file' => 'image',
                ],
                [
                  'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
             
            // raw image
            $logo = Input::file('logo');
            $logoExt = Input::file('logo')->getClientOriginalExtension();
            $logo->move($path_images_raw,$slug.'-logo.'.$logoExt);
            // thumbnail
            $logo = Image::make($path_images_raw.'/'.$slug.'-logo.'.$logoExt);
            $logo->resize(50, 50);
            $logo->save($path_images_thumb.'/'.$slug.'-logo.'.$logoExt);
            // medium
            $logo = Image::make($path_images_raw.'/'.$slug.'-logo.'.$logoExt);
            $logo->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $logo->save($path_images_med.'/'.$slug.'-logo.'.$logoExt);
            // larg
            $logo = Image::make($path_images_raw.'/'.$slug.'-logo.'.$logoExt);
            $logo->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
            });
            $logo->save($path_images_larg.'/'.$slug.'-logo.'.$logoExt);
          }


          /******************** have cover *******************************************************/
          if(Input::hasFile('cover'))
          {
            $validator = Validator::make($request->all(),
            [
              'file' => 'image',
            ],
            [
              'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
            ]);
             
            // raw image
            $cover = Input::file('cover');
            $coverExt = Input::file('cover')->getClientOriginalExtension();
            $cover->move($path_images_raw,$slug.'-cover.'.$coverExt);
            // thumbnail
            $cover = Image::make($path_images_raw.'/'.$slug.'-cover.'.$coverExt);
            $cover->resize(50, 50);
            $cover->save($path_images_thumb.'/'.$slug.'-cover.'.$coverExt);
            // medium
            $cover = Image::make($path_images_raw.'/'.$slug.'-cover.'.$coverExt);
            $cover->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $cover->save($path_images_med.'/'.$slug.'-cover.'.$coverExt);
            // larg
            $cover = Image::make($path_images_raw.'/'.$slug.'-cover.'.$coverExt);
            $cover->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
            });
            $cover->save($path_images_larg.'/'.$slug.'-cover.'.$coverExt);
          }
          //have logo image?
          if(Input::hasFile('logo'))
          {
            if(Input::hasFile('cover'))
            {
              // save both images
              // save logo and cover with data and discount from wallet
              $id = DB::table('member_details')
                           ->insertGetId(['user_id'=>Auth::user()->id,
                                         'phone'=>$request->phone,
                                         'category_id'=>$request->category_id,
                                         'gender'=>$request->account_type_id,
                                         // 'sub_category_id'=>$request->sub_category_id,
                                         'country_id'=>$request->country_id,
                                         'profile_pic'=>$slug.'-logo.'.$logoExt,
                                         'profile_cover'=>$slug.'-cover.'.$coverExt,
                                         'ceo'=>$request->ceo,
                                         'sales'=>$request->sales,
                                         'marketing'=>$request->marketing,
                                         'facebook'=>$request->facebook,
                                         'twitter'=>$request->twitter,
                                         'youtube'=>$request->youtube,
                                         'instagram'=>$request->instagram,
                                         'snapchat'=>$request->snapchat,
                                         'website'=>$request->website,
                                         'linkedin'=>$request->linkedin,
                                         'created_by'=>Auth::user()->id
                                       ]);
              # insert member trans
              // check exist
              //$lang = Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
              $compose_slug = $request->name.' '.Auth::user()->id;
              $slug = strtolower(str_replace(' ', '-', $compose_slug));
              $check_exist = DB::table('member_lang')
                               ->where('member_id',Auth::user()->id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->where('lang_id',1)
                                  ->where('member_id',Auth::user()->id)
                                  ->update([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  // DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Information']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message = 'Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Information']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }else{
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Information']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message ='Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Information']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }
            }else{
              // save logo
              $id = DB::table('member_details')
                           ->insertGetId(['user_id'=>Auth::user()->id,
                                         'phone'=>$request->phone,
                                         'gender'=>$request->account_type_id,
                                         'category_id'=>$request->category_id,
                                         // 'sub_category_id'=>$request->sub_category_id,
                                         'country_id'=>$request->country_id,
                                         'profile_pic'=>$slug.'-logo.'.$logoExt,
                                         // 'profile_cover'=>$slug.'-cover.'.$ext,
                                         'ceo'=>$request->ceo,
                                         'sales'=>$request->sales,
                                         'marketing'=>$request->marketing,
                                         'facebook'=>$request->facebook,
                                         'twitter'=>$request->twitter,
                                         'youtube'=>$request->youtube,
                                         'instagram'=>$request->instagram,
                                         'snapchat'=>$request->snapchat,
                                         'website'=>$request->website,
                                         'linkedin'=>$request->linkedin,
                                         'created_by'=>Auth::user()->id
                                       ]);
              # insert member trans
              // check exist
              //$lang = Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
              $compose_slug = $request->name.' '.Auth::user()->id;
              $slug = strtolower(str_replace(' ', '-', $compose_slug));
              $check_exist = DB::table('member_lang')
                               ->where('member_id',Auth::user()->id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->where('lang_id',1)
                                  ->update([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);  
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Information']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message ='Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Information']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }else{
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Information']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message ='Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Information']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }
            }
            
            
          }elseif(Input::has('cover')){
            $coverExt = Input::file('cover')->getClientOriginalExtension();
            // save cover and fields
            // save logo and cover with data and discount from wallet
              $id = DB::table('member_details')
                           ->insertGetId(['user_id'=>Auth::user()->id,
                                         'phone'=>$request->phone,
                                         'gender'=>$request->account_type_id,
                                         'category_id'=>$request->category_id,
                                         // 'sub_category_id'=>$request->sub_category_id,
                                         'country_id'=>$request->country_id,
                                         //'profile_pic'=>$slug.'-logo.'.$ext,
                                         'profile_cover'=>$slug.'-cover.'.$coverExt,
                                         'ceo'=>$request->ceo,
                                         'sales'=>$request->sales,
                                         'marketing'=>$request->marketing,
                                         'facebook'=>$request->facebook,
                                         'twitter'=>$request->twitter,
                                         'youtube'=>$request->youtube,
                                         'instagram'=>$request->instagram,
                                         'snapchat'=>$request->snapchat,
                                         'website'=>$request->website,
                                         'linkedin'=>$request->linkedin,
                                         'created_by'=>Auth::user()->id
                                       ]);
              # insert member trans
              // check exist
              //$lang = Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
              $compose_slug = $request->name.' '.Auth::user()->id;
              $slug = strtolower(str_replace(' ', '-', $compose_slug));
              $check_exist = DB::table('member_lang')
                               ->where('member_id',Auth::user()->id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->where('lang_id',1)
                                  ->update([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Success']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }else{
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Success']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message ='Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }
          }else{
            // insert fields only
            // save logo and cover with data and discount from wallet
              $id = DB::table('member_details')
                           ->insertGetId(['user_id'=>Auth::user()->id,
                                         'phone'=>$request->phone,
                                         'gender'=>$request->account_type_id,
                                         'category_id'=>$request->category_id,
                                         // 'sub_category_id'=>$request->sub_category_id,
                                         'country_id'=>$request->country_id,
                                         // 'profile_pic'=>$slug.'-logo.'.$ext,
                                         // 'profile_cover'=>$slug.'-cover.'.$ext,
                                         'ceo'=>$request->ceo,
                                         'sales'=>$request->sales,
                                         'marketing'=>$request->marketing,
                                         'facebook'=>$request->facebook,
                                         'twitter'=>$request->twitter,
                                         'youtube'=>$request->youtube,
                                         'instagram'=>$request->instagram,
                                         'snapchat'=>$request->snapchat,
                                         'website'=>$request->website,
                                         'linkedin'=>$request->linkedin,
                                         'created_by'=>Auth::user()->id
                                       ]);
              # insert member trans
              // check exist
              //$lang = Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
              $compose_slug = $request->name.' '.Auth::user()->id;
              $slug = strtolower(str_replace(' ', '-', $compose_slug));
              $check_exist = DB::table('member_lang')
                               ->where('member_id',Auth::user()->id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->where('lang_id',1)
                                  ->update([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Success']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                  $message ='Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Success']);
                }
              }else{
                #update member trans
                $update_trans = DB::table('member_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'member_id'=>Auth::user()->id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {
                  $session_url = url('/').LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug_session;
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  $message ='Your Profile Has Been Updated Successfully!';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Success','title'=>'Success']);
                  // Session::flash('success','Your Profile Has Been Updated Successfully!');
                  // return redirect()->back();
                }else{
                  $message ='Request Not Complete Success Please Contact Us error code #104';
                  return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
                  // Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return redirect()->back();
                }
              }
          }
        }else{
          $message ='Wallet Discount Not Completed, Please Try Again code #102';
          return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
          // Session::flash('error','Wallet Discount Not Completed, Please Try Again code #102');
          // redirect()->back();
        }

        
      }else{
        # return and payment required message
        $message ='Wallet Not Enough';
        return redirect()->route('Authed_Member_Profile',['message'=>$message,'case'=>'Error','title'=>'Error']);
        // Session::flash('wallet_not_enough');
        // return redirect()->back();
      }
    }
  }

  public function ListSubCategory($category_id){
  	$sub_categories = DB::select('
                                    SELECT categories_trans.name AS category_title,
                                    categories.id,
                                    categories_trans.lang_id,
                                    categories.parent_id,
                                    categories_trans.active,
                                    languages.shown
                                    FROM (categories_trans categories_trans
                                    INNER JOIN languages languages
                                    ON (categories_trans.lang_id = languages.id))
                                    INNER JOIN categories categories
                                    ON (categories_trans.sector_id = categories.id)
                                    WHERE     (categories_trans.lang_id = 1)
                                    AND (categories.parent_id IS NULL)
                                    AND (categories_trans.active = 1)
                                    AND (languages.shown = 1)
													      ');
  	return response(['sub'=>$sub_categories],200);
                  
	}



  public function MemberChangePasswordPost(Request $request){
    $update = DB::table('users')->where('id',Auth::user()->id)->update(['password'=>Hash::make($request->password)]);
    if($update != 1){
      return response()->json(['status'=>'error','message'=>"Please Try Again!"]);
    }else{
      return response()->json(['status'=>'success','message'=>"password changed success!"]);
    }
  }

  


}