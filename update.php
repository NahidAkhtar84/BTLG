<?php
include "lib/connection.php";
session_start();


if(isset($_POST['updateac'])){
    $usrid = $_POST['usrid'];
    $firstname = $_POST['mem_fname'];
    $lastname = $_POST['mem_lname'];
    $email = $_POST['mem_email'];
    $phoneno = $_POST['mem_phone'];
    $phoneno2 = $_POST['mem_phone2'];
    $birthdate = $_POST['mem_bday'];
//$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $address = $_POST['mem_address'];

    $querybday = "SELECT username FROM member WHERE uid = '$usrid'";
    $result1 = mysqli_query($conn,$querybday);  
    while($row = mysqli_fetch_array($result1)){
        $username = $row['username'];}

        $updatequery = "UPDATE member 
        SET firstname='$firstname',lastname='$lastname',email='$email',phoneno='$phoneno',secondaryphoneno='$phoneno2',birthdate='$birthdate',address='$address'
        WHERE uid=$usrid";


        if($conn ->query($updatequery)){
            header('location:profile.php?username='.$username);
        }else{
            die($conn -> error);
        }  
    }

// Update image starts
    if(isset($_POST["profilepic"])){
        $usrid = $_POST['usrid'];
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query3 = "UPDATE member SET mphoto = '$file' WHERE uid =$usrid";
        mysqli_query($conn,$query3);

        $querybday = "SELECT username FROM member WHERE uid = '$usrid'";
        $result1 = mysqli_query($conn,$querybday);  
        while($row = mysqli_fetch_array($result1)){
            $username = $row['username'];}

            if($conn ->query($query3)){
                header('location:profile.php?username='.$username);
            }else{
                die($conn -> error);
            }  
        }

 // Update image ends

        if(isset($_GET['id'])){
            $usrid= $_GET['id'];    
            $selectquery = "SELECT uid,firstname,lastname,email,phoneno,secondaryphoneno,birthdate,mphoto,address FROM member WHERE uid=$usrid";
            $runquery1 = $conn -> query($selectquery);
            if($runquery1 -> num_rows >0){

                while($resshow1 = $runquery1 -> fetch_assoc()) {

                    ?>
                    <!DOCTYPE html>
                    <html>

                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <title>Update Profile</title>
                        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
                        <link rel="stylesheet" href="scss/main.css">
                        <link rel="stylesheet" href="scss/skin.css">
                        <!-- <link rel="stylesheet" href="scss/profile.css"> -->
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
                                            <li><i class="fa fa-envelope"></i><a href="#">nahidakhtar084@gmail.com</a></li>
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

                                            <li><a href="meal.php?id=<?php echo $usrid?>">meal</a></li>
                                            <li><a href="profile.php?username=<?php echo $_SESSION['username']?>">Profile</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="login.php">Sign In</a></li>
                                            <li class="active"><a href="registration.php">Sign Up</a></li>
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
                                            <h2>Update Your <span>Profile</span></h2>
                                            <p class="subheading">Be up to date about your actual and recent information and help us to provide you the best possible sevice You need. 
                                            </p>
                                            <p><span>“In understanding and developing your true identity, you can stand on solid ground because you are a person of God’s unique creation”</span><br>
                                            ― Sunday Adelaja</p>
                                        </div>
                                        <div class="row">

                                            <div class="col-xs-2 icon"><i class="fa fa-picture-o"></i></div>
                                            <div class="col-xs-10 datablock">
                                                <h4>Your Current Profile Picture</h4>
                                                <?php
                // $crntusr =$_GET['username'];
                                                $queryphoto = "SELECT mphoto FROM member WHERE uid = $usrid";
                                                $result = mysqli_query($conn,$queryphoto);
                                                while($row = mysqli_fetch_array($result)){ 
                                                    echo '<img align="left" class="fb-image-profile thumbnail" src="data:image/jpg;base64,'.base64_encode($row['mphoto']).'" alt="Profile image example" style="width:200px;height:200px;"/>';}
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-2 icon"><i class="fa fa-pencil-square-o"></i></div>
                                                <div class="col-xs-10 datablock">
                                                    <h4>Update Your Profile Picture</h4>
                                                    <!-- Image Form Starts -->
                                                    
                                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

                                                        <input type="hidden" name="usrid" value="<?php echo $usrid?>">

                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="image" id="basic-addon1"><i class="fa fa-picture-o"></i></span>
                                                            <input type="file" name="image" id="image" class="form-control" aria-describedby="basic-addon1">
                                                        </div>
                                                        
                                                        <button type="submit" name="profilepic" id="profilepic" class="btn">Update profile Picture</button>
                                                    </form>
                                                    <!-- Image Form Ends -->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-2 icon"><i class="fa fa-support"></i></div>
                                                <div class="col-xs-10 datablock">
                                                    <h4>Customer Support</h4>
                                                    <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <!--forms-right-icons-->
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-box">
                                                <div class="form-top">
                                                    <div class="form-top-left">
                                                        <h3>Update Your Profile</h3>
                                                        <p>Update your information in the form and press Update button</p>
                                                    </div>
                                                    <div class="form-top-right">
                                                        <i class="fa fa-pencil"></i>
                                                    </div>
                                                </div>
                                                <div class="form-bottom">
                                                    <form role="form" class="login-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                                                        <input type="hidden" name="usrid" value="<?php echo $usrid?>">

                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="mem_fname" id="basic-addon1"><i class="fa fa-user"></i></span>
                                                            <input type="text" name="mem_fname" id="mem_fname" class="form-control" value="<?php echo $resshow1['firstname'] ?>" aria-describedby="basic-addon1">
                                                        </div>

                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="mem_lname" id="basic-addon1"><i class="fa fa-user"></i></span>
                                                            <input type="text" name="mem_lname" id="mem_lname" class="form-control" value="<?php echo $resshow1['lastname'] ?>" aria-describedby="basic-addon1">
                                                        </div>
                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="mem_email" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                                            <input type="text" name="mem_email" id="mem_email"  class="form-control" value="<?php echo $resshow1['email'] ?>" aria-describedby="basic-addon1">
                                                        </div>

                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="mem_phone" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                                            <input type="tel" class="form-control" name="mem_phone" id="mem_phone" value="<?php echo $resshow1['phoneno'] ?>" aria-describedby="basic-addon1">
                                                        </div>

                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="mem_phone2" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                                            <input type="tel" class="form-control" name="mem_phone2" id="mem_phone2" value="<?php echo $resshow1['secondaryphoneno'] ?>" aria-describedby="basic-addon1">
                                                        </div>

                                                        <div class="input-group form-group">
                                                            <span class="input-group-addon" for="mem_bday" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                                                            <input type="date" class="form-control" name="mem_bday" id="mem_bday" value="<?php echo strftime('%Y-%m-%d',
                                                            strtotime($resshow1['birthdate']));?>" aria-describedby="basic-addon1">
                                                        </div>

                                                        <div class="input-group form-group">
                                                            <textarea rows="4" cols="70" name="mem_address" id="mem_address" class="form-control" placeholder="<?php echo $resshow1['address'] ?>"></textarea>

                                                        </div>

                                                        <button type="submit" name="updateac" class="btn">Update!</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>


                                    </section>
                                    <?php
                                }
                            }
                        }
                        ?>
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

                    <script>
                       $(document).ready(function(){
                          $('#register').click(function(){
                             var image_name = $('#image').val();
                             if(image_name == '')
                             {
                                alert("Please Select Image!");
                                return false;
                            }
                            else
                            {
                                var extension = $('#image').val().split('.').pop().toLowercase();
                                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg'])== -1)
                                {
                                   alert('Invalid Image File!');
                                   $('#image').val();
                                   return false;
                               }
                           }
                       });
                          
                      });
                       
                  </script>