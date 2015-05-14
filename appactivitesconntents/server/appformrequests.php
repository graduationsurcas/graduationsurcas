<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if (isset($_POST["destination"])) {
    include_once './appdboperations.php';
    include_once './config.php';
    switch ($_POST["destination"]) {

        case "signin":
            if (isset($_POST["signas"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                include '../../class/cryptpass.php';
                if ($_POST["signas"] == "user") {
                    $response = appdboperations::userSignIn($_POST["email"], $_POST["password"]);
                    echo json_encode(new ArrayObject(array("signin" => $response)));
                } elseif ($_POST["signas"] == "serviceprovider") {
                    $response = appdboperations::ServiceProviderSignIn($_POST["email"], $_POST["password"]);
                    echo json_encode(new ArrayObject(array("signin" => $response)));
                }
            }
            break;
        case "signup":
            if (isset($_POST["name"]) && isset( $_POST["email"]) && isset($_POST["password"])) {
                include '../../class/cryptpass.php';
                
                $lang = array();
                    $lang["English"] = 2;
                    $lang["Arabic"] = 1;
                    $lang["German"] = 4;
                    $lang["Portuguese"] = 5;
                    $lang["Spanish"] = 6;
                    $lang["Italian"] = 7;
                    $lang["French"] = 3;
                
                    $userlang = $lang[$_POST["lang"]];
                    
                if ($_POST["accounttype"] == "user") {
                     $response = appdboperations::newUser($userlang, $_POST["name"], $_POST["email"], $_POST["password"]);
                    echo json_encode(new ArrayObject(array("signup" => $response)));
                } elseif ($_POST["accounttype"] == "serviceprovider") {
                    $response = appdboperations::ServiceProviderSignIn($_POST["email"], $_POST["password"]);
                    echo json_encode(new ArrayObject(array("signup" => $response)));
                }
            }
            break;
    }
}

