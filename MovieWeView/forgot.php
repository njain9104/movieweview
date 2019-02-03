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
        <meta name="description" content="Reset Your Password">
        <meta name="keywords" content="Forgot,Password,Reset">
        <title>  Forgot Password
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
                <h2 style="color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>Reset Password</strong></h2>
            </div>
            <!-- Go To reset.php to reset password -->
            <form class="form-horizontal" action="val/reset.php" method="POST">
                <div class="form-group">
                    <label for="email" class="control-label col-md-2"><strong>Enter Email</strong></label>
                    <div class="col-md-4">
                            <input type="email" class="form-control" name="resmail" id="resmail" placeholder="Enter Email to Reset Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" class="btn" style="color:#FAED26; background:black">
                    </div>
                </div>
                <hr>
            </form>
        </div>
        <?php
        require_once('footer_inc.php');
        ?>
    </body>
</html>