<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
Use App\User;
use Illuminate\Support\Facades\Hash;
Use App\Language;
use App\Code\returnCode;
use App\Nationality;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
class RegistrationTypeController extends Controller

{

	public function Registration_personal(Request $request)

	{
		 $lang_id=Language::where('lang',\Lang::locale())->pluck('id')->first();
		 $user = User::find(Auth::user()->id);
$username=User::whereHas('memberlang', function ($query) use ($lang_id) {
    $query->where('lang_id','=', $lang_id);
    $query->where('member_id','=', Auth::user()->id);
})->first();
		// dd($request->all(),$request->code.$request->telephone,$username->memberlang[0]->name);

		  $user = User::find(Auth::user()->id);

		      $path_images = public_path().'/images/en/';
    $path_images_raw = public_path().'/raw';
    $path_images_thumb = public_path().'/images/en/thumb';
    $path_images_med = public_path().'/images/en/med';
    $path_images_larg = public_path().'/images/en/larg';
    $slug = $username->memberlang[0]->name.' '.Auth::user()->id;
    $slug = strtolower(str_replace(' ', '-', $slug));

    if(!file_exists( $path_images )){
      mkdir($path_images, 0777, true);
      File::makeDirectory($path_images, $mode = 0777, true, true);
    }
    if(!file_exists( public_path().'/raw' )){
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
    // Update Member Details
      /******************** have logo *******************************************************/
      
        // raw image
        $logo = $request->logo;
        $logoExt =$logo->getClientOriginalExtension();
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
      


		  $user->Memberdetails()->update([
          'gender'=> $request->gender,
          'date_birth'=> $request->date,
          'country_id'=> $request->country,
          'phone'=> $request->code.$request->telephone,
          'nationality_id'=> $request->nationallity,
          'address'=> $request->adderss,
           'zip'=> $request->zip,
           'profile_pic'=>$slug.'-logo.'.$logoExt,
      ]);


		  return redirect('/');
	}


}