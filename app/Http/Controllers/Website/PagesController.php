<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Helpers\Helper;
use Auth;
use LaravelLocalization;
use App\Faqs;

class PagesController extends Controller
{
   public function homePage(){

    $member_details = [];
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();

 
    if(isset(Auth::user()->id))
    {
        
      $member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
    }
    //$countries = DB::table('countries')->where('active',1)->select('id',''.LaravelLocalization::getCurrentLocale().' as country','active')->get();
    //$countries = DB::table('countries')->where('active',1)->select('id','name','active')->get();
     
    $countries = DB::table('countries')->get();
   
  	// $categories = DB::table('categories')->where('active',1)->where('lang_id',$curr_lang->id)->where('parent_id',null)->get();
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
                           ');

  	$home_slider = DB::table('home_slider')->where('active',1)->get();
    $our_advs = DB::table('our_ads')->where('lang_id',$curr_lang->id)->where('active',1)->orderBy('created_at', 'desc')->get(); //->take(5)
    // $latest_eight_members = DB::select('
    //                                   SELECT member_details.profile_pic,
    //                                   member_details.profile_cover,
    //                                   member_lang.name,
    //                                   member_details.sales,
    //                                   exh_cat_trans.cat_name,
    //                                   exh_cat_trans.lang_id,
    //                                   member_details.rate,
    //                                   member_details.viewed,
    //                                   member_lang.address,
    //                                   member_lang.slug,
    //                                   users.created_at,
    //                                   exh_cat_trans.active
    //                                   FROM ((member_details
    //                                   INNER JOIN users
    //                                   ON (member_details.user_id = users.id))
    //                                   INNER JOIN member_lang
    //                                   ON (member_lang.member_id = member_details.user_id))
    //                                   INNER JOIN exh_cat_trans
    //                                   ON (exh_cat_trans.exh_cat_id = member_details.category_id)
    //                                   WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
    //                                   AND (exh_cat_trans.active = 1)
    //                                   ORDER BY users.created_at DESC
    //                                   limit 8
    $latest_eight_members = DB::select('
                                        SELECT member_details.profile_pic,
                                        member_details.profile_cover,
                                        member_lang.name,
                                        member_details.sales,
                                        exh_cat_trans.cat_name,
                                        exh_cat_trans.lang_id,
                                        member_details.rate,
                                        member_details.viewed,
                                        member_lang.address,
                                        member_lang.slug,
                                        users.created_at,
                                        exh_cat_trans.active,
                                        countries.name AS country_name
                                        FROM ((member_details
                                        INNER JOIN users
                                        ON (member_details.user_id = users.id))
                                        INNER JOIN countries countries
                                        ON (member_details.country_id = countries.id)
                                        INNER JOIN member_lang member_lang
                                        ON (member_lang.member_id = member_details.user_id)
                                        INNER JOIN exh_cat_trans exh_cat_trans
                                        ON (exh_cat_trans.exh_cat_id = member_details.category_id))
                                        WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
                                        AND (exh_cat_trans.active = 1)
                                        ORDER BY users.created_at DESC
                                        limit 8
                                      ');
    $latest_blogs = DB::select('
                                  SELECT blog_trans.slug,
                                  blog_trans.lang_id,
                                  blog_trans.content,
                                  blog_trans.title,
                                  blog_trans.blog_id,
                                  blogs.created_at,
                                  blogs.image,
                                  blog_trans.active
                                  FROM blog_trans blog_trans
                                  INNER JOIN blogs blogs
                                  ON (blog_trans.blog_id = blogs.id)
                                  WHERE (blog_trans.active = 1) AND (blog_trans.lang_id = '.$curr_lang->id.')
                              ');
    

  	$services = DB::table('services')
                            ->where('lang_id',$curr_lang->id)
                            //->whereNull('parent_id')
                            ->where('active',1)->get();
    $our_features = DB::table('our_features')->where('active',1)->where('lang_id',$curr_lang->id)->get();
    $our_sponsors = DB::table('our_sponsors')->where('active',1)->get();
    // up comming exhibitions
    $comming_exhibitions = DB::select('
                                        SELECT exhibition_langs.name AS exh_name,
                                        exhibition_langs.slug AS exh_slug,
                                        exhibitions.start,
                                        exhibitions.end,
                                        exhibitions.shown,
                                        exhibition_langs.lang_id,
                                        exhibition_langs.summary,
                                        exhibition_langs.content,
                                        exhibition_langs.photo AS exh_image
                                        FROM exhibition_langs
                                        INNER JOIN exhibitions
                                        ON (exhibition_langs.exhibition_id = exhibitions.id)
                                        WHERE (exhibitions.shown = 1) AND (exhibition_langs.lang_id = '.$curr_lang->id.')
                                      ');

    if(count($member_details) >0){
      if(count($home_slider) > 0){
        // return dd($home_slider);
        return view('pages.website.home')
        ->with('home_slider',$home_slider)
        ->with('categories',$categories)
        ->with('curr_lang',$curr_lang)
        ->with('countries',$countries)
        ->with('services',$services)
        ->with('our_advs',$our_advs)
        ->with('latest_members',$latest_eight_members)
        ->with('latest_blogs',$latest_blogs)
        ->with('our_features',$our_features)
        ->with('our_sponsors',$our_sponsors)
        ->with('comming_exhibitions',$comming_exhibitions)
        ->with('member_details',$member_details);
      }else{
        // return dd($home_slider);
        return view('pages.website.home')
        ->with('categories',$categories)
        ->with('curr_lang',$curr_lang)
        ->with('countries',$countries)
        ->with('services',$services)
        ->with('our_advs',$our_advs)
        ->with('latest_members',$latest_eight_members)
        ->with('latest_blogs',$latest_blogs)
        ->with('our_features',$our_features)
        ->with('our_sponsors',$our_sponsors)
        ->with('comming_exhibitions',$comming_exhibitions)
        ->with('member_details',$member_details[0]);
      }
    }else{
      if(count($home_slider) > 0){
        // return dd($home_slider);
        return view('pages.website.home')
        ->with('home_slider',$home_slider)
        ->with('categories',$categories)
        ->with('curr_lang',$curr_lang)
        ->with('countries',$countries)
        ->with('services',$services)
        ->with('our_advs',$our_advs)
        ->with('latest_members',$latest_eight_members)
        ->with('latest_blogs',$latest_blogs)
        ->with('our_features',$our_features)
        ->with('our_sponsors',$our_sponsors)
        ->with('comming_exhibitions',$comming_exhibitions);
      }else{
        // return dd($home_slider);
        return view('pages.website.home')
        ->with('categories',$categories)
        ->with('curr_lang',$curr_lang)
        ->with('countries',$countries)
        ->with('services',$services)
        ->with('our_advs',$our_advs)
        ->with('latest_members',$latest_eight_members)
        ->with('latest_blogs',$latest_blogs)
        ->with('our_features',$our_features)
        ->with('our_sponsors',$our_sponsors)
        ->with('comming_exhibitions',$comming_exhibitions);
      }
    }
  	
  	
  }

  public function CommingSoonPage(){
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $our_features = DB::table('our_features')->where('active',1)->where('lang_id',$curr_lang->id)->get();
    return view('pages.website.commingSoon')
    ->with('our_features',$our_features);
  }


  public function FAQs(){
    return view('pages.website.about_'.LaravelLocalization::getCurrentLocale().'');
  }

//   public function FAQs(){

// $lang_id=DB::table('languages')->where('lang',\Lang::locale())->pluck('id')->first();

// $all_faqs=Faqs::with('question')->where('lang_id',$lang_id)->first();
// //dd($all_faqs);
//     return view('pages.website.about',compact('all_faqs'));
//   }


  public function TermsConditions(){
    return view('pages.website.terms_condition_'.LaravelLocalization::getCurrentLocale().'');
  }

  public function Privacy(){
    return view('pages.website.privacy_'.LaravelLocalization::getCurrentLocale().'');
  }


  public function LandingPage(){
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $our_features = DB::table('our_features')->where('active',1)->where('lang_id',$curr_lang->id)->get();
    return view('pages.website.landing_page_'.LaravelLocalization::getCurrentLocale().'')
    ->with('our_features',$our_features);
  }
  
  
  
  public function WhyOnlineExpo($exh_slug){
      $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
      $exhibition_details = DB::select('
																			SELECT exhibition_langs.name AS exh_name,
																			exhibition_langs.slug AS exh_slug,
																			exhibition_langs.photo AS exh_photo,
																			exhibitions.cat_id,
																			exh_cat_trans.cat_name,
																			exh_cat_trans.slug AS cat_slug,
																			exh_cat_trans.lang_id AS exh_cat_lang_id,
																			exhibitions.start,
																			exhibitions.end,
																			exhibition_langs.summary,
																			exh_cat.active AS exh_cat_active,
																			exhibition_langs.active,
																			exhibitions.shown AS exh_shown,
																			exhibitions.id AS exh_id,
																			exhibition_langs.lang_id AS exh_lang_id,
																			exhibitions.subscribe_exhibitors_limit,
																			exhibitions.subscribe_sponsors_limit,
																			exhibitions.cost,
																			exhibitions.viewers
																			FROM ((exhibitions
																			INNER JOIN exh_cat exh_cat
																			ON (exhibitions.cat_id = exh_cat.id))
																			INNER JOIN exh_cat_trans
																			ON (exh_cat_trans.exh_cat_id = exh_cat.id))
																			INNER JOIN exhibition_langs
																			ON (exhibition_langs.exhibition_id = exhibitions.id)
																			WHERE (exhibition_langs.slug = "'.$exh_slug.'")
																			AND(exh_cat_trans.lang_id = '.$curr_lang->id.')
																		');
	$exh_subscribed_count = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exhibition_details[0]->exh_id)->where('paid',1)->count();
      return view('pages.website.WhyOnlineExpo_'.LaravelLocalization::getCurrentLocale().'')->with('exhibition_details',$exhibition_details[0])
      ->with('exh_subscribed_count',$exh_subscribed_count);
  }

}
