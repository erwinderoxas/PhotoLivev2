<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<div id="demo">0</div>
	<br>
	<div id="demo2">0</div>
	<div id="photo-save"></div>
	<div class="flex-center" id="my_camera"></div>
	<div id="results"></div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
			var ctrSnap = 0;
			var time = 0;
			var sensor = 0;
			var fist_pos_old;
			var time = 0,sec=0,flag = 0;
			var running = 0;
			var ctr = 0;
			var temp;
			var stopFirstCtr = 0;
			var gifCtr = 0;
			var interval = setInterval(function(){
				time++;
				document.getElementById('demo').innerHTML = time +"";
				if(time>=3 && stopFirstCtr == 0){
					clearInterval();
					captureDelay();
					stopFirstCtr = 1;
				}
			},1000);
			
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
				gifCtr++;
				// var formdata = new FormData();
				
		  //       var _token =  "{{ csrf_token() }}";
				// formdata.append("base64image", file);
				// formdata.append('_token', $('meta[name="csrf-token"]').attr('content'));
				// //ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);

				// ajax.open("POST", "upload");
				// ajax.send(formdata);
				$("photo-save").hide();
				if(gifCtr>=3){
					window.location.href = "creategif/"+picture[0]+"/"+picture[1]+"/"+picture[2];
				}
			}
			function snap(){
				if(ctrSnap<3){
					ctrSnap++;
					Webcam.snap( function(data_uri) {
					// display results in page
					var img = new Image();
					img.src = data_uri;
					document.getElementById('results').appendChild( img );
					document.getElementById('photo-save').innerHTML = '<img id="base64image" src="'+img.src+'"/>';
					
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