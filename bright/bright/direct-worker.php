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


symp_connect();


date_default_timezone_set("Asia/Kolkata");
	

			$q="select * from investment where `status`='active' and `sdate` < NOW() - INTERVAL 1 DAY ";
			$r=mysqli_query($s_dbid,$q);
			//echo $q;
			//echo mysqli_num_rows($r)."<br>";
			if(mysqli_num_rows($r)>0){
				while($ro=mysqli_fetch_assoc($r)){
					$tmid = $ro["mid"];
					$c = "SELECT username FROM `join` WHERE id = $tmid";
					$cr=mysqli_query($s_dbid,$c);
					list($tuser) = mysqli_fetch_row($cr);
					
					
					
					
					$c = "SELECT i.sdate,i.amount,i.dailypay,j.dreferal FROM  `join` AS j,  `investment` AS i WHERE j.`username` =  '$tuser' AND i.status = 'active' AND j.id = i.mid AND i.sdate < CURDATE() ";
					$cr=mysqli_query($s_dbid,$c);
					
					while(list($cdate,$camount,$cdailypay,$rfrom) = mysqli_fetch_row($cr)){
					
					
						$rdirect = "SELECT id FROM `join` WHERE username = '$rfrom'";
						$resultdirect=mysqli_query($s_dbid,$rdirect);
						list($rid) = mysqli_fetch_row($resultdirect);
					
					
					
						$today=date("Y-m-d");
					    $newdate = strtotime ( '-1 day' , strtotime ( $today ) ) ;
						$today = date ("Y-m-d" , $newdate );
						$that_day=$ro["dlast_transaction"];
						$diff = abs(strtotime($that_day) - strtotime($today));
						//echo $that_day."test";
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						//echo $days;
						if($days>=1){ // if it's been a day since last transaction
													//echo $today."<br>";
							
							//$idate = date("Y-m-d h:i:s",time());
							$tday = strtotime("-1 Days");
							$idate = date("Y-m-d", $tday);
							//blah blah calculations
							//$transaction_amount=@$row["dailypay"];
							//echo $camount." ".$cdailypay."<br>";
							$sqlcheckd = "SELECT id FROM `inv_transactions` WHERE rname = '$tuser' and `remarks` = 'Direct Sales Bonus' and `mid` = '".$rid."'";
							$rcheckd=mysqli_query($s_dbid,$sqlcheckd);
							$dnum = mysqli_num_rows($rcheckd);
							$comm = 250;
							if($dnum<=0 and $comm>0){
							

							$qx = "INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`) VALUES (NULL, ".$rid.", '".$comm."', ".$camount.", 'Direct Sales Bonus', '$idate', NULL, '$tuser');";
							echo $qx."<br><br>";
							$rx=mysqli_query($s_dbid,$qx);
							
							$qx="update investment set dlast_transaction='".$today."' where id='".$rid."'";// Last Transaction Time update
							$rx=mysqli_query($s_dbid,$qx);
							//echo $qx;
							}
							if($days<=0){ //if investment duration is over
								$qx="update investment set `status`='close' where id='".$rid."'";
								//$rx=mysqli_query($s_dbid,$qx);
								//echo $qx;
							}
							else{
							//echo "Yippee<br>";
							}
							

						}

					}
					
					
				}
			}
	
?>