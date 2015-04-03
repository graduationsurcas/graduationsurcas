<?php

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
if (isset($_POST["pageenumber"])) {
    include_once 'DB/dboperation.php';
    include_once 'DB/config.php';
    $pageenumber = intval($_POST["pageenumber"]);
    echo dboperation::getPlacesList(25, 25);
}


