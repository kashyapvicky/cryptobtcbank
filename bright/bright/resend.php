<?php

@session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";


$s_dbid = FALSE;

$email = strtolower($_POST['email']);





   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);

         
   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }
	
    



	symp_connect();


$flag = TRUE;
$msg="";
//check for validations
		        
        
        
        
        
		
		
		$loginsql  = "SELECT * FROM `join` WHERE `email` = '$email'";
        $myresult = mysqli_query($s_dbid,$loginsql);
        $nrows=0;
		$nrows = mysqli_num_rows($myresult);


		if ((int)$nrows<=0){
			$msg.= "This email is not registered. Please try again with a valid email";
		    echo "<META HTTP-EQUIV='refresh' content='0; URL=message.php?msg=".$msg."'>"; 
		    //$flag = FALSE;
		}
		else{
		

					
			$sql  = "SELECT id,name,username,password,sponsor FROM `join` WHERE `email` = '$email'";
        	$result = mysqli_query($s_dbid,$sql);
			list($jid,$name,$username,$password,$sponsor) = mysqli_fetch_row($result);

			$jdate = date("Y-m-d");
			
			$sql = "select `code` from `vcode` where `mid` = '$jid'";
			$result = mysqli_query($s_dbid,$sql);
			list($vcode) = mysqli_fetch_row($result);
			
			
			
			
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
      <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>Eaglewealth</td>
    </tr>
    <tr>
      <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>
        <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
          <tr>
            <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>
              <br>
              Welcome to Eaglewealth. We have recieved your membership request.<br><br>
              		
              You can login with your Username and Password. Login details are mentioned below : <br>
              Username : ".$username."<br>
              Password : ".$password."<br>
              Sponsor : ".$sponsor."<br>
			  
			  Please click the following link to verify your Email.<br><br>
			  
			  <a href='http://www.eaglewealth.org/verify.php?id=".$vcode."'>Verify Your Email</a><br><br>
			  </p>
              <p>If you have any questions, do not hesitate to contact our support staff, and they will get back to you within 24 hours.<br>
              </p>
              <p> </p>
              <p>Regards, <br>
              Eaglewealth<br>
              <br>
              </p></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2018 Eaglewealth. All rights reserved.</td>
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
			$headers .= 'From: info@eaglewealth.org' . "\r\n";			
			mail($to,"Membership Activation",$matter,$headers);


$msg = 'Registration Successfull. Your Username is '.$username.'. <br><br>We have sent an activation link to your registered email address. In order to complete the sign-up process, please click the activation link in your email.<br><br>Please check your registered email for verification link. ';



			echo "<META HTTP-EQUIV='refresh' content='0; URL=message.php?msg=".$msg."'>"; 	
		
		
}
		
			

symp_disconnect();

?>