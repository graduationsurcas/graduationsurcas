<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

session_start();

if ($_SESSION['login'] && isset($_POST["destination"])) {
include_once './config.php';
include_once './dboperation.php';
switch ($_POST["destination"]) {
case "placespagelist":
if (isset($_POST['selectfrom']) && isset($_POST['selectto'])) {
    dboperation::getPlacesListJson($_POST['selectfrom'], $_POST['selectto']);
}
break;

default:
break;
}
}

