<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

// check redirect
  Route::get('/Check_redirect', 'CheckerController@check_redirect')->name('check_redirect')->middleware('verified');

// public website pathes
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function()
{


  Auth::routes(['verify' => true]);
	// Home Page
//test
    Route::get('/comment', function () {
    return view('pages.website.MemberProducts.comment');
});

    //hadeel return viw pages
Route::any('/profile_setting', 'Website\\RegistrationController@return_view_profile_setting')->name('profile_setting')->middleware('verified');

Route::any('/full_register_page', 'Website\\RegistrationController@return_view_full_register_page')->name('full_register_page');


  Route::get('/', 'Website\\PagesController@homePage')->name('home_page');
  Route::get('/Promotions','Website\\PagesController@LandingPage')->name('landingPage');

  Route::post('/Subscribe/CampaginSubscribe','Website\\SubscribersController@CampaginSubcribers')->name('CampaginSubscribe');
  //our messages guests
  Route::post('/our_messages_ajax_post','Website\\OurGuestsMessagesController@our_messages_ajax_post')->name('our_messages_ajax_post');
  Route::post('/our_messages_post','Website\\OurGuestsMessagesController@our_messages_post')->name('our_messages_post');
  // company profile
  Route::get('/{member_slug}', 'Website\\MemberProfileController@MemberProfile');
  Route::get('/FAQs/FAQs', 'Website\\PagesController@FAQs');
  Route::get('/Terms/TermsConditions', 'Website\\PagesController@TermsConditions');
  Route::get('/Privacy/Privacy', 'Website\\PagesController@Privacy');
  // company profile products
  // Route::post('/Member/Products', 'Website\\MemberProfileController@MemberProducts')->name('MemberProducts');
  // company profile product details
  Route::get('/Member/{member_slug}/Products', 'Website\\MemberProfileController@MemberProducts');//->middleware('auth');
  Route::get('/Member/Product/{member_slug}/{pro_slug}', 'Website\\MemberProfileController@MemberProductDetails')->name('MemberProductDetails');//->middleware('auth');
  // posts
  Route::post('/Member/Posts', 'Website\\MemberProfileController@MemberPosts')->name('MemberPosts');
  // Search And Result
  // Route::get('/Search/SearchResult','Website\\SearchResultController@SearchResult')->name('SearchResult');
  //companies
  Route::get('/Search/Companies','Website\\SearchResultController@SearchResult')->name('CompaniesSearchResult');
  // News
  Route::get('/News/News','Website\\NewsController@list_news')->name('News');
  // About
  Route::get('/About/About','Website\\AboutUsController@list_about')->name('About');
  Route::get('/WhyOnlineExpo/WhyOnlineExpo/{exh_slug}','Website\\PagesController@WhyOnlineExpo')->name('WhyOnlineExpo');
  // Locations
  Route::get('/Locations/Locations','Website\\LocationsController@list_Locations')->name('Locations');
  Route::get('/Locations/Locations/{slug}','Website\\LocationsController@location_details');
  // ContactUs
  Route::get('/ContactUs/ContactUs','Website\\ContactUsController@list_ContactUs')->name('ContactUs');
  // ContactUsPost
  Route::post('/ContactUs/ContactUsPost','Website\\ContactUsController@list_ContactUsPost')->name('ContactUsPost');
    // subscribe
  Route::post('/SubScribePost/SubScribePost','Website\\ContactUsController@SubScribePost')->name('SubScribePost');
  // Show News Details
  Route::get('/News/{slug}','Website\\NewsController@news_details');
  // blogs
  Route::get('/Blog/{slug}','Website\\BlogsController@blog');
  Route::get('/Blogs/AllBlogs','Website\\BlogsController@blogs')->name('all_blogs');
  // messages
  Route::post('/MemberMessagesCreatePost','Member\\MembersMessagesController@SendMessageMember')->name('SendMessageMember')->middleware('auth');
  // comments
  Route::post('/MemberProductCommentPost','Member\\MemberProductCommentPost@MemberProductCommentPost')->name('MemberProductCommentPost')->middleware('auth');
  
  // rate a member
  Route::post('/MemberRating','Website\\MemberRateController@RateMember')->name('rateAjax')->middleware('auth');

  // rate a exhibitor
  Route::post('/ExhibitorRating','Website\\MemberRateController@RateExhibitor')->name('rateExhibitorAjax')->middleware('auth');

  // exhibitions
  Route::get('/Exhibitions/All','Website\\ExhibitionsController@Exhibitions')->name('Exhibitions');
  Route::get('/Exh/Exhibitions','Website\\ExhibitionsController@SearchResultExhibitions')->name('SearchResultExhibitions');
  Route::get('/Exhibitions/{slug}','Website\\ExhibitionsController@ShowExhibition');
  Route::get('/Exhibition/{slug}','Website\\ExhibitionsController@ShowExhibitionCompaniesSpodors');
  Route::get('/Exhibition_statics/{slug}','Website\\ExhibitionsController@Exhibition_Statics');
  Route::get('/ExhibitorProfile/{exhibition_slug},{exhibitor_slug}','Website\\ExhibitionsController@ShowExhibitionMemberProfile')->middleware('auth');
  Route::get('/ExhibitorPreview/{exh_slug}/{exhibitor_slug}','Website\\ExhibitionsController@ExhibitorPreview')->middleware('auth');
  Route::get('/Exhibition/Member/Products/{exhibition_slug},{exhibitor_slug}','Website\\ExhibitionsController@ShowExhibitionMemberProducts');
  Route::get('/Exhibition/Member/Product/{pro_slug},{exh_slug},{exhibitor_slug}','Website\\ExhibitionsController@exhibitionProductDetails');
  Route::get('/Exhibition/join_exhibitor/{exh_slug},{flag}','Website\\ExhibitionsController@exhibitionJoinProfile')->middleware('auth');
  Route::get('/Exhibition/join_exhibitor_products/{exh_slug}','Website\\ExhibitionsController@ExhibitorProducts')->middleware('auth');
  Route::get('/Exhibition/VisitExhibition/{exh_slug}','Website\\ExhibitionsController@VisitExhibition');
  Route::get('/Exhibition/Exhibitor/{exh_slug},{exhibitor_slug}','Website\\ExhibitionsController@ExhibitorProfile');
  Route::get('/Exhibition/ExhibitorProductsServices/{exh_slug},{exhibitor_slug}','Website\\ExhibitionsController@ExhibitorProductsServices');
  Route::get('/Exhibition/ExhibitorProductDetails/{exh_slug},{exhibitor_slug},{pro_slug}','Website\\ExhibitionsController@ExhibitorProductDetails');

  Route::get('/Exhibitor/join_exhibitorProductsCreate/{exh_slug}','Website\\ExhibitionsController@CreateExhibitorProduct')->middleware('auth');
  Route::post('/Exhibitor/join_exhibitorProductsCreatePost/','Website\\ExhibitionsController@CreateExhibitorProductPost')->name('Authed_Exhibitor_Products_Create_Post');

  Route::match(['get', 'post'], '/Exhibitor/MemberProductGalleryPagePost_q', 'Website\\ExhibitionsController@ajaxImage')->name('ExhibitorProductGalleryPagePost_q')->middleware('auth');
  Route::post('/Exhibitor/ConfirmExhibitionSubscribe','Website\\ExhibitionsController@ConfirmExhibitionSubscribe')->middleware('auth')->name('ConfirmExhibitionSubscribe');
  Route::post('/Exhibitor/DeleteExhibitionProduct','Website\\ExhibitionsController@DeleteExhibitionProduct')->middleware('auth')->name('DeleteExhibitionProduct');
  Route::post('/Exhibitor/ExhibitorProductGallerydelete', 'Member\\ExhibitionsController@ExhibitorProductGallerydelete')->name('ExhibitorProductGallerydelete')->middleware('auth');


  Route::post('/Exhibition/join_exhibitorPost', 'Website\\ExhibitionsController@exhibitionJoinProfilePost')->middleware('auth');
  Route::get('/Exhibition/join_sponsor/{exh_slug}','Website\\ExhibitionsController@exhibitionJoinSponsor')->middleware('auth');
  Route::get('/Exhibition/joinAddPro/AddPro/{exh_slug}','Website\\ExhibitionsController@exhibitionJoinAddProducts')->name('ExhibitionJoinAddPro')->middleware('auth');
  Route::post('/Exhibition/ExhibitionConfirmMemberJoin','Website\\ExhibitionsController@ExhibitionConfirmMemberJoin')->name('ExhibitionConfirmMemberJoin')->middleware('auth');
  Route::get('/Exhibition/ExhibitionPreview/{exhibition_slug},{exhibitor_slug}','Website\\ExhibitionsController@ExhibitionPreview')->name('ExhibitionPreview')->middleware('auth');

  // public payment reponse
  Route::get('/Payment/MemberKnetWayResponse','Member\\MemberWalletController@MemberKnetWayResponse')->name('MemberKnetWayResponse');
  Route::get('/Payment/MemberKnetWayResult','Member\\MemberWalletController@MemberKnetWayResult')->name('MemberKnetWayResult');
  // companies sponsors in exhibition
  //Route::get('/Exhibition/exh/{slug}','Website\\ExhibitionsController@ShowExhibitionDetails');

  //Authed
  // Auth Setting Website Members Profiles Section 


  // mastercard routes
  Route::get('master_card','Website\\NbkMastercardController@MastercardIndexPage');

  Route::group(
  [
    'prefix' => 'apis'
  ],function()
  {
    route::get('register/{email}/{pass}', function($email, $pass){
      // return dd($email, $pass);
      return response()->json(['status' => 'success','message'=>'Success with message','email'=>$email,'password'=>$pass, 200]);
    });

    route::post('registerPost', function(Request $request){
      return response()->json(['status' => 'success','message'=>'Success with message','email'=>$request->email,'password'=>$request->pass, 200]);
    });
  });


Route::group(
[
  'prefix' => 'Account',
  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'verified','auth']
],function()
{

    // Setting Member Profile
    Route::get('/Member_Profile','Member\\MemberProfileController@MemberProfile')->name('Authed_Member_Profile');
    // change password
    Route::post('/Member_ChangePassword','Member\\MemberProfileController@MemberChangePasswordPost')->name('Authed_MemberChangePasswordPost');
    //dashboard
    Route::get('/Member_Dashboard','Member\\MemberProfileController@MemberDashboard')->name('Authed_Member_Dashboard');
    // Route::post('/Member_Profile_details','Member\\MemberProfileController@MemberProfileDetailsPost')->name('Authed_Member_Profile_details_post');
    Route::post('/Member_Profile_post','Member\\MemberProfileController@MemberProfileUpdate')->name('Authed_Member_Profile_post');
    // list sub category of main category ajax
    Route::get('/ListSubCategory/{category_id}','Member\\MemberProfileController@ListSubCategory');
    // Setting Company Profile
    Route::get('/Company_Profile', function () {
      return 'Setting of Company Profile';
    });
    // Authed_Member_Wallet
    Route::get('/Member_Wallet','Member\\MemberWalletController@MemberWallet')->name('Authed_Member_Wallet');
    Route::get('/Member_Wallet_charge','Member\\MemberWalletController@MemberChargeWallet')->name('Authed_Member_Wallet_charge');
    // payment ways
    Route::get('/MemberKnetWay','Member\\MemberWalletController@MemberKnetWay')->name('MemberKnetWay');
    Route::post('/MemberKnetWayDetails','Member\\MemberWalletController@MemberKnetWayDetails')->name('MemberKnetWayDetails');
    Route::post('/MemberKnetWaySendRequest','Member\\MemberWalletController@MemberKnetWaySendRequest')->name('MemberKnetWaySendRequest');
    // Route::get('/MemberKnetWayResponse','Member\\MemberWalletController@MemberKnetWayResponse')->name('MemberKnetWayResponse');
    // Route::get('/MemberKnetWayResult','Member\\MemberWalletController@MemberKnetWayResult')->name('MemberKnetWayResult');
    // Route::post('/MemberKnetWayPost','Member\\MemberWalletController@MemberKnetWayPost')->name('MemberKnetWayPost');
    // Route::post('/MemberKnetWaySendPost','Member\\MemberWalletController@MemberKnetWaySendPost')->name('MemberKnetWaySendPost');
    // Route::get('/knet/PHP/result.php',function(){
    //   return view('pages.member.payments.result');
    // });
    // Members Messages
    Route::get('/MemberMessages','Member\\MembersMessagesController@ListMemberMessages')->name('AuthedMemberMessages');
    Route::post('/MemberMessageDetails','Member\\MembersMessagesController@MemberMessageDetails')->name('MemberMessageDetails');
    Route::post('/MemberMessageDelete','Member\\MembersMessagesController@MemberMessageDelete')->name('MemberMessageDelete');

    Route::get('/MemberExhibitions','Member\\MemberExhibitionsController@ListMyExhibition')->name('ListMyExhibition');
    Route::get('/MemberExhibitionDetails/{exh_slug}','Member\\MemberExhibitionsController@MemberExhibitionDetails');
    Route::get('/MemberExhibitorDetails/{exh_slug}','Member\\MemberExhibitionsController@MemberExhibitorDetails');
    Route::get('/MemberExhibitorDetailsUpdate/{exh_slug}','Member\\MemberExhibitionsController@MemberExhibitorDetailsGet')->name('MemberExhibitorDetails');
    Route::post('/MemberExhibitorDetailsUpdate','Member\\MemberExhibitionsController@MemberExhibitorDetailsUpdate')->name('MemberExhibitorDetailsUpdate');
    
    Route::get('/Member_Products','Member\\MemberProductsController@MemberProducts')->name('Authed_Member_Products');
    Route::get('/Member_Product_Create','Member\\MemberProductsController@CreateProduct')->name('Authed_Member_Products_Create');
    Route::get('/Member_Product_Translations','Member\\MemberProductTranslations@ProductTranslations')->name('Authed_Member_Product_Translations');
    Route::get('/Member_Product_Galleries','Member\\MemberProductGalleries@ProductGalleries')->name('Authed_Member_Product_Galleries');
    Route::post('/Member_Product_Create_Post','Member\\MemberProductsController@CreateProductPost')->name('Authed_Member_Products_Create_Post');
    Route::get('/MemberProductView/{id}','Member\\MemberProductsController@getProductView');
    Route::post('/ProductSpecificationActive','Member\\MemberProductsController@ProductSpecificationActive')->name('ProductSpecificationActive');
    Route::post('/Member_Product_Delete','Member\\MemberProductsController@DeleteProduct')->name('Member_Product_Delete');
    Route::post('/Member_Exhibition_Product_Delete','Member\\MemberProductsController@DeleteExhibitionProduct')->name('Member_Exhibition_Product_Delete');
    Route::get('/Member_Product_Edit/{pro_id}','Member\\MemberProductsController@EditProduct')->name('Member_Product_Edit');
    Route::post('/Member_Product_Update_Post','Member\\MemberProductsController@UpdateProduct')->name('Authed_Member_Products_Update_Post');


    
    Route::post('/MemberProductSpecPost','Member\\MemberProductsSpecificationsController@CreateProductSpecification')->name('MemberProductSpecPost');
    Route::post('/ProductSpecificationUpdate','Member\\MemberProductsSpecificationsController@ProductSpecificationUpdate')->name('ProductSpecificationUpdate');
    Route::post('/ProductSpecificationDelete','Member\\MemberProductsSpecificationsController@ProductSpecificationDelete')->name('ProductSpecificationDelete');
    
    Route::post('/MemberProductGallery','Member\\MemberProductsGalleriesController@ProductGalleryPage')->name('ProductGalleryPage');
    Route::post('/MemberProductGalleryPagePost','Member\\MemberProductsGalleriesController@ProductGalleryPagePost')->name('ProductGalleryPagePost');
    Route::post('/MemberProductGalleryPost','Member\\MemberProductsGalleriesController@CreateProductGallery')->name('MemberProductGalleryPost');

    Route::get('/MemberExhibitionsList','Member\\MemberExhibitionsController@memberExhibitions')->name('MemberExhibitionsList')->middleware('auth');
    //Route::get('/MemberExhibitionView/{id}','Member\\MemberExhibitionsController@')->middleware('auth');
    Route::get('/MemberExhibitionSubscribe/{sulg}','Member\\MemberExhibitionsController@MemberExhibitionSubscribe')->name('MemberExhibitionSubscribe');
    Route::post('/MemberExhibitionSubscribeConfirm','Member\\MemberExhibitionsController@MemberExhibitionSubscribeConfirm')->middleware('auth');
    Route::match(['get', 'post'], 'MemberProductGalleryPagePost_q', 'Member\\MemberProductsGalleriesController@ajaxImage')->name('MemberProductGalleryPagePost_q')->middleware('auth');
    Route::post('MemberProductGallerydelete', 'Member\\MemberProductsGalleriesController@ajaxImageDelete')->name('ajaxImageDelete')->middleware('auth');
    // Route::delete('MemberProductGalleryPagePost/{filename}', 'Member\\MemberProductsGalleriesController@deleteImage');
    Route::get('ProImageDeleteGet/{member_id}-{pro_id}-{pro_image}','Member\\MemberProductsGalleriesController@DeleteProImage')->middleware('auth');

    

  });


