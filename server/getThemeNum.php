<?php 
include("./server/simple_html_dom.php");
$inc_html = file_get_html("./@".$_SESSION['blogId']."/index.php");
foreach($inc_html->find('link') as $l)
{
	$inc_themeNumber = substr(($l->href) , 16 , 1);
	break;
}
 ?>