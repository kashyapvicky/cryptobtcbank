<?php

session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;





$tnumber = $_POST['transaction_number'];
$mid = $_POST['mid'];
$username = $_SESSION['username'];
//$dailypay = ($price/100)*$roi;
$days = 250;



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



$cdate = date("Y-m-d");

$temp = explode(".", $_FILES["slip"]["name"]);

$target_dir = "../uploads/";

$newfilename = round(microtime(true)) . '.' . end($temp);

$target_file = $target_dir . basename($_FILES["slip"]["name"]);

$uploadOk = 1;

$mid = $_POST['mid'];
// echo $mid; die;



// Check if image file is a actual image or fake image



   $sql2 = "DELETE FROM `investment` WHERE `mid` = '$mid'";

   $result1 = @mysqli_query($s_dbid,$sql2);






     $check = getimagesize($_FILES["slip"]["tmp_name"]);
     //echo $check; die;

     if($check == true)
     {

       move_uploaded_file($_FILES["slip"]["tmp_name"],$target_dir.$newfilename);

       $sql = "INSERT INTO `investment` (`id`, `plan`, `amount`, `mid`, `sdate`, `ppercentage`, `dailypay`, `status`, `hashcode`, `last_transaction`, `days`, `dlast_transaction`, `mlast_transaction`, `slip`) VALUES (NULL, '1', '5000', '$mid', '$cdate', 0, 0, 'pending', NULL, NULL, '250', NULL, NULL, '$newfilename');";


       $result = mysqli_query($s_dbid,$sql);

//echo $sql;

       header("Location: product_details.php?pid=1");
     }
      else
      {
        echo "please upload slip";
      }   



  


symp_disconnect();



?>