Route::group(
[
  'prefix' => 'Admin' ,
  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','admin']


],
function()
{


  Route::get('Dashboard', ['as'=>'Dashboard','uses'=>'Admin\\AdminController@dashboard']);


  Route::get('/analytics', 'Admin\\StaticsController@index')->name('Authed_Admin_analytics');

   //list all Categories
  // Dashboard
  Route::get('/analytics', 'Admin\\StaticsController@index')->name('Authed_Admin_analytics');
  /******************************************************** Start Exhibitions *********************************************************************************/
  // Exhibitions
   Route::get('/Exhibition_analytics', 'Admin\\ExhibitionsController@get_exhibition_analytics')->name('Exhibition_analytics'); // show analytics
  


  Route::post('/Exhibition_active', 'Admin\\ExhibitionsController@Exhibition_active')->name('Exhibition_active'); // change active status exhibition
 
  // Exhibition Trans
  Route::post('/Exhibition_view_translations', 'Admin\\ExhibitionTransController@Exhibition_view_translations')->name('Exhibition_view_translations'); // view exhibition
  Route::any('/Exhibition_list_translation', 'Admin\\ExhibitionTransController@Exhibition_list_translation')->name('Exhibition_list_translation');// get page
  Route::post('/Exhibition_trans_active', 'Admin\\ExhibitionTransController@Exhibition_trans_active')->name('Exhibition_trans_active'); // change active status exhibition
  Route::get('/Exhibition_get_add_translation', 'Admin\\ExhibitionTransController@Exhibition_get_add_translation')->name('Exhibition_get_add_translation');// get add page
  Route::post('/Exhibition_add_translation', 'Admin\\ExhibitionTransController@Exhibition_add_translation')->name('Exhibition_add_translation');// get add page
  Route::post('/Exhibition_store_translation', 'Admin\\ExhibitionTransController@Exhibition_store_translation')->name('Exhibition_store_translation');// get store page
  // Exhibition companies
  Route::get('/Exhibition_companies', 'Admin\\ExhibitionCompainesSubscribersController@list_companies')->name('Exhibition_companies'); // show companies
  // Exhibition Settings
  Route::post('/Exhibition_setting_update', 'Admin\\ExhibitionsController@Exhibition_setting_update')->name('Exhibition_setting_update'); // update setting
  //Exhibition Categories
  Route::any('/Exhibition_categories','Admin\\ExhibitionCategoriesController@listCategories')->name('Exhibition_categories');
/////////////ExhibitionNew Hadeel
Route::get('/Exhibition_show', 'Admin\\ExhibitionsController@Exhibition_show')->name('Exhibition_show'); //list all exhibitions
Route::post('/Exhibition_add', 'Admin\\ExhibitionsController@Exhibition_add')->name('Exhibition_add'); //  add page exhibition
 Route::post('/Exhibition_delete', 'Admin\\ExhibitionsController@Exhibition_delete')->name('Exhibition_delete'); // Delete Main Exhibition
  Route::post('/Exhibition_edit', 'Admin\\ExhibitionsController@Exhibition_edit')->name('Exhibition_edit'); // Edit exhibition
  Route::any('/Exhibition_update', 'Admin\\ExhibitionsController@Exhibition_update')->name('Exhibition_update'); // Update exhibition
 Route::post('/Exhibition_view', 'Admin\\ExhibitionsController@Exhibition_view')->name('Exhibition_view'); // view exhibition
 Route::any('/Exhibition_trans/{id}', 'Admin\\ExhibitionsController@Exhibition_trans')->name('Exhibition_trans'); // view exhibition
 Route::post('/Exhibition_updatetrnsaltion', 'Admin\\ExhibitionsController@Exhibition_updatetrnsaltion')->name('Exhibition_updatetrnsaltion');

  Route::get('/Exhibition_addpaage', 'Admin\\ExhibitionsController@Exhibition_addpaage')->name('Exhibition_addpaage');

 Route::any('/Exhibition_editfirstform', 'Admin\\ExhibitionsController@Exhibition_editfirstform')->name('Exhibition_editfirstform');

 Route::any('/Exhibition_editseconendform', 'Admin\\ExhibitionsController@Exhibition_editseconendform')->name('Exhibition_editseconendform');


/******************************************************** End Exhibitions *********************************************************************************/


// Countries
Route::get('/Countries_list', 'Admin\\CountriesController@Countries_list')->name('Countries_list'); //list all Countries

Route::post('/Country_delete', 'Admin\\CountriesController@Country_delete')->name('Country_delete'); // Delete Main Countries

Route::post('/Country_active', 'Admin\\CountriesController@Country_active')->name('Country_active'); // change active status country

Route::post('/Country_edit', 'Admin\\CountriesController@Country_edit')->name('Country_edit'); // Edit Country

Route::post('/Country_add', 'Admin\\CountriesController@Country_add')->name('Country_add'); // Edit Country


/******************************************************** End Countries *********************************************************************************/


// Categories
Route::get('/Categories_show', 'Admin\\CategoriesController@Categories_show')->name('Categories_show'); //redirect to  category page

Route::post('/Category_delete', 'Admin\\CategoriesController@Category_delete')->name('Category_delete'); // Delete Main Category
Route::post('/Category_active', 'Admin\\CategoriesController@Category_active')->name('Category_active'); // Delete Main Category
 Route::post('/Category_add', 'Admin\\CategoriesController@Category_add')->name('Category_add'); // Add Main Category
Route::post('/Category_edit', 'Admin\\CategoriesController@Category_edit')->name('Category_edit'); // Edit Main Category

/******************************************************** End Category *********************************************************************************/

// users
Route::get('/Users_list', 'Admin\\UsersController@Users_list')->name('Users_list'); //list all Users
Route::post('/User_add', 'Admin\\UsersController@User_add')->name('User_add'); // Add Main User
Route::post('/User_active', 'Admin\\UsersController@User_active')->name('User_active'); // Active Main User
Route::post('/User_delete', 'Admin\\UsersController@User_delete')->name('User_delete'); // Delete Main User
Route::post('/User_edit', 'Admin\\UsersController@User_edit')->name('User_edit'); // Delete Main User

/******************************************************** End users*********************************************************************************/


// Messages Hadeel
Route::get('/Messages_show', 'Admin\\MessagesController@Messages_show')->name('Messages_show'); //redirect to  Messages page Hadeel

Route::post('/Message_delete', 'Admin\\MessagesController@Message_delete')->name('Message_delete'); // Delete Main Hadeel


Route::post('/Message_view', 'Admin\\MessagesController@Message_view')->name('Message_view'); // Delete Main Messages

// Send Notification Hadeel

Route::get('/Notification_show', 'Admin\\NotificationController@Notification_show')->name('Notification_show'); // Show Notification

Route::post('/Notification_send', 'Admin\\NotificationController@Notification_send')->name('Notification_send'); 

//  Features Hadeel

Route::get('/Features_list', 'Admin\\FeatureWebsiteController@Features_list')->name('Features_list'); // Show Features


Route::post('/Feature_delete', 'Admin\\FeatureWebsiteController@Feature_delete')->name('Feature_delete'); // Delete Features


Route::post('/Feature_edit', 'Admin\\FeatureWebsiteController@Feature_edit')->name('Feature_edit'); // Show Edit
 
 //  Tips Hadeel
Route::get('/Tips_list', 'Admin\\TipWebsiteController@Tips_list')->name('Tips_list'); // Show Features
Route::get('/Tips_addpaage', 'Admin\\TipWebsiteController@Tips_addpaage')->name('Tips_addpaage');
Route::post('/Tips_add', 'Admin\\TipWebsiteController@Tips_add')->name('Tips_add'); // Show Features
Route::any('/Tips_trans/{id}', 'Admin\\TipWebsiteController@Tips_trans')->name('Tips_trans'); 
Route::any('/Tips_addtrnsaltion', 'Admin\\TipWebsiteController@Tips_addtrnsaltion')->name('Tips_addtrnsaltion'); 
Route::any('/Tip_delete', 'Admin\\TipWebsiteController@Tip_delete')->name('Tip_delete'); 
Route::post('/Tip_edit', 'Admin\\TipWebsiteController@Tip_edit')->name('Tip_edit'); 
Route::any('/Tip_editfirstform', 'Admin\\TipWebsiteController@Tip_editfirstform')->name('Tip_editfirstform');
Route::any('/Tip_editseconendform', 'Admin\\TipWebsiteController@Tip_editseconendform')->name('Tip_editseconendform');
 //  Faqs Hadeel
Route::get('/Faqs_list', 'Admin\\FaqWebsiteController@Faqs_list')->name('Faqs_list'); // Show Features

Route::post('/Faq_edit', 'Admin\\FaqWebsiteController@Faq_edit')->name('Faq_edit'); // Show Features

Route::post('/Faq_update', 'Admin\\FaqWebsiteController@Faq_update')->name('Faq_update'); // Show Features

Route::post('/Faq_delete', 'Admin\\FaqWebsiteController@Faq_delete')->name('Faq_delete'); // Show Features
Route::post('/QuestionFaq_add', 'Admin\\FaqWebsiteController@QuestionFaq_add')->name('QuestionFaq_add'); // Show Features
Route::post('/QuestionFaq_store', 'Admin\\FaqWebsiteController@QuestionFaq_store')->name('QuestionFaq_store'); // Show Features
Route::post('/QuestionFaq_edit', 'Admin\\FaqWebsiteController@QuestionFaq_edit')->name('QuestionFaq_edit'); // Show Features
Route::post('/QuestionFaq_update', 'Admin\\FaqWebsiteController@QuestionFaq_update')->name('QuestionFaq_update');


//////////////Header

Route::get('/Header_list', 'Admin\\HeaderController@Header_list')->name('Header_list'); // Show Features


});



});






