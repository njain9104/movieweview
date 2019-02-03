<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';
$message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM user WHERE mail='" . $_POST["resmail"] . "'");
        $row = mysqli_fetch_array($result);
        if(is_array($row)) {
            $resmail = $row['mail'];
            $repass = $row['pwd'];

            $mail = new PHPMailer(TRUE);

            try {
   
                $mail->setFrom('ENTER_EMAILID_HERE');
                $mail->addAddress($resmail);
                $mail->Subject = 'PASSWORD RESET';
                $mail->Body = $repass;
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.gmail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $mail->Username = 'ENTER_EMAILID_HERE';
   
   /* SMTP authentication password. */
   $mail->Password = 'ENTER_PASSWORD_HERE';
   
   /* Set the SMTP port. */
   $mail->Port = 587;
   
   /* Finally send the mail. */
   $mail->send();
}
    catch (Exception $e)
    {
   echo $e->errorMessage();
    }
    catch (\Exception $e)   
    {
   echo $e->getMessage();
    }
} 
        else {
                $message = "Email Does Not Exist, Sign Up!";
                echo '<script type="text/javascript">alert("'.$message.'");</script>';
                
            }
        echo('<a href="http://localhost/MovieWeView/forgot.php"><h3>Click Here To Go Back<h3></a>');
}
?>