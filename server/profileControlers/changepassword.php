<?php 
session_start();

if(isset($_POST['ar']) && isset($_SESSION))
{
	$dAr = $_POST['ar'];
	$em = urlencode($_SESSION['email']);

	$oldhash = sha1(md5($dAr['oldp']));
	$passNew = sha1(md5($dAr['newp']));
//	die($_SESSION['chk'] ."--".$oldhash);

	if($_SESSION['chk'] == $oldhash)
	{	
			include("../conn.php");

			if (mysqli_query($con, "UPDATE register SET Password = '$passNew' WHERE Email = '$em'")) {
				mysqli_close($con);

				$_SESSION['chk'] = $passNew;
				die("donePass");
			}
	}
	else{
		die("wpOld");
	}
}

 ?>