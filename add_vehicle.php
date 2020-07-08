<?php
// Include config file
require_once "dbconfig.php";
 
// Define variables and initialize with empty values
$num = $model = $price = "";
$num_err = $model_err = $price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_num = trim($_POST["num"]);
    if(empty($input_num)){
        $num_err = "Please enter the car number";
    } else{
        $num = $input_num;
    }
    
    // Validate model
    $input_model = trim($_POST["model"]);
    if(empty($input_model)){
        $model_err = "Please enter the car model";     
    } else{
        $model = $input_model;
    }
    
    // Validate salary
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the car lending price.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Check input errors before inserting in database
    if(empty($num_err) && empty($model_err) && empty($price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO vehicles(Vehicle_No, Model, Lending_Price, Status) VALUES(?, ?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_num, $param_model, $param_price, $param_status);
            
            // Set parameters
            $param_num = $num;
            $param_model = $model;
            $param_price = $price;
            $param_status = "Not Hired";
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: vehicles.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
        $stmt->close();
        }
           $mysqli->close();
  
        
    }
    else{
        exit("Missing input");
    }
    // Close connection
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />
    <style type="text/css">
        .wrapper2{
            width: 500px;
            margin-left: 200px;
            margin-top: 50px;
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
                    <li id ="logo"><a href="home.html">JCars</a></li>
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($num_err)) ? 'has-error' : ''; ?>">
                            <label>Vehicle Number</label>
                            <input type="text" name="num" class="form-control" value="<?php echo $num; ?>">
                            <span class="help-block"><?php echo $num_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($model_err)) ? 'has-error' : ''; ?>">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" value="<?php echo $model; ?>">
                            <span class="help-block"><?php echo $model_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Rent Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="vehicles.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>      
</div>
    </body>
</html>
