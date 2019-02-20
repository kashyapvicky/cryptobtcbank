<?php include ('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
	<link rel = "stylesheet" type ="text/css" href="style1.css">

</head>
<body>
	<div class="header">
		<h2>Message</h2>
		</div>
		<br><br>
		<div>
			<center>
		<?php if(@$_GET['msg']!="") echo  @$_GET['msg'];  ?>
	</center>
		 </div>
			
			

</body>
</html>