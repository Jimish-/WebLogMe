<?php
if(isset($_POST['action']))
{
	function ue($data){return urlencode($data);}
	function ud($data){return urldecode($data);}

	$first_name = ue($_POST["first_name"]);
	$last_name = ue($_POST["last_name"]);
	$date = ue($_POST["dob"]);
	$email = ue($_POST["email"]);
	$password = sha1(md5($_POST["password"]));
	

	include("./conn.php");
	if (mysqli_query($con, "INSERT INTO register(FirstName,LastName,BirthDate,Email,Password)VALUES('$first_name','$last_name','$date','$email','$password')")) {
			mysqli_close($con);
			session_start();
			
			 $_SESSION['fname'] = ud($first_name);
			 $_SESSION['lname'] = ud($last_name);
			 $_SESSION['email'] = ud($email); 
			 $_SESSION['dob'] = ud($date);
			 $_SESSION['apr'] = 0;
			 $_SESSION['chk'] = $password;
			header("location:headerredirect.php?url=appr");


	} else {
		header("location:headerredirect.php?url=signup");	
	}
	
	

	
}
else{
	header("location:headerredirect.php?url=signup");
}
?>