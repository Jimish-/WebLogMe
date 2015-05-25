
<?php
session_start();
function createNewPost($newPostContent){
	$pid = 'post_'.time();
	$timeDiv='<div class="postTime">'.date('l jS \of F Y').'</div>';
	$au = '<div class="postAuther">By '.$_SESSION['fname']." ".$_SESSION['lname'].'</div>';
	$stat = $timeDiv.$au; 
	
	$sDiv= '<div class="postArea" id="'.$pid.'"><div class="postContent">';	
	$eDiv= "</div>".$timeDiv.$au.'</div>';

	$newPostContent = "<!--[[-Nextpost-]]-->\n"
		.$sDiv.$newPostContent.$eDiv;
	return($newPostContent);
}
$blogId = $_SESSION['blogId'];
$dcc = str_replace("div", "span",$_POST["d"]);
$newPostContent = createNewPost($dcc);
$filePath = '../@'.$blogId.'/index.php';

$prevData = file_get_contents($filePath);

$newPostContent = str_replace('=" ','="', $newPostContent);
$newPostContent = str_replace("=' ","='", $newPostContent);

$nextData = str_replace("<!--[[-Nextpost-]]-->", $newPostContent, $prevData);
if(file_put_contents($filePath, $nextData)){
	die("posted");
}
else{
	die("error");
}
//die(htmlentities($newPostContent));
 ?>

