
<?php
	session_start();
	$pic = $_SESSION['picture'];
	if (strpos($_SESSION['picture'], 'gif') !== false){
        $image = $_SESSION['picture'];
    }else{
        // $repImg = str_replace("@","",$_SESSION['picture']);
        // $rep1Img = str_replace(".jpg",".png",$repImg);
        // $list = explode(".png", $repImg);
        // $image = 'merge/'.$list[0].".png";   
        // $_SESSION['picture'] = $image; 
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>PhotoLive</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/Bootstrap.min.css">
	<link rel="stylesheet" href="css/stylesss.css">
	<script type="text/javascript" src="js/html2canvas.js"></script>
	<script src = "js/jquery-3.1.1.min.js"></script>
	<style type="text/css">
	 html, body, .container-table {
    height: 100%;
	}
	.container-table {
	    display: table;
	}
	.vertical-center-row {
	    display: table-cell;
	    vertical-align: middle;
	}
	#cover{
		position: absolute;
		top: 0px;
		left: -34%;
	}

	#background{
		position: relative;
	}
	#status{
        color:black;
    }
</style>  
</head>

<body>
<div class = "container container-table container-fluid">
<div class = "row" style="margin-top: 50px;">
	<div class = "col-sm-10 vertical-center-row all">
		<div id = "background" class="text-center col-md-4 col-md-offset-4">
			<div><img id="image1" class = "flex-center" src=""></div>
			<div>
	     	<img id="image2" class = "flex-center" src="">
	     	<img id="image3" class = "flex-center" src="">
	     	<img id="image4" class = "flex-center" src=""></div>
	     	<div id = "cover" class="text-center col-md-4 col-md-offset-4">
	     	</div> 
	     	<div><img id ="image5" class = "flex-center" src=""></div>
		</div>
	</div>
	<div class="col-sm-2 border-right">
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
</div>

<div class = "col-md-10 col-md-offset-1" style="margin-top:30px;"">
	<div class="col-md-12">
		<input style = "width: 100%;" id="status" type="" name="" value="" placeholder="Insert Caption">
	</div>
</div>

<div class = "container-fluid">
	<div class = "row" style="margin-left: 10%">
		<div class = "col-md-10 col-md-offset-1" style="margin-top: 20px;">
	    	<div class = "col-sm-6">
	          	<div>
	            	<div class ="flex-center"><a href="regular-booth"><img src="images/btnRetake.png" style="margin-bottom: 20px" class = "frame"></a></div>
	          	</div>
	    	</div>
	     	<div class = "col-sm-6">
	          	<div>
	            	<div class ="flex-center"><a onclick="share()"><img src="images/btnShare.png" style="margin-bottom: 20px" class = "frame"></a></div>
	          	</div>
	    	</div>
	    </div>
    </div>
</div>
	<script type="text/javascript">

	window.onload = function(){
		$("#status").hide();
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
		var phpVar = "<?php echo $pic?>";
		var split_pic = phpVar.split("@");
		var background = document.getElementById("background");
		var cover = document.getElementById("cover");
		var image1 = document.getElementById("image1");
		var image2 = document.getElementById("image2");
		var image3 = document.getElementById("image3");
		var image4 = document.getElementById("image4");
		var image5 = document.getElementById("image5");
		// for (var i = 1; i < split_pic.length; i++) {
		// 	alert(split_pic[i]);
		// }
		if(split_pic.length-1 == 1){
			frame1();
		}else if(split_pic.length-1 == 4){
			frame2();
		}else if(split_pic.length-1 == 3){
			frame3();
		}
		savePic();

		function savePic(){
			html2canvas(document.getElementsByClassName('all'), {
			   onrendered: function(canvas) {
			  	var img = canvas.toDataURL('image/png');
			  	var currentdate = new Date(); 
				// var datetime = currentdate.getDate() + ""
				//                 + (currentdate.getMonth()+1)  + "" 
				//                 + currentdate.getFullYear() + ""  
				//                 + currentdate.getHours() + ""  
				//                 + currentdate.getMinutes() + "" 
				//                 + currentdate.getSeconds();
				var str = '<?php echo $pic ?>';
				var session_pic = str.replace("@", "");
				var res = session_pic.split(".png");
				var datetime = res[0]+".png";
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				saveToUploads(img,datetime,CSRF_TOKEN);
				
				}
			});
		}
		function saveToUploads(uri,datetime,CSRF_TOKEN){

				$.ajax({
				    type: "POST",
				    url: "mergepic",
				    data: {
						_token: CSRF_TOKEN,
						base64image: uri,
						fname: datetime
					},
				    dataType: 'JSON',
				    success: function (data) {
					console.log(data);
					}
				});
		}

		function frame1(){
			background.style.backgroundImage = "url('images/frame1.png')";
			background.style.height = "524px";
			background.style.width = "443px";
			cover.style.backgroundImage = "url('images/frame1.png')";
			cover.style.width = "443px";
			cover.style.height = "524px";
			image1.src = "uploads/"+split_pic[1];
			image1.style.height = "280px";
			image1.style.width = "400px";
			image1.style.marginTop = "40px";
		}
		function frame2(){
			background.style.backgroundImage = "url('images/frame2.png')";
			background.style.height = "526px";
			background.style.width = "802px";
			background.style.marginLeft = "15%";
			/*cover.style.backgroundImage = "url('images/frame2.png')";
			cover.style.width = "443px";
			cover.style.height = "524px";*/

			image1.src = "uploads/"+split_pic[1];
			image1.style.height = "330px";
			image1.style.width = "440px";
			image1.style.marginTop = "40px";
			image1.style.marginLeft = " -303px";

			image2.src = "uploads/"+split_pic[2];
			image2.style.height = "103px";
			image2.style.width = "136px";
			image2.style.marginTop = "20px";
			image2.style.marginLeft = "-305px";

			
			image3.src = "uploads/"+split_pic[3];
			image3.style.height = "103px";
			image3.style.width = "136px";
			image3.style.marginTop = "20px";
			image3.style.marginLeft = "12px";
			
			image4.src = "uploads/"+split_pic[4];
			image4.style.height = "103px";
			image4.style.width = "136px";
			image4.style.marginTop = "20px";
			image4.style.marginLeft = "12px";
		}
		function frame3(){
			background.style.backgroundImage = "url('images/frame3.png')";
			background.style.height = "526px";
			background.style.width = "173px";
			background.style.marginLeft = "45%";
			/*cover.style.backgroundImage = "url('images/frame2.png')";
			cover.style.width = "443px";
			cover.style.height = "524px";*/


			image1.src = "uploads/"+split_pic[1];
			image1.style.height = "113px";
			image1.style.width = "151px";
			image1.style.marginTop = "20px";
			image1.style.marginLeft = "-4px";
			
			image2.src = "uploads/"+split_pic[2];
			image2.style.height = "113px";
			image2.style.width = "151px";
			image2.style.marginTop = "18px";
			image2.style.marginLeft = "-4px";
			
			image3.src = "uploads/"+split_pic[3];
			image3.style.height = "113px";
			image3.style.width = "151px";
			image3.style.marginTop = "18px";
			image3.style.marginLeft = "-4px";
		}
	</script>
</body>
</html>