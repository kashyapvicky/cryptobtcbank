<?php include ('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
	<link rel = "stylesheet" type ="text/css" href="style1.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="onsubmit_event.js"></script>
<script>

		
		
//bind change event once DOM is ready
function get_data(value){
					//alert(value);	
							$.ajax({
        url: "getsp.php",
        type: "GET",
        data: "value=" + value,
        success: function(data) {
          
			$(".result").html(data);
        }
     });
							}
</script>

</head>
<body>
	<div class="header">
		<h2>Register</h2>
		</div>
	<br>
	<center><?php if(@$_GET['errmsg']!="") echo  @$_GET['errmsg'];  ?></center>
		<form  method="post" action="submit.php" name="regform" onsubmit="return ValidationEvent()">  
			
			<div class="input-group">
				<LABEL>Sponsor*</LABEL>
				<input type="text" name="sponsor" onKeyUp="get_data(this.value)" value="<?=@$_GET['ref']?>">
			</div>
			<div  style="width: 290px;align-items: left; color: red" class="result"></div>
			<div class="input-group">
				<LABEL>Name*</LABEL>
				<input id="name" name="name" type="text">
			</div>
			<div class="input-group">
				<LABEL>Mobile*</LABEL>
				<input id="mobile" type="text" name="mobile" value="<?php echo($username)?>">
			</div>
			<div class="input-group">
				<LABEL>Email*</LABEL>
				<input id="email" type="text" name="Email" value="<?php echo($Email)?>">
			</div>
			<div class="input-group">
				<LABEL>Password*</LABEL>
				<input id="password" type="Password" name="password">
			</div>			
			<div class="input-group">
				<button type = "submit" name="Register" class="btn">Register</button>
			</div>
			<p>
				 Already a member? <a href="login.php">sign in</a>
				</p>

			

		</form>

</body>
</html>