<?php

session_start();
//echo $_SESSION['login-admin-id'];
include_once './config.php';
include_once './dboperation.php';
include_once '../class/cryptpass.php';
include_once './Services.php';
 
 if (isset($_POST["new-useremail-rest"])) {
dboperation::restpass($_POST["new-useremail-rest"]);

 }


