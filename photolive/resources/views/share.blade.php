<?php
    session_start();
    if (strpos($_SESSION['picture'], 'gif') !== false){
        $image = $_SESSION['picture'];
    }else{
        $repImg = str_replace("@","",$_SESSION['picture']);
        $rep1Img = str_replace(".jpg",".png",$repImg);
        $list = explode(".png", $repImg);
        $image = 'merge/'.$list[0].".png";   
        $_SESSION['picture'] = $image; 
    }
 ?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Photolive</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesss.css" rel="stylesheet">
    <script src = "js/jquery-3.1.1.min.js"></script>    
    <script src = "js/photolive.js"></script>  

    <style type="text/css">
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        #status{
            color:black;
        }

    </style>

</head>
<body>
<div class = "container-fluid">
    <div class = "row" style="margin-top: 80px">
        <div class = "col-sm-9 border-left">
           
           <div class = "row">
                <div class = "col-sm-12">
                    <div   style="width:80%; height:50%;">
                        <img src="<?php echo $image; ?>"  class = "margin img-responsive  center-block">
                    </div>
                </div>
            </div>
            <div><input id="status" type="" name="" value=""></div>

            <div class = "row">
                <div class = "col-sm-12">
                    <div style="width:80%; height:50%;">
                        <a href="#" onclick="share()"><img src="images/btnShare.png"  class = "btnMargin img-responsive center-block"></a>
                    </div>
                </div>
            </div>
        

        </div>

        <div class = "col-sm-2   border-right"> 
           
           <div class = "row">
                <div class = "col-sm-12">
                    <div  style="width:50%; height:50%; margin-top: 30px">
                      <img src="images/email.png" onclick="email()" class = " email flex-center img-responsive  center-block">
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class = "col-sm-12">
                    <div  style="width:50%; height:50%; margin-top: 30px">
                       <img src="images/facebook.png"  onclick="facebook()" class = "flex-center img-responsive  center-block facebook">
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class = "col-sm-12">
                    <div style="width:50%; height:50%; margin-top: 30px">
                        <img src="images/twitter.png"  onclick="twitter()" class = "flex-center img-responsive  center-block twitter">
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class = "col-sm-12">
                    <div style="width:50%; height:50%; margin-top: 30px">
                         <img src="images/instagram.png" onclick="instagram()" class = "flex-center img-responsive  center-block instagram">
                    </div>
                </div>
            </div>

           
        </div>
    </div>

<nav aria-label="...">
    <ul class="pager">
      <li class="previous"><a href="regresult.html"><span aria-hidden="true">&larr;</span>Back</a></li>
      
    </ul>
  </nav>
</div>

<script>

var hover = true;
var select = 0;

$(".email").hover(function(){
    if(hover){$(this).attr("src", "images/hemail.png");}
    }, function(){
    if(hover){$(this).attr("src", "images/email.png");}
});

$(".facebook").hover(function(){
    if(hover){$(this).attr("src", "images/hfacebook.png");}
    }, function(){
    if(hover){$(this).attr("src", "images/facebook.png");}
});

$(".twitter").hover(function(){
    if(hover){$(this).attr("src", "images/htwitter.png");}
    }, function(){
    if(hover){$(this).attr("src", "images/twitter.png");}
});

$(".instagram").hover(function(){
    if(hover){$(this).attr("src", "images/hinstagram.png");}
    }, function(){
    if(hover){$(this).attr("src", "images/instagram.png");}
});

$('.email').on('click', function () {
     if(hover){$(this).attr("src", "images/hemail.png");}
     if(hover){$(this).unbind('hover');}
    
});

function email(){
hover = false;
select = 1;
$(".email").attr("src","images/hemail.png");
$(".facebook").attr("src","images/facebook.png");
$(".twitter").attr("src","images/twitter.png");
$(".instagram").attr("src","images/instagram.png");
}

function facebook(){
hover = false;
select = 2;
$(".email").attr("src","images/email.png");
$(".facebook").attr("src","images/hfacebook.png");
$(".twitter").attr("src","images/twitter.png");
$(".instagram").attr("src","images/instagram.png");
}

function twitter(){
hover = false;
select = 3;
$(".email").attr("src","images/email.png");
$(".facebook").attr("src","images/facebook.png");
$(".twitter").attr("src","images/htwitter.png");
$(".instagram").attr("src","images/instagram.png");
}

function instagram(){
hover = false;
select = 4;
$(".email").attr("src","images/email.png");
$(".facebook").attr("src","images/facebook.png");
$(".twitter").attr("src","images/twitter.png");
$(".instagram").attr("src","images/hinstagram.png");
}

function share(){
    var status = document.getElementById("status").value;

if(select == 1){
    //email
}
if(select == 2){
    //facebook
}
if(select == 3){
   //twitter
   window.location.href = "twitter-share/"+status;
}
if(select == 4){
   //instagram
}
}

</script>

</body>
</html>