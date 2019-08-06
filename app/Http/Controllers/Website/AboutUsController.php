<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;

class AboutUsController extends Controller
{
  // get about page 
  public function list_about(){
  	// $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	// $about_page_details = DB::select('
			// 							SELECT about_page_trans.title,
			// 							about_page_trans.lang_id,
			// 							about_page_trans.content,
			// 							about_page_trans.page_id,
			// 							about_page_trans.order
			// 							FROM about_page_trans
			// 							INNER JOIN about_page
			// 							ON (about_page_trans.page_id = about_page.id)
			// 							where (about_page_trans.lang_id = '.$curr_lang->id.')
			// 							ORDER BY about_page_trans.order ASC
   //      							');

		return view('pages.website.about_'.LaravelLocalization::getCurrentLocale().'');
  }
}
