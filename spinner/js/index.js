var rotationsTime = 5;
var wheelSpinTime = 2;
var ballSpinTime = 1;
var numorder = [
  0,
  32,
  15,
  19,
  4,
  21,
  2,
  25,
  17,
  34,
  6,
  27,
  13,
  36,
  11,
  30,
  8,
  23,
  10,
  5,
  24,
  16,
  33,
  1,
  20,
  14,
  31,
  9,
  22,
  18,
  29,
  7,
  28,
  12,
  35,
  3,
  26
];
var numred = [
  32,
  19,
  21,
  25,
  34,
  27,
  36,
  30,
  23,
  5,
  16,
  1,
  14,
  9,
  18,
  7,
  12,
  3
];
var numblack = [
  15,
  4,
  2,
  17,
  6,
  13,
  11,
  8,
  10,
  24,
  33,
  20,
  31,
  22,
  29,
  28,
  35,
  26
];
// $('#test').val('vicky_kashyap'); working here
var numgreen = [0];
var numbg = $(".pieContainer");
var ballbg = $(".ball");
var btnSpin = $("#btnSpin");
var toppart = $("#toppart");
var pfx = $.keyframe.getVendorPrefix();
var transform = pfx + "transform";
var rinner = $("#rcircle");
var numberLoc = [];
// var test = $('#main_wallet').hide();

//alert(amount);
//return false;
$.keyframe.debug = true;



createWheel();
function createWheel() {
  var temparc = 360 / numorder.length;
  for (var i = 0; i < numorder.length; i++) {
    numberLoc[numorder[i]] = [];
    numberLoc[numorder[i]][0] = i * temparc;
    numberLoc[numorder[i]][1] = i * temparc + temparc;

    newSlice = document.createElement("div");
    $(newSlice).addClass("hold");
    newHold = document.createElement("div");
    $(newHold).addClass("pie");
    newNumber = document.createElement("div");
    $(newNumber).addClass("num");

    newNumber.innerHTML = numorder[i];
    $(newSlice).attr("id", "rSlice" + i);
    $(newSlice).css(
      "transform",
      "rotate(" + numberLoc[numorder[i]][0] + "deg)"
    );

    $(newHold).css("transform", "rotate(9.73deg)");
    $(newHold).css("-webkit-transform", "rotate(9.73deg)");

    if ($.inArray(numorder[i], numgreen) > -1) {
      $(newHold).addClass("greenbg");
    } else if ($.inArray(numorder[i], numred) > -1) {
      $(newHold).addClass("redbg");
    } else if ($.inArray(numorder[i], numblack) > -1) {
      $(newHold).addClass("greybg");
    }

    $(newNumber).appendTo(newSlice);
    $(newHold).appendTo(newSlice);
    $(newSlice).appendTo(rinner);
  }
  //console.log(numberLoc);
}

btnSpin.click(function()
{
  

  var play_amount = $('#amount').val();
  var wallet_amount = $('#wallet_amount').val();
    // alert(play_amount); return false;
  if(play_amount=="")
  {
      swal("Please Enter A Amount To play");
  }
  else
  {


    if(parseInt(play_amount) <= parseInt(wallet_amount))
    {
      if ($("input").val() == "")
      {
        var rndNum = Math.floor(Math.random() * 34 + 0);
      } 
      else
      {
        var rndNum = $("input").val();
      }

        winningNum = rndNum;
        spinTo(winningNum);
        // swal("Good job!", "You clicked the button!", "success");
        setTimeout(function() { swalmsg(winningNum); }, 5000);
    }
    else
    {
      swal("Insufficient Wallet Amount!");
    }
    
  }


  
});

