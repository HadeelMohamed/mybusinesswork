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

class MemberProductGalleries extends Controller
{
  public function ProductGalleries()
  {
		return view('pages.member.products.galleries');
  }
}
