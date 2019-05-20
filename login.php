<?php

require 'config/config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- fonts library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="js/caroufredsel.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Simon Diamond Entertainment</title>


</head>
<body>
    <div class="container">
        <form action="" class="form-signin" method="POST">
            <h2 class="form-signin-heading">Please LogIn to Access the Shop</h2>
            <label><b>Email Address</b></label>
            <input name="email" type="email" placeholder="Email address" id="email" class="form-control"  autofocus="" required>
            <label><b>Password</b></label>
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
            

            <div class="checkbox">
                <label for="">
                    <input type="checkbox" vlaue="remember-me">
                    Remember me
                </label>
            </div>
            <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br><br>
            <a href="index.php"><button class="btn btn-lg btn-success btn-block">Back to Home Page</button></a>
            
        </form>

        <?php
                                if(isset($_POST['login'])) 
                                {
                                    // echo '<script type="text/javascript"> alert("login button clicked")</script>';
                                    
                                    $email =$_POST['email'];
                                    $password=$_POST['password'];
                                    $query="select * from user WHERE email ='$email' AND password='$password'";
                                    $query_run=mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        //valid
                                        $_SESSION['email1']=$email;
                                        header('location:shop.php');

                                    }
                                    else
                                    {
                                        //invalid
                                        echo '<script type="text/javascript"> alert("Invalid Credentials!") </script>';
                                    }
                                }                       
                            ?>
    </div>
</body>
</html>