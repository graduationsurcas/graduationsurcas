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
//for ($index = 0; $index < 100; $index++) {
//print_r(dboperation::newPlace(2, "place name ".$index, 3, "oman", 22.56237, 59.47147, 1, "description", $images));   
//}