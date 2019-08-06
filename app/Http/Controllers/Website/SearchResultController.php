<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use Illuminate\Pagination\Paginator;

class SearchResultController extends Controller
{
	public function SearchResult(Request $request, $q = null){
	    
		$users = DB::table('users')->paginate(20);
    	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    	$account_types = DB::table('gender_langs')->where('lang_id',$curr_lang->id)->get();

    	
    	$categories = DB::select('
								  SELECT exh_cat_trans.cat_name as name,
	                              exh_cat_trans.lang_id,
	                              exh_cat_trans.slug,
	                              exh_cat.active AS cat_active,
	                              exh_cat_trans.active AS cat_trans_active,
	                              exh_cat.id as id
	                              FROM exh_cat_trans
	                              INNER JOIN exh_cat
	                              ON (exh_cat_trans.exh_cat_id = exh_cat.id)
	                              WHERE (exh_cat_trans.lang_id = '.$curr_lang->id.')
                              ');

    	$countries = DB::table('countries')->where('active',1)->select('id','name as country','active')->get();
    	
    	// $q = "WHERE (exh_cat_trans.lang_id = $curr_lang->id) AND (gender_langs.lang_id = $curr_lang->id)";
        
    	// CASE 1 ALL EMPTY INPUTS
    	if($request->search == null && $request->account_type_id == 0 && $request->country_id == 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->join('members_viewers as members_viewers', function ($join) {
							            $join->on('member_details.user_id','=','members_viewers.member_id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id',
																'gender_langs.gener_id AS account_type_id,
															')
									    ->inRandomOrder()->paginate(20);
	    // check rated
    	// $check_rated = DB::table('members_raters')->where('member_id',Auth::user()->id)->where('member_id',$members->)->count();
		
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('users',$users)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}


    	// CASE 2 Have search type only
    	if($request->search != null && $request->account_type_id == 0 && $request->country_id == 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																//'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}

    	// CASE 3 Have account type only
    	if($request->search == null && $request->account_type_id != 0 && $request->country_id == 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																//'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}




    	// CASE 4 Have country type only
    	if($request->search == null && $request->account_type_id == 0 && $request->country_id != 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.country_id',$request->country_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																//'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 5 Have country type only
    	if($request->search == null && $request->account_type_id == 0 && $request->country_id == 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('exh_cat_trans.exh_cat_id',$request->category_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 6 Have account_type_id and search only
    	if($request->search != null && $request->account_type_id != 0 && $request->country_id == 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->where ('gender_langs.gener_id',$request->account_type_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 7 Have account_type_id and category only
    	if($request->search == null && $request->account_type_id != 0 && $request->country_id == 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.category_id',$request->category_id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_details.profile_pic',
																'member_lang.address AS member_address',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}


    	// CASE 7 Have account_type_id and country only
    	if($request->search == null && $request->account_type_id != 0 && $request->country_id != 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->where ('member_details.country_id',$request->country_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}




    	// CASE 8 Have category and country only
    	if($request->search == null && $request->account_type_id == 0 && $request->country_id != 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.category_id',$request->category_id)
											->where ('member_details.country_id',$request->country_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 9 Have search type and category only
    	if($request->search != null && $request->account_type_id == 0 && $request->country_id == 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.category_id',$request->category_id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 9 Have search type and category only
    	if($request->search != null && $request->account_type_id == 0 && $request->country_id != 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.country_id',$request->country_id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	


    	// CASE 10 Have search type only
    	if($request->search != null && $request->account_type_id != 0 && $request->country_id != 0 && $request->category_id == 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.country_id',$request->country_id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 11 Have category country search type only
    	if($request->search != null && $request->account_type_id == 0 && $request->country_id != 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.country_id',$request->country_id)
											->where ('member_details.category_id',$request->category_id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}




    	// CASE 12 Have account type, category, search type only
    	if($request->search != null && $request->account_type_id != 0 && $request->country_id == 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->where ('member_details.category_id',$request->category_id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}



    	// CASE 13 Have all
    	if($request->search != null && $request->account_type_id != 0 && $request->country_id != 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.country_id',$request->country_id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->where ('member_details.category_id',$request->category_id)
											->where ('member_lang.name','like','%'.$request->search.'%')
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}






    	// CASE 14 Have all
    	if($request->search == null && $request->account_type_id != 0 && $request->country_id != 0 && $request->category_id != 0){
    		
    		$members = DB::table('exh_cat_trans as exh_cat_trans')
											
											->join('member_details as member_details', function ($join) {
							            $join->on('exh_cat_trans.exh_cat_id', '=', 'member_details.category_id')/* where here*/;
								        })
											->join('gender_langs as gender_langs', function ($join) {
							            $join->on('gender_langs.lang_id', '=', 'exh_cat_trans.lang_id')/* where here*/;
							            $join->on('gender_langs.gener_id', '=', 'member_details.gender')/* where here*/;
								        })
											->join('member_lang as member_lang', function ($join) {
							            $join->on('member_lang.member_id','=','member_details.user_id')/* where here*/;
								        })
											->join('countries as countries', function ($join) {
							            $join->on('member_details.country_id','=','countries.id')/* where here*/;
								        })
											->where('exh_cat_trans.lang_id',$curr_lang->id) 
											->where ('gender_langs.lang_id',$curr_lang->id)
											->where ('member_details.country_id',$request->country_id)
											->where ('gender_langs.gener_id',$request->account_type_id)
											->where ('member_details.category_id',$request->category_id)
											->select('member_lang.name AS member_name',
																'member_lang.slug AS slug',
																'member_lang.address AS member_address',
																'member_details.profile_pic',
																'member_details.profile_cover',
																'member_details.rate',
																'member_details.viewed',
																// 'member_details.online',
																'exh_cat_trans.cat_name AS category_name',
																'countries.name AS country',
																'exh_cat_trans.lang_id AS cat_lang_id',
																'gender_langs.name AS account_type',
																'gender_langs.lang_id AS account_type_lang_id',
																'countries.id AS country_id',
																'gender_langs.gener_id AS account_type_id
															')
									    ->inRandomOrder()->paginate(20);
    	
    	return view('pages.website.search_result')
						    	->with('members',$members)
						    	->with('category_id',$request->category_id)
						    	->with('country_id',$request->country_id)
						    	->with('categories',$categories)
						    	->with('countries',$countries)
						    	->with('account_types',$account_types)
						    	->with('account_type_id',$request->account_type_id)
						    	->with('search_value',$request->search)
						    	->with('page',$request->page);

    	}




    	



    	

}
    
}
