<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if (isset($_POST["useremail"]) && isset($_POST["userpassword"])) {
    include_once 'dboperation.php';
    include_once 'config.php';
    
    $email = strval($_POST["useremail"]);
    $pass = strval($_POST["userpassword"]);
    dboperation::logIn($email, $pass);
}



