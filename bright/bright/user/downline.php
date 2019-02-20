<?php
session_start();
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

$username = $_SESSION['username'];

$sql  = "SELECT id,sponsor FROM `join` WHERE `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($mid,$sponsor) = mysqli_fetch_row($result);
// echo $mid; echo $sponsor; die;

$sql  = "SELECT count(id) FROM `join` WHERE `sponsor` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($n_ref) = mysqli_fetch_row($result);
// print_r($n_ref);die;

$sql  = "SELECT count(id) FROM `join` WHERE `sponsor` = '$username' and misc = 'active'";
$result = mysqli_query($s_dbid,$sql);
list($n_ref_active) = mysqli_fetch_row($result);


$sqlinv  = "SELECT amount,DATE_FORMAT(`sdate`, '%d-%m-%Y'),days FROM `investment` WHERE `mid` = '$mid' and status='active'";
$resultinv = mysqli_query($s_dbid,$sqlinv);
list($investment,$sdate,$tdays) = mysqli_fetch_row($resultinv);

$tusers=0;
$tpackage=0;
// function find_users($snode)
// {
    
//       global $s_dbid,$tusers,$tpackage;
	
//         $sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$snode'";
//         $result = mysqli_query($s_dbid,$sql);

// 		if(mysqli_num_rows($result)>0){
// 			while(list($uid,$user) = mysqli_fetch_row($result)){
// 			$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$uid' and status='active'";
//         	$result2 = mysqli_query($s_dbid,$sql2);	
// 			list($uamt) = mysqli_fetch_row($result2);	
// 			$tusers++;
// 			$tpackage +=$uamt;
// 			//echo $user." ".$uamt."<br>";	
// 			find_users($user);
// 			}
// 		}
// 		else{
// 			//echo $snode;
// 		}
 
// }


$sql = "SELECT `id` FROM `join` WHERE username = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);
					
$damount = 0;
$sql  = "SELECT id FROM `join` WHERE `dreferal` = '$username'  ";
$result = mysqli_query($s_dbid,$sql);

$duser = 0;
while(list($did) = mysqli_fetch_row($result)){
	$sql1  = "SELECT amount FROM `investment` WHERE `mid` = '$did'  ";
	$result1 = mysqli_query($s_dbid,$sql1);
	if(mysqli_num_rows($result1)>0){
	list($damt) = mysqli_fetch_row($result1);
	$duser++;
	$damount +=$damt;	
	}
}



//$cps = new CoinPaymentsAPI();
//	$cps->Setup('6A9C01E450260031601F60f69b46bBF680FCae8c0107c2329c014275a1b1ed5A', '80eb8c146a45bd26c98a55fe4a8cf49c1932120b715c366db675807706c4c2b4');
//
//	$rates = $cps->GetRates();
//
//	$r_rates = $rates["result"]["USD"]["rate_btc"];
////print_r($r_rates);
////echo $r_rates;
//	$bamt =  $r_rates*$coin_bal;
////echo $bamt;
$sno=0;
	$username =  $_SESSION['username'];
	$name = $_SESSION['name'];

function getusers($snode,$pos){
	global $s_dbid,$pid,$cnt,$sno,$records_ref;
	
		$sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),position,dreferal,misc FROM `join` WHERE `sponsor` = '$snode' order by position";
        $result = mysqli_query($s_dbid,$sql);

	    if(mysqli_num_rows($result)>0){
			while(list($mid,$name,$username,$email,$phone,$sponsor,$jdate,$position,$direct,$status_join) = @mysqli_fetch_row($result)){
				$ruser = $username;
				$cnt=1;
				$sno++;
				$sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
        		$resultinv = mysqli_query($s_dbid,$sqlinv);
				list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
				
				$sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
        		$resultsp = mysqli_query($s_dbid,$sqlsp);
				list($sponsorname) = mysqli_fetch_row($resultsp);
				if($status!="pending"){} else{ $amount=""; $status="";}
				echo "<tr><td align='center'>".$sno."</td><td align='center'>".$name."</td><td align='center'>".$username."</td><td align='center'>".$direct."</td><td align='center'>".$pos."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$amount."</td><td align='center'> ".$status_join."</td></tr>";
		
				getusers($ruser,$pos);	
			}
		}
}

?>
<?php
 include 'includes/header.php';

?>
<!-- start: MAIN CONTAINER -->
<div class="main-container prh">
  
<?php
 
 include 'includes/sidebar.php';

