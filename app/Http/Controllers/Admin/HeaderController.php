<?php
namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
class HeaderController extends Controller
{


public function Header_list()

{
	    $all_headers = DB::table('menus_front')
                    ->join('languages','languages.id','=','menus_front.lang_id')
                    ->where('languages.lang',\Lang::locale())
                    ->whereNull('parentsid')->select('menus_front.*','languages.lang')
                   ->get();



                  return view('pages.admin.headers.index',compact('all_headers'));
}
}