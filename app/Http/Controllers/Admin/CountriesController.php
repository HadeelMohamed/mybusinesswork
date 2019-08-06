<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class CountriesController extends Controller
{
      public function Countries_list(){

//list all country
     $all_countries = DB::table('countries')->orderBy('name', 'desc')->get();

  	return view('pages.admin.countries.index')
  				->with('all_countries',$all_countries);
  }


     public function Country_active(Request $request){

     	
      $get_country_activation = DB::table('countries')->where('id',$request->country_id)->select('active')->first();


      if($get_country_activation->active == 0){ // not active = deactive

        $change = DB::table('countries')->where('id',$request->country_id)->update(['active'=>1]);
       
        session::flash('active','Country Now Is Active!');
        return redirect()->route('Countries_list');

      }else{

        $change =DB::table('countries')->where('id',$request->country_id)->update(['active'=>0]);
       
        session::flash('deactive','Country Now Is Deactive!');
        return redirect()->route('Countries_list');

      }

    }

   public function Country_delete(Request $request){
    
        // delete selected  country 
        $Country_delete = DB::table('countries')->where('id',$request->country_id)->delete();
        session::flash('deleted_success');
        return redirect()->back();


      }
 public function Country_edit (Request $request)
 {

//check country  name unquie
$checkcountryname =  DB::table('countries')->where('name',$request->name)->count();

//check  code unique
 $checkcountrycode =  DB::table('countries')->where('code',$request->code)->count();

 if ( $checkcountryname >0 ||$checkcountrycode > 0)
 
 {

 	return  redirect()->back()
    ->with('msg','Thers is somthing wrong in city or code')->with('countryid',$request->countryid);



 }

 else


{
	//update country

 	 $countryupdate = DB::table('countries')->where('id',$request->countryid)
                                    ->update([

                                                    'name'=> $request->name,
                                                    'code'=> $request->code,
                                                    'active'=> $request->active,
                                                
                                                  ]);

                                    Session::flash('updated_success');
                                     return redirect()->back();
}





 }

  public function Country_add (Request $request)
 {



//check country  name unquie
$checkcountryname =  DB::table('countries')->where('name',$request->name)->count();

//check  code unique
 $checkcountrycode =  DB::table('countries')->where('code',$request->code)->count();

 if ( $checkcountryname >0 ||$checkcountrycode > 0)
 
 {
  return  redirect()->back()
    ->with('addmsg','Thers is somthing wrong in city or code')->withInput($request->all());



 }

 else


{
  //add country

  $countries = DB::table('countries')
                              ->insertGetId([
                                              'name'=>$request->name,
                                              'code'=>$request->code,
                                              'active'=>$request->active,
                                              
                                            ]);

                                    Session::flash('add_success');
                                     return redirect()->back();
}
 }


}
