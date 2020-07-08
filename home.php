<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
<link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id ="logo"><a href="home.php">JCars</a></li>
                </ul>
            <form action="search.php" class="navbar-form navbar-left" id ="searchform" method="post">
                <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Enter ID Number" name="idnum"/>
                <button type="submit" class="btn btn-default">Search</button> 
                </div>
            </form>
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="#"><img src="img/man.png" alt="avatar" class="avatar"> John</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>   
        </div>
        </nav>

            <header>
                <table>
                    
                </table>
              
              <div id = "sidemenu">
                 <nav id="mainNavBar">
                <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="200"> <!--the affix class sets the position to fixed but you have to manually specify at what point you want it fixed-->
                    <li class="active"><a href="home.html">Home</a></li>
                    <li><a href="vehicles.php">Manage Vehicles</a></li>
                    <li><a href="clients.php">Manage Clients</a></li>
                </ul>
        </nav> 
              </div>
         </header>
        <div class="wrapper">
    <div id="imageCarousel" class="carousel slide" data-interval="2000">
    <ol class="carousel-indicators">
    <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#imageCarousel" data-slide-to="1"></li>
    <li data-target="#imageCarousel" data-slide-to="2"></li>
    <li data-target="#imageCarousel" data-slide-to="3"></li>
    <li data-target="#imageCarousel" data-slide-to="4"></li>
    <li data-target="#imageCarousel" data-slide-to="5"></li>
    <li data-target="#imageCarousel" data-slide-to="6"></li>
    </ol>
    <div class="carousel-inner">
    <div class="item active">
        <img src="img/pic1.jpg" alt=""/>
    </div>
    <div class="item">
        <img src="img/pic2.jpg" alt=""/>
    </div>
    <div class="item">
        <img src="img/pic3.jpg" alt=""/>
    </div>
    <div class="item">
        <img src="img/pic5.jpg" alt=""/>
    </div>
    <div class="item">
        <img src="img/pic4.jpg" alt=""/>
    </div>
    <div class="item">
        <img src="img/pic6.jpg" alt=""/>
    </div>    
    </div>
    <a href="#imageCarousel" class="carousel-control left" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>  
    </a>
    <a href="#imageCarousel" class="carousel-control right" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
    </div>
      </div>
        <script type="text/javascript">
            $(document).ready(function(){
             $(imageCarousel).carousel();   
            });
        </script>
    </body>
</html>

