<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;
use App\Helpers\Helper;
use Auth;
use App\Helpers\Knet;

function pkcs5_pad($text) {
    $blocksize = 16;
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
    }

     function byteArray2Hex($byteArray) {
  $chars = array_map("chr", $byteArray);
  $bin = join($chars);
  return bin2hex($bin);
}


function encryptAES($str,$key) {
$str = pkcs5_pad($str);
$encrypted = openssl_encrypt($str, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $key);
$encrypted = base64_decode($encrypted);
$encrypted=unpack('C*', ($encrypted));
  $encrypted=byteArray2Hex($encrypted);
  $encrypted = urlencode($encrypted);
  return $encrypted;
}

function decrypt($code,$key) { 
    $code =  hex2ByteArray(trim($code));
    $code=byteArray2String($code);
    $iv = $key; 
    $code = base64_encode($code);
    $decrypted = openssl_decrypt($code, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv);
    return pkcs5_unpad($decrypted);
  }

  function byteArray2String($byteArray) {
  $chars = array_map("chr", $byteArray);
  return join($chars);
}


 function pkcs5_unpad($text) {
    $pad = ord($text{strlen($text)-1});
    if ($pad > strlen($text)) {
        return false; 
    }
    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
        return false;
    }
    return substr($text, 0, -1 * $pad);
    }


