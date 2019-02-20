<?php
session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
require "../textmessage.php";

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



$username = $_SESSION['username'];



$sql = "select `id`,`name`,`phone` from `join` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
list($mid,$name,$phone) = mysqli_fetch_row($result);


 $data  = json_decode(file_get_contents("php://input"), TRUE);
		   
		   if($data){
		   	 	 $is_valid = $data['request_otp'];
		     	 $remark  = $data['remark'];
		    	 $otp = rand(100000,999999);
		    	 $datetime = date("Y-m-d H:i:s");

				 $sql = "INSERT INTO `user_otp`(`id`, `mid`, `otp`, `is_valid`, `otp_remark`, `generated_time`) VALUES (NULL,'$mid','$otp','1','$remark','$datetime')";

              	 $result = mysqli_query($s_dbid,$sql);
                  
                 if($result){
              			send_otp_message($name,$phone,$username,$otp);
              			$result = array('status' => "true" ,'message'=>"otp_generated" );
              	 }
              	 else
              	 {
              	 		$result = array('status' => "false" ,'message'=>"error" );
              	 }

		    }
		    else
		    {
		      $result = array('status' => "false" ,'message'=>"error");
		    }

		   echo json_encode($result);

?>