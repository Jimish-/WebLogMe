<?php 
if(isset($_POST['n']))
{
	$blogId = str_replace("@","",$_POST['n']);
	$blogId = strtolower(str_replace("/", "", $blogId));
	
	if(file_exists("../@".$blogId))
	{
		die("nop");
	}
	else{
		die("yup");
	}
}
 ?>