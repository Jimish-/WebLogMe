<?php 
session_start();

if(isset($_POST['ar']) && isset($_SESSION))
{
	$dAr = $_POST['ar'];
	$emd = $_SESSION['email'];

	$em = urlencode($emd);
	$email = urlencode($dAr['email']);

	include("../conn.php");
	if (mysqli_query($con, "UPDATE register SET Email = '$email' WHERE Email = '$em'")) {
		mysqli_close($con);
		//image stuff
		if(file_exists("../../__userdata/".$emd.".picjimx"))
		{
			rename("../../__userdata/".$emd.".picjimx", "../../__userdata/".$dAr['email'].".picjimx");
		}

		$_SESSION['email'] =urldecode($email);
		die("doneEmail");
	}
}

 ?>