<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../../includes/db_connect.php';
include_once '../../includes/session-functions.php';
include_once 'login-functions.php';

 // Our custom secure way of starting a PHP session.
 
if (isset($_POST['username'], $_POST['password'])) {
    $userId = $_POST['username'];
    $password = $_POST['password']; 
    
  if (login($userId, $password, $mysqli) == true) {
        // Login success 
       sec_session_start();
       $_SESSION["userId"] = $userId;
        header('Location: ../Admin/adminLanding.php');
    } else {
        echo 'invalid login';
    } 
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

