<?php
session_start(); #To Track the Session
?>
<!DOCTYPE html>
<!-- English Language Content -->
<html lang='en'> 
    <head>
        <meta charset="UTF-8">
        <!-- Compatibilty for other devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Give Reviews Write Your Heart Out">
        <meta name="keywords" content="Movie-WeView,MovieWeView,WeView,WeView-WeReview,Browse,Movies,Reviews,Search">
        <title>  
            MovieWeView
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="mov.css">
        <style>
            body{
                padding-top:150px;
            }

        </style>
        </head>
    <body>
            <!-- Navigation Bar Begin -->
        <?php
        require_once('navbar.php');
        ?>
        <!-- Navigation Bar  End -->
        <div>
         <h1 style="text-align:center; color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>Movie We View</strong></h1>
         <h3 style="text-align:center; color:black;text-shadow: 0 0 0.2em #FAED26"><strong>We View We Review</strong></h3>
        </div>
        <div class="container">
            <div class="page-header">
            <?php if(isset($_SESSION['id'])){ ?>
                <h2 style="text-transform: capitalize; color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>Welcome <?php echo($_SESSION['id']);?></strong></h2>
            <?php }
             ?>
                <h3 style="color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>New Movies</strong></h3>
            </div>
            
            <div class="row">
            
            <?php
                        #Get The Movie Details
                        $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
                        $result = mysqli_query($con,"SELECT * from movie ORDER By movid DESC LIMIT 4");
                        if ($result) {
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $movid=$row['movid'];

                                #Get The Movie Image And Put In Thumbnails

                                echo('<div class=col-md-3><br>
                                <a href="movies/'."$movid".'/'."$movid".'-1.jpg" data-lightbox="gallery" class="thumbnail">
                                    <img src="movies/'."$movid".'/'."$movid".'-1.jpg">
                                </a>
                                <form class=form-horizontal action=movie.php method=GET>
                            <input type=hidden name=mov_id value=');?><?php echo($movid);?>
                            <?php echo('><button type=submit class=btn btn-success style=background:black;color:#FAED26;text-transform:capitalize;>'.$row['movname'].'</button>
                        
                        </form></div>');

                            } 
                        }
                        else{
                            echo("<h3>No Movies Found</h3>");
                            }
                    }
                    mysqli_close($con);
                
?>
            </div>
        </div>
        <?php
        require_once('footer_inc.php');
        ?>
    <!-- Lightbox for Viewing Image in Original Size -->
        <script src="js/lightbox.js"></script>
    </body>
</html>