
<?php
include_once '../../../includes/EnvironmentConstants.php';
include_once '../../../includes/session.php';
include_once '../../../includes/db_connect.php';
   
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $fName = $_POST["firstName"];
        $mName = $_POST["middleName"];
        $lName = $_POST["lastName"];
        $userType = $_POST["userType"];
        
        //$testType = $_POST["testType"];
        $userName = $_POST["uname"];
        $password = $_POST["password"];
        $email1 = $_POST["email1"];
        $phone1 = $_POST["phone1"];
        $phone1type = $_POST["phone1type"];
        if($title === 'Mr.'){
            $sex = 'M';
        }   
        else{
            $sex = 'F';
        }
        $len = 8;
        $cStrong = true;
        $salt = bin2hex(openssl_random_pseudo_bytes($len, $cStrong));
        $passwordHash = crypt($password, $salt);
        
        $state = 1;
        $phone2=NULL;
        $phone2type=NULL;
        $email2=NULL;
        $updatedby=$_SESSION["logonId"];
        $stmt = $mysqli->prepare("CALL USER_REGISTRATION(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@error_code,@error_msg)");
        $stmt->bind_param("sisssssssssssssss",$userType,$state,$userName,$passwordHash,$salt,$title,$fName,$lName,
                $mName,$sex,$phone1,$phone1type,$phone2,$phone2type,$email1,$email2,$updatedby);
        
        $stmt->execute();
        $select = $mysqli->query('SELECT @error_code, @error_msg');
        $result = $select->fetch_assoc();
        $error_code = $result['@error_code'];
        $error_msg = $result['@error_msg'];
        $stmt->close();
        }
       ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Career Shaper | Powered by INDEZINER</title>
      <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH."admin_style.css"?>" />
      <link rel="stylesheet" type="text/css" media="all" href="<?php echo CSS_PATH."niceforms-default.css"?>" />
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
         var nameflag = false;
         var unameFlag = false;
         var passwordFlag = false;
         var cPasswordFlag = false;
         var email1Flag = false;
         var phone1Flag = false;
         
         function onclickUtype(utype){
             if(utype == 'A')
                $(".testType").hide();  
             else
                 $(".testType").show();  
          }
          
          function validateFields(eleId,eleVal){
              var valid = true;
              if(eleId == 'name'){
                  var title = $.trim(document.getElementById('title').value);
                  var firstName = $.trim(document.getElementById('firstName').value);
                  var middleName = $.trim(document.getElementById('middleName').value);
                  var lastName = $.trim(document.getElementById('lastName').value);
                  
                  var pattern =/[a-zA-Z]+$/;
                  if(title == "" ||firstName == "" || lastName == "" ){
                      valid = false;
                  } else if(!pattern.test(firstName) || !pattern.test(lastName) || !(middleName == "" || pattern.test(middleName))){
                        valid = false;
                   } else{
                       nameflag = true;
                   }
                   
              } else if( eleId === "password"){
                  if(eleVal === ""){
                      valid = false;
                  }else{
                      passwordFlag = true;
                  }
              }else if(eleId === "cPassword"){
                  var password = document.getElementById('password').value;
                  if(eleVal !== password){
                      valid = false;
                  }else{
                      cPasswordFlag = true;
                  }
              }else if(eleId === "email1"){
                  var emailRegEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                  if(eleVal === "" || !emailRegEx.test(eleVal)){
                      valid = false;
                  }else{
                      email1Flag = true;
                  }
              }else if(eleId === "phone1"){
                  var phoneRegEx = /[0-9]+/;
                   if(eleVal == "" || !phoneRegEx.test(eleVal)){
                      valid = false;
                  }else{
                      phone1Flag = true;
                  }
              }
              
              if(valid == true){
                  $('#'+eleId+'_error').hide();
                  $('#'+eleId+'_valid').show();
              }else{
                  $('#'+eleId+'_valid').hide();
                  $('#'+eleId+'_error').show();
                  }
          }
          
           function validateForm(){
              
            var validform = nameflag && unameFlag && passwordFlag && cPasswordFlag && email1Flag && phone1Flag;
              if(!validform){
                    $('.error_box').html("Please Enter All Mandatory Fields..");
                    $('.error_box').show();
              }else{
                    $('.error_box').hide(); 
                    $('#userForm').submit();
                   
               } 
            } 
            
            function checkLogonId(eleId, logonId){
                if($.trim(logonId) === "") {
                    $('#'+eleId+'_valid').hide();
                    $('#'+eleId+'_error').show();
                } else {
                    $.ajax({
                        url: "userAjaxMethods.php",
                        type: "POST",
                        data: {action: 'logonId', logonId: $.trim(logonId)},
                        dataType: "json",
                        success: function(data) {
                            if(data.status == 'success'){
                                unameFlag = true;
                                $('.uname_error').hide();
                                $('#'+eleId+'_error').hide();
                                $('#'+eleId+'_valid').show();
                                $('.uname_error').hide();
                            } else{
                                $('#'+eleId+'_valid').hide();
                                $('.uname_error').text(data.message);
                                $('#'+eleId+'_error').show();
                                $('.uname_error').show();
                             }

                        }, error: function(x,e) {
                          $('.uname_error').text("UserId Check Service is Currently Down. Please Continue...");
                           $('.uname_error').show();
                        }
                    });
                }
            }
      </script>
      <!-- <script language="javascript" type="text/javascript" src="../../js/niceforms.js"></script> -->
      
   </head>
   <body>
      <div id="main_container">
         
          <?php include '../adminHeader.php'; ?>
          
         <div class="main_content">
            <div class="center_content">
               <?php include '../adminLeftMenuBar.php'; ?>
                             
               <div class="right_content">
                 <?php 
                   include 'userRegistration.php'; 
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



