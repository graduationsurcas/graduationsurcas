<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if (isset($_POST["useremail"]) && isset($_POST["userpassword"])) {
    include_once 'dboperation.php';
    include_once 'config.php';
    include_once '../class/cryptpass.php';
    $email = strval($_POST["useremail"]);
    $pass = strval($_POST["userpassword"]);
   $data = dboperation::logIn($email, $pass);
    if(isset($_POST["rootadmin"])){
        if($_POST["rootadmin"] == "true" && $data["status"] == "true"){
            if($_SESSION['login-admin-level'] == "root"){
                $_SESSION['root-admin-sign-in'] = true;
            }  else {
                $data["status"] = "false";
                $data["message"] = "you are not allowed to continue because"
                        . " your account does not have the proper privileges";
            }
            
        }
    } 
    echo json_encode($data);
    
    
    
}



