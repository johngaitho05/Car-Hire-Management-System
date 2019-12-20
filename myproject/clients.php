<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script> 
        <link rel="stylesheet" href="css/style.css" />
    <style type="text/css">
        .wrapper2{
            width: 70%;
            margin:auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
                    <li id ="logo"><a href="#">JCars</a></li>
                </ul>
            <form action="search" class="navbar-form navbar-left" id ="frmone">
                <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Search"/>
                <button class="btn btn-default">Search</button> 
                </div>
            </form>
                <ul class="nav navbar-nav navbar-right">
 <li> <a href="#"><img src="img/man.png" alt="avatar" class="avatar"> John</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>   
        </div>
        </nav>

            <header>
              
              <div id = "sidemenu">
                 <nav id="mainNavBar">
                <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="200"> <!--the affix class sets the position to fixed but you have to manually specify at what point you want it fixed-->
                    <li><a href="home.html">Home</a></li>
                    <li><a href="vehicles.php">Manage Vehicles</a></li>
                    <li class="active"><a href="clients.php">Manage Clients</a></li>
                </ul>
        </nav> 
              </div>
         </header>
        <div class="wrapper">
            <div class="wrapper2">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Clients Details</h2>
                        <a href="add_client.php" class="btn btn-success pull-right">Add new Client</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "dbconfig.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM clients";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped table-condensed table-responsive'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>ID</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Vehicle Number</th>";
                                        echo "<th>Hiring Date</th>";
                                        echo "<th>Returing Date Date</th>";
                                        echo "<th>Amount Charged</th>";
                                        echo "<th>Return sign</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td nowrap>" . $row['id'] . "</td>";
                                        echo "<td nowrap>" . $row['FName'] . "</td>";
                                        echo "<td nowrap>" . $row['LName'] . "</td>";
                                        echo "<td nowrap>" . $row['Vehicle_No'] . "</td>";
                                        echo "<td nowrap>" . $row['HDate'] . "</td>";
                                        echo "<td nowrap>" . $row['RDate'] . "</td>";
                                        echo "<td nowrap>" . $row['Amount'] . "</td>";
                                        echo "<td nowrap>" . $row['Return_Sign'] . "</td>";
                                        echo "<td nowrap>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='delete_client.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>      
</div>
    </body>
</html>

