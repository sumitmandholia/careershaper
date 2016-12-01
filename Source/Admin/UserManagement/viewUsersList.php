<?php
include_once '../../../includes/EnvironmentConstants.php';
include_once '../../../includes/session.php';
include_once '../../../includes/db_connect.php';


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Career Shaper | Powered by INDEZINER</title>
      <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH."admin_style.css"?>" />
      
      <script type="text/javascript" src="<?php echo JS_PATH."jquery.min.js"?>"></script>
      <script type="text/javascript" src="<?php echo JS_PATH."ddaccordion.js"?>"></script>
      <script type="text/javascript">
         ddaccordion.init({
         	headerclass: "submenuheader", //Shared CSS class name of headers group
         	contentclass: "submenu", //Shared CSS class name of contents group
         	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
         	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
         	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
         	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
         	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
         	animatedefault: false, //Should contents open by default be animated into view?
         	persiststate: true, //persist state of opened contents within browser session?
         	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
         	togglehtml: ["suffix", "<img src='<?php echo IMAGE_PATH.'plus.gif'?>' class='statusicon' />", "<img src='<?php echo IMAGE_PATH.'minus.gif'?>' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
         	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
         	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
         		//do nothing
         	},
         	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
         		//do nothing
         	}
         });
     </script>
   
      <script type="text/javascript">
         
         function changeUserStatus(userId, currentStatus){
             $.ajax({
                        url: "userAjaxMethods.php",
                        type: "POST",
                        data: {action: 'changeUserStatus', userId: $.trim(userId),currentStatus: $.trim(currentStatus)},
                        dataType: "html",
                        success: function(data) {
                           $('.right_content').html('');
                           $('.right_content').html(data);
                        }
                    });
         }
         function gotoPage($pageNumber){
              $.ajax({
                        url: "userAjaxMethods.php",
                        type: "POST",
                        data: {action: 'pagination', currentPage: $pageNumber, pageSize: 5},
                        dataType: "html",
                        success: function(data) {
                           $('.right_content').html('');
                           $('.right_content').html(data);
                        }
                    });
         }
      </script>
       <script type="text/javascript" src="<?php echo JS_PATH."jconfirmaction.jquery.js"?>"></script>
   </head>
   <body>
      <div id="main_container">
         
          <?php include '../adminHeader.php'; ?>
          
         <div class="main_content">
            <div class="center_content">
               <?php include '../adminLeftMenuBar.php'; ?>
                             
               <div class="right_content">
                 <?php 
                   include 'viewUsersListMainContent.php'; 
                  ?>
               </div>
               <!-- end of right content-->
            </div>
            <!--end of center content -->               
            <div class="clear"></div>
         </div>
         <!--end of main content-->
         <div class="footer">
            <div class="left_footer">IN ADMIN PANEL | Powered by <a href="http://indeziner.com">INDEZINER</a></div>
            <div class="right_footer"><a href="http://indeziner.com"><img src="<?php echo IMAGE_PATH."indeziner_logo.gif"?>" alt="" title="" border="0" /></a></div>
         </div>
      </div>
   </body>
</html>