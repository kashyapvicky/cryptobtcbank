<?php

session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);



require dirname(__FILE__)."/config.$ext";



$s_dbid = FALSE;





if(isset($_GET["user"])){

	$username = $_GET["user"];

}

else{

	$username = $_SESSION['username']; 

}



$username_ttls = $_SESSION['username'];



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





$sql = "select `id` from `join` where `username` = '$username_ttls';";						

$result = mysqli_query($s_dbid,$sql);

list($mid) = mysqli_fetch_row($result);



///// Binary





$tusers=0;

$tpackage=0;

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









$sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Left'";

$result = mysqli_query($s_dbid,$sql);

//echo $sql;

list($lid,$luser) = mysqli_fetch_row($result);

$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$lid' and status='active'";

$result2 = mysqli_query($s_dbid,$sql2);	

list($uamt) = mysqli_fetch_row($result2);	



$tpackage +=$uamt;

if(mysqli_num_rows($result)>0){

	$tusers++;

}

//find_users($luser);

//$total_left = $tusers;

//@$tleftpackage += $tpackage;

$tusers=0;





$tpackage =0;

$uamt = 0;

$tusers=0;

$sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Right'";

$result = mysqli_query($s_dbid,$sql);

//echo $sql;

list($rid,$ruser) = mysqli_fetch_row($result);

$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$rid' and status='active'";

$result2 = mysqli_query($s_dbid,$sql2);	

list($uamt) = mysqli_fetch_row($result2);	



$tpackage +=$uamt;

if(mysqli_num_rows($result)>0){

	$tusers++;

}

//find_users($ruser);

//$total_right = $tusers;

//@$trightpackage += $tpackage;

$tusers=0;

/////Binary





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







if (@$_GET['user']!=""){



	$sql5  = "SELECT id FROM `join` WHERE `username` = '$_GET[user]'";

	$result = mysqli_query($s_dbid,$sql5);

	list($sid) = @mysqli_fetch_row($result);	



	//$detailsql  = "SELECT id,misc FROM `join` WHERE `username` = '$_SESSION[username]'";

	$detailsql  = "SELECT misc,id FROM `join` WHERE `username` = '$username'";

	$detailresult = mysqli_query($s_dbid,$detailsql);

	list($status1,$jid) = @mysqli_fetch_row($detailresult);	

	if($sid<$jid){

		$trv = $_SESSION['username'];	

	}

	else{

		$trv = $_GET['user'];

	}

}

else

{

	$trv = $_SESSION['username'];	

}







if($username){

	//$detailsql  = "SELECT id,misc FROM `join` WHERE `username` = '$_SESSION[username]'";

	$detailsql12345  = "SELECT misc FROM `join` WHERE `username` = '$username'";

	$detailresult = mysqli_query($s_dbid,$detailsql12345);

	list($status1) = @mysqli_fetch_row($detailresult);	

}



if($status1=="active"){

	$color="active";

}

elseif($status1=="pending"){

	$color="inactive";

}

else{

	$color="add";

}



function sdate($username){

	global $s_dbid;

	

	$sql  = "SELECT `id` FROM `join` WHERE `username` = '$username'";

	$result = @mysqli_query($s_dbid,$sql);

	list($mid) = @mysqli_fetch_row($result);

	$sql  = "SELECT `sdate` FROM `investment` WHERE `mid` = '$mid'";

	$result = @mysqli_query($s_dbid,$sql);

	list($sdate) = @mysqli_fetch_row($result);



	return $sdate;

}



function jdate($username){

	global $s_dbid;

	

	$sql  = "SELECT `jdate` FROM `join` WHERE `username` = '$username'";

	$result = @mysqli_query($s_dbid,$sql);

	list($jdate) = @mysqli_fetch_row($result);

	return $jdate;

}



$lpackage=0;

$rpackage=0;

