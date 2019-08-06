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


class MemberProductsGalleriesController extends Controller
{
	public function ProductGalleryPage(Request $request)
	{

		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
		$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
		// get product images 
		$pro_images = DB::table('member_pro_images')->where('member_id',Auth::user()->id)->where('pro_id',$request->pro_id)->get();
		$languages = DB::table('languages')->where('shown',1)->select('id','name')->get();
    return view('pages.member.products.productGallery')
    				->with('pro_images',$pro_images)
    				->with('member_details',$member_details[0])
            ->with('NewMessagesCount',$NewMessagesCount)
    				->with('languages',$languages);
						//->with('pro_id',$request->pro_id)
						//->with('pro_lang_id',$request->pro_lang_id);
  }


  public function ProductGalleryPagePost(Request $request)
  {
  	// get values from request
		$lang = DB::table('languages')->where('id',$request->lang_id)->first();
		$path_images = public_path().'/images/en/';
    // $path_images_raw = public_path().'/en/images/raw';
    $path_images_raw = public_path().'/raw';
    $path_product_images_thumb = public_path().'/images/en/products_gallery/thumb';
    $path_product_images_med = public_path().'/images/en/products_gallery/med';
    $path_product_images_larg = public_path().'/images/en/products_gallery/larg';
    if(File::exists($path_images) != 'false') {
			mkdir($path_images, 0777, true);
      File::makeDirectory($path_images, $mode = 0777, true, true);
		}

		if(File::exists($path_images_raw) != 'false') {
			mkdir($path_images_raw, 0777, true);
      File::makeDirectory($path_images_raw, $mode = 0777, true, true);
		}

		if(File::exists($path_product_images_thumb) != 'false') {
			mkdir($path_product_images_thumb, 0777, true);
      File::makeDirectory($path_product_images_thumb, $mode = 0777, true, true);
		}

		if(File::exists($path_product_images_med) != 'false') {
			mkdir($path_product_images_med, 0777, true);
      File::makeDirectory($path_product_images_med, $mode = 0777, true, true);
		}

		if(File::exists($path_product_images_larg) != 'false') {
			mkdir($path_product_images_larg, 0777, true);
      File::makeDirectory($path_product_images_larg, $mode = 0777, true, true);
		}
    
      if(Input::hasFile('pro_image'))
      {
      	// $time = time();
      	// $ext = Input::file('pro_image')->getClientOriginalExtension();
      	$fullFileNameTaget = $path_images_raw.'/raw_'.$request->pro_id.'_'.Auth::user()->id.'_'.$time.'.'.$ext;
      	$FileNameThumb = public_path('').'/images/en/products_gallery/thumb/'.'pro_image_'.$time.'.'.$ext;
      	$FileNameMed = public_path('').'/images/en/products_gallery/med/'.'pro_image_'.$time.'.'.$ext;
      	$FileNameLarg = public_path('').'/images/en/products_gallery/larg/'.'pro_image_'.$time.'.'.$ext;
        $pro_image = Input::file('pro_image');

        
        //return dd(public_path().'/images/en/products_gallery/med/'.'pro_image_'.$time.'.'.$ext);
        // $pro_image->move($path_images_raw,$slug_title.'.'.$ext);
        $pro_image->move($path_images_raw,'raw_'.$request->pro_id.'_'.Auth::user()->id.'_'.$time.'.'.$ext);

        // thumbnail
        $pro_image = Image::make($fullFileNameTaget);
        $pro_image->resize(50, 50);
        $pro_image->save($FileNameThumb);
				
        $pro_image = Image::make($fullFileNameTaget);
        $pro_image->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $pro_image->save($FileNameMed);
				
        $pro_image = Image::make($fullFileNameTaget);
        $pro_image->resize(500, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        // return dd(public_path('').'/images/en/products_gallery/larg/'.'pro_image_'.$time.'.'.$ext);
        $pro_image->save($FileNameLarg);
      }

	  	// inserrt db
	  	$insert = DB::table('member_pro_images')->insert([
  																											'member_id'=>Auth::user()->id,
  																											'pro_id'=>1,
  																											'lang_id'=>1,
  																											// 'image'=>'pro_image_'.$time.'.'.$ext,
                                                        'active'=>1,
  																											'created_by'=>Auth::user()->id
																											]);
  	if($insert == 1){
      return response('done');
  		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
			$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
			$languages = DB::table('languages')->where('shown',1)->select('id','name')->get();
      $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
			// get product images 
			$pro_images = DB::table('member_pro_images')->where('pro_id',$request->pro_id)->where('member_id',Auth::user()->id)->get();
			Session::flash('success','Image Added Success!');
	  	return view('pages.member.products.productGallery')->with('pro_images',$pro_images)->with('member_details',$member_details[0])
	  	->with('pro_id',$request->pro_id)
	  	->with('pro_lang_id',$request->pro_lang_id)
      ->with('NewMessagesCount',$NewMessagesCount)
	  	->with('languages',$languages);
  	}else{
      return response('error');
  		Session::flash('error','not saved yet!');
  		return redirect()->back();
  	}

  	
  }





  public function ajaxImage(Request $request)
    {
      if ($request->isMethod('get'))
        return redirect()->route('Authed_Member_Products_Create');
      else  {
              $validator = Validator::make($request->all(),
                [
                  'file' => 'image',
                ],
                [
                  'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);

                if ($validator->fails())
                  return array(
                                'fail' => true,
                                'errors' => $validator->errors()
                              );
                  // upload 
                  # start #
                  // get values from request
                  //$lang = DB::table('languages')->where('id',$request->lang_id)->first();
                  $path_images = public_path().'/images/en/';
                  // $path_images_raw = public_path().'/en/images/raw';
                  $path_images_raw = public_path().'/raw';
                  $path_product_images_thumb = public_path().'/images/en/products_gallery/thumb';
                  $path_product_images_med = public_path().'/images/en/products_gallery/med';
                  $path_product_images_larg = public_path().'/images/en/products_gallery/larg';

                  if(File::exists($path_images) != 'false') {
                    mkdir($path_images, 0777, true);
                    File::makeDirectory($path_images, $mode = 0777, true, true);
                  }

                  if(File::exists($path_images_raw) != 'false') {
                    mkdir($path_images_raw, 0777, true);
                    File::makeDirectory($path_images_raw, $mode = 0777, true, true);
                  }

                  if(File::exists($path_product_images_thumb) != 'false') {
                    mkdir($path_product_images_thumb, 0777, true);
                    File::makeDirectory($path_product_images_thumb, $mode = 0777, true, true);
                  }

                  if(File::exists($path_product_images_med) != 'false') {
                    mkdir($path_product_images_med, 0777, true);
                    File::makeDirectory($path_product_images_med, $mode = 0777, true, true);
                  }

                  if(File::exists($path_product_images_larg) != 'false') {
                    mkdir($path_product_images_larg, 0777, true);
                    File::makeDirectory($path_product_images_larg, $mode = 0777, true, true);
                  }

                    if(Input::hasFile('file'))
                    {
                      $time = time();
                      $ext = Input::file('file')->getClientOriginalExtension();
                      $fullFileNameTaget = $path_images_raw.'/raw_'.$request->pro_id.'_'.Auth::user()->id.'_'.$time.'.'.$ext;
                      $FileNameThumb = public_path('').'/images/en/products_gallery/thumb/'.'pro_image_'.$time.'.'.$ext;
                      $FileNameMed = public_path('').'/images/en/products_gallery/med/'.'pro_image_'.$time.'.'.$ext;
                      $FileNameLarg = public_path('').'/images/en/products_gallery/larg/'.'pro_image_'.$time.'.'.$ext;
                      $pro_image = Input::file('file');

                      
                      //return dd(public_path().'/images/en/products_gallery/med/'.'pro_image_'.$time.'.'.$ext);
                      // $pro_image->move($path_images_raw,$slug_title.'.'.$ext);
                      $pro_image->move($path_images_raw,'raw_'.$request->pro_id.'_'.Auth::user()->id.'_'.$time.'.'.$ext);

                      // thumbnail
                      $pro_image = Image::make($fullFileNameTaget);
                      $pro_image->resize(50, 50);
                      $pro_image->save($FileNameThumb);
                      
                      $pro_image = Image::make($fullFileNameTaget);
                      $pro_image->resize(500, null, function ($constraint) {
                          $constraint->aspectRatio();
                      });
                      $pro_image->save($FileNameMed);
                      
                      $pro_image = Image::make($fullFileNameTaget);
                      $pro_image->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                      });
                      // return dd(public_path('').'/images/en/products_gallery/larg/'.'pro_image_'.$time.'.'.$ext);
                      $pro_image->save($FileNameLarg);
                      $filename = 'pro_image_'.$time.'.'.$ext;
                      
                    }

                    // insert db
                    $insert = DB::table('member_pro_images')->insert([
                                                                      'member_id'=>Auth::user()->id,
                                                                      'pro_id'=>$request->pro_id,
                                                                      'lang_id'=>1,
                                                                      'image'=>'pro_image_'.$time.'.'.$ext,
                                                                      'active'=>1,
                                                                      'created_by'=>Auth::user()->id
                                                                    ]);

                    if($insert == 1){
                      return $filename;
                    }else{
                      return response('error');
                    }
                  # end #
                  // $extension = $request->file('file')->getClientOriginalExtension();
                  // $dir = 'uploads/';
                  // $filename = uniqid() . '_' . time() . '.' . $extension;
                  // $request->file('file')->move($dir, $filename);
                  // return $filename;
            }
    }

    public function ajaxImageDelete(Request $request)
    {
      // delete from db
      $delete = DB::table('member_pro_images')->where('image',$request->pro_image)->delete();
      if($delete == 1){
        return response()->json(['status' => 'success','message'=>'Image was deleted success!', 200, [], JSON_UNESCAPED_UNICODE]);
        // File::delete('uploads/' . $filename);
      }else{
        return response()->json(['status' => 'error','message'=>'Image not deleted yet!', 200, [], JSON_UNESCAPED_UNICODE]);
      }
    }





    


  
}
