<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>JCars -Vehicles Page</title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <style type="text/css">
            .wrapper2{
                width: 700px;
                margin: auto;
            }  
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

                   
    </head>
    <body>
        <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_num = trim($_POST["idnum"]);
    if(!empty($input_num)){
        $num= $input_num;
        header("location: search.php?idnum=$num");
    }
    }
    // Include navbar and sidebar components
        require_once "navbar.php";
    ?>
       
        <div class="wrapper">
            <div class="wrapper2">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Vehicles Details</h2>
                    <a href="add_vehicle.php" class="btn-add btn btn-info pull-right">Add new Vehicle</a>
                </div>
                    <?php
                    // Include config file
                    require_once "dbconfig.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM vehicles";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>ID</th>";
                                        echo "<th>Vehicle No</th>";
                                        echo "<th>Model</th>";
                                        echo "<th>Lending Price</th>";
                                        echo "<th>Status</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Vehicle_No'] . "</td>";
                                        echo "<td>" . $row['Model'] . "</td>";
                                        echo "<td>" . $row['Lending_Price'] . "</td>";
                                        echo "<td>" . $row['Status'] . "</td>";
                                        echo "<td>";
                                        if($row['Status']=="Hired"){
                                           echo "<a href='check_in.php?id=". $row['id'] ."&amp;vnum=". $row['Vehicle_No'] ."&amp;from=vehicles.php' title='Check-in' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>&nbsp;</span></a>";
                                            echo "<a href='delete_vehicle.php?id=". $row['id'] ."&amp;status=". $row['Status'] ."' title='Delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>"; 
                                        }else{
                                           echo "<a href='issue_car.php?count=". $row['id'] ."&amp;id=". $row['Vehicle_No'] ."&amp;amt=". $row['Lending_Price'] ."' title='Issue' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>&nbsp;</span></a>";
                                            echo "<a href='delete_vehicle.php?id=". $row['id'] ."&amp;status=". $row['Status'] ."' title='Delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";  
                                        }
                                            
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
