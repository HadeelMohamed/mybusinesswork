<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;   
use Intervention\Image\ImageManagerStatic as Image;

use File;
use Session;
use LaravelLocalization;


class FeatureWebsiteController extends Controller

{

 public function Features_list()

 {
$lang_id=DB::table('languages')->where('lang',\Lang::locale())->pluck('id')->first();

 	$all_features=DB::table('our_features')->where('lang_id',$lang_id)->get();

    return view('pages.admin.features_website.index',compact('all_features'));


	} 

 public function Feature_delete(Request $request)
 {
 	$Feature_delete = DB::table('our_features')->where('id',$request->feature_iddelete)->delete();
        session::flash('deleted_success');
        return redirect()->back();
 }
public function Feature_edit(Request $request)
 {
 	

$photo=$request->photo;

$name=preg_replace('/\s+/', '-', strtolower($request->name));
$Featureupdate = DB::table('our_features')->where('id',$request->featureid)
                                    ->update([
                      'title'=>$request->name,  
                       'icon'=> (isset($photo)) ? $name.'-'.$request->featureid.'.'.$photo->getClientOriginalExtension() : $request->photoinput,  
                  'active'=>$request->active
                                            ]);


                         


                          if ($request->has('photo')) {
         



             $input['imagename'] = $name.'-'.$request->featureid.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('/website/images');
        $img = Image::make($photo->getRealPath());
        $img->resize(50, 50, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('/website/images');
        $photo->move($destinationPath, $input['imagename']);

           
        }

         session::flash('update_sucess','Feature Updated Succeflly');
        return redirect()->route('Features_list');

 }

}