function swalmsg(num)
{
  var result = 0;
  if(parseInt(num)==0)
  {
    
    var result = -2;
  }
  else if(parseInt(num)==1)
  {
    
    var result = -3;
  }
  else if(parseInt(num)==2)
  {
    
    var result = 20;
  }
  else if(parseInt(num)==3)
  {
    
    var result = -90;
  }
  else if(parseInt(num)==4)
  {
   
    var result = 60;
  }
  else if(parseInt(num)==5)
  {
    
    var result = -80;
  }
  else if(parseInt(num)==6)
  {
    
    var result = -20;
  }
  else if(parseInt(num)==7)
  {
    
    var result = 15;
  }
  else if(parseInt(num)==8)
  {
    
    var result = -10;
  }
  else if(parseInt(num)==9)
  {
    
    var result = -1;
  }
  else if(parseInt(num)==10)
  {
    
    var result = -50; 
  }
  else if(parseInt(num)==11)
  {
    
    var result = 20;
  }
  else if(parseInt(num)==12)
  {
    
    var result = -10;
  }
  else if(parseInt(num)==13)
  {
    
    var result = 50;
  }
  else if(parseInt(num)==14)
  {
    
    var result = -20;
  }
  else if(parseInt(num)==15)
  {
    
    var result = -60;
  }
  else if(parseInt(num)==16)
  {
    
    var result = 100;
  }
  else if(parseInt(num)==17)
  {
    
    var result = -5;
  }
  else if(parseInt(num)==18)
  {
    
    var result = -40;
  }
  else if(parseInt(num)==19)
  {
    
    var result = 20;
  }
  else if(parseInt(num)==20)
  {
    
    var result = -50;
  }
  else if(parseInt(num)==21)
  {
    
    var result = 10;
  }
  else if(parseInt(num)==22)
  {
    
    var result = -100;
  }
  else if(parseInt(num)==23)
  {
    
    var result = 5;
  }
  else if(parseInt(num)==24)
  {
    
    var result = -70;
  }
 else if(parseInt(num)==25)
  {
    
    var result = -80;
  }
 else if(parseInt(num)==26)
  {
    
    var result = -60;
  }
 else if(parseInt(num)==27)
  {
    
    var result = -70;
  }
 else if(parseInt(num)==28)
  {
    
    var result = -80;
  }
 else if(parseInt(num)==29)
  {
    
    var result = -90;
  }
 else if(parseInt(num)==30)
  {
    
    var result = -10;
  }
 else if(parseInt(num)==31)
  {
    
    var result = 20;
  }
 else if(parseInt(num)==32)
  {
    
    var result = -60;
  }
 else if(parseInt(num)==33)
  {
    
    var result = -40;
  }
 else if(parseInt(num)==34)
  {
    
    var result = -5;
  }
 else
  {
    
    var result = 10;
  }
 
  if(result >0)
  {
    swal("You Win!", " Roullete Game Number is  " + num, "success"); 
  }
  else
  {
    swal("You Loose!", "Roullete Game Number is" + num, "error");
  }

  insert_transaction(num,result);
  // update_wallet_amount(result);
  // $('#main_wallet').val(900);
  update(result);

}
$("#btnb").click(function() {
  $(".spinner").css("font-size", "+=.3em");
});
$("#btns").click(function() {
  $(".spinner").css("font-size", "-=.3em");
});

function resetAni() {
  animationPlayState = "animation-play-state";
  playStateRunning = "running";

  $(ballbg)
    .css(pfx + animationPlayState, playStateRunning)
    .css(pfx + "animation", "none");

  $(numbg)
    .css(pfx + animationPlayState, playStateRunning)
    .css(pfx + "animation", "none");
  $(toppart)
    .css(pfx + animationPlayState, playStateRunning)
    .css(pfx + "animation", "none");

  $("#rotate2").html("");
  $("#rotate").html("");
}

function spinTo(num) {
  //get location
  var temp = numberLoc[num][0] + 4;

  //randomize
  var rndSpace = Math.floor(Math.random() * 360 + 1);

  resetAni();
  setTimeout(function() {
    bgrotateTo(rndSpace);
    ballrotateTo(rndSpace + temp);
  }, 500);
  //swal("Good job!", "You Won!", "success");
}

function ballrotateTo(deg) {
  var temptime = rotationsTime + 's';
  var dest = -360 * ballSpinTime - (360 - deg);
  $.keyframe.define({
    name: "rotate2",
    from: {
      transform: "rotate(0deg)"
    },
    to: {
      transform: "rotate(" + dest + "deg)"
    }
  });

  $(ballbg).playKeyframe({
    name: "rotate2", // name of the keyframe you want to bind to the selected element
    duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
    timingFunction: "ease-in-out", // [optional, default: ease] specifies the speed curve of the animation
    complete: function() {
      finishSpin(result);
    } //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
  });
}

function bgrotateTo(deg) {
  var dest = 360 * wheelSpinTime + deg;
  var temptime = (rotationsTime * 1000 - 1000) / 1000 + 's';

  $.keyframe.define({
    name: "rotate",
    from: {
      transform: "rotate(0deg)"
    },
    to: {
      transform: "rotate(" + dest + "deg)"
    }
  });

  $(numbg).playKeyframe({
    name: "rotate", // name of the keyframe you want to bind to the selected element
    duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
    timingFunction: "ease-in-out", // [optional, default: ease] specifies the speed curve of the animation
    complete: function() {} //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
  });

  $(toppart).playKeyframe({
    name: "rotate", // name of the keyframe you want to bind to the selected element
    duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
    timingFunction: "ease-in-out", // [optional, default: ease] specifies the speed curve of the animation
    complete: function() {} //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
  });
}

//ajax function to insert transaction
function insert_transaction(num,result)
{
  var user_id = $('#user_id').val();
  var outcome = num;
  var result_num = result;
  // alert(user_id);
  // alert(outcome);
  $.ajax({
    type: "POST",
    url: "http://localhost/cryptobtcbank/" + "user_panel/spinner_transaction",
    dataType: 'json',
    data: {id:user_id,winnumber:outcome,res:result_num},
    success: function(data)
    {
      //alert(data);
     // alert(data);
     // console.log(data);
      // $('#test').val('vicky');
      // $('#city').html(data);
    },
  });


}
//$('#main_wallet').hide();