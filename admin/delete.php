<?php
include "../lib/connection.php";
if(isset($_GET['id']) && $_GET['usid']){
	$delete_id = $_GET['id'];
    $adminid = $_GET['usid'];
	$deletequery = "DELETE FROM member WHERE uid =$delete_id";
	if($conn ->query($deletequery)){
		header('location: approve.php?id='.$adminid);
	}else{
		die($conn -> error);
	}
}
else{
	header('location: approve.php?id='.$adminid);
}

?>