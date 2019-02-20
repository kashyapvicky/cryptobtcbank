<?php

session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

$username = $_SESSION['username'];

if($username == ''){

    echo  ' <meta http-equiv="refresh" content="0;url=index.php">';

}



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

$sql = "select id from `join` where `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);


$no_of_pin  = $_POST['no_of_pin'];
$transfer_to = $_POST['transfer_to'];
$date = date('Y-m-d');


//checking that user is exist or not
$sql = "select id from `join` where `username` = '$transfer_to'";
$result = mysqli_query($s_dbid,$sql);
$user_exist = mysqli_num_rows($result);
   if($user_exist){
      //fetch sender pin
   	  $sql = "SELECT * FROM `activation_pin` WHERE `allocated_user` = '$username' AND `expairy` = '0' LIMIT $no_of_pin";
	  $result = mysqli_query($s_dbid,$sql);
	  while($row = mysqli_fetch_assoc($result)){
           //allocate user to pin 
	   	   $activation_pin_up = $row['activation_pin']; 
	  	   $sql1 = "UPDATE `activation_pin` SET `allocated_user`= '$transfer_to' WHERE `activation_pin` = '$activation_pin_up'";
	  	   $result123 = mysqli_query($s_dbid,$sql1);
	  	        //Generate Statement
	  	   		if($result123){
	  	   			$sqlins = "INSERT INTO `pin_wallet`(`id`, `activation_key_fk`, `transfer_date`, `user_id_credit`, `user_id_debit`, `remark`) VALUES (NULL,'$activation_pin_up','$date','$transfer_to','$username','transferd to $transfer_to by $username')";
	  	   			  $resultins = mysqli_query($s_dbid,$sqlins);
	  	   		}

       }
        header("Location: pinstatement.php");
   }
   else{
   	   $_SESSION['msg'] = "User doesn't Exist";
       header("Location: pinwallet.php");
   }





?>