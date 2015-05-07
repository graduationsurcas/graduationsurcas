<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

    include_once 'dboperation.php';
    include_once 'config.php';
    
    $email = strval($_POST["useremail"]);
   
    dboperation::restpass($email);



