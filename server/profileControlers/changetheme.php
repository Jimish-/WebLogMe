<?php
session_start();
$blogId = $_SESSION['blogId'];
$filePath = '../../@'.$blogId.'/index.php';
$prevData = file_get_contents($filePath);

$themeNum = ($_POST["t"]);

$prevData= str_replace('<link rel="stylesheet" type="text/css" href="../styles/style_0.css"/>', '<!- nextTheme -->', $prevData);
$prevData= str_replace('<link rel="stylesheet" type="text/css" href="../styles/style_1.css"/>', '<!- nextTheme -->', $prevData);
$prevData=str_replace('<link rel="stylesheet" type="text/css" href="../styles/style_2.css"/>', '<!- nextTheme -->', $prevData);
$prevData=str_replace('<link rel="stylesheet" type="text/css" href="../styles/style_3.css"/>', '<!- nextTheme -->', $prevData);
$prevData=str_replace('<link rel="stylesheet" type="text/css" href="../styles/style_4.css"/>', '<!- nextTheme -->', $prevData);

$nextData = str_replace('<!- nextTheme -->','<link rel="stylesheet" type="text/css" href="../styles/style_'.$themeNum.'.css"/>' , $prevData);

if(file_put_contents($filePath, $nextData)){
		die("theme updated");
} 
else{
	die("error");
}
//die(htmlentities($newPostContent));

 ?>