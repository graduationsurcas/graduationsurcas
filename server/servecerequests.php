<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
session_start();

if ($_SESSION['login'] && isset($_POST["destination"])) {
    include_once 'dboperation.php';
    include_once 'config.php';
    switch ($_POST["destination"]) {
        case "enternewplace":
            if (isset($_POST["placename"]) &&
                    isset($_POST["placetype"]) &&
                    isset($_POST["placeaddress"]) &&
                    isset($_POST["placelocationlat"]) &&
                    isset($_POST["placelocationlng"]) &&
                    isset($_POST["placview"]) &&
                    isset($_POST["placedescription"])
            ) {
                dboperation::newPlace($_SESSION['login-admin-id'], $_POST["placename"], $_POST["placetype"], $_POST["placeaddress"], $_POST["placelocationlat"], $_POST["placelocationlng"], $_POST["placview"], $_POST["placedescription"]);
            }
            break;
        case "placespagelist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectto'])) {
                echo dboperation::getPlacesList($_POST['selectfrom'], $_POST['selectto']);
            }
            break;
        case "placessearch":
            if (isset($_POST['searchkey'])) {
                dboperation::placeSearch($_POST['searchkey']);
            }
            break;

        default:
            break;
    }
}

