<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
                    <form action="search.php" class="navbar-form navbar-left" id ="searchform" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Search for..." name="idnum"/>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search"></span>
                            </button> 
                        </div>
                    </form>
                    <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/man.png" alt="avatar" class="avatar"/>John Gaitho <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>Settings</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <header>
            <div id = "sidemenu">
                <a class="sidebar-brand" href="home.php"><span class="glyphicon glyphicon-paperclip "></span>JCars Admin</a>
                <hr />
                <section>
                    <ul class="section-items">
                        <li class="active"><a id="dashboard-link" href="home.php"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
                    </ul>
                </section>
                <hr />
                <section>
                    <p class="section-decriptor">Interface</p>
                    <ul class="section-items">
                        <li><a href="vehicles.php"><i class="fas fa-car"></i>Vehicles <i class="fas fa-angle-right pull-right"></i></a></li>
                        <li><a href="clients.php"><i class="fas fa-users"></i>Clients<i class="fas fa-angle-right pull-right"></i></a></li>
                        <li><a href="#"><i class="fas fa-dollar-sign"></i>Account<i class="fas fa-angle-right pull-right"></i></a></li>
                    </ul>
                </section>
                <hr />
                <section>
                    <p class="section-decriptor">Addons</p>
                    <ul class="section-items">
                        <li><a href="#"><i class="fas fa-fw fa-chart-area"></i>Charts</a></li>
                        <li><a href="#"><i class="fas fa-table"></i>Tables</a></li>
                    </ul>
                </section>
                <hr />
                <!--<section>-->
                <div class="sidenav-toggler">
                    <i class="fas fa-angle-left"></i>
                </div>
            </div>
        </header>
