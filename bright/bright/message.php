<?php include('header.php')?>

 <br><br>




 

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



<div class="row"> 

                              <div class="col-md-12">

                                <div class="alert alert-success">

                                     <?php if(@$_GET['msg']!="") echo  @$_GET['msg'];  ?> <br><br> 

                                    <p class="text-center"><a href="https://brightright.co.in" class="btn btn-primary">Click Here to Login</a></p>

                                 </div>
                              </div> 

                          </div>
        
  


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