<?php 
function load404()
{
	$data404 = file_get_contents("__serverdata/badreq.htmjimx");
	die($data404);
}

$repl= array("%20","/","@");

	$newone = strtolower(
							str_replace($repl,"",$_SERVER['REQUEST_URI'])
				        );

if(substr($newone,0,6) == "signup" || substr($newone,0,6) == "signin")
{
			header("location:/".substr($newone,0,6)."/");	
}
	if(file_exists("./@".$newone)){
		header("location:/@".$newone."/");
	}	
	else{
		load404();
	}

?>
