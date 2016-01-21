<?php 
/*

** HomePage WebLogMe

If Sessin_start 
	{Redirect profile.php}
Else
	{
		* Create your Blog !
			* SignUp
				[
					-FirstName -LastName
					-Uniq Blog namespace "@nameSpace"
						<Ajax src="avaibleNamespace.php">Check avaiblity</Ajax>
					-Email Id
						<Ajax src="duplicateEmail.php">Check Duplication of Email</Ajax>
					-Password
						<client>Check Strength</client>
					-BirthDate

					-submit
						<CLIENT>
							Chaeck up validation .. 
							Ajx req. to reg.php
						</CLIENT>
						<SERVER src="reg.php">
							check up validation of SESSION,ProperRequest,
							TRUE
								{
									Mysql Register
								}
							FLASE
								{
									REdirect ?error=1001
								}


						</SERVER>
				]

		*ExistingBlog
			* SignIn
				-email
				-pwd
					<client>
						Cjeck for Null=ValidateEmail
						<SERVER src="signInProcess.php.php"></SERVER>
					</client>
		
	}

*/	

	 ?>




<?php 
session_start();
$showProfile=0;
if(isset($_SESSION['email']))
{
  if(strlen($_SESSION['email']) > 4 )
  {
    $showProfile = 1;
  }
}

//header("location:profile.php");
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>About us..</title>

    <link rel="stylesheet" type="text/css" href="./libs/css/materialize.min.css" />
      <link rel="favicon" >
       <link href="./__primg/ixon.png" rel="icon" type="image/png" />
          <style type="text/css">
            html{background: url(./img/bg_pattern_r1.png);}
            .crpic{width: 180px;border-radius:90px; }
            .trans{
              background: transparent;
            }
          </style>
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <script type="text/javascript" src="./libs/js/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="./libs/js/materialize.min.js"></script>
            <script type="text/javascript">
          
            </script>
           </head>
    <body>
    <!-- float-->
   <?php 
    if($showProfile == 1)
    {
   ?>
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red">
            <i class="large mdi-action-dashboard"></i>
          </a>
          <ul>

            <li>
              <a class="btn-floating red darken-3 tooltipped" href="./signout" data-position="left" data-delay="1" data-tooltip="Signout" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                 <i class="large mdi-communication-call-made"></i>
              </a>
            </li>
          </ul>
    </div>
  <?php 
    }
  ?> 

<!-- Side Bar -->
<header>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
      <img src="./__primg/ixon.png" class="logo" style="margin-top:0px;" width="120px" />
        <a href="#!" class="brand-logo left10">WebLog.me</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down" >
      <?php 
        if($showProfile != 1)
        {
      ?>
          <li><a href="./signup" >Sign Up</a></li>
         <li><a href="./signin">Sign In</a></li>
      <?php
        }else{
      
        echo '<li><a href="./profile.php" >';
          echo $_SESSION['fname']." ".$_SESSION["lname"];
        echo '</a></li>';
       }
      ?>
      </ul>
      </div>
    </nav>
  </div>
</header> 

<!-- main content -->
  <main>
   <div class="container">
        <div class="col s12 m6 w-1000 " style="position:relative;">
            <div class="card teal  lighten-3">
              <div class="card-content">
                <span class="card-title pink-text" style="font-size:26px" ><b>Faster and Better !</b></span>
                <p  style="font-size:18px">
                <i class="mdi-image-hdr-strong"></i>
                WebLog.me is an openSource Web Logging System that allows you to put your own blog online for no costs.
                We provides Easy access to your blog and chance to bring Inspiration to people by sharing your Thoughts.
                You can share Pictures from the Internet, your knowledge, Quotes, Useful Informations, PJ's and lots more...
                <br>
                <i class="mdi-image-hdr-strong"></i>
                We have WiSiHTML 5 editor that allows you access to a Simple Word Porcessor(With hyperText Editor also) by which you can create a post with differnt font size and different colors and Link Media contents like Images and add hyperlinks.
                However We have not implemented the Audio-video featue yet, but you can add those with the HyperText Editor of your post Dashboard.
                <br>
                <i class="mdi-image-hdr-strong"></i>
                Aim of WebLog me is to provide more speed as possible to the BlogReader.So there is no database used for Post Management.
                Which provides almost no-Execution on server side, so the response of the Blog page will be too fast.
                To achive this aim, We have removed the Database system from Post management as well as developed a completely new algorithm.  
                The Beautiness of this algorithm is, it is faster than we've expected and it opened a new door for us without we could not achive the no-Database facility.


              </div>
              <div class="card-action">
                 <a href="./signin/" class="waves-effect waves-light  blue darken-2 btn" style="color:white">
                  Sign In!!
                </a>
  
                <a href="./signup/" class="waves-effect waves-light  green btn darken-1" style="color:white">
                  Register Now !!
                </a>


              </div>
          </main>
    </body>
</html>
