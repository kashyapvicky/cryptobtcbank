<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$username = $_SESSION['username'];
if($username == ''){
 echo  ' <meta http-equiv="refresh" content="0;url=index.php">';
}

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


$sql = "select id,name,email,bitcoin,jdate from `join` where `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($jid,$name,$email,$bitcoin,$jdate) = mysqli_fetch_row($result);


?>

<?php

if(isset($_GET['pid'])){


switch ($_GET['pid']) {
    // case 1:
    //     $pname = "Plan 1";
    //     $amount = 5000;
    //     break;
    // case 2:
    //     $pname = "Plan 2";
    //     $amount = 5000;
    //     break;
    // case 3:
    //     $pname = "Plan 3";
    //     $amount = 10000;
    //     break;
    // case 4:
    //     $pname = "Plan 4";
    //     $amount = 25000;
    //     break;
    // case 5:
    //     $pname = "Plan 5";
    //     $amount = 50000;
    //     break;
    // case 6:
    //     $pname = "Plan 6";
    //     $amount = 100000;
    //     break;
    default:
       $pname = "Gold";
       $amount = 5000;
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
                                    Cart
                                </a>
                            </li>
                                                                                                    <li>
                                
                            </li>
                        	

                        <!-- start: TIME -->
                        <li class="pull-right">		
                            <span class="date" style="padding: 0px 0px 0px 10px;">
                                <timestamp id="date">Sunday, June 17, 2018</timestamp> 
                            </span>
                            <div id="clock">6:37:24 PM</div>

                            
                        </li> 
                        <!-- end: TIME -->
                    </ol>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                    <!-- start: PAGE HEADER -->
                    <!-- <div class="page-header">
                        <h1>Transaction Password 
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
    <span id="error_msg1">You Must Enter Current Transaction Password</span>
    <span id="error_msg2">You Must Enter New Transaction Password</span>
    <span id="error_msg3">Transaction Password Length Should Be More Than 8</span>
    <span id="error_msg4">Re-Enter New Transaction Password</span>                     
    <span id="error_msg5">New Transaction Password Mismatch</span>        
    <span id="error_msg6">You Must Select Username</span>
</div>	
<div class="row">
    <div class="col-md-12"> 
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bullhorn"></i>
                Cart
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="fa fa-resize-full"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
			
            <div class="panel-body">	 
             <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-times-sign"></i> Please check the values you've submitted.
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-md-4"> 
                                        <img src="assets/product_icon.png" align="center" style="max-width: 100%;" />
                                        <!-- <input type="hidden" name="prod_img" id="prod_img" value="" />  -->
                </div>
                <div class="col-sm-7"> 
                    <b>
                      <h3><?=$pname?> by Eaglewealth</h3>
                      <p>
                        Rating:
                        <span style="color:goldenrod">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <span>
                      </p>
                      <p>
                         Price: &nbsp;
                        <span style="color:red"><?=$amount?> &#8377;</span>
                      <p>
                       Name: &nbsp;
                       <span><?=$pname?></span>
                      </p>
                      <p>
                        Package: &nbsp;
                        <?= $pname ?>+ Additional Benifits.
                      </p>
                    </b>
                    
                 
                </div>
            </div>
            <!-- </form> -->
        </div>
        </div>
			<div class="row">
            <div class="col-sm-6" style="margin:0;padding:0;">
                <div class="col-sm-12 sm-fifty">
                    <div class="panel panel-default">
                        <div class="panel-body no-padding" >
                            <div class="pull-left noteimg col-sm-2">
                                <img src="assets/1358439241_Draft.png" />
                            </div>

                            <div class="pull-left notetxt col-sm-10">
                                <p><font color="black">
                                	<b>
            <p> Account Name : Ascend plus info Solutions Private Limited</p>
            <p>Account Numuber : 35276118747</p> 
                                    <p>IFSC Code : SBIN0009023</p>
                                    <p>Bank Name : STATE BANK OF INDIA</p>
                                </b>
                                </p>
                            </div>                              
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6" style="margin:0;padding:0;">
                <div class="col-sm-12 sm-fifty">
                    <div class="panel panel-default">
                        <div class="panel-body no-padding">
                            <div class="pull-left noteimg col-sm-2">
                                <img src="assets/1358439696_lifesaver.png" />
                            </div>
                            <div class="pull-left notetxt col-sm-10">
                              <?php
                                 $sql = "select * from investment where mid='".$jid."' and status = 'active' or status ='pending';";
                                 //echo $sql; die;                                
                                 $result = mysqli_query($s_dbid,$sql);                                
                                 $nrows = mysqli_num_rows($result); 
                                 
                                 if($nrows<=0){
                                 
                                 ?>


								
                              <form action="payment-submit.php" role="form" class="smart-wizard form-horizontal" method="post"  name="request" id="request" accept-charset="utf-8" enctype="multipart/form-data">
                                   <input type="hidden" name="mid" value="<?=$jid?>"> 
                               	<input type="text"  style="width:50% " name="transaction_number" class="form-control" placeholder="Transaction Number">
                                <input type="hidden" name="product_name" value="<?=$pname?>">
                                <input type="hidden" name="amt_in_inr" value="<?=$amount?>">
                               	<br>
                               	<input type="file" size="" style="" name="slip">
                               	<br>
                               	<input type="submit"  value = "SUBMIT" name="submit" style="margin: 0;" class="btn btn-bricky cart-btn-wht-def"/> 
                                </form>        
                                <?php
                                 }
                                 
    
                                 else{
                                 
                                  echo "Currently your are not eligible for making new investment. This is either you have pending confirmation or you have already an active user.";
                                 
                                 }
                                                                 
                                 ?>

                            </div>

                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
		
		
		
		
</div>
<!-- end: PAGE CONTAINER -->
</div>
<!-- end : PAGE -->
</div>
<!-- end: MAIN CONTAINER -->


     
<?php
include 'includes/footer.php';

?>

	<script>
 function myfunction(val)
 {
 	var value = val;
 	//alert(value);
 	if(value == 2)
 	{
 		document.getElementById("btcdiv").style.display = "block";
 		document.getElementById("inrdiv").style.display = "none";
 	}
 	else
 	{
 		document.getElementById("inrdiv").style.display = "block";
 		document.getElementById("btcdiv").style.display = "none";
 	}
 }
</script>

    
</div></body></html>