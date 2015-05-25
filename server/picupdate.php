<?php
if(isset($_POST['actionPU']))
{
	session_start();

function ue($data){return urlencode($data);}
	$email = $_SESSION['email'];
	$em = ue($email);
		if(file_put_contents("../__userdata/".$email.".picjimx",$_POST['p'])){
		 include("./conn.php");
		 	mysqli_query($con,"Update register set img = 1 where Email = '$em'");
		 mysqli_close($con);
		}

}
else{
	header("location:headerredirect.php?url=profile");
}
?>