function leftall($username){

	global $s_dbid,$tusers,$tpackage,$tleftpackage;



	$rpackage =0;

	$tpackage =0;

	$uamt = 0;

	$tusers=0;	

	$sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Left'";

	$result = mysqli_query($s_dbid,$sql);

//echo $sql;

	list($lid,$luser) = mysqli_fetch_row($result);

// print_r($luser);die;

	$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$lid' and status='active'";

	$result2 = mysqli_query($s_dbid,$sql2);	

	list($uamt) = mysqli_fetch_row($result2);	



	$tpackage +=$uamt;

	if(mysqli_num_rows($result)>0){

		$tusers++;

	}

	find_users($luser);

	$total_left = $tusers;

//@$tleftpackage += $tpackage;



	

}



function rightall($username){

	global $s_dbid,$tusers,$tpackage,$trightpackage;



	$rpackage =0;

	$tpackage =0;

	$uamt = 0;

	$tusers=0;	

	$sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Right'";

	$result = mysqli_query($s_dbid,$sql);

//echo $sql;

	list($lid,$luser) = mysqli_fetch_row($result);

	$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$lid' and status='active'";

	$result2 = mysqli_query($s_dbid,$sql2);	

	list($uamt) = mysqli_fetch_row($result2);	



	$tpackage +=$uamt;

	if(mysqli_num_rows($result)>0){

		$tusers++;

	}

	find_users($luser);

	$total_right = $tusers;

//@$trightpackage += $tpackage;



	

}





$boardsql  = "SELECT name,username,misc  FROM `join` WHERE `sponsor` = '$trv' and position ='Left'";

$bresult = @mysqli_query($s_dbid,$boardsql);

list($pname1,$pusername1,$status1) = @mysqli_fetch_row($bresult);



$boardsql  = "SELECT name,username,misc  FROM `join` WHERE `sponsor` = '$trv' and position ='Right'";

$bresult = @mysqli_query($s_dbid,$boardsql);

list($pname2,$pusername2,$status2) = @mysqli_fetch_row($bresult);



if($status1=="active"){

	$color1="active";

}

elseif($status1=="pending"){

	$color1="inactive";

}

else{

	$color1="add";

}

if($status2=="active"){

	$color2="active";

}

elseif($status2=="pending"){

	$color2="inactive";

}

else{

	$color2="add";

}



$boardsql  = "SELECT name,username,misc  FROM `join` WHERE `sponsor` = '$pusername1' and position ='Left'";

$bresult = @mysqli_query($s_dbid,$boardsql);

list($sname1,$susername1,$sstatus1) = @mysqli_fetch_row($bresult);



$boardsql  = "SELECT name,username,misc  FROM `join` WHERE `sponsor` = '$pusername1' and position ='Right'";

$bresult = @mysqli_query($s_dbid,$boardsql);

list($sname2,$susername2,$sstatus2) = @mysqli_fetch_row($bresult);



if($sstatus1=="active"){

	$scolor1="active";

}

elseif($sstatus1=="pending"){

	$scolor1="inactive";

}

else{

	$scolor1="add";

}

if($sstatus2=="active"){

	$scolor2="active";

}

elseif($sstatus2=="pending"){

	$scolor2="inactive";

}

else{

	$scolor2="add";

}



$boardsql  = "SELECT name,username,misc  FROM `join` WHERE `sponsor` = '$pusername2' and position ='Left'";

$bresult = @mysqli_query($s_dbid,$boardsql);

list($sname3,$susername3,$sstatus3) = @mysqli_fetch_row($bresult);



$boardsql  = "SELECT name,username,misc  FROM `join` WHERE `sponsor` = '$pusername2' and position ='Right'";

$bresult = @mysqli_query($s_dbid,$boardsql);

list($sname4,$susername4,$sstatus4) = @mysqli_fetch_row($bresult);



if($sstatus3=="active"){

	$scolor3="active";

}

elseif($sstatus3=="pending"){

	$scolor3="inactive";

}

