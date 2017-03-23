
<?php
	session_start();
	$pic = $_SESSION['picture'];
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
</style>  
</head>

<body>
<div class = "container container-table container-fluid all">
	<div class = "row vertical-center-row">
		<div id = "background" class="text-center col-md-4 col-md-offset-4">
			<div><img id="image1" class = "flex-center" src=""></div>
			<div>
	     	<img id="image2" class = "flex-center" src="">
	     	<img id="image3" class = "flex-center" src="">
	     	<img id="image4" class = "flex-center" src=""></div>
	     	<div><img id ="image5" class = "flex-center" src=""></div>
	     	<div id = "cover" class="text-center col-md-4 col-md-offset-4">
	     	</div>
		</div>
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
	            	<div class ="flex-center"><a href="facebook.com"><img src="images/btnShare.png" style="margin-bottom: 20px" class = "frame"></a></div>
	          	</div>
	    	</div>
	    </div>
    </div>
</div>
	<script type="text/javascript">
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
				var datetime = currentdate.getDate() + ""
				                + (currentdate.getMonth()+1)  + "" 
				                + currentdate.getFullYear() + ""  
				                + currentdate.getHours() + ""  
				                + currentdate.getMinutes() + "" 
				                + currentdate.getSeconds();
				
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
			
			image5.src = "uploads/"+split_pic[3];
			image5.style.height = "113px";
			image5.style.width = "151px";
			image5.style.marginTop = "18px";
			image5.style.marginLeft = "-4px";
		}
	</script>
</body>
</html>