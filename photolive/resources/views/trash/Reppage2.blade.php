<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Photolive</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src = "js/jquery-3.1.1.min.js"></script>    
    <script src = "js/photolive.js"></script>  

<style>
    #left{  
        background-color:#ffffff;
        width:50%;
        height:auto;
        display: table;
    }
    
    #right{
        background-color:#ffffff;
        width:50%;
        height:auto;
        display: table;
    }

</style>
   
</head>

<body>
<div id="wrapper">
<div id="left" class="container pull-left">
gif
<button type = "button" class = "btn btn-default btn-primary-outline" onclick="gifPage3()">
    <img style="width:100%; height:100vh;" src="images/bg.jpg">
</button>
</div>

<div id = "text-center">
    <h1 id = "count"></h1>
</div>

<div id="right" class="container pull-right">
reg
<button type = "button" class = "btn btn-default btn-primary-outline" onclick="regPage3()">
    <img style="width:100%; height:100vh;" src="images/bg.jpg">
</button>
</div>

<div id = "text-top">
</div>

</div>


<script>
var idleTime = 20, flag = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 minute
    flag = 0;
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        document.getElementById("count").innerHTML = "";
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
    flag = 1;
	window.location.href = ".html";
    
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
    window.location.href = "create-gif";
}

</script>
</body>

</html>

