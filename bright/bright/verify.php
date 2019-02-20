<?php
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

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

$vcode = $_GET['id'];
				
				//$sql = "select mid from vcode where `code`='$vcode'";
		    	//$result = mysql_query($sql, $s_dbid);
				//list($mid) = mysql_fetch_row($result);
				
				$sql2 = "UPDATE `vcode` set `status`='Verified' where `code`='$vcode' ";
				$result2 = mysqli_query($s_dbid,$sql2);






echo "<META HTTP-EQUIV='refresh' content='0; URL=verify-complete.php'>";    
?>