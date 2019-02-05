<?php
session_start();    #To Track The Session
?>
<!DOCTYPE html>
<html lang='en'>
<!-- English Language Content -->
    <head>
        <meta charset="UTF-8">
        <!-- Compatibilty for other devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Search Movies">
        <meta name="keywords" content="Search,Movies,Name,Year,Genre,Actor,Director">
        <title>  
            Search Movies
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="mov.css">
        <script src="js/bootstrap.js"></script>
        <script src="jquery.js"></script>
        <style>
            body{
                padding-top:270px;
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
                <h2 style="text-transform: capitalize;color:black;text-shadow: 0 0 0.2em #FAED26;">Search Results</h2>
            </div>
            <div class="row">
                <table class="table table-bordered table-hover" style="color:dodger#FAED26;">
                    <thead>
                        <tr class="warning">
                            <th><h4>Movie Name</h4></th>
                            <th><h4>Link</h4></th>
                        </tr>
                    </thead>
                    <tbody style="text-transform:capitalize;">
                    <?php
                        #Get The Movie Details To Search
                        $con = mysqli_connect('localhost','mov','movdb','mov') or die('Unable To connect');
                        $result = mysqli_query($con,"SELECT movname,movid from movie 
                                                where movname like "."'%$_GET[q]%'".
                                                "or actor1 like "."'%$_GET[q]%'"."or actor2 like "."'%$_GET[q]%'"."or actor3 like "."'%$_GET[q]%'".
                                                "or director like "."'%$_GET[q]%'"."or year like "."'%$_GET[q]%'"."or genre like "."'%$_GET[q]%'");
                        if ($result) {
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                #Fetch The Movie Name And it's Link and Insert it in Table
                                ?> <tr><td><h5><strong><?php echo($row['movname']); ?></strong></h5></td>
                                <td><h5>
                                <form class="form-horizontal" action="movie.php" method="GET">
                                <input type=hidden name="mov_id" value=<?php echo($row['movid']);?>
                                ><button type=submit class=btn btn-success style="background:black;color:#FAED26;text-transform:capitalize;">
                                Click Here To Go To The Movie!
                                </button></form></td></tr><?php
                            } 
                        }
                        else{
                            echo("<h3>No Movies Found</h3>");
                            }
                    }
                    mysqli_close($con);
                
                    ?>
                    </tbody>
                </table>
             </div>
        </div>
        <?php
        require_once('footer_inc.html');
        ?>
    </body>
</html>