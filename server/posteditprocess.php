<?php /*
<!--[[-Nextpost-]]-->
<div class="postArea">
		<div class="postContent">
			Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>Hey Buddy !!<br>
		</div>

	<div class="postTime"><!--[[-Date-]]--></div>
	<div class="postAuther">By <!--[[-au-]]--></div>

</div>
*/ ?>

<?php
session_start();
function createNewPost($newPostContent,$idEd){

	$pid = $idEd;
	$timeDiv='<div class="postTime">'.date('l jS \of F Y').'</div>';
	$au = '<div class="postAuther">By '.'Jimish Fotariya'.'</div>';
	$stat = $timeDiv.$au; 
	$sDiv= '<div class="postArea" id="'.$pid.'"><div class="postContent">';	
	$eDiv= "</div>";
	//"</div>".$stat.'</div>';

	$newPostContent = $sDiv.$newPostContent.$eDiv;
	return($newPostContent);
}

$blogId = $_SESSION['blogId'];
$newPostContent = createNewPost($_POST["d"],urldecode($_POST['idEd']));
$filePath = '../@'.$blogId.'/index.php';

$prevData = file_get_contents($filePath);
$newPostContent = str_replace('=" ','="', $newPostContent);
$newPostContent = str_replace("=' ","='", $newPostContent);

$nextData = str_replace(urldecode($_POST['r']), $newPostContent, $prevData);
if(file_put_contents($filePath, $nextData)){
	die("edited");
}
else{
	die("error");
}
//die(htmlentities($newPostContent));

 ?>

