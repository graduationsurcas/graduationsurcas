<?php
require '../vendor/autoload.php';
use Stichoza\GoogleTranslate\TranslateClient;

if(isset($_POST["destination"])){
    include_once './appdboperations.php';
    include_once './config.php';
    


    switch ($_POST["destination"]){
        case ("placeslistnextpage"):{
            $places = appdboperations::getPlacesList($_POST["selectamount"], $_POST["selectfrom"]);
            $aftertranslate = array();
                foreach ($places as $value) {
                    $value["description"] =  TranslateClient::translate("en", $_POST["lang"], $value["description"]);
                    $value["name"] = TranslateClient::translate("en", $_POST["lang"], $value["name"]);
                    $value["placetype"] = TranslateClient::translate("en", $_POST["lang"], $value["placetype"]);
                
                  array_push($aftertranslate, $value);
                    
                }
                echo json_encode($aftertranslate);
        }break;
    }
}

