<!DOCTYPE html>
<!--<html lang="{{ config('app.locale') }}">-->
<html>
    <head>
        <title>PhotoLive</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/Bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <!-- <link href="css/full-slider.css" rel="stylesheet"> -->
 
        <script src="js/tracking-min.js"></script>
        <script src="js/face-min.js"></script>
        <script src = "js/jquery-3.1.1.min.js"></script>
		<script src="js/dat.gui.min.js"></script>
        <!-- <script src = "js/photolive.js"></script>    -->
        <script src = "js/bootstrap.min.js"></script> 


</head>
  <body id = "wrapper">
    <div class="container-fluid demo-frame" id = "wrapper">
        <div class = "demo-container row jumbotron text-center">
            <h1>PhotoLive</h1>
            <div class = "container-fluid text-center" id="my_camera"></div>
            <video id="video" width="320" height="240" preload autoplay loop muted></video>
            <canvas id="canvas" width="320" height="240"></canvas>
            <p id = "demo"></p>
            <p id = "face"></p>
            <a href="page2" type="button" class = "btn btn-primary">NEXT</a>
        </div>
    </div>

  <script>
    window.onload = function() {
      var video = document.getElementById('video');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
      var counter = 0;
      var tracker = new tracking.ObjectTracker('face');
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);
      tracking.track('#video', tracker, { camera: true });
      tracker.on('track', function(event) {
        context.clearRect(0, 0, canvas.width, canvas.height);
        
        
        if(event.data.length==0){
            document.getElementById("face").innerHTML = "face : wala";
            counter=0;
            document.getElementById("demo").innerHTML = counter;
        }else{
            document.getElementById("face").innerHTML = "face : meron";
            if(counter>=5){
              //video.stop();
              //trackerTask.stop()
            }
        }
      });

   var interval = setInterval(function(){myCounter()},1000);
    function myCounter(){
      if (counter<=4){
        counter++;
        document.getElementById("demo").innerHTML = counter;
        if(counter==4){
          Timer();
        }
      }  
      
    }
    function Timer() {
        window.location.href = "page2";
      //loadPage2();
            //alert("hello");
        }
      var gui = new dat.GUI();
      gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
      gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
      gui.add(tracker, 'stepSize', 1, 5).step(0.1);
    };
  </script>
  </body> 
    
  

</html>