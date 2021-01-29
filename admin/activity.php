<?php
include "../lib/connection.php";
session_start();
$errors = array();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<!-- ***For not workig of submit button in each Refreashment of page -->
<script>history.pushState({}, "", "")</script>

<?php 
if(isset($_GET['id'])){
$usrid= $_GET['id'];


if(isset($_POST['updatenews'])){
$usrid = $_POST['usrid'];
$news = mysqli_real_escape_string($conn, isset($_POST['news']) ? $_POST['news'] : '');

date_default_timezone_set("Asia/Dhaka");
$localdate = date('Y-m-d');

if(empty($news)) {array_push($errors, "News Field is empty  !");}

if(count($errors) == 0){
    $insertquery = "INSERT INTO currentnews (uid,news,cdate)
        VALUES('$usrid','$news','$localdate')";
        mysqli_query($conn,$insertquery);
    }else{
    	die($conn -> error);

    }

}

 ?>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="admin.php?id=<?php echo $usrid?>">
			  		BTLG admin
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Drops <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="nav-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>
						
						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">

								<!-- Image Starts -->
								<?php
                            	$queryphoto = "SELECT mphoto FROM member WHERE uid = $usrid";
            					$result = mysqli_query($conn,$queryphoto);
            					while($row = mysqli_fetch_array($result)){ 
               					 echo '<img class="nav-avatar" src="data:image/jpg;base64,'.base64_encode($row['mphoto']).'"/>';
            					}
                            	  ?>
                            	  <!-- Image Ends -->

								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="admin.php?id=<?php echo $usrid?>">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon icon-bullhorn"></i>
									News Feed
								</a>
							</li>
							<li>
								<a href="#">
									<i class="menu-icon icon-inbox"></i>
									Inbox
									<b class="label green pull-right">11</b>
								</a>
							</li>
							
							<li>
								<a href="#">
									<i class="menu-icon icon-tasks"></i>
									Tasks
									<b class="label orange pull-right">19</b>
								</a>
							</li>
						</ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
                                <li><a href="table.php?id=<?php echo $usrid?>"><i class="menu-icon icon-table"></i>Tables </a></li>
                                
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									More Pages
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="other-login.html">
											<i class="icon-inbox"></i>
											Login
										</a>
									</li>
									<li>
										<a href="other-user-profile.html">
											<i class="icon-inbox"></i>
											Profile
										</a>
									</li>
									<li>
										<a href="other-user-listing.html">
											<i class="icon-inbox"></i>
											All Users
										</a>
									</li>
									<li>
										<a href="other-faq.html">
											<i class="icon-inbox"></i>
											Frequently Asked Questions
										</a>
									</li>
									<li>
										<a href="other-404.html">
											<i class="icon-inbox"></i>
											Error Page (404)
										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="#">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

						

					
					</div><!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>News Feed</h3>
							</div>
							<div class="module-body">
								<div class="stream-composer media">
									<a href="#" class="media-avatar medium pull-left">
										<!-- Image Starts -->
								<?php
                            	$queryphoto = "SELECT mphoto FROM member WHERE uid = $usrid";
            					$result = mysqli_query($conn,$queryphoto);
            					while($row = mysqli_fetch_array($result)){ 
               					 echo '<img class="nav-avatar" src="data:image/jpg;base64,'.base64_encode($row['mphoto']).'"/>';
            					}
                            	  ?>
                            	  <!-- Image Ends -->
									</a>
<!-- Form Starts -->
									<div class="media-body">
									<div class="row-fluid">
									
								<form role="form" method="post" class="login-form">

									<input type="hidden" name="usrid" value="<?php echo $usrid?>">

									
									<textarea name="news" class="span12" style="height: 70px; resize: none;"></textarea>


									
									<button type="submit" name="updatenews">Update Status</button>
										
								</form >

								</div>
										<!-- Form Ends -->

									</div>
								</div>

<?php
$selectquery = "SELECT * FROM currentnews";
$runquery = $conn -> query($selectquery); 
?>


								<div class="stream-list">
									<div class="media stream new-update">
										<a href="#">
											<i class="icon-refresh shaded"></i>
										
				<?php
					echo $runquery -> num_rows." Updates<br>"; 
				?>
										</a>

				<?php 

						if(($runquery -> num_rows)>0){ 
							
							while($resshow = $runquery -> fetch_assoc()){
				 ?>
									</div>
									<div class="media stream">
										<a href="#" class="media-avatar medium pull-left">
				<?php  					
						$sid = $resshow['uid'];
						$queryphoto = "SELECT mphoto FROM member WHERE uid = $sid";
            			$result = mysqli_query($conn,$queryphoto);
            			while($row = mysqli_fetch_array($result)){ 
               				echo '<img class="nav-avatar" src="data:image/jpg;base64,'.base64_encode($row['mphoto']).'"/>';}
               	?>

										</a>
										<div class="media-body">
											<div class="stream-headline">
												<h5 class="stream-author">
								<!-- Name of the poster -->
									<?php
                                    $queryname = "SELECT username FROM member WHERE uid = '$sid'";
                                    $result1 = mysqli_query($conn,$queryname);  
                                    while($row = mysqli_fetch_array($result1)){
                                       echo "<a>".$row['username']."</a>";}?>
                                       <!-- Name of the poster -->
                                 <!-- Date starts       -->
								<small><?php echo $resshow['cdate'];?></small>
								<!-- Date Ends -->
												</h5>
												<div class="stream-text">
								<!-- News Starts -->
							    <?php echo $resshow['news'];?> 
							    <!-- News Ends -->
												</div>
												</div>
											</div><!--/.stream-headline-->

											<div class="stream-options">
												<a href="#" class="btn btn-small">
													<i class="icon-thumbs-up shaded"></i>
													Like
												</a>
												<a href="#" class="btn btn-small">
													<i class="icon-reply shaded"></i>
													Reply
												</a>
												<a href="#" class="btn btn-small">
													<i class="icon-retweet shaded"></i>
													Repost
												</a>
											</div>
										</div>
									</div>

									<!--/.media .stream-->				
				<?php
						}
					}
				  ?>

									<div class="media stream load-more">
										<a href="#">
											<i class="icon-refresh shaded"></i>
											show more...
										</a>
									</div>
								</div><!--/.stream-list-->
							</div><!--/.module-body-->
						</div><!--/.module-->
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
<?php }else{
	header('location: admin.php');
} ?>