/******************************************************************* Website verified *********************************************************************/
// Route::group(
// [
//   'prefix' => LaravelLocalization::setLocale(),
//   'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'verified']
// ],function()
// {
/************************************************************** groups **************************************************************************/
  
/************************************************************ End groups **********************************************************************/
// });
/******************************************************************* End Website verified *********************************************************************/


/********************************************Admin section Authred******************************************************/
// Admin Section 


Route::group(['middleware' => ['web']], function () {
  
    Route::get('admin/login', 'Admin\\AdminLoginController@getAdminLogin');
    Route::post('admin/login', ['as'=>'admin.auth','uses'=>'Admin\\AdminLoginController@adminAuth']);
    Route::post('/admin_logout', ['as'=>'admin_logout','uses'=>'Admin\\AdminLoginController@logout']);
 Route::post('/front_logout', ['as'=>'front_logout','uses'=>'Member\\AdminlogoutController@front_logout']);

  });

 


/////ajax Hadeel
//ajax to list all Categries in datatable
Route::post('Categories_all', 'Admin\\CategoriesController@Categories_all')->name('Categories_all');

//ajax to list all Exhibition in datatable

Route::post('Exhibition_list', 'Admin\\ExhibitionsController@Exhibition_list')->name('Exhibition_list');

//ajax to list all Messages in datatable

