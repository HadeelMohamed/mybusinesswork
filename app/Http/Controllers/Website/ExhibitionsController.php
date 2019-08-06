<?php

namespace App\Http\Controllers\Website;

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

class ExhibitionsController extends Controller
{
  public function Exhibitions(Request $request){

   	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
   	$exhibitionCategories = DB::select('
																				SELECT exh_cat_trans.cat_name,
																				exh_cat_trans.slug,
																				exh_cat_trans.active,
																				exh_cat_trans.exh_cat_id as id
																				FROM exh_cat_trans 
																				INNER JOIN exh_cat 
																				ON (exh_cat_trans.exh_cat_id = exh_cat.id)
																				WHERE(exh_cat_trans.lang_id = '.$curr_lang->id.')
 																			');
   	
   	$countries = DB::table('countries')->where('active',1)->get();
   	$exhibitions = DB::select('
																SELECT exhibition_langs.name,
																exhibition_langs.slug,
																exhibitions.country_id,
																exhibitions.cat_id,
																exhibitions.start,
																exhibitions.end,
																exhibition_langs.lang_id,
																exhibition_langs.summary,
																exhibitions.shown,
																exhibition_langs.active,
																exhibitions.id AS exh_id
																FROM exhibition_langs 
																INNER JOIN exhibitions 
																ON (exhibition_langs.exhibition_id = exhibitions.id)
																AND (exhibitions.shown = 1)
																AND (exhibition_langs.active = 1)
																AND (exhibition_langs.lang_id = '.$curr_lang->id.')
																AND (exhibitions.end > "'.date("Y-m-d").'")
																order by exhibitions.start desc
   													 ');
   
   	// return dd($exhibitionCategories,$countries,$exhibitions);
   	return view('pages.website.Exhibitions.Exhibitions')
   	->with('exhibitions',$exhibitions)
   	->with('countries',$countries)
   	->with('exhibitionCategories',$exhibitionCategories);
  }

   public function SearchResultExhibitions(Request $request){
	
   	$q = '';
   	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
   	//$exhibitionCategories = DB::table('exh_cat')->where('lang_id',$curr_lang->id)->get();
   	$exhibitionCategories = DB::select('
																				SELECT exh_cat_trans.cat_name,
																				exh_cat_trans.slug,
																				exh_cat_trans.active,
																				exh_cat_trans.exh_cat_id,
																				exh_cat_trans.lang_id
																				FROM exh_cat_trans 
																				INNER JOIN exh_cat 
																				ON (exh_cat_trans.exh_cat_id = exh_cat.id)
																				WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
 																			');
 																			
 																			
   	$countries = DB::table('countries')->where('active',1)->select('id','name')->get();
   
   	$date = date('Y-m-d');

   	$q = "
						SELECT exhibition_langs.name,
						exhibition_langs.slug as exh_slug,
						exhibition_langs.photo as exh_photo,
						exhibitions.country_id,
						exhibitions.cat_id,
						exhibitions.start,
						exhibitions.end,
						exhibition_langs.lang_id,
						exhibition_langs.summary,
						exhibitions.shown,
						exhibition_langs.active,
						exhibitions.id AS exh_id,
						exhibitions.viewers AS exh_viewers,
						exh_cat_trans.cat_name,
						exh_cat_trans.slug,
						exh_cat_trans.exh_cat_id,
						exh_cat_trans.lang_id AS exh_lang_id,
						countries.name AS country_name
						FROM (((exhibitions
						INNER JOIN exh_cat
						ON (exhibitions.cat_id = exh_cat.id))
						INNER JOIN exhibition_langs
						ON (exhibition_langs.exhibition_id = exhibitions.id))
						INNER JOIN countries
						ON (exhibitions.country_id = countries.id))
						INNER JOIN exh_cat_trans
						ON (exh_cat_trans.exh_cat_id = exh_cat.id)
						WHERE (exhibition_langs.lang_id = $curr_lang->id) AND (exh_cat_trans.lang_id = $curr_lang->id)
						
						
";

//AND (exhibitions.end > '$date 00:00:00')
   	
   	if($request->q != null){
   		$q = $q.'AND(exhibition_langs.name LIKE "%'.$request->q.'%")';
   		// $exhibitions = DB::select($q);
   	}

   	if($request->cat != null){
   		$q = $q.'AND(exhibitions.cat_id = '.$request->cat.')';
   		// $exhibitions = DB::select($q);
   	}

   	if($request->country != null){
   		$q = $q.'AND(exhibitions.country_id = '.$request->country.')';
   	}
   	$q = $q.'order by exhibitions.start desc';
   	$exhibitions = DB::select($q);
   	// sponsors 
   	$exh_sponsors = DB::table('exh_sponsors_subscribes')->get();
   	$expo_instructions = DB::table('expo_instructions')->select('id','title_'.LaravelLocalization::getCurrentLocale().' as title','content_'.LaravelLocalization::getCurrentLocale().' as content')->where('active',1)->get();
	


   	return view('pages.website.Exhibitions.SearchResult')
   	->with('exhibitions',$exhibitions)
   	->with('countries',$countries)
   	->with('exhibitionCategories',$exhibitionCategories)
   	->with('q',$request->q)
   	->with('cat_id',$request->cat)
   	->with('country_id',$request->country)
   	->with('exh_sponsors',$exh_sponsors)
   	->with('expo_instructions',$expo_instructions);
   }


	public function ShowExhibition(Request $request,$slug){
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		// $exh_id = DB::table('exhibition_langs')->where('slug',$slug)->select('exhibition_id')->where('')->first();
		// $exh_lang_details = DB::table('exhibition_langs')->where('exhibition_id',$exh_id->exhibition_id)->where('lang_id',$curr_lang->id)->first();
		// return dd($slug, $exh_id, $exh_lang_details);
		
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
																			WHERE (exhibition_langs.slug = "'.$slug.'") AND (exhibition_langs.slug = "'.$slug.'")
																			AND(exh_cat_trans.lang_id = '.$curr_lang->id.')
																		');
																		

		$exh_subscribed_count = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exhibition_details[0]->exh_id)->where('paid',1)->count();
		
		$exhibitors_limit = $exhibition_details[0]->subscribe_exhibitors_limit;
		$exhibitors_available = $exhibitors_limit - $exh_subscribed_count;

		$exh_sponsors_count = DB::table('exh_sponsors_subscribes')->where('exh_id',$exhibition_details[0]->exh_id)->count();
		$sponsors_limit = $exhibition_details[0]->subscribe_sponsors_limit;
		$sponsors_available = $sponsors_limit - $exh_sponsors_count;
		$add_viewer = DB::table('exhibitions')->where('id',$exhibition_details[0]->exh_id)->first();
		$exh_subscribed_count = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exhibition_details[0]->exh_id)->count();
		$members_limit = $exhibition_details[0]->subscribe_exhibitors_limit;
		$members_available = $members_limit - $exh_subscribed_count;
		//$exhibitor_joined = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exhibition_details[0]->exh_id)->where('exhibitor_id',Auth::user()->id)->count();
		//$sponsor_joined = DB::table('exh_sponsors_subscribes')->where('exh_id',$exhibition_details[0]->exh_id)->where('exhibitor_id',Auth::user()->id)->count();
		
		// add viewers 
		$added = $add_viewer->viewers + 1;
		// update added
		DB::table('exhibitions')->where('id',$exhibition_details[0]->exh_id)->update(['viewers'=>$added]);
		//$exh_limits_count = $exhibition_details[0]->id;
		if(count($exhibition_details) > 0){
			return view('pages.website.Exhibitions.ExhibitionDetails')
			->with('exh_subscribed_count',$exh_subscribed_count)
				->with('exhibition_details',$exhibition_details[0])
				->with('exhibitors_available',$exhibitors_available)
				->with('sponsors_available',$sponsors_available)
				->with('exh_slug',$slug)
				->with('members_available',$members_available);
				//->with('exhibitor_joined',$exhibitor_joined)
				//->with('sponsor_joined',$sponsor_joined);
		}else{
			return redirect()->back();
		}
		
	}


	public function ShowExhibitionDetails(Request $request,$slug){

		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		// $exh_id = DB::table('exhibition_langs')->where('slug',$slug)->select('exhibition_id')->where('')->first();
		// $exh_lang_details = DB::table('exhibition_langs')->where('exhibition_id',$exh_id->exhibition_id)->where('lang_id',$curr_lang->id)->first();
		// return dd($slug, $exh_id, $exh_lang_details);
		$exhibition_details = DB::select('
																			SELECT exhibition_langs.name AS exh_name,
																			exhibition_langs.slug AS exh_slug,
																			exhibition_langs.photo AS exh_photo,
																			exhibitions.cat_id,
																			exh_cat.name AS cat_name,
																			exh_cat.slug AS cat_slug,
																			exh_cat.lang_id,
																			exhibitions.start,
																			exhibitions.end,
																			exhibition_langs.summary,
																			exh_cat.active AS cat_active,
																			exhibition_langs.active AS exh_active,
																			exhibitions.id AS exh_id,
																			exhibition_langs.lang_id as exh_lang_id
																			FROM (exh_cat 
																			INNER JOIN exhibition_langs 
																			ON (exh_cat.lang_id = exhibition_langs.lang_id))
																			INNER JOIN exhibitions
																			ON     (exhibition_langs.exhibition_id = exhibitions.id)
																			AND (exhibition_langs.lang_id = exh_cat.id)
																			WHERE (exhibition_langs.lang_id = '.$curr_lang->id.')
																			AND (exhibition_langs.slug = "'.$slug.'")
																		');


		if(count($exhibition_details) > 0){
			return view('pages.website.Exhibitions.ExhibitionDetails')
				->with('exhibition_details',$exhibition_details[0]);
		}else{
			return view('pages.website.Exhibitions.ExhibitionDetails');
		}
		
	}


	public function ShowExhibitionCompaniesSpodors(Request $request, $slug){
		// return dd($request, $slug);
		// current language
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		// categories
		$categories = DB::select('
																SELECT exh_cat_trans.cat_name,
																exh_cat_trans.lang_id,
																exh_cat_trans.exh_cat_id
																FROM exh_cat_trans
																INNER JOIN exh_cat
																ON (exh_cat_trans.exh_cat_id = exh_cat.id)
																WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
														');
		// get exhibition data
		$exhibition_data = DB::select('
																		SELECT exhibitions.shown,
																		exhibition_langs.name,
																		exhibition_langs.slug,
																		exhibition_langs.lang_id,
																		exhibition_langs.exhibition_id,
																		exhibition_langs.active
																		FROM exhibition_langs exhibition_langs
																		INNER JOIN exhibitions exhibitions
																		ON (exhibition_langs.exhibition_id = exhibitions.id)
																		WHERE (exhibition_langs.lang_id = '.$curr_lang->id.')
																		AND(exhibition_langs.slug = "'.$slug.'")

																');
		// countries
		$countries = DB::table('countries')->get();
		
		// $exhibitors = DB::select('
		// 														SELECT exh_cat_trans.exh_cat_id AS cat_id,
		// 														member_lang.name AS exhibitor_name,
		// 														exh_cat_trans.lang_id AS exh_cat_lang_id,
		// 														exhibition_langs.slug AS exhibitor_slug,
		// 														member_details.profile_pic,
  //      													member_details.profile_cover,
  //      													exh_cat_trans.cat_name AS category_name
		// 														FROM ((((((exhibitions exhibitions
		// 														INNER JOIN countries countries
		// 														ON (exhibitions.country_id = countries.id))
		// 														INNER JOIN
		// 														exh_exhibitors_subscribes exh_exhibitors_subscribes
		// 														ON (exh_exhibitors_subscribes.exh_id = exhibitions.id))
		// 														INNER JOIN exh_cat exh_cat
		// 														ON     (exh_exhibitors_subscribes.exh_cat_id = exh_cat.id)
		// 														AND (exhibitions.cat_id = exh_cat.id))
		// 														INNER JOIN member_details member_details
		// 														ON     (exh_exhibitors_subscribes.member_id = member_details.user_id)
		// 														AND (member_details.country_id = countries.id))
		// 														INNER JOIN member_lang member_lang
		// 														ON (member_lang.member_id = member_details.user_id))
		// 														INNER JOIN exhibition_langs exhibition_langs
		// 														ON (exhibition_langs.exhibition_id = exhibitions.id))
		// 														INNER JOIN exh_cat_trans exh_cat_trans
		// 														ON (exh_cat_trans.exh_cat_id = exh_cat.id)
		// 														WHERE     (exh_cat_trans.lang_id = '.$curr_lang->id.')
		// 														AND (exhibition_langs.slug LIKE "'.$slug.'")
		// 												');

		// $exhibitors = DB::select('
		// 													SELECT exh_cat_trans.cat_name AS category_name,
		// 													exhibition_langs.name AS exhibition_name,
		// 													member_details.profile_pic,
		// 													member_details.profile_cover,
		// 													exh_cat_trans.exh_cat_id AS cat_id,
		// 													exhibition_langs.slug AS exhibitor_slug,
		// 													exhibition_langs.active,
		// 													exh_cat_trans.lang_id AS exh_cat_trans_lang_id,
		// 													member_lang.name AS exhibitor_name,
		// 													member_lang.slug AS exhibitor_slug
		// 													FROM (((exh_cat_trans exh_cat_trans
		// 													INNER JOIN exhibition_langs exhibition_langs
		// 													ON (exh_cat_trans.lang_id = exhibition_langs.lang_id))
		// 													INNER JOIN
		// 													exh_exhibitors_subscribes exh_exhibitors_subscribes
		// 													ON     (exh_exhibitors_subscribes.exh_cat_id =
		// 													exh_cat_trans.exh_cat_id)
		// 													AND (exh_exhibitors_subscribes.exh_id =
		// 													exhibition_langs.exhibition_id))
		// 													INNER JOIN member_details member_details
		// 													ON (exh_exhibitors_subscribes.member_id = member_details.user_id))
		// 													INNER JOIN member_lang member_lang
		// 													ON (member_lang.member_id = member_details.user_id)
		// 													WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
		// 												');

		// $exhibitors = DB::select('
		// 														SELECT exhibitor_data.exhibitor_name,
		// 														exhibitor_data.about,
		// 														exhibitor_data.services,
		// 														exhibitor_data.exhibitor_profile_pic,
		// 														exhibitor_data.exhibitor_cover,
		// 														exhibitor_data.exh_id,
		// 														exhibitor_data.exhibitor_id,
		// 														exhibition_langs.lang_id,
		// 														exhibitor_data.exhibitor_slug
		// 														FROM exhibition_langs exhibition_langs
		// 														INNER JOIN exhibitor_data exhibitor_data
		// 														ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id)
		// 														WHERE     (exhibition_langs.lang_id = '.$curr_lang->id.')
		// 														AND(exhibitor_data.exh_id = '.$exhibition_data[0]->exhibition_id.')
																
		// 												');
		$exhibitors = [];
		// all members

		// $sponsors = DB::select('
		// 													SELECT exh_sponsors_subscribes.photo,
		// 													exh_cat_trans.lang_id,
		// 													member_lang.slug AS member_slug
		// 													FROM ((((exhibitions 
		// 													INNER JOIN exh_cat exh_cat
		// 													ON (exhibitions.cat_id = exh_cat.id))
		// 													INNER JOIN
		// 													exh_sponsors_subscribes 
		// 													ON     (exh_sponsors_subscribes.exh_id = exhibitions.id)
		// 													AND (exh_sponsors_subscribes.exh_cat_id = exh_cat.id))
		// 													INNER JOIN member_details 
		// 													ON (exh_sponsors_subscribes.member_id = member_details.user_id))
		// 													INNER JOIN member_lang 
		// 													ON (member_lang.member_id = member_details.user_id))
		// 													INNER JOIN exh_cat_trans 
		// 													ON (exh_cat_trans.exh_cat_id = exh_cat.id)
		// 													WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
		// 													AND(exh)
		// 											');

		// $sponsors = DB::select('
		// 														SELECT member_lang.name AS sponsor_name,
		// 														member_details.profile_pic,
		// 														exhibition_langs.lang_id,
		// 														exh_sponsors_subscribes.member_id,
		// 														exhibition_langs.name,
		// 														exhibition_langs.exhibition_id,
		// 														exh_cat_trans.cat_name,
		// 														exh_cat_trans.exh_cat_id,
		// 														member_lang.slug as member_slug,
		// 														member_details.profile_pic AS photo
		// 														FROM (((exh_cat_trans exh_cat_trans
		// 														INNER JOIN exhibition_langs exhibition_langs
		// 														ON (exh_cat_trans.lang_id = exhibition_langs.lang_id))
		// 														INNER JOIN
		// 														exh_sponsors_subscribes exh_sponsors_subscribes
		// 														ON     (exh_sponsors_subscribes.exh_cat_id =
		// 														exh_cat_trans.exh_cat_id)
		// 														AND (exh_sponsors_subscribes.exh_id =
		// 														exhibition_langs.exhibition_id))
		// 														INNER JOIN member_details member_details
		// 														ON (exh_sponsors_subscribes.member_id = member_details.user_id))
		// 														INNER JOIN member_lang member_lang
		// 														ON (member_lang.member_id = member_details.user_id)
		// 														WHERE (exhibition_langs.lang_id = 1) AND (exhibition_langs.exhibition_id = '.$exhibition_data[0]->exhibition_id.')
														
		// 											');
		$sponsors = [];


		# WHERE     (exh_sponsors_subscribes.exh_cat_id = 1)
		// return
		return view('pages.website.Exhibitions.ExhibitionMembersSponsors')
		->with('categories',$categories)
		->with('countries',$countries)
		->with('exhibitors',$exhibitors)
		->with('sponsors',$sponsors)
		->with('exh_slug',$slug);
	}


	public function ShowExhibitionMemberProfile(Request $request, $exhibition_slug,$exhibitor_slug){
		//get exhibitor details with products
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		# Exhibitor data details
		$exhibitor_details = DB::select('
																			SELECT exhibitor_data.exhibitor_name,
																			exhibitor_data.about,
																			exhibitor_data.services,
																			exhibitor_data.exhibitor_profile_pic,
																			exhibitor_data.exhibitor_cover,
																			exhibitor_data.exh_id,
																			exhibitor_data.exhibitor_id,
																			exhibition_langs.lang_id,
																			exhibitor_data.exhibitor_slug
																			FROM exhibition_langs exhibition_langs
																			INNER JOIN exhibitor_data exhibitor_data
																			ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id)
																			WHERE     (exhibition_langs.lang_id = '.$curr_lang->id.')
																			AND (exhibitor_data.exhibitor_slug = "'.$exhibitor_slug.'")
																	');
		// $exhibitorDetails = DB::select('
		// 																	SELECT categories_trans.name AS cat_name,
		// 																	member_lang.name AS exhibitor_name,
		// 																	member_details.profile_pic,
		// 																	member_details.profile_cover,
		// 																	member_details.rate,
		// 																	users.email,
		// 																	categories_trans.lang_id,
		// 																	member_lang.slug,
		// 																	exhibitor_data.exhibitor_id AS exhibitor_id,
		// 																	exhibitor_data.exh_id,
		// 																	member_details.viewed,
		// 																	exhibition_langs.slug AS exh_slug,
		// 																	exhibition_langs.exhibition_id,
		// 																	exhibition_langs.lang_id
		// 																	FROM (((((member_details member_details
		// 																	INNER JOIN categories categories
		// 																	ON     (member_details.sub_category_id = categories.id)
		// 																	AND (member_details.category_id = categories.id))
		// 																	INNER JOIN exhibitor_data exhibitor_data
		// 																	ON (exhibitor_data.exhibitor_id = member_details.user_id))
		// 																	INNER JOIN exhibition_langs exhibition_langs
		// 																	ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
		// 																	INNER JOIN member_lang member_lang
		// 																	ON (member_lang.member_id = member_details.user_id))
		// 																	INNER JOIN categories_trans categories_trans
		// 																	ON (categories_trans.sector_id = categories.id))
		// 																	INNER JOIN users users
		// 																	ON (users.id = member_details.user_id)
		// 																	WHERE (categories_trans.lang_id = '.$curr_lang->id.')
		// 																	AND (member_lang.slug = "'.$exhibitor_slug.'")
		// 																	AND (exhibition_langs.lang_id = '.$curr_lang->id.')
		// 											 				');
		$exhibitorDetails = DB::select('
																			SELECT users.email AS exhibitor_email, member_lang.name, member_lang.slug
																			FROM (member_details member_details
																			INNER JOIN users users
																			ON (member_details.user_id = users.id))
																			INNER JOIN member_lang member_lang
																			ON (member_lang.member_id = member_details.user_id)
																			where(member_lang.slug = "'.$exhibitor_slug.'")
																	');
		
		// return dd($exhibitorDetails);
		$exhibitor_data = DB::table('exhibitor_data')->where('exhibitor_id',$exhibitorDetails[0]->exhibitor_id)->where('exh_id',$exhibitorDetails[0]->exh_id)->first();

		return view('pages.website.Exhibitions.ExhibitorDetailsProfile')
		->with('exhibitor_details',$exhibitorDetails[0])
		->with('exhibitor_slug',$exhibitor_slug)
		->with('exhibition_slug',$exhibition_slug)
		->with('exhibitor_data',$exhibitor_data);
	}


	public function ShowExhibitionMemberProducts(Request $request, $exhibition_slug, $exhibitor_slug){
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();

		$exhibitorDetails = DB::select('
																			SELECT categories_trans.name AS cat_name,
																			member_lang.name AS exhibitor_name,
																			member_details.profile_pic,
																			member_details.profile_cover,
																			member_details.rate,
																			users.email,
																			categories_trans.lang_id,
																			member_lang.slug,
																			exhibitor_data.exhibitor_id AS exhibitor_id,
																			exhibitor_data.exh_id,
																			member_details.viewed,
																			exhibition_langs.slug AS exh_slug,
																			exhibition_langs.exhibition_id,
																			exhibition_langs.lang_id
																			FROM (((((member_details member_details
																			INNER JOIN categories categories
																			ON     (member_details.sub_category_id = categories.id)
																			AND (member_details.category_id = categories.id))
																			INNER JOIN exhibitor_data exhibitor_data
																			ON (exhibitor_data.exhibitor_id = member_details.user_id))
																			INNER JOIN exhibition_langs exhibition_langs
																			ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
																			INNER JOIN member_lang member_lang
																			ON (member_lang.member_id = member_details.user_id))
																			INNER JOIN categories_trans categories_trans
																			ON (categories_trans.sector_id = categories.id))
																			INNER JOIN users users
																			ON (users.id = member_details.user_id)
																			WHERE (categories_trans.lang_id = '.$curr_lang->id.')
																			AND (member_lang.slug = "'.$exhibitor_slug.'")
																			AND (exhibition_langs.lang_id = '.$curr_lang->id.')
													 				');
		// get exhibitor details
		$exhibitor = DB::select('
															SELECT categories_trans.name AS category,
															member_lang.name AS name,
															member_details.profile_pic,
															member_details.profile_cover,
															member_details.rate,
															users.email,
															member_lang.slug,
															exhibitor_data.exhibitor_id AS exhibitor_id,
															exhibitor_data.exh_id,
															member_details.viewed,
															exhibition_langs.slug AS exh_slug,
															exhibition_langs.exhibition_id,
															exhibition_langs.lang_id,
															categories_trans.lang_id,
															countries.name AS country,
															member_lang.address,
															member_details.phone
															FROM ((((((member_details member_details
															INNER JOIN categories categories
															ON     (member_details.sub_category_id = categories.id)
															AND (member_details.category_id = categories.id))
															INNER JOIN exhibitor_data exhibitor_data
															ON (exhibitor_data.exhibitor_id = member_details.user_id))
															INNER JOIN exhibition_langs exhibition_langs
															ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
															INNER JOIN member_lang member_lang
															ON (member_lang.member_id = member_details.user_id))
															INNER JOIN users users
															ON (users.id = member_details.user_id))
															INNER JOIN countries countries
															ON (member_details.country_id = countries.id))
															INNER JOIN categories_trans categories_trans
															ON (categories_trans.sector_id = categories.id)
															WHERE (exhibition_langs.lang_id = '.$curr_lang->id.') AND (categories_trans.lang_id = '.$curr_lang->id.')
															AND (member_lang.slug = "'.$exhibitor_slug.'")
															
													 ');


		$products = DB::select('
															SELECT member_products.name,
															member_products.slug AS pro_slug,
															member_products.visibility AS pro_visibility,
															exhibition_products_selector.pro_id,
															exhibition_products_selector.exhibitor_id,
															member_pro_images.image,
															member_lang.slug AS exhibitor_slug
															FROM (((exhibition_products_selector
															exhibition_products_selector
															INNER JOIN member_products member_products
															ON (exhibition_products_selector.pro_id = member_products.id))
															INNER JOIN member_details member_details
															ON (exhibition_products_selector.exhibitor_id =
															member_details.user_id))
															INNER JOIN member_lang member_lang
															ON (member_lang.member_id = member_details.user_id))
															INNER JOIN member_pro_images member_pro_images
															ON (member_pro_images.pro_id = member_products.id)
															GROUP BY member_products.slug
															HAVING (member_lang.slug = "'.$exhibitor_slug.'")
															AND (member_products.visibility = 2 or member_products.visibility = 3)
													');

		// $pro_images = DB::table('exhibition_members_pros_images')->whereIn('pro_id',[1,3])->first();

		return view('pages.website.Exhibitions.exhibitor_products.list')
		->with('products',$products)
		->with('exhibitor',$exhibitor[0])
		// ->with('pro_images',$pro_images)
		->with('exhibitor_slug',$exhibitor_slug)
		->with('exhibition_slug',$exhibition_slug);
	}



	public function exhibitionProductDetails(Request $request, $pro_slug, $exh_slug, $exhibitor_slug){
    // language
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $exhibitorDetails = DB::select('
																			SELECT categories_trans.name AS cat_name,
																			member_lang.name AS exhibitor_name,
																			member_details.profile_pic,
																			member_details.profile_cover,
																			member_details.rate,
																			users.email,
																			categories_trans.lang_id,
																			member_lang.slug,
																			exhibitor_data.exhibitor_id AS exhibitor_id,
																			exhibitor_data.exh_id,
																			member_details.viewed,
																			exhibition_langs.slug AS exh_slug,
																			exhibition_langs.exhibition_id,
																			exhibition_langs.lang_id
																			FROM (((((member_details member_details
																			INNER JOIN categories categories
																			ON     (member_details.sub_category_id = categories.id)
																			AND (member_details.category_id = categories.id))
																			INNER JOIN exhibitor_data exhibitor_data
																			ON (exhibitor_data.exhibitor_id = member_details.user_id))
																			INNER JOIN exhibition_langs exhibition_langs
																			ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
																			INNER JOIN member_lang member_lang
																			ON (member_lang.member_id = member_details.user_id))
																			INNER JOIN categories_trans categories_trans
																			ON (categories_trans.sector_id = categories.id))
																			INNER JOIN users users
																			ON (users.id = member_details.user_id)
																			WHERE (categories_trans.lang_id = '.$curr_lang->id.')
																			AND (member_lang.slug = "'.$exhibitor_slug.'")
																			AND (exhibition_langs.lang_id = '.$curr_lang->id.')
													 				');
    // get exhibitor details
		$exhibitor = DB::select('
															SELECT categories_trans.name AS category,
															member_lang.name AS name,
															member_details.profile_pic,
															member_details.profile_cover,
															member_details.rate,
															users.email,
															member_lang.slug,
															exhibitor_data.exhibitor_id AS exhibitor_id,
															exhibitor_data.exh_id,
															member_details.viewed,
															exhibition_langs.slug AS exh_slug,
															exhibition_langs.exhibition_id,
															exhibition_langs.lang_id,
															categories_trans.lang_id,
															countries.name AS country,
															member_lang.address,
															member_details.phone
															FROM ((((((member_details member_details
															INNER JOIN categories categories
															ON     (member_details.sub_category_id = categories.id)
															AND (member_details.category_id = categories.id))
															INNER JOIN exhibitor_data exhibitor_data
															ON (exhibitor_data.exhibitor_id = member_details.user_id))
															INNER JOIN exhibition_langs exhibition_langs
															ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
															INNER JOIN member_lang member_lang
															ON (member_lang.member_id = member_details.user_id))
															INNER JOIN users users
															ON (users.id = member_details.user_id))
															INNER JOIN countries countries
															ON (member_details.country_id = countries.id))
															INNER JOIN categories_trans categories_trans
															ON (categories_trans.sector_id = categories.id)
															WHERE (exhibition_langs.lang_id = '.$curr_lang->id.') AND (categories_trans.lang_id = '.$curr_lang->id.')
															AND (member_lang.slug = "'.$exhibitor_slug.'")
													 ');

		$exhibitor_data = DB::table('exhibitor_data')->where('exhibitor_id',$exhibitorDetails[0]->exhibitor_id)->where('exh_id',$exhibitorDetails[0]->exh_id)->first();
    //product_details
    $product_details = DB::table('member_products')
    										->where('slug',$pro_slug)
                        ->get();

    //specifications
    $specifications = DB::table('member_pro_specifications')
                          ->where('pro_id',$product_details[0]->id)
                          ->get();
    //galleries
    $galleries = DB::table('member_pro_images')
                          ->where('pro_id',$product_details[0]->id)
                          ->get();


    // get other productss of current exhibitor products
    //$other_products = DB::table('');

		return view('pages.website.Exhibitions.exhibitor_products.pro_details')
		->with('product_details',$product_details[0])
		->with('specifications',$specifications)
		->with('galleries',$galleries)
		->with('exhibitor',$exhibitor[0])
		->with('exhibitor_data',$exhibitor_data)
		->with('exhibitor_slug',$exhibitor_slug)
		->with('exhibition_slug',$exh_slug);
	}


	public function exhibitionJoinProfile(Request $request, $exh_slug, $flag){
		$exh_slug = str_replace(',1', '', $exh_slug);
		$exh_slug = str_replace(',2', '', $exh_slug);
		// check exist
		$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id','name as exh_name')->first();
		$checExhibitorExist = DB::table('exhibitor_details')->where('exh_id',$exh_id->exh_id)->where('user_id',Auth::user()->id)->count();
		//get all main Categories
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
    // $account_types = DB::select('
    //                               SELECT gender_langs.gener_id AS account_type_id, gender_langs.name AS account_type_name, gender_langs.lang_id
    //                               FROM gender_langs gender_langs
    //                               INNER JOIN genders genders
    //                               ON (gender_langs.gener_id = genders.id)
    //                               WHERE (gender_langs.lang_id = '.$curr_lang->id.')
    //                             ');
		if($checExhibitorExist > 0){
			// Session::flash('Information','Already Joined');
			// return redirect()->back();
			###### get from exhibitor details #######

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
																				exhibitor_details.country_id,
																				exhibitor_details.profile_pic,
																				exhibitor_details.profile_cover,
																				exhibitor_details.ceo,
																				exhibitor_details.marketing,
																				exhibitor_details.sales,
																				exhibitor_details.website,
																				exhibitor_details.facebook,
																				exhibitor_details.instagram,
																				exhibitor_details.linkedin,
																				exhibitor_details.twitter,
																				exhibitor_details.snapchat,
																				exhibitor_details.youtube,
																				exhibitor_details.exh_id,
																				exhibitor_details.user_id as exhibitor_id
																				FROM exhibitor_lang
																				INNER JOIN exhibitor_details
																				ON (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
																				WHERE (exhibitor_details.exh_id = '.$exh_id->exh_id.')
																				AND (exhibitor_details.user_id = '.Auth::user()->id.')
																			');

			// return view('pages.website.Exhibitions.existExhibitorProfile')
			if($flag == 1){
                  	// go to exhibitor products
                  	$url = url('/');
                  return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug)
                  ->with('exhibitor_details',$exhibitor_details[0])
                  ->with('main_categories',$categories)
                  ->with('countries',$countries)
                  ->with('account_types',$account_types)
                  ->with('exh_slug',$request->exh_slug);
                  }else{
                  	// go to exhibitor informations
                  	return view('pages.website.Exhibitions.existExhibitorProfile')
                  ->with('exhibitor_details',$exhibitor_details[0])
                  ->with('main_categories',$categories)
                  ->with('countries',$countries)
                  ->with('account_types',$account_types)
                  ->with('exh_slug',$request->exh_slug);
                  }
		}else{
			######### get from member details ##############
			$member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
	    
	    	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
	    // $AllReadyExist = DB::table('member_details')->where('user_id',Auth::user()->id)->count();

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

	    if(count($member_details) > 0){
			return view('pages.website.Exhibitions.JoinExhibitorProfile')
			->with('NewMessagesCount',$NewMessagesCount)
			->with('exh_id',$exh_id->exh_id)
			->with('member_details',$member_details[0])
			// ->with('ExhProList',$ExhProList)
			->with('exh_slug',$request->exh_slug)
			->with('pro_slug'.$request->pro_slug)
			// ->with('selected_products',$selected_products)
			// ->with('languages',$languages)
			// ->with('exh_details',$exh_details)
			// ->with('exh_name',$exh_id->exh_name)
			// ->with('total_exhibitor_subscribe',$total_exhibitor_subscribe)
			->with('exh_id',$exh_id->exh_id)
			// ->with('checkAllReadyExhJoinedCount',$checkAllReadyExhJoinedCount)
			->with('exh_slug',$exh_slug)
			// ->with('AllReadyExist ',$AllReadyExist)
			->with('account_types',$account_types)
			->with('countries',$countries)
			->with('main_categories',$categories);
		}else{
			return redirect()->route('Authed_Member_Profile');
		}

		}
		
    



		// set selected products array
		// $selected_products_array = array();
  // 	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
		
		// $exh_details = DB::table('exhibitions')->where('id',$exh_id->exh_id)->first();
		// $total_exhibitor_subscribe = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exh_id->exh_id)->where('paid', 1)->count();
		// // other_products
		// $selected_products = DB::select('
		// 																	SELECT member_products.name,
		// 																	member_products.id as pro_id,
		// 																	member_products.active,
		// 																	exhibition_products_selector.exh_id,
		// 																	exhibition_products_selector.exhibitor_id
		// 																	FROM exhibition_products_selector
		// 																	INNER JOIN member_products
		// 																	ON (exhibition_products_selector.pro_id = member_products.id)
		// 																	WHERE (exhibition_products_selector.exh_id = '.$exh_id->exh_id.')
		// 																	AND (exhibition_products_selector.exhibitor_id = '.Auth::user()->id.')
		// 																');

		// //fill selected products
		// foreach ($selected_products as $key => $value) {
		// 	array_push($selected_products_array,$value->pro_id);
		// }


		// $ExhProList = DB::table('member_products')->where('member_id',Auth::user()->id)->where('visibility',2)->Orwhere('visibility',3)->whereNotIn('id',$selected_products_array)->select('name as pro_name','id','slug as pro_slug')->where('active',1)->get();
		// $checkAllReadyExhJoinedCount = DB::table('exh_exhibitors_subscribes')->where('exh_id',$exh_id->exh_id)->where('exhibitor_id',Auth::user()->id)->count();

		
		
	}


	public function exhibitionJoinProfilePost(Request $request){

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

    $FiledsFlag = 0;
    $LogoFlag = 0;
    $CoverFlag = 0;
    $TransFlag = 0;
    // get language details
    // 1elper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
    // create folders for images
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

    

    ###### check exist ######
    $CheckExhibitorDetailsDuplicate = DB::table('exhibitor_details')->where('user_id',Auth::user()->id)->where('exh_id',$request->exh_id)->count();
    $CheckExhibitorLangsDuplicate = DB::table('exhibitor_lang')->where('exh_id',$request->exh_id)->where('exhibitor_id',Auth::user()->id)->where('lang_id',1)->count();
    if($CheckExhibitorDetailsDuplicate > 0){
    	###### update section ######

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

      if(Input::hasFile('cover')){
        //update member details
        $update_cover = DB::table('exhibitor_details')->where('user_id',Auth::user()->id)->where('exh_id',$request->exh_id)->update([
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
    	
      if($update == 1)
      {
        $FiledsFlag =1;
      }else{
        $FiledsFlag =0;
      }

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
      
      if($update_trans == 1)
      {
        $TransFlag =1;
      }else{
        $TransFlag =0;
      }

      if($FiledsFlag == 1 or $LogoFlag == 1 or $CoverFlag == 1 or $TransFlag == 1) 
      {

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
        
        DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
        Session::flash('success','Your Exhibitor Profile Saved Successfully!');
        
        // return view('pages.website.Exhibitions.existExhibitorProfile')
       if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{

       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                  	
                
      }else{

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
      	DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
        Session::flash('no_change','No Changes To Saving It!');
        // return view('pages.website.Exhibitions.existExhibitorProfile')
                  	if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                
      }   



    }else{
    	###### insert section ######
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
              $id = DB::table('exhibitor_details')
                           ->insertGetId([
                           							 'user_id'=>Auth::user()->id,
                           							 'exh_id'=>$request->exh_id,
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
              $check_exist = DB::table('exhibitor_lang')
                               ->where('exhibitor_id',Auth::user()->id)
                               ->where('exh_id',$request->exh_id)
                               ->where('lang_id',1)
                               ->count();

               
              if($check_exist > 0)
              {
                #update member trans
                $update_trans = DB::table('exhibitor_lang')
                                  ->where('lang_id',1)
                                  ->where('exh_id', $request->exh_id)
                                  ->where('exhibitor_id',Auth::user()->id)
                                  ->update([
                                            'lang_id'=>1,
                                            'exhibitor_id'=>Auth::user()->id,
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
                  
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  	if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                  
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  	if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                 
                }
              }else{
                #update member trans
                $update_trans = DB::table('exhibitor_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'exhibitor_id'=>Auth::user()->id,
                                            'exh_id'=>$request->exh_id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
                  
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                 if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }
              }
            }else{
              // save logo
              $id = DB::table('exhibitor_details')
                           ->insertGetId([
                           					     'user_id'=>Auth::user()->id,
                           					     'exh_id'=>$request->exh_id,
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
                           Session::flash('success','Your Exhibitor Profile Saved Successfully!');
              # insert member trans
              // check exist
              //$lang = Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
              $compose_slug = $request->name.' '.Auth::user()->id;
              $slug = strtolower(str_replace(' ', '-', $compose_slug));
              $check_exist = DB::table('exhibitor_lang')
                               ->where('exhibitor_id',Auth::user()->id)
                               ->where('exh_id',$request->exh_id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
                $update_trans = DB::table('exhibitor_lang')
                                  ->where('lang_id',1)
                                  ->where('exh_id',$request->exh_id)
                                  ->update([
                                            'lang_id'=>1,
                                            'exhibitor_id'=>Auth::user()->id,
                                            'exh_id'=>$request->exh_id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
                  
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }
              }else{
                #update member trans
                $update_trans = DB::table('exhibitor_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'exhibitor_id'=>Auth::user()->id,
                                            'exh_id'=>$request->exh_id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
                  
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }
              }
            }
            
            
          }elseif(Input::has('cover')){
            $coverExt = Input::file('cover')->getClientOriginalExtension();
            // save cover and fields
            // save logo and cover with data and discount from wallet
              $id = DB::table('exhibitor_details')
                           ->insertGetId([
                           	             'user_id'=>Auth::user()->id,
                           	             'exh_id'=>$request->exh_id,
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
              $check_exist = DB::table('exhibitor_lang')
                               ->where('exhibitor_id',Auth::user()->id)
                               ->where('exh_id',$request->exh_id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
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
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }
              }else{
                #update member trans
                $update_trans = DB::table('exhibitor_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'exhibitor_id'=>Auth::user()->id,
                                            'exh_id'=>$request->exh_id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
																			exhibitor_details.twitter,
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
                  
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }
              }
          }else{
            // insert fields only
            // save logo and cover with data and discount from wallet
              $id = DB::table('exhibitor_details')
                           ->insertGetId([
                           	             'user_id'=>Auth::user()->id,
                           	             'exh_id'=>$request->exh_id,
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
                           Session::flash('success','Your Exhibitor Profile Saved Successfully!');
              # insert member trans
              // check exist
              //$lang = Helper::CurrLangDetails(LaravelLocalization::getCurrentLocale());
              $compose_slug = $request->name.' '.Auth::user()->id;
              $slug = strtolower(str_replace(' ', '-', $compose_slug));
              $check_exist = DB::table('exhibitor_lang')
                               ->where('exhibitor_id',Auth::user()->id)
                               ->where('exh_id', $request->exh_id)
                               ->where('lang_id',1)
                               ->count();
              if($check_exist > 0)
              {
                #update member trans
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
                                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
                  
                  DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }else{

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                }
              }else{
                #update member trans
                $update_trans = DB::table('exhibitor_lang')
                                  ->insert([
                                            'lang_id'=>1,
                                            'exhibitor_id'=>Auth::user()->id,
                                            'exh_id'=>$request->exh_id,
                                            'name'=>$request->name,
                                            'slug'=>$slug,
                                            'address'=>$request->address,
                                            'about'=>$request->about,
                                            'services'=>$request->services
                                          ]);
                                  Session::flash('success','Your Exhibitor Profile Saved Successfully!');
                if($update_trans)
                {
                  $TransFlag = 1;
                }else{
                  $TransFlag = 0;
                }

                if($TransFlag == 1)
                {

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
                	if(count($exhibitor_details) > 0){
                		
                		DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
                		
	                  // return view('pages.website.Exhibitions.existExhibitorProfile')
	                 
                  	// go to exhibitor products
                  	if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                  
                	}else{

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
                		
                		DB::table('users')->where('id',Auth::user()->id)->update(['url_flag'=>1]);
	                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                  	if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                
                	}
                  
                }else{
                	

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
                  Session::flash('error','Request Not Complete Success Please Contact Us error code #104');
                  // return view('pages.website.Exhibitions.existExhibitorProfile')
                 
                  	if($request->flag == 2){
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',2')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }else{
       		// go to exhibitor products
        	$url = url('/');
          return redirect($url.'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor_products/'.$request->exh_slug.',1')
          ->with('exhibitor_details',$exhibitor_details[0])
          ->with('main_categories',$categories)
          ->with('countries',$countries)
          ->with('account_types',$account_types)
          ->with('exh_slug',$request->exh_slug);
       }
                  
                }
              }
          }




    }



    


    

    
    // User Is Already Member?
    // if(Helper::CheckMemberExistDb(Auth::user()->id) > 0)
    // {
      // Update Member Details
      /******************** have logo *******************************************************/
      


      # Member And Will Updating Only
      

      
     
      
     
      
      //return dd($FiledsFlag,$LogoFlag,$CoverFlag,$TransFlag);
      
        
    // }else{
      # Not Member And Will Create And Discount From Wallet
      //check logic of sub category
      //$checkWallet = Helper::CheckWalletProfileDiscount(Auth::user()->wallet,'member');
      #check vaild
      // if($checkWallet == true)
      // {
        #discount and create
        //preparing to discount 
        // $cost = Helper::get_cost('member');
        // $net = Auth::user()->wallet - $cost;
        // // discount wallet
        // $discount = DB::table('users')
        //                 ->where('id',Auth::user()->id)
        //                 ->update(['wallet'=>$net]);
        // if($discount == 1) // discount success
        // {
          // transaction add transaction_id 1 -> compalete profile
          // $add_transaction = DB::table('wallet_transactions')->insert([
          //                                                               'member_id' => Auth::user()->id,
          //                                                               'transaction_id' => 1,
          //                                                               'cost' => $cost,
          //                                                               'created_by' => Auth::user()->id
          //                                                             ]);
          
          /******************** have logo *******************************************************/
         
        // }else{
        //   Session::flash('error','Wallet Discount Not Completed, Please Try Again code #102');
        //   redirect()->back();
        // }

        
      // }else{
      //   # return and payment required message
      //   Session::flash('wallet_not_enough');
      //   return redirect()->back();
      // }
    // }


	}


	public function exhibitionJoinSponsor(Request $request, $exh_slug){
		return dd($request, $exh_slug);
	}

	public function exhibitionJoinAddProducts(Request $request, $exh_slug){
		//check if exist
		// get exh id
		$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->first();
		// get pro_id
		$pro_id = DB::table('member_products')->where('slug',$request->pro_slug)->first();
		// check exist
		$count = DB::table('exhibition_products_selector')->where('pro_id',$pro_id->id)->where('exhibitor_id',Auth::user()->id)->where('exh_id',$exh_id->exhibition_id)->count();
		if($count > 0){
			// return exist
			$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
	  	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
			$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
			// exhibition products list
			$ExhProList = DB::select('
																SELECT member_products.name AS pro_name,
																member_products.id as pro_id,
																member_products.slug as pro_slug,
																member_products.member_id,
																member_products.visibility
																FROM member_products member_products
																WHERE     (member_products.member_id = '.Auth::user()->id.')
																AND (   `member_products`.`visibility` = 2
																OR member_products.visibility = 3)
															');
			$url = url('/').'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join/'.$exh_slug.'';
			Session::flash('exist','product already exists');
			return redirect($url)
			->with('NewMessagesCount',$NewMessagesCount)
			->with('member_details',$member_details[0])
			->with('ExhProList',$ExhProList)
			->with('exh_slug',$request->exh_slug);
		}else{
			// add and return
			$add = DB::table('exhibition_products_selector')->insert([
																															'pro_id'=>$pro_id->id,
																															'exh_id'=>$exh_id->exhibition_id,
																															'exhibitor_id'=>Auth::user()->id,
																														]);
			if($add > 0){
				// return 
				$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		  	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
				$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
				// exhibition products list
				$ExhProList = DB::select('
																	SELECT member_products.name AS pro_name,
																	member_products.id as pro_id,
																	member_products.slug as pro_slug,
																	member_products.member_id,
																	member_products.visibility
																	FROM member_products member_products
																	WHERE     (member_products.member_id = '.Auth::user()->id.')
																	AND (   `member_products`.`visibility` = 2
																	OR member_products.visibility = 3)
																');
				$url = url('/').'/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join/'.$exh_slug.'';
				Session::flash('success','product Added Success!');
				return redirect($url)
				->with('NewMessagesCount',$NewMessagesCount)
				->with('member_details',$member_details[0])
				->with('ExhProList',$ExhProList)
				->with('exh_slug',$request->exh_slug);
			}else{
				// error inserting
				Session::flash('error','error insert');
				return redirect()->back();
			}
			
		}
		
	}


	public function ExhibitionConfirmMemberJoin(Request $request){
		// get exhibition information
		$exhibition = DB::table('exhibitions')->where('id',$request->exh_id)->first();
		# check available
		$check_exist = DB::table('exh_exhibitors_subscribes')->where('exh_id',$request->exh_id)->where('exhibitor_id',Auth::user()->id)->count();

		if($check_exist > 0){
			Session::flash('error','already exist');
			return redirect()->back();
		}

		# check wallet
		if($exhibition->cost > Auth::user()->wallet){
			Session::flash('error','Please charge your wallet');
			return redirect(url('/'.LaravelLocalization::getCurrentLocale().'/Account/Member_Wallet'));
		}

		// $exhProSelectorCount = DB::table('exhibition_products_selector')
		// 										->where('exh_id',$request->exh_id)
		// 										->where('exhibitor_id',Auth::user()->id)
		// 										->count();
		// if($exhProSelectorCount > 0){

		// }
		
		// $exhProSelector = DB::table('exhibition_products_selector')
		// 										->where('exh_id',$request->exh_id)
		// 										->where('exhibitor_id',Auth::user()->id)
		// 										->update([
		// 																'paid' => 1,
		// 														]);


		// if($exhProSelector != 1){
		// 	Session::flash('error','Record Not Updated Successfully check again!');
		// 	return redirect()->back();
		// }

		# exh_exhibitors_subscribes paid = 1
		$activeExhSubscribed = DB::table('exh_exhibitors_subscribes')
															->insert([
																				'exh_id' => $request->exh_id,
																				'exhibitor_id' => Auth::user()->id,
																				'active' => 1,
																				'paid' => 1,
																				'created_by' =>Auth::user()->id,
																			]);
		if($activeExhSubscribed != 1){
			// error
			Session::flash('error','Not joining Correct check again');
		}

		// discount wallet
		$discount = Auth::user()->wallet - $exhibition->cost;
		// updated discount 
		$discountWallet = DB::table('users')->where('id',Auth::user()->id)->update(['wallet'=>$discount]);
		if($discountWallet == 1){
			Session::flash('success','You Are Joined Success!');
			return redirect()->back();
		}
		
		
	}


	public function ExhibitionPreview($exhibition_slug, $exhibitor_slug){
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();

		$exhibitorDetails = DB::select('
																		SELECT categories_trans.name AS cat_name,
																		member_lang.name AS exhibitor_name,
																		member_details.profile_pic,
																		member_details.profile_cover,
																		member_details.rate,
																		users.email,
																		categories_trans.lang_id,
																		member_lang.slug,
																		exhibitor_data.exhibitor_id AS exhibitor_id,
																		exhibitor_data.exh_id,
																		member_details.viewed,
																		exhibition_langs.slug AS exh_slug,
																		exhibition_langs.exhibition_id,
																		exhibition_langs.lang_id
																		FROM (((((member_details member_details
																		INNER JOIN categories categories
																		ON     (member_details.sub_category_id = categories.id)
																		AND (member_details.category_id = categories.id))
																		INNER JOIN exhibitor_data exhibitor_data
																		ON (exhibitor_data.exhibitor_id = member_details.user_id))
																		INNER JOIN exhibition_langs exhibition_langs
																		ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
																		INNER JOIN member_lang member_lang
																		ON (member_lang.member_id = member_details.user_id))
																		INNER JOIN categories_trans categories_trans
																		ON (categories_trans.sector_id = categories.id))
																		INNER JOIN users users
																		ON (users.id = member_details.user_id)
																		WHERE (categories_trans.lang_id = '.$curr_lang->id.')
																		AND (member_lang.slug = "'.$exhibitor_slug.'")
																		AND (exhibition_langs.lang_id = '.$curr_lang->id.')
													 				');
		// get exhibitor details
		$exhibitor = DB::select('
															SELECT categories_trans.name AS category,
															member_lang.name AS name,
															member_details.profile_pic,
															member_details.profile_cover,
															member_details.rate,
															users.email,
															member_lang.slug,
															exhibitor_data.exhibitor_id AS exhibitor_id,
															exhibitor_data.exh_id,
															member_details.viewed,
															exhibition_langs.slug AS exh_slug,
															exhibition_langs.exhibition_id,
															exhibition_langs.lang_id,
															categories_trans.lang_id,
															countries.name AS country,
															member_lang.address,
															member_details.phone
															FROM ((((((member_details member_details
															INNER JOIN categories categories
															ON     (member_details.sub_category_id = categories.id)
															AND (member_details.category_id = categories.id))
															INNER JOIN exhibitor_data exhibitor_data
															ON (exhibitor_data.exhibitor_id = member_details.user_id))
															INNER JOIN exhibition_langs exhibition_langs
															ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
															INNER JOIN member_lang member_lang
															ON (member_lang.member_id = member_details.user_id))
															INNER JOIN users users
															ON (users.id = member_details.user_id))
															INNER JOIN countries countries
															ON (member_details.country_id = countries.id))
															INNER JOIN categories_trans categories_trans
															ON (categories_trans.sector_id = categories.id)
															WHERE (exhibition_langs.lang_id = '.$curr_lang->id.') AND (categories_trans.lang_id = '.$curr_lang->id.')
															AND (member_lang.slug = "'.$exhibitor_slug.'")
															
													 ');


		$products = DB::select('
														SELECT member_products.name,
														member_products.slug AS pro_slug,
														member_products.visibility AS pro_visibility,
														exhibition_products_selector.pro_id,
														exhibition_products_selector.exhibitor_id,
														member_pro_images.image,
														member_lang.slug AS exhibitor_slug
														FROM (((exhibition_products_selector
														exhibition_products_selector
														INNER JOIN member_products member_products
														ON (exhibition_products_selector.pro_id = member_products.id))
														INNER JOIN member_details member_details
														ON (exhibition_products_selector.exhibitor_id =
														member_details.user_id))
														INNER JOIN member_lang member_lang
														ON (member_lang.member_id = member_details.user_id))
														INNER JOIN member_pro_images member_pro_images
														ON (member_pro_images.pro_id = member_products.id)
														GROUP BY member_products.slug
														HAVING (member_lang.slug = "'.$exhibitor_slug.'")
														AND (member_products.visibility = 2 or member_products.visibility = 3)
													');
		
		// $exhibitorDetails = DB::select('
		// 																	SELECT categories_trans.name AS cat_name,
		// 																	member_lang.name AS exhibitor_name,
		// 																	member_details.profile_pic,
		// 																	member_details.profile_cover,
		// 																	member_details.rate,
		// 																	users.email,
		// 																	categories_trans.lang_id,
		// 																	member_lang.slug,
		// 																	exhibitor_data.exhibitor_id AS exhibitor_id,
		// 																	exhibitor_data.exh_id,
		// 																	member_details.viewed,
		// 																	exhibition_langs.slug AS exh_slug,
		// 																	exhibition_langs.exhibition_id,
		// 																	exhibition_langs.lang_id
		// 																	FROM (((((member_details member_details
		// 																	INNER JOIN categories categories
		// 																	ON     (member_details.sub_category_id = categories.id)
		// 																	AND (member_details.category_id = categories.id))
		// 																	INNER JOIN exhibitor_data exhibitor_data
		// 																	ON (exhibitor_data.exhibitor_id = member_details.user_id))
		// 																	INNER JOIN exhibition_langs exhibition_langs
		// 																	ON (exhibition_langs.exhibition_id = exhibitor_data.exh_id))
		// 																	INNER JOIN member_lang member_lang
		// 																	ON (member_lang.member_id = member_details.user_id))
		// 																	INNER JOIN categories_trans categories_trans
		// 																	ON (categories_trans.sector_id = categories.id))
		// 																	INNER JOIN users users
		// 																	ON (users.id = member_details.user_id)
		// 																	WHERE (categories_trans.lang_id = '.$curr_lang->id.')
		// 																	AND (member_lang.slug = "'.$exhibitor_slug.'")
		// 																	AND (exhibition_langs.lang_id = '.$curr_lang->id.')
		// 											 				');
		$exhibitor_data = DB::table('exhibitor_data')->where('exhibitor_id',$exhibitorDetails[0]->exhibitor_id)->where('exh_id',$exhibitorDetails[0]->exh_id)->first();
		return view('pages.website.Exhibitions.ExhibitorPreview')
		->with('exhibitor_details',$exhibitorDetails[0])
		->with('exhibitor_slug',$exhibitor_slug)
		->with('exhibition_slug',$exhibition_slug)
		->with('exhibitor_data',$exhibitor_data)
		->with('products',$products)
		->with('exhibitor',$exhibitor[0])
		->with('exhibitor_slug',$exhibitor_slug)
		->with('exhibition_slug',$exhibition_slug);
	}




	public function ExhibitorProducts($exh_slug){

		$exh_slug = str_replace(',1', '', $exh_slug);
		$exh_slug = str_replace(',2', '', $exh_slug);
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->first();
  	$exhibitor_products = DB::table('exhibitor_products')->where('lang_id',1)->where('exh_id',$exh_id->exhibition_id)->where('exhibitor_id',Auth::user()->id)->get();
  	$exhibitor_details = Helper::get_exhibitor_details(Auth::user()->id,1,$exh_id->exhibition_id);
  	
  	
    if(count($exhibitor_details) > 0){
      return view('pages.website.Exhibitions.products.list')
    ->with('member_products',$exhibitor_products)
    ->with('exhibitor_details',$exhibitor_details[0])
    ->with('exh_slug',$exh_slug);
    }else{
      return view('pages.website.Exhibitions.products.list')
    ->with('member_products',$exhibitor_products)
    ->with('exhibitor_details',$exhibitor_details[0])
    ->with('exh_slug',$exh_slug);
    } 
  	
  }



  public function CreateExhibitorProduct($exh_slug){
  	$exh_slug = str_replace(',1', '', $exh_slug);
  	$exh_slug = str_replace(',2', '', $exh_slug);
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->first();
  	$exhibitor_details = Helper::get_exhibitor_details(Auth::user()->id,1,$exh_id->exhibition_id);
  	return view('pages.website.Exhibitions.products.create')->with('exh_slug',$exh_slug)
  	->with('exhibitor_details',$exhibitor_details[0])
    ->with('exh_slug',$exh_slug);
  }



  public function CreateExhibitorProductPost(Request $request){
		if ($request->isMethod('post'))
    {
      //header ('Content-type: text/html; charset=utf-8');
      // return response()->json('محمد',200, [], JSON_UNESCAPED_UNICODE);
      $exh_id = DB::table('exhibition_langs')->where('slug',$request->exh_slug)->first();
      $curr_lang = DB::table('languages')->where('lang',$request->pro_lang)->first();
      $exhibitor_details = Helper::get_exhibitor_details(Auth::user()->id, $request->pro_lang, $exh_id->exhibition_id);
      $languages = DB::table('languages')->where('shown',1)->select('id','name')->where('id',1)->get();
      //check exist duplicated
      $checkExist = DB::table('exhibitor_products')->where('name',$request->pro_name)->where('lang_id',$request->pro_lang)->where('exhibitor_id',Auth::user()->id)->count();
      if($checkExist > 0) // exist
      {
        return response()->json(['status' => 'exist','message'=>'Product Name Already Exist On Your Products!', 200, [], JSON_UNESCAPED_UNICODE]);
      }else{ // insert and get id and return with all values required
        // if lang_id == 1 -> insert english and parent_id is null
        // set parent_id == null
        // preparing slug
        $slug = mb_strtolower(str_replace(' ', '-', $request->pro_name.'-'.Auth::user()->id));
        $pro_id = DB::table('exhibitor_products')->insertGetId([
        										'exh_id'=>$exh_id->exhibition_id,
                            'lang_id'=>$request->pro_lang,
                            'exhibitor_id'=>Auth::user()->id,
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




  public function ConfirmExhibitionSubscribe(Request $request){

  	$walletCheck = DB::table('exhibitions')->where('id',$request->exh_id)->first();
  	// check paid duplicated
  	$checDuplicatedExistExhibitorPaid = DB::table('exh_exhibitors_subscribes')
  																		->where('exhibitor_id',Auth::user()->id)
  																		->where('exh_id',$request->exh_id)
  																		->where('paid',1)
  																		->get();
		if(count($checDuplicatedExistExhibitorPaid) > 0){
			Session::flash('error','Already Joined!');
			return redirect(url('/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug.','.$request->flag));
		}else{
			// check not paid duplicated
	  	$checDuplicatedExistExhibitorNotPaid = DB::table('exh_exhibitors_subscribes')
	  																		->where('exhibitor_id',Auth::user()->id)
	  																		->where('exh_id',$request->exh_id)
	  																		->where('paid',0)
	  																		->get();
			if(count($checDuplicatedExistExhibitorNotPaid) > 0){
					// check paid and update paid and discount
					if(Auth::user()->wallet >= $walletCheck->cost){
						$net = Auth::user()->wallet - $walletCheck->cost;
						DB::table('users')->where('id',Auth::user()->id)->update([
																																			'wallet' => $net
																																		]);
						DB::table('wallet_transactions')->insert(['member_id'=>Auth::user()->id,'transaction_id'=>2,'cost'=>$walletCheck->cost,'created_by'=>Auth::user()->id]);
						// add not paid record
						$update = DB::table('exh_exhibitors_subscribes')
														->where('exh_id',$request->exh_id)
														->where('exhibitor_id',Auth::user()->id)
														->update([
																			'paid'=> 1,	
																			'active'=> 1,	
																			'updated_by'=>Auth::user()->id
																		]);	
							Session::flash('success','You Joined Success!');
							return redirect(url('/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug.','.$request->flag));
					}else{
						Session::flash('error','Please Charge Your Wallet to subscribe');
						return redirect(url('/'.LaravelLocalization::getCurrentLocale().'/Account/Member_Wallet'));
					}
																
			}else{
				// add record not paid and check wallet and discount
				// add not paid record
					$add = DB::table('exh_exhibitors_subscribes')->insert([
																																	'exh_id'=>$request->exh_id,	
																																	'exhibitor_id'=>Auth::user()->id,	
																																	'paid'=> 0,	
																																	'active'=> 1,	
																																	'created_by'=>Auth::user()->id
																																]);	

					if(Auth::user()->wallet >= $walletCheck->cost){
						$net = Auth::user()->wallet - $walletCheck->cost;
						DB::table('users')->where('id',Auth::user()->id)->update([
																																			'wallet' => $net
																																		]);
						DB::table('wallet_transactions')->insert(['member_id'=>Auth::user()->id,'transaction_id'=>2,'cost'=>$walletCheck->cost,'created_by'=>Auth::user()->id]);
						$update = DB::table('exh_exhibitors_subscribes')
														->where('exh_id',$request->exh_id)
														->where('exhibitor_id',Auth::user()->id)
														->update([
																			'paid'=> 1,	
																			'active'=> 1,	
																			'updated_by'=>Auth::user()->id
																		]);	

						Session::flash('success','You Joined Success!');
						return redirect(url('/'.LaravelLocalization::getCurrentLocale().'/Exhibition/join_exhibitor/'.$request->exh_slug.','.$request->flag));
						
					}else{
						Session::flash('error','Please Charge Your Wallet to subscribe');
						return redirect(url('/'.LaravelLocalization::getCurrentLocale().'/Account/Member_Wallet'));
					}

			}
			

		}
		
																				

  }










  public function ajaxImage(Request $request)
    {
      if ($request->isMethod('get'))
        return redirect()->route('Authed_Member_Products_Create');
      else  {
              $validator = Validator::make($request->all(),
                [
                  'file' => 'image',
                ],
                [
                  'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);

                if ($validator->fails())
                  return array(
                                'fail' => true,
                                'errors' => $validator->errors()
                              );
                  // upload 
                  # start #
                  // get values from request
                  //$lang = DB::table('languages')->where('id',$request->lang_id)->first();
                  $path_images = public_path().'/images/en/exhibitors/';
                  // $path_images_raw = public_path().'/en/images/raw';
                  $path_images_raw = public_path().'/raw';
                  $path_product_images_thumb = public_path().'/images/en/exhibitors/products_gallery/thumb';
                  $path_product_images_med = public_path().'/images/en/exhibitors/products_gallery/med';
                  $path_product_images_larg = public_path().'/images/en/exhibitors/products_gallery/larg';

                  if(File::exists($path_images) != 'false') {
                    mkdir($path_images, 0777, true);
                    File::makeDirectory($path_images, $mode = 0777, true, true);
                  }

                  if(File::exists($path_images_raw) != 'false') {
                    mkdir($path_images_raw, 0777, true);
                    File::makeDirectory($path_images_raw, $mode = 0777, true, true);
                  }

                  if(File::exists($path_product_images_thumb) != 'false') {
                    mkdir($path_product_images_thumb, 0777, true);
                    File::makeDirectory($path_product_images_thumb, $mode = 0777, true, true);
                  }

                  if(File::exists($path_product_images_med) != 'false') {
                    mkdir($path_product_images_med, 0777, true);
                    File::makeDirectory($path_product_images_med, $mode = 0777, true, true);
                  }

                  if(File::exists($path_product_images_larg) != 'false') {
                    mkdir($path_product_images_larg, 0777, true);
                    File::makeDirectory($path_product_images_larg, $mode = 0777, true, true);
                  }

                    if(Input::hasFile('file'))
                    {
                      $time = time();
                      $ext = Input::file('file')->getClientOriginalExtension();
                      $fullFileNameTaget = $path_images_raw.'/raw_'.$request->pro_id.'_'.Auth::user()->id.'_'.$time.'.'.$ext;
                      $FileNameThumb = public_path('').'/images/en/exhibitors/products_gallery/thumb/'.'pro_image_'.$time.'.'.$ext;
                      $FileNameMed = public_path('').'/images/en/exhibitors/products_gallery/med/'.'pro_image_'.$time.'.'.$ext;
                      $FileNameLarg = public_path('').'/images/en/exhibitors/products_gallery/larg/'.'pro_image_'.$time.'.'.$ext;
                      $pro_image = Input::file('file');

                      
                      //return dd(public_path().'/images/en/products_gallery/med/'.'pro_image_'.$time.'.'.$ext);
                      // $pro_image->move($path_images_raw,$slug_title.'.'.$ext);
                      $pro_image->move($path_images_raw,'raw_'.$request->pro_id.'_'.Auth::user()->id.'_'.$time.'.'.$ext);

                      // thumbnail
                      $pro_image = Image::make($fullFileNameTaget);
                      $pro_image->resize(50, 50);
                      $pro_image->save($FileNameThumb);
                      
                      $pro_image = Image::make($fullFileNameTaget);
                      $pro_image->resize(500, null, function ($constraint) {
                          $constraint->aspectRatio();
                      });
                      $pro_image->save($FileNameMed);
                      
                      $pro_image = Image::make($fullFileNameTaget);
                      $pro_image->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                      });
                      // return dd(public_path('').'/images/en/products_gallery/larg/'.'pro_image_'.$time.'.'.$ext);
                      $pro_image->save($FileNameLarg);
                      $filename = 'pro_image_'.$time.'.'.$ext;
                      
                    }

                    // insert db
                    $insert = DB::table('exhibitor_pro_images')->insert([
                                                                      'exhibitor_id'=>Auth::user()->id,
                                                                      'pro_id'=>$request->pro_id,
                                                                      'lang_id'=>1,
                                                                      'image'=>'pro_image_'.$time.'.'.$ext,
                                                                      'active'=>1,
                                                                      'created_by'=>Auth::user()->id
                                                                    ]);

                    if($insert == 1){
                      return response()->json(['status' => 'success','message'=>trans('image_uploaded_success'),'pro_id'=>$request->pro_id,'file_name'=>$filename, 200, [], JSON_UNESCAPED_UNICODE]);
                    }else{
                      return response('error');
                    }
                  # end #
                  // $extension = $request->file('file')->getClientOriginalExtension();
                  // $dir = 'uploads/';
                  // $filename = uniqid() . '_' . time() . '.' . $extension;
                  // $request->file('file')->move($dir, $filename);
                  // return $filename;
            }
    }
    
    
    
     public function ExhibitorPreview($exh_slug,$exhibitor_slug){
      $exh_slug = str_replace(',1', '', $exh_slug);
      $exh_slug = str_replace(',2', '', $exh_slug);
    	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    	$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id')->first();
		$exhibition_details = DB::select('
																					SELECT exhibition_langs.name AS exh_name,
																					exhibition_langs.slug AS exh_slug,
																					exhibition_langs.photo AS exh_photo,
																					exhibitions.cat_id,
																					exhibitions.id AS exh_id,
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
// 		$exhibitor_details = DB::select('SELECT exhibitor_lang.name,
//        exhibitor_lang.slug,
//        exhibitor_lang.address,
//        exhibitor_lang.about,
//        exhibitor_lang.services,
//        exhibitor_lang.lang_id,
//        exh_exhibitors_subscribes.exh_cat_id,
//        exh_exhibitors_subscribes.paid,
//        exhibitor_details.country_id,
//        exh_exhibitors_subscribes.created_by,
//        exhibitor_details.city_id,
//        exhibitor_details.profile_pic,
//        exhibitor_details.profile_cover,
//        exhibitor_details.rate,
//        exhibitor_lang.exhibitor_id,
//        exhibitor_lang.exh_id
// FROM (exhibitor_lang exhibitor_lang
//       INNER JOIN exhibitor_details exhibitor_details
//          ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
//             AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
//      INNER JOIN
//      exh_exhibitors_subscribes exh_exhibitors_subscribes
//         ON     (exh_exhibitors_subscribes.exh_id = exhibitor_details.exh_id)
//            AND (exh_exhibitors_subscribes.exhibitor_id =
//                 exhibitor_details.user_id)
// WHERE     (exhibitor_lang.lang_id = '.$curr_lang->id.')
//       AND (exh_exhibitors_subscribes.paid = 1)
//       AND (exhibitor_lang.exhibitor_id = '.Auth::user()->id.')
//       AND (exhibitor_lang.exh_id = '.$exh_id->exh_id.')');
		$exhibitor_details = DB::select('
			SELECT exhibitor_lang.name as exhibitor_name,
       exhibitor_lang.slug,
       exhibitor_lang.address,
       exhibitor_lang.about,
       exhibitor_lang.services,
       exh_cat_trans.cat_name,
       exh_cat_trans.lang_id,
       exh_cat_trans.exh_cat_id,
       exhibitor_lang.exhibitor_id,
       exhibitor_details.profile_pic,
       exhibitor_details.profile_cover,
       exhibitor_details.rate,
       exhibitor_details.viewed,
       exhibitor_details.online,
       exhibitor_details.ceo as email,
       exhibitor_details.marketing,
       exhibitor_details.sales,
       exhibitor_details.website,
       exhibitor_details.facebook,
       exhibitor_details.instagram,
       exhibitor_details.linkedin,
       exhibitor_details.twitter,
       exhibitor_details.youtube,
       exhibitor_details.snapchat,
       exhibitor_details.shown,
       exhibitor_details.phone,
       countries.name AS country
FROM ((exhibitor_details exhibitor_details
       INNER JOIN countries countries
          ON (exhibitor_details.country_id = countries.id))
      INNER JOIN exhibitor_lang exhibitor_lang
         ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
            AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
     INNER JOIN exh_cat_trans exh_cat_trans
        ON (exh_cat_trans.exh_cat_id = exhibitor_details.category_id)
WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.') AND (exhibitor_lang.exhibitor_id = '.Auth::user()->id.')');
		// return dd($exhibition_details);																						
        // $exhibitor_details = Helper::get_exhibitor_details(Auth::user()->id,1,$exh_id->exh_id);
        // return dd($curr_lang->id,$exhibitor_details,$exh_id->exh_id);
        $exhibitor_products = DB::table('exhibitor_products')->where('exh_id',$exh_id->exh_id)->where('exhibitor_id',Auth::user()->id)->where('visibility',1)->select('id')->get();
        $product_images = DB::table('exhibitor_pro_images')->select('pro_id','exhibitor_id','image')->get();
        //return dd($exhibitor_products, $product_images);
        // return dd($exhibitor_details);
        if(count($exhibitor_products) > 0){
            
            return view('pages.website.Exhibitions.ExhibitorPreview')
    	->with('exhibitor_products',$exhibitor_products)
    	->with('product_images',$product_images)
    	->with('exhibitor',$exhibitor_details[0])
    	->with('exhibition',$exhibition_details);
        }else{
            
            return view('pages.website.Exhibitions.ExhibitorPreview')
    	->with('exhibitor',$exhibitor_details[0])
    	->with('exhibition',$exhibition_details);
        }
    	
			
    }






  public function DeleteExhibitionProduct(Request $request){
	  // delete product
	  #delete member_pro_images
	  $deleteGallery = DB::table('exhibitor_pro_images')->where('exhibitor_id',Auth::user()->id)->where('pro_id',$request->pro_id)->delete();
	  // dlete specifications
	  // $deleteSpecification = DB::table('exhibitors_pro_specifications')->where('exhibitor_id',Auth::user()->id)->where('pro_id',$request->pro_id)->delete();
	  // dlete member_products
	  $delete_exhibitor_products = DB::table('exhibitor_products')->where('exh_id',$request->exh_id)->where('exhibitor_id',Auth::user()->id)->where('id',$request->pro_id)->delete();

	  if($deleteGallery == 1 or $deleteSpecification == 1 or $delete_exhibitor_products == 1){
	    return response()->json(['status'=>'success','message'=>'deleted Successfully!']);
	  }else{
	    return response()->json(['status'=>'error','message'=>'Deleting Not Deleted Correct!']);
	  }
  
  }



 public function ExhibitorProductGallerydelete(Request $request)
  {
    // delete from db
    $delete = DB::table('exhibitor_pro_images')->where('image',$request->pro_image)->delete();
    if($delete == 1){
      return response()->json(['status' => 'success','message'=>'Image was deleted success!', 200, [], JSON_UNESCAPED_UNICODE]);
      // File::delete('uploads/' . $filename);
    }else{
      return response()->json(['status' => 'error','message'=>'Image not deleted yet!', 200, [], JSON_UNESCAPED_UNICODE]);
    }
  }


  public function VisitExhibition(Request $request, $exh_slug){
  	$q = '';
   	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
   	$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->first();
   	$countries = DB::table('countries')->where('active',1)->select('id','name')->get();
   	$exhibitionCategories = DB::select('
										SELECT exh_cat_trans.cat_name,
										exh_cat_trans.slug,
										exh_cat_trans.active,
										exh_cat_trans.exh_cat_id as id
										FROM exh_cat_trans 
										INNER JOIN exh_cat 
										ON (exh_cat_trans.exh_cat_id = exh_cat.id)
										WHERE(exh_cat_trans.lang_id = '.$curr_lang->id.')
										');


// 			$q = "
// 			SELECT countries.name AS country_name,
//        exhibitor_details.phone AS phone,
//        exh_exhibitors_subscribes.exhibitor_id,
//        exh_exhibitors_subscribes.exh_cat_id,
//        exhibitor_lang.name,
//        exh_exhibitors_subscribes.paid,
//        exhibitor_details.profile_pic,
//        exhibitor_details.profile_cover,
//        exhibitor_details.rate,
//        exhibitor_details.viewed,
//        exhibitor_details.online,
//        exhibitor_details.ceo,
//        exhibitor_details.marketing,
//        exhibitor_details.sales,
//        exhibitor_details.website,
//        exhibitor_details.facebook,
//        exhibitor_details.instagram,
//        exhibitor_details.linkedin,
//        exhibitor_details.twitter,
//        exhibitor_details.youtube,
//        exhibitor_details.snapchat,
//        exhibitor_lang.address,
//        exhibitor_lang.about,
//        exhibitor_lang.services,
//        exh_cat_trans.cat_name,
//        exh_cat_trans.slug,
//        exhibitor_lang.exhibitor_id,
//        exh_cat_trans.lang_id,
//        exhibitor_lang.slug AS exhibitor_lang_slug
// FROM ((((exhibitor_details exhibitor_details
//          INNER JOIN
//          exh_exhibitors_subscribes
//          exh_exhibitors_subscribes
//             ON (exhibitor_details.user_id =
//                 exh_exhibitors_subscribes.exhibitor_id))
//         INNER JOIN countries countries
//            ON (exhibitor_details.country_id = countries.id))
//        INNER JOIN exhibitions exhibitions
//           ON     (exhibitor_details.exh_id = exhibitions.id)
//              AND (exh_exhibitors_subscribes.exh_id = exhibitions.id))
//       INNER JOIN exhibitor_lang exhibitor_lang
//          ON     (exhibitor_lang.exh_id = exhibitions.id)
//             AND (exhibitor_lang.exhibitor_id = exhibitor_details.user_id))
//      INNER JOIN exh_cat_trans exh_cat_trans
//         ON (exh_cat_trans.exh_cat_id = exhibitor_details.category_id)
// WHERE (exh_cat_trans.lang_id = 1)
// 		";

		$q = "SELECT exh_exhibitors_subscribes.paid,
       exh_exhibitors_subscribes.exh_id,
       exhibitor_lang.name,
       exhibitor_lang.exhibitor_id,
       exhibitor_lang.slug,
       exhibitor_lang.address,
       exhibitor_lang.about,
       exhibitor_lang.services,
       countries.name AS country,
       exh_cat_trans.cat_name,
       exh_cat_trans.slug AS cat_slug,
       exh_cat_trans.lang_id AS cat_lang_id,
       exhibitor_details.phone,
       exhibitor_details.profile_pic,
       exhibitor_details.profile_cover,
       exhibitor_details.rate,
       exhibitor_details.viewed,
       exhibitor_details.ceo,
       exhibitor_details.marketing,
       exhibitor_details.sales,
       exhibitor_details.website,
       exhibitor_details.country_id,
       exhibitor_details.facebook,
       exhibitor_details.instagram,
       exhibitor_details.linkedin,
       exhibitor_details.twitter,
       exhibitor_details.youtube,
       exhibitor_details.snapchat,
       exh_cat_trans.exh_cat_id
				FROM (((exhibitor_details exhibitor_details
				INNER JOIN countries countries
				ON (exhibitor_details.country_id = countries.id))
				INNER JOIN
				exh_exhibitors_subscribes
				exh_exhibitors_subscribes
				ON     (exhibitor_details.user_id =
				exh_exhibitors_subscribes.exhibitor_id)
				AND (exhibitor_details.exh_id = exh_exhibitors_subscribes.exh_id))
				INNER JOIN exhibitor_lang exhibitor_lang
				ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
				AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
				INNER JOIN exh_cat_trans exh_cat_trans
				ON (exh_cat_trans.exh_cat_id = exhibitor_details.category_id)
				WHERE     (exh_exhibitors_subscribes.paid = 1)
				AND (exh_cat_trans.lang_id = $curr_lang->id)
				AND (exh_exhibitors_subscribes.exh_id = $exh_id->exhibition_id)
ORDER BY RAND()
";



// $exh_id->exhibition_id
 		$country_id = '';

   	if($request->q != null){
   		$q = $q.'AND(exhibitor_lang.name LIKE "%'.$request->q.'%")';
   		// $exhibitions = DB::select($q);
   	}

   	if($request->country_id != null){
   		$q = $q.'AND(exhibitor_details.country_id = '.$request->country_id.')';
   	}

$exhibitors = DB::select($q);

 		// get all products of all exhibitors of current exhibition
		$ExhibitorsProducts = DB::select('
																			SELECT exhibitor_products.name,
																			exhibitor_products.description,
																			exhibitor_products.id AS product_id,
																			exhibitor_pro_images.image,
																			exhibitor_pro_images.active,
																			exhibitor_pro_images.lang_id,
																			exhibitor_products.exh_id,
																			exhibitor_products.lang_id,
																			exhibitor_products.slug,
																			exhibitor_products.active AS pro_active,
																			exhibition_langs.slug AS exhibition_slug,
																			exhibition_langs.lang_id AS exh_lang_id,
																			 exhibitor_pro_images.exhibitor_id AS exhibitor_pro_id
																			FROM (exhibitor_pro_images
																			INNER JOIN exhibitor_products
																			ON     (exhibitor_pro_images.pro_id = exhibitor_products.id)
																			AND (exhibitor_pro_images.exhibitor_id =
																			exhibitor_products.exhibitor_id))
																			INNER JOIN exhibition_langs
																			ON (exhibition_langs.exhibition_id = exhibitor_products.exh_id)
																			WHERE     (exhibitor_pro_images.active = 1)
																			AND (exhibitor_pro_images.lang_id = 1)
																			AND (exhibitor_products.exh_id = '.$exh_id->exhibition_id.')
																			AND (exhibitor_products.lang_id = 1)
																			AND (exhibitor_products.active = 1)
																			AND (exhibition_langs.lang_id = '.$curr_lang->id.')
																		');
//return dd($q , $exhibitors, $ExhibitorsProducts);

  	return view('pages.website.Exhibitions.ExhibitorsSearchResult')
  	->with('exhibitors',$exhibitors)
  	->with('q',$request->q)
  	->with('category_id',$request->category_id)
  	->with('country_id',$request->country_id)
  	->with('countries',$countries)
  	->with('ExhibitorsProducts',$ExhibitorsProducts)
  	->with('exh_slug',$exh_slug)
  	->with('exhibitionCategories',$exhibitionCategories);


  }




  public function ExhibitorProfile($exh_slug, $exhibitor_slug){

  	
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id','name as exh_name')->first();
		$exhibitorDetails = DB::select('
																		SELECT exhibitor_lang.name as exhibitor_name,
																		exhibitor_lang.slug,
																		exhibitor_lang.address,
																		exhibitor_lang.about,
																		exhibitor_lang.services,
																		exhibitor_details.phone,
																		exhibitor_details.profile_pic,
																		exhibitor_details.rate,
																		exhibitor_details.viewed,
																		exhibitor_details.ceo as email,
																		exhibitor_details.marketing,
																		exhibitor_details.sales,
																		exhibitor_details.website,
																		exhibitor_details.facebook,
																		exhibitor_details.instagram,
																		exhibitor_details.linkedin,
																		exhibitor_details.twitter,
																		exhibitor_details.youtube,
																		exhibitor_details.snapchat,
																		exhibitor_lang.exh_id,
																		exhibitor_lang.exhibitor_id,
																		countries.name AS country,
																		exhibitor_lang.lang_id AS exhibitor_lang_id,
																		exhibitor_details.online,
																		exh_cat_trans.cat_name,
   																	exh_cat_trans.slug AS cat_slug,
   																	exh_cat_trans.lang_id AS cat_lang_id
																		FROM ((exhibitor_details
																		INNER JOIN exh_cat_trans
																		ON (exhibitor_details.category_id = exh_cat_trans.exh_cat_id))
																		INNER JOIN exhibitor_lang
																		ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
																		AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
																		INNER JOIN countries
																		ON (countries.id = exhibitor_details.country_id)
																		where(exhibitor_lang.slug = "'.$exhibitor_slug.'")
																		AND(exh_cat_trans.lang_id = '.$curr_lang->id.')
																		AND(exhibitor_lang.exh_id = '.$exh_id->exh_id.')
													 				');
		//AND (exhibitor_lang.slug = "'.$exhibitor_slug.'")
		//return dd($exh_slug, $exhibitor_slug,$exhibitorDetails);

		$products = DB::select('
															SELECT exhibitor_products.name,
															exhibitor_products.description,
															exhibitor_pro_images.image,
															exhibitor_products.slug,
															exhibitor_products.active,
															exhibitor_products.exh_id,
															exhibitor_products.id,
															exhibition_langs.slug AS exh_slug,
															exhibitor_products.exhibitor_id AS exhibitor_id
															FROM (exhibitor_products
															INNER JOIN exhibition_langs
															ON (exhibitor_products.exh_id = exhibition_langs.exhibition_id))
															INNER JOIN
															exhibitor_pro_images
															ON     (exhibitor_pro_images.pro_id = exhibitor_products.id)
															AND (exhibitor_pro_images.exhibitor_id =
															exhibitor_products.exhibitor_id)
															WHERE (exhibitor_products.active = 1)
															AND (exhibition_langs.slug = "'.$exh_slug.'")
															AND (exhibitor_products.exhibitor_id = '.$exhibitorDetails[0]->exhibitor_id.')
													');


	
		$product_images = DB::table('exhibitor_pro_images')->where('exhibitor_id',$exhibitorDetails[0]->exhibitor_id)->get();
		// add visit 
  	$viewed = DB::table('exhibitor_details')->where('user_id', $exhibitorDetails[0]->exhibitor_id)->where('exh_id', $exhibitorDetails[0]->exh_id)->first();
  	$last_viewed = $viewed->viewed;
  	$last_viewed = $last_viewed + 1;
  	$viewed = DB::table('exhibitor_details')->where('user_id', $exhibitorDetails[0]->exhibitor_id)->where('exh_id', $exhibitorDetails[0]->exh_id)->update(['viewed'=>$last_viewed]);
		if(isset(auth::user()->id)){
			$member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
			$checExhibitorExist = DB::table('exhibitor_details')->where('exh_id',$exh_id->exh_id)->where('user_id',Auth::user()->id)->count();
			return view('pages.website.Exhibitions.ExhibitorProfile')
			->with('exhibitor',$exhibitorDetails[0])
			->with('exhibitor_products',$products)
			->with('product_images',$product_images)
			->with('exh_slug',$exh_slug)
			->with('checExhibitorExist',$checExhibitorExist)
			->with('member_details',$member_details);
		}else{
			return view('pages.website.Exhibitions.ExhibitorProfile')
			->with('exhibitor',$exhibitorDetails[0])
			->with('exhibitor_products',$products)
			->with('product_images',$product_images)
			->with('exh_slug',$exh_slug);
		}
  	
  }


  public function ExhibitorProductsServices($exh_slug, $exhibitor_slug){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  		
		// $exhibitorDetails = DB::select('
		// 																SELECT exhibitor_lang.name as exhibitor_name,
		// 																exhibitor_lang.slug,
		// 																exhibitor_lang.address,
		// 																exhibitor_lang.about,
		// 																exhibitor_lang.services,
		// 																exhibitor_details.phone,
		// 																exhibitor_details.profile_pic,
		// 																exhibitor_details.rate,
		// 																exhibitor_details.viewed,
		// 																exhibitor_details.ceo as email,
		// 																exhibitor_details.marketing,
		// 																exhibitor_details.sales,
		// 																exhibitor_details.website,
		// 																exhibitor_details.facebook,
		// 																exhibitor_details.instagram,
		// 																exhibitor_details.linkedin,
		// 																exhibitor_details.twitter,
		// 																exhibitor_details.youtube,
		// 																exhibitor_details.snapchat,
		// 																exhibitor_lang.exh_id,
		// 																exhibitor_lang.exhibitor_id,
		// 																countries.name AS country,
		// 																exhibitor_lang.lang_id AS exhibitor_lang_id,
		// 																exhibitor_details.online,
		// 																exh_cat_trans.cat_name,
  //      															exh_cat_trans.slug AS cat_slug
		// 																FROM ((exhibitor_details
		// 																INNER JOIN exh_cat_trans
		// 																ON (exhibitor_details.category_id = exh_cat_trans.exh_cat_id))
		// 																INNER JOIN exhibitor_lang
		// 																ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
		// 																AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
		// 																INNER JOIN countries
		// 																ON (countries.id = exhibitor_details.country_id)
		// 																WHERE (exhibitor_lang.exh_id = 1) AND (exhibitor_lang.lang_id = 1)
		// 																AND (exhibitor_lang.slug = "'.$exhibitor_slug.'")
		// 											 				');

		// $exhibitorDetails = DB::select('
		// 																SELECT exhibitor_lang.name as exhibitor_name,
		// 																exhibitor_lang.slug,
		// 																exhibitor_lang.address,
		// 																exhibitor_lang.about,
		// 																exhibitor_lang.services,
		// 																exhibitor_details.phone,
		// 																exhibitor_details.profile_pic,
		// 																exhibitor_details.rate,
		// 																exhibitor_details.viewed,
		// 																exhibitor_details.ceo as email,
		// 																exhibitor_details.marketing,
		// 																exhibitor_details.sales,
		// 																exhibitor_details.website,
		// 																exhibitor_details.facebook,
		// 																exhibitor_details.instagram,
		// 																exhibitor_details.linkedin,
		// 																exhibitor_details.twitter,
		// 																exhibitor_details.youtube,
		// 																exhibitor_details.snapchat,
		// 																exhibitor_lang.exh_id,
		// 																exhibitor_lang.exhibitor_id,
		// 																countries.name AS country,
		// 																exhibitor_lang.lang_id AS exhibitor_lang_id,
		// 																exhibitor_details.online,
		// 																exh_cat_trans.cat_name,
  //  																	exh_cat_trans.slug AS cat_slug,
  //  																	exh_cat_trans.lang_id AS cat_lang_id
		// 																FROM ((exhibitor_details
		// 																INNER JOIN exh_cat_trans
		// 																ON (exhibitor_details.category_id = exh_cat_trans.exh_cat_id))
		// 																INNER JOIN exhibitor_lang
		// 																ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
		// 																AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
		// 																INNER JOIN countries
		// 																ON (countries.id = exhibitor_details.country_id)
		// 																where(exhibitor_lang.slug = "'.$exhibitor_slug.'")
		// 																AND(exh_cat_trans.lang_id = '.$curr_lang->id.')
		// 											 				');


		$exhibitorDetails = DB::select('
																		SELECT exhibitor_lang.name as exhibitor_name,
																		exhibitor_lang.slug,
																		exhibitor_lang.address,
																		exhibitor_lang.about,
																		exhibitor_lang.services,
																		exhibitor_details.phone,
																		exhibitor_details.profile_pic,
																		exhibitor_details.rate,
																		exhibitor_details.viewed,
																		exhibitor_details.ceo as email,
																		exhibitor_details.marketing,
																		exhibitor_details.sales,
																		exhibitor_details.website,
																		exhibitor_details.facebook,
																		exhibitor_details.instagram,
																		exhibitor_details.linkedin,
																		exhibitor_details.twitter,
																		exhibitor_details.youtube,
																		exhibitor_details.snapchat,
																		exhibitor_lang.exh_id,
																		exhibitor_lang.exhibitor_id,
																		countries.name AS country,
																		exhibitor_lang.lang_id AS exhibitor_lang_id,
																		exhibitor_details.online,
																		exh_cat_trans.cat_name,
   																	exh_cat_trans.slug AS cat_slug,
   																	exh_cat_trans.lang_id AS cat_lang_id
																		FROM ((exhibitor_details
																		INNER JOIN exh_cat_trans
																		ON (exhibitor_details.category_id = exh_cat_trans.exh_cat_id))
																		INNER JOIN exhibitor_lang
																		ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
																		AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
																		INNER JOIN countries
																		ON (countries.id = exhibitor_details.country_id)
																		where(exhibitor_lang.slug = "'.$exhibitor_slug.'")
																		AND(exh_cat_trans.lang_id = '.$curr_lang->id.')
													 				');

		$products = DB::select('
															SELECT exhibitor_products.name,
															exhibitor_products.description,
															exhibitor_pro_images.image,
															exhibitor_products.slug,
															exhibitor_products.active,
															exhibitor_products.exh_id,
															exhibitor_products.id,
															exhibition_langs.slug AS exh_slug,
															exhibitor_products.exhibitor_id AS exhibitor_id
															FROM (exhibitor_products
															INNER JOIN exhibition_langs
															ON (exhibitor_products.exh_id = exhibition_langs.exhibition_id))
															INNER JOIN
															exhibitor_pro_images
															ON     (exhibitor_pro_images.pro_id = exhibitor_products.id)
															AND (exhibitor_pro_images.exhibitor_id =
															exhibitor_products.exhibitor_id)
															WHERE (exhibitor_products.active = 1)
															AND (exhibition_langs.slug = "'.$exh_slug.'")
															AND (exhibitor_products.exhibitor_id = '.$exhibitorDetails[0]->exhibitor_id.')
													');


	
		// $product_images = DB::table('exhibitor_pro_images')->where('exhibitor_id',$exhibitorDetails[0]->exhibitor_id)->get();
	if(isset(auth::user()->id)){
		$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id','name as exh_name')->first();
		$checExhibitorExist = DB::table('exhibitor_details')->where('exh_id',$exh_id->exh_id)->where('user_id',Auth::user()->id)->count();
		$member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
		return view('pages.website.Exhibitions.ExhibitorProductsList')
			  	->with('exhibitor',$exhibitorDetails[0])
			  	->with('exh_slug',$exh_slug)
			  	->with('products',$products)
			  	->with('checExhibitorExist',$checExhibitorExist)
			  	->with('member_details',$member_details);
	}else{
		return view('pages.website.Exhibitions.ExhibitorProductsList')
  	->with('exhibitor',$exhibitorDetails[0])
  	->with('exh_slug',$exh_slug)
  	->with('products',$products);
	}
  	
  	// ->with('product_images',$product_images);
  }


  public function ExhibitorProductDetails($exh_slug, $exhibitor_slug, $pro_slug){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$exh_id = DB::table('exhibition_langs')->where('slug',$exh_slug)->select('exhibition_id as exh_id','name as exh_name','slug as exh_slug')->first();
		
		// $exhibitorDetails = DB::select('
		// 																SELECT exhibitor_lang.name as exhibitor_name,
		// 																exhibitor_lang.slug,
		// 																exhibitor_lang.address,
		// 																exhibitor_lang.about,
		// 																exhibitor_lang.services,
		// 																exhibitor_details.phone,
		// 																exhibitor_details.profile_pic,
		// 																exhibitor_details.rate,
		// 																exhibitor_details.viewed,
		// 																exhibitor_details.ceo as email,
		// 																exhibitor_details.marketing,
		// 																exhibitor_details.sales,
		// 																exhibitor_details.website,
		// 																exhibitor_details.facebook,
		// 																exhibitor_details.instagram,
		// 																exhibitor_details.linkedin,
		// 																exhibitor_details.twitter,
		// 																exhibitor_details.youtube,
		// 																exhibitor_details.snapchat,
		// 																exhibitor_details.user_id,
		// 																exhibitor_lang.exh_id,
		// 																exhibitor_lang.exhibitor_id,
		// 																countries.name AS country,
		// 																exhibitor_lang.lang_id AS exhibitor_lang_id,
		// 																exhibitor_details.online,
		// 																exh_cat_trans.cat_name,
  //      															exh_cat_trans.slug AS cat_slug
		// 																FROM ((exhibitor_details
		// 																INNER JOIN exh_cat_trans
		// 																ON (exhibitor_details.category_id = exh_cat_trans.exh_cat_id))
		// 																INNER JOIN exhibitor_lang
		// 																ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
		// 																AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
		// 																INNER JOIN countries
		// 																ON (countries.id = exhibitor_details.country_id)
		// 																WHERE (exhibitor_lang.exh_id = 1) AND (exhibitor_lang.lang_id = 1)
		// 																AND (exhibitor_lang.slug = "'.$exhibitor_slug.'")
		// 											 				');



  	$exhibitorDetails = DB::select('
																		SELECT exhibitor_lang.name as exhibitor_name,
																		exhibitor_lang.slug,
																		exhibitor_lang.address,
																		exhibitor_lang.about,
																		exhibitor_lang.services,
																		exhibitor_details.phone,
																		exhibitor_details.profile_pic,
																		exhibitor_details.rate,
																		exhibitor_details.viewed,
																		exhibitor_details.ceo as email,
																		exhibitor_details.marketing,
																		exhibitor_details.sales,
																		exhibitor_details.website,
																		exhibitor_details.facebook,
																		exhibitor_details.instagram,
																		exhibitor_details.linkedin,
																		exhibitor_details.twitter,
																		exhibitor_details.youtube,
																		exhibitor_details.snapchat,
																		exhibitor_lang.exh_id,
																		exhibitor_lang.exhibitor_id,
																		countries.name AS country,
																		exhibitor_lang.lang_id AS exhibitor_lang_id,
																		exhibitor_details.online,
																		exh_cat_trans.cat_name,
   																	exh_cat_trans.slug AS cat_slug,
   																	exh_cat_trans.lang_id AS cat_lang_id
																		FROM ((exhibitor_details
																		INNER JOIN exh_cat_trans
																		ON (exhibitor_details.category_id = exh_cat_trans.exh_cat_id))
																		INNER JOIN exhibitor_lang
																		ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
																		AND (exhibitor_lang.exh_id = exhibitor_details.exh_id))
																		INNER JOIN countries
																		ON (countries.id = exhibitor_details.country_id)
																		where(exhibitor_lang.slug = "'.$exhibitor_slug.'")
																		AND(exh_cat_trans.lang_id = '.$curr_lang->id.')
													 				');

		// product details 
		$pro_details = DB::table('exhibitor_products')->where('slug',$pro_slug)->where('exhibitor_id',$exhibitorDetails[0]->exhibitor_id)->first();
		$pro_images = DB::table('exhibitor_pro_images')->whereIn('pro_id', [$pro_details->id])->get();

		if(isset(auth::user()->id)){
			$checExhibitorExist = DB::table('exhibitor_details')->where('exh_id',$exh_id->exh_id)->where('user_id',Auth::user()->id)->count();
			$member_details = Helper::get_member_details(Auth::user()->id,$curr_lang->id);
			return view('pages.website.Exhibitions.ExhibitorProductDetails')
  					->with('exhibitor',$exhibitorDetails[0])
  					->with('pro_details',$pro_details)
  					->with('pro_images',$pro_images)
  					->with('exh_slug',$exh_id->exh_slug)
  					->with('exhibitorDetails',$exhibitorDetails)
  					->with('CheckMemberExistDb',$checExhibitorExist)
  					->with('member',$member_details[0]);
		}else{
			return view('pages.website.Exhibitions.ExhibitorProductDetails')
  					->with('exhibitor',$exhibitorDetails[0])
  					->with('pro_details',$pro_details)
  					->with('pro_images',$pro_images)
  					->with('exh_slug',$exh_id->exh_slug)
  					->with('exhibitorDetails',$exhibitorDetails);
		}
  	
  }





  public function Exhibition_Statics($slug){
	$exh_id = DB::table('exhibition_langs')->where('slug',$slug)->select('exhibition_id as exh_id','name as exh_name')->first();
	// visits
	$visitors = DB::table('exhibitions')->where('id',$exh_id->exh_id)->select('viewers')->first();
  	$countries_subscribed = DB::select('
																				SELECT exh_exhibitors_subscribes.paid,
																				exhibitor_details.country_id,
																				exh_exhibitors_subscribes.exhibitor_id,
																				countries.name
																				FROM (exhibitor_details exhibitor_details
																				INNER JOIN countries countries
																				ON (exhibitor_details.country_id = countries.id))
																				INNER JOIN
																				exh_exhibitors_subscribes exh_exhibitors_subscribes
																				ON     (exh_exhibitors_subscribes.exh_id = exhibitor_details.exh_id)
																				AND (exh_exhibitors_subscribes.exhibitor_id =
																				exhibitor_details.user_id)
																				WHERE (exh_exhibitors_subscribes.paid = 1)
																				AND (exh_exhibitors_subscribes.exh_id = '.$exh_id->exh_id.')
																				GROUP BY exhibitor_details.country_id
																			');

  	$countries_subscribed_totals = DB::select('
																				SELECT exh_exhibitors_subscribes.paid,
																				exhibitor_details.country_id,
																				exh_exhibitors_subscribes.exhibitor_id,
																				countries.name
																				FROM (exhibitor_details exhibitor_details
																				INNER JOIN countries countries
																				ON (exhibitor_details.country_id = countries.id))
																				INNER JOIN
																				exh_exhibitors_subscribes exh_exhibitors_subscribes
																				ON     (exh_exhibitors_subscribes.exh_id = exhibitor_details.exh_id)
																				AND (exh_exhibitors_subscribes.exhibitor_id =
																				exhibitor_details.user_id)
																				WHERE (exh_exhibitors_subscribes.paid = 1)
																				AND (exh_exhibitors_subscribes.exh_id = '.$exh_id->exh_id.')
																			');


  	$countries_subscribed_ids = [];
  	$countries_subscribed_data = [];
  	
  	foreach ($countries_subscribed as $key => $value) {
			array_push($countries_subscribed_ids,$value->country_id);
  	}

  	$count = count($countries_subscribed_ids);
  	// return dd($count, $countries_subscribed_ids);

  	for ($i = 0; $i < $count; $i++) { 
  		// echo $countries_subscribed_ids[$i];
  		// each country count
  		$data = DB::table('exhibitor_details')->where('country_id',$countries_subscribed_ids[$i])->count();
  		array_push($countries_subscribed_data,$data);
  	}

  	// exhibitor_s_products 
  	$exhibitors_products = DB::table('exhibitor_products')->where('exh_id',$exh_id->exh_id)->count();
  	// return dd($countries_subscribed, $count,$countries_subscribed_data);
  	// $exhibitors = DB::table('exh_exhibitors_subscribes')->select('id','name')->get();
  	return view('pages.website.Exhibitions.ExhibitionStatics')
  						->with('countries_subscribed',$countries_subscribed)
  						->with('total_countries',$count)
  						->with('countries_subscribed_data',$countries_subscribed_data)
  						->with('countries_subscribed_ids',$countries_subscribed_ids)
  						->with('countries_subscribed_totals',$countries_subscribed_totals)
  						->with('visitors',$visitors->viewers)
  						->with('exhibitors_products',$exhibitors_products);
  }

	

}
