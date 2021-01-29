<?php
include "lib/connection.php";
session_start();

$errors = array();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meals</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="scss/skin.css">
    <link rel="stylesheet" href="scss/radiobtn.css">




    <!-- Radio btn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <!-- Radio btn -->
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
                        <li class="active"><a href="#">Meal</a></li>

                        <?php
                        if(isset($_GET['id'])){

                            $usrid= $_GET['id'];

                            $querymember = "SELECT username FROM member WHERE uid = $usrid";
                            $result1 = mysqli_query($conn,$querymember); 
                            while($row = mysqli_fetch_array($result1)){
                                $crntusr =$row['username'];}
                            }
                            ?>                        
                            <li><a href="profile.php?username=<?php echo $crntusr?>">Profile</a></li>
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



        <?php
        $memsts = -1;
        if(isset($_GET['id'])){
            $usrid= $_GET['id'];

            $querymember = "SELECT memberstatus FROM member WHERE uid = $usrid";
            $result1 = mysqli_query($conn,$querymember); 
            while($row = mysqli_fetch_array($result1)){
                $memsts =$row['memberstatus'];}
            }

            if($memsts == 1 OR $memsts == 2){
                ?>



                <section id="features-page">
                    <div class="subsection1">
                        <div class="container">
                            <div class="section-heading text-center">
                                <h1>Today's <span>Meals</span></h1>
                                <p class="subheading">This is Your todays meal Count</p>
                            </div>
                            <div class="col sm_12">
                                <div class="col-sm-4 wpb_column block">
                                    <div class="wpb_wrapper">
                                        <div class="flip">
                                            <div class="iconbox iconbox-style icon-color card clearfix">
                                                <div class="face front">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <i class="fa fa-calendar-check-o boxicon"></i>
                                                                    <?php
                                                                    date_default_timezone_set("Asia/Dhaka");
                                                                    $localdate = date('Y-m-d');
                                                                    echo "<h3><span><b>".$localdate."</b></span></h3>"; 
                                                                    ?>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="iconbox-box2 face back">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h3>Todays Date</h3>
                                                                    <p>The date is automatically set according to your Location.</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 wpb_column block">
                                    <div class="wpb_wrapper">
                                        <div class="flip">
                                            <div class="iconbox  iconbox-style icon-color card clearfix">
                                                <div class="iconbox-box1 face front">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <i class="fa fa-sun-o boxicon"></i>
                                                                    <?php
                                                                    $ldate = (string)$localdate;
                                                                    $querydaymeal = "SELECT daymealcount FROM meal WHERE uid = $usrid AND mdate = '$ldate'";
                                                                    $result1 = mysqli_query($conn,$querydaymeal); 
                                                                    while($row = mysqli_fetch_array($result1)){
                                                                        $day =$row['daymealcount'];
                                                                        if($day != null){
                                                                            echo "<h3>Day Meal: <span><b>".$day."</b></span></h3>";
                                                                        }else{
                                                                            echo "<h3>"."No Day meal"."</h3>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="iconbox-box2 face back">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h3>Day Meal</h3>
                                                                    <p>This is the count of your day meal, If it shows no number then You hav not set Your todays Meal</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 wpb_colum block">
                                    <div class="wpb_wrapper">
                                        <div class="flip">
                                            <div class="iconbox  iconbox-style icon-color card clearfix">
                                                <div class="iconbox-box1 face front">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <i class="fa fa-moon-o boxicon"></i>
                                                                    
                                                                    <?php
                                                                    $ldate = (string)$localdate;
                                                                    $querynightmeal = "SELECT nightmealcount FROM meal WHERE uid = $usrid and mdate= '$ldate'";
                                                                    $result1 = mysqli_query($conn,$querynightmeal); 
                                                                    while($row = mysqli_fetch_array($result1)){
                                                                        $night =$row['nightmealcount'];
                                                                        if($night != null){
                                                                            echo "<h3>Night Meal: <span><b>".$night."</b></span></h3>";
                                                                        }else{
                                                                            echo "No Night Meal";
                                                                        }
                                                                    }
                                                                    ?>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="iconbox-box2 face back">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h3>Night Meal</h3>
                                                                    <p>This is the count of your Night meal, If it shows no number then You hav not set Your tonight's Meal</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Meal Updater Section starts -->

                    <div class="subsection3" style=" overflow-x:hidden;">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 left-section">
                                    <div class="subfeature">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h1><span>Update Your </span>Daily Meal</h1>

                                            <?php
                                            $selectedDay =0;
                                            $selectedMonth =0;
                                            $selectedYear =0;
                                            $localDay =0;
                                            $localMonth =0;
                                            $localYear =0;
//Local Date getting in a variable
                                            date_default_timezone_set("Asia/Dhaka");
                                            $localdate = date('Y-m-d');

                                            if(isset($_POST['updatemeal'])){
                                                $selecteddate = $_POST['mealdate'];
                                                $daymealcount = $_POST['day'];
                                                $nightmealcount = $_POST['night'];
                                                $usrid = $_POST['usrid'];
// Process the Selected date
                                                $arr1 = explode("-",$selecteddate);
                                                $dval = "";
                                                $mval = "";
                                                $yval = "";
                                                foreach ($arr1 as $key => $value) {
                                                    if($key == 2){
                                                        $dval = $value;
                                                    }
                                                    if($key == 1){
                                                        $mval = $value;
                                                    }
                                                    if($key == 0){
                                                        $yval = $value;
                                                    }
                                                }
                                                $selectedDay = (int)$dval;
                                                $selectedMonth = (int)$mval;
                                                $selectedYear = (int)$yval;
//Process the local date
                                                $arr2 = explode("-",$localdate);
                                                $dval2 = "";
                                                $mval2 = "";
                                                $yval2 = "";
                                                foreach ($arr2 as $key => $value) {
                                                    if($key == 2){
                                                        $dval2 = $value;
                                                    }
                                                    if($key == 1){
                                                        $mval2 = $value;
                                                    }
                                                    if($key == 0){
                                                        $yval2 = $value;
                                                    }
                                                }
                                                $localDay = (int)$dval2;
                                                $localMonth = (int)$mval2;
                                                $localYear = (int)$yval2;


                                            }





                                            if(($selectedDay > $localDay AND $selectedMonth == $localMonth AND $selectedYear == $localYear) OR ($selectedMonth > $localMonth AND $selectedYear == $localYear) OR ($selectedYear > $localYear)){

                                                $user_check_query = "SELECT * FROM meal WHERE uid = '$usrid' and mdate = '$selecteddate' LIMIT 1";

                                                $result1 = mysqli_query($conn, $user_check_query);
                                                $check = mysqli_fetch_assoc($result1);

                                                if($check){
                                                    if($check['mdate'] === $selecteddate){array_push($errors, "You have set your meal status for this day. Please pick another valid date!");}
                                                }
                                                if(count($errors) == 0){
                                                    $insertquery = "INSERT INTO meal(mdate,daymealcount,nightmealcount,uid)
                                                    VALUES('$selecteddate',$daymealcount,$nightmealcount,$usrid)";
                                                    mysqli_query($conn,$insertquery);
                                                }

                                            }else{
                                               ?>

                                               <p>Sorry! You can not update the <span>previous day</span> meal or the <span>current day</span> meal. You can only Update the meal of <span>Tomorrow</span> or other <span>Future dates</span> of <span>This</span> Year. </p>
                                               <?php
                                           } 
                                           ?>
                                           <?php 
                                           if(count($errors)>0){
                                            for($i=0;$i<count($errors);$i++){
                                                echo "<p>".$errors[$i]."</p>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 right-section right-background">
                                <!-- Form Starts -->
                                <div class="subfeature" style="margin-left: 30px; margin-right: 20px;">

                                    <div class="form-box">
                                        <div class="form-top">
                                            <div class="form-top-left">
                                                <h3>Meal Updater</h3>
                                                <p>Update Your Meal Here</p>
                                            </div>
                                        </div>
                                        <div class="form-bottom">
                                            <form role="form" enctype="multipart/form-data" method="post" class="login-form">

                                                <div class="input-group form-group">
                                                    <span class="input-group-addon" for="mealdate" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" name="mealdate" id="mealdate" class="form-control" aria-describedby="basic-addon1">
                                                </div>
                                            }
                                            <!-- Checkbo1 Starts -->
                                            <div class="col-md-6 col-sm-6 col-xs-12 right-section right-background">
                                                <h3>Set Day Meal</h3>
                                                <div class="radio radio-info">
                                                  <input type="radio" name="day" id="Radios1" value=0 checked>
                                                  <label>
                                                    
                                                    0
                                                </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="day" id="Radios2" value=1>
                                                <label>
                                                    1
                                                </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="day" id="Radios2" value=2>
                                                <label>
                                                    2
                                                </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="day" id="Radios2" value=3>
                                                <label>
                                                    3
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Checkbo1 Ends -->
                                    <!-- Checkbo2 Starts -->
                                    <div class="col-md-6 col-sm-6 col-xs-12 right-section right-background">
                                        <h3>Set Night Meal</h3>
                                        <div class="radio radio-info">
                                          <input type="radio" name="night" id="Radios1" value=0 checked>
                                          <label>
                                            
                                            0
                                        </label>
                                    </div>
                                    <div class="radio radio-info">
                                        <input type="radio" name="night" id="Radios2" value=1>
                                        <label>
                                            1
                                        </label>
                                    </div>
                                    <div class="radio radio-info">
                                        <input type="radio" name="night" id="Radios2" value=2>
                                        <label>
                                            2
                                        </label>
                                    </div>

                                    <div class="radio radio-info">
                                        <input type="radio" name="night" id="Radios2" value=3>
                                        <label>
                                            3
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <input type="hidden" name="usrid" value="<?php echo $usrid?>">
                            <!-- Checkbo2 Ends -->

                            <div class="col-md-6 col-sm-6 col-xs-12 right-section right-background">
                                <button type="submit" name="updatemeal" class="btn">Update Meal</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>    
            <!-- Form ends -->
        </div>

    </div>

</div>
</div>
</div>

<!--pricing-->
<div class="subsection4">
    <div class="container">
        <div class="col span_12">
            <div class="col-sm-12 wpb_column column_container">
                <div class="wpb_wrapper">
                    <div class="section-heading text-center">
                        <h1>Our <span>Plans</span></h1>
                        <p class="subheading">Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum ea utamur impetus fuisset nam nostrud euismod volumus ne mei.</p>
<!-- Current Month Total meal Count -->
                        <?php
                            $selectquery3 = "SELECT daymealcount, nightmealcount FROM meal WHERE uid = '$usrid' AND MONTH(mdate) = MONTH(CURRENT_DATE()) AND YEAR(mdate) = YEAR(CURRENT_DATE())";
                            $runquery3 = $conn -> query($selectquery3);
                            $daymealsum = 0;
                            $nightmealsum = 0;
                                while($resshow = $runquery3 -> fetch_assoc()){
                                    $daymealsum = $daymealsum + number_format($resshow['daymealcount']);
                                    $nightmealsum = $nightmealsum + number_format($resshow['nightmealcount']);
                                }     
                          ?>
                          <h3>Your this month's Total Meal</h3><h1><span><b><?php echo $daymealsum + $nightmealsum; ?></b></span></h1>
                    </div>

                    <div class="row" style="margin-top:30px;">
                        <?php
                        
                        $selectquery1 = "SELECT * FROM meal WHERE uid = '$usrid' AND MONTH(mdate) = MONTH(CURRENT_DATE()) AND YEAR(mdate) = YEAR(CURRENT_DATE())";
                        $runquery4 = $conn -> query($selectquery1);

                        ?>                                
                        <!-- Table Starts -->
                        <div class="module">
                            <div class="module-head">
                                <h3>Current Month Meals</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Day Meal Count</th>
                                            <th>Night Meal Count</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(($runquery4 -> num_rows)>0){ 
                                            while($resshow = $runquery4 -> fetch_assoc()){ ?>
                                                <tr class="odd gradeX">
                                                  <td><?php echo $resshow['mdate'];?></td>
                                                  <td><?php echo $resshow['daymealcount'];?></td>
                                                  <td><?php echo $resshow['nightmealcount'];?></td>
                                              </tr>
                                          <?php } ?>  
                                      <?php }else{ ?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;"><h4>There is no data in the database!</h4></td>
                                        </tr>
                                    <?php } ?>                              
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Day Meal Count</th>
                                        <th>Night Meal Count</th>                                       </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Table Ends -->
                    </div>
                    <!-- Anothe table starts -->

                    <div class="row" style="margin-top:30px;">
                        <?php
                        
                        $selectquery1 = "SELECT * FROM meal WHERE uid = '$usrid'";
                        $runquery4 = $conn -> query($selectquery1);

                        ?>                                
                        <!-- Table Starts -->
                        <div class="module">
                            <div class="module-head">
                                <h3>Meals Table</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Day Meal Count</th>
                                            <th>Night Meal Count</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(($runquery4 -> num_rows)>0){ 
                                            while($resshow = $runquery4 -> fetch_assoc()){ ?>
                                                <tr class="odd gradeX">
                                                  <td><?php echo $resshow['mdate'];?></td>
                                                  <td><?php echo $resshow['daymealcount'];?></td>
                                                  <td><?php echo $resshow['nightmealcount'];?></td>
                                              </tr>
                                          <?php } ?>  
                                      <?php }else{ ?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;"><h4>There is no data in the database!</h4></td>
                                        </tr>
                                    <?php } ?>                              
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Day Meal Count</th>
                                        <th>Night Meal Count</th>                                       </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- Table Ends -->
                    </div>
                    <!-- Another Table Ends -->
                </div>
            </div>
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

<?php }else{?>
    <div class="subsection4">
        <div class="container">
            <div class="col span_12">
                <div class="col-sm-12 wpb_column column_container">
                    <div class="wpb_wrapper">
                        <div class="section-heading text-center">
                            <h1>Approval <span>Notice</span></h1>
                            <p class="subheading">You have not yet been approved by the admin  to accept this service.Your request is in review. You will be notify after the review has been completed and then you will be able to accept this services.</p>
                        </div>
                    </body>
                </body>
            </body>
        </body>
    </body>

<?php }
?>
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

<!-- Table jquery -->
<script src="admin/scripts/jquery-1.9.1.min.js"></script>
<script src="admin/scripts/jquery-ui-1.10.1.custom.min.js"></script>
<script src="admin/bootstrap/js/bootstrap.min.js"></script>
<script src="admin/scripts/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
</script>

</body>

</html>