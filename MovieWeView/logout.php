<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]); #Close the Session to Logout
header('Location:index.php'); #Go To Home Page
?>