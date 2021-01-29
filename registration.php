<?php
include "lib/connection.php";
$errors = array();
session_start();
$username = "";

if(isset($_POST['register'])){

    $username = mysqli_real_escape_string($conn, isset($_POST['user_name']) ? $_POST['user_name'] : '');
    $firstname = mysqli_real_escape_string($conn, isset($_POST['mem_fname']) ? $_POST['mem_fname'] : '');
    $lastname = mysqli_real_escape_string($conn, isset($_POST['mem_lname']) ? $_POST['mem_lname'] : '');
    $email = mysqli_real_escape_string($conn, isset($_POST['mem_email']) ? $_POST['mem_email'] : '');
    $phoneno = mysqli_real_escape_string($conn, isset($_POST['mem_phone']) ? $_POST['mem_phone'] : '');
    $phoneno2 = mysqli_real_escape_string($conn, isset($_POST['mem_phone2']) ? $_POST['mem_phone2'] : '');
    $birthdate = mysqli_real_escape_string($conn, isset($_POST['mem_bday']) ? $_POST['mem_bday'] : '');
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $address = mysqli_real_escape_string($conn, isset($_POST['mem_address']) ? $_POST['mem_address'] : '');
    $s_pass = md5(mysqli_real_escape_string($conn, isset($_POST['mem_pass']) ? $_POST['mem_pass'] : ''));
    $c_pass = md5(mysqli_real_escape_string($conn, isset($_POST['mem_passc']) ? $_POST['mem_passc'] : ''));


// checking if user doesnot repeat
    $user_check_query = "SELECT * FROM member WHERE username = '$username' or email = '$email' LIMIT 1";

    $result1 = mysqli_query($conn, $user_check_query);
    $check = mysqli_fetch_assoc($result1);

    if($check){
      if($check['username'] === $username){array_push($errors, "User name is already taken, choose another one!");}
      if($check['email'] === $email){array_push($errors, "This email Id already has a registered username!");}
  }

  if(empty($username)) {array_push($errors, "Username is required");}
  if(empty($firstname)) {array_push($errors, "Your First Name is required ");}
  if(empty($lastname)) {array_push($errors, "Your Last Name is required ");}
  if(empty($email)) {array_push($errors, "Email is required ");}
  if(empty($phoneno)) {array_push($errors, "Phone Number is required ");}
  if(empty($address)) {array_push($errors, "Your permanent Address is required ");}
  if(empty($s_pass)) {array_push($errors, "Password is required ");}

// checking if user doesnot repeat ends
  if($s_pass == $c_pass AND count($errors) == 0){
		//$result = "Password Matched !";

      $insertquery = "INSERT INTO member(username, firstname, lastname, email, phoneno, secondaryphoneno, birthdate, mphoto, address, password)
      VALUES('$username','$firstname','$lastname','$email','$phoneno','$phoneno2','$birthdate','$file','$address','$s_pass')";

      if($conn -> query($insertquery)){
			//echo "You have signed up successfully !";
       $_SESSION['username']=$username;
       header('location: login.php');
   }
   else{
     die($conn -> error);
 }
}
else{
  array_push($errors, "Password not matched!");
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
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
                        <li><a href="meal.php">Meal</a></li>
                        <li><a href="profile.php">Profile</a></li>
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
                        <h2>Sign Up With <span>Us</span></h2>
                        <p class="subheading">Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum ea utamur impetus fuisset nam nostrud euismod volumus ne mei.
                        </p>
                    </div>
                    <div class="row">

                    	<?php
                        if(count($errors) > 0){
                           ?>
                           <div class="col-xs-2 icon"><i class="fa fa-exclamation-triangle" style="color: red;"></i></div>
                           <div class="col-xs-10 datablock">
                            <h4 style="color: red;">Failed to Signup</h4>
                            <?php
                            for($i=0;$i<count($errors);$i++){
                               ?>
                               <p style="color: red;"><?php echo $errors[$i]."<br>";?></p>
                               <?php
                           }
                           ?>
                       </div>
                       <?php 
                   }?>

                   <div class="col-xs-2 icon"><i class="fa fa-laptop"></i></div>
                   <div class="col-xs-10 datablock">
                    <h4>100% Responsive</h4>
                    <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 icon"><i class="fa fa-bullhorn"></i></div>
                <div class="col-xs-10 datablock">
                    <h4>Powerful Features</h4>
                    <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
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
                        <h3>Sign up now</h3>
                        <p>Fill in the form below to get instant access</p>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-pencil"></i>
                    </div>
                </div>
                <div class="form-bottom">
                    <form role="form" class="login-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

                      <div class="input-group form-group">
                        <span class="input-group-addon" for="user_name" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_fname" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="mem_fname" id="mem_fname" class="form-control" placeholder="First Name" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_lname" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input type="text" name="mem_lname" id="mem_lname" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_email" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="mem_email" id="mem_email"  class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_phone" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        <input type="tel" class="form-control" name="mem_phone" id="mem_phone" placeholder="Phone No." aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_phone2" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        <input type="tel" class="form-control" name="mem_phone2" id="mem_phone2" placeholder=" Secondary Phone No." aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_bday" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                        <input type="date" class="form-control" name="mem_bday" id="mem_bday" placeholder="Birth date" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="image" id="basic-addon1"><i class="fa fa-camera"></i></span>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Select Photo" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">

                        <textarea rows="4" cols="70" name="mem_address" id="mem_address" class="form-control" placeholder="Permanent Address"></textarea>

                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_pass" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        <input type="password" name="mem_pass" id="mem_pass" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon" for="mem_passc" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        <input type="password" name="mem_passc" id="mem_passc" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" name="register" class="btn">Sign me up!</button>
                </form>
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