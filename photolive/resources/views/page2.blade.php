<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Photolive</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesss.css" rel="stylesheet">
    <script src = "js/jquery-3.1.1.min.js"></script>    
    <script src = "js/photolive.js"></script>  

   
</head>

<body>

<div class = "container-fluid">
    <div class = "row" style="margin-top: 50px">
        <div class = "col-sm-6">
           
           <div class = "row">
                <div class = "col-sm-12">
                    <div style="width:80%; height:50%;">
                        <a href="#"><img src="images/frame.gif"  onclick="gifPage3()" class = "start margin img-responsive  center-block"></a>
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class = "col-sm-12">
                    <div style="width:80%; height:50%;">
                        <a href="#"><img src="images/btnGif2.png"  onclick="gifPage3()" class = "start btnMargin img-responsive  center-block"></a>
                    </div>
                </div>
            </div>
        

        </div>

        <div class = "col-sm-6"> 
           
           <div class = "row">
                <div class = "col-sm-12">
                    <div  style="width:80%; height:50%;">
                        <a href="#"><img src="images/icon.png"  onclick="regPage3()" class = "start margin img-responsive  center-block"></a>
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class = "col-sm-12">
                    <div style="width:80%; height:50%;">
                        <a href="#"><img src="images/btnReg2.png"  onclick="regPage3()" class = "start btnMargin img-responsive  center-block"></a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    <div id = "text-center">
    <h1 id = "count"></h1>
    </div>
    <div id = "text-top">
    </div>
    <nav aria-label="...">
    <ul class="pager">
      <li class="previous"><a href="/"><span aria-hidden="true">&larr;</span>Back</a></li>
      <li class="next disabled"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
    </ul>
  </nav>
</div>

<script>
var idleTime = 20, flag = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 minute
    flag = 0;
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        document.getElementById("count").innerHTML ="";
        document.getElementById("text-top").innerHTML = "";
        idleTime = 20;
        flag = 0;
    });
    $(this).keypress(function (e) {
        document.getElementById("count").innerHTML = "";
        document.getElementById("text-top").innerHTML = "";
        idleTime = 20;
        flag = 0;
    });

});

function timerIncrement() {
    if(flag==0){
        idleTime = idleTime - 1;    
         //document.getElementById("text-top").innerHTML = idleTime+"";
    }
    
    if (idleTime <= 0) { // 20 seconds
        flag = 1;
        window.location.href = "/"
    }
    if (idleTime <=5){
        document.getElementById("count").innerHTML = idleTime;
        enlarge();

    }
    if (idleTime <=10 && idleTime>=6){
        document.getElementById("text-top").innerHTML = "**RETURNING HOME**";
    }
}

function enlarge(){
    $("h1").animate({"font-size":"80px"});
    original();
}
function original(){
    $("h1").animate({"font-size":"30px"});
}

function regPage3()
{
    /*flag = 1;
    $.ajax({
        url:"regPage3.php",
        cache:false,
        success:function(html){
            $("#wrapper").hide().html(html).fadeIn('slow');
        }
    });*/
    window.location.href = "regular-frame";
}
function gifPage3()
{
   /* $.ajax({
        url:"gifPage3.php",
        cache:false,
        success:function(html){
            $("#wrapper").hide().html(html).fadeIn('slow');
        }
    });*/
    window.location.href = "gif-booth";
}

</script>
</body>

</html>

