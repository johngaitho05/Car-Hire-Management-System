<?php
// Include config file
require_once "dbconfig.php";
 
// Define variables and initialize with empty values
$idno = $amt = $fname = $lname = $vnum = $hdate = $rdate = "";
$idno_err = $amt_err = $fname_err = $vnum_err =$lname_err = $hdate_err = $rdate_err ="";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate id
    $input_idno = trim($_POST["idno"]);
    if(empty($input_idno)){
        $idno_err = "Please enter the client's id number.";     
    } elseif(!ctype_digit($input_idno)){
        $idno_err = "Please enter a correct id number.";
    } else{
        $idno = $input_idno;
    }
    
    // Validate fname
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname)){
        $fname_err = "Please enter the client's First Name";
    } else{
        $fname = $input_fname;
    }
    
    // Validate last Name
    $input_lname = trim($_POST["lname"]);
    if(empty($input_lname)){
        $lname_err = "Please enter the client's Last Name";
    } else{
        $lname = $input_lname;
    }
       // Validate vehicle number
    $input_vnum = trim($_POST["vnum"]);
    if(empty($input_vnum)){
        $vnum_err = "Please enter the vehicle number.";
    } else{
        $vnum = $input_vnum;
    }
    
    // Validate hiring date
    $input_hdate = trim($_POST["hdate"]);
    if(empty($input_hdate)){
        $hdate_err = "Please enter the hiring date";
    } else{
        $hdate = $input_hdate;
    }
    
    // Validate vehicle number
    $input_rdate = trim($_POST["rdate"]);
    if(empty($input_rdate)){
        $rdate_err = "Please enter the Return date";
    } else{
        $rdate = $input_rdate;
    }
    
    // Validate price
    $input_amt = trim($_POST["amt"]);
    if(empty($input_amt)){
        $amt_err = "Please enter the Amount charged";     
    } elseif(!ctype_digit($input_amt)){
        $amt_err = "Please enter a positive integer value.";
    } else{
        $amt = $input_amt;
    }
    
    // // Check input errors before inserting in database
    if(empty($idno_err) && empty($fname_err) && empty($lname_err)&& empty($vnum_err) && empty($hdate_err) && empty($rdate_err)&& empty($amt_err)){
        // Prepare an insert statement
        $con = "INSERT INTO clients(id,FName,LName,Vehicle_No,HDate,RDate,Amount) VALUES(?, ?, ?, ?, ?, ?, ?)";
 
        if($st = $mysqli->prepare($con)){
            // Bind variables to the prepared statement as parameters
            $st->bind_param("sssssss", $param_idno, $param_fname,$param_lname,$param_vnum, $param_hdate, $param_rdate, $param_amt);
            
            // Set parameters
            $param_idno = $idno;
            $param_fname = $fname;
            $param_lname = $lname;
            $param_vnum = $vnum;
            $param_hdate = $hdate;
            $param_rdate = $rdate;        
            $param_amt = $amt;
            // Attempt to execute the prepared statement
            if($st->execute()){
                // Records created successfully. Redirect to landing page
                header("location: clients.php");
                exit();
            } else{
                die(mysqli_error($mysqli));
            }
        }
         
        // Close statement
        $st->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>

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
            width: 650px;
            margin-left: 200px;
            margin-top: 40px;
        }
        .btns{
            float:left; margin-top: 70px;margin-right: 180px;
        }
        .btns .btn-primary{
     margin-right: 30px;
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
                    <li class="active"><a href="vehicles.php">Manage Vehicles</a></li>
                    <li><a href="clients.php">Manage Clients</a></li>
                </ul>
        </nav> 
              </div>
         </header>
        <div class="wrapper">
            <div class="wrapper2">
                <h2>Enter Client Details</h2>
                <br />
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="grp1">
                            <div class="form-group <?php echo (!empty($idno_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="idno" class="form-control" value="<?php echo $idno; ?>" placeholder="ID">
                                <span class="help-block"><?php echo $idno_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" placeholder="First Name">
                                <span class="help-block"><?php echo $fname_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" placeholder="Last Name">
                                <span class="help-block"><?php echo $lname_err;?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($vnum_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="vnum" class="form-control" value="<?php echo $vnum; ?>" placeholder="Vehicle Number">
                                <span class="help-block"><?php echo $vnum_err;?></span>
                            </div>    
                        </div>
                        
                        <div class="grp2">
                            <div class="form-group <?php echo (!empty($hdate_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="hdate" class="form-control" value="<?php echo $hdate; ?>" placeholder="Hiring Date">
                                <span class="help-block"><?php echo $hdate_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($rdate_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="rdate" class="form-control" value="<?php echo $rdate; ?>" placeholder="Return date">
                                <span class="help-block"><?php echo $rdate_err;?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($amt_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="amt" class="form-control" value="<?php echo $amt; ?>" placeholder="Amount Charged">
                                <span class="help-block"><?php echo $amt_err;?></span>
                            </div>    
                        </div>
                        <div class="btns">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="clients.php" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>      
</div>
    </body>
</html>


