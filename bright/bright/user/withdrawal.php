<?php session_start();
error_reporting(1);
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

                  $sql = "select `id` from `join` where `username` = '$username';";          
                   $result = mysqli_query($s_dbid,$sql);list($mid) = mysqli_fetch_row($result);$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' ";$result = mysqli_query($s_dbid,$sql);list($p_amt) = mysqli_fetch_row($result);$sql = "SELECT sum(`amount`) FROM withdraw WHERE `jid`='$mid';";
                         $result = mysqli_query($s_dbid,$sql);
                         list($w_amt) = @mysqli_fetch_row($result);
                         $e_amt = $p_amt;
                         $p_amt = $p_amt - $w_amt;
                         if($w_amt=="" || $w_amt<=0){ 
                          $w_amt = 0;
                           }
                      $sql = "SELECT sum(`amount`) FROM withdraw WHERE `jid`='$mid' and status ='pending';";
                      $result = mysqli_query($s_dbid,$sql);
                      list($pw_amt) = @mysqli_fetch_row($result);if($pw_amt=="" || $pw_amt<=0){  $pw_amt = 0;}?>


<?php include 'includes/header.php';?>
<!-- start: MAIN CONTAINER -->
<div class="main-container prh">
    <?php include 'includes/sidebar.php';?>
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
                            <a href="dashboard.php">Dashboard </a>
                        </li>
                        <li> <a href="#"> Request Payout Release </a>
                        </li>
                        <li>
                        </li>
                        <!-- start: TIME -->
                        <li class="pull-right">
                            <span class="date" style="padding: 0px 0px 0px 10px;">
                                <timestamp id="date">Sunday, June 17, 2018</timestamp>
                            </span>
                            <div id="clock">6:37:14 PM</div>
                        </li>
                        <!-- end: TIME -->
                    </ol>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                    <!-- start: PAGE HEADER -->
                    <!-- <div class="page-header">               <h1>Request Payout Release                                                          </h1>                                             </div> -->
                </div>
            </div>
            <!-- end: PAGE HEADER -->
            <script>
                jQuery(document).ready(function() {
                    jQuery("#close_link").click(function() {
                        jQuery("#message_box").fadeOut(1000);
                        jQuery("#message_box").removeClass('ok');
                    });
                });
            </script>
            <!--site header-->
            <div id="span_js_messages" style="display: none;">
                <span id="error_msg1">You must enter transaction password</span> <span id="error_msg2">Transaction password must be atleast 8 characters long</span> <span id="error_msg3">You must enter withdrawal amount</span> <span id="error_msg4">Withdrawal amount must be greater than 0</span> <span id="error_msg5">Payout amount must be an integer</span>
                <!--edited for cancel waiting withrawal--><span id="show_msg1">Are you sure? Do you want to cancel waiting withdrawal? There is no UNDO!</span>
                <!--edited for cancel waiting withrawal ends--><span id="show_msg2">Digits Only</span>
            </div>
            <style>
                .val-error {
                    color: rgba(249, 6, 6, 1);
                    opacity: 1;
                }
            </style>
            <div class="row common-top">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-external-link-square"></i>
                            <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> </div>
                            Request Payout Release
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-hover table-full-width table-bordered" id="">
                                        <!--edited for cancel waiting withrawal-->
                                        <!--edited for cancel waiting withrawal ends-->
                                        <thead class="table-bordered">
                                            <tr class="th">
                                                <th>#</th>
                                                <th>E-wallet Balance</th>
                                                <th>Waiting Withdrawal</th>
                                                <th>Total Paid Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td> &#8377; <?=$p_amt?>
                                                </td>
                                                <td>
                                                    &#8377; <?=$pw_amt?>
                                                        <!--edited for cancel waiting withrawal-->
                                                        <!--edited for cancel waiting withrawal ends-->
                                                </td>
                                                <td> &#8377; <?=$w_amt?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <h5><span style="font-weight: 600;">E-wallet Balance :</span>
                                        <?=$p_amt?>
                                    </h5>
                                    
                                </div>
                            </div>
                            <!-- </div>                     <div class="panel-body"> -->
                            <form action="submit-withdrawal.php" role="form" class="smart-wizard form-horizontal" method="post" name="payout_request" id="payout_request" accept-charset="utf-8" novalidate="novalidate">
                                <input name="mid" value="<?=$mid?>" type="hidden">
                                <div class="col-md-12">
                                    <div class="errorHandler alert alert-danger no-display"> <i class="fa fa-times-sign"></i> Please check the values you've submitted. </div>
                                </div>
                                <?php                        if(!empty($_GET['msg']))                                                                           {                                                                        ?>
                                <div class="col-md-12">
                                    <div class="errorHandler alert alert-danger"> <i class="fa fa-times-sign"></i>
                                        <?=@$_GET['msg']?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-sm-4" style="padding: 0px;">
                                    <label class="control-label" for="company">Please enter Withdrawal Amount</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" name="payout_amount" id="payout_amount" value="<?=$p_amt?>" autocomplete="Off" type="text" min="500" onBlur="check_amt()"> <input class="form-control" name="amount_final" id="amount_final" value="<?=$p_amt-$p_amt*10/100?>" placeholder="Amount after deduction.." type="text" readonly>
                                            <div>Amt after deduction!!</div>
                                        </div>
                                        <span id="errmsg1"></span>
                                    </div>
                                </div>
                                <!--<div class="col-sm-4">                        <label class="control-label" for="company">Transaction Password</label>                                                                        <div class="form-group">                                                                            <input class="form-control" name="transation_password" id="transation_password" value="" placeholder="Transaction" password="" autocomplete="Off" type="password">                                                                                                                                                    </div>                                                                        </div>-->
                                <?php  
                                date_default_timezone_set("Asia/Kolkata");
                                 $wdate = date("Y-m-d"); 
                                 $day = date('d', strtotime($wdate));
                                 if($day==10 || $day==20 || $day==30){
                                   ?>
                                <div class="col-sm-4">
                                    <div class="form-group"> <button class="btn btn-bricky payout-btn-release" name="payout_request_submit" style="  margin-top: 2.49em;" id="payout_request_submit" value="Send Request" <?php if($p_amt<=0 || $p_amt=="" ) { echo "Disabled"; }?>> Withdraw </button> </div>
                                    <?php                           }                                                                                 else{                                                                                  echo "Withdrawal is opened on 10th, 20th and 30th of every Month..";                                                                                 }                                                                                       ?>
                                </div>
                            </form>
                            <style type="text/css">
                                .card {
                                    position: relative;
                                    display: -ms-flexbox;
                                    display: flex;
                                    -ms-flex-direction: column;
                                    flex-direction: column;
                                    min-width: 0;
                                    word-wrap: break-word;
                                    background-color: #e4e4e4;
                                    background-clip: border-box;
                                    border: 1px solid rgba(0, 0, 0, .125);
                                    border-radius: .25rem;
                                }

                                .ribbon-wrapper {
                                    position: relative;
                                    padding: 36px 15px 15px 15px;
                                    margin-bottom: 2em;
                                    border-radius: 0px;
                                    box-shadow: none;
                                }

                                .ribbon-info {
                                    background: #398bf7;
                                }

                                .ribbon {
                                    padding: 0 20px;
                                    height: 30px;
                                    line-height: 30px;
                                    clear: left;
                                    position: absolute;
                                    top: 0px;
                                    left: 0px;
                                    color: #ffffff;
                                }

                                .ribbon-content {
                                    margin-top: 0px;
                                }

                                .ribbon i {
                                    margin-right: 3px;
                                }

                                .row.ribbon-wrapper.card {
                                    margin: 0px;
                                    width: 100%;
                                    display: block;
                                    overflow: hidden;
                                }
                            </style>
                            <div class="row ribbon-wrapper card note">
                                <div class="ribbon ribbon-info"><i class="fa fa-sticky-note-o"></i>Notes</div>
                                <div class="ribbon-content">Users can withdraw desired amount from their E-Wallet by entering the amount and transaction password. The amount will be credited to user's account after admin confirmation. <br> A deduction of 10% (5% TDS+5% Admin charge) will be applied on each Withdrawal. <br> Withdrawal can be made on  every of the week. </div>
                            </div>
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
</div><!-- end: MAIN CONTAINER -->
<div class="footer clearfix">
    <div class="col-sm-2"></div>
    <div class="footer-inner"> 2015 © Dream Stars </div>
    <div class="footer-items"> <span class="go-top"><i class="clip-chevron-up"></i></span> </div>
</div>
<!--[if lt IE 9]><script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/respond.min.js"></script><script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/excanvas.min.js"></script><![endif]-->
<script>
    $(".panel-refresh").click(function() {
        location.reload(true);
    });
</script>
<script src="assets/jquery-ui-1.js">
</script>
<script src="assets/bootstrap.js">
</script>
<script src="assets/jquery_005.js">
</script>
<script src="assets/jquery.js">
</script>
<script src="assets/jquery_004.js">
</script>
<script src="assets/perfect-scrollbar.js">
</script>
<script src="assets/less-1.js">
</script>
<script src="assets/jquery_003.js">
</script>
<script src="assets/bootstrap-colorpalette.js">
</script>
<script src="assets/bootstrap-switch.js">
</script>
<script src="assets/main.js">
</script>
<script src="assets/jquery_002.js">
</script>
<link rel="stylesheet" href="assets/jquery.css">
<script src="assets/notificator.js">
</script>
<script src="assets/refresh.js">
</script>
<script src="assets/validate_payout_release.js" type="text/javascript">
</script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateUser.init();
        ValidatePayoutRelease.init();
    });

    function check_amt() {
        var amt = document.getElementById("payout_amount").value;
        var pamt = <?=$p_amt?>;
        if (amt > pamt) {
            alert("Invalid Amount!!");
            document.getElementById("payout_amount").value = <?=$p_amt?>;
        } else {
            document.getElementById("amount_final").value = document.getElementById("payout_amount").value - (document.getElementById("payout_amount").value / 100) * 10;
            document.getElementById("transation_password").focus();
        }
    }
</script>
</body>

</html>