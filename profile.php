<?php 
session_start();
//  die(print_r($_COOKIE));
if($_SERVER['REQUEST_URI']=="/profile.php")
{header("location:./server/headerredirect.php?url=profile"); }
if(isset($_SESSION['apr']) )
{ 
  if($_SESSION['apr'] == 0)
  {
      header("location:./server/headerredirect.php?url=appr");
  }
}
if(isset($_SESSION['email']))
{
    
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email= $_SESSION['email'];
    $blogName = $_SESSION['blogName'] ;
    $blogId = $_SESSION['blogId'];
    $dob = $_SESSION['dob'];
    include("./server/isImage.php");
    include("./server/getThemeNum.php");
    $tn = $inc_themeNumber;

    
 ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $fname."&nbsp;".$lname; ?> Profile</title>

        <link rel="stylesheet" type="text/css" href="./libs/css/materialize.min.css" />
       <link href="./__primg/ixon.png" rel="icon" type="image/png" />
           <link rel="stylesheet" href="./css/webspin.css"/>

          <style type="text/css">
           #prpicfilebrws{
            display: none;
           }

           .imgBoldInv{
            border-bottom: dashed 1px #FFFFFF;
            }
           .imgBoldInv:hover{
            border-bottom: dashed 1px #CCCCCC;
            }
            .imgtagtheme{
              width: 300px!important;
            }html{background: url(./img/bg_pattern_r1.png);}
          </style>
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <script type="text/javascript" src="./libs/js/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="./libs/js/materialize.min.js"></script>
            <script type="text/javascript">
                function checkemail(str){
                    var testresults;
                    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    if (filter.test(str))
                      {return true}
                    else
                      {return false}
                 }
            </script>
            <script type="text/javascript">
          
            $(document).ready(function(){
                $('.button-collapse').sideNav(); 

                $('#opt_lol_<?php echo $tn; ?>').attr("selected","true");
                    var valOthm = $("#lolTheme").val();
                    $("#lolThemeImg").attr("src","./__primg/themes/theme_"+valOthm+".png");

                $('select').material_select();
                $('.select-wrapper').addClass('w-200');
                $('.select-wrapper').addClass('left50');
                $('.collapsible-header').attr('title','click to edit');
                $("#lolTheme").change(function(){
                    var valOthm = $("#lolTheme").val();
                    $("#lolThemeImg").attr("src","./__primg/themes/theme_"+valOthm+".png");
                });

                $("#changeThemeSbmt").click(function(){

                            var themeNumber = $("#lolTheme").val();
                            var posting = $.post( "./server/profileControlers/changetheme.php",{ t: themeNumber});
                            
                            posting.done(function(d) {
                              console.log(d);
                               material_alert("Theme have been changed sucessfully !");
                                location.reload(true);

                          });  
                });

                $("#changeProfPic").click(function(){
                    var pfile = $("#prpicfilebrws");
                    pfile.click();
                });

                $("#prpicfilebrws").change(function(){
                      var file = document.getElementById("prpicfilebrws");
                      var filer = new FileReader();  
                       
                       filer.onload= function(e){ 
                        document.getElementById("front-page-logo").src = e.target.result; 

                      var posting = $.post( "./server/picupdate.php",{ p: e.target.result , actionPU:"c_data" });
                      posting.done(function(d) { console.log(d); });
                      }  
                       filer.readAsDataURL(file.files[0]);

                });

                $(".changeUserProfileData").click(function(){
                  var pagex = $(this).attr("pageXhr");
                  var xhrurl = "./server/profileControlers/"+pagex+".php";
                  var dataArray;
//                  var dataArray = {fname:"",lname:"",email:"",newp:"",oldp:"",bname:""};
                 if(pagex.trim()!="")
                 {
                    if(pagex == "changenames")
                    {
                      dataArray = {
                                     fname: $("#first_name").val() ,
                                     lname: $("#last_name").val() 
                                  };

                      if(dataArray['fname']=="" || dataArray['lname']=="" ||  dataArray['fname'].trim()=="" || dataArray['lname'].trim() == "")
                      {
                        material_alert("Inalid Input Detected.. Please Recheck");
                        return false;
                      }  
                    }
                    
                    else if(pagex == "changeemail")
                    {
                      dataArray = {   email : $("#icon_prefix_Email").val()  };

                      if( (dataArray['email']=="" || dataArray['email'].trim()=="") && checkemail(dataArray['email']) )
                      {
                        material_alert("Inalid Input Detected.. Please Recheck");
                        return false;
                      }
                    }

                    else if(pagex == "changepassword")
                    {
                      dataArray = { 
                                    oldp : $("#icon_prefix_pwd1").val(),                      
                                    newp : $("#icon_prefix_pwd2").val()
                                  }         

                      if(dataArray['oldp']==""  || dataArray['newp']=="" ||  dataArray['oldp'].trim()=="" || dataArray['newp'].trim()==""  )
                      {
                        material_alert("Inalid Input Detected.. Please Recheck");
                        return false;
                      }             
                    }
                    
                    else if(pagex == "changeblogname")
                    {
                      dataArray = { 
                                    bid : "<?php echo $blogId; ?>",
                                    bname : $("#icon_prefix_blogName").val() 
                                  };
                      if(dataArray['bname'].trim()=="")
                      {
                        material_alert("Inalid Input Detected.. Please Recheck");
                        return false;
                      }
                    }

                   var postChange = $.post( xhrurl,{ ar : dataArray });                            
                            postChange.done(function(d) {
                                console.log(d);
                                if(d=="wpOld")
                                { 
                                  material_alert("You have given Wrong password for Authentication !");
                                  $("#icon_prefix_pwd1").focus();
                                  }
                                else if(d == "doneNames" )
                                {
                                   material_alert("Names changed sucessfully !");
                                   location.reload(true);
                                 }
                                 else if(d == "doneBname" )
                                {
                                   material_alert("Blog name changed sucessfully !");
                                   location.reload(true);
                                 }
                                else if(d == "donePass" )
                                {
                                   material_alert("Password changed sucessfully !");
                                   location.reload(true);
                                 }

                                else if(d == "doneEmail")
                                { 
                                  material_alert("Email Changed sucessfully !");
                                  location.reload(true);
                                 }
                                
                                
                            });

                  }});
            
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
              <a class="btn-floating red darken-3 tooltipped" href="./signout/" data-position="left" data-delay="1" data-tooltip="Signout" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                 <i class="large mdi-communication-call-made"></i>
              </a>
            </li>
          
            <li>
              <a class="btn-floating purple tooltipped" href="./newpost.php" data-position="left" data-delay="1" data-tooltip="New Post" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                  <i class="large mdi-editor-mode-edit"></i>
              </a>
            </li>

            <li>
              <a class="btn-floating orange darken-1 tooltipped" href="./update.php" data-position="left" data-delay="1" data-tooltip="Update" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                 <i class="large mdi-image-flash-on"></i>
              </a>
            </li>
            <li>
              <a class="btn-floating green tooltipped" href="./@<?php echo $blogId; ?>" data-position="left" data-delay="1" data-tooltip="Visit your Blog" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                 <i class="large mdi-maps-local-library"></i>
              </a>
            </li>
        
          </ul>
    </div> 

<!-- Side Bar -->
<header>
	 <ul  class="side-nav fixed" id="nav-mobile" style="width:220px;">
       <li class="imgBoldInv">
        <a id="logo-container" href="#" class="brand-logo">
              <div class="image-container wrapper_pic">
                <img id="front-page-logo" class="profilePic_cnt" src="<?php echo $imgsrc; ?>">
              
                <span class="text_onPic">
                    <button id="changeProfPic" class="btn waves-effect waves-light changeProfPic">Change
                      <i class="mdi-editor-mode-edit right"></i>
                    </button>
                    <input type="file" id="prpicfilebrws" accept="image/*" />
                </span>
              </div>
        </a>   
       </li>


       <li class="bold active"><a href="./profile.php" class="waves-effect waves-blue">Profile</a></li>
       <li class="bold"><a href="./@<?php echo $blogId; ?>" target="_blank" class="waves-effect waves-green">Visit Blog</a></li>
       <li class="bold"><a href="./newpost.php" class="waves-effect waves-purple">New Post</a></li>
       <li class="bold"><a href="./update.php" class="waves-effect waves-orange">Update Post</a></li>
       <li class="bold"><a href="./signout/" class="waves-effect waves-red">Sign out</a></li>
    
    </ul>

      <nav class="top-nav">
          <div class="container">
            <div class="nav-wrapper">
            <a class="page-title"></a>
              <a class="page-title"><?php echo $fname."&nbsp;".$lname; ?></a>  
            </div>
          </div>
          <a data-activates="nav-mobile" class="button-collapse hard top-nav full" style="margin-top:25px;"><i class="mdi-navigation-menu"></i></a>
        </nav>
  </header> 


  <!-- main content -->
  <main style="padding-left:90px;">
    
    <div class="container">
    <h4 class="header small">Profile Manager</h4>
       <ul class="collapsible" data-collapsible="accordion">
       <li>
      <div class="collapsible-header"><i class="mdi-action-account-box"></i>Name : <?php echo $fname."&nbsp;".$lname; ?></div>
      <div class="collapsible-body">
         <div class="row">
    
         <div class="input-field col s5 left50">
         <i class="mdi-action-swap-vert prefix"></i>
          <input id="first_name" type="text" value="<?php echo $fname;?>" class="validate">
          <label for="first_name">Change your First Name</label>
        </div>
        <div class="input-field col s5">
          <input id="last_name" type="text" value="<?php echo $lname;?>" class="validate">
          <label for="last_name">Change your Last Name</label>
        </div>
     
        <button class="waves-effect waves-light btn left50 changeUserProfileData" pageXhr="changenames" id="nameChangeSbmtBtn" >
           <i class="mdi-editor-merge-type right"></i>Change it
        </button>
      </div>
    </div>
      </li>
    <li>
      <div class="collapsible-header"><i class="mdi-communication-email"></i>Email : <?php echo $email; ?></div>
      <div class="collapsible-body">
         <div class="input-field col s6">
              <i class=" prefix"></i>
              <input id="icon_prefix_Email" type="email" value="<?php echo $email;?>" class="validate w-500">
              <label for="icon_prefix_Email">Change your Email address</label>
          </div>
          <button class="waves-effect waves-light btn left50 changeUserProfileData" pageXhr="changeemail" id="emailChangeSbmtBtn" >
           <i class="mdi-editor-merge-type right"></i>Change it
        </button>
      </div>
    </li>
        <li>
      <div class="collapsible-header"><i class="mdi-action-event"></i>Birth Date : <?php echo $dob; ?></div>
    </li>
     <li>
      <div class="collapsible-header"><i class="mdi-communication-vpn-key"></i>Change Password.</div>
      <div class="collapsible-body">
         <div class="input-field col s6">
              <i class=" prefix"></i>
              <input id="icon_prefix_pwd1" type="password" class="validate w-500" >
              <label for="icon_prefix_pwd1">Type Old Password</label>
              </div>
              <div class="input-field col s6">
               <i class=" prefix"></i>
               <input id="icon_prefix_pwd2" type="password" class="validate w-500" >
              <label for="icon_prefix_pwd2">Type new Password</label>
          </div>
          <button class="waves-effect waves-light btn left50 changeUserProfileData" pageXhr="changepassword" id="passChangeSbmtBtn" >
           <i class="mdi-editor-merge-type right"></i>Change it
        </button>
      </div>
    </li>

    <li>
      <div class="collapsible-header"><i class="mdi-maps-local-library"></i>Blog : <?php echo $blogName; ?> (@<?php echo $blogId; ?>)</div>
      <div class="collapsible-body">
         <div class="input-field col s6">
              <i class=" prefix"></i>
              <input id="icon_prefix_blogName" type="text" value="<?php echo $blogName;?>" class="validate w-500" >
              <label for="icon_prefix_blogName">Change your Blog Name</label>
          </div>
          <button class="waves-effect waves-light btn left50 changeUserProfileData" pageXhr="changeblogname" id="bNameChangeSbmtBtn" >
           <i class="mdi-editor-merge-type right"></i>Change it
        </button>
      </div>
    </li>

      <li>
      <div class="collapsible-header"><i class="mdi-editor-format-color-fill"></i>Blog Theme : Theme <?php echo $tn; ?></div>
      <div class="collapsible-body">
            <select id="lolTheme" class="w-500">
              <option id="opt_lol_0" value="0">Theme Default</option>
              <option id="opt_lol_1" value="1">Theme 1</option>
              <option id="opt_lol_2" value="2">Theme 2</option>
              <option id="opt_lol_3" value="3">Theme 3</option>
              <option id="opt_lol_4" value="4">Theme 4</option>
            </select>
                <div class="previewImage">           
               <img class="imgtagtheme left50" id="lolThemeImg" src="./__primg/themes/theme_0.PNG" />
          </div>
      <button class="waves-effect waves-light btn left50" id="changeThemeSbmt" >
           <i class="mdi-editor-merge-type right"></i>Change it
        </button>
      </div>
      
    </li>

  </ul>
    </div>

  </main>
   

    <!-- Modal Structure -->
  <div id="loading" class="modal" align="center" style="margin-top:100px;float:left;">
        <div id="loadingContent" class="modal-content">
        <svg class="spinner-container" width="65px" height="65px" viewBox="0 0 52 52">
          <circle class="path" cx="26px" cy="26px" r="20px" fill="none" stroke-width="4px"></circle>
        </svg>
        <h1>Please Wait...</h1>
    </div>
      <div id="loadedContent" style="display:none;"class="modal-content">
        <h4 class="dataToShow"></h4>
      <a href="#!" id="closeM" class="modal-action modal-close waves-effect red lighten-1 btn">Close</a>
      </div>
      
    
    </div>
  
  
          
    </body>
</html>
<?php 
    }
else{
  header("location:./server/headerredirect.php?url=signin");
}


 ?>