<!DOCTYPE html>
<html>
<head>
	<title>PhotoLive</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</head>
<body>

	<div><img id="gif-created" src=""></div>
	<div><img id="pic-one" src=""></div>
	<div><img id="pic-two" src=""></div>
	<div><img id="pic-three" src=""></div>
	<script type="text/javascript">
		window.onload = function(){

		var pic1 = localStorage.getItem("pic1");
		var pic2 = localStorage.getItem("pic2");
		var pic3 = localStorage.getItem("pic3");
		var gif = pic1.replace('.png','.gif');
		// //$("#gif-created").attr('src', "gif/163201717309.gif");
		document.getElementById("gif-created").src = "gif/"+gif;
		document.getElementById("pic-one").src = "uploads/"+pic1;
		document.getElementById("pic-two").src = "uploads/"+pic2;
		document.getElementById("pic-three").src = "uploads/"+pic3;
	};
	</script>
</body>

</html>