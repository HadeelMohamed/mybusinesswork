<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use LaravelLocalization;
use App\Helpers\Helper;

class MemberProfileController extends Controller
{
  public function MemberProfile(Request $request,$member_slug){
  	// if(Helper::CheckMemberExistDb(Auth::user()->id) == 0){
  	// 	return redirect()->route('Authed_Member_Profile');
  	// }
  	
  	# get viewers
  	// $viewers = DB::table('member_viewed')->where('guest_id','!=',);

  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	
  	$member = DB::select('
														SELECT member_lang.name AS member_name,
														member_lang.slug AS member_slug,
														member_lang.address AS member_address,
														member_details.profile_pic,
														member_details.profile_cover,
														member_details.rate,
														exh_cat_trans.cat_name AS category,
														exh_cat_trans.lang_id,
														
														member_details.user_id,
														member_details.viewed,
														member_lang.about AS member_about,
														member_lang.services AS member_services,
														countries.name AS country,
														member_details.phone,
														member_details.ceo,
														member_details.marketing,
														member_details.sales,
														member_details.website,
														member_details.facebook,
														member_details.instagram,
														member_details.linkedin,
														member_details.twitter,
														member_details.youtube,
														member_details.snapchat,
														member_details.shown
														FROM (((exh_cat_trans exh_cat_trans
														INNER JOIN exh_cat exh_cat
														ON (exh_cat_trans.exh_cat_id = exh_cat.id))
														INNER JOIN member_details member_details
														ON (member_details.category_id = exh_cat.id))
														INNER JOIN member_lang member_lang
														ON (member_lang.member_id = member_details.user_id))
														INNER JOIN countries countries
														ON (member_details.country_id = countries.id)
														WHERE (member_lang.slug LIKE "'.$member_slug.'")
														AND (exh_cat_trans.lang_id = '.$curr_lang->id.')
  											');
  	$products_viewers = DB::table('members_products_viewers')->where('member_id',$member[0]->user_id)->count();

  	$subscribed_exhibitions = DB::table('exh_exhibitors_subscribes')->where('exhibitor_id',$member[0]->user_id)->count();
  	$products = DB::table('member_products')->where('active',1)->where('member_id',$member[0]->user_id)->count();
  	$viewersCount = DB::table('members_viewers')->where('member_id',$member[0]->user_id)->count();
  	DB::table('member_details')->where('user_id',$member[0]->user_id)->update(['viewed'=>$viewersCount]);
  	if(isset(Auth::user()->id)){
			# new viewer?
	  	$viewerCheck = DB::table('members_viewers')->where('member_id',$member[0]->user_id)->where('viewer_id',Auth::user()->id)->where('ip_address',$request->ip())->count();
	  	if($viewerCheck < 1 ){
	  		// insert a new viewer
	  		$insertViewer = DB::table('members_viewers')->insert(['member_id'=>$member[0]->user_id,'viewer_id'=>Auth::user()->id,'ip_address'=>$request->ip()]);
	  		// update member_viewed from membr_details 
	  		DB::table('member_details')->where('user_id',$member[0]->user_id)->update(['viewed'=>$viewersCount+1]);
	  	}
  		$CheckMemberExistDb = Helper::CheckMemberExistDb(Auth::user()->id);
  		$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
  		return view('pages.website.member')
  		->with('products_viewers',$products_viewers)
  						->with('member',$member[0])
  						->with('subscribed_exhibitions',$subscribed_exhibitions)
  						->with('products',$products)
  						->with('CheckMemberExistDb',$CheckMemberExistDb)
  						->with('NewMessagesCount',$NewMessagesCount)
  						->with('viewersCount',$viewersCount);
  	}else{
  	# new viewer?
	  	$viewerCheck = DB::table('members_viewers')->where('member_id',$member[0]->user_id)->where('ip_address',$request->ip())->count();
	  	if($viewerCheck < 1 ){
	  		// insert a new viewer
	  		$insertViewer = DB::table('members_viewers')->insert(['member_id'=>$member[0]->user_id,'ip_address'=>$request->ip()]);
	  		// update member_viewed from membr_details 
	  		DB::table('member_details')->where('user_id',$member[0]->user_id)->update(['viewed'=>$viewersCount+1]);
	  	}
  		return view('pages.website.member')
  		->with('products_viewers',$products_viewers)
  						->with('member',$member[0])
  						->with('subscribed_exhibitions',$subscribed_exhibitions)
  						->with('products',$products)
  						->with('viewersCount',$viewersCount);
  	}
  	
  	
 		
  	
  }


  public function MemberProducts(Request $request, $member_slug){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$member = DB::select('
														SELECT member_lang.name AS member_name,
														member_lang.slug AS member_slug,
														member_lang.address AS member_address,
														member_details.profile_pic,
														member_details.profile_cover,
														member_details.rate,
														exh_cat_trans.cat_name AS category,
														exh_cat_trans.lang_id,
														member_details.user_id,
														member_details.viewed,
														member_lang.about AS member_about,
														member_lang.services AS member_services,
														countries.name AS country,
														member_details.phone,
														member_details.ceo,
														member_details.marketing,
														member_details.sales,
														member_details.website,
														member_details.facebook,
														member_details.instagram,
														member_details.linkedin,
														member_details.twitter,
														member_details.youtube,
														member_details.snapchat,
														member_details.shown
														FROM (((exh_cat_trans exh_cat_trans
														INNER JOIN exh_cat exh_cat
														ON (exh_cat_trans.exh_cat_id = exh_cat.id))
														INNER JOIN member_details member_details
														ON (member_details.category_id = exh_cat.id))
														INNER JOIN member_lang member_lang
														ON (member_lang.member_id = member_details.user_id))
														INNER JOIN countries countries
														ON (member_details.country_id = countries.id)
														WHERE (member_lang.slug LIKE "'.$member_slug.'")
														AND (exh_cat_trans.lang_id = '.$curr_lang->id.')
  											');

  	// list all products titles only
  	
  	$products_images = DB::select('
														SELECT member_products.name,
														member_products.description,
														member_products.lang_id,
														member_pro_images.image,
														member_pro_images.pro_id,
														member_products.member_id,
														member_products.slug
														FROM member_pro_images
														INNER JOIN member_products
														ON     (member_pro_images.pro_id = member_products.id)
														AND (member_pro_images.member_id = member_products.member_id)
														WHERE (member_products.member_id = '.$member[0]->user_id.')
														GROUP BY member_pro_images.pro_id
														');
  	$products = DB::table('member_products')->where('active',1)->where('member_id',$member[0]->user_id)->where('active',1)->select('name','id','slug')->get();
  	// $pro_images = DB::select('
			// 													SELECT member_pro_images.pro_id,
			// 													member_pro_images.member_id,
			// 													member_pro_images.image
			// 													FROM member_pro_images 
			// 													WHERE (member_pro_images.member_id = "'.$member[0]->user_id.'")
			// 													GROUP BY member_pro_images.pro_id
			// 													limit 1
			// 											');

  	//return dd($pros);
  	$subscribed_exhibitions = DB::table('exh_exhibitors_subscribes')->where('exhibitor_id',$member[0]->user_id)->count();
  	$viewersCount = DB::table('members_viewers')->where('member_id',$member[0]->user_id)->count();
  	$products_viewers = DB::table('members_products_viewers')->where('member_id',$member[0]->user_id)->count();
  	if(isset(Auth::user()->id)){
			# check product views for this member
		
			
				DB::table('members_products_viewers')->insert(['member_id'=>$member[0]->user_id, 'viewer_id'=>Auth::user()->id,'ip_address'=>$request->ip()]);
			
			
  		$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
  		$CheckMemberExistDb = Helper::CheckMemberExistDb(Auth::user()->id);
  		
  		return view('pages.website.MemberProducts.list')
						->with('products_images',$products_images)
						->with('viewersCount',$viewersCount)
						->with('products',$products)
						->with('products_count',count($products))
  					->with('member',$member[0])
  					// ->with('pro_images',$pro_images)
  					->with('subscribed_exhibitions',$subscribed_exhibitions)
  						->with('CheckMemberExistDb',$CheckMemberExistDb)
  						->with('NewMessagesCount',$NewMessagesCount)
  						->with('products_viewers',$products_viewers);
  	}else{
			# check product views for this member
			
				DB::table('members_products_viewers')->insert(['member_id'=>$member[0]->user_id, 'ip_address'=>$request->ip()]);
			

			
			
  		return view('pages.website.MemberProducts.list')
						->with('products_images',$products_images)
						->with('viewersCount',$viewersCount)
						->with('products',$products)
						->with('products_count',count($products))
  					->with('member',$member[0])
  					// ->with('pro_images',$pro_images)
  					->with('subscribed_exhibitions',$subscribed_exhibitions)
  					->with('products_viewers',$products_viewers);
  	}
  	
  }

  public function MemberProductDetails(Request $request,$member_slug, $pro_slug){
  	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	//commenter details
  	

  	// get product details 
  	$pro_details = DB::table('member_products')->where('slug',$pro_slug)->first();
  	$member = DB::select('
														SELECT member_lang.name AS member_name,
														member_lang.slug AS member_slug,
														member_lang.address AS member_address,
														member_details.profile_pic,
														member_details.profile_cover,
														member_details.rate,
														exh_cat_trans.cat_name AS category,
														exh_cat_trans.lang_id,
														member_details.user_id,
														member_details.viewed,
														member_lang.about AS member_about,
														member_lang.services AS member_services,
														countries.name AS country,
														member_details.phone,
														member_details.ceo,
														member_details.marketing,
														member_details.sales,
														member_details.website,
														member_details.facebook,
														member_details.instagram,
														member_details.linkedin,
														member_details.twitter,
														member_details.youtube,
														member_details.snapchat,
														member_details.shown
														FROM (((exh_cat_trans exh_cat_trans
														INNER JOIN exh_cat exh_cat
														ON (exh_cat_trans.exh_cat_id = exh_cat.id))
														INNER JOIN member_details member_details
														ON (member_details.category_id = exh_cat.id))
														INNER JOIN member_lang member_lang
														ON (member_lang.member_id = member_details.user_id))
														INNER JOIN countries countries
														ON (member_details.country_id = countries.id)
														WHERE (member_lang.slug LIKE "'.$member_slug.'")
														AND (exh_cat_trans.lang_id = '.$curr_lang->id.')
  											');
		$member_logo = DB::table('member_details')->where('user_id',$member[0]->user_id)->select('profile_pic as commenter_logo')->first();
  	$products = DB::table('member_products')->where('active',1)->where('member_id',$member[0]->user_id)->where('active',1)->select('name','id')->get();
  	$subscribed_exhibitions = DB::table('exh_exhibitors_subscribes')->where('exhibitor_id',$member[0]->user_id)->count();


  	// $pro_specifications = DB::table('member_pro_specifications')->where('pro_id',$request->pro_id)->get();

  	//$pro_images = DB::table('member_pro_images')->where('member_id',$request->member_id)->where('pro_id',$request->pro_id)->get();
  	$all_product_images_slider = DB::table('member_pro_images')->where('pro_id',$pro_details->id)->get();

  	$all_products_images = DB::table('member_pro_images')->get();

  	$other_products = DB::table('member_products')->where('member_id',$member[0]->user_id)->where('active',1)->where('id','!=',$pro_details->id)->get();
  	$pro_images = DB::select('
															SELECT member_pro_images.pro_id,
															member_pro_images.member_id,
															member_pro_images.image
															FROM member_pro_images 
															GROUP BY member_pro_images.pro_id
														');


  	//$pro_images = DB::table('member_pro_images')->where('pro_id',$request->pro_id)->get();
  	// $comments = DB::select('
			// 												SELECT pro_comments.comment,
			// 												member_lang.name,
			// 												member_details.profile_pic,
			// 												pro_comments.created_at,
			// 												pro_comments.parent_created,
			// 												pro_comments.pro_id
			// 												FROM (member_lang member_lang
			// 												INNER JOIN member_details 
			// 												ON (member_lang.member_id = member_details.user_id))
			// 												INNER JOIN pro_comments 
			// 												ON (pro_comments.commenter_id = member_lang.member_id)
			// 												WHERE (pro_comments.pro_id = "'.$pro_details->id.'")
   //      									');

  	$comments = DB::select('
															SELECT pro_comments.comment,
															member_lang.slug AS member_slug,
															member_lang.name AS member_name,
															member_lang.lang_id,
															commenter_lang.name AS commenter_name,
															commenter_lang.slug AS commenter_slug,
															commenter_lang.lang_id,
															pro_comments.created_at,
															pro_comments.parent_created,
															pro_comments.pro_id,
															commenter_details.profile_pic AS commenter_logo,
															commenter_details.user_id AS commenter_id,
															member_details.profile_pic AS member_logo,
															member_details.user_id AS member_id
															FROM (((member_lang commenter_lang
															INNER JOIN pro_comments pro_comments
															ON (commenter_lang.member_id = pro_comments.commenter_id))
															INNER JOIN member_lang member_lang
															ON (member_lang.member_id = pro_comments.member_id))
															INNER JOIN member_details member_details
															ON (member_details.user_id = member_lang.member_id))
															INNER JOIN member_details commenter_details
															ON (commenter_details.user_id = commenter_lang.member_id)
															WHERE (pro_comments.pro_id = '.$pro_details->id.')
															AND (member_details.user_id = '.$member[0]->user_id.')
															order by pro_comments.created_at desc
        									');
  	//$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
  	// return dd($pro_details,$member,$products,$subscribed_exhibitions,$pro_specifications,$all_product_images_slider,$all_products_images,$other_products,$pro_images,$comments);
  	//$CheckMemberExistDb = Helper::CheckMemberExistDb(Auth::user()->id);
  	$viewersCount = DB::table('members_viewers')->where('member_id',$member[0]->user_id)->count();
  	$CheckMemberExistDb = Helper::CheckMemberExistDb($member[0]->user_id);
  	if(count($member) > 0)
  	{
  		// return here
  		return view('pages.website.MemberProducts.show')
  							->with('member',$member[0])
  							->with('member_logo',$member_logo)
  							->with('pro_details',$pro_details)
  							->with('viewersCount',$viewersCount)
  							->with('products',$products)
  							->with('products_count',count($products))
  							->with('subscribed_exhibitions',$subscribed_exhibitions)
  							// ->with('pro_specifications',$pro_specifications)
  							->with('pro_images',$pro_images)
  							->with('all_products_images',$all_products_images)
  							->with('other_products',$other_products)
  							->with('all_product_images_slider',$all_product_images_slider)
  							->with('CheckMemberExistDb',$CheckMemberExistDb)
  							->with('comments',$comments);
  							//->with('NewMessagesCount',$NewMessagesCount);
  	}else{
  		// return here
  		return view('pages.website.MemberProducts.show')
  							->with('member',$member[0])
  							->with('member_logo',$member_logo)
  							->with('pro_details',$pro_details)
  							->with('viewersCount',$viewersCount)
  							->with('products',$products)
  							->with('products_count',count($products))
  							->with('subscribed_exhibitions',$subscribed_exhibitions)
  							// ->with('pro_specifications',$pro_specifications)
  							->with('pro_images',$pro_images)
  							->with('all_products_images',$all_products_images)
  							->with('other_products',$other_products)
  							->with('all_product_images_slider',$all_product_images_slider)
  							->with('CheckMemberExistDb',$CheckMemberExistDb)
  							->with('comments',$comments);
  	}
  }

  public function MemberPosts(Request $request){
  	$posts = DB::table('member_posts')->get();
  	$member = DB::select('
													SELECT member_lang.name AS name,
													categories.name AS category,
													countries.name AS country,
													member_details.rate AS rate,
													member_lang.address AS address,
													users.email AS email,
													member_details.user_id AS user_id,
													member_details.viewed AS viewed,
													member_details.phone AS phone,
													member_lang.slug AS member_slug,
													member_lang.about AS member_about,
													member_lang.services AS member_services,
													member_details.profile_pic
													FROM (((member_details
													INNER JOIN countries
													ON (member_details.country_id = countries.id))
													INNER JOIN member_lang
													ON (member_lang.member_id = member_details.user_id))
													INNER JOIN categories
													ON (member_details.category_id = categories.id))
													INNER JOIN users
													ON (users.id = member_details.user_id)
													WHERE (member_details.user_id = "'.$request->member_id.'")
  											');
  	$products = DB::table('member_products')->where('active',1)->where('member_id',$member[0]->user_id)->select('name','id')->get();
  	$subscribed_exhibitions = DB::table('exh_exhibitors_subscribes')->where('exhibitor_id',$member[0]->user_id)->count();
  	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
  	return view('pages.website.MemberPosts.list')
  			->with('posts',$posts)
  			->with('products',$products)
  			->with('products_count',count($products))
  			->with('subscribed_exhibitions',$subscribed_exhibitions)
  			->with('member',$member[0])
  			->with('NewMessagesCount',$NewMessagesCount);
  }
}
