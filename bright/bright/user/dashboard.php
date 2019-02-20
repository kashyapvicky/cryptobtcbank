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
   $sql = "select `id`,`package` from `join` where `username` = '$username';";              
   $result = mysqli_query($s_dbid,$sql);  
   list($mid,$package) = mysqli_fetch_row($result);
   
   
   
   
   
   $sql1  = "SELECT sdate,amount FROM `investment` WHERE `mid` = '$mid'  ";  
   $result1 = mysqli_query($s_dbid,$sql1); 
   list($sdate,$principal_amount) = mysqli_fetch_row($result1);
   
   $tusers=0;   
   $tpackage=0;   
   $tleftpackage=0;  
   $trightpackage=0;




   
   function find_users($snode) {
   
         global $s_dbid,$tusers,$tpackage;
   
    
   
           $sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$snode'";
   
           $result = mysqli_query($s_dbid,$sql);
   
   //echo $sql;
   
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
   
      }
   
   
   
   
   $damount = 0;
   
   $sql  = "SELECT id FROM `join` WHERE `dreferal` = '$username'  ";
   
   $result = mysqli_query($s_dbid,$sql);
   
   
   
   $duser = 0;
   
   while(list($did) = mysqli_fetch_row($result)){
   
    $sql1  = "SELECT amount FROM `investment` WHERE `mid` = '$did'  ";
   
    $result1 = mysqli_query($s_dbid,$sql1);
   
    if(mysqli_num_rows($result1)>0){
   
    list($damt) = mysqli_fetch_row($result1);
   
    
   
    $damount +=$damt;   
   
    }
   
    $duser++;
   
   }
   
   
   
   $lpackage=0;
   
   $rpackage=0;
   
   $total_left=0;
   
   $total_right=0;
   
   function leftall($username){
   
    global $s_dbid,$tusers,$tpackage,$lpackage,$total_left,$tleftpackage;
   
   
   
    $rpackage =0;
   
    $tpackage =0;
   
    $uamt = 0;
   
    $tusers=0;  
   
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
   
    //echo $luser;
   
    find_users($luser);
   
    //echo $tusers;
   
    $total_left = $tusers;
   
    $tleftpackage += $tpackage;
   
   
   
    
   
   }
   
   
   
   function rightall($username){
   
    global $s_dbid,$tusers,$tpackage,$rpackage,$total_right,$trightpackage;
   
   
       $rpackage =0;
       $tpackage =0;
       $uamt = 0;
       $tusers=0;   
   
     $sql  = "SELECT id,username FROM `join` WHERE `sponsor` = '$username' and position = 'Right'";
     $result = mysqli_query($s_dbid,$sql);
   
   list($lid,$luser) = mysqli_fetch_row($result);
   $sql2  = "SELECT sdate,amount FROM `investment` WHERE `mid` = '$lid' and status='active'";
   $result2 = mysqli_query($s_dbid,$sql2);  
   list($sdate,$uamt) = mysqli_fetch_row($result2); 
   
   $tpackage +=$uamt;
   
   
   if(mysqli_num_rows($result)>0){
    $tusers++;
   }

   find_users($luser);
   
   $total_right = $tusers;    
   $trightpackage += $tpackage; 

}
   
   

   
   leftall($username);

   rightall($username);
   
   
   
   $sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' ";   
   $result = mysqli_query($s_dbid,$sql);   
   list($p_amt) = mysqli_fetch_row($result);
   
   
   
   $sql = "SELECT sum(`amount`) FROM withdraw WHERE `jid`='$mid';";  
   $result = mysqli_query($s_dbid,$sql);  
   list($w_amt) = @mysqli_fetch_row($result);
   
   
   
   $e_amt = $p_amt; 
   $p_amt = $p_amt - $w_amt;
   
   
   ?>
<?php
   include 'includes/header.php';   
 ?>
<!-- start: MAIN CONTAINER -->
<div class="main-container prh">
<?php
   include 'includes/sidebar.php';
?>

   <style type="text/css">
       .card_icon {
    font-size: 50px;
    line-height: 90px;
    margin-left: 20%;
    color: #fff;
}
.bg-green{
background-color: #00a65a;
}
.bg-red{
  background-color: #dd4b39;
}
.bg-blue{
  background-color: #0073b7;
}
.bg-yellow{
  background-color: #f39c12;
}
.bg-purple{
   background-color: #605ca8;
}
.bg-nevy{
   background-color: #001f3f;
}


   </style>
