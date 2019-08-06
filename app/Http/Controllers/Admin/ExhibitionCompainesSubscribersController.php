<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class ExhibitionCompainesSubscribersController extends Controller
{
    public function list_companies(){
    	$exh_companies = DB::select('SELECT member_lang.name AS member_name,
       exhibition_langs.name AS exhibition_name,
       exh_members_subscribes.subscribe_type
			FROM (((exh_members_subscribes exh_members_subscribes
			        INNER JOIN exhibition_langs exhibition_langs
			          ON (exh_members_subscribes.exh_id = exhibition_langs.exhibition_id))
			       	INNER JOIN languages languages
			          ON (exhibition_langs.lang_id = languages.id))
			      	INNER JOIN member_lang member_lang
			         	ON     (member_lang.lang_id = languages.id)
		            AND (exh_members_subscribes.member_id = member_lang.member_id))
			      		INNER JOIN users users
			        	ON (member_lang.member_id = users.id)
			        	WHERE (languages.id = 1)');

    	return view('pages.admin.exhibition_trans.companies')
			    	->with('exh_companies',$exh_companies);
    }
}
