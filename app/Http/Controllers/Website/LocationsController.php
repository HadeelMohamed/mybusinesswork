<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;

class LocationsController extends Controller
{
  public function list_Locations(){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$locations = DB::select('
															SELECT our_locations_trans.country,
															our_locations_trans.content,
															our_locations.slug,
															our_locations_trans.lang_id,
															our_locations.video,
															our_locations.image,
															our_locations.active
															FROM our_locations_trans
															INNER JOIN our_locations
															ON (our_locations_trans.location_id = our_locations.id)
															WHERE (our_locations_trans.lang_id = '.$curr_lang->id.') AND (our_locations.active = 1)
														');
  	// $locations = DB::table('our_locations')->where('active',1)->get();
  	return view('pages.website.locations')
  	->with('our_locations',$locations);
  }

  public function location_details($slug){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	// locations
  	$locations = DB::select('
															SELECT our_locations_trans.country,
															our_locations_trans.content,
															our_locations.slug,
															our_locations_trans.lang_id,
															our_locations.video,
															our_locations.image,
															our_locations.active
															FROM our_locations_trans
															INNER JOIN our_locations
															ON (our_locations_trans.location_id = our_locations.id)
															WHERE (our_locations_trans.lang_id = '.$curr_lang->id.') AND (our_locations.active = 1)
														');
  	$location_details = DB::select('
															SELECT our_locations_trans.country,
															our_locations_trans.content,
															our_locations.slug,
															our_locations_trans.lang_id,
															our_locations.video,
															our_locations.image,
															our_locations.active
															FROM our_locations_trans
															INNER JOIN our_locations
															ON (our_locations_trans.location_id = our_locations.id)
															WHERE (our_locations_trans.lang_id = '.$curr_lang->id.') AND (our_locations.active = 1)
															AND(our_locations.slug = "'.$slug.'")
														');
  	return view('pages.website.location_details')
  	->with('slug',$slug)
  	->with('our_locations',$locations)
  	->with('location_details',$location_details[0]);
  }
}