else{

	$scolor3="add";

}

if($sstatus4=="active"){

	$scolor4="active";

}

elseif($sstatus4=="pending"){

	$scolor4="inactive";

}

else{

	$scolor4="add";

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

								Genealogy Tree

							</a>

						</li>

						<li>



						</li>





						<!-- start: TIME -->

						<li class="pull-right">		

							<span class="date" style="padding: 0px 0px 0px 10px;">

								<timestamp id="date">Sunday, June 17, 2018</timestamp> 

							</span>

							<div id="clock">6:17:02 PM</div>





						</li> 

						<!-- end: TIME -->

					</ol>

					<!-- end: PAGE TITLE & BREADCRUMB -->

					<!-- start: PAGE HEADER -->

                    <!-- <div class="page-header">

                        <h1>Genealogy Tree 

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





                        <div id="span_js_messages" style="display:none">

                        	<span id="error_msg">Select Username</span>

                        </div>



                        <!-- start: GENOLOGY TREE-->                                         

                        <div class="row">



                        	<div class="col-sm-12">

                        		<div class="panel panel-default common-top">

                        			<div class="panel-heading">

                        				<i class="fa fa-sitemap"></i>

                        				Genealogy Tree



                        			</div>

                        			<div class="panel-body">

                        				<button class="zoomIn btn btn-success"><span class="glyphicon glyphicon-zoom-in" style="font-size:20px"></span></button>

                        				<button class="zoomOut zoomOut btn btn-danger"><span class="glyphicon glyphicon-zoom-out" style="font-size:20px"></span></button>

                        				<button class="zoomOff btn btn-default"><span class="glyphicon glyphicon-off" style="font-size:20px"></span></button>



                               <!--  <div class="panel-tools" style="right: 10px;">                          

                    <a href="https://infinitemlmsoftware.com/backoffice/user/tree/binary_leg_settings" class="btn btn-sm btn-primary active" tabindex="4"><i class="fa fa-external-link"></i> Binary Leg Settings</a>

                    <a href="https://infinitemlmsoftware.com/backoffice/user/leg_count/view_leg_count" class="btn btn-sm btn-primary active" tabindex="4"><i class="fa fa-external-link"></i> Leg Details</a>

                </div> -->



                <div class="row">

                	<div class="col-sm-6 gen">

                		<img src="assets/active.png" style="border:hidden" title="Paid" width="40px" height="40px" align="absmiddle"><b>Active</b>&nbsp;&nbsp;&nbsp;

                		<img src="assets/inactive.png" style="border:hidden" title="Not Paid" width="40px" height="40px" align="absmiddle"><b>Inactive</b>&nbsp;&nbsp;&nbsp;

                		<img src="assets/add_disabled.png" style="border:hidden" title="New One" width="24px" height="24px" align="absmiddle">&nbsp;<b>Disabled</b>&nbsp;&nbsp;&nbsp; 

                		<img src="assets/add.png" style="border:hidden" title="New One" width="24px" height="24px" align="absmiddle">&nbsp;<b>Vacant</b>&nbsp;&nbsp;&nbsp; 

                	</div>

                	<div class="col-sm-6">

                		<style type="text/css">

                		.panel{

                			box-shadow: 0 1px 1px rgba(255, 255, 255, 0.1) !important;

                		}

                	</style>

                	<div class="row">

                		<div class="col-sm-12">

                			<div class="panel panel-default">



                				<div class="panel-body">

                					<form action="tree.php" role="form" class="smart-wizard form-inline" name="search" id="search" method="get" accept-charset="utf-8" novalidate="novalidate">





                <!--<input id="search_member_error" value="You must enter a username" type="hidden">

                	<input id="search_member_error2" value="Invalid Username." type="hidden">-->

                	<div class="errorHandler alert alert-danger no-display">

                		<i class="fa fa-times-sign"></i> Please check the values you've submitted.

                	</div>

                	<div class="form-group col-sm-6">

                		<label class="required" for="user_name">Username</label>

                		<input class="form-control" id="user_name" name="user" autocomplete="Off" type="text">

                		<!--onkeyup="ajax_showOptions(this, 'getCountriesByLetters', 'no', event,'get_downline_users')"-->

                	</div>

                	<div class="form-group col-sm-3">

                		<button class="btn btn-bricky" type="submit" id="search_member_submit">

                			Search

                		</button>

                	</div>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

</div>                  

<div id="loader-div" style="z-index:9999;text-align: center;display: none;"><img src="assets/loader.gif" style="margin-left: 10px;"></div>



<div id="summary" class="panel-body tree-container1" style="height:100%;margin: auto;width: 100%;top: 0px;"><link rel="stylesheet" href="assets/styles-tree.css">

	<link rel="stylesheet" href="assets/custom-tree.css">

	<link href="assets/prettify-tree.css" type="text/css" rel="stylesheet">

	<script src="assets/jquery_007.js"></script>



	<script>

		jQuery(document).ready(function () {

			$("#tree_view").jOrgChart({

				chartElement: '#tree',

				dragAndDrop: false

			});

		});

	</script>

	<script type="text/javascript">

		$(document).ready(function () {        

			$('[data-toggle="tooltip"]').tooltip();

		});

	</script>



	<link href="assets/style_tooltip.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="assets/easyTooltip.js"></script>

	<script src="assets/jquery_006.js"></script>



	<script type="text/javascript">

		$(document).ready(function () {



			$('[data-toggle="tooltip"]').tooltip();

		});

	</script> 







	<div id="tree" class="orgChart"><div class="jOrgChart"><table id="tree_div" style="transform: scale(1, 1); transform-origin: 0px 0px 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr class="node-cells"><td class="node-cell" colspan="4">


		<div class="node" style="cursor: default;"><a href="tree.php?user=<?=$username?>" id="level-0"><img class="tree_icon" src="assets/<?=$color?>.png" alt="<?=$username?>" id="userlink_<?=$username?>" onclick='tree.php?user=<?=$username?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$username?>' class='tooltip_div' style='background-color: white; '>	<div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$username?></span></div>

			<div class='img_bg tree_common'></div>			

			<br clear='all' />            

			<div class='tooltip_details' style=' background-color: white;'>	

				<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

					<tr><td>Your Name : <?=strtoupper($username)?></td></tr>

					<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($username);?></td></tr>  <tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($username);?></td></tr> 

					<?php $tusers=0; $tpackage=0; $total_left=0; $total_right=0; $tleftpackage=0; $trightpackage=0; leftall($username); $total_left += $tusers; $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($username); $total_right += $tusers; $trightpackage += $tpackage; ?>	

					<tr>

						<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

					</tr>

					<tr>

						<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

					</tr>

					<tr>

						<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

					</tr>

					<tr>

						<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

					</tr>



				</table>			

			</div>

		</div><div id='tree' class='orgChart'></div>"></a>

		<br><div class="line down"></div>

		<div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$username?></div></div>



	</td></tr>

	

	<tr><td colspan="4"><div class="line down"></div></td></tr><tr><td class="line left">&nbsp;</td><td class="line right top">&nbsp;</td><td class="line left top">&nbsp;</td><td class="line right">&nbsp;</td></tr>

	

	<tr><td class="node-container" colspan="2"><table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr class="node-cells"><td class="node-cell" colspan="4"><div class="node" style="cursor: default;"><a href="tree.php?user=<?=$pusername1?>" id="level-1"><img class="tree_icon" src="assets/<?=$color1?>.png" alt="<?=$pusername1?>" id="userlink_<?=$pusername1?>" onclick='tree.php?user=<?=$pusername1?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$pusername1?>' class='tooltip_div' style='background-color: white; '> <div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$pusername1?></span></div>

		<div class='img_bg tree_common'></div>			

		<br clear='all' />            

		<div class='tooltip_details' style=' background-color: white;'>	

			<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

				<tr><td>Your Name : <?=strtoupper($pusername1)?></td></tr>

				<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($pusername1);?></td></tr>

				<tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($pusername1);?></td></tr> 

				<?php $tusers=0; $tpackage=0; $total_left=0; $total_right=0; $tleftpackage=0; $trightpackage=0;  leftall($pusername1); $total_left += $tusers; $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($pusername1); $total_right += $tusers; $trightpackage += $tpackage; ?>	

				<tr>

					<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

				</tr>

				<tr>

					<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

				</tr>

				<tr>

					<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

				</tr>

				<tr>

					<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

				</tr>



			</table>			

		</div>

		<!--<div style='height: 25px; width: 100%;text-align: center;'>

			<div class='btn btn-bricky badge fadeIn' style='margin-top: 0.8em;'>

				<b style='color:#fff'>Gold</b>

			</div>

		</div>-->

	</div><div id='tree' class='orgChart'></div>"></a><br><div class="line down"></div>

	<div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$pusername1?></div></div></td></tr>



	<tr><td colspan="4"><div class="line down"></div></td></tr>



	<tr><td class="line left">&nbsp;</td>



		<td class="line right top">&nbsp;</td><td class="line left top">&nbsp;</td><td class="line right">&nbsp;</td></tr><tr>

			<td class="node-container" colspan="2"><table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr class="node-cells"><td class="node-cell"><div class="node" style="cursor: default;"><a href="tree.php?user=<?=$susername1?>" id="level-2"><img class="tree_icon" src="assets/<?=$scolor1?>.png" alt="<?=$susername1?>" id="userlink_<?=$susername1?>" onclick='tree.php?user=<?=$susername1?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$susername1?>' class='tooltip_div' style='background-color: white; '> <div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$susername1?></span></div>

				<div class='img_bg tree_common'></div>			

				<br clear='all' />            

				<div class='tooltip_details' style=' background-color: white;'>	

					<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

						<tr><td>Your Name : <?=strtoupper($susername1)?></td></tr>

						<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($susername1);?></td></tr>

						<tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($susername1);?></td></tr>

						<?php $tusers=0; $tpackage=0; $total_left=0; $total_right=0; $tleftpackage=0; $trightpackage=0; leftall($susername1); $total_left += $tusers;  $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($susername1); $total_right += $tusers; $trightpackage += $tpackage; ?>	

						<tr>

							<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

						</tr>

						<tr>

							<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

						</tr>

						<tr>

							<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

						</tr>

						<tr>

							<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

						</tr></table>			

					</div></div><div id='tree' class='orgChart'></div>"></a><br><div class="line down"></div>

					<div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$susername1?></div></div></td></tr><tr><td></div></td>

					</tr></tbody></table></td>



					<td class="node-container" colspan="2">





						<table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr class="node-cells"><td class="node-cell">



							<div class="node" style="cursor: default;"><a href="tree.php?user=<?=$susername2?>" id="level-2"><img class="tree_icon" src="assets/<?=$scolor2?>.png" alt="<?=$susername2?>" id="userlink_<?=$susername2?>" onclick='tree.php?user=<?=$susername2?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$susername2?>' class='tooltip_div' style='background-color: white; '> <div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$susername2?></span></div>

								<div class='img_bg tree_common'></div>			

								<br clear='all' />            

								<div class='tooltip_details' style=' background-color: white;'>	

									<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

										<tr><td>Your Name : <?=strtoupper($susername2)?></td></tr>

										<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($susername2);?></td></tr>

										<tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($susername2);?></td></tr> 

										<?php $tusers=0; $tpackage=0; $total_left=0; $total_right=0; $tleftpackage=0; $trightpackage=0; leftall($susername2); $total_left += $tusers; $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($susername2); $total_right += $tusers; $trightpackage += $tpackage; ?>	

										<tr>

											<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

										</tr>

										<tr>

											<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

										</tr>

										<tr>

											<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

										</tr>

										<tr>

											<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

										</tr></table>			

									</div></div><div id='tree' class='orgChart'></div>"></a><br><div class="line down"></div><div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$susername2?></div></div>



								</td></tr><tr><td></td></tr></tbody></table></td></tr></tbody></table>

							</td>



							<td class="node-container" colspan="2">

								<table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center"><tbody>

									<tr class="node-cells">

										<td class="node-cell" colspan="4"><div class="node" style="cursor: default;"><a href="tree.php?user=<?=$pusername2?>" id="level-1"><img class="tree_icon" src="assets/<?=$color2?>.png" alt="<?=$pusername2?>" id="userlink_<?=$pusername2?>" onclick='tree.php?user=<?=$pusername2?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$pusername2?>' class='tooltip_div' style='background-color: white; '> <div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$pusername2?></span></div>

											<div class='img_bg tree_common'></div>			

											<br clear='all' />            

											<div class='tooltip_details' style=' background-color: white;'>	

												<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

													<tr><td>Your Name : <?=strtoupper($pusername2)?></td></tr>

													<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($pusername2);?></td></tr> 

													<tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($pusername2);?></td></tr>

													<?php $tusers=0; $tpackage=0; $total_left=0; $total_right=0; $tleftpackage=0; $trightpackage=0; leftall($pusername2); $total_left += $tusers; $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($pusername2); $total_right += $tusers; $trightpackage += $tpackage; ?>	

													<tr>

														<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

													</tr>

													<tr>

														<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

													</tr>

													<tr>

														<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

													</tr>

													<tr>

														<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

													</tr></table>			

												</div></div><div id='tree' class='orgChart'></div>"></a><br><div class="line down"></div><div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$pusername2?></div></div></td>

											</tr>

											<tr><td colspan="4"><div class="line down"></div></td></tr>



											<tr><td class="line left">&nbsp;</td><td class="line right top">&nbsp;</td>

												<td class="line left top">&nbsp;</td><td class="line right">&nbsp;</td></tr>

												<tr>

													<td class="node-container" colspan="2">

														<table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr class="node-cells"><td class="node-cell"><div class="node" style="cursor: default;"><a href="tree.php?user=<?=$susername3?>" id="level-2"><img class="tree_icon" src="assets/<?=$scolor3?>.png" alt="<?=$susername3?>" id="userlink_<?=$susername3?>" onclick='tree.php?user=<?=$susername3?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$susername3?>' class='tooltip_div' style='background-color: white; '> <div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$susername3?></span></div>

															<div class='img_bg tree_common'></div>			

															<br clear='all' />            

															<div class='tooltip_details' style=' background-color: white;'>	

																<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

																	<tr><td>Your Name : <?=strtoupper($susername3)?></td></tr>

																	<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($susername3);?></td></tr>

																	<tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($susername3);?></td></tr> 

																	<?php 

																	$tusers=0; $tpackage=0; $total_left=0; $tleftpackage=0; $trightpackage=0; $total_right=0; leftall($susername3); $total_left += $tusers; $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($susername3); $total_right += $tusers; $trightpackage += $tpackage; ?>	

																	<tr>

																		<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

																	</tr>

																	<tr>

																		<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

																	</tr>

																	<tr>

																		<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

																	</tr>

																	<tr>

																		<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

																	</tr>

																</table>			

															</div></div><div id='tree' class='orgChart'></div>"></a><br><div class="line down"></div>

															<div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$susername3?></div></div>

														</td></tr><tr><td></td></tr></tbody></table>

													</td>

													<td class="node-container" colspan="2">

														<table id="tree_div" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr class="node-cells">

															<td class="node-cell"><div class="node" style="cursor: default;"><a href="tree.php?user=<?=$susername4?>" id="level-2"><img class="tree_icon" src="assets/<?=$scolor4?>.png" alt="<?=$susername4?>" id="userlink_<?=$susername4?>" onclick='tree.php?user=<?=$susername4?>' style=" background-color: white;border: 2px solid #454552 !important;" data-toggle="tooltip" data-html="true" data-trigger="hover" title="" data-placement="bottom" data-original-title="<div id='user_<?=$susername4?>' class='tooltip_div' style='background-color: white; '> <div class='img_bg tree_common'><img width='80px' height='80px' src='assets/nophoto.jpg' alt='nophoto.jpg' align='absmiddle'/><span class='span_username tooltip_username'><?=$susername4?></span></div>

																<div class='img_bg tree_common'></div>			

																<br clear='all' />            

																<div class='tooltip_details' style=' background-color: white;'>	

																	<table class='tooltip_table' style=' background-color: #fff; height:100px; '>

																		<tr><td>Your Name : <?=strtoupper($susername4)?></td></tr>

																		<tr><td><b style='margin-right: 10px;'>Join Date :</b><?php echo jdate($susername4);?></td></tr>

																		<tr><td><b style='margin-right: 10px;'>Active Date :</b><?php echo sdate($susername4);?></td></tr> 

																		<?php $tusers=0; $tpackage=0; $total_left=0; $total_right=0; $tleftpackage=0; $trightpackage=0; leftall($susername4); $total_left += $tusers; $tleftpackage +=$tpackage; $tusers=0; $tpackage=0; rightall($susername4); $total_right += $tusers; $trightpackage += $tpackage; ?>	

																		<tr>

																			<td><b style='margin-right: 10px;'>Left :</b><?=$total_left?></td>

																		</tr>

																		<tr>

																			<td><b style='margin-right: 10px;'>Right:</b><?=$total_right?></td>

																		</tr>

																		<tr>

																			<td><b style='margin-right: 10px;'>Left Business :</b> <?=$tleftpackage?></td>

																		</tr>

																		<tr>

																			<td><b style='margin-right: 10px;'> Right Business :</b><?=$trightpackage?></td>

																		</tr></table>			

																	</div></div><div id='tree' class='orgChart'></div>"></a><br>

																	<div class="line down"></div>

																	<div class="username" title=" " data-placement="bottom" style="background: #454552 !important;"><?=$susername4?></div>

																</div></td></tr>

																<tr><td></td></tr></tbody></table></td></tr></tbody></table></td></tr>





															</tbody></table></div></div></div>



														</div>

													</div>

												</div>

											</div>

											<!-- end: GENOLOGY TREE-->



											<div id="autowidthcss"></div>

											<div id="autowidthcssemp"></div>









										</div>

										<!-- end: PAGE CONTAINER -->

									</div>

									<!-- end : PAGE -->

								</div>

								<!-- end: MAIN CONTAINER -->











								<div class="footer clearfix">

									<div class="col-sm-2"></div>

									<div class="footer-inner">

										2018 © Dream Connect



									</div>

									<div class="footer-items">

										<span class="go-top"><i class="clip-chevron-up"></i></span>

									</div>

								</div>







<!--[if lt IE 9]>

<script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/respond.min.js"></script>

<script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/excanvas.min.js"></script>

<![endif]-->

<script> $( ".panel-refresh" ).click(function() {

	location.reload(true);

});

</script>

<script src="assets/jquery-ui-1.js"></script>

<script src="assets/bootstrap.js"></script>

<script src="assets/jquery_004.js"></script>

<script src="assets/jquery.js"></script>


<script src="assets/main.js"></script>







<script src="assets/jquery_005.js"></script>





<script src="assets/ajax-dynamic-list.js" type="text/javascript"></script>

<script src="assets/ajax.js" type="text/javascript"></script>

<script src="assets/validate_select_user.js" type="text/javascript"></script>

<script src="assets/easyTooltip.html" type="text/javascript"></script></body></html>