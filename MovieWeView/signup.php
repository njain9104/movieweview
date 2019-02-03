<?php
session_start();    #To Track The Session
?>
<?php
if(isset($_SESSION["id"])) {
    #If Logged In Go To index.php
header("Location:index.php");
}
?>
<!DOCTYPE html>
<!-- English Language Content -->
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <!-- Compatibilty for other devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sign Up To Add Reviews">
        <meta name="keywords" content="SignUp,Create,Account">
        <title>  
            Sign Up
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="mov.css">
        <script src="js/bootstrap.js"></script>
        <script src="jquery.js"></script>
        <style>
                body { 
                padding-top: 250px;                  
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
                <h2 style="color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>Sign Up</strong></h2>
            </div>
            <!-- Go to register.php to Sign Up -->
            <form class="form-horizontal" action="val/register.php" method="POST">
                <div class="form-group">
                    <label for="userid" class="control-label col-md-2"><strong>Enter User Name</strong></label>
                    <div class="col-md-4">
                            <input type="text" name="userid" id="userid" class="form-control" placeholder="Enter User Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label col-md-2"><strong>Enter Email</strong></label>
                    <div class="col-md-4">
                        <input type="email" name="mail" id="mail" class="form-control" placeholder="Enter Email ID" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd" class="control-label col-md-2"><strong>Enter Password</strong></label>
                        <div class="col-md-4">
                            <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Password" required>
                        </div>
                </div>
            
                <div class="form-group">
                        <label for="repwd" class="control-label col-md-2"><strong>Re-Enter Password</strong></label>
                        <div class="col-md-4">
                            <input type="password" name="repwd" id="repwd" class="form-control" placeholder="Re-Enter Password" required>
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" class="btn" style="background:black; color:#FAED26;">
                    </div>
                </div>
                <hr>
            </form>
        </div>
        <!-- Check Whether the Re-Entered Password Matches the Password or not  -->
        <script>
                var password = document.getElementById("pwd"), confirm_password = document.getElementById("repwd");
                function validatePassword(){
                    if(password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                            confirm_password.setCustomValidity('');
                    }
                }

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
        </script>
        <?php
        require_once('footer_inc.php');
        ?>
    </body>
</html>