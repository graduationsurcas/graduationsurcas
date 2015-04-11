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
            } else {
                parmNotAccess();
            }
            break;
        case "placespagelist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectto'])) {
                echo dboperation::getPlacesList($_POST['selectfrom'], $_POST['selectto']);
            } else {
                parmNotAccess();
            }
            break;
        case "itemspagelist":
            if (isset($_POST['selectfrom']) && isset($_POST['selectto'])) {
                echo dboperation::getItemsList($_POST['selectfrom'], $_POST['selectto']);
            } else {
                parmNotAccess();
            }
            break;
        case "placessearch":
            if (isset($_POST['searchkey'])) {
                dboperation::placeSearch($_POST['searchkey']);
            } else {
                parmNotAccess();
            }
            break;
        case "placessearch":
            if (isset($_POST['searchkey'])) {
                dboperation::placeSearch($_POST['searchkey']);
            } else {
                parmNotAccess();
            }
            break;
        case "placeupdate":
            if (isset($_POST['placetype']) &&
                    isset($_POST['placename']) &&
                    isset($_POST['placeaddress']) &&
                    isset($_POST['placelocationlat']) &&
                    isset($_POST['placelocationlng']) &&
                    isset($_POST['placedescription']) &&
                    isset($_POST['placview']) &&
                    isset($_POST['placeid'])
            ) {
                dboperation::updatePlaces($_POST['placeid'], $_POST['placetype'], $_POST['placename'], $_POST['placeaddress'], $_POST['placelocationlat'], $_POST['placelocationlng'], $_POST['placview'], $_POST['placedescription']);
            } else {
                parmNotAccess();
            }
            break;

        case "placeremove": {
                include_once '../class/cryptpass.php';
                $email = strval($_SESSION['login-admin-email']);
                dboperation::removePlaces($_POST['placeid'], $_POST['pass'], $email);
            }break;
        case "newitem": {
                if (
                        $_POST['new_item_place'] &&
                        $_POST['new_item_type'] &&
                        $_POST['new_item_name'] &&
                        $_POST['new_item_description'] &&
                        $_POST['new_item_view'] &&
                        $_FILES["file"]
                ) {
                    dboperation::newItem($_SESSION['login-admin-id'], $_POST['new_item_type'], $_POST['new_item_place'], $_POST['new_item_name'], $_POST['new_item_description'], ($_POST['new_item_view'] == '2') ? 0 : 1, $_FILES["file"]);
                } else {
                    
                }
            }break;
        case"itemimages":{
            if($_POST["itemid"]){
                echo dboperation::getItemsImages($_POST["itemid"]);
            }
        }break;


        default:
            break;
    }

    function parmNotAccess() {
        $response = array("status" => "false", "message" => "one of parm's is not accessible");
        echo json_encode($response);
    }

}

