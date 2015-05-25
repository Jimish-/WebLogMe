<?php
if(isset($_POST['actionS']))
{
function ue($data){return urlencode($data);}
function ud($data){return urldecode($data);}
	$email = ue($_POST["email"]);
	$password = sha1(md5($_POST["password"]));

	include("./conn.php");

	if ($result = mysqli_query($con, "SELECT * FROM register Where Email = '$email';")) {
			$data = mysqli_fetch_array($result);
						mysqli_close($con);


			if($data['Email'] != $email)
			{
				header("location:./headerredirect.php?url=wu");
			}
			else if($data['Password'] != $password)
			{
				header("location:./headerredirect.php?url=wp");
			}
			else{
			//session_start();
			
				print_r($data);
				session_start();

			 $_SESSION['fname'] = ud($data['FirstName']); 
			 $_SESSION['lname'] = ud($data['LastName']);
			 $_SESSION['email'] = ud($data['Email']); 
			 $_SESSION['dob'] = ud($data['BirthDate']);
			 $_SESSION['blogId'] = ud($data['Blogid']);
			 $_SESSION['img'] = $data['img'];
			 $_SESSION['blogName'] = ud($data['Blogname']);
			 $_SESSION['apr'] = $data['apr'];
			 $_SESSION['chk'] = $data['Password'];
			header("location:headerredirect.php?url=profile");
		}

	} else {
		header("location:headerredirect.php?url=wp");	
	}
	
	
}
else{
	header("location:headerredirect.php?url=signin");
}
?>