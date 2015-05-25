<?php 
session_start();

if(isset($_POST['ar']) && isset($_SESSION))
{
	$dAr = $_POST['ar'];
	$em = urlencode($_SESSION['email']);
	
	$bname = urlencode($dAr['bname']);
	$bid = urlencode($dAr['bid']);

	$bpath = "../../@".$bid;

		if(file_exists($bpath))
		{
			include("../simple_html_dom.php");			
			$html = file_get_html($bpath."/index.php");

				foreach ($html->find("header") as $header) {
					$header->outertext = "<header>".urldecode($bname)."</header>" ;
					break;
				}
				foreach ($html->find("title") as $title) {
					$title->outertext = "<title>".urldecode($bname)."</title>" ;
					break;
				}
				file_put_contents($bpath."/index.php", $html);

			include("../conn.php");
			if (mysqli_query($con, "UPDATE register SET Blogname = '$bname' WHERE Email = '$em'"))
			{
				mysqli_close($con);

				$_SESSION['blogName'] =urldecode($bname);

				die("doneBname");
			}
		}
		else{
			die("badBname");
		}
}

 ?>