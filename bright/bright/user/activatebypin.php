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


$activate_to  = $_POST['userid'];
$date = date('Y-m-d');


//checking that user is exist or not
$sql = "SELECT id FROM `join` WHERE `username` = '$activate_to' AND `misc` = 'pending'";
$result = mysqli_query($s_dbid,$sql);
$user_exist = mysqli_num_rows($result);
   if($user_exist){
      //fetch activator pin
   	  $sql = "SELECT * FROM `activation_pin` WHERE `allocated_user` = '$username' AND `expairy` = '0' LIMIT 1";
	    $result = mysqli_query($s_dbid,$sql); 
      $validate_pin = mysqli_num_rows($result);
      if($validate_pin){
	    while($row = mysqli_fetch_assoc($result)){
           ///////activate user ////////

        //update join table
	   	   $activation_pin_up = $row['activation_pin']; 
	  	   $sql1 = "UPDATE `join` SET `misc`= 'active' WHERE `username` = '$activate_to'";
	  	   $result123 = mysqli_query($s_dbid,$sql1);

	  	        //update investment table
	  	   		if($result123){
              //get mid of activate_to user
             $sql01 = "select id from `join` where `username` = '$activate_to'";
             $result01 = mysqli_query($s_dbid,$sql01);
             list($mid) = mysqli_fetch_row($result01);

             //check that already in investment or not
             $sql02 = "SELECT * FROM  `investment` WHERE `mid` = '$mid'";
              $result02 = mysqli_query($s_dbid,$sql02);
              $num_inv  = mysqli_num_rows($result02);

               if($num_inv){

                 //delete if alreaady exist and insert new
                 $sql03 = "DELETE FROM `investment` WHERE `mid` = '$mid'";
                 $result03 = mysqli_query($s_dbid,$sql03);

                    if($result03){
                      $sql04 = "INSERT INTO `investment` (`id`, `plan`, `amount`, `mid`, `sdate`, `ppercentage`, `dailypay`, `status`, `hashcode`, `last_transaction`, `days`, `dlast_transaction`, `mlast_transaction`, `slip`) VALUES (NULL, '1', '1499', '$mid', '$date', '', '', 'active', NULL, NULL, '250', NULL, NULL, 'activated by pin');";
                        $result04 = mysqli_query($s_dbid,$sql04);

                            // Generate Pin Statement
                            if($result04){

                              $sql05 = "INSERT INTO `pin_wallet`(`id`, `activation_key_fk`, `transfer_date`, `user_id_credit`, `user_id_debit`, `remark`) VALUES (NULL,'$activation_pin_up','$date','$activate_to','$username','activated to $activate_to by $username')";
                                 $result05 = mysqli_query($s_dbid,$sql05);

                                  $sql06 = "UPDATE `activation_pin` SET `expairy`= '1' WHERE `activation_pin` = '$activation_pin_up'";
                                  $result06 = mysqli_query($s_dbid,$sql06);

                                 header("Location: pinstatement.php");

                            }
                     }


               }
               else{
                  
                  $sql04 = "INSERT INTO `investment` (`id`, `plan`, `amount`, `mid`, `sdate`, `ppercentage`, `dailypay`, `status`, `hashcode`, `last_transaction`, `days`, `dlast_transaction`, `mlast_transaction`, `slip`) VALUES (NULL, '1', '1499', '$mid', '$date', '', '', 'active', NULL, NULL, '250', NULL, NULL, 'activated by pin');";
                        $result04 = mysqli_query($s_dbid,$sql04);

                            // Generate Pin Statement
                            if($result04){

                              $sql05 = "INSERT INTO `pin_wallet`(`id`, `activation_key_fk`, `transfer_date`, `user_id_credit`, `user_id_debit`, `remark`) VALUES (NULL,'$activation_pin_up','$date','$activate_to','$username','activated to $activate_to by $username')";
                                 $result05 = mysqli_query($s_dbid,$sql05);

                               //expire pin
                                  $sql06 = "UPDATE `activation_pin` SET `expairy`= '1' WHERE `activation_pin` = '$activation_pin_up'";
                                  $result06 = mysqli_query($s_dbid,$sql06);

                                 header("Location: pinstatement.php");

                            }
               }



	  	   		}


       }
      }
      else{
          $_SESSION['msg'] = "pin expired";
          header("Location: pinwallet.php");
      }
   }
   else{
    $_SESSION['msg'] = "User doesn't exist or already activated";
    header("Location: pinwallet.php");
   }





?>