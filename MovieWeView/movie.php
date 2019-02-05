<?php
session_start(); #To Track The Session
?>
<?php 
                        #Get The Movie Details
                         $movid=$_GET['mov_id'];
                         
                         $conn = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
                         $result1 = mysqli_query($conn,"SELECT * from movie where movid='$movid'");
                         if ($result1) {
                             if ($result1->num_rows > 0) {
                             while($row1 = $result1->fetch_assoc()) {
                                 $movname=$row1['movname'];
                                 $actor1=$row1['actor1'];
                                 $actor2=$row1['actor2'];
                                 $actor3=$row1['actor3'];
                                 $director=$row1['director'];
                                 $year=$row1['year'];
                                 $genre=$row1['genre'];
                                 $plot=$row1['plot'];
                             } 
                         }   
                         else {
                                 echo("No reviews yet, Check Again Later!<hr>");
                         }
                     }
                         mysqli_close($conn);
            ?>
<!DOCTYPE html>
<!-- English Language Content -->
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <!-- Compatibilty for other devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Give Reviews To <?php echo($movname);?>">
        <meta name="keywords" content=" '<?php echo($movname); ?>',Reviews,'Add Reviews',Plot,Cast,'Movie Overview'">
        <!-- Set The Title Based on the Movie Name -->
        <title> <?php echo ($movname); ?>  
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="mov.css">
        <style>
            body{
                padding-top:290px;
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
        
            <div>
                                <!-- Movie Name -->
                <h3 style="text-transform:capitalize;"><strong><?php echo($movname);?></strong></h3>
            </div>
            <div class="row">
                <div class="col-md-3">
                <!-- Get Movie Poster -->
                <a href="movies/<?php echo($movid);?>/<?php echo($movid);?>-1.jpg" data-lightbox="gallery" class="thumbnail">
                                    <img src="movies/<?php echo($movid);?>/<?php echo($movid);?>-1.jpg">
                                </a>
                </div>
                <div class="col-md-4" style="text-transform:capitalize;">
                                <!-- Get Year, Genre and Director -->
                    <h4><strong>Year: <time><?php echo($year);?></time></strong></h4><br>
                    <h4><strong>Genre: <?php echo($genre);?></strong></h4><br>
                    <h4><strong>Director: <?php echo($director);?></strong></h4><br>
                    <!-- If Logged in Enable User to Add Reviews -->
                    <?php if(isset($_SESSION['id'])){ ?>
                        <button class="btn btn-information" data-target="#r1" data-toggle="collapse" style="background:black;color:#FAED26;">Add A Review</button>
                        <?php }else{ ?>
                        <a href="login.php" style="color:#FAED26;"><h4><strong>Login To Add A Review</strong></h4></a>
                    <?php } ?>
                    <div id="r1" class="collapse">
                    <!-- Go to addrev.php to Add Review -->
                    <form class="form-horizontal" action="addrev.php" method="POST">
                        <div class="form-group">
                            <textarea class="form-control"  name="review1" id="review1" rows=3 placeholder="What do you Think of this Movie!"></textarea>
                        <div class="form-group">
                            <input type="hidden" name="mov_id" value="<?php echo($movid);?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" style="background:#FAED26;color:black;">
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-5">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                            
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                  <div class="item active">
                                  <img src="movies/<?php echo($movid);?>/<?php echo($movid);?>-2.jpg" class="img-thumbnail" style="width:100%; height:300px;">  
                                  </div>
                            
                                  <div class="item">
                                  <img src="movies/<?php echo($movid);?>/<?php echo($movid);?>-2.jpg" class="img-thumbnail" style="width:100%; height:300px;">
                                  </div>
                                  <div class="item">
                                  <img src="movies/<?php echo($movid);?>/<?php echo($movid);?>-2.jpg" class="img-thumbnail" style="width:100%; height:300px;">
                                  </div>
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills">
                    <!-- BootStrap Pills for Overview And Reviews -->
                    <!-- p1 for Overview and p2 for Reviews -->
                        <li><a href="#p1" data-toggle="pill" style="color:#FAED26;"><h4><strong>Overview</strong></h4></a></li>
                        <li><a href="#p2" data-toggle="pill" style="color:#FAED26;"><h4><strong>Reviews</strong></h4></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="p1">
                            <br>
                            <!-- Collapsible Buttons For Plot And Cast -->
                            <button class="btn btn-information" data-target="#desc" data-toggle="collapse" style="background:#FAED26;color:black;"><h5>Plot</h5></button>
                            <button class="btn btn-information" data-target="#cast" data-toggle="collapse" style="background:#FAED26;color:black;"><h5>Cast</h5></button>
                            <div id="desc" class="collapse">
                                <h4><strong>Plot</strong></h4>
                                    <p><strong>
                                    <?php echo($plot);?>
                                    </p></strong>
                            </div>
                            <div id="cast" class="collapse">
                                <h4><strong>Cast</strong></h4>
                                <ul style="text-transform:capitalize;"><strong>
                                    <li><?php echo($actor1);?></li>
                                    <li><?php echo($actor2);?></li>
                                    <li><?php echo($actor3);?></li>
                                    </strong></ul>
                            </div>                
                        </div>
                        <div class="tab-pane" id="p2" style="text-transform:capitalize;">
                            <br>
                            <?php
                                #Connect to Database to Fetch Reviews and View It
                                $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
                                $result = mysqli_query($con,"SELECT * from review where r_movid='$movid'");
                                if ($result) {
                                    if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?> <p><strong><li>What <?php echo($row['r_uname']);?> thinks about the movie!:<br><?php echo($row['rev']); ?></li></strong></p><hr><?php
                                    } 
                                }   
                                else {
                                        echo("No reviews yet, Check Again Later!<hr>");
                                }
                            }
                                mysqli_close($con);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer_inc.html');
        ?>
        <script src="js/bootstrap.js"></script>
        <script src="jquery.js"></script>
        <!-- Lightbox for Viewing Movie Poster in Original Size -->
        <script src="js/lightbox.js"></script>
    </body>
</html>