<?php
session_start();    #To Track The Session
?>

<!DOCTYPE html>
<!-- English Language Content -->
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <!-- Compatibilty for other devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Browse Movies And Add Reviews">
        <meta name="keywords" content="Browse,Movies,Reviews">
        <title>  
            Browse Movies
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="mov.css">
        <style>
            * {
                 box-sizing: border-box;
              }
            
            body{
                padding-top:280px;
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
        </div>
        <div class="container">
            <div class="page-header">
                <h3 style="color:black;text-shadow: 0 0 0.2em #FAED26;"><strong>Browse Movies</strong></h3>
            </div>
            
            <div class="row">
            
            <?php
                        #Get The Movie Details
                        $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
                        $result = mysqli_query($con,"SELECT * from movie ORDER By movid DESC");
                        if ($result) {
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $movid=$row['movid'];
                                #Get The Movie Image And Put In Thumbnails
                                ?><div class=col-md-3><br>
                                <a href="movies/<?php echo($movid);?>/<?php echo($movid);?>-1.jpg" data-lightbox="gallery" class="thumbnail">
                                    <img src="movies/<?php echo($movid);?>/<?php echo($movid);?>-1.jpg">
                                </a>
                                
                                <form class=form-horizontal action=movie.php method=GET>
                                
                            <input type=hidden name=mov_id value=<?php echo($movid);?>>
                            
                       <button type=submit class=btn btn-success style=background:black;color:#FAED26;text-transform:capitalize;><?php echo($row['movname']);?></button>
                        </form></div><?php
                            } 
                        }
                        else{
                            ?><h3>No Movies Found</h3><?php
                            }
                    }
                    mysqli_close($con);
                
?>
            </div>
        </div>
        <?php
        require_once('footer_inc.html');
        ?>
    <!-- Lightbox for Viewing Image in Original Size -->
        <script src="js/lightbox.js"></script>
    </body>
</html>