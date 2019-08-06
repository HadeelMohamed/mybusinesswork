<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use App\Helpers\Helper;
use Auth;
use Session;
use Validator;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class MemberProductTranslations extends Controller
{
  public function ProductTranslations ()
  {
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
  	$languages = DB::table('languages')->get();
  	$masterProducts = DB::table('member_products')->where('member_id',Auth::user()->id)->where('lang_id',1)->whereNull('parent_id')->get();
  	if($member_details)
  	{
  		return view('pages.member.products.addtranslations')
					->with('MasterProducts',$masterProducts)
					->with('languages',$languages)
					->with('member_details',$member_details[0]);
  	}else{
  		return view('pages.member.products.addtranslations')
					->with('MasterProducts',$masterProducts)
					->with('languages',$languages);
  	}
		
  }
}
