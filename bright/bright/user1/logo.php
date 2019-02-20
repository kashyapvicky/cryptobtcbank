<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	// database connection kuch bhi
	$conn = mysqli_connect('localhost','root','','registration');
	// if ($conn) {

	// 	echo"<script>alert('connected')</script>";
	// }
	// else
	// {
	// 	echo"<script>alert(' not connected')</script>";
	// }





	$username= $_POST['username'];
	$mobile= $_POST['mobile'];
	$email= $_POST['Email'];
	$password= $_POST['password'];
	


     //echo $username;
     //echo $email;
     //echo $password;
//INSERT INTO user( `username`, `email`, `password`) VALUES ('pawn', '123', 'pawan@gmail.com')
$query = "INSERT INTO user( `username`,`mobile`, `password`, `email`) VALUES ('".$username."','".$mobile."','".$password."', '".$email."')";
//echo $query; die;
$result = mysqli_query($conn,$query);
if($result)


{
	//echo"<script>alert('data updated')</script>";
	$msg = "Data Updated Successfully.";
	
//$to = $email.",info@rsds.co.in";
$to = "pawanitgroup@gmail.com";
$subject = "Your Membership Registration at RSDS";

$message = "
<html>
<head>
<title>Registration</title>
</head>
<body>
<p>Welcome to RSDS Program.</p>
<p>Dear User please find the login details for the RSDS program:</p>
Username : ".$username."<br>
Password : ".$password."<br>
<br>
Admin
RSDS
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@rsds.co.in>' . "\r\n";


mail($to,$subject,$message,$headers);


}
else
{
	//echo"<script>alert('error')</script>";
	$msg= 'Invalid username/password. Please try again.';
}

?>
<meta http-equiv="refresh" content="0;URL='../message.php?msg=<?=$msg?>" />
	

