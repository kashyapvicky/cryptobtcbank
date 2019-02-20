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

$sql = "select id from `join` where `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);


 $sql = "select id,expairy,allocated_date from `activation_pin` where `allocated_user` = '$username'";
 $result = mysqli_query($s_dbid,$sql);

 $no_of_pin = mysqli_num_rows($result);

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
   .panel_control {
    padding: 20px 20px;
}
</style>


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
                  Pin Transfer
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
         jQuery(document).ready(function () {
            jQuery("#close_link").click(function ()
            {
            jQuery("#message_box").fadeOut(1000);
            jQuery("#message_box").removeClass('ok');
              });
            });
         
         
         
      </script>
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <i class="fa fa-bullhorn"></i>
                  Transfer Pin
                  <div class="panel-tools">
                     <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
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
                  <form action="transferpin.php" method="post">
                <div class="panel_control">
                  <div class="row">
                  <div class="col-md-4">
                     <input type="number" name="no_of_pin" placeholder="No of Pin" class="form-control" min="1" max="<?=$no_of_pin?>" required>
                  </div>
                   <div class="col-md-4">
                     <input type="text" name="transfer_to" placeholder="Transfer To" class="form-control" required>
                  </div>
                  <div class="col-md-4">
                     <button type="submit" class="btn btn-bricky form-control">
                        Transfer Pin <i class="fa fa-arrow-circle-right"></i>
                     </button>
                  </div>
                  </div>
                </div>
                </form>
                  <!-- </form> -->
               </div>
            </div>
         </div>
      </div>
      <!-- end: PAGE CONTAINER -->
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
                Pin List
            </div>
            <div class="panel-body">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> Please check the values you've submitted.
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-full-width table-bordered" id="">
                        <thead class="table-bordered">
                           <tr class="th">
                                    <th>#</th>
                                    <th>Allocated Date</th>
                                    <th>Activate User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                         <tbody>                                                                  
                                    <?php 
                                      $ctr=1;
                                      $sql = "select id,expairy,allocated_date from `activation_pin` where `allocated_user` = '$username' and expairy = '0'";
                                      $result = mysqli_query($s_dbid,$sql);
                                      while(list($pid, $expairy, $allocated_date) = mysqli_fetch_row($result)){
                                   
                                    ?>                                        

                                        <tr class="tr2">

                                            <td>
                                             <form method="post" action="activatebypin.php">
                                             <?=$ctr?>
                                                
                                             </td>

                                            <td><?=$allocated_date?></td>

                                            <td><input type="text" name="userid"></td>

                                            <td>
                                             <button type="submit" class="btn btn-bricky">Activate</button>
                                          </form>
                                          </td>

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
   </div>
   <!-- end : PAGE -->
</div>
<!-- end: MAIN CONTAINER -->


<?php
include 'includes/footer.php';
?>  
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php if (isset($_SESSION['msg'])){ ?>          
                <script>
                swal("Error!", "<?=$_SESSION['msg']?>", "error");
                </script>
             <?php } ?>

             <?php unset($_SESSION["msg"]); ?>

</div>
</body>
</html>