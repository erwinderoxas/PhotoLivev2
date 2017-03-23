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
</style>  

</head>

<body>

<div class = "container-fluid">
	<div class = "row" style="margin-top: 40px;">
          <div class = "col-md-4 col-md-offset-4">
              <div>
                  <div class ="flex-center"><img id = "gif-created" src="images/frame.gif"></div>
              </div>
          </div>
    </div>
	
	<div class = "row">
		<div class = "col-md-10 col-md-offset-1" style="margin-top:40px;">
	     <div class = "col-sm-4">
	           <div class = "row">
	                <div class = "col-sm-12">
	                    <div style="background-color: #38c4e4;">
	                    <img id="pic-one" src="images/bg.jpg" onclick="frame1()" class = "flex-center  img-responsive  center-block ">
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class = "col-sm-4">
	           <div class = "row">
	                <div class = "col-sm-12">
	                    <div  style="background-color: #38c4e4;">
	                    <img id="pic-two" src="images/bg.jpg" onclick="frame2()" class = "flex-center  img-responsive  center-block ">
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class = "col-sm-4">
	           <div class = "row">
	                <div class = "col-sm-12">
	                    <div  style="background-color: #38c4e4;">
	                    <img id="pic-three" src="images/bg.jpg" onclick="frame3()" class = "flex-center   img-responsive  center-block">
	                    </div>
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
                  <div class ="flex-center"><a href="facebook.com"><img src="images/btnShare.png" style="margin-bottom: 20px" class = "frame"></a></div>
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
		//$("#gif-created").attr('src', "gif/17320179525.gif");
		document.getElementById("gif-created").src = "gif/"+gif;
		document.getElementById("pic-one").src = "uploads/"+pic1;
		document.getElementById("pic-two").src = "uploads/"+pic2;
		document.getElementById("pic-three").src = "uploads/"+pic3;
	};
</script>
</body>
</html>