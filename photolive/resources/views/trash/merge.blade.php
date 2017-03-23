<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title></title>
    <style type="text/css">
        #content {
    position: absolute;
    left: 500px;
    width: 500px;
    height: 500px;
    border: 5px solid red;
    overflow: hidden;
}


    </style>
    <script type="text/javascript" src="js/html2canvas.js"></script>
    <script src = "js/jquery-3.1.1.min.js"></script>
</head>
<body>
<!-- <script src="https://rawgit.com/niklasvh/html2canvas/master/dist/html2canvas.min.js"></script> -->
<div id="content">
    <img id="img1" src="http://www.completeleasing.co.uk/media/sector%20images/software-2.jpg">
    <img id="img2" src="http://www.ipwatchdog.com/wp-content/uploads/2015/08/programing-software.jpg">
    <img id="img3" src=" http://www.sikich.com/blog/image.axd?picture=%2F2014%2F04%2FTeam.jpg">   
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<input id="button" type="button" value="convert div to image"><br>
<h3>result:</h3>
<div id="result"></div>
<a id="download" download="my_image.png" href="#">Download image</a>


    <!-- <div id="puzzle">
    Some text
    <img src="https://s-media-cache-ak0.pinimg.com/736x/6d/ef/3e/6def3e02e38dda198c3b96a6680738df.jpg" />
    text text
    <img src="https://s-media-cache-ak0.pinimg.com/736x/77/e4/50/77e450ec147bc94c36ccce38aad8f882.jpg" />
    </div> -->
    <!-- <canvas id="mycanvas" width="300" height="150"></canvas>
    <div id="result"></div> -->
    <script type="text/javascript">
        // var c=document.getElementById("canvas");
        // var ctx=c.getContext("2d");
        // var imageObj1 = new Image();
        // var imageObj2 = new Image();
        // imageObj1.src = "https://s-media-cache-ak0.pinimg.com/736x/6d/ef/3e/6def3e02e38dda198c3b96a6680738df.jpg";
        // imageObj1.onload = function() {
        //    ctx.drawImage(imageObj1, 0, 0, 328, 526);
        //    imageObj2.src = "https://s-media-cache-ak0.pinimg.com/736x/77/e4/50/77e450ec147bc94c36ccce38aad8f882.jpg";
        //    imageObj2.onload = function() {
        //       ctx.drawImage(imageObj2, 15, 85, 328, 526);
        //       var img = c.toDataURL("image/jpeg");
        //       document.write('<img id="base64image" src="' + img + '" width="328" height="526"/>');

// var canvas = document.getElementById("mycanvas");
// var ctx = canvas.getContext("2d");
// var img = document.getElementById("puzzle");

//     ctx.drawImage(img,0,0,40,40);
//     var data = canvas.toDataURL('image/jpeg');
//           var pic = new Image();
//           pic.src = data;
//           currentData = data;
//           if(document.getElementById('base64image')){
//             document.getElementById('results').appendChild( document.getElementById("base64image") );
//             document.getElementById('resTemp').innerHTML = '<img id="base64image" src="'+pic.src+'"/>';
//             alert("create1");
//           }else{
//             document.getElementById('resTemp').innerHTML = '<img id="base64image" src="'+pic.src+'"/>';
//             alert("create2");
//           }


var download = document.getElementById("download"),
        result = document.getElementById("result");

function renderContent1() {
    html2canvas(document.getElementById("content"), {
        allowTaint: true
    }).then(function(canvas) {
            result.appendChild(canvas);
        download.style.display = "inline";
    });
}
function renderContent() {
    html2canvas($("#content"), {
            onrendered: function(canvas) {
                theCanvas = canvas;


                canvas.toBlob(function(blob) {
                    saveAs(blob, "Dashboard.png"); 
                });
            }
    });
    // html2canvas(document.getElementById("content"), {
    //     onrendered: function(canvas){
    //       //   var context = canvas.getContext('2d');
    //       // // context.scale(-1,1);
    //       // // context.drawImage(video, 0, 0, canvas.width*-1, canvas.height);
    //       // context.drawImage(video, 0, 0, canvas.width, canvas.height);
    //         // var result = document.getElementById("result");
    //         // result.appendChild(canvas);
    //         var myImage = canvas.toDataURL("image/jpeg");
    //         //window.open(myImage);
    //          var currentdate = new Date(); 
    //     var datetime = currentdate.getDate() + ""
    //               + (currentdate.getMonth()+1)  + "" 
    //               + currentdate.getFullYear() + ""  
    //               + currentdate.getHours() + ""  
    //               + currentdate.getMinutes() + "" 
    //               + currentdate.getSeconds();
    //               var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //         $.ajax({
    //         url: 'upload',
    //         type: 'POST',
    //         data: {
    //           _token: CSRF_TOKEN,
    //           base64image: myImage,
    //           fname: datetime
    //         },
    //         dataType: 'JSON',
    //         success: function (data) {
    //             console.log(data);
    //         }
    //     });
    //     }
    });
        
    

}
function downloadURI(uri,name){
    var link1 = document.createElement("a");
    link1.download = name;
    link1.href = uri;
    link1.click();
}

function downloadImage() {
        download.href = result.children[0].toDataURL("image/png");

}

document.getElementById("button").onclick = renderContent;
download.onclick = downloadImage;
             
        //    }
        // };
    </script>
</body>
</html>