?>
    <!-- start: PAGE -->
    <div class="main-content">
        <div class="container" style="min-height: 900px;">
            <!-- start: PAGE HEADER -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- start: PAGE TITLE & BREADCRUMB -->
                    <ol class="breadcrumb">
                        <li>
                            <i class="clip-pencil"></i>
                            <a href="dashboard.php"> 
                                Dashboard
                            </a>
                        </li>
                                                    <li>
                                <a href="#">
                                    Downline
                                </a>
                            </li>
                                                                                                    <li>
                                
                            </li>
                        	

                        <!-- start: TIME -->
                        <li class="pull-right">		
                            <span class="date" style="padding: 0px 0px 0px 10px;">
                                <timestamp id="date">Sunday, June 17, 2018</timestamp> 
                            </span>
                            <div id="clock">6:36:01 PM</div>

                            
                        </li> 
                        <!-- end: TIME -->
                    </ol>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                    <!-- start: PAGE HEADER -->
                    <!-- <div class="page-header">
                        <h1>Earned Income 
                                    </h1>
            </div> -->
                </div>
            </div>
            <!-- end: PAGE HEADER --> 

            

            <script>
    jQuery(document).ready(function ()
    {
        
        jQuery("#close_link").click(function ()
        {
            jQuery("#message_box").fadeOut(1000);
            jQuery("#message_box").removeClass('ok');
        });
    });
</script>

            <!--site header-->            
                
<div id="span_js_messages" style="display:none;">
    <span id="row_msg">Rows</span>
    <span id="show_msg">Shows</span>
    <span id="username_msg">You Must Enter Username</span>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default common-top">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="fa fa-resize-full"></i>
                    </a>
                </div>
                Downline
            </div>
            <div class="panel-body">
                <form action="https://infinitemlmsoftware.com/backoffice/user/income_details/income" role="form" class="smart-wizard form-horizontal" method="post" name="feedback_form" id="feedback_form" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> Please check the values you've submitted.
                        </div>
                    </div>
                                                            

                       <table  id="myTable" class="table table-striped table-hover table-full-width table-bordered">
                      <thead>
                        <tr>
                          <th>S No</th>
							<th>Name</th>
                          <th>Username</th>
                          <th>Sponsor</th>
                          <th>Position</th>
                          <th>Joining Date</th>
						  <th>Activation Date</th>
                          <th>Package &#8377;</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
							
							$pos = "Left";
							$sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),position,dreferal,misc FROM `join` WHERE `sponsor` = '$username' and position = 'Left'";
        					$result = mysqli_query($s_dbid,$sql);

							list($mid,$name,$luser,$email,$phone,$sponsor,$jdate,$position,$direct,$status_join) = @mysqli_fetch_row($result);

							$sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
							$resultinv = mysqli_query($s_dbid,$sqlinv);
							list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);

							$sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
							$resultsp = mysqli_query($s_dbid,$sqlsp);
							list($sponsorname) = mysqli_fetch_row($resultsp);
							//if($status!="pending"){} else{ $amount=""; $status="";}
						  	if($luser!=""){
							$sno =1;	
							echo "<tr><td align='center'>".$sno."</td><td align='center'>".$name."</td><td align='center'>".$luser."</td><td align='center'>".$direct."</td><td align='center'>".$pos."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$amount."</td><td align='center'> ".$status_join."</td></tr>";
							getusers($luser,$pos); 	
						  	}


							
							$pos = "Right";
							$sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),position,dreferal,misc FROM `join` where `sponsor` = '$username' and position = 'Right'";
        					$result = mysqli_query($s_dbid,$sql);

							list($mid,$name,$ruser,$email,$phone,$sponsor,$jdate,$position,$direct,$status_join) = @mysqli_fetch_row($result);

							$sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
							$resultinv = mysqli_query($s_dbid,$sqlinv);
							list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);

							$sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
							$resultsp = mysqli_query($s_dbid,$sqlsp);
							list($sponsorname) = mysqli_fetch_row($resultsp);
							//if($status!="pending"){} else{ $amount=""; $status="";}
						    if($ruser!=""){
							$sno++;	
							echo "<tr><td align='center'>".$sno."</td><td align='center'>".$name."</td><td align='center'>".$ruser."</td><td align='center'>".$direct."</td><td align='center'>".$pos."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$amount."</td><td align='center'> ".$status_join."</td></tr>";
							getusers($ruser,$pos); 
							}
								?> 
                      </tbody>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>
<div id="autowidthcss"></div>
<div id="autowidthcssemp"></div>

 
            
    
</div>
<!-- end: PAGE CONTAINER -->
</div>
<!-- end : PAGE -->
</div>
<!-- end: MAIN CONTAINER -->


     


<?php
 include 'includes/footer.php';

?>

    
</body></html>