<?php
  session_start();
$username = "";
$Email="";
$errors = array();
  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'rsds_db');
   // if the register buttenis clicked 
  if (isset($_POST['Register'])){
  	$sponsor = $_POST['sponsor'];
  	$name = $_POST['name'];
  	$mobile = $_POST['mobile'];
  	$Email = $_POST['Email'];
  	$Password_1 = $_POST['Password_1'];
  	$Password_2 = $_POST['Password_2'];
  	 

  	 // insure that form fields are filld properly
  	 
  	 if (empty($name));{ 
  	 	array_push($errors, "name is required ");
	}
	if (empty($mobile));{ 
	  	 	array_push($errors, "mobile number is required ");
	}

	if (empty($email));{ 
	  	 	array_push($errors, "email is required ");
	}
	if (empty($password_1));{ 
	  	 	array_push($errors, "password is required ");
	}
	if ($Password_1 != $Password_2) {
		array_push($errors, "The two Password do not match");
	}
    // if theare are errors ,save user to database
	if (count ($errors)== 0 ){
	     $Password =md5($Password_1);//
	$sql= "INSERT INTO user (username, email, password)
	                  values ('$username','$Email','$Password')";
	          mysqli_query($db, $sql);
	          //echo $sql; 
	          $_SESSION['username']=  $username; 
	          $_SESSION['success'] = "you are now logged in";
	          header('location: index.php');//redirect to home page

	}
	else{
		print_r($errors);
		//header('location: registration.php?error='.$errors);//redirect to registration
	}
}
//logout
if (isset($_GET['logout'])){
	session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}

  




?>