 <!-- Login Modal Page -->
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" id="loginModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" name="button" class="close" data-dismiss="modal" aria-lable="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="loginModalLabel">Login to shop</h4>
                        </div>

                        <div class="modal-body">
                            <!-- login form -->
                            <form action="shop.php">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input name="email1" type="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input name="password1" type="password" class="form-control" id="pwd" required>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                </div>
                                <button name="login_btn" type="submit" class="btn btn-default">Submit</button>
                            </form> 
                            <?php
                                if(isset($_POST['login_btn'])) 
                                {
                                    $email =$_POST['email1'];
                                    $password=$_POST['password'];
                                    $query="select * from user WHERE email ='$email' AND password='$password'";
                                    $query_run=mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        //valid
                                        $_SESSION['email1']=$row['email'];
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

                        <div class="modal-footer">
                            <p>Simon Diamond Entertainment</p>
                        </div>

                    </div>
                </div>
            </div>



            // Get values passed from form in login.php
    $email = $_POST['email'];
    $password = $_POST['password'];

    //to prevent mysql injection
    $email= stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysql_real_escape_string($email);
    $email = mysql_real_escape_string($password);

    // connect to the server and select database
    mysql_connect("localhost", "root", "");
    mysqli_select_db( $con,'sdmDB');

    // Query the database for user
    $result = mysql_query("select * from users where email = '$email' and password = '$password'")
    or die("Failed to query database ".mysql_error());

    $row = mysql_fetch_array($result);
    if ($row['email'] == $email && $row['password']==$password){
        echo "Login success!!! Welcome ".$row['email'];
    }
    else{
        echo "Failed to login.";
    }