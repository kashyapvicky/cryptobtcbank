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
$sql = "select `id` from `join` where `username` = '$username';";						
$result = mysqli_query($s_dbid,$sql);
list($mid) = mysqli_fetch_row($result);

$tdate = date("Y-m-d");
$sql = "select status from `daily_task` where mid = '$mid' and tdate='$tdate'";
$result = mysqli_query($s_dbid,$sql);

?>
<!DOCTYPE html>
<html class="no-js" style="height: auto; min-height: 100%;" lang="en"><!-- start: HEAD --><!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]--><!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Dream Connect | Promotional Tools</title>
        <!-- start: META -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- end: META --> 
        <link rel="shortcut icon" type="image/png" href="https://infinitemlmsoftware.com/backoffice/public_html/images/logos/favicon.ico">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script async="" src="assets/analytics.js"></script><script src="assets/jquery-1.js"></script>
        <script src="assets/jquery-migrate-1.js"></script>

        <!-- start: MAIN CSS -->
        <link href="assets/bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/font-awesome.css">
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/main.css">
        <link rel="stylesheet" href="assets/main-responsive.css">
        <link rel="stylesheet" href="assets/bootstrap-colorpalette.css">
        <link rel="stylesheet" href="assets/perfect-scrollbar.css">
        <link rel="stylesheet/less" type="text/css" href="https://infinitemlmsoftware.com/backoffice/public_html/css/styles.less"><style type="text/css" id="less:backoffice-public_html-css-styles">/* colors */
