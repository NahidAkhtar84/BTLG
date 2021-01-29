<?php
include "lib/connection.php";
session_start();
if(isset($_SESSION['username'])){
    $crntusr = $_SESSION['username'];

}else{
    $crntusr ="";
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('Refresh: 0.3; URL=login.php');
}

$queryid = "SELECT uid FROM member WHERE username = '$crntusr'";
$result1 = mysqli_query($conn,$queryid);  
while($row = mysqli_fetch_array($result1)){
    $id = $row['uid'];}

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="scss/main.css">
        <link rel="stylesheet" href="scss/skin.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="./script/index.js"></script>
    </head>

    <body id="wrapper">

        <section id="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-7 top-header-links">
                        <ul class="contact_links">
                            <li><i class="fa fa-phone"></i><a href="#">+880 176 825 4894</a></li>
                            <li><i class="fa fa-envelope"></i><a href="#">nahidakhtar084@gmail.com</a></li>
                            <li><i class="fa fa-user"></i><?php
                            if(isset($_SESSION['username'])){
                               echo "hi, ".$_SESSION['username'];
                           }?></li>
                       </ul>
                   </div>
                   <div class="col-md-5 col-sm-5 col-xs-5 social">
                    <ul class="social_links">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <h1>BTLG</h1><span>Home for the Bachelors</span></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="meal.php?id=<?php
                            if($id != null){
                               echo $id;}else{
                                header('location: login.php');
                            }
                            ?>">Meal</a></li>
                        
                        <li><a href="profile.php?username=<?php 
                        if(isset($_SESSION['username'])){
                           echo $_SESSION['username'];}else{
                            echo "";
                        }
                           ?>">Profile</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="login.php">Sign In</a></li>
                        <li><a href="registration.php">Sign Up</a></li>
                        <!-- Admin privilege starts -->
                    <?php
                        $queryadmin = "SELECT memberstatus FROM member WHERE username = '$crntusr'";
                        $result1 = mysqli_query($conn,$queryadmin);
                        $ad =0;  
                        while($row = mysqli_fetch_array($result1)){
                         $ad = $row['memberstatus'];}
                         if($ad == 2){
                          ?>

                          <li><a href="admin/admin.php?id=<?php echo $id?>">Admin</a></li>
                    <?php
                      }
                    ?>
                      <!-- Admin privilege starts -->
                  </ul>
              </div>
              <!--/.nav-collapse -->
          </div>
      </div>
  </nav>
</header>
<!--/.nav-ends -->

<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('img/banner-slide-1.jpg');"></div>
            <div class="carousel-caption slide-up">
                <h1 class="banner_heading">BE A MEMBER OF<span> BTLG </span></h1>
                <p class="banner_txt">Use this Web Application to manage your Mess and save unnecessary time to manage your mess's meal, finance and other problems. We are providing many other features also.</p>
                <div class="slider_btn">
                    <button type="button" class="btn btn-default slide">Learn More <i class="fa fa-caret-right"></i></button>
                    <button type="button" class="btn btn-primary slide">Learn More <i class="fa fa-caret-right"></i></button>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="fill" style="background-image:url('img/banner-slide-2.jpg');"></div>
            <div class="carousel-caption slide-up">
                <h1 class="banner_heading">BE A MEMBER OF <span> BTLG </span></h1>
                <p class="banner_txt">Use this Web Application to manage your Mess and save unnecessary time to manage your mess's meal, finance and other problems. We are providing many other features also.</p>
                <div class="slider_btn">
                    <button type="button" class="btn btn-default slide">Learn More <i class="fa fa-caret-right"></i></button>
                    <button type="button" class="btn btn-primary slide">Learn More <i class="fa fa-caret-right"></i></button>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="fill" style="background-image:url('img/banner-slide-3.jpg');"></div>
            <div class="carousel-caption slide-up">
                <h1 class="banner_heading">BE A MEMBER OF <span> BTLG </span></h1>
                <p class="banner_txt">Use this Web Application to manage your Mess and save unnecessary time to manage your mess's meal, finance and other problems. We are providing many other features also.</p>
                <div class="slider_btn">
                    <button type="button" class="btn btn-default slide">Learn More <i class="fa fa-caret-right"></i></button>
                    <button type="button" class="btn btn-primary slide">Learn More <i class="fa fa-caret-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>

