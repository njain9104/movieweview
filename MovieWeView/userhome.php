<?php
session_start();    #To Track The Session
?>
<?php
if(!(isset($_SESSION["id"]))) {
    #If Not Logged In Go To index.php
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
        <meta name="description" content="Give Reviews Write Your Heart Out">
        <meta name="keywords" content="'Your Reviews','User Home Page'">
        <title>  
            My Reviews
        </title>
        <link rel="stylesheet" href="mov.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <script src="jquery.js"></script>
        <style>
            body{
                padding-top:220px;
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
            <?php if(isset($_SESSION['id'])){ ?>
                <!-- Welcome User Name -->
                <h2 style="text-transform: capitalize;color:black;text-shadow: 0 0 0.2em #FAED26;">Welcome <?php echo($_SESSION['id']);?></h2>
            <?php }
             ?>
            </div>
                
            <div class="row">
                <h1 style="text-align:center; color:black;text-shadow: 0 0 0.2em #FAED26;">Your Reviews</h1>    
            </div>
            <div class="row">
                <table class="table table-bordered table-hover" style="color:#FAED26;">
                    <thead>
                        <tr class="warning">
                            <th><h4>Movie Name</h4></th>
                            <th><h4>Review</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        #Get The Movie Name And The Review Posted By User'
                        #Put Them in the Table
                        $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
                        $result = mysqli_query($con,"SELECT movname, rev from movie, review where movid=r_movid and r_uname="."'$_SESSION[id]'"."");
                        if ($result) {
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo("<tr><td><h5 style=text-transform:capitalize;><strong>".$row['movname']."</strong></h5></td>
                                <td><h5 style=text-transform:capitalize;><strong>".$row['rev']."</strong></h5></td>
                    </tr>");
                            } 
                        }
                        else{
                            echo("<h3>You Have Not Posted Any Reviews Yet!</h3>");
                        }
                    }
                    mysqli_close($con);
                
                    ?>
                    </tbody>
                </table>
             </div>
        </div>
        <?php
        require_once('footer_inc.php');
        ?>
    </body>
</html>