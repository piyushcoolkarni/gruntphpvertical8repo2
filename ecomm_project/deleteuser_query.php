<?php
include('Helper.php');
	$user_id=$_REQUEST['delete'];
 
$helper->delete("user","user_id='$user_id'");
	header('Location:user_details.php');
?>