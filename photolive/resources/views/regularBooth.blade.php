<!DOCTYPE html>
<!--<html lang="{{ config('app.locale') }}">-->
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
        <!-- <link href="css/full-slider.css" rel="stylesheet"> -->
 
        <script src="js/tracking-min.js"></script>
        <script src="js/face-min.js"></script>
        <script src = "js/jquery-3.1.1.min.js"></script>
        <script src="js/dat.gui.min.js"></script>
        <!-- <script src = "js/photolive.js"></script>    -->
        <script src = "js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="webcamjs-master/webcam.min.js"></script>

  <style type="text/css">
    #video{
      transform: scaleX(-1);
    }
  </style>
  </head>
  <body id = "wrapper">
    <div class="container-fluid demo-frame" id = "wrapper">
        <div class = "demo-container row jumbotron text-center">
            <img src="images/homelogo.png">
            <div class = "container-fluid text-center" id="my_camera"></div>
            
            <video id="video" width="320" height="240" preload autoplay loop muted></video>
            <!-- <canvas id="canvas" width="0" height="260"></canvas> -->
            <canvas id="canvas">
            </canvas>
            <div id="white"></div>
            <p id = "demo"></p>
            <p id = "face"></p>
            <p id="demo2">0</p>
            <div id="white"></div>
            <button onclick="shoot()">Shoot</button>
            <div class="flex-center2" id="results"> 
            <div id = "resTemp"></div>
            </div>
        </div>
    </div>

  <script>
    var sec = 0,flag = 0,restric = 0, lipatCtr = 0,lipat = 0;
    var pic = "";
    var picture = [];
    var currentData = "";
    function saveSnap(){
        var currentdate = new Date(); 
        var datetime = currentdate.getDate() + ""
                  + (currentdate.getMonth()+1)  + "" 
                  + currentdate.getFullYear() + ""  
                  + currentdate.getHours() + ""  
                  + currentdate.getMinutes() + "" 
                  + currentdate.getSeconds();
        var file =  document.getElementById("base64image").src;
        //var file = currentData;
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
        var picQuan = localStorage.getItem("picQuan");
        lipatCtr++;
        if(lipatCtr>=picQuan){
          var interval = setInterval(function(){
            lipat++;
            if(lipat >= 3){
              var resPic = "";
              for(i=0;i<picture.length;i++){
                resPic+= "@"+picture[i];
              }
              window.location.href = "postregresult/"+resPic;
            }
          },1000);

        }
        $("photo-save").hide();
    }
    function snap(){
          var canvas = document.getElementById('canvas');
          var context = canvas.getContext('2d');
          // context.scale(-1,1);
          // context.drawImage(video, 0, 0, canvas.width*-1, canvas.height);
          context.drawImage(video, 0, 0, canvas.width, canvas.height);
          var data = canvas.toDataURL('image/jpeg');
          var img = new Image();
          img.src = data;
          currentData = data;
          if(document.getElementById('base64image')){
            document.getElementById('results').appendChild( document.getElementById("base64image") );
            document.getElementById('resTemp').innerHTML = '<img id="base64image" src="'+img.src+'"/>';
          }else{
            document.getElementById('resTemp').innerHTML = '<img id="base64image" src="'+img.src+'"/>';
          }
          saveSnap();
     }
    function captureDelay(){
      var picQuan = localStorage.getItem("picQuan");
      if(flag<picQuan){
        setTimeout(function(){
        sec++;
        document.getElementById('demo2').innerHTML = sec +"";
        if(sec>=5){
          sec=0;
          flag++;
          snap();
        }
        captureDelay();
        },1000);
      }
    }
    function shoot(){
      restric = 1;
      captureDelay();
    }

    window.onload = function() {
      var video = document.getElementById('video');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
      $(canvas).hide();
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
        }
      });
    navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

    navigator.getMedia({video: true}, function() {
      var interval = setInterval(function(){myCounter()},1000);
    }, function() {
      var interval = setInterval(function(){
        counter = 0;
        document.getElementById("demo").innerHTML = counter;
      },1000);
    });
     // var interval = setInterval(function(){myCounter()},1000);
      function myCounter(){
        if (counter<=4){
          counter++;
          document.getElementById("demo").innerHTML = counter;
          if(counter==4 && restric == 0){
            restric = 1;
            captureDelay();
          }
        }  
        
      }
    
      var gui = new dat.GUI();
      gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
      gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
      gui.add(tracker, 'stepSize', 1, 5).step(0.1);
    };
  </script>
  </body> 
    
  

</html>