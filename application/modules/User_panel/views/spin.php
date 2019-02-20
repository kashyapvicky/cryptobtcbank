
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>jQuery Roulette</title>
  
  <script src="<?php echo base_url()?>spinner/js/sweetalert.min.js"></script>
  <style type="text/css">
    #amount::placeholder{
      color: #fff;
    }
    #amount
    {
      margin-top: 62px;
    margin-left: -16%;
    background-color: red;
    padding-left: 30px;
    text-decoration-color: red;
    height: 5vh;
    width: 200px;
    outline: 0;
    border: 0;
    padding: 8px 7px 7px 12px;
    border-radius: 3px;
    color: #fff;
    }
    #btnSpin
    {
    float: right;
    margin-top: 61px;
    background-color: red;
    border-radius: 5px;
    height: 2.6em;
    }
  </style>

  
</head>

<body background="<?php echo base_url()?>spinner/images/roullete_image.jpg">
  <link rel="stylesheet" href="<?php echo base_url()?>spinner/css/style.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css"> -->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/138980/jquery.keyframes.min.js'></script>

  <div class="spinner" style="font-size: 10px;">

    <div class="ball"><span></span></div>
    <div class="platebg"></div>
    <div class="platetop"></div>
    <div id="toppart" class="topnodebox">
      <div class="silvernode"></div>
      <div class="topnode silverbg"></div>
      <span class="top silverbg"></span>
      <span class="right silverbg"></span>
      <span class="down silverbg"></span>
      <span class="left silverbg"></span>
    </div>
    <div id="rcircle" class="pieContainer">
      <div class="pieBackground"></div>
    </div>
  </div>
  <div style="margin-top: 5%; margin-left: 5%">
      <span style="color: red; font-size: 24px; font-weight: bold;">Wallet Amount : </span>
      <span id="amount_span" style="color: white; font-weight: 600; font-size: 22px;">$<?php echo $wallet_amount; ?></span>
  </div>
  <!-- <div style="background-color: red; margin-top:20%;  float: right; width:20%">
    <p>is there any div here</p>
  </div> -->
  <div class="control">
    <span class="message">
       <input id="numwin" type="hidden" value=""><br><br>
     
       <input id="wallet_amount" type="hidden" value="<?php echo $wallet_amount; ?>">
      <?php $userdata = $this->session->userdata('userdata');?>
      <input id="user_id" type="hidden" value="<?php echo  $userdata['id']?>">
    </span>
    <div>
      <div id="btnSpin" class="button">Spin</div>

      <input type="number" autocomplete="off"  placeholder="Enter Amount" value="" id="amount">
      <!-- <div id="btnb" class="button">Bigger</div>
      <div id="btns" class="button">Smaller</div> -->
    </div>
  </div>

</body>

</html>
<script  src="<?php echo base_url()?>spinner/js/index.js"></script>
<script>
  function update(result)
  {
    // alert(result);
    var win_loose_number = result;
     // alert(amount_to_add_sub); return false;
    var wallet_amount = $('#wallet_amount').val();
    var amount = $('#amount').val();
    var user_id = $('#user_id').val();
    var amount_to_add_sub = parseInt((amount * win_loose_number)/100);

    var remaining_balance = parseInt(wallet_amount) + amount_to_add_sub;
    // alert(remaining_balance); return false;
    // alert(amount_to_add_sub); return false;
    $.ajax({
    type: "POST",
    url: "<?php echo base_url()?>" + "user_panel/update_wallet_amount",
    dataType: 'json',
    data: {id:user_id,amount:amount_to_add_sub},
    success: function(data)
    {
      $('#wallet_amount').val(remaining_balance);
      $('#amount_span').html(remaining_balance);
    },
  });

  }
</script>