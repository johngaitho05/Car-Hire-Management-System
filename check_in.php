

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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />
    <style type="text/css">
      .wrapper2{
    width: 60%;
    margin: auto;
    margin-top:50px;
        }  
    </style>
    <script type="text/javascript">
       $(document).ready(function(){
             $('#checkinModal').modal('show');
        
         });
//
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
                    <li id ="logo"><a href="home.php">JCars</a></li>
                </ul>
            <form class="navbar-form navbar-left" id ="searchform" >
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Enter ID Number"/>
                <input type="submit" class="btn btn-default" value="Search">
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
                    <li><a href="home.php">Home</a></li>
                    <li class="active"><a href="vehicles.php">Manage Vehicles</a></li>
                    <li><a href="clients.php">Manage Clients</a></li>
                </ul>
        </nav> 
              </div>
         </header>
        <div class="wrapper">
            <div class="wrapper2">      
 <?php
    require_once "dbconfig.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if(isset($_POST["id2"])){
           $page = "clients.php"; 
        }else{
            $page = "vehicles.php"; 
        }
    if(isset($_POST["vehicle_id"]) && isset($_POST["client_id"])){
    $client_id = trim($_POST["client_id"]);
    $vehicle_id = trim($_POST["vehicle_id"]);
                   
    // Prepare a delete statement
    $sql1 = "update vehicles set Status='Not Hired' where id=?";
    $sql2 = "update clients set Return_Sign = '✓' where id =?";
   if($stmt1 = $mysqli->prepare($sql1)){
                $stmt1->bind_param("i", $param_id);
                $param_id = $vehicle_id;
                
                if ($stmt2 = $mysqli->prepare($sql2)){
                    $stmt2->bind_param("i", $param_id2);
                    $param_id2 = $client_id;
                    
                    if($stmt1->execute() && $stmt2->execute()){
                    // Records deleted successfully. Redirect to landing page
                   
                        
                    ?>
                     
                            <script type="text/javascript">
                                window.location = "<?php echo $page;?>";
                            </script> 
                 <?php  
                } else{
                    exit("Unable to execute query");
                }
                }
            }
                
            } else{
                exit("Missing input");
            } 
            $stmt1->close();
            $stmt2->close();
            // Close connection
            $mysqli->close();  
   
}   
 if (isset($_GET["id"]) &&  isset($_GET["vnum"])){
     require_once "dbconfig.php";

            // Attempt select query execution
            $vehicle_id= trim($_GET["id"]);
            $sql3 = "SELECT * from clients where Vehicle_No=$vehicle_id";
            if($result = $mysqli->query($sql3)){
                        if($result->num_rows > 0){
                        $row = $result->fetch_array();
                        $client_id= $row['id'];
                                                 ?>     
           <div class="modal fade" id="checkinModal" tabindex="-1" data-keyboard="false" data-backdrop="static">
            <!--use modal-sm or modal-lg classes on the div below if you want either small or large modal--> 
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Note that the button continues to work properly even after substituting the data- attributes with jQuery--> 
                        <button class="close" data-dismiss="modal" id="exitpage">&times;</button>
                        <h3>Vehicle check-in</h3>
                    </div>
                    
                        <form name="checkin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="modal-body">
                        <p>You are about to check in vehicle No: <span style="color:#5cb85c"><?php echo trim($_GET["vnum"]); ?></span> from client IdNo: <span style="color:#5cb85c"><?php echo $client_id;?></span></p>
                        <input type="hidden" name="client_id" value="<?php echo $client_id;?>"/>
                        <input type="hidden" name="vehicle_id" value="<?php echo trim($_GET["id"]); ?>"/>  
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="confirm2" value="Confirm" class="btn btn-info"/>
                            <button class="btn btn-outline-secondary" id="exitpage">Cancel</button> 
                            </div>
                            </form>
                        </div>
                    
                 </div>  
                </div>
        
           <?php 
             }
          
          }
        
        } else if(isset($_GET["id2"])){
           $client_id= trim($_GET["id2"]);
           $vehicle_id= trim($_GET["vnum2"]);
              ?>     
           <div class="modal fade" id="checkinModal" tabindex="-1" data-keyboard="false" data-backdrop="static">
            <!--use modal-sm or modal-lg classes on the div below if you want either small or large modal--> 
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Note that the button continues to work properly even after substituting the data- attributes with jQuery--> 
                        <button class="close" data-dismiss="modal" id="exitpage">&times;</button>
                        <h3>Vehicle check-in</h3>
                    </div>
                    
                        <form name="checkin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="modal-body">
                        <p>You are about to check in vehicle No: <span style="color:#5cb85c"><?php echo trim($_GET["vnum2"]); ?></span> from client IdNo: <span style="color:#5cb85c"><?php echo $client_id;?></span></p>
                        <input type="hidden" name="client_id" value="<?php echo $client_id;?>"/>
                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id;?>"/>
                        <input type="hidden" name="id2" value="<?php echo trim($_GET["id2"]);?>"/>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="confirm" value="Confirm" class="btn btn-info"/>
                            <button class="btn btn-outline-secondary" id="exitpage">Cancel</button> 
                            </div>
                            </form>
                        </div>
                    
                 </div>  
                </div>
        
           <?php 
        }else{
            exit("Missing input");
        }
        // Close connection
        $mysqli->close();
 ?>                  
                
        </div>
        </div>
        
        <script type="text/javascript">
          $('#exitpage').click(function(){
             window.location = "<?php echo trim($_GET["from"]);?>";
             }); 
    </script>
    </body>
</html>

