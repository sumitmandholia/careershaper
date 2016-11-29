<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../../includes/psl-config.php';
include_once '../../commonClass/Users.php';
include_once '../../includes/CareerShaperConstants.php';
include_once '../../commonClass/CustomMessage.php';
function login($logonId, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    $retVal = null;
    try{
    $stmt = $mysqli->prepare("SELECT USERS_ID, m.TYPE, LOGONID, LOGONPASSWORD, SALT, STATUS 
        FROM userregs ur join members m ON ur.users_id = m.member_id WHERE LOGONID = ? LIMIT 1");
        $stmt->bind_param('s', $logonId);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $uType, $logonId, $db_password, $salt, $status);
        $stmt->fetch();
        
        if ($stmt->num_rows == 1) {
            
           /* if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else { */
                
                if($status == 0){
                    // Account is Disabled.
                    
                } else if (encryptPassword($password, $salt) == $db_password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                     
                    $userObj = new Users;
                    $userObj->setUsers_id($user_id);
                    $userObj->setLogon_Id($logonId);
                    $userObj->setUsers_type($uType);
                    $retVal = $userObj;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    /*
                    $now = new DateTime();
                    $now->format('Y-m-d H:i:s');    // MySQL datetime format
//echo $now->getTimestamp(); 
                    echo 'timestamp....'.$now;
                    try {
                        $mysqli->prepare("UPDATE userregs SET PASSWORDINVALID = ".$now->getTimestamp() ." where USERS_ID = ".$user_id);
                        //mn $stmt->bind_param('s', $logonId);
                        $stmt->execute();
                        //echo $stmt->rowCount() . " records UPDATED successfully";
                    } catch (Exception $ex) {
                        echo 'error message   '. $ex->getMessage();
                    } 
                    */
                    
                    $msgObj->setMessage(null, ERROR_INVALID_LOGIN_PASSWORD);
                     $retVal = $msgObj;
                }
            //}
        } else {
                //Logon Id is not registered
            }
    }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    } 
    
    return $retVal;
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

