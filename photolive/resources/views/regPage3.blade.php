<!DOCTYPE html>
<html>
<head>
  <title>Photolive</title>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Photolive</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesss.css" rel="stylesheet">
    <script src = "js/jquery-3.1.1.min.js"></script>    
    <script src = "js/photolive.js"></script>  
    <script type="text/javascript">
      window.onload = function() {
        localStorage.setItem("picQuan", 1);   
      }
    </script>
</head>
<body>
<div class = "container-fluid">
    <div class = "row">
    <div class = "row" style="margin-top: 10px;">
          <div class = "col-sm-12">
              <div class = "panel" style="width:80%; height:50%;">
                  <a style = "margin-left: 50% " href="#"  class =" text-center"><img src="images/btnFrame.png"></a>
              </div>
          </div>
      </div>
<div class = "col-md-10 col-md-offset-1" style="background-color: #38c4e4; margin-top:20px;">
     <div class = "col-sm-4">
           <div class = "row">
                <div class = "col-sm-12">
                    <div class = "panel" style="background-color: #38c4e4; width:80%; height:40%;">
                    <img src="images/frame1.png" onclick="frame1()" class = "frame1 margin img-responsive  center-block frame">
                    </div>
                </div>
            </div>
        </div>

        <div class = "col-sm-4">
           <div class = "row">
                <div class = "col-sm-12">
                    <div class = "panel" style="background-color: #38c4e4; margin-top: 80px; width:80%; height:40%;">
                    <img src="images/frame2.png" onclick="frame2()" class = "frame2  margin img-responsive  center-block frame">
                    </div>
                </div>
            </div>
        </div>

        <div class = "col-sm-4">
           <div class = "row">
                <div class = "col-sm-12">
                    <div class = "panel" style="background-color: #38c4e4; width:80%; height:30%;">
                    <img src="images/frame3.png" onclick="frame3()" class = "frame3  img-responsive  center-block frame">
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
    <nav aria-label="...">
    <ul class="pager">
      <li class="previous"><a href="page2"><span aria-hidden="true">&larr;</span>Back</a></li>
      <li class="next"><a href="regular-booth">Next <span aria-hidden="true">&rarr;</span></a></li>
    </ul>
  </nav>
</div>

<script>
var doubleClickF1 = 0,doubleClickF2 = 0,doubleClickF3 = 0;
function frame1(){
  $(".frame1").animate({"opacity":"1"});
  $(".frame2").animate({"opacity":"0.3"});
  $(".frame3").animate({"opacity":"0.3"});
  localStorage.setItem("picQuan", 1);
  doubleClickF2 = 0;
  doubleClickF3 = 0;
  doubleClickF1++;
  if(doubleClickF1 == 2){
    window.location.href = "regular-booth";
  }
}
function frame2(){
  $(".frame1").animate({"opacity":"0.3"});
  $(".frame2").animate({"opacity":"1"});
  $(".frame3").animate({"opacity":"0.3"});
  localStorage.setItem("picQuan", 4);
  doubleClickF1 = 0;
  doubleClickF3 = 0;
  doubleClickF2++;
  if(doubleClickF2 == 2){
    window.location.href = "regular-booth";
  }
}
function frame3(){
  $(".frame1").animate({"opacity":"0.3"});
  $(".frame2").animate({"opacity":"0.3"});
  $(".frame3").animate({"opacity":"1"});
  localStorage.setItem("picQuan", 3);
  doubleClickF2 = 0;
  doubleClickF1 = 0;
  doubleClickF3++;
  if(doubleClickF3 == 2){
    window.location.href = "regular-booth";
  }
}
</script>
</body>
</html>