<!-- start: PAGE -->
<div class="main-content">
   <div class="container">
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
               <!-- start: TIME -->
               <li class="pull-right">
                  <span class="date" style="padding: 0px 0px 0px 10px;">
                     <timestamp id="date"></timestamp>
                  </span>
                  <div id="clock"></div>
               </li>
               <!-- end: TIME -->
            </ol>
            <!-- end: PAGE TITLE & BREADCRUMB -->
            <!-- start: PAGE HEADER -->
            <!-- <div class="page-header">  -->
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
      <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"
         charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" charset="utf-8"></script>
      <script src="https://infinitemlmsoftware.com/backoffice/public_html/map-js/jquery.mapael.min.js" charset="utf-8"></script>
      <script src="https://rawgit.com/aterrien/jQuery-Knob/master/dist/jquery.knob.min.js" charset="utf-8"></script>
      <script src="https://infinitemlmsoftware.com/backoffice/public_html/map-js/world_countries.js"></script>
      <script src="https://infinitemlmsoftware.com/backoffice/public_html/map-js/jscript.js" charset="utf-8"></script>
      <!-- /Map end -->
      <!--chartnew-->
      <link rel="stylesheet" type="text/css" href="https://infinitemlmsoftware.com/backoffice/public_html/chart_new/adminlte_one.css">
      <script src="https://infinitemlmsoftware.com/backoffice/public_html/chart_new/chart_new.js"></script>
      <!--/chartnew-->
      <!-- start: PAGE CONTENT -->
      <div class="row state-overview">
           <div class="col-md-4">
            <div class="chk-block-new">
               <div class=" bg-light hover-up">
                  <section class="panel panel_back">
                     <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <div class="ht-fix bg-red">
                            <i class="fa fa-suitcase ewalet-tile card_icon" style=""></i>
                        </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                           <div class="value used">
                                <h3 class="count">E-Wallet</h3>
                              <p><strong>Total  :  <span class="box_red"> <?=$p_amt?>  &#8377;<span id="total_payout">
                                 <?=$w_amt?> &#8377;
                                 </span></span></strong>
                              </p>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="chk-block-new">
               <div class=" bg-light hover-up">
                  <section class="panel panel_back">
                     <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <div class="ht-fix bg-green">
                            <i class="fa fa-credit-card ewalet-tile card_icon" style=""></i>
                        </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                           <div class="value used">
                               <h3 class="count">Payout</h3> 
                              <p><strong>Total  :  <span class="box_red"><span id="total_payout">
                                 <?=$w_amt?> &#8377;
                                 </span></span></strong>
                              </p>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
         <div class="col-md-4">
               <div class=" bg-light hover-up">
                  <section class="panel panel_back2">
                     <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <div class="ht-fix bg-yellow">
                            <i class="fa fa-tags ewalet-tile card_icon" style=""></i>
                        </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                           <div class="value used">
                              <h3 class=" count3">Package</h3>                                   
                              <p><strong>Package  :  <span class="box_red" id="sales_total">
                                 <?=$principal_amount?> &#8377;
                                 </span></strong>
                              </p>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
         </div>
         <div class="col-md-4">
               <div class=" bg-light hover-up">
                  <section class="panel panel_back3">
                     <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <div class="ht-fix bg-blue">
                            <i class="fa fa-inr ewalet-tile card_icon" style=""></i>
                        </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                           <div class="value used">
                              <h3 class=" count4">Business</h3>
                              <p style="margin-top: -10px"><strong>Left :  <span class="box_red" id="mail_total">
                                 <?=$total_left?> 
                                 / <?=$tleftpackage?> &#8377;
                                 </span></strong>
                              </p>
                              <p><strong>Right :  <span class="box_red">
                                 <?=$total_right?> 
                                 / <?=$trightpackage?> &#8377;
                                 </span></strong>
                              </p>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
         </div>
         <div class="col-md-4">
               <div class=" bg-light hover-up">
                  <section class="panel panel_back3">
                     <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <div class="ht-fix bg-purple">
                            <i class="fa fa-users ewalet-tile card_icon" style=""></i>
                        </div>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                           <div class="value used">
                              <h3 class=" count4">Direct</h3>
                              <p><strong>Users :  <span class="box_red" id="mail_total">
                                 <?=$duser?>
                                 </span></strong>
                              </p>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         <div class="col-md-4">
               <div class=" bg-light hover-up">
                  <section class="panel panel_back3">
                     <div class="row">
                        <div class="col-sm-4 col-xs-4">
                            <div class="ht-fix bg-nevy">
                            <i class="fa fa-trophy ewalet-tile card_icon" style=""></i>
                        </div>
                        </div>
                        <div class="col-sm-8 col-xs-8"  style="padding-left: 0px;">
                           <div class="value used">
                              <h3 class=" count4">Reward</h3>
                              <p><strong>Achived :  <span class="box_red" id="mail_total">
                                 <?php
                                    $sql_c = "SELECT reward FROM `rewards` WHERE `mid` = '$mid' ORDER BY 'bdate'";  
                                    
                                    $result_c = mysqli_query($s_dbid,$sql_c);
                                    
                                    list($rank) = mysqli_fetch_row($result_c);                                 
                                    
                                    if(isset($rank)){
                                    
                                        echo $rank;
                                    
                                    }
                                    
                                    else{
                                    
                                        echo "No";
                                    
                                    }
                                                                       
                                    
                                    ?>
                                 </span>
                             </strong>
                              </p>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
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
                  Referal Link
               </div>
               <div class="panel-body">
                  <div class="padd10">
                     <p><strong>Left : </strong> </p>
                     <div class="row" style="padding: 0 10px">
                        <div class="col-md-10" style="padding: 0">
                           <span class="box_red" id="mail_total">
                           <input id="inputLeft" type="text" class="form-control"   value="https://brightright.co.in/signup.php?ref=<?=$username?>&pos=Left" name="" readonly>
                           </span>
                        </div>
                        <div class="col-md-2" style="padding: 0;">
                           <button type="button" onclick="copyToclip('inputLeft')" class="btn btn-primary form-control">Copy Link</button>
                        </div>
                     </div>
                  </div>
                  <div class="padd10">
                     <p><strong>Right : </strong> </p>
                     <div class="row" style="padding: 0 10px">
                        <div class="col-md-10" style="padding: 0">
                           <span class="box_red" id="mail_total">
                           <input id="inputRight" type="text" class="form-control"  value="https://brightright.co.in/signup.php?ref=<?=$username?>&pos=Right" name="" readonly>
                           </span>
                        </div>
                        <div class="col-md-2" style="padding: 0;">
                           <button type="button"   onclick="copyToclip('inputRight')" class="btn btn-primary form-control">Copy Link</button>
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
<script type="text/javascript" src="assets/toster.js"></script>
<script type="text/javascript">
   function copyToclip(inputID) {
   
   var copyText = document.getElementById(inputID);
   
   copyText.select();
   
   document.execCommand("copy");
   
   $.toaster('Link Copied');
   
   }
   
</script>
</body>
</html>