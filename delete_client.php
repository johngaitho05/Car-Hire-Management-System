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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />

<script type="text/javascript">
    $(document).ready(function(){
             var amt= "<?php echo trim($_GET["amt"]); ?>";
             var status= "<?php echo trim($_GET["status"]); ?>";
             if (status != '?' && amt != '0'){
                 alert("The client you want to delete is currently holding a vehicle. Please check-in the vehicle first.");
                 window.location= 'clients.php';
                 
             }else{
                 $('#deleteModal').modal('show');
             }
             
        
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
                    <li><a href="vehicles.php">Manage Vehicles</a></li>
                    <li  class="active"><a href="clients.php">Manage Clients</a></li>
                </ul>
        </nav> 
              </div>
         </header>
        <div class="wrapper">
            <div class="wrapper2">
 <?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "dbconfig.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM clients WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
          header("location: clients.php");
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    $stmt->close();
    
    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        exit("Missing Input");
    }
}
?>
<!--                    <div class="page-header">
                        <h2>Delete Record</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="clients.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form> 
                -->
                
                <div class="modal fade" id="deleteModal" tabindex="-1" data-keyboard="false" data-backdrop="static">
            <!--use modal-sm or modal-lg classes on the div below if you want either small or large modal--> 
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--Note that the button continues to work properly even after substituting the data- attributes with jQuery--> 
                        <button class="close" data-dismiss="modal" id="exitmodal">&times;</button>
                        <h2>Delete Record</h2>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                        </div>
                    <div class="modal-footer">
                     <input type="submit" value="Yes" class="btn btn-danger"/>
                     <input class="btn btn-default" id="exitmodal" value="Yes"/> 
                    </div>
                      
                    </form>     
                    </div>
                    
                 </div>  
                </div>
            </div>
                
                
            </div>
      </div>
        <script type="text/javascript">
            $('#close').click(function(){
             window.location = "clients.php";
             });
             $('#exitmodal').click(function(){
             window.location = "vehicles.php";
             });
        </script>
    </body>
</html>