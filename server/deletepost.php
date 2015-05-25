<?php

session_start();
function deletePost($dataTodelete, $prevData){
	return(str_replace($dataTodelete, "", $prevData));
}
$blogId = $_SESSION['blogId'];
$filePath = '../@'.$blogId.'/index.php';
$prevData = file_get_contents($filePath);

$nextData = deletePost($_POST["d"],$prevData);

if(file_put_contents($filePath, $nextData)){
	die("deleted");
}
else{
	die("error");
}
//die(htmlentities($newPostContent));

 ?>