class MemberWalletController extends Controller
{
	public function MemberWallet(){
		$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
  	$member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
  	$NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();

    // get history
    $wallet_data = DB::select('
                                SELECT transaction_trans.name AS trans_name,
                                wallet_transactions.cost,
                                wallet_transactions.member_id,
                                wallet_transactions.created_at,
                                transaction_trans.lang_id AS transaction_trans_lang_id
                                FROM ((wallet_transactions wallet_transactions
                                INNER JOIN transactions transactions
                                ON (wallet_transactions.transaction_id = transactions.id))
                                INNER JOIN member_details member_details
                                ON (wallet_transactions.member_id = member_details.user_id))
                                INNER JOIN transaction_trans transaction_trans
                                ON (transaction_trans.trans_id = transactions.id)
                                WHERE (wallet_transactions.member_id = '.Auth::user()->id.') 
                                AND (transaction_trans.lang_id = '.$curr_lang->id.')
                              ');
  	if(count($member_details) > 0){
      if(count($wallet_data) > 0){
        return view('pages.member.wallet')
      ->with('NewMessagesCount',$NewMessagesCount)
      ->with('member_details',$member_details[0])
      ->with('wallet_data',$wallet_data);
      }else{
        return view('pages.member.wallet')
      ->with('NewMessagesCount',$NewMessagesCount)
      ->with('member_details',$member_details[0]);
      }
  		
  	}else{
			return view('pages.member.wallet')
    	->with('NewMessagesCount',$NewMessagesCount);
  	}
  }



  public function MemberChargeWallet(){
   session_start();
    $_SESSION["user_id_session"] = Auth::user()->id;
    $_SESSION["user_wallet_session"] = Auth::user()->wallet;
    $_SESSION["user_email_session"] = Auth::user()->email;
    
    $curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    $member_details = Helper::get_member_details(Auth::user()->id, $curr_lang->id);
    $NewMessagesCount = DB::table('members_messages')->where('status',0)->where('receiver_id',Auth::user()->id)->count();
    if(count($member_details) > 0){
      return view('pages.member.charge_wallet')
      ->with('NewMessagesCount',$NewMessagesCount)
      ->with('member_details',$member_details[0]);
    }else{
      return view('pages.member.charge_wallet')
      ->with('NewMessagesCount',$NewMessagesCount);
    }
    
  }

  public function MemberKnetWay(){
    return view('pages.member.knet.index');
    // return view('pages.member.payments.KnetPage');
  }



  public function MemberKnetWaySendRequest(Request $request){
    /*
******************************************************************************************
Disclaimer:- Important Note in Sample Pages
- This is a sample demonstration page only ment for demonstration, this page 
should not be used in production
- Transaction data should only be accepted once from a browser at the point 
of input, and then kept in a way that does not allow others to modify it 
(example server session, database  etc.)
- Any transaction information displayed to a customer, such as amount, should 
be passed only as display information and the actual transactional data should 
be retrieved from the secure source last thing at the point of processing the transaction.
- Any information passed through the customer's browser can potentially be 
modified/edited/changed/deleted by the customer, or even by third parties to 
fraudulently alter the transaction data/information. Therefore, all transaction 
information should not be passed through the browser to Payment Gateway in a way
that could potentially be modified (example hidden form fields). 
******************************************************************************************
*/

/*  The "&" sign is mandatory to mention with in the end of passed value, in below section this 
to make the string  Merchant can use their own logic of creating the string with required 
inputs, below is just a basic method on how to create a request string and pass the values 
to Payment Gateway  */


/*Getting Transaction Amount from Initial HTML page.
Since this sample page for demonstration, values from HTML page are directly
taken from browser and used for transaction processing. Merchants SHOULD NOT
follow this practice in production environment. */
$price = $_POST['price'];
$qty = $_POST['qty'];
$TranAmount = $price * $qty;

/* Generating a unique track id for each transaction. Merchant must ensure that each transaction has a unique Track ID. */
$TranTrackid=mt_rand();

/* to pass Tranportal ID provided by the bank to merchant. Tranportal ID is sensitive information
of merchant from the bank, merchant MUST ensure that Tranportal ID is never passed to customer 
browser by any means. Merchant MUST ensure that Tranportal ID is stored in secure environment & 
securely at merchant end. Tranportal Id is referred as id. Tranportal ID for test and production will be 
different, please contact bank for test and production Tranportal ID*/
$TranportalId="109501";
$ReqTranportalId="id=".$TranportalId;

/* to pass Tranportal password provided by the bank to merchant. Tranportal password is sensitive 
information of merchant from the bank, merchant MUST ensure that Tranportal password is never passed 
to customer browser by any means. Merchant MUST ensure that Tranportal password is stored in secure 
environment & securely at merchant end. Tranportal password is referred as password. Tranportal 
password for test and production will be different, please contact bank for test and production
Tranportal password */
$ReqTranportalPassword="password=109501pg";

/* Transaction Amount that will be send to payment gateway by merchant for processing
NOTE - Merchant MUST ensure amount is sent from merchant back-end system like database
and not from customer browser. In below sample AMT is hard-coded, merchant to pass 
trasnaction amount here. */
$ReqAmount="amt=".$TranAmount;

/* To pass the merchant track id, in below sample merchant track id is hard-coded. Merchant
MUST pass his transaction ID (track ID) in this parameter. Track Id passed here should be 
from merchant backend system like database and not from customer browser*/
$ReqTrackId="trackid=".$TranTrackid;

/* Currency code of the transaction. By default INR i.e. 356 is configured. If merchant wishes 
to do multiple currency code transaction, merchant needs to check with bank team on the available 
currency code */
$ReqCurrency="currencycode=414";

/* Transaction language, THIS MUST BE ALWAYS USA OR AR. */
//$ReqLangid="langid=USA";
$ReqLangid="langid=AR";


/* Action Code of the transaction, this refers to type of transaction. Action Code 1 stands of 
Purchase transaction and action code 4 stands for Authorization (pre-auth). Merchant should 
confirm from Bank action code enabled for the merchant by the bank*/
$ReqAction="action=1";


/* Response URL where Payment gateway will send response once transaction processing is completed 
Merchant MUST esure that below points in Response URL
1- Response URL must start with http://
2- the Respons URL SHOULD NOT have any additional paramteres or query string  */
// $ResponseUrl="https://mybusinessme.com/Account/knet/GetHandlerResponse.php";
// $ResponseUrl="https://mybusinessme.com/en/Account/MemberKnetWayResponse";
$ResponseUrl="https://mybusinessme.com/en/Payment/MemberKnetWayResponse";
$ReqResponseUrl="responseURL=".$ResponseUrl;

/* Error URL where Payment gateway will send response in case any issues while processing the transaction 
Merchant MUST esure that below points in ErrorURL 
1- error url must start with http://
2- the error url SHOULD NOT have any additional paramteres or query string
// $ErrorUrl="https://yourwebsite.com/PHP/result.php";
*/ 

// $ErrorUrl="https://mybusinessme.com/en/Account/MemberKnetWayResult";
$ErrorUrl="https://mybusinessme.com/en/Payment/MemberKnetWayResult";
$ReqErrorUrl="errorURL=".$ErrorUrl;


/* User Defined Fileds as per Merchant or bank requirment. Merchant MUST ensure merchant 
merchant is not passing junk values OR CRLF in any of the UDF. In below sample UDF values 
are not utilized */
$ReqUdf1="udf1=Test1";
$ReqUdf2="udf2=Test2";
$ReqUdf3="udf3=Test3";
$ReqUdf4="udf4=Test4";
$ReqUdf5="udf5=Test5";


/*ME should now do the validations on the amount value set like - 
a) Transaction Amount should not be blank and should be only numeric
b) Language should always be USA
c) Action Code should not be blank
d) UDF values should not have junk values and CRLF (line terminating parameters)Like--> [ !#$%^&*()+[]\\\';,{}|\":<>?~` ]
*/


/* Now merchant sets all the inputs in one string for encrypt and then passing to the Payment Gateway URL */    
$param=$ReqTranportalId."&".$ReqTranportalPassword."&".$ReqAction."&".$ReqLangid."&".$ReqCurrency."&".$ReqAmount."&".$ReqResponseUrl."&".$ReqErrorUrl."&".$ReqTrackId."&".$ReqUdf1."&".$ReqUdf2."&".$ReqUdf3."&".$ReqUdf4."&".$ReqUdf5;

//==============================Encryption LOGIC CODE START===============================================================================
  /*Below are the fields/prametres which will use for Encryption using (AES (128 bit)) Encryption 
  Algorithm.*/
  
  
  /*Terminal Resource Key is generated while creating terminal, And this the Key that is used for encryting 
    the request/response from Merchant To PG and vice Versa*/
    
  $termResourceKey="9073765870499073"; 
  $param=encryptAES($param,$termResourceKey)."&tranportalId=".$TranportalId."&responseURL=".$ResponseUrl."&errorURL=".$ErrorUrl;

//==============================Encryption LOGIC CODE End=================================================================================

/* 
Log the complete request in the log file for future reference
Now creating a connection and sending request
Note - In PHP header function is used for redirecting request
*********UNCOMMENT THE BELOW REDIRECTION CODE TO CONNECT TO EITHER TEST OR PRODUCTION*********
*/
// return dd($TranTrackid, $param, "https://www.kpay.com.kw/kpg/PaymentHTTP.htm?param=paymentInit"."&trandata=".$param);
header("Location: https://kpaytest.com.kw/kpg/PaymentHTTP.htm?param=paymentInit"."&trandata=".$param);  //send request and redirect to TEST 
// header("Location: https://www.kpay.com.kw/kpg/PaymentHTTP.htm?param=paymentInit"."&trandata=".$param); /* send request and redirect to PRODUCTION */
exit();


    // return dd($request);
  }

  public function MemberKnetWayPost(Request $request){
 
    // ob_start();
    // $product  = $_POST['product'];
    // $price = $_POST['price'];
    // $qty = $_POST['qty'];
    // $total = $_POST['price'] * $_POST['qty'];

  }


  public function MemberKnetWayDetails(Request $request){
    return view('pages.member.knet.details');
  }


public function MemberKnetWayResponse(Request $request){
  $ResErrorText= $_REQUEST['ErrorText'];      //Error Text/message
  $ResPaymentId = $_REQUEST['paymentid'];   //Payment Id
  $ResTrackID = $_REQUEST['trackid'];         //Merchant Track ID
  $ResErrorNo = $_REQUEST['Error'];           //Error Number
  $ResResult =  $_REQUEST['result'];          //Transaction Result
  $ResPosdate = $_REQUEST['postdate'];        //Postdate
  $ResTranId = $_REQUEST['tranid'];           //Transaction ID
  $ResAuth = $_REQUEST['auth'];               //Auth Code   
  $ResAVR = $_REQUEST['avr'];                 //TRANSACTION avr         
  $ResRef = $_REQUEST['ref'];                 //Reference Number also called Seq Number
  $ResAmount = $_REQUEST['amt'];              //Transaction Amount
  $Resudf1 = $_REQUEST['udf1'];               //UDF1
  $Resudf2 = $_REQUEST['udf2'];               //UDF2
  $Resudf3 = $_REQUEST['udf3'];               //UDF3
  $Resudf4 = $_REQUEST['udf4'];               //UDF4
  $Resudf5 = $_REQUEST['udf5'];               //UDF5
  //Below Terminal resource Key is used to decrypt the response sent from Payment Gateway.
  $termResourceKey="9073765870499073";
  
  
/* Merchant (ME) checks, if error number is NOT present,then go for Encryption using required parameters */
/* NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE */ 
  if($ResErrorText==null && $ResErrorNo==null)
  {
  
  /*IMPORTANT NOTE - MERCHANT SHOULD UPDATE 
          TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
          AND THEN REDIRECT CUSTOMER ON RESULT PAGE*/
    $ResTranData= $_REQUEST['trandata'];
    if($ResTranData !=null)
    {
    //Decryption logice starts
    $decrytedData=decrypt($ResTranData,$termResourceKey);
    header("Location: https://mybusinessme.com/en/Payment/MemberKnetWayResult?".$decrytedData);
                exit();
    }
  }
  else{
        header("Location: https://mybusinessme.com/en/Payment/MemberKnetWayResult?"."Error=".$ResErrorNo."&ErrorText=".$ResErrorText."&trackid=".$ResTrackID."&amt=".$ResAmount."&paymentid="+$ResPaymentId);
                exit();
  }

}

public function MemberKnetWayResult(Request $request){
  /*Variable Declaration*/
  //=========================================================================================
  $ResErrorText= $_REQUEST['ErrorText'];      //Error Text/message
  $ResPaymentId = $_REQUEST['paymentid'];   //Payment Id
  $ResTrackID = $_REQUEST['trackid'];         //Merchant Track ID
  $ResErrorNo = $_REQUEST['Error'];           //Error Number
  $ResResult =  $_REQUEST['result'];          //Transaction Result
  $ResPosdate = $_REQUEST['postdate'];        //Postdate
  $ResTranId = $_REQUEST['tranid'];           //Transaction ID
  $ResAuth = $_REQUEST['auth'];               //Auth Code   
  $ResAVR = $_REQUEST['avr'];                 //TRANSACTION avr         
  $ResRef = $_REQUEST['ref'];                 //Reference Number also called Seq Number
  $ResAmount = $_REQUEST['amt'];              //Transaction Amount
  $Resudf1 = $_REQUEST['udf1'];               //UDF1
  $Resudf2 = $_REQUEST['udf2'];               //UDF2
  $Resudf3 = $_REQUEST['udf3'];               //UDF3
  $Resudf4 = $_REQUEST['udf4'];               //UDF4
  $Resudf5 = $_REQUEST['udf5'];               //UDF5

  $termResourceKey="9073765870499073";

  if($ResErrorText==null && $ResErrorNo==null)
  {
  
  /*IMPORTANT NOTE - MERCHANT SHOULD UPDATE 
          TRANACTION PAYMENT STATUS IN MERCHANT DATABASE AT THIS POSITION 
          AND THEN REDIRECT CUSTOMER ON RESULT PAGE*/
    $ResTranData= $_REQUEST['trandata'];
    if($ResTranData !=null)
    {
    //Decryption logice starts
    $decrytedData=decrypt($ResTranData,$termResourceKey);
    header("Location: https://mybusinessme.com/en/Payment/MemberKnetWayResult?".$decrytedData);
                exit();
    }
  }
  else{
        header("Location: https://mybusinessme.com/en/Payment/MemberKnetWayResult?"."Error=".$ResErrorNo."&ErrorText=".$ResErrorText."&trackid=".$ResTrackID."&amt=".$ResAmount."&paymentid="+$ResPaymentId);
                exit();
  }

  return view('pages.member.knet.result');

}
 

}
