<?php //echo base_url();die;?>
    <!-- header area start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <div class="breadcrumb-lists">
                            <ul>
                                <li>
                                    <a href="index-2.html">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li>Features</li>
                                <li>Contact</li>
                            </ul>
                            <h1 class="page-title">Join Us Today</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->
<!-- contact page content area start -->
<section class="contact-page-content section-bg-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <span class="subtitle">Contact</span>
                    <h2 class="title">GET IN TOUCH</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the 1500s, when an unknown.</p>
                </div>
                <div class="contact-form-wrapper">
                      <?php echo validation_errors(); ?>  
                    <form action="<?php echo  base_url()?>website/register" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input required type="text" class="input-field" id="first_name" placeholder="First Name*" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input required type="text" class="input-field" onblur="is_exist()" id="user_id" placeholder="User Id*" name="user_name">
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input required type="text" onblur="is_sponser_exist()" class="input-field" id="sponser_id" placeholder="Sponser ID*" name="sponser_id">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                   <!--  <input type="text" class="input-field" id="last_name" placeholder="Position*" name="position"> -->
                                
                                <select required name="pos" class="input-field" placeholder="Position*">
                                <option class="input-field" value="Left" >Left</option>
                                <option class="input-field" value="Right" >Right</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input required type="text" class="input-field" id="first_name" placeholder="Mobile Number*" name="mobile_number">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input  type="email" required class="input-field" id="last_name" placeholder="Email*" name="email">
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input required type="text" class="input-field" id="first_name" placeholder="Password*" name="password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-element margin-bottom-30">
                                    <input required type="text" class="input-field" id="last_name" placeholder="Confirm Password*" name="confirm_password">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                 <!-- <div class="form-element margin-bottom-30">
                                    <input type="email" class="input-field" id="email" placeholder="Password*" name="password">
                                </div>
                                <div class="form-element margin-bottom-30">
                                    <input type="email" class="input-field" id="email" placeholder=" Confirm Password*" name="confirm_password">
                                </div> -->
                                
                                <input type="submit" class="submit-btn" value="submit now">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact page content area end -->

<!-- map area start -->
<div class="map contact-page" id="map"></div>
<!-- map area end -->

    <!-- subscription area start -->
    <section class="subscription-area section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 remove-col-padding">
                    <div class="subscription-inner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="left-content-area">
                                    <!-- left content area -->
                                    <span class="bg-icon">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <span class="subtitle">Enter Your Email To Request Access</span>
                                    <h4 class="title">Start Mining Now</h4>
                                </div>
                                <!-- //.left content area -->
                            </div>
                            <div class="col-lg-6">
                                <div class="right-content-area">
                                    <!-- right content area -->
                                    <div class="subsform-wrapper">
                                        <form action="http://idealbrothers.thesoftking.com/html/mirex/index.html">
                                            <div class="form-element">
                                                <input type="text" class="input-field" placeholder="Enter your email address......">
                                            </div>
                                            <input type="submit" class="submit-btn" value="get started">
                                        </form>
                                    </div>
                                </div>
                                <!-- //.right content area-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscription area end -->

    <!-- footer top area start -->
    <div class="footer-top logo-carousel section-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel" id="logo-carousel">
                        <!-- logo carousel -->
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="<?php echo base_url()?>assets/img/brands/01.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="<?php echo base_url()?>assets/img/brands/02.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="<?php echo base_url()?>assets/img/brands/03.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="<?php echo base_url()?>assets/img/brands/04.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="<?php echo base_url()?>assets/img/brands/05.png" alt="brand logo">
                            </a>
                        </div>
                        <div class="single-logo-item">
                            <a href="#">
                                <img src="<?php echo base_url()?>assets/img/brands/06.png" alt="brand logo">
                            </a>
                        </div>
                    </div>
                    <!-- //.logo carousel -->
                </div>
            </div>
        </div>
    </div>
    <!-- footer top area end -->
<script>

function is_exist()
{
    //alert('onblur function');
    var username = $("#user_id").val();
    // alert(username); return false;
    $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "website/is_username_exist",
    dataType: "json",
    data: {"user_name":username},
    success: function(data){
            console.log(data);
            if(data==1)
            {
                alert('username already exist');
                $('#user_id').val('');
            }
           
        },
        error : function(data) {
            alert('Something went wrong');
        }
    });
}

function is_sponser_exist()
{
    //alert('onblur function');
    var sponser = $("#sponser_id").val();
    // alert(username); return false;
    $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>" + "website/is_sponser_exist",
    dataType: "json",
    data: {"sponser_id":sponser},
    success: function(data){
            console.log(data);
            if(data==2)
            {
                alert('Sponser Not exist');
                $('#sponser_id').val('');
            }
           
        },
        error : function(data) {
            alert('Something went wrong');
        }
    });
}

</script>