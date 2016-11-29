<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once '../../includes/db_connect.php';

if($_POST['action'] == 'logonId'){
    isLogonIdAvail($_POST['logonId'], $mysqli);
} else if($_POST['action'] == 'changeUserStatus'){
    $newStatus = $_POST['currentStatus'] == 1 ? 0 : 1;
    changeUserStatus($_POST['userId'], $newStatus, $mysqli);
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

function changeUserStatus($userId, $newStatus, $mysqli) {
    
    try{
        $stmt = $mysqli->prepare("Update userregs set status = ? WHERE users_id = ?");
        $stmt->bind_param("ii",$newStatus,$userId);
        $stmt->execute();
      //  $response_array['status'] = 'success'; 
       // echo json_encode($response_array);
         header('Content-type: application/json');
       echo json_encode( include_once 'viewUsersListMainContent.php');
        
        
    }catch(Exception $ex){
         $response_array['status'] = 'failure'; 
         header('Content-type: application/json');
         echo json_encode($response_array);
    }
    
}
