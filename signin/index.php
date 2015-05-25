<?php 
session_start();
if(isset($_SESSION['email']))
{
   header("location:../server/headerredirect.php?url=profile");
}
$invalid = 0;
if(isset($_GET['access_attempt']) && isset($_GET['failure_type']))
{
  if($_GET['access_attempt'] == "failed" && $_GET['failure_type'] == "unknown")
  { 
    $invalid = 1;
    echo '<script>alert("Email is not valid !")</script>';
  }
  else if($_GET['access_attempt'] == "failed" && $_GET['failure_type'] == "mistake")
  { 
    $invalid = -1;
    echo '<script>alert("Password is not valid !");</script>';
  }
  else{
    $invalid = 0;
  }

}
?>


<html>
<head>
	<title>Sign in</title>
	 <link rel="stylesheet" type="text/css" href="../libs/css/materialize.min.css" />
		
    <link href="../__primg/ixon.png" rel="icon" type="image/png" />
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <script type="text/javascript" src="../libs/js/jquery-2.1.1.min.js"></script>
			<script type="text/javascript" src="../libs/js/materialize.min.js"></script>
			<style type="text/css">
      html{ background: url(../img/bg_pattern_r1.png);}
      </style>
</head>
<body>
    <header>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
          <img src="../__primg/ixon.png" class="logo" style="margin-top:0px;" width="120px" />
            <a href="http://weblogme/" class="brand-logo left10">WebLog.me</a>
          </div>
        </nav>
      </div>
    </header> 
	

  <div class="container">
  	<div>
		  <div class="row w-2000" style="float:left" >
        <h4 class="left50">Sign in</h4>
            <form method="post" class="col s6" action="../server/signinprocess.php">     
            	       <div class="input-field col s12">
                    		<i class="mdi-communication-email prefix"></i>
                           <input id="email" name="email" type="email" class="validate w-500"  >
                           <label for="email">Email</label>
                      </div>
               <?php 
               if($invalid == 1)
                {echo "*Unauthorized Email ID.";} ?>
                    <div class="input-field col s12">
                  		  <i class="mdi-communication-vpn-key prefix"></i>
                           <input id="password" name="password" type="password" class="validate w-500">          
                           <label for="password">Password</label>
                   </div>
                        	  
            	 <div class="row">
              	 <button class="btn waves-effect waves-light left50" type="submit" name="actionS">Sign in
                      <i class="mdi-content-send right"></i>
                 </button>   
            	 </div>
            </form>
           

                  <div class="col s12 m6 w-400" style="position:relative;top">
                      <div class="card teal lighten-2">
                        <div class="card-content white-text">
                          <span class="card-title">Not a user?</span>
                          <p>If you are not connected wth WebLog.me, <br>than join us now..<br>
                          click Below to Register yourself !<br> It is totally "free".</p>
                        </div>
                        <div class="card-action">
                          <a href="../signup/" class="waves-effect green btn-flat" style="color:white">
                          Register Now !!
                          </a>
                        </div>
                      </div>
                  </div>

        </div>
		 </div>
	</div>


</body>

</html>