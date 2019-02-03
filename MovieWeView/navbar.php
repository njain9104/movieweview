<nav class="navbar navbar-inverse navbar-fixed-top" style="background:black;">
            <div class="container">
                <div class="row">
                        <div class="navbar-header">
                                <a class="navbar-brand" style="color:#FAED26;">MovieWeView</a>
                        </div>
                        <div class="col-md-3">
                            <ul class="nav navbar-nav">
                                <li><a  style="color:#FAED26;" href="index.php">Home</a></li>
                                <li><a style="color:#FAED26;" href="browse.php">Browse</a></li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                        <ul class="nav navbar-nav navbar-right">
                        <!-- Check Whether User has Logged in Or Not -->
                            <?php if(isset($_SESSION['id'])){ ?>
                                <li><a style="color:#FAED26"; href="userhome.php">My Reviews</a></li>
                                <li><a style="color:#FAED26;" href="logout.php">Logout <strong style="text-transform: capitalize;"><?php echo($_SESSION["id"]);?></strong></a></li>
                            <?php }else{ ?>
                                <li><a style="color:#FAED26;" href="login.php">Login</a></li>
                            <?php } ?>      
                            </ul>
                        </div>
                        <div class="nav navbar-nav form-inline" style="padding:10px;">
                                <form class="form-horizontal" action="search.php" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="q" placeholder="Actor/Director/Name/Year/Genre" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" style="background:#FAED26;">
                                            <!-- Search Icon -->
                                            <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
</nav>