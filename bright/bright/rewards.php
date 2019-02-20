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

     $aR = [];


symp_connect();

 
   function find_active_downline($user){
   	 global $s_dbid,$aR;
       $qa1="select `id`,`username` from `join` where `sponsor`='$user'";
	   $ra1=mysqli_query($s_dbid,$qa1);
	   if(mysqli_num_rows($ra1)>0){
       while(list($tid,$user1) = mysqli_fetch_row($ra1))
       {
          $sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$tid' and status='active'";
          $result2 = mysqli_query($s_dbid,$sql2);
          if(mysqli_num_rows($result2) > 0){
          	list($uamt) = mysqli_fetch_row($result2);	
          	//echo $uamt."<br>";
             if(isset($uamt)){
          	  array_push($aR, $uamt);
            }
          }
          
          find_active_downline($user1);
       }
     }
 
   }

  


date_default_timezone_set("Asia/Kolkata");
	

			$qa="select * from investment where `status`='active' and `sdate` < NOW() - INTERVAL 1 DAY";
			$ra=mysqli_query($s_dbid,$qa);
			if(mysqli_num_rows($ra)>0){
				while($rowa=mysqli_fetch_assoc($ra)){
					
					$tmid = $rowa["mid"];
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
						
					//if($days>=1){ 

							$tday = strtotime("-1 Days");
							$tdate = date("Y-m-d h:i:s", $tday);
		
			     
                     $qa12="select `username` from `join` where `sponsor`='$username' and `position` = 'left'";
	                 $ra12=mysqli_query($s_dbid,$qa12);
	                 list($luser) = mysqli_fetch_row($ra12);
                     find_active_downline($luser);
                     $left_active = count($aR);
                     $aR = [];


                      $qa12="select `username` from `join` where `sponsor`='$username' and `position` = 'right'";
	                  $ra12=mysqli_query($s_dbid,$qa12);
	                  list($luser) = mysqli_fetch_row($ra12);
                      find_active_downline($luser);
                      $right_active = count($aR);
                      $aR = [];
                              


                      if($left_active<$right_active){
                           $maching_user = $left_active;
                      }
                      else{
                      	  $maching_user = $right_active;
                      }

                      if($maching_user >= 100000 && $maching_user < 250000){
                      		$reward = "Android Mobile";
                      }

                      if($maching_user >= 250000 &&  $maching_user < 500000){
                      		$reward = "Android Tab";
                      }

                      if($maching_user >= 500000 &&  $maching_user < 1000000){
                      		$reward = "Laptop";
                      }

                      if($maching_user >= 1000000 &&  $maching_user < 2500000){
                      		$reward = "Platina Bike";
                      }

                      if($maching_user >= 2500000 &&  $maching_user < 5000000){
                      		$reward = "EON car Down Payment";
                      }

                      if($maching_user >= 5000000 &&  $maching_user < 10000000){
                      		$reward = "Swift car Downpayment";
                      }

                      if($maching_user >= 10000000 &&  $maching_user < 2500000){
                      		$reward = "Fortuner Downpayment";
                      }


                       $qx = "select reward from `rewards` where `mid`= ".$tmid." order by id DESC;";	

                     		         $rx=mysqli_query($s_dbid,$qx);

								     list($current_reward) = mysqli_fetch_row($rx);


								
								if(($reward!="") && ($current_reward!=$reward)){

									$qx = "INSERT INTO `rewards` (`id`, `mid`, `bdate`, `reward`, `status`, `rank`) VALUES (NULL, '$tmid', '$today', '$reward', 'pending', 'Achiever');";

									mysqli_query($s_dbid,$qx);


								}
									
								
	
							
						//}//day
						


				}
			}
	
?>