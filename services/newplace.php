<?php

header("Access-Control-Allow-Origin: *");
//'placename': 
// 'placetype': 
// 'placeaddress': 
// 'placelocationlat': 
// 'placelocationlng': 
// 'placedescription': 


if (
        isset($_POST["placename"]) &&
        isset($_POST["placetype"]) &&
        isset($_POST["placeaddress"]) &&
        isset($_POST["placelocationlat"]) &&
        isset($_POST["placelocationlng"]) &&
        isset($_POST["placview"]) &&
        isset($_POST["placedescription"])
) {
    session_start();
    include_once 'DB/dboperation.php';
    include_once 'DB/config.php';
    dboperation::newPlace($_SESSION['login-admin-id'], $_POST["placename"], $_POST["placetype"], $_POST["placeaddress"], $_POST["placelocationlat"], $_POST["placelocationlng"], $_POST["placview"], $_POST["placedescription"]);
}


