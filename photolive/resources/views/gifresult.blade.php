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
<html>
<head>
	<title>Photolive</title>
	<meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	<div class = "row">
		<div class = "col-sm-12">
			<div class = "row" style="margin-top: 40px;">
		          <div class = "col-sm-9">
		              <div>
		                  <div class ="flex-center"><img id = "gif-created" src="images/frame.gif" style="width: 100%;"></div>
		              </div>
		          </div>
		          <div class = "col-sm-3">
		          	<div class = "row">
		      		 	<div class = "col-sm-12">
		                    <div>
		                    	<img id="pic-one" src="images/bg.jpg" onclick="frame1()" class = "flex-center  img-responsive  center-block ">
		                    </div>
		                </div>
		          	</div>
		          	<div class = "row" style="margin-top: 20px;">
		                <div class = "col-sm-12">
		                    <div>
		                    	<img id="pic-two" src="images/bg.jpg" onclick="frame2()" class = "flex-center  img-responsive  center-block ">
		                    </div>
		                </div>
			        </div>
			        <div class = "row" style="margin-top: 20px;">
		                <div class = "col-sm-12">
		                    <div>
		                    	<img id="pic-three" src="images/bg.jpg" onclick="frame3()" class = "flex-center   img-responsive  center-block">
		                    </div>
		                </div>
			        </div>
		          </div>
		    </div>
		</div>

		<div class = "col-md-10 col-md-offset-1" style="margin-top:30px;"">
			<div class="col-md-12">
				<input style = "width: 100%;" id="status" type="" name="" value="" placeholder="Insert Caption">
			</div>
		</div>

		<div class = "col-md-10 col-md-offset-1">
			<div class = "col-sm-3">
				<div class = "col-sm-12 flex-center">
                    <div  style="width:50%; height:50%; margin-top: 30px">
                      <img src="images/email.png" onclick="email()" class = " email flex-center img-responsive  center-block">
                    </div>
                </div>
            </div>
			<div class = "col-sm-3">
				<div class = "col-sm-12 flex-center">
                    <div  style="width:50%; height:50%; margin-top: 30px">
                       <img src="images/facebook.png"  onclick="facebook()" class = "flex-center img-responsive  center-block facebook">
                    </div>
                </div>
			</div>
			<div class = "col-sm-3">
				<div class = "col-sm-12 flex-center">
                    <div style="width:50%; height:50%; margin-top: 30px">
                        <img src="images/twitter.png"  onclick="twitter()" class = "flex-center img-responsive  center-block twitter">
                    </div>
                </div>
			</div>
			<div class = "col-sm-3">
				<div class = "col-sm-12 flex-center">
                    <div style="width:50%; height:50%; margin-top: 30px">
                         <img src="images/instagram.png" onclick="instagram()" class = "flex-center img-responsive  center-block instagram">
                    </div>
                </div>
			</div>
		</div>
		
	
	</div>
		<div class = "row" style="margin-top: 40px;">
	          <div class = "col-sm-6">
	              <div>
	                  <div class ="flex-center"><a href="gif-booth"><img src="images/btnRetake.png" style="margin-bottom: 20px" class = "frame"></a></div>
	              </div>
	          </div>
	          <div class = "col-sm-6">
	              <div>
	                  <div class ="flex-center"><a onclick="share()"><img src="images/btnShare.png" style="margin-bottom: 20px" class = "frame"></a></div>
	              </div>
	          </div>
	    </div>
</div>

<script type="text/javascript">
	window.onload = function(){

		var pic1 = localStorage.getItem("pic1");
		var pic2 = localStorage.getItem("pic2");
		var pic3 = localStorage.getItem("pic3");
		var gif = pic1.replace('.png','.gif');
		$("#status").hide();

		//$("#gif-created").attr('src', "gif/17320179525.gif");
		document.getElementById("gif-created").src = "gif/"+gif;
		document.getElementById("pic-one").src = "uploads/"+pic1;
		document.getElementById("pic-two").src = "uploads/"+pic2;
		document.getElementById("pic-three").src = "uploads/"+pic3;
	};

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
	$("#status").show(1000);
	}

	function facebook(){
	hover = false;
	select = 2;
	$(".email").attr("src","images/email.png");
	$(".facebook").attr("src","images/hfacebook.png");
	$(".twitter").attr("src","images/twitter.png");
	$(".instagram").attr("src","images/instagram.png");
	$("#status").hide(1000);
	}

	function twitter(){
	hover = false;
	select = 3;
	$(".email").attr("src","images/email.png");
	$(".facebook").attr("src","images/facebook.png");
	$(".twitter").attr("src","images/htwitter.png");
	$(".instagram").attr("src","images/instagram.png");
	$("#status").show(1000);
	}

	function instagram(){
	hover = false;
	select = 4;
	$(".email").attr("src","images/email.png");
	$(".facebook").attr("src","images/facebook.png");
	$(".twitter").attr("src","images/twitter.png");
	$(".instagram").attr("src","images/hinstagram.png");
	$("#status").hide(1000);
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