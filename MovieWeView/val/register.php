<?php
$con = mysqli_connect("localhost","mov","movdb","mov");
if (!$con)
  {
  die('Could Not Connect: ' . mysqli_error());
  }
$userid = mysqli_real_escape_string($con, $_POST['userid']);
$mail = mysqli_real_escape_string($con, $_POST['mail']);
$pwd = mysqli_real_escape_string($con, $_POST['pwd']);
$sql = "INSERT INTO user (uname, mail, pwd)
VALUES
('$userid','$mail','$pwd')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
else{
  mysqli_close($con);
  header("Location:http://localhost/MovieWeView/index.php");
}
?>