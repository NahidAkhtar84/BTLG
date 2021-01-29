<?php  ?>
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
                        }
                        <li><a href="profile.php?username=<?php 
                        if(isset($_SESSION['username'])){
                           echo $_SESSION['username'];}else{
                            echo "";
                        }?>">Profile</a></li>
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