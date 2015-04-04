<?php

//session_start();
//echo $_SESSION['login-admin-id'];
include_once './server/config.php';
include_once './server/dboperation.php';

 dboperation::logIn("ghak@gmail.com", "44180");
//dboperation::bowrrowItemCurrentCountChange("-", 1, 4);
//$changeoperation = substr(strval(")"), 0, 1);
//echo $changeoperation;