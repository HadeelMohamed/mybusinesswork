<?php
session_start();
$user_id =$_SESSION["user_id_session"];
$user_wallet =$_SESSION["user_wallet_session"];
$user_email =$_SESSION["user_email_session"];
$result = isset($_GET['result']) ? $_GET['result'] : '';
$trackid = isset($_GET['trackid']) ? $_GET['trackid'] : '';
$PaymentID = isset($_GET['paymentid']) ? $_GET['paymentid'] : '';
$ref = isset($_GET['ref']) ? $_GET['ref'] : '';
$tranid = isset($_GET['tranid']) ? $_GET['tranid'] : '';
$amount = isset($_GET['amt']) ? $_GET['amt'] : '';
$trx_error = isset($_GET['Error']) ? $_GET['Error'] : '';
$trx_errortext = isset($_GET['ErrorText']) ? $_GET['ErrorText'] : '';
$postdate = isset($_GET['postdate']) ? $_GET['postdate'] : '';
$auth = isset($_GET['auth']) ? $_GET['auth'] : '';
$udf1 = isset($_GET['udf1']) ? $_GET['udf1'] : '';
$udf2 = isset($_GET['udf2']) ? $_GET['udf2'] : '';
$udf3 = isset($_GET['udf3']) ? $_GET['udf3'] : '';
$udf4 = isset($_GET['udf4']) ? $_GET['udf4'] : '';
$udf5 = isset($_GET['udf5']) ? $_GET['udf5'] : '';


$servername = "localhost";
$database = "mybusiu2_mybusinesme";
$username = "mybusiu2_db_user";
$password = "123456789";
    
