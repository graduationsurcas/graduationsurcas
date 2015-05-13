<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if(isset($_POST["destination"])){
    include_once './appdboperations.php';
    include_once './config.php';
    switch ($_POST["destination"]) {
        
        case "signin":
            if (isset($_POST["signas"]) && isset($_POST["email"]) && isset($_POST["password"]) ) {
                include '../../class/cryptpass.php';
                if($_POST["signas"] == "user"){
                    $response = appdboperations::userSignIn($_POST["email"], $_POST["password"]);
                    echo json_encode(new ArrayObject(array("signin" => $response)));
                }  elseif ($_POST["signas"] == "serviceprovider") {
                    
                }
            }
        break;
    }
}

