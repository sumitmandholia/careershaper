<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<?php

?>

<html>
    <head>
        <meta charset="windows-1252">
        <title>Career Shaper Online Test</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        <script src="js/sha512.js"></script>
        <script src="js/forms.js"></script>
    </head>
    <div class="wrap">
        <div class="avatar">
            <img src="images/avatar.png">
        </div>
        <form action="Source/Login/login.php" method="post">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <a href="" class="forgot_link">forgot ?</a>
            <span class="errorMsg"></span>
            <input type="submit" value="Sign In" />
        </form>
    </div>
</html>
