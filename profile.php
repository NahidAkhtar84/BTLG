<?php
include "lib/connection.php";
session_start();
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PROFILE</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="scss/main.css">
  <link rel="stylesheet" href="scss/skin.css">
  <link rel="stylesheet" href="scss/profile.css">

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
            <li><i class="fa fa-phone"></i><a href="#">+880 176 825 4894</a></li>
            <li><i class="fa fa-envelope"></i><a href="#">nahidakhtar084@gmail.com</a></li>                    </ul>
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


              <?php
              $crntusr =$_GET['username'];
              $queryname = "SELECT uid FROM member WHERE username = '$crntusr'";
              $result1 = mysqli_query($conn,$queryname);  
              while($row = mysqli_fetch_array($result1)){
               $id = $row['uid'];}
               ?>

               <li><a href="Meal.php?id=<?php echo $id?>">Meal</a></li>

               <li class="active"><a href="profile.php">Profile</a></li>
               <li><a href="contact.html">Contact</a></li>
               <li><a href="login.php">Sign In</a></li>
               <li><a href="registration.php">Sign Up</a></li>
             </ul>
           </div>
           <!--/.nav-collapse -->
         </div>
       </nav>
       <!--/.nav-ends -->
     </header>
     <!-- Banner -->
     <section id="top_banner">
      <div class="banner">
        <div class="inner text-center">
          <h2>A friendly residensial solution for the Bachelors</h2>
        </div>
      </div>
      <!-- Banner Ends  -->
      <div class="page_info">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-6">
              <h4>Profile</h4>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> 	/ </span><span class="current"> PROFILE</span></div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Profile Starts -->
  <?php if(isset($_GET['username'])){?>
    <div class="container">
      <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="https://images.unsplash.com/photo-1531062563406-03bb0697bd4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1504&q=80" alt="Profile image example"/>
        <?php
        $crntusr =$_GET['username'];
        $queryphoto = "SELECT mphoto FROM member WHERE username = '$crntusr'";
        $result = mysqli_query($conn,$queryphoto);
        while($row = mysqli_fetch_array($result)){ 
          echo '<img align="left" class="fb-image-profile thumbnail" src="data:image/jpg;base64,'.base64_encode($row['mphoto']).'" alt="Profile image example"/>';
        }
        ?>
        <div class="fb-profile-text">
          <h1><?php echo $_GET['username'];?></h1>

          <?php
          $crntusr =$_GET['username'];
          $queryname = "SELECT firstname,lastname FROM member WHERE username = '$crntusr'";
          $result1 = mysqli_query($conn,$queryname);	
          while($row = mysqli_fetch_array($result1)){
           echo "<h4>".$row['firstname']." ".$row['lastname']."</h4>";}						
           ?>

         </div>
       </div>
     </div> 
     <br>
     <div class="titlebar">
      <div class="container">
        <div class="row">
          <div class="section-heading text-center">
            <div class="col-md-12 col-xs-12">
              <h4>Contact <span>Information</span></h4>
            </div>
          </div>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <div class="icon-circle"> <i class="fa fa-envelope"></i></div>
              <?php
              $querymail = "SELECT email FROM member WHERE username = '$crntusr'";
              $result1 = mysqli_query($conn,$querymail);  
              while($row = mysqli_fetch_array($result1)){
               echo "<a>".$row['email']."</a>";}?>
             </h4>
           </div>

           <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <div class="icon-circle"> <i class="fa fa-phone-square"></i></div>
              <?php
              $queryphone = "SELECT phoneno FROM member WHERE username = '$crntusr'";
              $result1 = mysqli_query($conn,$queryphone);  
              while($row = mysqli_fetch_array($result1)){
               echo "<a>".$row['phoneno']."</a>";}?>
             </h4>
           </div>

           <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <div class="icon-circle"> <i class="fa fa-phone-square"></i></div>
              <?php
              $querysphone = "SELECT secondaryphoneno FROM member WHERE username = '$crntusr'";
              $result1 = mysqli_query($conn,$querysphone);  
              while($row = mysqli_fetch_array($result1)){
                if($row['secondaryphoneno'] == Null){
                 echo "<a>Secondary Phone Number is not available</a>"; 
               }else{
                 echo "<a>".$row['secondaryphoneno']."</a>";}}?>
               </h4>
             </div>
           </div>
         </div>
       </div>

       <!-- Address Starts -->
       <div class="titlebar">
        <div class="container">
          <div class="row">
            <div class="section-heading text-center">
              <div class="col-md-12 col-xs-12">
                <h4>Permanent <span>Address</span></h4>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <div class="icon-circle"> <i class="fa fa-home"></i></div>
                      <?php
                      $queryaddress = "SELECT address FROM member WHERE username = '$crntusr'";
                      $result1 = mysqli_query($conn,$queryaddress);  
                      while($row = mysqli_fetch_array($result1)){
                       echo "<a>".$row['address']."</a>";}?>
                     </h4>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <!-- Address Ends -->

         <!-- Birthday Starts -->
         <div class="titlebar">
          <div class="container">
            <div class="row">
              <div class="section-heading text-center">
                <div class="col-md-12 col-xs-12">
                  <h4>Birth <span>Day</span></h4>
                  <!-- bday starts -->
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <div class="icon-circle"> <i class="fa fa-birthday-cake"></i></div>
                        <?php
                        $querybday = "SELECT birthdate FROM member WHERE username = '$crntusr'";
                        $result1 = mysqli_query($conn,$querybday);  
                        while($row = mysqli_fetch_array($result1)){
                         echo "<a>".$row['birthdate']."</a>";}?>
                       </h4>
                     </div>
                     <!-- bday ends -->

                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- Birthday ends -->
           <!-- Update Button Starts -->
           <div class="container">
            <div class="col span_12">
              <div class="col-sm-12 wpb_column column_container">
                <div class="wpb_wrapper">
                  <div class="section-heading text-center">

                    <div class="hero-unit">
                      <h1>Update Your <span>Profile</span></h1>
                      <p>Update Your profile. This service will be available to you if You are approved by the Admin</p>
                      <p>
                        <?php 
                        $querybday = "SELECT uid FROM member WHERE username = '$crntusr'";
                        $result1 = mysqli_query($conn,$querybday);  
                        while($row = mysqli_fetch_array($result1)){
                         $usrid = $row['uid'];}?>
                         <a class="btn btn-primary btn-large" href="update.php?id=<?php echo $usrid?>">
                          Update
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Update Button Ends -->

          <!-- /container --> 
        <?php }else{?>
          <div class="container">
            <div class="col span_12">
              <div class="col-sm-12 wpb_column column_container">
                <div class="wpb_wrapper">
                  <div class="section-heading text-center">

                    <div class="hero-unit">
                      <h1>You Don't have any Profile record to Show !</h1>
                      <p>Please, Go to <a href="registration.php"><span>Signup</span></a> page to register Yourself and use your login information to create Your own Profile. Thank You</p>
                      <p>
                        <a class="btn btn-primary btn-large">
                          Learn more
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>


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