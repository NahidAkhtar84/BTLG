<?php
include "../lib/connection.php";
//session_start();
if(isset($_GET['id'])){
    $usrid= $_GET['id'];
}

$queryuname = "SELECT username FROM member WHERE uid = $usrid";
$result1 = mysqli_query($conn,$queryuname);	
while($row = mysqli_fetch_array($result1)){
    $username =$row['username'];}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BTLG</title>
            <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link type="text/css" href="css/theme.css" rel="stylesheet">
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        </head>
        <body>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                            <i class="icon-reorder shaded"></i></a><a class="brand" href="../index.php">BTLG </a>
                            <div class="nav-collapse collapse navbar-inverse-collapse">
                                <ul class="nav nav-icons">
                                    <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                                    <li><a href="#"><i class="icon-eye-open"></i></a></li>
                                    <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                                </ul>
                                <form class="navbar-search pull-left input-append" action="#">
                                    <input type="text" class="span3">
                                    <button class="btn" type="button">
                                        <i class="icon-search"></i>
                                    </button>
                                </form>
                                <ul class="nav pull-right">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Item No. 1</a></li>
                                            <li><a href="#">Don't Click</a></li>
                                            <li class="divider"></li>
                                            <li class="nav-header">Example Header</li>
                                            <li><a href="#">A Separated link</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Support </a></li>
                                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                       <!-- Image starts -->
                                       <?php
                                       $queryphoto = "SELECT mphoto FROM member WHERE uid = $usrid";
                                       $result = mysqli_query($conn,$queryphoto);
                                       while($row = mysqli_fetch_array($result)){ 
                                           echo '<img class="nav-avatar" src="data:image/jpg;base64,'.base64_encode($row['mphoto']).'"/>';
                                       }
                                       ?>
                                       <!-- Image ends -->
                                       <b class="caret"></b></a>
                                       <ul class="dropdown-menu">
                                        <li><a href="../profile.php?username=<?php echo $username?>">Your Profile</a></li>
                                        <li><a href="../update.php?id=<?php echo $usrid?>">Edit Profile</a></li>
                                        <li><a href="#">Account Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.nav-collapse -->
                    </div>
                </div>
                <!-- /navbar-inner -->
            </div>
            <!-- /navbar -->
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <div class="sidebar">
                                <ul class="widget widget-menu unstyled">
                                    <li class="active"><a href="#"><i class="menu-icon icon-dashboard"></i>Dashboard
                                    </a></li>
                                    <li><a href="activity.php?id=<?php echo $usrid?>"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                                    </li>
                                    <li><a href="#"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    11</b> </a></li>
                                    <li><a href="#"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                                    19</b> </a></li>
                                </ul>
                                <!--/.widget-nav-->
                                
                                
                                <ul class="widget widget-menu unstyled">
                                    
                                    <li><a href="table.php?id=<?php echo $usrid?>"><i class="menu-icon icon-table"></i>Tables </a></li>
                                    <li><a href="approve.php?id=<?php echo $usrid?>"><i class="menu-icon icon-check"></i>Approve Members </a></li>

                                </ul>
                                <!--/.widget-nav-->
                                <ul class="widget widget-menu unstyled">
                                    <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                    </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                    </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                        <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>35%</b>
                                        <p class="text-muted">
                                        Growth</p>
                                    </a><a href="#" class="btn-box big span4">

                                        <?php  
                                        $queryuname = "SELECT COUNT(uid) AS total FROM member";
                                        $result1 = mysqli_query($conn,$queryuname); 
                                        while($row = mysqli_fetch_array($result1)){
                                            $userNo =$row['total'];}
                                            ?>

                                            <i class="icon-user"></i><b><?php echo $userNo;  ?></b>
                                            <p class="text-muted">
                                            New Users</p>
                                        </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>15,152</b>
                                            <p class="text-muted">
                                            Deposited Total Money</p>
                                        </a>
                                    </div>
                                    
                                    
                                    <?php 
                                    $selectquery1 = "SELECT * FROM member";
                                    $runquery1 = $conn -> query($selectquery1);
                                    ?>

                                    <div class="module">
                                        <div class="module-head">
                                            <h3>
                                            DataTables</h3>
                                        </div>
                                        <div class="module-body table">
                                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display w-auto" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            User id
                                                        </th>
                                                        <th>
                                                            User Name
                                                        </th>
                                                        <th>
                                                            First Name
                                                        </th>
                                                        <th>
                                                            Last Name
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Phone No
                                                        </th>
                                                        <th>
                                                            Sub Phone No
                                                        </th>
                                                        <th>
                                                            Birth date
                                                        </th>
                                                        <th>
                                                            Address
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if(($runquery1 -> num_rows)>0){ 
                                                        while($resshow = $runquery1 -> fetch_assoc()){ ?>
                                                            <tr class="odd gradeX">
                                                              <td><?php echo $resshow['uid'];?></td>
                                                              <td><?php echo $resshow['username'];?></td>
                                                              <td><?php echo $resshow['firstname'];?></td>
                                                              <td><?php echo $resshow['lastname'];?></td>
                                                              <td><?php echo $resshow['email'];?></td>
                                                              <td><?php echo $resshow['phoneno'];?></td>
                                                              <td><?php echo $resshow['secondaryphoneno'];?></td>
                                                              <td><?php echo $resshow['birthdate'];?></td>
                                                              <td><?php echo $resshow['address'];?></td>

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
                                                    <th>
                                                        User id
                                                    </th>
                                                    <th>
                                                        User Name
                                                    </th>
                                                    <th>
                                                        First Name
                                                    </th>
                                                    <th>
                                                        Last Name
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Phone No
                                                    </th>
                                                    <th>
                                                        Sub Phone No
                                                    </th>
                                                    <th>
                                                        Birth date
                                                    </th>
                                                    <th>
                                                        Address
                                                    </th>
                                                    
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!--/.module-->
                            </div>
                            <!--/.content-->
                        </div>
                        <!--/.span9-->
                    </div>
                </div>
                <!--/.container-->
            </div>
            <!--/.wrapper-->
            <div class="footer">
                <div class="container">
                    <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
                </div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/common.js" type="text/javascript"></script>
            
        </body>
