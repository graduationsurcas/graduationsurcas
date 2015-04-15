<?php

//session_start();
//echo $_SESSION['login-admin-id'];
include_once './server/config.php';
include_once './server/dboperation.php';
//include_once './class/cryptpass.php';



echo dboperation::updateItem(1, 1, "alysra", 1, "gheith hamood");
//dboperation::bowrrowItemCurrentCountChange("-", 1, 4);
//$changeoperation = substr(strval(")"), 0, 1);
//echo $changeoperation;