<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>JCars - Search</title>
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
                    <h2 class="pull-left">Search results</h2>
                </div>
                    <?php
                    // Include config file
                    require_once "dbconfig.php";
                    
                    // Attempt select query execution
                    $idnum= trim($_GET["idnum"]);
                    $sql = "SELECT * FROM clients where id=$idnum";
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
                                        if($row['Amount']==0){
                                         echo "<td nowrap>";
                                            echo "<a href='issue_car.php?id2=". $row['id'] ."' title='issue_car' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete_client.php?id=". $row['id'] ."&amp;amt=". $row['Amount'] ."&amp;status=". $row['Return_Sign'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";   
                                        }else{
                                            echo "<td nowrap>";
                                          echo "<a href='check_in.php?id2=". $row['id'] ."&amp;vnum2=". $row['Vehicle_No'] ."' title='check-in' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete_client.php?id=". $row['id'] ."&amp;amt=". $row['Amount'] ."&amp;status=". $row['Return_Sign'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";  
                                        echo "</td>";
                                            
                                        }
                                        
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

