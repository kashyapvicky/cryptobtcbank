<?php   session_start();    
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
             $sql = "select `id`,`name`,`sponsor`,`dreferal`,`position`,`package`,`email`,`phone` from `join` where `username` = '$username';";                  
               $result = mysqli_query($s_dbid,$sql);       
                 list($jid,$name,$sponsor,$dreferal,$pos,$package,$email,$phone) = mysqli_fetch_row($result);       
                   $mid = $jid;      
                      $tdate = date("Y-m-d");       
                        $sql = "select `amount` from `investment` where mid = '$jid'";        
                         $result = mysqli_query($s_dbid,$sql);       
                           list($package) = mysqli_fetch_row($result);                  ?>

    <?php   include 'includes/header.php';                  ?>
        <!-- start: MAIN CONTAINER -->
        <div class="main-container prh">
            <?php      include 'includes/sidebar.php';                                    ?>
                <!-- start: PAGE -->
                <div class="main-content">
                    <div class="container" style="min-height: 900px;">
                        <!-- start: PAGE HEADER -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- start: PAGE TITLE & BREADCRUMB -->
                                <ol class="breadcrumb">
                                    <li> <i class="clip-pencil"></i> <a href="dashboard.php">                      Dashboard                     </a> </li>
                                    <li> <a href="#">                     Profile View                     </a> </li>
                                    <li> </li>
                                    <!-- start: TIME -->
                                    <li class="pull-right">
                                        <span class="date" style="padding: 0px 0px 0px 10px;">
                        <timestamp id="date">Sunday, June 17, 2018</timestamp>
                     </span>
                                        <div id="clock">6:38:32 PM</div>
                                    </li>
                                    <!-- end: TIME -->
                                </ol>
                                <!-- end: PAGE TITLE & BREADCRUMB -->
                                <!-- start: PAGE HEADER -->
                                <!-- <div class="page-header">                  <h1>Profile View                                                                   </h1>                                                      </div> -->
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
                        <style type="text/css">
                            .lead {
                                margin-bottom: 5px;
                                margin-left: 20px;
                            }
                            
                            .form-horizontal .form-control-static {
                                padding-top: 0px;
                            }
                            
                            .lab-clr {
                                color: #16aad8;
                            }
                            
                            .file-top {
                                padding-top: 1em;
                                margin-top: 4em;
                            }
                            
                            .btn {
                                display: inline-block;
                                padding: 5px 12px;
                            }
                            
                            #profile_image_div {
                                position: relative;
                            }
                            
                            #upload_profile_image img {
                                width: 130px;
                                max-width: 130px;
                                max-height: 130px;
                            }
                            
                            #upload_profile_image .fileupload .thumbnail {
                                margin-top: 4px;
                                margin-bottom: 0px;
                                padding: 0px;
                            }
                            
                            #profile_image .file-top {
                                padding-top: 0px;
                                margin-top: 0px;
                            }
                            
                            #user_image .fileupload-new.thumbnail {
                                margin-left: 53px;
                            }
                            
                            @media (max-width: 687px) {
                                #updated_image {
                                    margin-left: initial !important;
                                }
                            }
                        </style>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default common-top">
                                    <div class="panel-heading">
                                        <i class="fa fa-external-link-square"></i>
                                        <?=$username?>'s Profile
                                            <div class="panel-tools">
                                                <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                                                <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a>
                                                <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a>
                                            </div>
                                    </div>
                                    <div class="panel-body">
                                        <form action="update-profile.php" role="form" class="form-horizontal" name="edit_user_profile" id="edit_user_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                                            <input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">
                                            <input value="18" name="age_limit" id="age_limit" type="hidden">
                                            <input name="current_update_section" id="current_update_section" value="" type="hidden">
                                            <div class="row" style="">
                                                <div class="col-sm-5 text-center" id="profile_image_div">
                                                    <div id="profile_image">
                                                        <div class="fileupload fileupload-new file-top" data-provides="fileupload">
                                                            <div class="user-image" id="user_image">
                                                                <div class="fileupload-new thumbnail"><img id="updated_image" src="assets/nophoto.jpg" alt="Profile Picture" style="max-height:200px;" width="130">
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                <div class="user-image-buttons"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- SPONSOR & PACKAGE INFO -->
                                                <div class="col-sm-7" style="padding: 0 50px;" id="">
                                                    <p class="lead">Sponsor And Package Information</p>
                                                    <hr class="hr-profile">
                                                    <div class="col-sm-8">
                                                        <table class="table table-responsive profile-user-table-1">
                                                            <tbody>
                                                                <tr style="text-align: left">
                                                                    <td>Name</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?=$name?>
                                                                    </td>
                                                                </tr>
                                                                <tr style="text-align: left">
                                                                    <td>Username</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?=$username?>
                                                                    </td>
                                                                </tr>
                                                                <tr style="text-align: left">
                                                                    <td>Sponsor Name</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?=$sponsor?>
                                                                    </td>
                                                                </tr>
                                                                <tr style="text-align: left">
                                                                    <td>Refer By</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?=$dreferal?>
                                                                    </td>
                                                                </tr>
                                                                <tr style="text-align: left">
                                                                    <td>Position</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?=$pos?>
                                                                    </td>
                                                                </tr>
                                                                <tr style="text-align: left">
                                                                    <td>Package &#8377;</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?=$package?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="">
                                                <!-- BANK INFO -->
                                                <!-- PAYMENT DETAILS -->
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="tabbable" style="background: white;">
                                                        <ul class="nav nav-tabs tab-green">

                                                            <li class="tab-pane active" id="tab2">
                                                                <a href="#contact_info" data-toggle="tab">Contact Information</a>
                                                            </li>
                                                            <!-- BANK INFO -->
                                                            <li class="tab-pane" id="tab4">
                                                                <a href="#bank_info" data-toggle="tab">Bank Information</a>
                                                            </li>
                                                            <!-- 
                                       <li class="tab-pane" id="tab4">                                        
                                      <a href="#otp_feed" data-toggle="tab">OTP</a>                                    
                                    </li> -->

                                                        </ul>
                                                        <div class="tab-content">
                                                            <!-- CONTACT INFO -->
                                                            <div class="tab-pane active" id="contact_info">
                                                                <div style="" id="contact_info_div">
                                                                    <div class="panel panel-default">
                                                                        <i class="fa fa-edit" id="edit_contact_info" data-toggle="tooltip" title="Edit" style="font-size: 20px; color: rgb(213, 65, 52); float: right; "></i>
                                                                        <!-- <button class="btn btn-bricky" type="button" id="edit_contact_info"><i class="fa fa-edit"></i>&nbsp;Edit</button> -->
                                                                        <div class="panel-body">
                                                                            <div class="form form-horizontal" style="margin-top: 10px;padding: 0 20px;">
                                                                                <div class="col-sm-4 pro">
                                                                                    <div class="">
                                                                                        <label class="control-label required">
                                                                                            <span class="lab-clr">Name</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <p class="form-control-static">
                                                                                            <?=$name?>
                                                                                        </p>
                                                                                        <input name="name" id="name" value="<?=$name?>" class="form-control" style="display: block;" type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 pro">
                                                                                    <div class="">
                                                                                        <label class="control-label required">
                                                                                            <span class="lab-clr">E-mail</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <p class="form-control-static">
                                                                                            <?=$email?>
                                                                                        </p>
                                                                                        <input name="email" id="email" value="<?=$email?>" class="form-control" style="display: block;" type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-4 pro">
                                                                                    <div class="">
                                                                                        <label class="control-label required"> <span class="lab-clr">Mobile No</span> </label>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <p class="form-control-static">
                                                                                            <?=$phone?>
                                                                                        </p>
                                                                                        <input name="mobile" id="mobile" value="<?=$phone?>" class="form-control" style="display: block;" type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group btn-right"> <a href="#otp_feed" data-toggle="tab" id="update_contact_info" class="btn btn-bricky pin_gen" style="display: inline-block;">Next&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                                                                                        <button type="button" id="cancel_contact_info" class="btn btn-teal prof-cancel-btn" style="display: inline-block;">Cancel&nbsp;<i class="fa fa-reply"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- SOCIAL PROFILES -->
                                                            <!-- BANK INFO -->
                                                            <?php                                       $query = "select id from `join` where `username` = '$username'";                                                                                                                     $resultb = mysqli_query($s_dbid, $query);                                                                                                                     list($jid) = mysqli_fetch_row($resultb);                                                                                                                     $query = "SELECT *  FROM `bank` WHERE `jid` = '$jid'";                                                                                                                     $resultb = mysqli_query($s_dbid, $query);                                                                                                                     list($bid,$bank_name,$branch_name,$account_no,$acctype,$aname,$jid,$ifsc,$pan) = mysqli_fetch_row($resultb);                                                                                                                     ?>
                                                                <div class="tab-pane" id="bank_info">
                                                                    <div class="" style="" id="bank_info_div">
                                                                        <div class="panel panel-default">
                                                                            <i class="fa fa-edit" id="edit_bank_info" data-toggle="tooltip" title="Edit" style="font-size:20px;color:#d54134;float:right;"></i>
                                                                            <div class="panel-body">
                                                                                <div class="form form-horizontal" style="margin-top: 10px;padding: 0 20px;">
                                                                                    <div class="col-sm-4 pro">
                                                                                        <div class="">
                                                                                            <label class="control-label">
                                                                                                Bank Name
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="form-control-static">
                                                                                                <?=$bank_name?>

                                                                                            </p>
                                                                                            <input name="bank_name" id="bank_name" value="<?=$bank_name?>" class="form-control" style="display: none;" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 pro">
                                                                                        <div class="">
                                                                                            <label class="control-label">
                                                                                                Branch Name </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="form-control-static">
                                                                                                <?=$branch_name?>
                                                                                            </p>
                                                                                            <input name="branch_name" id="branch_name" value="<?=$branch_name?>" class="form-control" style="display: none;" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 pro">
                                                                                        <div class="">
                                                                                            <label class="control-label">
                                                                                                Account Holder
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="form-control-static">
                                                                                                <?=$aname?>
                                                                                            </p>
                                                                                            <input name="account_holder" id="account_holder" value="<?=$aname?>" class="form-control" style="display: none;" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 pro">
                                                                                        <div class="">
                                                                                            <label class="control-label"> Account Number </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="form-control-static">
                                                                                                <?=$account_no?>
                                                                                            </p>
                                                                                            <input name="account_no" id="account_no" value="<?=$account_no?>" class="form-control" style="display: none;" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 pro">
                                                                                        <div class="">
                                                                                            <label class="control-label"> IFSC Code </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="form-control-static">
                                                                                                <?=$ifsc?>
                                                                                            </p>
                                                                                            <input name="ifsc" id="ifsc" value="<?=$ifsc?>" class="form-control" style="display: none;" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4 pro">
                                                                                        <div class="">
                                                                                            <label class="control-label"> PAN Number </label>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <p class="form-control-static">
                                                                                                <?=$pan?>
                                                                                            </p>
                                                                                            <input name="pan" id="pan" value="<?=$pan?>" class="form-control" style="display: none;" type="text">
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- <div class="col-sm-4 pro" >                                                      <div class="">                                                                                                                                                                  </div>                                                                                                                                                                                                                                                                                                                                    </div> -->
                                                                                    <div class="form-group btn-right" style="padding-left: 15px;">
                                                                                        <a href="#otp_feed" data-toggle="tab" id="update_bank_info" class="btn btn-bricky pin_gen" style="display: none;">Next&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                                                                                        <button type="button" id="cancel_bank_info" class="btn btn-teal prof-cancel-btn" style="display: none;">Cancel&nbsp;<i class="fa fa-reply"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- PAYMENT DETAILS -->
                                                                <div class="tab-pane" id="otp_feed">
                                                                    <div style="" id="">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-body">
                                                                                <div class="form form-horizontal" style="margin-top: 10px;padding: 0 20px;">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4 col-sm-offset-4 pro">
                                                                                            <div class="">
                                                                                                <label class="control-label required">
                                                                                                    <span class="lab-clr">OTP</span>
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <p class="form-control-static">
                                                                                                    
                                                                                                </p>
                                                                                                <input name="otp_user" id="mobile" value="" class="form-control" style="display: block;" type="text" placeholder="Enter OTP Here">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 text-right">
                                                                                        <div class="form-group">
                                                                                            <button type="submit" id="ii" class="btn btn-bricky" style="display: inline-block;">Update&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                                                                            <button type="button" id="cancel_contact_info" class="btn btn-teal prof-cancel-btn" style="display: inline-block;">Cancel&nbsp;<i class="fa fa-reply"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="alert_div" style="display: none;">
                            <div class="alert alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> </div>
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
            <div class="footer-inner"> 2018 © Dream Connect </div>
            <div class="footer-items"> <span class="go-top"><i class="clip-chevron-up"></i></span> </div>
        </div>
        <!--[if lt IE 9]><script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/respond.min.js"></script><script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/excanvas.min.js"></script><![endif]-->
        <script>
            $(".panel-refresh").click(function() {
                location.reload(true);
            });
        </script>
        <script src="assets/jquery-ui-1.js"></script>
        <script src="assets/bootstrap.js"></script>
        <script src="assets/jquery_004.js"></script>
        <script src="assets/jquery.js"></script>
        <script src="assets/jquery_002.js"></script>
        <script src="assets/main.js"></script>
        <script src="assets/jquery_005.js"></script>
        <script src="assets/profile_update.js" type="text/javascript"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php if (isset($_SESSION['msg'])){ ?>
        <?php if ($_SESSION['msg'] == "successfull"){ ?>
            
                <script>
                swal("Good job!", "successfully Updated!", "success");
                </script>

             <?php } else{?>
                <script>
                swal("Error!", "Try Again!", "error");
                </script>
             <?php } ?>
             <?php } ?>

             <?php unset($_SESSION["msg"]); ?>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                ValidateSearchMember.init();
            });
        </script>

        <script type="text/javascript">
            $(".pin_gen").click(function() {

                var data = {
                    request_otp: true,
                    remark: "update-profile"
                };
                var Jdata = JSON.stringify(data);

                $.ajax({
                    type: "POST",
                    url: "https://www.dreamstars.in/user/otp_handler.php",
                    data: Jdata,
                    success: function(res) {
                        // var obj = JSON.parse(res); 
                        console.log(res);
                    }
                });
            });
        </script>

        </body>

        </html>