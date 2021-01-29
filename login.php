<?php
include "lib/connection.php";
session_start();
$emsg = 0;
if(isset($_POST['loginuser'])) {
      // username and password sent from form    
  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
  $mypassword = md5(mysqli_real_escape_string($conn,$_POST['password1'])); 
  
  $sql = "SELECT uid FROM member WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
  
  $count = mysqli_num_rows($result);
  
      // If result matched $myusername and $mypassword, table row must be 1 row
  
  if($count == 1) {
       //  session_register("myusername");
   $_SESSION['username'] = $myusername; 
         //$_SESSION['success'] = "You are now Logged in !";
   header("location: index.php");
}else {
      	 //$error = "Your Login Name or Password is invalid";
    $emsg = 1;
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
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
                <div class="col-md-6 col-sm-6 col-xs-12 top-header-links">
                    <ul class="contact_links">
                        <li><i class="fa fa-phone"></i><a href="#">+91 848 594 5080</a></li>
                        <li><i class="fa fa-envelope"></i><a href="#">sales@aspiresoftware.in</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="meal.php">Meal</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li class="active"><a href="login.php">Sign In</a></li>
                        <li><a href="registration.php">Sign Up</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <!--/.nav-ends -->
    </header>

    <section id="top_banner">
        <div class="banner">
            <div class="inner text-center">
                <h2>A friendly residensial solution for the Bachelors</h2>
            </div>
        </div>
    </section>



    <section id="login-reg">
        <div class="container">
            <!-- Top content -->
            <div class="row">
                <div class="col-md-6 col-sm-12 forms-right-icons">
                    <div class="section-heading">
                        <h2>Sign In With <span>Us</span></h2>
                        <?php if(isset($_SESSION['username'])){?>
                        	<p class="subheading">Hi, <span>Mr. <?php echo $_SESSION['username'];?></span> You have registered successfully. Sign in here to get your services from BTLG. We are always there for you to solve your residential problem in the city.</p>
                        	<?php
                        }else{
                         ?>
                         <p class="subheading">
                           Use Your username and password to Login or visit the Register page to get yourself registered. 
                       </p>
                   <?php }?>
               </div>
               
               <div class="row">
                   <?php if($emsg == 0){?>
                    <div class="col-xs-2 icon"><i class="fa fa-user"></i></div>
                    <div class="col-xs-10 datablock">
                        <h4>Login Direction</h4>
                        <p>Use your username and password what you have choosen at the time of registration to login to the site. </p>
                    </div>
                <?php }
                if($emsg == 1){?>
                   <div class="col-xs-2 icon"><i class="fa fa-exclamation-triangle" style="color: red;"></i></div>
                   <div class="col-xs-10 datablock">
                    <h4 style="color: red;">Failed to Login</h4>
                    <p style="color: red;">Your Login Name or Password is invalid !</p>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="col-md-6 col-sm-12">

        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Login to our site</h3>
                    <p>Enter username and password to log in:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-form">
                    <div class="input-group form-group">
                        <span class="input-group-addon" for="username" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group form-group">
                        <span class="input-group-addon" for="password1" id="basic-addon1"><i class="fa fa-unlock"></i></span>
                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" name="loginuser" class="btn">Sign in!</button>
                </form>
            </div>
        </div>

        <div class="social-login">
            <h3>...or login with:</h3>
            <div class="social-login-buttons">
                <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
                <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
                <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                    <i class="fa fa-google-plus"></i> Google Plus
                </a>
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

</body>

</html>
