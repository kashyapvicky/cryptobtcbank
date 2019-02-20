<?php

session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";


$s_dbid = FALSE;



   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass, $s_dbname);

   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }

function find_users($snode) {
      global $s_dbid,$tusers,$tpackage;
	
        $sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$snode'";
        $result = mysqli_query($s_dbid,$sql);

		if(mysqli_num_rows($result)>0){
			while(list($uid,$user) = mysqli_fetch_row($result)){
			$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$uid' and status='active'";
        	$result2 = mysqli_query($s_dbid,$sql2);	
			list($uamt) = mysqli_fetch_row($result2);	
			$tusers++;
			$tpackage +=$uamt;
			//echo $user." ".$uamt."<br>";	
			find_users($user);
			}
		}
		else{
			//echo $snode;
		}
 
   }



symp_connect();


date_default_timezone_set("Asia/Kolkata");
	

			$qa="select * from investment where `status`='active' and `sdate` < NOW() - INTERVAL 1 DAY";
			$ra=mysqli_query($s_dbid,$qa);
			if(mysqli_num_rows($ra)>0){
				while($rowa=mysqli_fetch_assoc($ra))
				{
					
					$tmid = $rowa["mid"];
					$tamount = $rowa["amount"];
					//echo $tmid."<br>";
					$cname = "SELECT username FROM  `join`  WHERE id = $tmid";
					$cresult=mysqli_query($s_dbid,$cname);
					list($username) = mysqli_fetch_row($cresult);


					$today=date("Y-m-d");
					$newdate = strtotime ( '-1 day' , strtotime ( $today ) ) ;
					$today = date ("Y-m-d" , $newdate );					
					$that_day=$rowa["mlast_transaction"];												
					$diff = abs(strtotime($that_day) - strtotime($today));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						
					if($days>=1)
				{ // if it's been a day since last transaction

							

//matching claculations
							
							
$tday = strtotime("-1 Days");
$tdate = date("Y-m-d", $tday);
$tusers=0;
$tpackage=0;


$sql  = "SELECT id,username FROM `join` WHERE `dreferal` = '$username' and position = 'Left' and `misc` ='active'";
$result = mysqli_query($s_dbid,$sql);
list($lid,$luser) = mysqli_fetch_row($result);



$sql  = "SELECT id,username FROM `join` WHERE `dreferal` = '$username' and position = 'Right' and `misc` ='active'";
$result = mysqli_query($s_dbid,$sql);
list($rid,$ruser) = mysqli_fetch_row($result);

							if(($lid>0) && ($rid>0))
							{
								$sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Left'";
								$result = mysqli_query($s_dbid,$sql);
								list($lid,$luser) = mysqli_fetch_row($result);



								$sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Right'";
								$result = mysqli_query($s_dbid,$sql);
								list($rid,$ruser) = mysqli_fetch_row($result);	
								
								$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$lid' and status='active'";
								$result2 = mysqli_query($s_dbid,$sql2);	
								list($uamt) = mysqli_fetch_row($result2);	
								//echo $uamt." ".$lid." ";
								$tpackage +=$uamt;
								//echo $tpackage;						
								if(mysqli_num_rows($result)>0){
									$tusers++;
								}
								find_users($luser);
								$total_left = $tusers;
								@$tleftpackage += $tpackage;
								//echo $total_left."-".$tleftpackage;
								$tusers=0;
								$tpackage =0;
								$uamt = 0;



								$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$rid' and status='active'";
								$result2 = mysqli_query($s_dbid,$sql2);	
								list($uamt) = mysqli_fetch_row($result2);	

								$tpackage +=$uamt;
								if(mysqli_num_rows($result)>0)
								{
									$tusers++;
								}
								find_users($ruser);
								$total_right = $tusers;
								@$trightpackage += $tpackage;


								
								if($tleftpackage<$trightpackage){
									$amount = $tleftpackage;
								}
								if($tleftpackage>$trightpackage){
									$amount = $trightpackage;
								}
								if($tleftpackage==$trightpackage){
									$amount = $trightpackage;
								}

								echo "Left:".$tleftpackage."/".$total_left."  &nbsp;&nbsp;  &nbsp;Right:".$trightpackage."/".$total_right." =".$amount." &nbsp;&nbsp;$username<br>";

						
								$tday = strtotime("-1 Days");
							    $idate = date("Y-m-d", $tday);

								$qx = "select sum(amt),sum(comm) from `inv_transactions` where remarks like '%Matching%' and `mid`= ".$tmid.";";							
								$rx=mysqli_query($s_dbid,$qx);
								list($tamt,$tbus) = mysqli_fetch_row($rx);
								
								$total_business = $amount - $tamt;
								$amt = ($total_business/100)*5;



								//capping
								if($tamount>$amt){
									$comm_amt = $amt;
								}
								else{
									$comm_amt = $tamount;
								}

								

								if($amount>0)
								{
									$qx = "INSERT INTO `inv_transactions` (`id`, `mid`, `amt`, `comm`, `remarks`, `ttime`, `level`, `rname`, `tleft`,`tright`) VALUES (NULL, ".$tmid.", '".$total_business."', ".$comm_amt.", 'Matching Bonus', '$idate', NULL, NULL,$tleftpackage,$trightpackage);";
									//echo $qx."<br>"; 
									$rx=mysqli_query($s_dbid,$qx);
									
									$qx="update investment set mlast_transaction='".$today."' where id='".$rowa["id"]."'";// Last Transaction Time update
									$rx=mysqli_query($s_dbid,$qx);
									//echo $qx."<br>"."<br>";

									if($days<=0){ //if investment duration is over
										$qx="update investment set `status`='close' where id='".$rowa["mid"]."'";
										$rx=mysqli_query($s_dbid,$qx);

									}
									else{
									echo "Yippee<br>";
									}
								}
									$tpackage =0;
	$uamt = 0;
	$tusers=0;
	$tleftpackage = 0;
	$trightpackage = 0;	
							} //1:1 AB Condition
						}//day
						


				}
			}
	
?>