<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../../includes/db_connect.php';
include_once '../../includes/session-functions.php';
include_once 'login-functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['username'], $_POST['password'])) {
    $userId = $_POST['username'];
    $password = $_POST['password']; 
    
    /*
    $salt = getSalt();
    $passwordHash = encryptPassword($password, $salt);
    echo 'Setting Input Param for UserId: '.$userId.' Password: '.$password;
    echo 'Yessss';
    $stmt = $mysqli->prepare("CALL USER_REGISTRATION(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisssssssssssssss",$utype = "OU",$state = 1,$userId,$passwordHash,$salt,$title = "Mr",$fname="Sumit",$lname="Mandholia",
            $mname="Kumar",$sex="M",$phone1="9738846717",$ph1type="Mobile",$phone2="7666897096",$phone1type="Mobile",
                        $email1="sumitmandholia2007@gmail.com",$email2="sumitmandholia.job@gmail.com",$updatedby="SYSTEM");
    $stmt->execute();
    
    echo 'User Created Sucdcessfully';
    echo ' userId: '.$userId.' password: '.$password;
    */
   
   
  if (login($userId, $password, $mysqli) == true) {
        // Login success 
       
        header('Location: ../Admin/adminLanding.php');
    } else {
        echo 'invalid login';
    } 
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

