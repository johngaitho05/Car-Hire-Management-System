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
                    <h3 class="page-title">Dashboard</h3>
                    <a href="#" id="report-btn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                        <div class="info-card-amount"><i class="fas fa-dollar-sign"></i>8500</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="info-card served">
                        <div class="info-card-icon"><i class="fas fa-user-check"></i></div>
                        <p class="info-card-heading">Clients Served</p>
                        <div class="info-card-amount">120</div>
                    </div>
                </div>
                
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">Earnings Overview</h4>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="myAreaChart" style="display: block; height: 320px; width: 740px;" width="740" height="320" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">Top Brands</h4>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="myPieChart" style="display: block; height: 245px; width: 337px;" width="337" height="245" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i>BMW
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Lexus
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Mercedes-Benz
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="js/chart/Chart.min.js"></script>
        <script src="js/chart/chart-area-demo.js"></script>
        <script src="js/chart/chart-pie-demo.js"></script>
    </body>
</html>