body,
.main-container,
.footer,
.main-navigation,
ul.main-navigation-menu > li > ul.sub-menu,
.navigation-small ul.main-navigation-menu > li > ul.sub-menu {
  background-color: #f5f5f5;
}
.layout-boxed header,
.layout-boxed .main-container,
.layout-boxed .footer {
  border-left-color: #d9d9d9;
  border-right-color: #d9d9d9;
}
.navbar-inverse {
  background: rgba(255, 255, 255, 0.9);
  border-color: #d9d9d9;
}
/* ie8 fixes */
.ie8 .navbar-inverse {
  background: #ffffff;
}
/**/
.navbar-inverse .navbar-brand,
.navbar-inverse .navbar-brand:hover,
.navbar-inverse .nav > li > a {
  color: #595959;
}
.navbar-inverse .navbar-brand i,
.navbar-inverse .navbar-brand:hover i {
  color: #007aff;
}
.navbar-inverse .nav > li > a {
  color: #a2a2a2;
}
.navbar-inverse .nav > li.current-user > a {
  color: #7b7b7b;
}
.navbar-inverse .nav > li.current-user > a i {
  display: inline-block;
  text-align: center;
  width: 1.25em;
  color: #007aff !important;
  font-size: 12px;
}
.navbar-inverse .nav > li:hover > a,
.navbar-inverse .nav > li:active > a {
  color: #555555;
  background: #e6e6e6;
}
.navbar-inverse .nav li.dropdown.open > .dropdown-toggle,
.navbar-inverse .nav li.dropdown.active > .dropdown-toggle,
.navbar-inverse .nav li.dropdown.open.active > .dropdown-toggle {
  background: #e6e6e6;
  color: #555555;
}
.navbar-tools .dropdown-menu li .dropdown-menu-title {
  background: #e6e6e6;
  color: #000000;
}
.navbar-inverse .btn-navbar {
  background-color: #d4d4d4;
  background: -moz-linear-gradient(top, #34485e 0%, #283b52 100%);
  /* firefox */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #34485e), color-stop(100%, #283b52));
  /* webkit */
}
.nav > li.dropdown .dropdown-toggle .badge {
  background-color: #007aff;
  color: #ffffff;
  border: none;
}
.navbar-toggle {
  background-color: #ffffff;
}
.navbar-inverse .navbar-toggle:hover,
.navbar-inverse .navbar-toggle:focus {
  background-color: #d4d4d4;
  -moz-box-shadow: 0 0 15px #fff;
  -webkit-box-shadow: 0 0 15px #fff;
  box-shadow: 0px 0px 15px #fff;
}
.navbar-toggle span {
  color: #a2a2a2;
}
ul.main-navigation-menu > li a {
  border-bottom: none;
  border-top-color: #d9d9d9;
  color: #555555;
}
ul.main-navigation-menu > li a > i {
  color: #007aff;
  font-weight: normal;
}
ul.main-navigation-menu > li.active > a {
  background: #007aff !important;
  border-top: none !important;
  color: #ffffff;
}
ul.main-navigation-menu > li.active > a .selected:before {
  color: #007aff !important;
}
ul.main-navigation-menu > li.active > a i {
  color: #ffffff;
}
ul.main-navigation-menu > li.open > a,
ul.main-navigation-menu > li > a:hover,
ul.main-navigation-menu > li:hover > a {
  background-color: #e6e6e6;
}
.navigation-toggler,
.go-top {
  background-color: #e6e6e6 !important;
  color: rgba(85, 85, 85, 0.3);
}
.navigation-toggler:hover i:first-child,
.go-top:hover {
  color: #555555;
}
.navigation-toggler:hover i:last-child {
  color: rgba(85, 85, 85, 0.3);
}
.navigation-small .navigation-toggler:hover i:first-child {
  color: rgba(85, 85, 85, 0.3);
}
.navigation-small .navigation-toggler:hover i:last-child {
  color: #555555;
}
ul.main-navigation-menu li > ul.sub-menu > li.open > a,
ul.main-navigation-menu li > ul.sub-menu > li.active > a,
ul.main-navigation-menu li > ul.sub-menu > li > a:hover {
  /*  color: contrast(darken(@base, 10%)) !important;
  background: darken(@base, 10%);*/
  color: #fff !important;
  background: #242d37;
}
.breadcrumb i {
  color: rgba(0, 122, 255, 0.4);
}
.breadcrumb a {
  color: #007aff;
}
.footer-fixed .footer {
  background: rgba(255, 255, 255, 0.9);
  border-top-color: #d9d9d9;
}
/* ie8 fixes */
.ie8 .footer-fixed .footer {
  background: #ffffff;
}
/**/
.footer-inner {
  color: #555555;
}
.main-content .container {
  border-left: 1px solid #d9d9d9;
  border-bottom: 1px solid #d9d9d9;
}
@media (max-width: 767px) {
  .navbar-inverse {
    background: none !important;
  }
  .navbar-tools {
    background: rgba(255, 255, 255, 0.9);
    border-top-color: #d9d9d9;
  }
  /* ie8 fixes */
  .ie8 .navbar-tools {
    background: #ffffff;
  }
  /**/
  .navbar-header {
    background-color: #ffffff;
  }
}
</style>
        <link rel="stylesheet" href="assets/theme_light.css" type="text/css" id="skin_color">
        <link rel="stylesheet/less" type="text/css" href="https://infinitemlmsoftware.com/backoffice/public_html/css/animations.css"><style type="text/css" id="less:backoffice-public_html-css-animations">.slideDown {
  animation-name: slideDown;
  -webkit-animation-name: slideDown;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  animation-timing-function: ease;
  -webkit-animation-timing-function: ease;
  visibility: visible !important;
}
@keyframes slideDown {
  0% {
    transform: translateY(-100%);
  }
  50% {
    transform: translateY(8%);
  }
  65% {
    transform: translateY(-4%);
  }
  80% {
    transform: translateY(4%);
  }
  95% {
    transform: translateY(-2%);
  }
  100% {
    transform: translateY(0%);
  }
}
@-webkit-keyframes slideDown {
  0% {
    -webkit-transform: translateY(-100%);
  }
  50% {
    -webkit-transform: translateY(8%);
  }
  65% {
    -webkit-transform: translateY(-4%);
  }
  80% {
    -webkit-transform: translateY(4%);
  }
  95% {
    -webkit-transform: translateY(-2%);
  }
  100% {
    -webkit-transform: translateY(0%);
  }
}
.slideUp {
  animation-name: slideUp;
  -webkit-animation-name: slideUp;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  animation-timing-function: ease;
  -webkit-animation-timing-function: ease;
  visibility: visible !important;
}
@keyframes slideUp {
  0% {
    transform: translateY(100%);
  }
  50% {
    transform: translateY(-8%);
  }
  65% {
    transform: translateY(4%);
  }
  80% {
    transform: translateY(-4%);
  }
  95% {
    transform: translateY(2%);
  }
  100% {
    transform: translateY(0%);
  }
}
@-webkit-keyframes slideUp {
  0% {
    -webkit-transform: translateY(100%);
  }
  50% {
    -webkit-transform: translateY(-8%);
  }
  65% {
    -webkit-transform: translateY(4%);
  }
  80% {
    -webkit-transform: translateY(-4%);
  }
  95% {
    -webkit-transform: translateY(2%);
  }
  100% {
    -webkit-transform: translateY(0%);
  }
}
.slideLeft {
  animation-name: slideLeft;
  -webkit-animation-name: slideLeft;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  animation-timing-function: ease-in-out;
  -webkit-animation-timing-function: ease-in-out;
  visibility: visible !important;
}
@keyframes slideLeft {
  0% {
    transform: translateX(150%);
  }
  50% {
    transform: translateX(-8%);
  }
  65% {
    transform: translateX(4%);
  }
  80% {
    transform: translateX(-4%);
  }
  95% {
    transform: translateX(2%);
  }
  100% {
    transform: translateX(0%);
  }
}
@-webkit-keyframes slideLeft {
  0% {
    -webkit-transform: translateX(150%);
  }
  50% {
    -webkit-transform: translateX(-8%);
  }
  65% {
    -webkit-transform: translateX(4%);
  }
  80% {
    -webkit-transform: translateX(-4%);
  }
  95% {
    -webkit-transform: translateX(2%);
  }
  100% {
    -webkit-transform: translateX(0%);
  }
}
.slideRight {
  animation-name: slideRight;
  -webkit-animation-name: slideRight;
  animation-duration: 1s;
  -webkit-animation-duration: 1s;
  animation-timing-function: ease-in-out;
  -webkit-animation-timing-function: ease-in-out;
  visibility: visible !important;
}
@keyframes slideRight {
  0% {
    transform: translateX(-150%);
  }
  50% {
    transform: translateX(8%);
  }
  65% {
    transform: translateX(-4%);
  }
  80% {
    transform: translateX(4%);
  }
  95% {
    transform: translateX(-2%);
  }
  100% {
    transform: translateX(0%);
  }
}
@-webkit-keyframes slideRight {
  0% {
    -webkit-transform: translateX(-150%);
  }
  50% {
    -webkit-transform: translateX(8%);
  }
  65% {
    -webkit-transform: translateX(-4%);
  }
  80% {
    -webkit-transform: translateX(4%);
  }
  95% {
    -webkit-transform: translateX(-2%);
  }
  100% {
    -webkit-transform: translateX(0%);
  }
}
.slideExpandUp {
  animation-name: slideExpandUp;
  -webkit-animation-name: slideExpandUp;
  animation-duration: 1.6s;
  -webkit-animation-duration: 1.6s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease -out;
  visibility: visible !important;
}
@keyframes slideExpandUp {
  0% {
    transform: translateY(100%) scaleX(0.5);
  }
  30% {
    transform: translateY(-8%) scaleX(0.5);
  }
  40% {
    transform: translateY(2%) scaleX(0.5);
  }
  50% {
    transform: translateY(0%) scaleX(1.1);
  }
  60% {
    transform: translateY(0%) scaleX(0.9);
  }
  70% {
    transform: translateY(0%) scaleX(1.05);
  }
  80% {
    transform: translateY(0%) scaleX(0.95);
  }
  90% {
    transform: translateY(0%) scaleX(1.02);
  }
  100% {
    transform: translateY(0%) scaleX(1);
  }
}
@-webkit-keyframes slideExpandUp {
  0% {
    -webkit-transform: translateY(100%) scaleX(0.5);
  }
  30% {
    -webkit-transform: translateY(-8%) scaleX(0.5);
  }
  40% {
    -webkit-transform: translateY(2%) scaleX(0.5);
  }
  50% {
    -webkit-transform: translateY(0%) scaleX(1.1);
  }
  60% {
    -webkit-transform: translateY(0%) scaleX(0.9);
  }
  70% {
    -webkit-transform: translateY(0%) scaleX(1.05);
  }
  80% {
    -webkit-transform: translateY(0%) scaleX(0.95);
  }
  90% {
    -webkit-transform: translateY(0%) scaleX(1.02);
  }
  100% {
    -webkit-transform: translateY(0%) scaleX(1);
  }
}
.expandUp {
  animation-name: expandUp;
  -webkit-animation-name: expandUp;
  animation-duration: 0.7s;
  -webkit-animation-duration: 0.7s;
  animation-timing-function: ease;
  -webkit-animation-timing-function: ease;
  visibility: visible !important;
}
@keyframes expandUp {
  0% {
    transform: translateY(100%) scale(0.6) scaleY(0.5);
  }
  60% {
    transform: translateY(-7%) scaleY(1.12);
  }
  75% {
    transform: translateY(3%);
  }
  100% {
    transform: translateY(0%) scale(1) scaleY(1);
  }
}
@-webkit-keyframes expandUp {
  0% {
    -webkit-transform: translateY(100%) scale(0.6) scaleY(0.5);
  }
  60% {
    -webkit-transform: translateY(-7%) scaleY(1.12);
  }
  75% {
    -webkit-transform: translateY(3%);
  }
  100% {
    -webkit-transform: translateY(0%) scale(1) scaleY(1);
  }
}
.fadeIn {
  animation-name: fadeIn;
  -webkit-animation-name: fadeIn;
  animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-timing-function: ease-in-out;
  -webkit-animation-timing-function: ease-in-out;
  visibility: visible !important;
}
@keyframes fadeIn {
  0% {
    transform: scale(0);
    opacity: 0.0;
  }
  60% {
    transform: scale(1.1);
  }
  80% {
    transform: scale(0.9);
    opacity: 1;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}
@-webkit-keyframes fadeIn {
  0% {
    -webkit-transform: scale(0);
    opacity: 0.0;
  }
  60% {
    -webkit-transform: scale(1.1);
  }
  80% {
    -webkit-transform: scale(0.9);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1);
    opacity: 1;
  }
}
.expandOpen {
  animation-name: expandOpen;
  -webkit-animation-name: expandOpen;
  animation-duration: 1.2s;
  -webkit-animation-duration: 1.2s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  visibility: visible !important;
}
@keyframes expandOpen {
  0% {
    transform: scale(1.8);
  }
  50% {
    transform: scale(0.95);
  }
  80% {
    transform: scale(1.05);
  }
  90% {
    transform: scale(0.98);
  }
  100% {
    transform: scale(1);
  }
}
@-webkit-keyframes expandOpen {
  0% {
    -webkit-transform: scale(1.8);
  }
  50% {
    -webkit-transform: scale(0.95);
  }
  80% {
    -webkit-transform: scale(1.05);
  }
  90% {
    -webkit-transform: scale(0.98);
  }
  100% {
    -webkit-transform: scale(1);
  }
}
.bigEntrance {
  animation-name: bigEntrance;
  -webkit-animation-name: bigEntrance;
  animation-duration: 1.6s;
  -webkit-animation-duration: 1.6s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  visibility: visible !important;
}
@keyframes bigEntrance {
  0% {
    transform: scale(0.3) rotate(6deg) translateX(-30%) translateY(30%);
    opacity: 0.2;
  }
  30% {
    transform: scale(1.03) rotate(-2deg) translateX(2%) translateY(-2%);
    opacity: 1;
  }
  45% {
    transform: scale(0.98) rotate(1deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  60% {
    transform: scale(1.01) rotate(-1deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  75% {
    transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  90% {
    transform: scale(1.01) rotate(0deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  100% {
    transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
}
@-webkit-keyframes bigEntrance {
  0% {
    -webkit-transform: scale(0.3) rotate(6deg) translateX(-30%) translateY(30%);
    opacity: 0.2;
  }
  30% {
    -webkit-transform: scale(1.03) rotate(-2deg) translateX(2%) translateY(-2%);
    opacity: 1;
  }
  45% {
    -webkit-transform: scale(0.98) rotate(1deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  60% {
    -webkit-transform: scale(1.01) rotate(-1deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  75% {
    -webkit-transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  90% {
    -webkit-transform: scale(1.01) rotate(0deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
    opacity: 1;
  }
}
.hatch {
  animation-name: hatch;
  -webkit-animation-name: hatch;
  animation-duration: 2s;
  -webkit-animation-duration: 2s;
  animation-timing-function: ease-in-out;
  -webkit-animation-timing-function: ease-in-out;
  transform-origin: 50% 100%;
  -ms-transform-origin: 50% 100%;
  -webkit-transform-origin: 50% 100%;
  visibility: visible !important;
}
@keyframes hatch {
  0% {
    transform: rotate(0deg) scaleY(0.6);
  }
  20% {
    transform: rotate(-2deg) scaleY(1.05);
  }
  35% {
    transform: rotate(2deg) scaleY(1);
  }
  50% {
    transform: rotate(-2deg);
  }
  65% {
    transform: rotate(1deg);
  }
  80% {
    transform: rotate(-1deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
@-webkit-keyframes hatch {
  0% {
    -webkit-transform: rotate(0deg) scaleY(0.6);
  }
  20% {
    -webkit-transform: rotate(-2deg) scaleY(1.05);
  }
  35% {
    -webkit-transform: rotate(2deg) scaleY(1);
  }
  50% {
    -webkit-transform: rotate(-2deg);
  }
  65% {
    -webkit-transform: rotate(1deg);
  }
  80% {
    -webkit-transform: rotate(-1deg);
  }
  100% {
    -webkit-transform: rotate(0deg);
  }
}
.bounce {
  animation-name: bounce;
  -webkit-animation-name: bounce;
  animation-duration: 1.6s;
  -webkit-animation-duration: 1.6s;
  animation-timing-function: ease;
  -webkit-animation-timing-function: ease;
  transform-origin: 50% 100%;
  -ms-transform-origin: 50% 100%;
  -webkit-transform-origin: 50% 100%;
}
@keyframes bounce {
  0% {
    transform: translateY(0%) scaleY(0.6);
  }
  60% {
    transform: translateY(-100%) scaleY(1.1);
  }
  70% {
    transform: translateY(0%) scaleY(0.95) scaleX(1.05);
  }
  80% {
    transform: translateY(0%) scaleY(1.05) scaleX(1);
  }
  90% {
    transform: translateY(0%) scaleY(0.95) scaleX(1);
  }
  100% {
    transform: translateY(0%) scaleY(1) scaleX(1);
  }
}
@-webkit-keyframes bounce {
  0% {
    -webkit-transform: translateY(0%) scaleY(0.6);
  }
  60% {
    -webkit-transform: translateY(-100%) scaleY(1.1);
  }
  70% {
    -webkit-transform: translateY(0%) scaleY(0.95) scaleX(1.05);
  }
  80% {
    -webkit-transform: translateY(0%) scaleY(1.05) scaleX(1);
  }
  90% {
    -webkit-transform: translateY(0%) scaleY(0.95) scaleX(1);
  }
  100% {
    -webkit-transform: translateY(0%) scaleY(1) scaleX(1);
  }
}
.pulse {
  animation-name: pulse;
  -webkit-animation-name: pulse;
  animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-iteration-count: infinite;
  -webkit-animation-iteration-count: infinite;
}
@keyframes pulse {
  0% {
    transform: scale(0.9);
    opacity: 0.7;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(0.9);
    opacity: 0.7;
  }
}
@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(0.95);
    opacity: 0.7;
  }
  50% {
    -webkit-transform: scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(0.95);
    opacity: 0.7;
  }
}
.floating {
  animation-name: floating;
  -webkit-animation-name: floating;
  animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-iteration-count: infinite;
  -webkit-animation-iteration-count: infinite;
}
@keyframes floating {
  0% {
    transform: translateY(0%);
  }
  50% {
    transform: translateY(8%);
  }
  100% {
    transform: translateY(0%);
  }
}
@-webkit-keyframes floating {
  0% {
    -webkit-transform: translateY(0%);
  }
  50% {
    -webkit-transform: translateY(8%);
  }
  100% {
    -webkit-transform: translateY(0%);
  }
}
.tossing {
  animation-name: tossing;
  -webkit-animation-name: tossing;
  animation-duration: 2.5s;
  -webkit-animation-duration: 2.5s;
  animation-iteration-count: infinite;
  -webkit-animation-iteration-count: infinite;
}
@keyframes tossing {
  0% {
    transform: rotate(-4deg);
  }
  50% {
    transform: rotate(4deg);
  }
  100% {
    transform: rotate(-4deg);
  }
}
@-webkit-keyframes tossing {
  0% {
    -webkit-transform: rotate(-4deg);
  }
  50% {
    -webkit-transform: rotate(4deg);
  }
  100% {
    -webkit-transform: rotate(-4deg);
  }
}
.pullUp {
  animation-name: pullUp;
  -webkit-animation-name: pullUp;
  animation-duration: 1.1s;
  -webkit-animation-duration: 1.1s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  transform-origin: 50% 100%;
  -ms-transform-origin: 50% 100%;
  -webkit-transform-origin: 50% 100%;
}
@keyframes pullUp {
  0% {
    transform: scaleY(0.1);
  }
  40% {
    transform: scaleY(1.02);
  }
  60% {
    transform: scaleY(0.98);
  }
  80% {
    transform: scaleY(1.01);
  }
  100% {
    transform: scaleY(0.98);
  }
  80% {
    transform: scaleY(1.01);
  }
  100% {
    transform: scaleY(1);
  }
}
@-webkit-keyframes pullUp {
  0% {
    -webkit-transform: scaleY(0.1);
  }
  40% {
    -webkit-transform: scaleY(1.02);
  }
  60% {
    -webkit-transform: scaleY(0.98);
  }
  80% {
    -webkit-transform: scaleY(1.01);
  }
  100% {
    -webkit-transform: scaleY(0.98);
  }
  80% {
    -webkit-transform: scaleY(1.01);
  }
  100% {
    -webkit-transform: scaleY(1);
  }
}
.pullDown {
  animation-name: pullDown;
  -webkit-animation-name: pullDown;
  animation-duration: 1.1s;
  -webkit-animation-duration: 1.1s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  transform-origin: 50% 0%;
  -ms-transform-origin: 50% 0%;
  -webkit-transform-origin: 50% 0%;
}
@keyframes pullDown {
  0% {
    transform: scaleY(0.1);
  }
  40% {
    transform: scaleY(1.02);
  }
  60% {
    transform: scaleY(0.98);
  }
  80% {
    transform: scaleY(1.01);
  }
  100% {
    transform: scaleY(0.98);
  }
  80% {
    transform: scaleY(1.01);
  }
  100% {
    transform: scaleY(1);
  }
}
@-webkit-keyframes pullDown {
  0% {
    -webkit-transform: scaleY(0.1);
  }
  40% {
    -webkit-transform: scaleY(1.02);
  }
  60% {
    -webkit-transform: scaleY(0.98);
  }
  80% {
    -webkit-transform: scaleY(1.01);
  }
  100% {
    -webkit-transform: scaleY(0.98);
  }
  80% {
    -webkit-transform: scaleY(1.01);
  }
  100% {
    -webkit-transform: scaleY(1);
  }
}
.stretchLeft {
  animation-name: stretchLeft;
  -webkit-animation-name: stretchLeft;
  animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  transform-origin: 100% 0%;
  -ms-transform-origin: 100% 0%;
  -webkit-transform-origin: 100% 0%;
}
@keyframes stretchLeft {
  0% {
    transform: scaleX(0.3);
  }
  40% {
    transform: scaleX(1.02);
  }
  60% {
    transform: scaleX(0.98);
  }
  80% {
    transform: scaleX(1.01);
  }
  100% {
    transform: scaleX(0.98);
  }
  80% {
    transform: scaleX(1.01);
  }
  100% {
    transform: scaleX(1);
  }
}
@-webkit-keyframes stretchLeft {
  0% {
    -webkit-transform: scaleX(0.3);
  }
  40% {
    -webkit-transform: scaleX(1.02);
  }
  60% {
    -webkit-transform: scaleX(0.98);
  }
  80% {
    -webkit-transform: scaleX(1.01);
  }
  100% {
    -webkit-transform: scaleX(0.98);
  }
  80% {
    -webkit-transform: scaleX(1.01);
  }
  100% {
    -webkit-transform: scaleX(1);
  }
}
.stretchRight {
  animation-name: stretchRight;
  -webkit-animation-name: stretchRight;
  animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-timing-function: ease-out;
  -webkit-animation-timing-function: ease-out;
  transform-origin: 0% 0%;
  -ms-transform-origin: 0% 0%;
  -webkit-transform-origin: 0% 0%;
}
@keyframes stretchRight {
  0% {
    transform: scaleX(0.3);
  }
  40% {
    transform: scaleX(1.02);
  }
  60% {
    transform: scaleX(0.98);
  }
  80% {
    transform: scaleX(1.01);
  }
  100% {
    transform: scaleX(0.98);
  }
  80% {
    transform: scaleX(1.01);
  }
  100% {
    transform: scaleX(1);
  }
}
@-webkit-keyframes stretchRight {
  0% {
    -webkit-transform: scaleX(0.3);
  }
  40% {
    -webkit-transform: scaleX(1.02);
  }
  60% {
    -webkit-transform: scaleX(0.98);
  }
  80% {
    -webkit-transform: scaleX(1.01);
  }
  100% {
    -webkit-transform: scaleX(0.98);
  }
  80% {
    -webkit-transform: scaleX(1.01);
  }
  100% {
    -webkit-transform: scaleX(1);
  }
}
</style>
        <link rel="stylesheet" href="assets/theme_light.css" type="text/css" id="skin_color">
        <link href="https://infinitemlmsoftware.com/backoffice/public_html/plugins/summernote/build/summernote.css">
        <!-- end: MAIN CSS -->

        
                                                                                                                            <link href="assets/tabs_pages.css" rel="stylesheet" type="text/css">
                                                                                                            <script src="assets/jquery.html" type="text/javascript"></script>
                                                                        
                                                                        
                                                    <script src="assets/jquery_003.js" type="text/javascript"></script>
                                                                        
                                                                        
        <link href="assets/DT_bootstrap.css" rel="stylesheet" type="text/css">
                                                                                                            <link href="assets/select2.css" rel="stylesheet" type="text/css">
                                                                        
                                                                        
        <script src="assets/jquery.html" type="text/javascript"></script>
                                                                                                            <script src="assets/validate_invite.js" type="text/javascript"></script>
                                                                                                            <script src="assets/tinymce.js" type="text/javascript"></script>
                                                                                                            <script src="assets/tinymice.js" type="text/javascript"></script>
                                                                                                            <script src="assets/invites.js" type="text/javascript"></script>
                                                                        
                                                                        
                                                    <link href="assets/contents.css" rel="stylesheet" type="text/css">
                                                                                                            <link href="assets/AdminLTE.css" rel="stylesheet" type="text/css">
                                                                                
        
        <script src="assets/switch_lang.js" type="text/javascript"></script>
                    <script src="assets/timer.js" type="text/javascript"></script>
            <script src="assets/auto_timeout.js" type="text/javascript"></script>
            
            <script src="assets/currency.js" type="text/javascript"></script>
        
        <script>
            $.ajaxSetup({
                data: {
            inf_token: '51096b7e1812733dba54a27a6983cb2d'
                }
            });
        </script>
    <style>.cke{visibility:hidden;}</style><style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}.fb_invisible{display:none}.fb_reset{background:none;border:0;border-spacing:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}.fb_reset>div{overflow:hidden}.fb_link img{border:none}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}.fb_reset .fb_dialog_legacy{overflow:visible}.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}.fb_dialog_content{background:#fff;color:#333}.fb_dialog_close_icon{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;_background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif);cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px}.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}.fb_dialog_close_icon:hover{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent;_background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_close_icon:active{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent;_background-image:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}.fb_dialog_loader{background-color:#f6f7f8;border:1px solid #606060;font-size:24px;padding:20px}.fb_dialog_top_left,.fb_dialog_top_right,.fb_dialog_bottom_left,.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}.fb_dialog_top_left{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}.fb_dialog_top_right{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}.fb_dialog_bottom_left{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}.fb_dialog_bottom_right{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}.fb_dialog_vert_left,.fb_dialog_vert_right,.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}.fb_dialog_vert_left,.fb_dialog_vert_right{width:10px;height:100%}.fb_dialog_vert_left{margin-left:-10px}.fb_dialog_vert_right{right:0;margin-right:-10px}.fb_dialog_horiz_top,.fb_dialog_horiz_bottom{width:100%;height:10px}.fb_dialog_horiz_top{margin-top:-10px}.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}.fb_dialog_iframe{line-height:0}.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #3a5795;color:#fff;font-size:14px;font-weight:bold;margin:0}.fb_dialog_content .dialog_title>span{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}body.fb_hidden{-webkit-transform:none;height:100%;margin:0;overflow:visible;position:absolute;top:-10000px;left:0;width:100%}.fb_dialog.fb_dialog_mobile.loading{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}.fb_dialog.fb_dialog_mobile.loading.centered{max-height:590px;min-height:590px;max-width:500px;min-width:500px}#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;left:0;top:0;width:100%;min-height:100%;z-index:10000}#fb-root #fb_dialog_ipad_overlay.hidden{display:none}.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%}.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px}.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px}.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));border:1px solid #2f477a;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:16px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}.fb_dialog_content .dialog_content{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}.fb_dialog_content .dialog_footer{background:#f6f7f8;border:1px solid #555;border-top-color:#ccc;height:40px}#fb_dialog_loader_close{float:left}.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}
.fb_iframe_widget{display:inline-block;position:relative}.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}.fb_iframe_widget iframe{position:absolute}.fb_iframe_widget_fluid_desktop,.fb_iframe_widget_fluid_desktop span,.fb_iframe_widget_fluid_desktop iframe{max-width:100%}.fb_iframe_widget_fluid_desktop iframe{min-width:220px;position:relative}.fb_iframe_widget_lift{z-index:1}.fb_hide_iframes iframe{position:relative;left:-10000px}.fb_iframe_widget_loader{position:relative;display:inline-block}.fb_iframe_widget_fluid{display:inline}.fb_iframe_widget_fluid span{width:100%}.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}.fb_iframe_widget_loader .FB_Loader{background:url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}</style></head>

    <body style="height: auto; min-height: 100%;">
        <input name="base_url" id="base_url" value="https://infinitemlmsoftware.com/backoffice/" type="hidden">
        <input name="img_src_path" id="img_src_path" value="https://infinitemlmsoftware.com/backoffice/public_html/" type="hidden">
        <input name="current_url" id="current_url" value="member/invites" type="hidden">
        <input name="current_url_full" id="current_url_full" value="user/member/invites" type="hidden">
        <input name="DEFAULT_CURRENCY_VALUE" id="DEFAULT_CURRENCY_VALUE" value="1" type="hidden">
        <input name="DEFAULT_CURRENCY_CODE" id="DEFAULT_CURRENCY_CODE" value="" type="hidden">
        <input name="DEFAULT_SYMBOL_LEFT" id="DEFAULT_SYMBOL_LEFT" value="" type="hidden">
        <input name="DEFAULT_SYMBOL_RIGHT" id="DEFAULT_SYMBOL_RIGHT" value="" type="hidden">
        <!--inactiviy logout setting-->
                <input name="logout_time" id="logout_time" value="240" type="hidden">
                <!--end-->
         
            <!--site header-->	
            
<div class="navbar navbar-inverse navbar-fixed-top">
    
    <div class="container">
        <div class="navbar-header">
                        
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            
            
            <div class="logo-header">
                <a class="navbar-brand" href="dashboard.php"> 
                    <img src="assets/logo_default.png" class="logo">
                </a>
            </div>           
            
        </div>
        <div class="navbar-tools">
            
            <ul class="nav navbar-right">
                <!-- start: MESSAGE DROPDOWN --> 

                

                
                <!-- end: MESSAGE DROPDOWN -->
                                <!-- start: LANGUAGE DROPDOWN -->
                                <!-- end: LANGUAGE DROPDOWN -->

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true"> 
                                                    <img alt="" src="assets/nophoto.jpg" width="30px" height="30px">
                                                <span class="username"><?=$username?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        
                        <li><a href="logout.php"><i class="fa fa-key"></i> Logout</a></li>
                    </ul>
                </li>				
                <!-- end: USER DROPDOWN -->




            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: SITE HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container prh">
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation navbar-collapse collapse">
            <!-- <div class="user-info-left">
                <img src="https://infinitemlmsoftware.com/backoffice/public_html/images/profile_picture/nophoto.jpg" width="30" height="30">
                                                                    <span class="badge badge-green">Active</span>
                                                        </div> -->
            <!-- start: MAIN MENU TOGGLER BUTTON -->
            <div class="navigation-toggler">
                <i class="clip-chevron-left"></i>
                <i class="clip-chevron-right"></i>
            </div>
            <!-- end: MAIN MENU TOGGLER BUTTON -->
            <ul class="main-navigation-menu">
                        <li>           
            <a href="dashboard.php">                     
                <i class="clip-home-2"></i>
                <span class="title">
                    Dashboard
                </span>
                                <span class="selected"></span>
            </a>
                    </li>
                    <li>           
            <a href="javascript:void(0);">                     
                <i class="clip-tree"></i>
                <span class="title">
                    Organization
                </span>
                                    <i class="icon-arrow pull-right"></i>
                                <span class="selected"></span>
            </a>
                            <ul class="sub-menu">
                                            <li>
                            <a href="tree.php">
                                <!-- <i class='clip-tree-2' ></i> -->
                                 <i class="fa fa-circle-o"></i>
                                <span class="title">
                                    Genealogy
                                </span>
                            </a>
                        </li>
                                            <li>
                            <a href="downline.php">
                                <!-- <i class='clip-grid-6' ></i> -->
                                 <i class="fa fa-circle-o"></i>
                                <span class="title">
                                    Downline
                                </span>
                            </a>
                        </li>
                                            <li>
                            <a href="direct.php">
                                <!-- <i class='clip-link' ></i> -->
                                 <i class="fa fa-circle-o"></i>
                                <span class="title">
                                    Sponsor
                                </span>
                            </a>
                        </li>
                    
                </ul>
                    </li>
                    
                    <li>           
            <a href="direct-income.php">                     
                <i class="clip-banknote"></i>
                <span class="title">
                   Direct Income
                </span>
                                    
            </a>
                            
                    </li>
<li>           
            <a href="matching-income.php">                     
                <i class="clip-banknote"></i>
                <span class="title">
                    Matching Income
                </span>
                                    
            </a>
                            
                    </li>                    
<li>           
            <a href="roi-income.php">                     
                <i class="clip-banknote"></i>
                <span class="title">
                   ROI Income
                </span>
                                    
            </a>
                            
                    </li>
<li>           
            <a href="withdrawal-report.php">                     
                <i class="clip-banknote"></i>
                <span class="title">
                   Withdrawal Report
                </span>
                                    
            </a>
                            
                    </li>
                    <li>           
            <a href="withdrawal.php">                     
                <i class="clip-star-6"></i>
                <span class="title">
                    Withdrawal
                </span>
                                <span class="selected"></span>
            </a>
                    </li>                                        
                    
                    
                    
                    <li>           
            <a href="tr-password.php">                     
                <i class="clip-keyhole"></i>
                <span class="title">
                    Transaction Password
                </span>
                                <span class="selected"></span>
            </a>
                    </li>
<li>           
            <a href="cart.php">                     
                <i class="clip-spinner-5"></i>
                <span class="title">
                    Cart
                </span>
                                <span class="selected"></span>
            </a>
                    </li>                    
                    <li>           
            <a href="javascript:void(0);">                     
                <i class=" clip-note"></i>
                <span class="title">
                    Reports
                </span>
                                    <i class="icon-arrow pull-right"></i>
                                <span class="selected"></span>
            </a>
                            <ul class="sub-menu">
                                            <li>
                            <a href="rank-report.php">
                                <!-- <i class='clip-credit' ></i> -->
                                 <i class="fa fa-circle-o"></i>
                                <span class="title">
                                    Rank Report
                                </span>
                            </a>
                        </li>
                                            
                    
                </ul>
                    </li>
                    <li>           
            <a href="javascript:void(0);">                     
                <i class="clip-users"></i>
                <span class="title">
                    Profile Management
                </span>
                                    <i class="icon-arrow pull-right"></i>
                                <span class="selected"></span>
            </a>
                            <ul class="sub-menu">
                                            <li>
                            <a href="edit-profile.php">
                                <!-- <i class='clip-user' ></i> -->
                                 <i class="fa fa-circle-o"></i>
                                <span class="title">
                                    Profile View
                                </span>
                            </a>
                        </li>
                                            <li>
                            <a href="change-password.php">
                                <!-- <i class='clip-key' ></i> -->
                                 <i class="fa fa-circle-o"></i>
                                <span class="title">
                                    Change Password
                                </span>
                            </a>
                        </li>
                    
                </ul>
                    </li>
                    
                    
                    
                    <li>           
            <a href="logout.php">                     
                <i class="clip-switch"></i>
                <span class="title">
                    Logout
                </span>
                                <span class="selected"></span>
            </a>
                    </li>
    
</ul>
        </div>
        <!-- end: SIDEBAR -->
    </div>
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
                                    Promotional Tools
                                </a>
                            </li>
                                                                                                    <li>
                                
                            </li>
                        	

                        <!-- start: TIME -->
                        <li class="pull-right">		
                            <span class="date" style="padding: 0px 0px 0px 10px;">
                                <timestamp id="date">Sunday, June 17, 2018</timestamp> 
                            </span>
                            <div id="clock">6:38:59 PM</div>

                            
                        </li> 
                        <!-- end: TIME -->
                    </ol>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                    <!-- start: PAGE HEADER -->
                    <!-- <div class="page-header">
                        <h1>Promotional Tools 
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
                

<style>

    .media-body, .media-left, .media-right {
        display: inline-block;
        vertical-align: middle;
    }
    .media-left{
        width:18%;
    }
    .media-left img{
        cursor: pointer; 
    }
    .media-body{
        width:80%;
    }
    .media-body .form-control, button.btn.btn-flat.btn-bricky.banner_inv{
        height:80px !important;
    }
    .modal.fade .modal-dialog {
        -webkit-transform: scale(0.1);
        -moz-transform: scale(0.1);
        -ms-transform: scale(0.1);
        transform: scale(0.1);
        top: 300px;
        opacity: 0;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
    }

    .modal.fade.in .modal-dialog {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        -webkit-transform: translate3d(0, -300px, 0);
        transform: translate3d(0, -300px, 0);
        opacity: 1;
    }
    .media-object{
        width: 100px;
        height: 100px;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0,0,0,.15);
    }
    .alert-info {
        color: #3a87ad !important;
        background-color: #d9edf7 !important;
        border-color: #bce8f1 !important;
    }
    .info-box-number{
        text-align: center;
        padding-top: 10px;
    }
    #caption{

        text-align: center;
        font-size: 25px;
        padding: 2px 16px;
        color: white;
    }
</style>

<div id="span_js_messages" style="display:none;">
    <span id="row_msg">Rows</span>
    <span id="show_msg">Shows</span>
    <span id="validate_msg1">Enter Mail id</span>
    <span id="validate_msg2">Enter Subject</span>
    <span id="validate_msg3">Enter Message</span>
    <input name="logo" id="logo" value="https://infinitemlmsoftware.com/backoffice/public_html/images/logos/logo_default.png" type="hidden">
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="tabbable" style="background:#fff;">
            <ul id="myTab3" class="nav nav-tabs tab-green">
                
                <li class="active">
                    <a href="#panel_tab1_example4" data-toggle="tab">
                        <i class="pink fa fa-dashboard"></i>Banner Invites
                    </a>
                </li>
                

            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="panel_tab1_example1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                        
                                                                        
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-aqua"><i style="color: #fff;" class="fa fa-envelope-o"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">test invite</span>
                                                        <span class="info-box-number"><form action="https://dreamconnnect/signup.php" method="post" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                                                            <input id="invite_text_id" name="invite_text_id" value="2" type="hidden">
                                                            <input id="type" name="type" value="social_email" type="hidden">
                                                            <button class="btn btn-bricky" tabindex="5" type="submit" value="preview" name="invite_email" id="invite_email" style="min-width: 73px; float: left;">Preview</button>

                                                            </form></span>
                                                    </div>
                                                </div>
                                            </div>

                                                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-aqua"><i style="color: #fff;" class="fa fa-envelope-o"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">xdfdxdxfdfd</span>
                                                        <span class="info-box-number"><form action="https://infinitemlmsoftware.com/backoffice/user/member/edit_invite_wallpost" method="post" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                                                            <input id="invite_text_id" name="invite_text_id" value="6" type="hidden">
                                                            <input id="type" name="type" value="social_email" type="hidden">
                                                            <button class="btn btn-bricky" tabindex="5" type="submit" value="preview" name="invite_email" id="invite_email" style="min-width: 73px; float: left;">Preview</button>

                                                            </form></span>
                                                    </div>
                                                </div>
                                            </div>

                                                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-aqua"><i style="color: #fff;" class="fa fa-envelope-o"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text"> offer  </span>
                                                        <span class="info-box-number"><form action="https://infinitemlmsoftware.com/backoffice/user/member/edit_invite_wallpost" method="post" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                                                            <input id="invite_text_id" name="invite_text_id" value="9" type="hidden">
                                                            <input id="type" name="type" value="social_email" type="hidden">
                                                            <button class="btn btn-bricky" tabindex="5" type="submit" value="preview" name="invite_email" id="invite_email" style="min-width: 73px; float: left;">Preview</button>

                                                            </form></span>
                                                    </div>
                                                </div>
                                            </div>

                                                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-aqua"><i style="color: #fff;" class="fa fa-envelope-o"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">iunhjimjkmkoml,l,</span>
                                                        <span class="info-box-number"><form action="https://infinitemlmsoftware.com/backoffice/user/member/edit_invite_wallpost" method="post" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                                                            <input id="invite_text_id" name="invite_text_id" value="10" type="hidden">
                                                            <input id="type" name="type" value="social_email" type="hidden">
                                                            <button class="btn btn-bricky" tabindex="5" type="submit" value="preview" name="invite_email" id="invite_email" style="min-width: 73px; float: left;">Preview</button>

                                                            </form></span>
                                                    </div>
                                                </div>
                                            </div>

                                        
                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="panel_tab1_example2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                             <h4 align="center"> No Data</h4>
                                       
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane  active" id="panel_tab1_example4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div style="display:none;" class="alert alert-info col-md-12" id="banner_inv">Banner Invites URL Copied</div>
 
                                                                        
                                                                        
                                                        <div class="col-md-12">   
                                                <div class="box box-solid" style="background: none repeat scroll 0% 0% #F1F2F7;">
                                                    <div class="box-body" style="border: 1px solid #DDD">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a data-toggle="modal" data-target="#banner_img_4">
                                                                    <img src="assets/11.png" alt="Banner Image" class="media-object">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <label class="control-label"><b>Banner </b></label>  
                                                                <label class="control-label pull-right" style="    color: rgb(153, 153, 153);color: rgb(153, 153, 153);"><i class="fa fa-calendar margin-r-5"></i>2018-06-17</label>  
                                                                <div class="input-group input-group-sm">                                                                  
                                                                    
                                                                    <textarea class="form-control textfixed" disabled="disabled" id="banner4" style="resize: none;">&lt;a href="https://dreamconnect.in/signup.php?ref=<?=$username?>"&gt;&lt;img src="https://dreamconnect.in/user/images/banners/11.png" height="150" width="250"&gt;&lt;/a&gt;</textarea>
                                                                    <span class="input-group-btn">
                                                                        <button type="button" id="4" class="btn btn-bricky btn-flat banner_inv">Copy</button>
                                                                    </span>
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
                <div class="tab-pane " id="panel_tab1_example5">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                        
                                                                        
                                                <div class="row">
                                                <div class="form-group" style="border: 1px solid #DDD;padding-bottom: 20px;padding-top: 10px;"> 
                                                    <div class="col-sm-12">
                                                        <label class="control-label"><b>test invite </b></label>
                                                        <label class="control-label pull-right" style="color: rgb(153, 153, 153);"><i class="fa fa-calendar margin-r-5"></i>2018-04-09</label>  
                                                        <div class="input-group input-group-sm">
                                                            <textarea class="form-control" disabled="disabled" id="text1" name="mail_content" style="height: 50px; important"> &lt;a href="https://infinitemlmsoftware.com/backoffice/"&gt; &lt;p&gt;test invite test invite test invite test invite&lt;/p&gt;
 &lt;/a&gt;    
                                                            </textarea>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-bricky btn-flat text_inv" id="1" style="height: 50px important;">Copy</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                                    <div class="row">
                                                <div class="form-group" style="border: 1px solid #DDD;padding-bottom: 20px;padding-top: 10px;"> 
                                                    <div class="col-sm-12">
                                                        <label class="control-label"><b>Hi </b></label>
                                                        <label class="control-label pull-right" style="color: rgb(153, 153, 153);"><i class="fa fa-calendar margin-r-5"></i>2018-05-28</label>  
                                                        <div class="input-group input-group-sm">
                                                            <textarea class="form-control" disabled="disabled" id="text5" name="mail_content" style="height: 50px; important"> &lt;a href="https://infinitemlmsoftware.com/backoffice/"&gt; &lt;p&gt;Join Us!&nbsp;&lt;/p&gt;

&lt;p&gt;please join us all&lt;/p&gt;
 &lt;/a&gt;    
                                                            </textarea>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-bricky btn-flat text_inv" id="5" style="height: 50px important;">Copy</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                                    <div class="row">
                                                <div class="form-group" style="border: 1px solid #DDD;padding-bottom: 20px;padding-top: 10px;"> 
                                                    <div class="col-sm-12">
                                                        <label class="control-label"><b>sdgs </b></label>
                                                        <label class="control-label pull-right" style="color: rgb(153, 153, 153);"><i class="fa fa-calendar margin-r-5"></i>2018-05-31</label>  
                                                        <div class="input-group input-group-sm">
                                                            <textarea class="form-control" disabled="disabled" id="text7" name="mail_content" style="height: 50px; important"> &lt;a href="https://infinitemlmsoftware.com/backoffice/"&gt;                               
                            sdgs &lt;/a&gt;    
                                                            </textarea>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-bricky btn-flat text_inv" id="7" style="height: 50px important;">Copy</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                                    <div class="row">
                                                <div class="form-group" style="border: 1px solid #DDD;padding-bottom: 20px;padding-top: 10px;"> 
                                                    <div class="col-sm-12">
                                                        <label class="control-label"><b>offer  </b></label>
                                                        <label class="control-label pull-right" style="color: rgb(153, 153, 153);"><i class="fa fa-calendar margin-r-5"></i>2018-06-07</label>  
                                                        <div class="input-group input-group-sm">
                                                            <textarea class="form-control" disabled="disabled" id="text8" name="mail_content" style="height: 50px; important"> &lt;a href="https://infinitemlmsoftware.com/backoffice/"&gt;                               
                     zczzdc      zxxz &lt;/a&gt;    
                                                            </textarea>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-bricky btn-flat text_inv" id="8" style="height: 50px important;">Copy</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <div style="display:none;" class="alert alert-info col-md-10" id="text_inv">Text Invites URL Copied</div> 
                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="panel_tab1_example3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <script src="assets/all.js" type="text/javascript"></script>
                                <div class="panel-body">
                                                                        
                                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="info-box" style="background: none repeat scroll 0% 0% #F1F2F7;">
                                                    <span class="info-box-icon btn-primary" style="cursor: pointer;background: #3c5b9a !important;" onclick="share('test invite', '3')"><i class="fa fa-facebook-official"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">test invite</span>
                                                        <span class="progress-description">
                                                                test invitetest invitetest invite
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="info-box" style="background: none repeat scroll 0% 0% #F1F2F7;">
                                                    <span class="info-box-icon btn-primary" style="cursor: pointer;background: #3c5b9a !important;" onclick="share('offer', '11')"><i class="fa fa-facebook-official"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">offer</span>
                                                        <span class="progress-description">
                                                                                            
                       ,ikmi,ko,l kmko,o,k     
                                                        </span>
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
</div>   
                                            
        <div class="modal fade" id="banner_img_4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">     
            <div class="modal-dialog" role="document">
                <img alt="" src="assets/11.png" style="width:100%;">
                <p id="caption"><b>test</b></p>
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
<script src="assets/jquery_002.js"></script>
<script src="assets/perfect-scrollbar.js"></script>
<script src="assets/less-1.js"></script>
<script src="assets/jquery_004.js"></script>
<script src="assets/bootstrap-colorpalette.js"></script>
<script src="assets/bootstrap-switch.js"></script>
<script src="assets/main.js"></script>



<script src="assets/jquery_006.js"></script>


 
    
    <link rel="stylesheet" href="assets/jquery.css">
    <script src="assets/notificator.js"></script>
    <script src="assets/refresh.js"></script>
    


                                <script src="assets/jquery-ui.js" type="text/javascript"></script>
                                                                    <script src="assets/table-data.js" type="text/javascript"></script>
                                            <script src="assets/DT_bootstrap.js" type="text/javascript"></script>
                                                        <script src="assets/select2.js" type="text/javascript"></script>
                                                                    <script src="assets/jquery-ui.js" type="text/javascript"></script><div id="gfxlNjq-1529240922926" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; bottom: 0px !important; left: auto !important; position: fixed !important; border: 0px none !important; min-height: 0px !important; min-width: 0px !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: auto !important; z-index: 2000000000 !important; cursor: auto !important; float: none !important; display: block; right: 0px !important;" class=""><iframe id="WBbZ2U1-1529240922927" src="about:blank" scrolling="no" title="chat widget" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 320px !important; height: 369px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; display: none !important;" class="" frameborder="0"></iframe><iframe id="riGLzDJ-1529240922928" src="about:blank" scrolling="no" title="chat widget" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; bottom: 0px !important; left: auto !important; position: fixed !important; border: 0px none !important; min-height: 40px !important; max-height: 40px !important; max-width: 200px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; width: 200px !important; height: 40px !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; min-width: 200px !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center 0px !important; right: 10px !important; display: block !important;" class="" frameborder="0"></iframe><iframe id="LbXOnri-1529240922928" src="about:blank" scrolling="no" title="chat widget" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; bottom: 40px !important; position: fixed !important; border: 0px none !important; min-height: 37px !important; min-width: 200px !important; max-height: 37px !important; max-width: 200px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 200px !important; height: 37px !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; right: 10px !important; left: auto !important;" class="" frameborder="0"></iframe><div id="q3tiEO4-1529240922926" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: rgb(255, 255, 255) none repeat scroll 0% 0% !important; opacity: 0 !important; top: 1px !important; bottom: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: 45px !important; display: block !important; z-index: 999997 !important; cursor: move !important; float: none !important; left: 0px !important; right: 96px !important;" class=""></div><div id="FWQMD5m-1529240922926" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 96px !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important;" class=""></div><div id="QpOWPUg-1529240922926" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: e-resize !important; float: none !important;" class=""></div><div id="jF1xwqd-1529240922926" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important;" class=""></div><div id="HhsgyR8-1529240922926" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: s-resize !important; float: none !important;" class=""></div><div id="lMhyXhe-1529240922927" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important;" class=""></div><div id="ry60kkP-1529240922927" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: ne-resize !important; float: none !important;" class=""></div><div id="LVCAs3B-1529240922927" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: 0px !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: sw-resize !important; float: none !important;" class=""></div><div id="hAVqxPp-1529240922927" style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999999 !important; cursor: se-resize !important; float: none !important;" class=""></div><div style="outline: medium none currentcolor !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: transparent none repeat scroll 0% 0% !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px none !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important;" class=""></div></div>
                                                                                                        <script src="assets/ckeditor.js" type="text/javascript"></script>
                                            <script src="assets/jquery_007.js" type="text/javascript"></script>
                                                                    <script src="assets/adminlte.js" type="text/javascript"></script>
            

<script>
    jQuery(document).ready(function () {
        Main.init();
        TableData.init();
        validate_invite.init()

    });
</script>
<script>

    $(".banner_inv").click(function () {
        var id = $(this).attr('id');
        var v = $("#banner" + id).val();
        var dummy = $('<input>').val(v).appendTo('body').select();

        try {
            document.execCommand("copy", false, null);
        } catch (e) {
            window.prompt("Copy to clipboard: Ctrl C, Enter", v);
        }
        dummy.remove();
        $('#banner_inv').fadeIn().delay(2000).fadeOut();
    });
    $(".text_inv").click(function () {
        var id = $(this).attr('id');
        var v = $("#text" + id).val();
        var dummy = $('<input>').val(v).appendTo('body').select();
        try {
            document.execCommand("copy", false, null);
        } catch (e) {
            window.prompt("Copy to clipboard: Ctrl C, Enter", v);
        }
        dummy.remove();
        $('#text_inv').fadeIn().delay(2000).fadeOut();
    });

</script>

    
  
<div id="notificator"></div><div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div><iframe src="about:blank" style="display: none !important;" title="chat widget logging"></iframe></body></html>