<?php 

session_start();

function ue($data){return urlencode($data);}
function ud($data){return urldecode($data);}

$theameNumber = $_POST['t'];
$blogName = $_POST['n'];
$blogId = str_replace("@","",$_POST['i']);
$blogId = strtolower(str_replace("/", "", $blogId));
$emailid = $_SESSION['email'];
$em = ue($emailid);
$bn = ue($blogName);
$bid = ue($blogId);

if(file_exists('../@'.$blogId))
{
	die("idNotAvail");
}
else{
	include("./conn.php");
	if (mysqli_query($con, "UPDATE register SET Blogid = '$bid',Blogname = '$bn',apr = 1 WHERE Email = '$em'")) {
			
			
			if(mkdir("../@".$blogId , 0700))
			{
				$basePhp = '<!DOCTYPE html><html><head><title><!--t--></title><script type="text/javascript" src="../js/jimx_quickSearch.js"></script><!--s--><link rel="stylesheet" type="text/css" href="../css/editor.css"/><link href="../__primg/ixon.png" rel="icon" type="image/png" /></head><body><div class="body_wrap" align="center"><div align="center" class="content_wrap"><header><!--h--></header></div><div id="searchArea"></div><!--[[-Nextpost-]]--></div></body></html>';
				$styledPhp = str_replace('<!--s-->', '<link rel="stylesheet" type="text/css" href="../styles/style_'.$theameNumber.'.css"/>', $basePhp);
				$titledPhp = str_replace('<!--t-->', $blogName, $styledPhp);				
				$headeredPhp = str_replace('<!--h-->',$blogName, $titledPhp);
				if(file_put_contents('../@'.$blogId.'/index.php', $headeredPhp)){
					
					$_SESSION['apr'] = 1;
					$_SESSION['themeNumber'] = $theameNumber;
					$_SESSION['blogName'] = $blogName;
					$_SESSION['blogId'] = $blogId;

					die("done");
				}				
			}	
	}
	else{
		mysqli_close($con);
		die("query not worked");
	}
}

?>
