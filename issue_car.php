

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
             $('#loginModal').modal('show');
        
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
    $status = "Hired";
    $idnum=$vnum=$vid=$amt=$hdate=$rdate="";
    $vnum_err=$idnum_err=$hdate_err=$rdate_err="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["id2"])){
           $page = "clients.php";
        }else{
            $page = "vehicles.php"; 
        }
    require_once "dbconfig.php";         
            $input_idnum = trim($_POST["idnum"]);
            if($input_idnum=="None"){
                $idnum_err = "Please select client";     
            } else{
                $idnum = $input_idnum;
            }
            
            $input_vid = trim($_POST["vid"]);
            if(empty($input_vid)){
                $vid_err = "No vehicle selectd";     
            } else{
                $vid = $input_vid;
            }
            
            $input_vnum = trim($_POST["vnum"]);
            if(empty($input_vnum)){
                $vnum_err = "No vehicle selectd";     
            } else{
                $vnum = $input_vnum;
            }
            
            $input_hdate = trim($_POST["hdate"]);
            if(empty($input_hdate)){
                $hdate_err = "Please enter the hiring date";
            } else{
                $hdate =  $input_hdate;
            }

            // Validate vehicle number
            $input_rdate = trim($_POST["rdate"]);
            if(empty($input_rdate)){
                $rdate_err = "Please enter the Return date";
            } else{
                $rdate = $input_rdate;
            }
            
            $input_amt = trim($_POST["amt"]);
            if(empty($input_amt)){
                $amt_err = "Charges Not set";     
            } else{
                $amt = $input_amt;
            }

            if(empty($vnum_err) && empty($idnum_err) && empty($hdate_err) && empty($rdate_err)){
              // Prepare update statements
            $sql = "delete from clients where Vehicle_No=?";    
            $sql1 = "UPDATE clients SET Vehicle_No =?,HDate=?,RDate=?,Amount=? WHERE id=?";
            $sql2 = "UPDATE vehicles SET Status=? WHERE id=?";
            $stmt= $mysqli->prepare($sql);
            $stmt->bind_param("i", $param_vid);
            $param_vid = $vid;
            $stmt->execute();
            if($stmt1 = $mysqli->prepare($sql1)){
                $stmt1->bind_param("ssssi", $param_vnum,$param_hdate,$param_rdate,$param_amt,$param_id);
                $param_vnum = $vid;
                $param_hdate = $hdate;
                $param_rdate = $rdate;        
                $param_amt = $amt;
                $param_id = $idnum;
                
                if ($stmt2 = $mysqli->prepare($sql2)){
                    $stmt2->bind_param("ss", $param_status, $param_vid1);
                    $param_status = $status;
                    $param_vid1 = $vid;
                    
                    if($stmt1->execute() && $stmt2->execute()){
 
                             ?>
                            <script type="text/javascript">
                                alert("Vehicle No <?php echo $vid;?> has been assigned to client No: <?php echo $idnum;?>")
                                window.location = "<?php echo $page;?>";
                            </script>
                            <?php  
                } else{
                    die(mysqli_error($mysqli));
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
 if (isset($_GET["count"]) && isset ($_GET["id"])){
    ?>
        <div class="modal fade" id="loginModal" tabindex="-1" data-keyboard="false" data-backdrop="static">
            <!--use modal-sm or modal-lg classes on the div below if you want either small or large modal--> 
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Note that the button continues to work properly even after substituting the data- attributes with jQuery--> 
                        <button id="exitmodal" class="close" data-dismiss="modal">&times;</button>
                        <h3>Issue Vehicle No: <?php echo trim($_GET["id"]); ?></h3>
                    </div>
                    <?php
                        require_once "dbconfig.php";
                        $sql = "SELECT id,FName,LName FROM clients where Amount=0";
                        if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                          ?>  
                    <div class="modal-body">
                        <form name="frmtwo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div class="form-group <?php echo (!empty($idnum_err)) ? 'has-error' : ''; ?>">
                            <select name='idnum' id='idnum'  class='form-control'>
                        <option value="None">Select Client</option>
                        <?php
                           while($row = $result->fetch_array()){
                               $name= $row['FName'].= " ".$row['LName'];
                               $idnum = $row['id'];
                               $mystring = $name.= " (". $idnum. ")"; 
                                echo "<option value='$idnum'>$mystring</option>";
                            } 
                            ?>
                        </select>
                            <span class="help-block"><?php echo $idnum_err;?></span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo trim($_GET["count"]); ?>" name="vid"/> 
                                <input type="hidden" value="<?php echo trim($_GET["id"]); ?>" name="vnum"/> 
                                <input type="hidden" value="<?php echo trim($_GET["amt"]); ?>" name="amt"/> 
                            </div>
                            <div class="form-group <?php echo (!empty($hdate_err)) ? 'has-error' : ''; ?>">
                                <label>Issue Date</label>
                                <input type="date" name="hdate" id="hdate" class="form-control">
                                <span class="help-block"><?php echo $hdate_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($rdate_err)) ? 'has-error' : ''; ?>">
                                <label>Return Date</label>
                                <input type="date" name="rdate" id="rdate" class="form-control">
                                <span class="help-block"><?php echo $rdate_err;?></span>
                            </div> 
                            <div class="form-group">
                                <div class="modal-footer">
                                  <input type="submit" class="btn btn-info" id="save"  value="Save"/>   
                                  <button class="btn btn-outline-secondary" id="close">Cancel</button> 
                                 </div>
                            </div>
                        </form>
                        <?php
                           }else{
                            ?>
                              <div class="modal-body">
                                  <p style="color:red">No clients found!</p>
                              </div>
                                <div class="modal-footer">
                                    <a href="add_client.php" class="btn btn-info">Add client</a>
                                 <a href="clients.php" class="btn btn-default">Close</a> 
                                </div>
                           <?php
                           }
                           }
                           ?>
                        </div>
                        </div>
                    
                 </div>  
                </div>
        
           <?php
        } else if(isset($_GET["id2"])){
             ?>
        <div class="modal fade" id="loginModal" tabindex="-1" data-keyboard="false" data-backdrop="static">
            <!--use modal-sm or modal-lg classes on the div below if you want either small or large modal--> 
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Note that the button continues to work properly even after substituting the data- attributes with jQuery--> 
                        <button id="exitmodal" class="close" data-dismiss="modal">&times;</button>
                        <h3>Issue Vehicle to client IDNo: <?php echo trim($_GET["id2"]); ?></h3>
                    </div>
                    <?php
                        require_once "dbconfig.php";
                        $sql = "SELECT * from vehicles where Status='Not Hired'";
                        if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                          ?> 
                        <div class="modal-body">
                        <form name="frmtwo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div class="form-group <?php echo (!empty($idnum_err)) ? 'has-error' : ''; ?>">
                            <select name='vid' id='idnum'  class='form-control'>
                        <option value="None">Select Vehicle</option>
                        <?php
                           while($row = $result->fetch_array()){
                               $vid= $row['id'];
                               $vnumber = $row['Vehicle_No'];
                               $vmodel= $row['Model'];
                               $amt= $row['Lending_Price'];
                               $mystring = $vnumber.= " (". $vmodel. ")"; 
                                echo "<option value='$vid'>$mystring</option>";
                            }
                            ?>
                        </select>
                            <span class="help-block"><?php echo $idnum_err;?></span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo trim($_GET["id2"]); ?>" name="idnum"/> 
                                <input type="hidden" value="<?php echo $vnumber; ?>" name="vnum"/> 
                                <input type="hidden" value="<?php echo $amt; ?>" name="amt"/> 
                                <input type="hidden" value="<?php echo trim($_GET["id2"]); ?>" name="id2"/>
                            </div>
                            <div class="form-group <?php echo (!empty($hdate_err)) ? 'has-error' : ''; ?>">
                                <label>Issue Date</label>
                                <input type="date" name="hdate" id="hdate" class="form-control">
                                <span class="help-block"><?php echo $hdate_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($rdate_err)) ? 'has-error' : ''; ?>">
                                <label>Return Date</label>
                                <input type="date" name="rdate" id="rdate" class="form-control">
                                <span class="help-block"><?php echo $rdate_err;?></span>
                            </div> 
                            <div class="form-group">
                                <div class="modal-footer">
                                  <input type="submit" class="btn btn-info" id="save"  value="Save"/>   
                                  <button class="btn btn-outline-secondary" id="close">Cancel</button> 
                                 </div>
                            </div>
                        </form>
                        </div>
                        <?php
                           }else{
                            ?>
                              <div class="modal-body">
                                  <p style="color:red">No vehicles found!</p>
                              </div>
                                <div class="modal-footer">
                                 <a href="add_vehicle.php" class="btn btn-info">Add vehicle</a>
                                 <a href="clients.php" class="btn btn-default">Close</a> 
                                </div>
                           <?php
                           }
                           }
                           ?>
                        
                        
                        </div>
                    
                 </div>  
                </div>
        
           <?php   
        }

        // Close connection
        $mysqli->close();
 ?>                  
                
        </div>
        </div>
        
        <script type="text/javascript">
            window.onload = function (){
        var hdate = "<?php echo $hdate;?>";
        var rdate = "<?php echo $rdate;?>";

        document.getElementById("hdate").value = hdate;
        document.getElementById("rdate").value = rdate;
          }
          $('#close').click(function(){
             window.location = "vehicles.php";
             });
             $('#exitmodal').click(function(){
             window.location = "vehicles.php";
             });
    </script>
    </body>
</html>
