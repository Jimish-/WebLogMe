<?php 
session_start();
if($_SERVER['REQUEST_URI']=="/update.php")
{header("location:./server/headerredirect.php?url=".$_SERVER['REQUEST_URI'] ); }

if(isset($_SESSION['apr']) )
{ 
  if($_SESSION['apr'] == 0)
  {
      header("location:./server/headerredirect.php?url=appr");
  }
}
if(isset($_SESSION['email']))
{
  if(strlen($_SESSION['email']) > 4 )
  {
        include("./server/isImage.php");
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Blog</title>

       <link href="./__primg/ixon.png" rel="icon" type="image/png" />
        <link rel="stylesheet" type="text/css" href="./libs/css/materialize.min.css" />   
       <link rel="stylesheet" type="text/css" href="./css/editorEdit.css" />
        <link rel="stylesheet" type="text/css" href="./styles/style_default.css" />
            <link rel="stylesheet" href="./css/webspin.css"/>
    
          <style type="text/css">
            .previewImage{

            }
            .imgtagtheme{
              width: 300px!important;
            }
            ul{
            list-style-type: none!important;
          }
          .form_hide{
           display: none;
          }
          .postArea{
            margin-left: 10px;
          }
          </style>
           <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <script type="text/javascript" src="./libs/js/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="./libs/js/materialize.min.js"></script>
  <script type="text/javascript">

  </script>          
    
            <script type="text/javascript">
          
            $(document).ready(function(){

                $('.button-collapse').sideNav(); 
                $('select').material_select();
                $('.select-wrapper').addClass('w-200');
                $('.select-wrapper').addClass('left50');
                $('.collapsible-header').attr('title','click to edit');
              
                     $("#closeM").click(function(){
                           $('#loading').closeModal();
                              $("#loadingContent").css({display:"none"});
                              $("#loadedContent").css({display:"none"});
                      });      

                $('.deletePostListen').click(function(){
                        
                        idToDelete = $(this).parent().attr("id");
                        dataParent = $('#'+idToDelete).children().toArray();
                        
                        dataToDelete =  '<div class="postArea" id="'+idToDelete+'">'
                                        +'<div class="postContent">'+dataParent[0].innerHTML+'</div>'
                                        +'<div class="postTime">'+dataParent[1].innerHTML+'</div>'
                                        +'<div class="postAuther">'+dataParent[2].innerHTML+'</div>'
                                        +'</div>';
                      
                        var r = confirm("Are you sure to delete this Post ?");

                    if(r == true )
                      {

                          if($(".deletePostListen").hasClass("disabled")){return true;}
                          $(".deletePostListen").addClass("disabled");
                       
                            $("#"+idToDelete).remove();
                           $('#loading').openModal();
                           $("#loadingContent").css({display:"block"});

                            var dataHtml = dataToDelete ;
                            var posting = $.post( "./server/deletepost.php",{ d: dataHtml});
                            posting.done(function(d) {
                              console.log(d);
                              setTimeout(function(){
                                $("#loadingContent").css({display:"none"});
                                $("#loadedContentDelete").css({display:"block"});
                                $(".deletePostListen").removeClass("disabled");
                              },500);
                          });  
                      }

                   // console.log(dataToDelete);
                });




                $('.editPostListen').click(function(){
                
/*

                         if($(".editPostListen").hasClass("disabled")){return true;}
                          $(".editPostListen").addClass("disabled");
                          
                            var dataHtml = dataToEdit ;
                            var posting = $.post( "./server/editpost.php",{ d: dataHtml});
                            posting.done(function(d) {
                              console.log(d);
                            
                          });  
                  */
                          
                        idToEdit = $(this).parent().attr("id");
                        dataParent = $('#'+idToEdit).children().toArray();
                        
                        postcnt = dataParent[0].innerHTML;
                        dataToEdit =  '<div class="postArea" id="'+idToEdit+'">'
                                        + '<div class="postContent">'+postcnt+'</div>';
                             

                            $("#textContentToEdit").val(postcnt);
                            $("#repl").val(dataToEdit);
                            $("#idEd").val(idToEdit);
                            $("#sbmt_frm").click();               


                  });

            });
                   /* function deleteConformed(){
                          material_alert(dataToDelete.attr("id"));
                              $('#loading').closeModal();
                              $("#loadedContent").css({display:"none"});
                     }; */ 
            </script>
           </head>
    <body>
    <!-- float-->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red">
            <i class="large mdi-action-dashboard"></i>
          </a>
          <ul style="bottom:40px">
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
              <a class="btn-floating green tooltipped" href="./@<?php echo $blogId; ?>" data-position="left" data-delay="1" data-tooltip="Visit your Blog" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                 <i class="large mdi-maps-local-library"></i>
              </a>
            </li>
        
            <li>
              <a class="btn-floating blue tooltipped" href="./profile.php" data-position="left" data-delay="1" data-tooltip="Account" style="transform: scaleY(0.4) scaleX(0.4) translateY(40px); opacity: 0;">
                  <i class="large mdi-action-account-circle"></i>
              </a>
            </li>
          </ul>
    </div> 

<!-- Side Bar -->
<header>
	 <ul  class="side-nav fixed" id="nav-mobile" >
       <li>
        <a id="logo-container" href="#" class="brand-logo">
              <div class="image-container wrapper_pic">
                 <img id="front-page-logo" class="profilePic_cnt" src="<?php echo $imgsrc; ?>">
              </div>
              
        </a>   
       </li>

       <li class="bold"><a href="./profile.php" class="waves-effect waves-blue">Profile</a></li>
       <li class="bold"><a href="./@<?php echo $_SESSION['blogId']; ?>/" target="_blank" class="waves-effect waves-green">Visit Blog</a></li>
       <li class="bold"><a href="./newpost.php" class="waves-effect waves-purple">New Post</a></li>
       <li class="bold active"><a href="./update.php" class="waves-effect waves-orange">Update Post</a></li>
       <li class="bold"><a href="./signout/" class="waves-effect waves-red">Sign out</a></li>


    
    </ul>

  </header> 

<form class="form_hide" action="./editpost.php" method="post">
<input type="hidden" id="repl" value="" name="repl" />
<input type="hidden" id="idEd" value="" name="idEd" />
<input type="hidden" id="textContentToEdit" value="" name="txt" />
<input type="submit" id="sbmt_frm" class="form_hide" />
</form>
  <!-- main content -->
  <main style="padding-left:90px;">
    
    <div class="container">
    <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full "><i class="mdi-navigation-menu " style="color:teal;"></i></a>
    <h5 class="header small">Update your Blog.</h5>

<?php 

    include('./server/simple_html_dom.php');
    $blogId = $_SESSION['blogId'];
    $filePath = './@'.$blogId.'/index.php';
    $newButtons = '<div class="postAuther">By '.$_SESSION['fname'].' '.$_SESSION['lname'].'</div>'.'<button class="btn waves-effect waves-light orange darken-3 editPostListen"  >Edit post<i class="mdi-editor-mode-edit right"></i></button><button class="btn waves-effect waves-light deletePostListen deep-orange accent-4 left50 modal-trigger" href="#modal1" >Delete<i class="mdi-action-delete right"></i></button>';

    $blogPostContent = file_get_html($filePath);
      foreach($blogPostContent->find('div') as $div)
      {
        if($div->class == 'postArea')
        {
          echo $div = str_replace('<div class="postAuther">By '.$_SESSION['fname'].' '.$_SESSION['lname'].'</div>',$newButtons,$div);    
        }
      }
 ?>

    </div>
  </main>
          
            <!-- Modal Structure -->
          <div id="loading" class="modal" align="center" style="margin-top:100px;float:left;">
            <div id="loadingContent" class="modal-content">
            <svg class="spinner-container" width="65px" height="65px" viewBox="0 0 52 52">
              <circle class="path" cx="26px" cy="26px" r="20px" fill="none" stroke-width="4px"></circle>
            </svg>
            <h6>Please Wait...</h6>
            </div>
              <div id="loadedContentDelete" style="display:none;"class="modal-content">
                <h6>Post Deleted Succesfully !</h6>
                <a href="#!" id="closeM" class="modal-action modal-close waves-effect red btn-flat ">Close</a>
              </div>

            </div>

   </body>
</html>
<?php 
    }
    else{
      header("location:./server/headerredirect.php?url=signin");
    }
}
else{
  header("location:./server/headerredirect.php?url=signin");
}


 