// Create connection
$conn = new mysqli($servername,$username, $password,$database, 3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$member_lang = "select * from member_lang where member_id = 25 limit 1";

$member_lang_values = $conn->query($member_lang);


// check duplicated
$sql = "SELECT id FROM knet_transactions where payment_id = $PaymentID and transaction_id = $tranid and user_id = $user_id and ref_no = $ref and track_id = $trackid";
$records = $conn->query($sql);
if ($records->num_rows > 0) {

}else{
$sqlKnet = "INSERT INTO knet_transactions (user_id,transaction_id,payment_id,result_code,Auth,track_id,ref_no,amount,udf1,udf2,udf3,udf4,udf5)
VALUES ($user_id,$tranid,$PaymentID,'$result',$auth,$trackid,$ref,$amount,'$udf1','$udf2','$udf3','$udf4','$udf5')";

if ($conn->query($sqlKnet) === TRUE) {
    $sqlWallet = "INSERT INTO wallet_transactions (member_id,transaction_id,cost,created_by)
            VALUES ($user_id,6,$amount,$user_id)";
            if ($conn->query($sqlWallet) === TRUE) {
                //update credit
                $updated_wallet_value = $user_wallet + $amount;
                $sqlUpdateCredit = "UPDATE users SET wallet=$updated_wallet_value WHERE id=$user_id";
                if ($member_lang_values->num_rows > 0) {
                    // output data of each row
                    while($row = $member_lang_values->fetch_assoc()) {
                        $name = $row["name"];
                    }
                } else {
                    echo "0 results";
                }
                $date = date('Y-m-d');
                if ($conn->query($sqlUpdateCredit) === TRUE) {
                    // send email
                    //$to = " . $user_email .";
                    $subject = "Charge Wallet";
                    if($result == 'CAPTURED'){
                       $message = '<html>
                                    

                                  <body >
                                  <table width="100%" cellspacing="1" cellpadding="1">
                                     <tr>
                                      <td align="center" >
                                    <table width="70%" border="0" > 
                                      <tr><td align=center class="heading">
                                      </td>
                                      </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr>
                                      <td align="center" class="msg">

                                        </td>
                                    </tr>
                                    <tr>
                                      <td align="center">
                                  <table width=70% border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" col="2">
                                    <tr>
                                      <td colspan="2" align="center" class="msg"><strong class="text">Transaction Details</strong></td>
                                    </tr>
                                    <?php if($trx_error != null || $trx_errortext != null) { ?>
                                    <tr>
                                      <td width=26% class="tdfixed">Error :</td>
                                      <td width=74% class="tdwhite"><?php echo "$trx_error - $trx_errortext"; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                      <td width=26% class="tdfixed">Payment ID :</td>
                                      <td width=74% class="tdwhite">'.$PaymentID.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Post Date :</td>
                                      <td class="tdwhite">'.$date.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Result Code :</td>
                                      <td class="tdwhite" style="color:green;">Success Transaction</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Transaction ID :</td>
                                      <td class="tdwhite">'.$tranid.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Auth :</td>
                                      <td class="tdwhite">'.$auth.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Track ID :</td>
                                      <td class="tdwhite">'.$trackid.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Ref No :</td>
                                      <td class="tdwhite">'.$ref.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">Amount :</td>
                                      <td class="tdwhite">'.$amount.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">UDF1 :</td>
                                      <td class="tdwhite">'.$udf1.' </td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">UDF2 :</td>
                                      <td class="tdwhite">'.$udf2.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">UDF3 :</td>
                                      <td class="tdwhite">'.$udf3.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">UDF4 :</td>
                                      <td class="tdwhite">'.$udf4.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">UDF5 :</td>
                                      <td class="tdwhite">'.$udf5.'</td>
                                    </tr>
                                    <tr>
                                      <td class="tdfixed">&nbsp; </td>
                                      <td class="tdwhite">

                                    </td>
                                    </tr>
                                  </table></td>
                                    </tr>
                                  </table>

                                  <center>
                                  </center>
                                  <center>
                                    <a href="https://mybusinessme.com/en/Account/Member_Wallet">View</a></center>
                                      </body>
                                  </html>
                                                      ';
                    }
                    
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From: <server@mybusinessme.com>' . "\r\n";
                    //$headers .= 'Cc: mohamed.f@mybusinessme.com' . "\r\n";
                    
                    mail($user_email,$subject,$message,$headers);
                    //echo "Credit Updated Successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                //echo "Done! successfully";
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
<html>
	<head>
		<title>Knet Merchant Demo</title>
		<meta http-equiv="pragma" content="no-cache">
</head>

<body >
<table width="100%" cellspacing="1" cellpadding="1">
   <tr>
    <td align="center" >
	<table width="70%" border="0" > 
		<tr><td align=center class="heading">
		</td>
		</tr>
	</table>
	</td>
  </tr>
  <tr>
    <td align="center" class="msg">
    </td>
  </tr>
  <tr>
    <td align="center">
<table width=70% border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" col="2">
  <tr>
    <td colspan="2" align="center" class="msg"><strong class="text">Transaction Details</strong></td>
  </tr>
  <?php if($trx_error != null || $trx_errortext != null) { ?>
  <tr>
    <td width=26% class="tdfixed">Error :</td>
    <td width=74% class="tdwhite"><?php echo "$trx_error - $trx_errortext"; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td width=26% class="tdfixed">Payment ID :</td>
    <td width=74% class="tdwhite"><?php echo $PaymentID; ?></td>
  </tr>
  <tr>
    <td class="tdfixed">Post Date :</td>
    <td class="tdwhite"><?php echo date('Y-m-d');?></td>
  </tr>
  <?php
    if($result == 'NOT CAPTURED'){
  ?>
    <tr>
      <td class="tdfixed">Result Code :</td>
      <td class="tdwhite style='color=red;'">Cancelled transaction</td>
    </tr>
  <?php
    }else{
  ?>
    <tr>
      <td class="tdfixed">Result Code :</td>
      <td class="tdwhite style='color=green;'">success transaction</td>
    </tr>
    <?php
  }
  ?>
  
  <tr>
    <td class="tdfixed">Transaction ID :</td>
    <td class="tdwhite"><?php echo $tranid;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Auth :</td>
    <td class="tdwhite"><?php echo $auth;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Track ID :</td>
    <td class="tdwhite"><?php echo $trackid;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Ref No :</td>
    <td class="tdwhite"><?php echo $ref;?></td>
  </tr>
  <tr>
    <td class="tdfixed">Amount :</td>
    <td class="tdwhite"><?php echo $amount;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF1 :</td>
    <td class="tdwhite"><?php echo $udf1;?> </td>
  </tr>
  <tr>
    <td class="tdfixed">UDF2 :</td>
    <td class="tdwhite"><?php echo $udf2;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF3 :</td>
    <td class="tdwhite"><?php echo $udf3;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF4 :</td>
    <td class="tdwhite"><?php echo $udf4;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF5 :</td>
    <td class="tdwhite"><?php echo $udf5;?></td>
  </tr>
  <tr>
    <td class="tdfixed">&nbsp; </td>
    <td class="tdwhite">

	</td>
  </tr>
</table></td>
  </tr>
</table>

<center>
</center>
<center>
  <a href="https://mybusinessme.com/en/Account/Member_Wallet">Back</a></center>
		</body>
</html>

