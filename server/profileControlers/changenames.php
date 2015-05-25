<?php 
session_start();

if(isset($_POST['ar']) && isset($_SESSION))
{
	$dAr = $_POST['ar'];

	$em = urlencode($_SESSION['email']);
	$fname = urlencode($dAr['fname']);
	$lname = urlencode($dAr['lname']);

	include("../conn.php");
	if (mysqli_query($con, "UPDATE register SET FirstName = '$fname',LastName = '$lname' WHERE Email = '$em'")) {
		mysqli_close($con);
		$_SESSION['fname'] =urldecode($fname);
		$_SESSION['lname'] =urldecode($lname);
		die("doneNames");
	}
}

 ?>