<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../../includes/psl-config.php';

function login($logonId, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    try{
    $stmt = $mysqli->prepare("SELECT USERS_ID, LOGONID, LOGONPASSWORD, SALT 
        FROM userregs WHERE LOGONID = ? LIMIT 1");
        $stmt->bind_param('s', $logonId);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
           /* if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else { */
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.
                
                if (encryptPassword($password, $salt) == $db_password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                  //  $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "",$username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $db_password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    /*
                    $now = new DateTime();
                    $now->format('Y-m-d H:i:s');    // MySQL datetime format
//echo $now->getTimestamp(); 
                    echo 'timestamp....'.$now;
                    try {
                        $mysqli->prepare("UPDATE userreg SET PASSWORDINVALID = ".$now->getTimestamp() ." where USERS_ID = ".$user_id);
                        //mn $stmt->bind_param('s', $logonId);
                        $stmt->execute();
                        //echo $stmt->rowCount() . " records UPDATED successfully";
                    } catch (Exception $ex) {
                        echo 'error message   '. $ex->getMessage();
                    } */
                    
                    return false;
                }
            //}
        } else {
            // No user exists.
            echo 'invalid userid';
            return false;
        }
    }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function getSalt($len = 8){
    return  bin2hex(openssl_random_pseudo_bytes($len, $cStrong = true));
}
/**
 * 
 * @param type $password
 * This method would encrypt password by using Salt.
 */
function encryptPassword($password,$salt){
    
    return crypt($password, $salt);
}