</div>
<?php
$queryadmin = "SELECT memberstatus FROM member WHERE username = '$crntusr'";
$result1 = mysqli_query($conn,$queryadmin);
$ad =0;  
while($row = mysqli_fetch_array($result1)){
 $ad = $row['memberstatus'];}
 if($ad == 2 OR $ad == 1){
  ?>
  <section id="features">
    <div class="container">
        <div class="row">
            <!-- Current News Starts -->
            <?php
            $runquery = mysqli_query($conn,"SELECT * FROM currentnews ORDER BY newsid DESC LIMIT 3");
            while ($resshow = mysqli_fetch_assoc($runquery)) {
                ?>
                <div class="col-md-4 col-xs-12 block">
                    <div class="col-md-2 col-xs-2"><i class="fa fa-bullhorn feature_icon"></i></div>
                    <div class="col-md-10 col-xs-10">
                        <h4>Current News</h4>
                        <?php
                        $sid = $resshow['uid'];
                        $queryname = "SELECT username FROM member WHERE uid = '$sid'";
                        $result1 = mysqli_query($conn,$queryname);  
                        while($row = mysqli_fetch_array($result1)){
                            echo "<b>".$row['username']."</b>";}
                            ?>
                            <p>
                                <?php echo $resshow['news'];?>
                            </p>
                            <a href="recnews.php?id=<?php echo $id?>" class="readmore">Read More <i class="fa fa-caret-right"></i></a>
                        </div>
                    </div>
                    <!-- Current news Ends -->
                    <?php
                } 
                ?>   
            </div>
        </div>
    </section>
    <?php
}
?>

<section id="about">
    <div class="image-holder col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
        <div class="background-imgholder">
            <img src="img/1.jpg" alt="about" class="img-responsive" style="display:none;" />
        </div>
    </div>

    <div class="container-fluid">

        <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-2 col-xs-12 text-inner ">
            <div class="text-block">
                <div class="section-heading">
                    <h1>ABOUT <span>BTLG</span></h1>
                    <p class="subheading">It's a novice effort to solve the complex management of usual bachelor mess</p>
                </div>

                <ul class="aboutul">
                    <li> <i class="fa fa-check"></i>It keeps the record of the members of the mess.</li>
                    <li> <i class="fa fa-check"></i>It keeps the count of meal and notify members about the meal.</li>
                    <li> <i class="fa fa-check"></i>It notify any important notice about the mess.</li>
                    <li> <i class="fa fa-check"></i>It provides a secure platform where mess members can share their daily personal informations.</li>
                    
                </ul>

                <button type="button" class="btn btn-primary slide">Learn More  <i class="fa fa-caret-right"></i> </button>


            </div>
        </div>
    </div>
</section>







<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 block">
                <div class="footer-block">
                    <h4>Address</h4>
                    <hr/>
                    <p>
                        House No : <span>1249</span>
                        Road No : 10, Avenue : 2
                        Mirpur<span> DOHS</span>
                        Dhaka
                    </p>
                    <a href="#" class="learnmore">Learn More <i class="fa fa-caret-right"></i></a>
                    <br>
                    <br>
                    <p>Logout Here</p>
                    <button class="btn btn-primary btn-large"><a href="index.php?logout='1'">Logout</a></button>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 block">
                <div class="footer-block">
                    <h4>Site Map</h4>
                    <hr/>
                    <ul class="footer-links">
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#"><span>Home</span></a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Update</a></li>
                        <li><a href="#"><span>Home </span>to Meal</a></li>
                        <li><a href="#"><span>Home </span>to Contact</a></li>
                        
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 block">
                <div class="footer-block">
                    <h4>Community</h4>
                    <hr/>
                    <ul class="footer-links">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Free Goods</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 <block></block>">
                <div class="footer-block">
                    <h4>Admin Site map</h4>
                    <hr/>
                    <ul class="footer-links">
                        <li>
                            <a href="#" class="post">Sign Up</a>
                        </li>
                        <li>
                            <a href="#" class="post">Sign In</a>                           
                        </li>
                        <li>
                            <a href="#" class="post">Home</a>
                        </li>
                        <li>
                            <a href="#" class="post">Admin</a>
                        </li>
                        <li>
                            <a href="#" class="post">Admin to table</a>
                        </li>
                        <li>
                            <a href="#" class="post">Admin to News Feed</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


</section>

<section id="bottom-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 btm-footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Use</a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 copyright">
                Developed by <a href="#">Nahid Ibne Akhtar</a> designed by <a href="#">Nahid Ibne Akhtar</a>
            </div>
        </div>
    </div>
</section>

<div id="panel">
    <div id="panel-admin">
        <div class="panel-admin-box">
            <div id="tootlbar_colors">
                <button class="color" style="background-color:#1abac8;" onclick="mytheme(0)"></button>
                <button class="color" style="background-color:#ff8a00;" onclick="mytheme(1)"> </button>
                <button class="color" style="background-color:#b4de50;" onclick="mytheme(2)"> </button>
                <button class="color" style="background-color:#e54e53;" onclick="mytheme(3)"> </button>
                <button class="color" style="background-color:#1abc9c;" onclick="mytheme(4)"> </button>
                <button class="color" style="background-color:#159eee;" onclick="mytheme(5)"> </button>
            </div>
        </div>

    </div>
    <a class="open" href="#"><span><i class="fa fa-gear fa-spin"></i></span></a>
</div>

</html>