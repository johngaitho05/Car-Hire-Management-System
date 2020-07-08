

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
        <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_num = trim($_POST["idnum"]);
    if(!empty($input_num)){
        $num= $input_num;
        header("location: search.php?idnum=$num");
    } 
    }
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
                <ul class="nav navbar-nav">
                    <li id ="logo"><a href="home.php">JCars</a></li>
                </ul>
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="navbar-form navbar-left" id ="searchform" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Enter ID Number" name="idnum"/>
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
// Include config file
require_once "dbconfig.php";
 
// Define variables and initialize with empty values
$idno = $amt = $fname = $lname = $vnum = "";
$hdate=$rdate = date("F-d-Y", strtotime("2015-07-24")); 
$idno_err = $fname_err = $lname_err  ="";

 
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
    
    // // Check input errors before inserting in database
    if(empty($idno_err) && empty($fname_err) && empty($lname_err)){
        // Prepare an insert statement
        $con = "INSERT INTO clients(id,FName,LName) VALUES(?, ?, ?)";
 
        if($st = $mysqli->prepare($con)){
            // Bind variables to the prepared statement as parameters
            $st->bind_param("sss", $param_idno, $param_fname,$param_lname);
            
            // Set parameters
            $param_idno = $idno;
            $param_fname = $fname;
            $param_lname = $lname;
            
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
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="clients.php" class="btn btn-default">Cancel</a>
                        </div>
                            </div> 
                    </form>
                </div>      
</div>
    </body>
</html>


