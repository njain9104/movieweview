<?php
session_start();    #To Track The Session
if(isset($_POST)) {
    #Connect to Database To Insert Review
    $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
    $rev = mysqli_real_escape_string($con, $_POST['review1']);
    $sql="INSERT INTO `review` VALUES('$_POST[mov_id]','$_SESSION[id]','$rev')";
    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    else{
        #After Inserting Redirect to the Movie Page 
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    mysqli_close($con);
}
else{
    echo("error");
}
?>