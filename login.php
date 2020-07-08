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
        <style type="text/css">
            body{
                background-color:darkseagreen;
            }
            .form-group{
                margin-top: 30px;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <div class="login">
                <h3>Login</h3>
                <form action="" name="loginform">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input name="uname" type="text" id="inputUsername" class="form-control"/>
                <span style="color:red" id="UnameError"></span>
            </div> 
                

            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input name="pass" type="text" id="inputPassword" class="form-control"/>
                <span style="color:red" id="PassError"></span>
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-outline-secondary"  onclick="validate()">Login</button>      
               </div>       
            </form>  
            </div>
            
        </div>   
                </div>
            </div>
        <script language="javascript">

        </script>
    </body>
</html>    

