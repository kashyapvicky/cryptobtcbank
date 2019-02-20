<!DOCTYPE html>

<html class="no-js" lang="en"><!-- start: HEAD --><!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]--><!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]--><head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <title>Bright Right | Login</title>

        <!-- start: META -->

        <meta charset="utf-8">

        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <meta content="" name="description">

        <meta content="" name="author">

        <!-- end: META -->    

        <!-- <script src="https://infinitemlmsoftware.com/backoffice/public_html/javascript/jquery-1.8.2.min.js"></script> -->

        <script src="index_files/jquery-1.js"></script>

        

        <!-- start: MAIN CSS -->

        <link rel="stylesheet" href="index_files/bootstrap.css" media="screen">

        <link rel="stylesheet" href="index_files/font-awesome.css">

        <link rel="stylesheet" href="index_files/style.css">

        <link rel="stylesheet" href="index_files/main.css">

        <link rel="stylesheet" href="index_files/main-responsive.css">

        <link rel="stylesheet" href="index_files/all.css">

        <link rel="stylesheet/less" type="text/css" href="https://infinitemlmsoftware.com/backoffice/public_html/css/styles.less">

       <link rel="stylesheet" href="index_files/theme_light.css" type="text/css" id="skin_color">         

    </head>

    <body class="login example2">

        <input name="base_url" id="base_url" value="https://infinitemlmsoftware.com/backoffice/" type="hidden">

        <input name="img_src_path" id="img_src_path" value="https://infinitemlmsoftware.com/backoffice/public_html/" type="hidden">

        <input name="current_url" id="current_url" value="login/index" type="hidden">

        <input name="current_url_full" id="current_url_full" value="login/index" type="hidden">

        <input name="DEFAULT_CURRENCY_VALUE" id="DEFAULT_CURRENCY_VALUE" value="1" type="hidden">

        <input name="DEFAULT_CURRENCY_CODE" id="DEFAULT_CURRENCY_CODE" value="USD" type="hidden">

        <input name="DEFAULT_SYMBOL_LEFT" id="DEFAULT_SYMBOL_LEFT" value="$" type="hidden">

        <input name="DEFAULT_SYMBOL_RIGHT" id="DEFAULT_SYMBOL_RIGHT" value="" type="hidden">

        <!--inactiviy logout setting-->

                <!--end-->

        

        

<style type="text/css">

    .imgcaptcha{

        width: 100%;

        margin: 0 auto;

    }

    .font16{

        font-size: 16px !important;

    }

    .imgcaptcha div, .imgcaptcha div{

        text-align: center;

    }

    body{

        background-color: #fff !important;

    }

</style>



<script type="text/javascript">

    function getSwitchLanguage(lang) {

        var url = "";

        var base_url = $("#base_url").val();

        var current_url = $("#current_url").val();

        var current_url_full = $("#current_url_full").val();



        if (current_url != current_url_full) {

            url = current_url_full;

        } else {

            url = current_url;

        }

        var redirect_url = base_url;



        redirect_url = base_url + lang + "/" + url;



        document.location.href = redirect_url;

    }

</script>

<div id="span_js_messages" style="display:none;">

    <span id="error_msg1">Please enter username</span>

    <span id="error_msg2">Please enter password</span>

    <span id="error_msg3">Please enter captcha</span>

</div>



