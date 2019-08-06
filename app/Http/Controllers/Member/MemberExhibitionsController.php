<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Helpers\Helper;
use LaravelLocalization;
use Auth;
use Validator;
use Session;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;


class MemberExhibitionsController extends Controller
{
  public function memberExhibitions(){
  	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
  	
  	$exhibitions = DB::select('
																SELECT exhibition_langs.name,
																exhibition_langs.lang_id,
																exh_members_subscribes.member_id,
																exh_members_subscribes.created_at AS subscribed_at,
																exhibitions.id AS exh_id,
																exhibitions.start,
																exhibitions.end
																FROM (exhibition_langs
																INNER JOIN exhibitions exhibitions
																ON (exhibition_langs.exhibition_id = exhibitions.id))
																INNER JOIN exh_members_subscribes
																ON (exh_members_subscribes.exh_id = exhibitions.id)
																WHERE     (exhibition_langs.lang_id = 1)
																AND (exh_members_subscribes.member_id = '.Auth::user()->id.')
															');
    
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
  	if(count($exhibitions) > 0){

  		return view('pages.member.exhibitions.list')
  		->with('NewMessagesCount',$NewMessagesCount)
  		->with('exhibitions',$exhibitions)
  		->with('member_details',$member_details[0]);
  	}else{
  		return view('pages.member.exhibitions.list')
      ->with('NewMessagesCount',$NewMessagesCount)
  		->with('member_details',$member_details[0]);
  	}
  }


  public function MemberExhibitionSubscribe(){
  	
  }


  public function ListMyExhibition(){

    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    // $subscribed_exhibitions = DB::select('SELECT exhibition_langs.name,
    //                                       exhibition_langs.lang_id,
    //                                       exhibition_langs.slug,
    //                                       SUBSTRING(exhibitions.start,1,10) AS start,
    //                                       SUBSTRING(exhibitions.end,1,10) AS end,
    //                                       exhibitions.viewers,
    //                                       exh_exhibitors_subscribes.exhibitor_id,
    //                                       exh_exhibitors_subscribes.exh_id
    //                                       FROM (exhibition_langs
    //                                       INNER JOIN exhibitions exhibitions
    //                                       ON (exhibition_langs.exhibition_id = exhibitions.id))
    //                                       INNER JOIN exh_exhibitors_subscribes
    //                                       ON (exh_exhibitors_subscribes.exh_id = exhibitions.id)
    //                                       WHERE     (exhibition_langs.lang_id = '.$curr_lang->id.')
    //                                       AND (exh_exhibitors_subscribes.exhibitor_id = '.Auth::user()->id.')
                          
    //                                     ');

    $subscribed_exhibitions = DB::select('
                                          SELECT exhibition_langs.name,
                                          exhibition_langs.slug,
                                          exhibitions.video,
                                          SUBSTRING(exhibitions.start,1,10) AS short_start,
                                          SUBSTRING(exhibitions.end,1,10) AS short_end,
                                          exhibitions.start,
                                          exhibitions.end,
                                          exhibition_langs.lang_id,
                                          exh_exhibitors_subscribes.exh_id,
                                          exh_exhibitors_subscribes.paid,
                                          exh_exhibitors_subscribes.exhibitor_id,
                                          exhibitor_details.viewed
                                          FROM ((exhibitor_details exhibitor_details
                                          INNER JOIN
                                          exh_exhibitors_subscribes
                                          exh_exhibitors_subscribes
                                          ON     (exhibitor_details.user_id =
                                          exh_exhibitors_subscribes.exhibitor_id)
                                          AND (exhibitor_details.exh_id = exh_exhibitors_subscribes.exh_id))
                                          INNER JOIN exhibitions exhibitions
                                          ON (exhibitions.id = exh_exhibitors_subscribes.exh_id))
                                          INNER JOIN exhibition_langs exhibition_langs
                                          ON (exhibition_langs.exhibition_id = exhibitions.id)
                                          WHERE     (exhibition_langs.lang_id = '.$curr_lang->id.')
                                          AND (exh_exhibitors_subscribes.paid = 1)
                                          AND (exh_exhibitors_subscribes.exhibitor_id = '.Auth::user()->id.')
                                        ');
                          // return dd($subscribed_exhibitions);
   // SELECT SUBSTRING("2019-06-22 00:00:00", 1, 10) AS start;
                              

    return view('pages.member.exhibitions.list')
    ->with('NewMessagesCount',$NewMessagesCount)
    ->with('member_details',$member_details[0])
    ->with('subscribed_exhibitions',$subscribed_exhibitions);
  }




  public function MemberExhibitionDetails($exh_slug){

    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    $exhibition =  DB::select('SELECT exhibition_langs.name,
                                          exhibition_langs.lang_id,
                                          exhibition_langs.slug,
                                          SUBSTRING(exhibitions.start,1,10) AS start,
                                          SUBSTRING(exhibitions.end,1,10) AS end,
                                          exhibitions.viewers,
                                          exh_cat_trans.cat_name
                                          FROM (exhibition_langs
                                          INNER JOIN exhibitions exhibitions
                                          ON (exhibition_langs.exhibition_id = exhibitions.id))
                                          INNER JOIN exh_cat_trans
                                          ON (exh_cat_trans.exh_cat_id = exhibitions.cat_id)
                                          WHERE     (exhibition_langs.lang_id = '.$curr_lang->id.')
                                          AND (exhibition_langs.slug = "'.$exh_slug.'")
                                          AND (exh_cat_trans.lang_id = '.$curr_lang->id.')
                                        ');
    return view('pages.member.exhibitions.view')
    ->with('NewMessagesCount',$NewMessagesCount)
    ->with('member_details',$member_details[0])
    ->with('exhibition',$exhibition[0]);

  }


  public function MemberExhibitorDetails($exh_slug){
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    // get exh_id 
    $exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id')->first();
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    // get exhibitor details auth
    // get exhibition details
    // get countries
    $countries = DB::table('countries')->select('id','name as country','active')->get();
    // get main categories
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
    $exhibitor_details = Helper::get_exhibitor_details(Auth::user()->id,$curr_lang->id,$exh_id->exh_id);
    if(count($exhibitor_details) > 0)
    {
      return view('pages.member.exhibitors.show')
        ->with('countries',$countries)
        ->with('member_details',$member_details[0])
        ->with('main_categories',$categories)
        ->with('NewMessagesCount',$NewMessagesCount)
        ->with('countries',$countries)
        ->with('exhibitor_details',$exhibitor_details[0]);
    }else{
        return view('pages.member.exhibitors.show')
        ->with('countries',$countries)
        ->with('member_details',$member_details[0])
        ->with('main_categories',$categories)
        ->with('NewMessagesCount',$NewMessagesCount)
        ->with('countries',$countries);
    }
  }


  public function MemberExhibitorDetailsGet($exh_slug){
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id')->first();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    // get exh_id 
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    // get exhibitor details auth
    // get exhibition details
    // get countries
    // get main categories
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
    $exhibitor_details = Helper::get_exhibitor_details(Auth::user()->id,$curr_lang->id,$exh_id->exh_id);
    $account_types = DB::select('
                                  SELECT gender_langs.gener_id AS account_type_id, gender_langs.name AS account_type_name, gender_langs.lang_id
                                  FROM gender_langs gender_langs
                                  INNER JOIN genders genders
                                  ON (gender_langs.gener_id = genders.id)
                                  WHERE (gender_langs.lang_id = '.$curr_lang->id.')
                                ');
    // get exh_id 
    $exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id','slug')->first();
    // get exhibitor details auth
    // get exhibition details
    // get countries
    $countries = DB::table('countries')->select('id','name as country','active')->get();
    // get main categories
    
    if(count($exhibitor_details) > 0)
    {
      return view('pages.member.exhibitors.edit')
        ->with('countries',$countries)
        ->with('member_details',$member_details[0])
        ->with('main_categories',$categories)
        ->with('NewMessagesCount',$NewMessagesCount)
        ->with('countries',$countries)
        ->with('exh_id',$exh_id->exh_id)
        ->with('exh_slug',$exh_id->slug)
        ->with('account_types',$account_types)
        ->with('exhibitor_details',$exhibitor_details[0]);
    }else{
        return view('pages.member.exhibitors.edit')
        ->with('countries',$countries)
        ->with('member_details',$member_details[0])
        ->with('main_categories',$categories)
        ->with('NewMessagesCount',$NewMessagesCount)
        ->with('countries',$countries)
        ->with('exh_slug',$exh_id->slug)
        ->with('account_types',$account_types)
        ->with('exh_id',$exh_id->exh_id);
    }
  }


  public function MemberExhibitorDetailsUpdate(Request $request){
    // return dd($request);
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $account_types = DB::table('gender_langs')->where('lang_id',$curr_lang->id)->select('gener_id as account_type_id','lang_id','name as account_type_name')->get();
    $countries = DB::table('countries')->where('active',1)->select('id','name as country','active')->get();
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
    // exhibitor_details
    $exhibitor_details = DB::select('
                                    SELECT exhibitor_lang.name as exhibitor_name,
                                    exhibitor_lang.address,
                                    exhibitor_lang.about,
                                    exhibitor_lang.slug,
                                    exhibitor_lang.services,
                                    exhibitor_details.gender as account_type_id,
                                    exhibitor_details.phone,
                                    exhibitor_details.category_id,
                                    exhibitor_details.profile_pic,
                                    exhibitor_details.profile_cover,
                                    exhibitor_details.snapchat,
                                    exhibitor_details.youtube,
                                    exhibitor_details.twitter,
                                    exhibitor_details.linkedin,
                                    exhibitor_details.instagram,
                                    exhibitor_details.facebook,
                                    exhibitor_details.website,
                                    exhibitor_details.sales,
                                    exhibitor_details.marketing,
                                    exhibitor_details.ceo,
                                    exhibitor_details.country_id,
                                    exhibitor_details.user_id as exhibitor_id,
                                    exhibitor_details.exh_id
                                    FROM exhibitor_lang
                                    INNER JOIN exhibitor_details
                                    ON (exhibitor_lang.exh_id = exhibitor_details.exh_id)
                                    AND (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
                                    WHERE(exhibitor_details.exh_id = '.$request->exh_id.')
                                    AND(exhibitor_details.user_id = '.Auth::user()->id.')
                                  ');

    //check logic of category
    if($request->country_id == 0)
    {
    Session::flash('error','Please Check Country Form List Again');
    return view('pages.website.Exhibitions.JoinExhibitorProfile')
    ->with('exhibitor_details',$exhibitor_details[0])
    ->with('main_categories',$categories)
    ->with('countries',$countries)
    ->with('account_types',$account_types)
    ->with('exh_id',$exhibitor_details[0]->exh_id)
    ->with('exh_slug',$request->exh_slug);
    }

    if($request->account_type_id == 0){
    Session::flash('error','Please Check Account Type Form List Again');
    return view('pages.website.Exhibitions.JoinExhibitorProfile')
    ->with('exhibitor_details',$exhibitor_details[0])
    ->with('main_categories',$categories)
    ->with('countries',$countries)
    ->with('account_types',$account_types)
    ->with('exh_id',$exhibitor_details[0]->exh_id)
    ->with('exh_slug',$request->exh_slug);
    }

    //check logic of category
    if($request->category_id == 0)
    {
    Session::flash('error','Please Check Category Form List Again');
    return view('pages.website.Exhibitions.JoinExhibitorProfile')
    ->with('exhibitor_details',$exhibitor_details[0])
    ->with('main_categories',$categories)
    ->with('countries',$countries)
    ->with('account_types',$account_types)
    ->with('exh_id',$exhibitor_details[0]->exh_id)
    ->with('exh_slug',$request->exh_slug);
    }



    //check logic of sub category
    if($request->phone == null)
    {
    Session::flash('error','Please Check Phone Number Form List Again');
    return view('pages.website.Exhibitions.JoinExhibitorProfile')
    ->with('exhibitor_details',$exhibitor_details[0])
    ->with('main_categories',$categories)
    ->with('countries',$countries)
    ->with('account_types',$account_types)
    ->with('exh_id',$exhibitor_details[0]->exh_id)
    ->with('exh_slug',$request->exh_slug);
    }
  
    $path_images = public_path().'/images/en/exhibitors';
    $path_images_raw = public_path().'/raw/exhibitors';
    $path_images_thumb = public_path().'/images/en/exhibitors/thumb';
    $path_images_med = public_path().'/images/en/exhibitors/med';
    $path_images_larg = public_path().'/images/en/exhibitors/larg';
    $slug = $request->name.'-'.Auth::user()->id.'-'.$request->exh_id;
    $slug = strtolower(str_replace(' ', '-', $slug));

    if(!file_exists( $path_images )){
      mkdir($path_images, 0777, true);
      File::makeDirectory($path_images, $mode = 0777, true, true);
    }
    if(!file_exists( public_path().'/raw/exhibitors' )){
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


      if(Input::hasFile('logo'))
      {
        $update_logo = DB::table('exhibitor_details')->where('user_id',Auth::user()->id)->where('exh_id',$request->exh_id)->update([
                                                        'profile_pic'=>$slug.'-logo.'.$logoExt,
                                                      ]);
        
        if($update_logo == 1)
        {
          $LogoFlag = 1;
        }else{
          $LogoFlag = 0;
        }

      }


      //update exhibitor details
      $update = DB::table('exhibitor_details')->where('user_id',Auth::user()->id)->where('exh_id',$request->exh_id)
                                                    ->update([
                                                     'user_id'=>Auth::user()->id,
                                                     'exh_id'=>$request->exh_id,
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

      $slug = $request->name.' '.Auth::user()->id;
      $slug = strtolower(str_replace(' ', '-', $slug));
      $update_trans = DB::table('exhibitor_lang')
                          ->where('lang_id',1)
                          ->where('exhibitor_id',Auth::user()->id)
                          ->where('exh_id',$request->exh_id)
                          ->update([
                                    'lang_id'=>1,
                                    'exhibitor_id'=>Auth::user()->id,
                                    'name'=>$request->name,
                                    'slug'=>$slug,
                                    'address'=>$request->address,
                                    'about'=>$request->about,
                                    'services'=>$request->services
                                  ]);

    Session::flash('success','Updated Success!');
    return redirect()->back();
  }
}
