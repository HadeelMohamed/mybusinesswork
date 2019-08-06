<?php
namespace App\Helpers;

use DB;
use LaravelLocalization;

class Helper
{

	public static function getClientIps()
	{
    $clientIps = array();
    $ip = $this->server->get('REMOTE_ADDR');
    if (!$this->isFromTrustedProxy()) {
      return array($ip);
    }
    if (self::$trustedHeaders[self::HEADER_FORWARDED] && $this->headers->has(self::$trustedHeaders[self::HEADER_FORWARDED])) {
      $forwardedHeader = $this->headers->get(self::$trustedHeaders[self::HEADER_FORWARDED]);
      preg_match_all('{(for)=("?\[?)([a-z0-9\.:_\-/]*)}', $forwardedHeader, $matches);
      $clientIps = $matches[3];
    } elseif (self::$trustedHeaders[self::HEADER_CLIENT_IP] && $this->headers->has(self::$trustedHeaders[self::HEADER_CLIENT_IP])) {
        $clientIps = array_map('trim', explode(',', $this->headers->get(self::$trustedHeaders[self::HEADER_CLIENT_IP])));
    }
    $clientIps[] = $ip; // Complete the IP chain with the IP the request actually came from
    $ip = $clientIps[0]; // Fallback to this when the client IP falls into the range of trusted proxies
    foreach ($clientIps as $key => $clientIp) {
        // Remove port (unfortunately, it does happen)
        if (preg_match('{((?:\d+\.){3}\d+)\:\d+}', $clientIp, $match)) {
          $clientIps[$key] = $clientIp = $match[1];
        }
        if (IpUtils::checkIp($clientIp, self::$trustedProxies)) {
          unset($clientIps[$key]);
        }
    }
    // Now the IP chain contains only untrusted proxies and the client IP
    return $clientIps ? array_reverse($clientIps) : array($ip);
	} 

	public static function OurSocialMediaLinks(){
		$our_social_links = DB::table('our_social_links')->where('active',1)->get();
		return $our_social_links;
	}

	public static function CurrLangDetails($id)
	{
		$currLangDetails = DB::table('languages')->where('lang',$id)->first();
		return $currLangDetails;
	}

	public static function CheckMemberExistDb($id)
	{
		$count = DB::table('member_details')->where('shown',1)->where('user_id',$id)->count();
		return $count;
	}

	public static function CheckWalletProfileDiscount($money,$col_name)
	{
		#get cost of choice
		$all_costs = DB::table('costs')->first();
		#check wallet
		if($money >= $all_costs->$col_name )
		{
			#valid to discount
			$result = true;
			return $result;
		}else{
			#Not Valid To Discount
			$result = false;
			return $result;
		}
	}

	public static function get_cost($col_name)
	{
		#get cost of choice
		$all_costs = DB::table('costs')->first();
		return $all_costs->$col_name;
	}

