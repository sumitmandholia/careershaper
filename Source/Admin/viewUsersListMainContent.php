<script type="text/javascript">
         $(document).ready(function() {
         	$('.ask').jConfirmAction();
         });
</script>
<?php
   include_once '../../commonClass/Users.php';
    include_once '../../commonClass/MyCollection.php';

    $stmt = $mysqli->prepare("CALL GET_USERS_LIST(@error_code,@error_msg)");
    $stmt->execute();
    
     $stmt->bind_result($user_id, $logonid, $name, $type, $phone1, $email1, $status);
     $myColl = new MyCollection();
     while ($stmt->fetch()) {
            $userObj = new Users();
            $userObj->setUsers_id($user_id);
            $userObj->setLogon_Id($logonid);
            $userObj->setUser_name($name);
            $userObj->setUsers_type($type);
            $userObj->setPhone1($phone1);
            $userObj->setEmail1($email1);
            $userObj->setStatus($status);
            
            $myColl->addItem($user_id, $userObj);
        }
     $stmt->close();
     $typeArray = array("A" => "Admin", "IU" => "Internal", "EU" => "External");
   ?>
    <h2>Users List</h2>
   <table summary="user List" id="rounded-corner">
      <thead>
         <tr>
            <th class="rounded-company" scope="col" width="4%"></th>
            <th class="rounded" scope="col" width="13%">Login ID</th>
            <th class="rounded" scope="col" width="22%">Name</th>
            <th class="rounded" scope="col" width="10%">Type</th>
            <th class="rounded" scope="col" width="18%">Phone No</th>
            <th class="rounded" scope="col" width="25%">Email Id</th>
            <th class="rounded" scope="col" width="4%">Edit</th>
            <th class="rounded-q4" scope="col" width="4%">Status</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            $key_arr = $myColl->keys();
            foreach ($key_arr as $key) {
                $userObj = $myColl->getItem($key);
         ?> 
            <tr>
                <td><input type="checkbox" id="<?php echo $userObj->getUsers_id() ?>"></td>
                <td><?php echo $userObj->getLogon_Id() ?></td>
                <td><?php echo $userObj->getUser_name() ?></td>
                <td><?php echo $typeArray[$userObj->getUsers_type()] ?></td>
                <td><?php echo $userObj->getPhone1() ?></td>
                <td><?php echo $userObj->getEmail1() ?></td>
               <td><a href="#"><img border="0" title="" alt="" src="../../images/user_edit.png"></a></td>
               <td>
                   <a class="ask" href="javascript:changeUserStatus('<?php echo $userObj->getUsers_id(); ?>','<?php echo $userObj->getStatus(); ?>');" id="status_<?php echo $userObj->getUsers_id()?>">
                       <?php if($userObj->getStatus() === 1): ?>
                            <img class="status" border="0" title="" alt="enabled" src="../../images/enabled.png" tooltip="enabled">
                       <?php else: ?>
                            <img class="status" border="0" title="" alt="disabled" src="../../images/disabled.png">
                       <?php endif; ?>
                   </a>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <div class="footerButton">
        <a class="bt_green" href="#"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
        <a class="bt_blue" href="#"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
        <a class="bt_red" href="#"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a> 
   </div>
   <div class="pagination">
      <span class="disabled">&lt;&lt; prev</span><span class="current">1</span><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a>…<a href="">10</a><a href="">11</a><a href="">12</a>...<a href="">100</a><a href="">101</a><a href="">next &gt;&gt;</a>
   </div>
