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



?>
<?php
 include 'includes/header.php';

?>
<!-- start: MAIN CONTAINER -->
<div class="main-container prh">
  
<?php
 
 include 'includes/sidebar.php';

?>
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
                                    Earned Income
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
                Earned Income
            </div>
            <div class="panel-body">
                <form action="#" role="form" class="smart-wizard form-horizontal" method="post" name="feedback_form" id="feedback_form" accept-charset="utf-8">
<input name="inf_token" value="51096b7e1812733dba54a27a6983cb2d" type="hidden">

                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> Please check the values you've submitted.
                        </div>
                    </div>
                                                            

                        <table class="table table-striped table-hover table-full-width table-bordered" id="">
                            <thead class="table-bordered">
                                <tr class="th">
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Amount Type</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                                                        <tbody>
                                                                        
                                    <?php 
                                    $ctr=1;
                                    $sql = "select `ttime`,`remarks`,`comm` from `inv_transactions` where `mid` = '$mid' and `remarks` != 'Daily Earning';";           
                                    $result = mysqli_query($s_dbid,$sql);
                                    while(list($idate,$remarks,$amount) = mysqli_fetch_row($result)){
                                    
                                    ?>                                        
                                        <tr class="tr2">
                                            <td><?=$ctr?></td>
                                            <td><?=$idate?></td>
                                            <td><?=$remarks?></td>
                                            <td><?=$amount?></td>
                                        </tr>
                                    <?php
                                    $ctr++;
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
<script src="assets/jquery_003.js"></script>
<script src="assets/perfect-scrollbar.js"></script>
<script src="assets/less-1.js"></script>
<script src="assets/jquery_004.js"></script>
<script src="assets/bootstrap-colorpalette.js"></script>
<script src="assets/bootstrap-switch.js"></script>
<script src="assets/main.js"></script>



<script src="assets/jquery_002.js"></script>


 
    
    <link rel="stylesheet" href="assets/jquery.css">
    <script src="assets/notificator.js"></script>
    <script src="assets/refresh.js"></script>
    


                                <script src="assets/validate_income.js" type="text/javascript"></script>
                                                                    <script src="assets/select2.js" type="text/javascript"></script>
                                            <script src="assets/jquery_006.js" type="text/javascript"></script>
                                            <script src="assets/DT_bootstrap.js" type="text/javascript"></script>
                                            <script src="assets/table-data.js" type="text/javascript"></script>
                                            <script src="assets/ajax.js" type="text/javascript"></script>
                                            <script src="assets/ajax-dynamic-list.js" type="text/javascript"></script>
                                                        <script src="assets/user_summary_header.js" type="text/javascript"></script>
            

<script>
        jQuery(document).ready(function() {
        Main.init();
    TableData.init();

    });
</script>


    
</body></html>