	public static function get_member_details($id,$lang_id){
		
		$member_details = DB::select('


																		SELECT users.email,
       users.wallet,
       users.shown,
       member_details.gender AS account_type_id,
       member_details.phone,
       member_details.category_id,
       member_details.country_id,
       member_lang.name AS member_name,
       member_lang.slug,
       member_lang.address,
       member_lang.about,
       member_lang.services,
       member_details.user_id,
       member_details.city_id,
       member_details.profile_pic,
       member_details.profile_cover,
       member_details.sub_category_id,
       member_details.rate,
       member_details.viewed,
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
       member_details.shown,
       countries.name AS country,
       gender_langs.name AS account_type,
       gender_langs.lang_id AS type_account_id
FROM ((((gender_langs gender_langs
         INNER JOIN genders genders
            ON (gender_langs.gener_id = genders.id))
        INNER JOIN member_details member_details
           ON (member_details.gender = genders.id))
       INNER JOIN users users
          ON (member_details.user_id = users.id))
      INNER JOIN member_lang member_lang
         ON (member_lang.member_id = member_details.user_id))
     INNER JOIN countries countries
        ON (member_details.country_id = countries.id)
WHERE     (users.shown = 1)
      AND (member_details.user_id = '.$id.')
      AND (member_details.shown = 1)
      AND (gender_langs.lang_id = '.$lang_id.')
																');
		return $member_details;
	}




  public static function get_exhibitor_details($exhibitor_id,$lang_id,$exh_id){
    
    // $exhibitor_details = DB::select('
    //                                   SELECT exhibitor_lang.name as exhibitor_name,
    //                                   exhibitor_lang.slug,
    //                                   exhibitor_lang.address,
    //                                   exhibitor_lang.about,
    //                                   exhibitor_lang.services,
    //                                   exhibitor_details.exh_id,
    //                                   exhibitor_details.user_id,
    //                                   exhibitor_details.rate,
    //                                   exhibitor_details.ceo as email,
    //                                   exhibitor_details.viewed,
    //                                   exhibitor_lang.lang_id,
    //                                   exhibitor_lang.exhibitor_id,
    //                                   exhibitor_lang.exh_id,
    //                                   exhibitor_details.gender,
    //                                   exhibitor_details.phone,
    //                                   exhibitor_details.sales,
    //                                   exhibitor_details.facebook,
    //                                   exhibitor_details.twitter,
    //                                   exhibitor_details.youtube,
    //                                   exhibitor_details.snapchat,
    //                                   exhibitor_details.instagram,
    //                                   exhibitor_details.marketing,
    //                                   exhibitor_details.category_id,
    //                                   exhibitor_details.profile_pic,
    //                                   exhibitor_details.profile_cover,
    //                                   countries.name as country,
    //                                   countries.id as country_id,
    //                                   exh_cat_trans.cat_name,
    //                                   exh_cat_trans.lang_id
    //                                   FROM (countries countries
    //                                   INNER JOIN exhibitor_details exhibitor_details
    //                                   ON (countries.id = exhibitor_details.country_id))
    //                                   INNER JOIN exhibitor_lang exhibitor_lang
    //                                   ON (exhibitor_lang.exh_id = exhibitor_details.exh_id)
    //                                   INNER JOIN exh_cat_trans exh_cat_trans
    //                                   ON (exh_cat_trans.exh_cat_id = exhibitor_details.category_id)
    //                                   WHERE     (exhibitor_lang.lang_id = 1)
    //                                   AND (exhibitor_lang.exhibitor_id = '.$exhibitor_id.')
    //                                   AND (exhibitor_lang.exh_id = '.$exh_id.')
    //                                   AND (exhibitor_details.user_id = '.$exhibitor_id.')
    //                                   AND(exhibitor_lang.lang_id = '.$lang_id.')
    //                                   AND(exh_cat_trans.lang_id = '.$lang_id.')
    //                               ');


    $exhibitor_details = DB::select('
                                      SELECT exhibitor_lang.name exhibitor_name,
                                      exhibitor_lang.slug,
                                      exhibitor_lang.exh_id,
                                      exhibitor_lang.exhibitor_id,
                                      exhibitor_details.category_id,
                                      exhibitor_lang.address,
                                      exhibitor_details.phone,
                                      exhibitor_lang.about,
                                      exhibitor_lang.services,
                                      exhibitor_details.country_id,
                                      exhibitor_details.profile_pic,
                                      exhibitor_details.profile_cover,
                                      exhibitor_details.rate,
                                      exhibitor_details.viewed,
                                      exhibitor_details.online,
                                      exhibitor_details.ceo,
                                      exhibitor_details.marketing,
                                      exhibitor_details.sales,
                                      exhibitor_details.website,
                                      exhibitor_details.facebook,
                                      exhibitor_details.instagram,
                                      exhibitor_details.linkedin,
                                      exhibitor_details.twitter,
                                      exhibitor_details.youtube,
                                      exhibitor_details.snapchat,
                                      exhibitor_details.gender as account_type_id
                                      FROM exhibitor_lang exhibitor_lang
                                      INNER JOIN exhibitor_details exhibitor_details
                                      ON     (exhibitor_lang.exhibitor_id = exhibitor_details.user_id)
                                      AND (exhibitor_lang.exh_id = exhibitor_details.exh_id)

                                      WHERE     (exhibitor_lang.exh_id = '.$exh_id.')
                                      AND (exhibitor_lang.exhibitor_id = '.$exhibitor_id.')
                                  ');                              
    return $exhibitor_details;
  }



	




	

}