<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$username = $_SESSION['username'];
if($username == ''){
 echo  ' <meta http-equiv="refresh" content="0;url=../login.php">';
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
                                   Change Password
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
    <div class="col-sm-12">
        <div class="panel panel-default common-top">
            <div class="tabbable ">
                <ul id="myTab3" class="nav nav-tabs tab-green">
                    <li class=" active">
                        <a href="#panel_tab4_example1" data-toggle="tab">
                            <i class="blue fa fa-user"></i> Change  Password
                        </a>
                    </li>
                    <!--<li class="">
                        <a href="#panel_tab4_example2" data-toggle="tab">
                            <i class="blue fa fa-user"></i> Forgot Transaction Password
                        </a>
                    </li>-->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="panel_tab4_example1">
                        <div class="panel-body">
			<form action="update-password.php" role="form" class="smart-wizard form-horizontal" name="change_pass" id="change_pass" method="post" accept-charset="utf-8" novalidate="novalidate">

							<?php if(isset($_GET['errmsg'])){?>
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger ">
                                    <i class="fa fa-times-sign"></i> <?=$_GET['errmsg']?>
                                </div>
                            </div>
                        	<?php }?>
                            <div class="col-sm-3">
                                <label class="control-label" for="old_passcode">Current Password<font color="#ff0000">*</font> </label>
                                <div class="form-group">                           
                                    <input class="form-control" name="old_passcode" id="old_passcode" tabindex="1" maxlength="32" type="password">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" for="new_passcode">New Password<font color="#ff0000">*</font> </label>
                                <div class="form-group">                           
                                    <input class="form-control" name="new_passcode" id="new_passcode" tabindex="2" maxlength="32" type="password">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" for="re_new_passcode">Re-Enter New Password<font color="#ff0000">*</font> </label>
                                <div class="form-group">                           
                                    <input class="form-control" name="re_new_passcode" id="re_new_passcode" tabindex="3" maxlength="32" type="password">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">                           
                                    <button class="btn btn-bricky  change-pass-btn-user-new" type="submit" name="change" id="change" tabindex="4" style="margin-top: 2.4em;" value="change">Update</button>
                                </div>
                            </div>
                        
                            <input id="path_temp" name="path_temp" value="https://infinitemlmsoftware.com/backoffice/public_html/" type="hidden">
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane " id="panel_tab4_example2">                
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">       
                                    <form action="https://infinitemlmsoftware.com/backoffice/user/tran_pass/change_passcode" class="trans_pass_form" id="forgot_trans_password" name="forgot_trans_password" method="post" onload="onloadCaptcha();" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                                    
                                    <div class="col-md-12">
                                        <div class="errorHandler alert alert-danger no-display">
                                            <i class="fa fa-times-sign"></i> Please check the values you've submitted.
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <p style="color: blue">Note : We will send you confirmation mail please follow that instruction</p>

                                    </div>
                                    <div class="form-group col-sm-6 captcha-box">
                                        <span class="input-icon">
                                            <div class="imgcaptcha">

                                                <div class="col-md-5 col-my" style="padding:15px; text-align:left;">  
                                                    <img src="assets/admin.jpg" id="captcha"></div>
                                                <div class="col-md-7 col-my" style="padding:15px;">   <div class="Change-text">
                                                        <a href="#" onclick="
                                        document.getElementById('captcha').src = 'https://infinitemlmsoftware.com/backoffice/captcha/load_captcha/admin/' + Math.random();
                                        document.getElementById('captcha-form').focus();" id="change-image" class="color trueblue-a-pwd">Not readable? Change text.</a></div> 

                                                    <input class="form-control" style="width:100%;" name="captcha" id="captcha-form" autocomplete="off" tabindex="3" type="text">
                                                    <font color="red"></font></div>

                                            </div>
                                    </span></div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2">                           
                                            <button class="btn btn-bricky change-second-pass" type="submit" name="forgot_password_submit" id="forgot_password_submit" tabindex="4" value="Send Request" style="margin-top: 2.3em;">Send Request</button>
                                        </div>
                                    </div>

                                    </form></div></div>
                            
                            
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
	    border: 1px solid rgba(0,0,0,.125);
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
	.row.ribbon-wrapper.card{
	    margin: 0px;
	    width: 100%;
	    display: block;
	    overflow: hidden;
	}
</style>
<div class="row ribbon-wrapper card note">
	<div class="ribbon ribbon-info"><i class="fa fa-sticky-note-o"></i>Notes</div>
	<div class="ribbon-content"><p>Users can reset their forgotten transaction password by submitting this form.</p><p>Password reset link will be sent to specified Email address.</p></div>
</div>

                        </div>
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
<script src="assets/jquery_005.js"></script>
<script src="assets/jquery.js"></script>
<script src="assets/jquery_004.js"></script>
<script src="assets/perfect-scrollbar.js"></script>
<script src="assets/less-1.js"></script>
<script src="assets/jquery_003.js"></script>
<script src="assets/bootstrap-colorpalette.js"></script>
<script src="assets/bootstrap-switch.js"></script>
<script src="assets/main.js"></script>



<script src="assets/jquery_002.js"></script>


 
    
    <link rel="stylesheet" href="assets/jquery.css">
    <script src="assets/notificator.js"></script>
    <script src="assets/refresh.js"></script>
    


                                <script src="assets/ajax-dynamic-list.js" type="text/javascript"></script>
                                                        <script src="assets/ajax.js" type="text/javascript"></script>
                                            <script src="assets/validate_change_passcode.js" type="text/javascript"></script>
            
<script>
        jQuery(document).ready(function () {
            Main.init();
            ValidateUser.init();
        });
    </script>
    
    
</div><div id="notificator"></div><div id="z91cKtm-1529240836789" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; bottom: 0px !important; left: auto !important; position: fixed !important; border: 0px none !important; min-height: 0px !important; min-width: 0px !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: auto !important; z-index: 2000000000 !important; cursor: auto !important; float: none !important; display: block; right: 0px !important;" class=""><iframe id="Y6gamml-1529240836792" src="about:blank" scrolling="no" title="chat widget" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 320px !important; height: 369px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; display: none !important;" class="" frameborder="0"></iframe><iframe id="P7n4liC-1529240836794" src="about:blank" scrolling="no" title="chat widget" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; bottom: 0px !important; left: auto !important; position: fixed !important; border: 0px none !important; min-height: 40px !important; max-height: 40px !important; max-width: 200px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; width: 200px !important; height: 40px !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; min-width: 200px !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center 0px !important; right: 10px !important; display: block !important;" class="" frameborder="0"></iframe><iframe id="idmONwg-1529240836794" src="about:blank" scrolling="no" title="chat widget" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; bottom: 40px !important; position: fixed !important; border: 0px none !important; min-height: 37px !important; min-width: 200px !important; max-height: 37px !important; max-width: 200px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 200px !important; height: 37px !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; right: 10px !important; left: auto !important;" class="" frameborder="0"></iframe><div id="GcgOZkM-1529240836788" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: rgb(255, 255, 255) none repeat scroll 0% 0% !important; opacity: 0 !important; top: 1px !important; bottom: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: 45px !important; display: block !important; z-index: 999997 !important; cursor: move !important; float: none !important; left: 0px !important; right: 96px !important;" class=""></div><div id="SLp6CPC-1529240836789" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 96px !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important;" class=""></div><div id="gLq6A4V-1529240836789" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: e-resize !important; float: none !important;" class=""></div><div id="RFKAxgA-1529240836789" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important;" class=""></div><div id="BfLhj47-1529240836789" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: s-resize !important; float: none !important;" class=""></div><div id="IOepLO1-1529240836790" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important;" class=""></div><div id="HmeDgic-1529240836790" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: ne-resize !important; float: none !important;" class=""></div><div id="JlEEfSS-1529240836790" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: 0px !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: sw-resize !important; float: none !important;" class=""></div><div id="ms65IVy-1529240836790" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999999 !important; cursor: se-resize !important; float: none !important;" class=""></div><div style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important;" class=""></div></div><iframe src="about:blank" style="display: none !important;" title="chat widget logging"></iframe></body></html>