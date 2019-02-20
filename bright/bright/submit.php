<?php

@session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";



$s_dbid = FALSE;

$name = $_POST['name'];

$phone = $_POST['phone'];

$email = strtolower($_POST['email']);

$sponsor= strtolower($_POST['sponsor']);

$sponsor = preg_replace('/\s+/', '', $sponsor);

$username = strtolower($_POST['username']);

$username = preg_replace('/\s+/', '', $username);

$password = $_POST['password'];

$pos = $_POST['pos'];

$tpassword = rand(100000,999999);









   function symp_connect() {

      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;



         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);



         

   }



    function symp_disconnect() {

      global $s_dbid;



         mysqli_close($s_dbid);

         $s_dbid = FALSE;

   }

	

    function genuser()

{





       

       //Start Random number loop

       //do {

       //Create 6 digit random number

       $rn1 = rand(0, 9);

       $rn2 = rand(0, 9);

       $rn3 = rand(0, 9);

	   $rn4 = rand(0, 9);

	   $rn5 = rand(0, 9);

	   $rn6 = rand(0, 9);

       $rn7 = rand(1, 9);





       $pin = "BS"."$rn1$rn2$rn3$rn4$rn5$rn6$rn7";

       //}

       //Search for a match in existing list ($xp)

       //while(preg_match("/$pin/", $xp));

       //End loop

return $pin;



}



function gencode()

{



return rtrim(base64_encode(md5(microtime())),"=");



}



$downlineuser="";





function find_position($snode,$pos) 
{

      global $s_dbid,$downlineuser,$position;



        $sql  = "SELECT username FROM `join` WHERE `sponsor` = '$snode' and `position` = '$pos'";

        $result = mysqli_query($s_dbid,$sql);

		if(mysqli_num_rows($result)==0)

		{

			$downlineuser = $snode; // lowest level user



		}

		else

		{

			list($user) = mysqli_fetch_row($result);

			find_position($user,$pos);

		}

}



	symp_connect();





$flag = TRUE;

$msg="";

//check for validations

		        

        $sql  = "SELECT * FROM `join` WHERE `username` = '$sponsor'";



        $result = mysqli_query($s_dbid,$sql);

        $nrows=0;

        $nrows = mysqli_num_rows($result);		

        if ((int)$nrows<=0)
        {

        	$msg= "The Sponsor ".$sponsor." does not exist.<br>";

        	$flag = FALSE;

        }

        

         $sql  = "SELECT * FROM `join` WHERE `username` = '$username'";

        $result = mysqli_query($s_dbid,$sql);

        $nrows=0;

        $nrows = mysqli_num_rows($result);		

        if ((int)$nrows>0){

        	$msg= "The Username (".$username.") already exist.<br>";

        	$flag = FALSE;

        }

        

		

		

		$loginsql  = "SELECT * FROM `join` WHERE `email` = '$email'";

        $myresult = mysqli_query($s_dbid,$loginsql);

        $nrows=0;

		$nrows = mysqli_num_rows($myresult);





		if ((int)$nrows>0){

			//$msg.= "This email is already registered. Please try again by selecting a different email.<br>";

		    //echo "<META HTTP-EQUIV='refresh' content='0; URL=register.php?errmsg=".$msg."'>"; 

		    //$flag = FALSE;

		}

		

		



		if($flag==TRUE){

			





		$msg="";



			$sqlc  = "SELECT count(id) FROM `join` ";

	        $resultc = mysqli_query($s_dbid,$sqlc);

			list($lastid) = mysqli_fetch_row($resultc);	

			//$username = genuser();

			find_position($sponsor,$pos);

			

			$jdate = date("Y-m-d");	

			

			// dreferral m vo entry jayegi jo user from m sponser m bharge or sponser m vo entry jayegi jo sabse last m h uske jo usne as a sponser bhara h

			$sql = 'INSERT INTO `join` VALUES (NULL, \''.$name.'\', \''.$phone.'\', \''.$email.'\', \''.$downlineuser.'\', \''.$username.'\', \''.$password.'\', NULL, \''.$sponsor.'\',  \''.$pos.'\', \'pending\', \''.$jdate.'\', \''.$password.'\',   \''.$tpassword.'\');';

			$result = mysqli_query($s_dbid,$sql);

			

			//echo $sql;

			

			$sql  = "SELECT * FROM `join` WHERE `username` = '$username'";

        	$result = mysqli_query($s_dbid,$sql);

			list($jid) = mysqli_fetch_row($result);



			$jdate = date("Y-m-d");

			

			

			$vcode = gencode();

			

			$sql = "INSERT INTO `vcode` (`id`, `mid`, `code`,`vdate`,`status`) VALUES (NULL, '$jid', '$vcode','$jdate','Pending');";

			$result = mysqli_query($s_dbid,$sql);

			$matter="";

						

			$a ="

			Dear " .$name.",

			<br><br>

			Welcome to Eaglewealth. We have recieved your membership request.<br><br>

					

			Please click the following link to verify your Email.<br><br>


			We wish you good luck. Thanks once again for working with us.

			

						";

						$matter .= $a;

						

						$to = $email;

						// To send HTML mail, the Content-type header must be set

						$headers  = 'MIME-Version: 1.0' . "\r\n";

						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

						$headers .= 'From: info@brightright.co.in' . "\r\n";			

						//mail($to,"Verify your email at Eaglewealth",$matter,$headers);

			

			

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

              Txn Password : ".$tpassword."<br>


			  

			 

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

			$headers .= 'From: info@brightright.co.in' . "\r\n";			

			mail($to,"Membership Activation",$matter,$headers);

		

$_SESSION['username'] = $username;

$_SESSION['msg'] = $matter;





$msg = '<br><b>Registration Successfull !</b><br> Your Username is <b>'.$username.'</b>. We have sent a welcome mail to your registered email address. In order to login you will need the username/password, which is provided in your welcome mail. ';







			echo "<META HTTP-EQUIV='refresh' content='0; URL=message.php?msg=".$msg."'>"; 	

		}

		else{

			echo "<META HTTP-EQUIV='refresh' content='0; URL=signup.php?errmsg=".$msg."&user=".$username."'>";

		}



		

			



symp_disconnect();



?>