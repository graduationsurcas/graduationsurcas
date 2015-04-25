<?php

//session_start();
//echo $_SESSION['login-admin-id'];
include_once './server/config.php';
include_once './server/dboperation.php';
include_once './class/cryptpass.php';

//echo encrypt_pass("1234");


//dboperation::itemsSearch("oman");
echo dboperation::getItemCommentsList(0, 25, 209);
//$changeoperation = substr(strval(")"), 0, 1);
//echo $changeoperation;