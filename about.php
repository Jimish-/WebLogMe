

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


    <div class="row">
      <div id="team" class="section scrollspy">
        <div class="row">
          <h4 class="header">Meet the Team</h4>
          <p class="caption">We are a team of students from Government Polytechnic Ahmedabad.</p>
          <div class="s12 center">
            <div class="image-container">
              <img src="__primg/WeLogMe_team.jpeg" style="width:100%;">
            </div>
          </div>
        </div>
        <br>
        

        <div class="row">
          <div class="col s12 m5 center-on-small-only left50">
            <div class="image-container">
              <img class="crpic" src="../__primg/pics/dhruv.jpg">
              </div>
          </div>
          <div class="col s12 m7">
            <h4>Dhruv Haria</h4>
            <p>Dhruv is a web developer, Working as social media manager as well as information &amp; web security manager, and has an excellent talent in Web-promotions.</p>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m5 center-on-small-only">
            <div class="image-container">
            <img class="crpic" src="../__primg/pics/marut.jpg">
              </div>
          </div>
          <div class="col s12 m7">
            <h4>Marut Thakor</h4>
            <p>Marut is a designer, Front End Developer as well as Media manager, who has excellent capabilities of ideation of design and innovation !</p>
          </div>
        </div>

        <div class="row">
          <div class="col s12 m5 center-on-small-only">
            <div class="image-container">
              <img class="crpic" src="../__primg/pics/jimish.jpg">
            </div>
          </div>
          <div class="col s12 m7">
            <h4>Jimish Fotariya</h4>
            <p>Jimish is a compuer geek, a logic developer, has an excellent knowledge in client side programming and has 2 years of experience as a PHP developer !</p>
          </div>
        </div>


      </div>
    </div>
   </div>
  </main>
  
  
          
    </body>
</html>
