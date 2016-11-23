<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once '../../includes/db_connect.php';

if($_POST['action'] == 'logonId'){
    isLogonIdAvail($_POST['logonId'], $mysqli);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function isLogonIdAvail($logonId, $mysqli){

      $stmt = $mysqli->prepare("SELECT count(*) FROM userregs WHERE logonid=?");
      $stmt->bind_param("s",$logonId);
      $stmt->execute();
      $stmt->bind_result($count);
      $stmt->fetch();

      if($count > 0){
          $response_array['status'] = 'failure'; 
          $response_array['message'] = 'Username '.$logonId. ' is already used';   
            
      } else{
          $response_array['status'] = 'success';
      }
      header('Content-type: application/json');
      echo json_encode($response_array);
      
      $stmt->close();
}
