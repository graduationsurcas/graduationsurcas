<?php

session_start();
//echo $_SESSION['login-admin-id'];
include_once './server/config.php';
include_once './server/dboperation.php';
include_once './class/cryptpass.php';


echo  dboperation::confirmServiceRequests(7, 2);