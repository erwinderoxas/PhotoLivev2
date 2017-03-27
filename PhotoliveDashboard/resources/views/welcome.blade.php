<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

<!-- Styles -->
<style>
    body{
        background-image:url("img/bg.jpg");
        background-repeat: no-repeat;
    }

    b {
        position:relative;
        overflow: hidden;   
        height: 100px;
        
    }
    
    #galaw {
    -webkit-animation: move 30s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-delay: 0s;
    }

    @keyframes move {
        0%  { margin-left:0px; }
        100% { margin-left:-800px; }
    }
    

/* Toggle Styles */

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background:#e9e9e9;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 200px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 200px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #676767;
    font-family: Arial;
    font-style: bold;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    font-color: #373737;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 0;
    }

    #wrapper.toggled {
        padding-left: 250px;
    }

    #sidebar-wrapper {
        width: 0;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 200px;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}

a{
    border-width:1px; 
    border-style:solid; 
    border-color:#dbdbdb;
}

#imge{
    margin-left:-20px; 
    border-width:5px; 
    border-left-style:solid; 
    border-color:#38c4e4;
}
</style>
</head>
    
<body>
        <img class="row center-block" src="img/logoh.png" style="position:absolute; z-index:100; margin-top:23px;">
    
    <div class="center-block" style="margin-top:0px;">
        <b class="center-block inline-block">   
        
        <img id="galaw" src="img/Bannerp.jpg">
        </b>  
    </div>

    <div class="center-block inline-block" style="z-index:1000; height:30px; background-color:#e9e9e9;">
        <span id="menu-toggle" style="font-size:25px; margin-left:10px; cursor:pointer; color:#252525;" onclick="openNav()">&#9776;</span>
    </div>
    
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><a href="#"><img id="imge" src="img/homeq.png"/>&nbsp &nbsp Home</a></li>
                <li><a href="#"><img id="imge" src="img/dash.png"/>Dashboard</a></li>
                <li><a href="#"><img id="imge" src="img/eventq.png"/>Clients</a></li>
                <li><a href="#"><img id="imge" src="img/eventq.png"/>Events</a></li>
                <li><a href="#"><img id="imge" src="img/photoq.png"/>Photos</a></li>
                <li><a href="#"><img id="imge" src="img/frameq.png"/>Frames</a></li>
                <li><a href="#"><img id="imge" src="img/contactq.png"/>Contacts</a></li>
                <li><a href="#"><img id="imge" src="img/aboutq.png"/>About</a></li></ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="row">
                <div class="col-md-12" style="">
                <img class="img-responsive center-block" src="img/homedes.png"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center" style="">
                <button class="center-block" style="border-style:none; width:140px; height:35px; background-image: url(img/begin.png);"></button>
                <label class="text-center" style="font-size:10px;">PRESS TO START</label>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

    </div>

</body>
</html>
