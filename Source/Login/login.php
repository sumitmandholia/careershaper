<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../../includes/db_connect.php';
include_once '../../includes/session-functions.php';
include_once 'login-functions.php';
include_once '../../commonClass/Users.php';
include_once '../../includes/CareerShaperConstants.php';
 // Our custom secure way of starting a PHP session.

if (isset($_POST['username'], $_POST['password'])) {
    $logonId = $_POST['username'];
    $password = $_POST['password']; 
    
    $retVal = login($logonId, $password, $mysqli);
  if (gettype($retVal) == 'object') {
        // Login success
       session_start();
        $_SESSION['logonId'] = $retVal->getLogon_Id();
        if($retVal->getUsers_type() == 'A' || $retVal->getUsers_type() == 'OU'){
            header('Location: ../Admin/adminLanding.php');
        } else {
            header('Location: ../User/userLandingPage.php');
        }
    } else {
        $_SESSION['error_msg'] = $retVal;
        
        //echo $retVal;
        //echo $_SESSION['error_msg'];
        header('Location: ../../index.php');
    } 
} 

