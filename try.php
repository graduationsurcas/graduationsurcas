<?php

session_start();
//echo $_SESSION['login-admin-id'];
include_once './server/config.php';
include_once './server/dboperation.php';
include_once './class/cryptpass.php';

//
//echo  dboperation::getServicesList(0, 25);

//dboperation::newadmin("khalfan", "khalfan@gmail.com", 3, "123");
//dboperation::addnewaplace("kmk");

//print_r(dboperation::getAllPlacesx());

//echo encrypt_pass("oman");
//for ($index = 1; $index < 95; $index++) {
//print_r(dboperation::confirmServiceRequests($index, 2));   
//}

