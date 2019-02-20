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
<link rel="stylesheet" type="text/css" href="assets/repurchase_product.css">
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
                     Repurchase
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
                     <div id="carousel-example" class="carousel slide" data-ride="carousel">
                        <input type="hidden" id="path_root" name="path_root" value="https://infinitemlmsoftware.com/backoffice/"/>
                        <div class="carousel-inner">
                           <div class="row">
                              <div class="item ">
                                 <div class="col-md-2">
                                    <div class="col-item">
                                       <div class="photo">
                                          <img src="assets/polo-shirt-2.png" alt="a"style="width: 85px;"/>
                                       </div>
                                       <div class="info">
                                          <div class="row">
                                             <div class="price col-md-12">
                                                <h5>Plan 1</h5>
                                             </div>
                                             <div class="rating hidden-sm col-md-12" style="direction: ltr;">
                                                <h5 class="price-text-color">2500 <i class="fa fa-inr" aria-hidden="true" style="color:#000;font-size:14px"></i></h5>
                                             </div>
                                          </div>
                                          <div class="mfz-overlay"></div>
                                          <div class="separator clear-left">
                                             <p class="btn-add"> 
                                                <a href='product_details.php?pid=1' class="hidden-sm" id="add_to_cart_1" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                             </p>
                                             <p class="btn-details">
                                                <a href="product_details.php?pid=1" class="hidden-sm" data-toggle="tooltip" title="More Details"><i class="fa fa-eye"></i></a>
                                             </p>
                                          </div>
                                          <div class="clearfix">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item ">
                                 <div class="col-md-2">
                                    <div class="col-item">
                                       <div class="photo">
                                          <img src="assets/polo-shirt-2.png" alt="a"style="width: 85px;"/>
                                       </div>
                                       <div class="info">
                                          <div class="row">
                                             <div class="price col-md-12">
                                                <h5>Plan 2</h5>
                                             </div>
                                             <div class="rating hidden-sm col-md-12" style="direction: ltr;">
                                                <h5 class="price-text-color">5000 <i class="fa fa-inr" aria-hidden="true" style="color:#000;font-size:14px"></i></h5>
                                             </div>
                                          </div>
                                          <div class="mfz-overlay"></div>
                                          <div class="separator clear-left">
                                             <p class="btn-add"> 
                                                <a href='product_details.php?pid=2' class="hidden-sm" id="add_to_cart_1" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                             </p>
                                             <p class="btn-details">
                                                <a href="product_details.php?pid=2" class="hidden-sm" data-toggle="tooltip" title="More Details"><i class="fa fa-eye"></i></a>
                                             </p>
                                          </div>
                                          <div class="clearfix">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item ">
                                 <div class="col-md-2">
                                    <div class="col-item">
                                       <div class="photo">
                                          <img src="assets/polo-shirt-2.png" alt="a"style="width: 85px;"/>
                                       </div>
                                       <div class="info">
                                          <div class="row">
                                             <div class="price col-md-12">
                                                <h5>Plan 3</h5>
                                             </div>
                                             <div class="rating hidden-sm col-md-12" style="direction: ltr;">
                                                <h5 class="price-text-color">10000 <i class="fa fa-inr" aria-hidden="true" style="color:#000;font-size:14px"></i></h5>
                                             </div>
                                          </div>
                                          <div class="mfz-overlay"></div>
                                          <div class="separator clear-left">
                                             <p class="btn-add"> 
                                                <a href='product_details.php?pid=3' class="hidden-sm" id="add_to_cart_1" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                             </p>
                                             <p class="btn-details">
                                                <a href="product_details.php?pid=3" class="hidden-sm" data-toggle="tooltip" title="More Details"><i class="fa fa-eye"></i></a>
                                             </p>
                                          </div>
                                          <div class="clearfix">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item ">
                                 <div class="col-md-2">
                                    <div class="col-item">
                                       <div class="photo">
                                          <img src="assets/polo-shirt-2.png" alt="a"style="width: 85px;"/>
                                       </div>
                                       <div class="info">
                                          <div class="row">
                                             <div class="price col-md-12">
                                                <h5>Plan 4</h5>
                                             </div>
                                             <div class="rating hidden-sm col-md-12" style="direction: ltr;">
                                                <h5 class="price-text-color">25000 <i class="fa fa-inr" aria-hidden="true" style="color:#000;font-size:14px"></i></h5>
                                             </div>
                                          </div>
                                          <div class="mfz-overlay"></div>
                                          <div class="separator clear-left">
                                             <p class="btn-add"> 
                                                <a href='product_details.php?pid=4' class="hidden-sm" id="add_to_cart_1" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                             </p>
                                             <p class="btn-details">
                                                <a href="product_details.php?pid=4" class="hidden-sm" data-toggle="tooltip" title="More Details"><i class="fa fa-eye"></i></a>
                                             </p>
                                          </div>
                                          <div class="clearfix">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item ">
                                 <div class="col-md-2">
                                    <div class="col-item">
                                       <div class="photo">
                                          <img src="assets/polo-shirt-2.png" alt="a"style="width: 85px;"/>
                                       </div>
                                       <div class="info">
                                          <div class="row">
                                             <div class="price col-md-12">
                                                <h5>Plan 5</h5>
                                             </div>
                                             <div class="rating hidden-sm col-md-12" style="direction: ltr;">
                                                <h5 class="price-text-color">50000 <i class="fa fa-inr" aria-hidden="true" style="color:#000;font-size:14px"></i></h5>
                                             </div>
                                          </div>
                                          <div class="mfz-overlay"></div>
                                          <div class="separator clear-left">
                                             <p class="btn-add"> 
                                                <a href='product_details.php?pid=3' class="hidden-sm" id="add_to_cart_1" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                             </p>
                                             <p class="btn-details">
                                                <a href="product_details.php?pid=5" class="hidden-sm" data-toggle="tooltip" title="More Details"><i class="fa fa-eye"></i></a>
                                             </p>
                                          </div>
                                          <div class="clearfix">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="item ">
                                 <div class="col-md-2">
                                    <div class="col-item">
                                       <div class="photo">
                                          <img src="assets/polo-shirt-2.png" alt="a"style="width: 85px;"/>
                                       </div>
                                       <div class="info">
                                          <div class="row">
                                             <div class="price col-md-12">
                                                <h5>Plan 6</h5>
                                             </div>
                                             <div class="rating hidden-sm col-md-12" style="direction: ltr;">
                                                <h5 class="price-text-color">100000 <i class="fa fa-inr" aria-hidden="true" style="color:#000;font-size:14px"></i></h5>
                                             </div>
                                          </div>
                                          <div class="mfz-overlay"></div>
                                          <div class="separator clear-left">
                                             <p class="btn-add"> 
                                                <a href='product_details.php?pid=3' class="hidden-sm" id="add_to_cart_1" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                             </p>
                                             <p class="btn-details">
                                                <a href="product_details.php?pid=6" class="hidden-sm" data-toggle="tooltip" title="More Details"><i class="fa fa-eye"></i></a>
                                             </p>
                                          </div>
                                          <div class="clearfix">
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
         <!-- end: PAGE CONTAINER -->
      </div>
      <!-- end : PAGE -->
   </div>
   <!-- end: MAIN CONTAINER -->
   <?php
      include 'includes/footer.php';
      
      
      
      ?>
</div>
</body></html>

