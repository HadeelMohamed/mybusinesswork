<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class MemberRateController extends Controller
{
  public function RateMember(Request $request){

  	if ($request->isMethod('post'))
    {
    	//get member_id
    	$member_id = DB::table('member_lang')->where('slug',$request->member_slug)->select('member_id')->first();
    	// check exist 
    	$checkexist = DB::table('members_raters')->where('member_id',$member_id->member_id)->where('rater_id',Auth::user()->id)->count();
    	if($checkexist < 1){
    		// add rate
    		$rate = DB::table('members_raters')->insert(['member_id'=>$member_id->member_id,'rater_id'=>Auth::user()->id,'rate'=>$request->rate]);
    		
			// update member_rate_ member_details_tbl
			//calculateRate
			$countRaters = DB::table('members_raters')->where('member_id',$member_id->member_id)->count();
            $countAuthRater = DB::table('members_raters')->where('member_id',$member_id->member_id)->count();
			$sum = DB::table('members_raters')->where('member_id',$member_id->member_id)->sum('rate');
            $sum = intval($sum);
			$netRate = ($sum / $countRaters);
            $netRateInt = intval($netRate);
            // return dd($countRaters,$sum,$sum/$countRaters,$netRate);
			DB::table('member_details')->where('user_id',$member_id->member_id)->update(['rate'=>$netRateInt]);
			return response()->json(['status' => 'success','message'=>'Rated Success','count'=>$checkexist,'rate'=>$netRateInt, 200, [], JSON_UNESCAPED_UNICODE]);
    		
    		
    	}else{
    		// update rate
            $rate = DB::table('members_raters')->where('member_id',$member_id->member_id)->where('rater_id',Auth::user()->id)->update(['rate'=>$request->rate]);
            
            // update member_rate_ member_details_tbl
            //calculateRate
            $countRaters = DB::table('members_raters')->where('member_id',$member_id->member_id)->count();
            $countAuthRater = DB::table('members_raters')->where('member_id',$member_id->member_id)->count();
            $sum = DB::table('members_raters')->where('member_id',$member_id->member_id)->sum('rate');
            $sum = intval($sum);
            $netRate = ($sum / $countRaters);
            $netRateInt = intval($netRate);
            // return dd($countRaters,$sum,$sum/$countRaters,$netRate);
            DB::table('member_details')->where('user_id',$member_id->member_id)->update(['rate'=>$netRateInt]);
            return response()->json(['status' => 'success','message'=>'Rated Success','count'=>$checkexist,'rate'=>$netRateInt, 200, [], JSON_UNESCAPED_UNICODE]);
    		
    	}
    }

  }



    public function RateExhibitor(Request $request){

        if ($request->isMethod('post'))
        {
            //get member_id
            $exhibitor_id = DB::table('exhibitor_lang')->where('slug',$request->exhibitor_slug)->select('exhibitor_id')->first();
            // check exist 
            $checkexist = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->where('rater_id',Auth::user()->id)->count();
            if($checkexist < 1){
                // add rate
                $rate = DB::table('exhibitors_raters')->insert(['exhibitor_id'=>$exhibitor_id->exhibitor_id,'rater_id'=>Auth::user()->id,'rate'=>$request->rate]);
                
                // update member_rate_ member_details_tbl
                //calculateRate
                $countRaters = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->count();
                $countAuthRater = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->count();
                $sum = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->sum('rate');
                $sum = intval($sum);
                $netRate = ($sum / $countRaters);
                $netRateInt = intval($netRate);
                // return dd($countRaters,$sum,$sum/$countRaters,$netRate);
                DB::table('exhibitor_details')->where('user_id',$exhibitor_id->exhibitor_id)->update(['rate'=>$netRateInt]);
                return response()->json(['status' => 'success','message'=>'Rated Success','count'=>$checkexist,'rate'=>$netRateInt, 200, [], JSON_UNESCAPED_UNICODE]);
                
                
            }else{
                // update rate
                $rate = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->where('rater_id',Auth::user()->id)->update(['rate'=>$request->rate]);
                
                // update member_rate_ exhibitor_details_tbl
                //calculateRate
                $countRaters = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->count();
                $countAuthRater = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->count();
                $sum = DB::table('exhibitors_raters')->where('exhibitor_id',$exhibitor_id->exhibitor_id)->sum('rate');
                $sum = intval($sum);
                $netRate = ($sum / $countRaters);
                $netRateInt = intval($netRate);
                // return dd($countRaters,$sum,$sum/$countRaters,$netRate);
                DB::table('exhibitor_details')->where('user_id',$exhibitor_id->exhibitor_id)->update(['rate'=>$netRateInt]);
                return response()->json(['status' => 'success','message'=>'Rated Success','count'=>$checkexist,'rate'=>$netRateInt, 200, [], JSON_UNESCAPED_UNICODE]);
                
            }
        }

      }



}
