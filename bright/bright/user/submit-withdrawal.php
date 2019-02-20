<?php

session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$amount = $_POST['payout_amount'];

$jid= $_POST['mid'];



$tpassword_post= $_POST['transation_password'];

$wdate = Date("Y-m-d H:i:s");




   function symp_connect() {

      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;



         $s_dbid = mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass, $s_dbname);



   }



    function symp_disconnect() {

      global $s_dbid;



         mysqli_close($s_dbid);

         $s_dbid = FALSE;

   }

	

	

	symp_connect();





$joinsql  = "SELECT id,tpassword FROM `join` where `username`='".$_SESSION['username']."'";

	$jresult = mysqli_query($s_dbid,$joinsql);

	list($jid,$tpassword) = mysqli_fetch_row($jresult);



//if($tpassword_post!=$tpassword){

//	$msg = 'Transaction Password is incorrect';

//}

//else{

//////////// Check Balance Start //////////////

$sql = "select sum(amount) from `withdraw` where jid = '$jid'";

$result = mysqli_query($s_dbid,$sql);

list($wallet_wdr) = mysqli_fetch_row($result);

//echo $sql;





$sql = "select sum(comm) from `inv_transactions` where mid = '$jid'  ";

$result = mysqli_query($s_dbid,$sql);

list($wallet_wcr) = mysqli_fetch_row($result);	



//echo $sql;

$wallet_wbal = $wallet_wcr - $wallet_wdr;	



	

//////////// Check Bal End//////////////

if($wallet_wbal>=$amount){





		$pass_sql = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`) VALUES (NULL, '$jid', '$amount', 'Pending', '$wdate', NULL, 'NULL');"; 

		$pass_result = mysqli_query($s_dbid,$pass_sql);

		 

		//echo $pass_sql;

		$jsql = "select name,email from `join` where `id` = '$jid'"; 

		$jresult = mysqli_query($s_dbid,$jsql);   

		list($name,$email) = mysqli_fetch_row($jresult);   

		

		$_SESSION['withdrawl'] = "submited";  

		$matter="";

			

$a ="



<!doctype html>

<html>

<head>

<meta charset='UTF-8'>

<style type='text/css'>

body {

	background-color: #DBDBDB;

}

</style>

</head>



<body>



<table width='80%' border='0' align='center' cellpadding='0' cellspacing='0'>

  <tbody>

    <tr>

      <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>Eaglewelth</td>

    </tr>

    <tr>

      <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>

        <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>

        <tbody>

          <tr>

            <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>

              <br>

              A withdrawal request for ".$amount." has been successfully placed.

			  

			  </p>

              <p>If you have any questions, do not hesitate to contact our support staff, and they will get back to you within 24 hours.<br>

              </p>

              <p> </p>

              <p>Regards, <br>

              Eaglewelth<br>

              <br>

              </p></td>

          </tr>

        </tbody>

      </table></td>

    </tr>

    <tr>

      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2018 Eaglewelth. All rights reserved.</td>

    </tr>

  </tbody>

</table>

</body>

</html>







			";

			$matter .= $a;

			

			$to = $email;

			// To send HTML mail, the Content-type header must be set

			$headers  = 'MIME-Version: 1.0' . "\r\n";

			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			$headers .= 'From: Eaglewelth<info@Eaglewelth.org>' . "\r\n";			

			mail($to,"Withdrawl Confirmation",$matter,$headers);  

		   

		   

		   

		   

		   $msg = 'Withdrawal Request has been successfully placed.';

	//}

	//else{

	  // $msg = 'Withdrawal could not be processed, please try again after some time.';

	//}

}

else{

	$msg = "Insufficient account balance.";

}

//}

		header("Location: withdrawal.php?msg=$msg");





?>