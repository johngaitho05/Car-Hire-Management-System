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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
    <?php
    // Include config file
    require_once "navbar.php";
   ?>
        
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-sm-3">
                    <div class="info-card hired">
                        <div class="info-card-icon"><i class="fas fa-times-circle"></i></div>
                        <p class="info-card-heading">Hired </p>
                        <div class="info-card-amount">68</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-card available">
                        <div class="info-card-icon"><i class="fas fa-check-circle"></i></div>
                        <p class="info-card-heading">Available</p>
                        <div class="info-card-amount">112</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-card earnings">
                        <div class="info-card-icon"><i class="fas fa-calendar"></i></div>
                        <p class="info-card-heading">Earnings (Monthly)</p>
                        <div class="info-card-amount"><i class="fas fa-dollar-sign"></i>3500</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-card served">
                        <div class="info-card-icon"><i class="fas fa-user-check"></i></div>
                        <p class="info-card-heading">Clients Served</p>
                        <div class="info-card-amount">120</div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script> 
        <script type="text/javascript">
            $(document).ready(function(){
                $(imageCarousel).carousel();   
            });
        </script>
    </body>
</html>