Route::post('Messages_all', 'Admin\\MessagesController@Messages_all')->name('Messages_all');

Route::post('Members_list', 'Admin\\UsersController@Members_list')->name('Members_list');



//test



    Route::any('/get/comment/{id}', 'Website\\CommentController@index');
    Route::any('/store/comment', 'Website\\CommentController@store');

    //sociallogin

Route::get ( '/redirect/{service}', 'Website\\SocialAuthController@redirect' );
Route::get ( '/callback/{service}', 'Website\\SocialAuthController@callback' );

Route::post ('checkEmailUser', 'Website\\AjaxController@checkEmailUser' )->name('checkEmailUser');

Route::post ('CheckSecondEMail', 'Website\\AjaxController@CheckSecondEMail')->name('CheckSecondEMail');

Route::post ('getjobtitle', 'Website\\AjaxController@getjobtitle' )->name('getjobtitle');


Route::post('/registermodal', 'Website\\RegistrationController@store')->name('registermodal');
                    

Route::post('/registermodal', 'Website\\RegistrationController@store')->name('registermodal');
Route::post('/loginformodal', 'Website\\LoginController@authenticate')->name('loginformodal');
/////reirect to profile setting
Route::group(
[
  'prefix' => LaravelLocalization::setLocale(),
  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
],function()
{





Route::post('/Registration_personal', 'Website\\RegistrationTypeController@Registration_personal')->name('Registration_personal');
                    });