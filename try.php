<?php

session_start();
//echo $_SESSION['login-admin-id'];
include_once './server/config.php';
include_once './server/dboperation.php';
include_once './class/cryptpass.php';

//echo strlen(encrypt_pass("1234"));
//dboperation::itemsSearch("oman");
//$email = strval($_SESSION['login-admin-email']);
 dboperation::action_report("try", 2);
//echo dboperation::getServiceRequestsList(0, 25);
//$changeoperation = substr(strval(")"), 0, 1);
//echo $changeoperation;

// Create connection
//$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//for ($index = 100; $index < 200; $index++) {
//    $sql = "INSERT INTO user_service (useservice_id,
//        useservice_name,
//        useservice_email,
//        useservice_phone,
//        useservice_password, 
//        useservice_add_date,
//        positive_evaluation,
//        negative_evaluation,
//        account_status)
//        VALUES (NULL,
//        'user name ".$index."' , 
//        '".$index."usermail@gmail.com', 
//        ".$index."5454455, 
//        12345, '2015-05-1 02:37:53', 
//        0, 0,
//        '0')";
//    $conn->query($sql);
//}
//
//
//
//
//$conn->close();
