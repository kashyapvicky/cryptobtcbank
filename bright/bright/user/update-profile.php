<?php
session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;








$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$otp_user = $_POST['otp_user'];






$bank_name= $_POST['bank_name'];
$branch_name= $_POST['branch_name'];
$account_holder = $_POST['account_holder'];
$account_no = $_POST['account_no'];
$ifsc = $_POST['ifsc'];
$pan = $_POST['pan'];





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
$sql = "select `id` from `join` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);



$sql = "SELECT otp FROM user_otp WHERE mid = '$jid' ORDER BY generated_time DESC";           
$result = mysqli_query($s_dbid,$sql);
list($db_otp) = mysqli_fetch_row($result);


          if ($otp_user == $db_otp) {
                  $detailsql = "UPDATE `join` SET `name` = '".$name."', `email` = '".$email."', `phone` = '$mobile' WHERE `id` = '".$jid."' ;"; 
                   $detailresult = mysqli_query($s_dbid,$detailsql);


                  $sql = "select * from bank where `jid` = '$jid'";
                  $result = mysqli_query($s_dbid,$sql);
                  $nrows = mysqli_num_rows($result);
                 


                  if($nrows>0){
                  $banksql = "UPDATE `bank` SET  `bank_name` =  '$bank_name', `branch_name` = '$branch_name', `account_no` = '$account_no', `aname` = '$account_holder', `ifsc` = '$ifsc', `pancard` = '$pan'  WHERE `jid` ='$jid';";
                   }

                  else{
                  $banksql = "INSERT INTO `bank` (`id`, `bank_name`, `branch_name`, `account_no`, `account_type`, `aname`, `jid`, `ifsc`, `pancard`) VALUES (NULL, '$bank', '$branch', '$accno', '$acctype', '$aname', '$jid', '$ifsc', '$pan');";
                   }

                  $result = mysqli_query($s_dbid,$banksql);
                   header("Location: edit-profile.php");
                   $_SESSION['msg'] = "successfull";

          }
          else{
               header("Location: edit-profile.php");
                $_SESSION['msg'] = "unsuccessfull";
          }






       

          
          symp_disconnect();





?>