<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if(isset($_POST["searchkey"])){
    include_once 'DB/dboperation.php';
    include_once 'DB/config.php';
    $searchkey = strval($_POST["searchkey"]);
    echo dboperation::placeSearch($searchkey);
}


