<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<div class="header">
    <div class="logo"><a href="#"><img src="<?php echo IMAGE_PATH."logo.gif"?>"  alt="" title="" border="0" /></a></div>
    <div class="right_header">Welcome <?php echo $_SESSION['logonId'] ?>, | <a href="<?php echo LOGIN_DIR.'logout.php'?>" class="logout">Logout</a></div>
</div>
