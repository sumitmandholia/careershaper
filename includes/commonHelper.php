<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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

