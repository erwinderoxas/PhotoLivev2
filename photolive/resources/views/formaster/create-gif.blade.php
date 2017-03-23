<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<style type="text/css">
		#results > img { width: 160px; height: 120px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;}
		#resTemp > img { width: 160px; height: 120px; margin-right: 10px; margin-left: 10px; margin-bottom: 10px;}
		.full-height {
                height: 100vh;
            }
		.flex-center {
                align-items: center;
                justify-content: center;
                margin:0 auto;
                margin-bottom: 10px;
            }
        .flex-center2 {

            display: flex;
            justify-content: center;
            margin:0 auto;
            margin-bottom: 10px;
        }
        #my_camera{

		    background: url('images/gifBg.png') no-repeat top left transparent;
		    width: 543px; /* Adjust TV image width */
		    height: 624px; /* Adjust TV image height */
		    margin-top: 40px;
		    align-items: center;
		    display: flex;
		    justify-content: center;
		} 
		#video_pos{
		  margin-top: 70px;
		}
	</style>
</head>
<body>

	<div class="flex-center">
			<div id="demo">0</div>
			<br>
			<div id="demo2">0</div>
			
			<div class="flex-center" id="my_camera"></div>
			<div class="flex-center2" id="results"> 
			<div id = "resTemp"></div>
			</div>
			<div class="flex-center2" id="photo-save"></div>
	</div>
	
	
	<link href="css/Bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="webcamjs-master/webcam.min.js"></script>
	<script>
		Webcam.set({
            width: 420,
            height: 420 ,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true
        });
        Webcam.attach( '#my_camera' );


		window.onload = function() {
			var picture = [];
			var ctrSnap = 0,lipat = 0;
			var time = 0;
			var sensor = 0;
			var fist_pos_old;
			var time = 0,sec=0,flag = 0;
			var running = 0;
			var ctr = 0;
			var temp;
			var stopFirstCtr = 0;
			var gifCtr = 0;
			navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

		    navigator.getMedia({video: true}, function() {
		      var interval = setInterval(function(){
				time++;
				document.getElementById('demo').innerHTML = time +"";
				if(time>=3 && stopFirstCtr == 0){
					clearInterval();
					captureDelay();
					stopFirstCtr = 1;
				}
			},1000);
		    }, function() {
		      var interval = setInterval(function(){
				time = 0;
				document.getElementById('demo').innerHTML = time +"";
				
			},1000);
		    });
			// var interval = setInterval(function(){
			// 	time++;
			// 	document.getElementById('demo').innerHTML = time +"";
			// 	if(time>=3 && stopFirstCtr == 0){
			// 		clearInterval();
			// 		captureDelay();
			// 		stopFirstCtr = 1;
			// 	}
			// },1000);
			
			 function captureDelay(){
				if(flag<=2){
					setTimeout(function(){
					sec++;
					document.getElementById('demo2').innerHTML = sec +"";
					if(sec>=5){
						snap();
						sec=0;
						flag++;
					}
					captureDelay();
					},1000);
				}
			}	
			function SaveSnap(){
				var currentdate = new Date(); 
				var datetime = currentdate.getDate() + ""
	                + (currentdate.getMonth()+1)  + "" 
	                + currentdate.getFullYear() + ""  
	                + currentdate.getHours() + ""  
	                + currentdate.getMinutes() + "" 
	                + currentdate.getSeconds();
				var file =  document.getElementById("base64image").src;
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				picture.push(datetime+".png");
				$.ajax({
				    url: 'upload',
				    type: 'POST',
				    data: {
				    	_token: CSRF_TOKEN,
				    	base64image: file,
				    	fname: datetime
				    },
				    dataType: 'JSON',
				    success: function (data) {
				        console.log(data);
				    }
				});
				
				$("photo-save").hide();
				
				if(picture.length>=3){
					var interval = setInterval(function(){
						lipat++;
						document.getElementById('demo').innerHTML = lipat +"";
						if(lipat >= 3){
							localStorage.setItem("pic1", picture[0]+"");
							localStorage.setItem("pic2", picture[1]+"");
							localStorage.setItem("pic3", picture[2]+"");
							window.location.href = "creategif/"+picture[0]+"/"+picture[1]+"/"+picture[2];
						}
					},1000);

				}
			}
			function snap(){

				if(ctrSnap<3){

					ctrSnap++;
					Webcam.snap( function(data_uri) {
					// display results in page
					var img = new Image();
					img.src = data_uri;
					if(document.getElementById('base64image')){
						document.getElementById('results').appendChild( document.getElementById("base64image") );
						document.getElementById('resTemp').innerHTML = '<img id="base64image" src="'+img.src+'"/>';
					}else{
						document.getElementById('resTemp').innerHTML = '<img id="base64image" src="'+img.src+'"/>';
					}
					
					// 
					// document.getElementById('photo-save').innerHTML = '<img id="base64image" src="'+img.src+'"/>';
					
					SaveSnap();
					} );
				}
				
			}

			
			function start_time(){
			  
			  if(ctr == 0){
				running=1;
				ctr = 1;
				increment();
			  }
			}
			function reset(){
			  ctr = 0;
			  running = 0;
			  time = 0;
			  document.getElementById('demo').innerHTML = time +"";
			}

				


		function getScripts(urls, callback) {
			var numDone = 0;
			
			function getScript(url, callback) {
				var script = document.createElement('script'),
						head = document.getElementsByTagName('head')[0],
						done = false;
				
					script.src = url;
					script.onload = script.onreadystatechange = function() {
						if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
							done = true;
							callback();
							script.onload = script.onreadystatechange = null;
							head.removeChild(script);
						}
					};
				
				head.appendChild(script);
			}
			
			function getScriptCallback() {
				if (urls.length > 0) getScript(urls.shift(), getScriptCallback);
				else callback();
			}
			
			getScript(urls.shift(), getScriptCallback);
		}
		
		getScripts([
			'//mtschirs.github.io/js-objectdetect/examples/js/compatibility.js',
			'//mtschirs.github.io/js-objectdetect/js/objectdetect.js',
			'//mtschirs.github.io/js-objectdetect/js/objectdetect.handfist.js',
			'//mtschirs.github.io/js-objectdetect/examples/js/jquery.js'],
		
			function() {
				var canvas = $('<canvas style="position: fixed; z-index: 1001;top: 10px; right: 10px; opacity: 0.9">').get(0),
					context = canvas.getContext('2d'),
					video = document.createElement('video'),
					detector;
				
				document.getElementsByTagName('body')[0].appendChild(canvas);
				
				try {
					compatibility.getUserMedia({video: true}, function(stream) {
						try {
							video.src = compatibility.URL.createObjectURL(stream);
						} catch (error) {
							video.src = stream;
						}
						compatibility.requestAnimationFrame(play);
					}, function (error) {
						alert("WebRTC not available");
					});
				} catch (error) {
					alert(error);
				}
				
				function play() {
					
					compatibility.requestAnimationFrame(play);
					if (video.paused) video.play();
					
					if (video.readyState === video.HAVE_ENOUGH_DATA && video.videoWidth > 0) {
						
						/* Prepare the detector once the video dimensions are known: */
			          	if (!detector) {
				      		var width = ~~(80 * video.videoWidth / video.videoHeight);
							var height = 80;
				      		detector = new objectdetect.detector(width, height, 1.1, objectdetect.handfist);
				      	}
			      	
						/* Draw video overlay: */
						canvas.width = ~~(100 * video.videoWidth / video.videoHeight);
						canvas.height = 100;
						context.drawImage(video, 0, 0, canvas.clientWidth, canvas.clientHeight);
						
						var coords = detector.detect(video, 1);
						if (coords[0]) {
							var coord = coords[0];
							
							/* Rescale coordinates from detector to video coordinate space: */
							coord[0] *= video.videoWidth / detector.canvas.width;
							coord[1] *= video.videoHeight / detector.canvas.height;
							coord[2] *= video.videoWidth / detector.canvas.width;
							coord[3] *= video.videoHeight / detector.canvas.height;
						
							/* Find coordinates with maximum confidence: */
							var coord = coords[0];
							for (var i = coords.length - 1; i >= 0; --i)
								if (coords[i][4] > coord[4]) coord = coords[i];
							
							/* Scroll window: */
							var fist_pos = [coord[0] + coord[2] / 2, coord[1] + coord[3] / 2];
							if (fist_pos_old) {
								var dx = (fist_pos[0] - fist_pos_old[0]) / video.videoWidth,
										dy = (fist_pos[1] - fist_pos_old[1]) / video.videoHeight;
								
									//window.scrollBy(dx * 200, dy * 200);
							} else if(fist_pos_old = fist_pos){
								
							/* Draw coordinates on video overlay: */
							context.beginPath();
							context.lineWidth = '2';
							context.fillStyle = 'rgba(0, 255, 255, 0.5)';
							context.fillRect(
								coord[0] / video.videoWidth * canvas.clientWidth,
								coord[1] / video.videoHeight * canvas.clientHeight,
								coord[2] / video.videoWidth * canvas.clientWidth,
								coord[3] / video.videoHeight * canvas.clientHeight);
							context.stroke();

							}
							
						} else if(fist_pos_old = null){

						}else{
							reset();
						}
					}
				}
			}
		);
	};
    </script>
</body>
</html>