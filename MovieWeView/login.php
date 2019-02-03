<?php
session_start();    #To Track The Session
$message="";
    if(count($_POST)>0) {
        #Logging In
        $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
        $mail = mysqli_real_escape_string($con, $_POST['username']);
        $pwd = mysqli_real_escape_string($con, $_POST['password']);
        $result = mysqli_query($con,"SELECT * FROM user WHERE mail='" . $_POST["username"] . "' and pwd = '". $pwd."'");
        $row = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["id"] = $row['uname'];
            $_SESSION["name"] = $row['mail'];
            mysqli_close($con);
        } 
        else {
                $message = "Invalid Username or Password!";
                echo '<script type="text/javascript">alert("'.$message.'");</script>';
            }
    }
if(isset($_SESSION["id"])) {
    #If Logged In Go To index.php
header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang='en'>
<!-- English Language Content -->
    <head>
        <meta charset="UTF-8">
        <!-- Compatibilty for other devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Give Reviews Write Your Heart Out">
        <meta name="keywords" content="Login,Signup">
        <title>  Login
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="mov.css">
        <script src="js/bootstrap.js"></script>
        <script src="jquery.js"></script>
        <style>
            body { 
                padding-top: 230px;                    
            }
        </style>
        </head>
    <body>
            <!-- Navigation Bar Begin -->
            <?php
        require_once('navbar.php');
        ?>
        <!-- Navigation Bar  End -->
        <div class="container">
            <div class="page-header">
                <h2 style="color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>Login</strong></h2>
            </div>
            <form class="form-horizontal" action="login.php" method="POST">
                <div class="form-group">
                    <label for="username" class="control-label col-md-2"><strong>Enter Email</strong></label>
                    <div class="col-md-4">
                            <input type="email" name="username" id="username" class="form-control" placeholder="Enter Email ID" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-md-2"><strong>Enter Password</strong></label>
                    <div class="col-md-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" class="btn" style="background:black;color:#FAED26;">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <a href="forgot.php" style="color:#FAED26;"><h4><u><strong>Forgot Password?</strong></u></h4></a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <a href="signup.php" style="color:#FAED26;"><h4><u><strong>Sign Up!</strong></u></h4></a>
                    </div>
                </div>
            </form>
        </div>
        <?php
        require_once('footer_inc.php');
        ?>
    </body>
</html>