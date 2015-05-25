<?php session_start();

if(isset($_SESSION['apr']) )
{ 
  if($_SESSION['apr'] == 1)
  {
      header("location:./server/headerredirect.php?url=profile");
  }

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Set Appearance</title>

        <link rel="stylesheet" type="text/css" href="./libs/css/materialize.min.css" />
      <link rel="favicon" >
       <link href="./__primg/ixon.png" rel="icon" type="image/png" />
          <style type="text/css">
            .imgtagtheme{
              width: 300px!important;
            }
            .themeShowImg{
              width: 200px;
            box-shadow: 3px 3px 2px #CCCCCC ;
            }
            td{
              text-align: center;

            }
            html{background: url(./img/bg_pattern_r1.png);}
          </style>
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <script type="text/javascript" src="./libs/js/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="./libs/js/materialize.min.js"></script>
            <script type="text/javascript">
            var themeNumber = 0,okay=false;

          $(document).ready(function() {
            $("#idblg").change(function(){
   
            });



             $(".rd").change(function(){
              themeNumber = $(this).attr("th");
              });


            $("#setthm").click(function(){
              if($("#nameblg").val() != "" && $("#idblg")!= "")
              {
                  blogid = $("#idblg").val();
                  chacking = $.post( "./server/chkBlgAvail.php",{ n:blogid });
                 
                  chacking.done(function(d) {
                      console.log(d);
                      if(d == "nop")
                        {okay = false;}
                      else if(d == "yup")
                        {okay = true; } 
                   

                        blogName =$("#nameblg").val();
                        blogId = $("#idblg").val();
                             
                              if(okay == false)
                                { alert("Namespace for your Blog is not available ! \n Try another one... ");}
                              else{

                                var posting;
                                posting = $.post( "./server/addblog.php",{ t: themeNumber, n:blogName, i: blogId});

                                posting.done(function(d) {
                                  console.log(d);
                                  window.location ="./server/headerredirect.php?url=profile";
                                });
                               }  
                    });  

              }

            });
              
          });
            </script>
           </head>
    <body>
    <!-- float-->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red">
            <i class="large mdi-action-dashboard"></i>
          </a>
          <ul>
            <li>
              <a class="btn-floating red darken-3 tooltipped" data-position="left" data-delay="1" data-tooltip="Signout" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                 <i class="large mdi-communication-call-made"></i>
              </a>
            </li>
            

          
          </ul>
    </div> 

<!-- Side Bar -->
<header>
<div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
      <img src="./__primg/ixon.png" class="logo" style="margin-top:0px;" width="120px" />
        <a href="#!" class="brand-logo left10">WebLog.me</a>
      </div>
    </nav>
  </div>

  </header> 


  <!-- main content -->
  <main style="">
    
    <div class="container">
       <table class="bordered">

        <tbody >
       <tr><td colspan="4">
    <h4 class="header small" style="text-align:left">Set Appearance</h4></td></tr>
          <tr>
            <td>
              <img class="themeShowImg" for="test1" src="./__primg/themes/theme_1.png"/>
              <br>
              <input class="with-gap rd" name="group1" th="1" type="radio" id="test1"  />
              <label for="test1">Theme 1</label>
            </td>

            <td>
              <img  class="themeShowImg" for="test2" src="./__primg/themes/theme_2.png"/>
              <br>
              <input class="with-gap rd" name="group1" th="2" type="radio" id="test2"  />
              <label for="test2">Theme 2</label>
            </td>

            <td>
              <img  class="themeShowImg" for="test3" src="./__primg/themes/theme_3.png"/>
              <br>
              <input class="with-gap rd" name="group1" th="3" type="radio" id="test3"  />
              <label for="test3">Theme 3</label>
            </td>
            
            <td>
              <img  class="themeShowImg" for="test4" src="./__primg/themes/theme_4.png"/>
              <br>
              <input class="with-gap rd" name="group1" th="4" type="radio" id="test4"  />
              <label for="test4">Theme 4</label>
            </td>
          </tr>
          <tr>
         <td colspan="4" style="text-align:left">
           <div class="row"> 
           <div class="input-field col s6">
              <i class="prefix"></i>
              <input id="nameblg" type="text" class="validate w-500 left-50">
              <label for="nameblg" >Name of your Blog </label>
              </div>
              <div class="input-field col s6">
              <input id="idblg" type="text" class="validate w-500 left-50">
              <label for="idblg" >@NameSpace (unique id) of your Blog </label>
          </div>
          </div>
          <button class="waves-effect waves-light btn left50" id="setthm" >
           <i class="mdi-action-input right"></i>Set
          </button>
          </td>
        </tr>
          
        </tbody>
      </table>

    </div>
  </main>
  
  
          
    </body>
</html>
<?php
  
}
else{
    header("location:./server/headerredirect.php?url=signup");
}

?>