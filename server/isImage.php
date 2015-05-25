<?php 
$imgsrc = "";
$email= $_SESSION['email'];
function ue($data){return urlencode($data);}
 		include("./server/conn.php");
 		$em = ue($email);
			if ($result = mysqli_query($con, "SELECT img FROM register Where Email = '$em'")){

				while($row = mysqli_fetch_array($result)){
					if($row['img'] == "1"){
						$imgsrc=file_get_contents("./__userdata/".$email.".picjimx");
					
					}	
					else{

						$imgsrc="__primg/_defaultProfile.png";
					}
				}
			}
		 mysqli_close($con);
 ?>