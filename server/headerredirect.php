<?php

	$sb = (rand(1,600)%6)+1;
	$rtime = strrev(time());
	$htg = (rand(1,1000)*3)."_#_".(rand(1000,2000)*3);
	$token = strrev(md5($htg));

if(isset($_REQUEST['url']))
{
	$_REQUEST['url'] == 'signup' ? $_REQUEST['url'] = '../signup?serverBot_ref='.$sb."&"."&" :
		 ($_REQUEST['url'] == 'signin' ? $_REQUEST['url'] = "../signin?serverBot_ref=".$sb."&" :
		 	 ($_REQUEST['url'] == 'appr' ? $_REQUEST['url'] = "../blogappr.php?serverBot_ref=".$sb."&" :
			 	 ($_REQUEST['url'] == 'profile' ? $_REQUEST['url'] = "../profile.php?serverBot_ref=".$sb."&" : 
			 	 	($_REQUEST['url'] == 'wu' ? $_REQUEST['url'] = "../signin/?access_attempt=failed&failure_type=unknown&serverBot_ref=".$sb."&" : 
			 	 		($_REQUEST['url'] == 'wp' ? $_REQUEST['url'] = "../signin/?access_attempt=failed&failure_type=mistake&serverBot_ref=".$sb."&" : 
			 	 	($_REQUEST['url'] == 'update' ? $_REQUEST['url'] = "../update.php?serverBot_ref=".$sb."&" : $_REQUEST['url'] = $_REQUEST['url']."?serverBot_ref=".$sb."&"  ) ) ) ) ) );  

	header("location:".$_REQUEST['url']."sbc_time=".$rtime."&jimx_token=".$token."&htg_status=available&htg_len=".strlen($htg));
}

?>