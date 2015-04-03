<?php

header("Access-Control-Allow-Origin: *");
if (isset($_POST["useremail"]) && isset($_POST["userpassword"])) {
    include_once 'DB/dboperation.php';
    include_once 'DB/config.php';
    $email = strval($_POST["useremail"]);
    $pass = strval($_POST["userpassword"]);
    dboperation::logIn($email, $pass);
}


