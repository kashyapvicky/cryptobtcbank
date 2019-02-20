<html>
<head>
<body>
	<form action="submit-form.php" method="post">
 name : <input type="text" name ="login Id"><br>
 Password : <input type="Password" value="Password"><br/>
<input type="submit" value="submit">
<?php
$connected = mysql_connect('127.0.0', 'root','');
if (!$con)
{
 echo 'not connected to server';
}
if (mysqli_select_db($con, 'rinku')); 
{
echo 'data base not selected';
}
$name = $_post['username'];
$password = $_post['password'];
$sql = "INSERT INTO ROCK (',password') 
values ('$name', '$password')";
if ('mysqli_query' ($connected ,$sql));
{
	echo 'not inserted';
}

{
	echo 'inserted';
}
header ("refersh:2; url=index.html");
?>
</body>
</html>