<div class="main-login col-sm-4 col-sm-offset-4">



    <div class="logo">

        <img src="../images/99.png">

    </div>

    <!-- start: LOGIN BOX -->

    <div class="box-login">

        <p>

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



        </p>



        <div id="profileTabList" class="tabs"></div>



        



        <div id="profileTabData" class="both">

            <div id="admin" class="tab_content" style="display: block;">

                <section>

                    <table width="100%" cellspacing="0" cellpadding="0">

                        <tbody><tr>

                            <td>

                        <left>

                            <h3>

                                Login Form

                            </h3>

                        </left>

                        </td>

                        <td>

                        <right>

                            <img class="secure_login_icon" src="index_files/1358434827_gnome-keyring-manager.png" width="50">

                        </right>

                        </td>

                        </tr>

                    </tbody></table>

           <form action="login.php" class="form-login" id="login_form_admin" name="login_form_admin" method="post" accept-charset="utf-8" novalidate="novalidate" >



					<?php if(@$_GET['msg']!=""){ ?>

                    <div class="errorHandler alert alert-danger ">

                        <i class="fa fa-remove-sign"></i><?=@$_GET['msg']?>

                    </div>

					<?php }?>

                    <fieldset>

                        <div class="form-group">

                            <span class="input-icon">

                                <input tabindex="1" name="username" id="username" autocomplete="Off" size="32" maxlength="128" placeholder="Username" class="form-control" type="text" border="0">

                                <i class="fa fa-user"></i> </span>

                        </div>

                        <div class="form-group form-actions">

                            <span class="input-icon">

                                <input tabindex="2" name="password" id="password" size="32" maxlength="32" placeholder="Password" class="form-control password" value="" autocomplete="off" type="password"><br>

                                                                <i class="fa fa-lock"></i>

                            </span>

                        </div>

                        <div class="form-actions">

                            <input name="flag" id="flag" value="" type="hidden">

                            <input tabindex="3" id="admin_login" name="admin_login" value="Login" class="btn btn-bricky pull-center" style="float: left" type="submit"><span id="loginmsg" style="display:none"></span>

                        </div>

                        <div class="new-account">

                            Don't have an account? 

                            <a href="../signup.php" class="register">

                                Signup now

                            </a>

                            <a href="javascript:void(0)" class="backtowebsite" id="showForgotpass">

                                Forgot Password			

                            </a>

                        </div>

                    </fieldset>

                    </form>





                    <form action="../send-password.php" class="form-login" id="forgotForm" name="login_form_admin" method="post" accept-charset="utf-8" novalidate="novalidate" style="display:none">

                    <fieldset>

                        <div class="form-group">

                            <span class="input-icon">

                                <input tabindex="1" required name="requireusername" autocomplete="Off" size="32" maxlength="128" placeholder="Enter Your Username" class="form-control" type="text" border="0">

                                <i class="fa fa-user"></i> </span>

                        </div>

                        <div class="form-actions">

                            <input name="flag" id="flag" value="" type="hidden">

                            <input tabindex="3" id="admin_login" name="admin_login" value="Submit" class="btn btn-bricky pull-center" style="float: left" type="submit">

                        </div>

                        <div class="new-account">

                            Don't have an account? 

                            <a href="../signup.php" class="register">

                                Signup now

                            </a>

                            <a href="javascript:void(0)" class="backtowebsite" id="showLogin">

                                SignIn     

                            </a>

                        </div>

                    </fieldset>

                    </form>

                </section>

            </div>

            

        </div>

    </div>

        <div class="" style=" text-align: center; float: none; margin-top: 10px; ">

           <a href="../" class="backtowebsite">

                                Back to website     

                            </a>

        2018 © Dream Stars

    </div>

</div>













<!--[if lt IE 9]>

<script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/respond.min.js"></script>

<script src="https://infinitemlmsoftware.com/backoffice/public_html/plugins/excanvas.min.js"></script>

<![endif]-->

<script src="index_files/jquery-ui-1.js"></script>

<script src="index_files/bootstrap.js"></script>

<script src="index_files/jquery_006.js"></script>

<script src="index_files/jquery.js"></script>

<script src="index_files/jquery_005.js"></script>

<script src="index_files/perfect-scrollbar.js"></script>

<script src="index_files/less-1.js"></script>

<script src="index_files/jquery_003.js"></script>

<script src="index_files/bootstrap-colorpalette.js"></script>

<script src="index_files/main.js"></script>







<script src="index_files/jquery_002.js"></script>

<script src="index_files/jquery_007.js"></script>







    

<link href="index_files/tabs.css" rel="stylesheet" type="text/css">





<script src="index_files/cookie-based-jquery-tabs.js" type="text/javascript"></script>





<script src="index_files/jquery_004.js" type="text/javascript"></script>





<script src="index_files/validate_login.js" type="text/javascript"></script>

    





<script>

    jQuery(document).ready(function () {

        Main.init();

        ValidateLogin.init();

        ValidateUserLogin.init();

        $(function () {

            $('#username').keydown(function (e) {

                if (e.keyCode == 32) // 32 is the ASCII value for a space

                    e.preventDefault();

            });

        });

        

        $(function () {

            $('#password').keydown(function (e) {

                if (e.keyCode == 32) // 32 is the ASCII value for a space

                    e.preventDefault();

            });

        });

        

        

    });

</script>







<script type="text/javascript">

  $("#showForgotpass").click(function(){

      $("#login_form_admin").hide();

      $("#forgotForm").show();

  })



  $("#showLogin").click(function(){

      $("#login_form_admin").show();

      $("#forgotForm").hide();

  })



</script>





<script>

    function restrictSpace(e) {

    if (e.keyCode == 32) // 32 is the ASCII value for a space

    e.preventDefault();

    }

</script>







</body></html>