<?php
require "config.php";
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
	// database connection kuch bhi
	$conn = mysqli_connect('localhost','root','','rsds_db');
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



	$username= $_POST['username'];
	$password= $_POST['password'];
	


     //echo $username;
     //echo $email;
     //echo $password;
//INSERT INTO user( `username`, `email`, `password`) VALUES ('pawn', '123', 'pawan@gmail.com')
$sql = "SELECT * FROM 'join' WHERE username='".$username."' and password='".$password."'";
//echo $query; die;
 $result = mysqli_query($s_dbid,$sql);
	        $nrows=0;
$nrows = mysqli_num_rows($result);		
	        	{
	         
	        if (empty($password)){
	        	$msg= "The email is mandatory<br>";
	        	$flag = FALSE;
            }
            {
	         
	        if (empty($password)){
	        	$msg= "The password is mandatory<br>";
	        	$flag = FALSE;
            }

if($flag==TRUE){

		$sqlc  = "SELECT `password` FROM `join` ";
		$resultc = mysqli_query($s_dbid,$sqlc);
		list($lastid) = mysqli_fetch_row($resultc);	
		$username = genuser();
		$username = $username.$lastid;
		
}
		else
		{
			//echo"<script>alert('error')</script>";
			$msg= 'Invalid username/password. Please try again.';
		}

{

	echo "<META HTTP-EQUIV='refresh' content='0; URL=login.php?errmsg=".$msg."&user=".$username."'>";
}
?>