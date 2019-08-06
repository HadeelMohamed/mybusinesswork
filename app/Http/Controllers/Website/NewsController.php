<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;

class NewsController extends Controller
{
    public function list_news(){
    	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    	$news = DB::table('news')->where('active',1)->where('lang_id',$curr_lang->id)->get();
    	return view('pages.website.news')
    	->with('news',$news);
    }

    public function news_details($slug){
    	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    	$news = DB::table('news')->where('slug',$slug)->where('lang_id',$curr_lang->id)->first();
    	return view('pages.website.news_details')
    	->with('new_details',$news);
    }
}
