<?php 
session_start();
if(isset($_SESSION['email']))
{
   header("location:../server/headerredirect.php?url=profile");
}
?>


<html>
<head>
	<title>Sign up</title>
	 <link rel="stylesheet" type="text/css" href="../libs/css/materialize.min.css" />
		<link href="../__primg/ixon.png" rel="icon" type="image/png" />
       
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <script type="text/javascript" src="../libs/js/jquery-2.1.1.min.js"></script>
			<script type="text/javascript" src="../libs/js/materialize.min.js"></script>
			<script>
			$(document). ready(function (){
			
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });
			});
			</script>
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
            <a href="#!" class="brand-logo left10">WebLog.me</a>
             <ul id="nav-mobile" class="right hide-on-med-and-down" >
              <li><a href="../signin">Sign In</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header> 

	<div class="container">

      <div style="max-width:700px;">
				<div class="row">
              <h4 class="left10">Register Yourself!</h4>
    <form action="../server/regprocess.php" method="post" class="col s12">
      <div class="row">
        <div class="input-field col s6">
		<i class="mdi-social-person prefix"></i>
          <input id="first_name" name="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
		  
        </div>
        <div class="input-field col s6">
		<i class="mdi-social-person prefix"></i>
          <input id="last_name" name="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
	  <div class="row">
	  	<div class="input-field col s12">
		<i class="mdi-action-today prefix"></i>
		
		<input type="date" id="dt" name="dob" class="datepicker">
		<label for="date">Birthdate</label>
		</div>
	  </div>
	  <div class="row">
        <div class="input-field col s12">
		<i class="mdi-communication-email prefix"></i>
          <input id="email" type="email" name="email"  class="validate">
          <label for="email">Email</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s12">
		<i class="mdi-communication-vpn-key prefix"></i>
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
	  
	 <div class="row">
	 <button class="btn waves-effect waves-light left50" type="submit" name="action">Sign up
    <i class="mdi-av-playlist-add right"></i>
  </button>

	 </div>
      
    </form>
  </div>
			</div>
		</div>

</body>
</html>