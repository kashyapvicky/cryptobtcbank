<?php
// require "config.php";
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
	// database connection kuch bhi
	$conn = mysqli_connect('localhost','root','','bright');
	// if ($conn) {

	// 	echo"<script>alert('connected')</script>";
	// }
	// else
	// {
	// 	echo"<script>alert(' not connected')</script>";
	// }

$s_dbid = FALSE;

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


	$name= $_POST['name'];
	$u_name= $_POST['username'];
	
	$mobile= $_POST['mobile'];
	$email= $_POST['email'];
	$password= $_POST['password'];
	$sponsor= $_POST['sponsor'];

	$pos= $_POST['pos'];
	//echo $name; die;
	
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
	
	
	       $pin = "RDC"."$rn1$rn2$rn3$rn4$rn5$rn6$rn7";
	       //}
	       //Search for a match in existing list ($xp)
	       //while(preg_match("/$pin/", $xp));
	       //End loop
	return $pin;
	
	}
	
	
	
	$flag = TRUE;
	$msg="";
	//check for validations
			        
	        $sql  = "SELECT * FROM `join` WHERE `username` = '$sponsor'";
	
	        $result = mysqli_query($s_dbid,$sql);
	        $nrows=0;
	        $nrows = mysqli_num_rows($result);
	        //echo $nrows; die;	
	        if ((int)$nrows<=0){
	        	$msg= "The Sponsor (".$sponsor.") does not exist.<br>";
	        	$flag = FALSE;
	        }
	        
	        
            if (empty($sponsor)){
            	$msg= "The Sponsor (".$sponsor.") does not exist.<br>";
            	$flag = FALSE;
            }
            
            if (empty($sponsor)){
            	$msg= "The Sponsor (".$sponsor.") does not exist.<br>";
            	$flag = FALSE;
            }
            
            if (empty($password)){
            	$msg= "The Password is mandatory<br>";
            	$flag = FALSE;
            }
	        
	        if (empty($email)){
	        	$msg= "The email is mandatory<br>";
	        	$flag = FALSE;
	        }
	        
	        if (empty($name)){
	        	$msg= "The name is mandatory<br>";
	        	$flag = FALSE;
	        }	
	
	//echo $flag; die;

if($flag==TRUE){


		$sqlc  = "SELECT count(id) FROM `join` ";
		$resultc = mysqli_query($s_dbid,$sqlc);
		list($lastid) = mysqli_fetch_row($resultc);	
		$username = genuser();
		$username = $username.$lastid;
		
		$query = "INSERT INTO `join`( `name`,`username`,`mobile`, `email`, `password`, `sponsor`, `pos`) VALUES ('$name','$username','$mobile','$email', '$password','$sponsor', '$position')";

		echo $query; die;
		
		$result = mysqli_query($conn,$query);
		if($result)
		{
			//echo "registerd Successfull";die;
			echo"<script>alert('data updated')</script>";

			
			
		$to = $email.",info@rsds.co.in";
		//$to = "pawanitgroup@gmail.com,kamal.kochhar@gmail.com";
		$subject = "Your Membership Registration at RSDS";
		
		$message = "
		
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
		      <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>RSDS</td>
		    </tr>
		    <tr>
		      <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>
		        <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>
		        <tbody>
		          <tr>
		            <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>
		              <br>
		              Welcome to RSDS. We have recieved your membership request.<br><br>
		              		
		              You can login with your Username and Password. <br><br>
		              Login details are mentioned below : <br>
		              Username : ".$username."<br>
		              Password : ".$password."<br>
		              Sponsor : ".$sponsor."<br>
					  
					 
					  </p>
		              <p>If you have any questions, do not hesitate to contact our support staff, and they will get back to you within 24 hours.<br>
		              </p>
		              <p> </p>
		              <p>Regards, <br>
		              RSDS<br>
		              <br>
		              </p></td>
		          </tr>
		        </tbody>
		      </table></td>
		    </tr>
		    <tr>
		      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2018 RSDS. All rights reserved.</td>
		    </tr>
		  </tbody>
		</table>
		</body>
		</html>
		
		
		
					";
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <info@rsds.co.in>' . "\r\n";
		
		
		mail($to,$subject,$message,$headers);

		$msg = 'Registration Successfull. Your Username is '.$username.'. <br><br>We have sent a welcome mail to your registered email address. <br><br>In order to login you will need the username/password, which is provided in your welcome mail. ';
		echo "<META HTTP-EQUIV='refresh' content='0; URL=message.php?msg=".$msg."'>";
		
		}
		else
		{
			//echo"<script>alert('error')</script>";
			$msg= 'Invalid username/password. Please try again.';
		}

}
else{
	echo "<META HTTP-EQUIV='refresh' content='0; URL=../login.php?errmsg=".$msg."&user=".$username."'>";
}
?>

	

 