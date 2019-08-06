<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class ExhibitionCategoriesController extends Controller
{
    public function listCategories(Request $request){
    	session()->forget('duplicated');
    	session()->forget('success');
    	session()->forget('error');

			if ($request->isMethod('post') == false) {
				// get english language
				$english_lang = DB::table('languages')->where('id',1)->first();
				$exh_categories = DB::select('SELECT exhibition_categories.id,
																			       exhibition_categories.name,
																			       languages.name AS lang_name,
																			       exhibition_categories.active,
																			       languages.id
																			FROM exhibition_categories exhibition_categories
																			     INNER JOIN languages languages
																			        ON (exhibition_categories.lang_id = languages.id)
																			WHERE (languages.id = 1)');
				return view('pages.admin.exhibition_categories.list')
								->with('english_lang',$english_lang)
								->with('exh_categories',$exh_categories);
			}else{
				// duplicated checker
				// lower string for check duplicated
				$lower = strtolower($request->category_name);
				$duplicated = DB::table('exhibition_categories')->where('name',$lower)->count();
				if($duplicated > 0){
					// have a duplicated record
					$english_lang = DB::table('languages')->where('id',1)->first();
					$exh_categories = DB::select('SELECT exhibition_categories.id,
																				       exhibition_categories.name,
																				       languages.name AS lang_name,
																				       exhibition_categories.active,
																				       languages.id
																				FROM exhibition_categories exhibition_categories
																				     INNER JOIN languages languages
																				        ON (exhibition_categories.lang_id = languages.id)
																				WHERE (languages.id = 1)');
					Session::flash('duplicated');
					return view('pages.admin.exhibition_categories.list')
									->with('english_lang',$english_lang)
									->with('exh_categories',$exh_categories);
				}else{
					// insert record
					// slugy
					$slug_name = str_replace(' ', '-', $request->category_name);
					$slug_name = strtolower($slug_name);
					$insert = DB::table('exhibition_categories')->insert([
																																'name' => $request->category_name,
																																'slug' => $slug_name,
																																'lang_id'=> $request->languages_id,
																																'created_by' =>Auth::user()->id
																															]);
					// get all required data
					// get english language
					$english_lang = DB::table('languages')->where('id',1)->first();
					$exh_categories = DB::select('SELECT exhibition_categories.id,
																				       exhibition_categories.name,
																				       languages.name AS lang_name,
																				       exhibition_categories.active,
																				       languages.id
																				FROM exhibition_categories exhibition_categories
																				     INNER JOIN languages languages
																				        ON (exhibition_categories.lang_id = languages.id)
																				WHERE (languages.id = 1)');
					Session::flash('success');
					return view('pages.admin.exhibition_categories.list')
									->with('english_lang',$english_lang)
									->with('exh_categories',$exh_categories);
				}

			}
    	
    }
}
