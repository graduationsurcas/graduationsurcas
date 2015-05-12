<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');


require '../vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;

if (isset($_POST["destination"])) {
    include_once './appdboperations.php';
    include_once './config.php';



    switch ($_POST["destination"]) {
        case ("placeslistnextpage"): {
                $places = appdboperations::getPlacesList($_POST["selectamount"], $_POST["selectfrom"]);
                $aftertranslate = array();
                foreach ($places as $value) {
                    $description = (strlen($value["description"]) > 150) ? substr($value["description"], 0, 150) . ".." : $value["description"];
                    $value["description"] = TranslateClient::translate("en", $_POST["lang"], $description);
                    $value["name"] = TranslateClient::translate("en", $_POST["lang"], $value["name"]);
                    $value["placetype"] = TranslateClient::translate("en", $_POST["lang"], $value["placetype"]);

                    array_push($aftertranslate, $value);
                }
                echo json_encode($aftertranslate);
            }break;
        case ("itemlistnextpage"): {
                $items = appdboperations::getItemsList($_POST["selectamount"], $_POST["selectfrom"]);
                $aftertranslate = array();
                foreach ($items as $value) {
                    $descriptionx = (strlen($value["description"]) > 150) ? substr($value["description"], 0, 150) . ".." : $value["description"];
                    $value["description"] = TranslateClient::translate("en", $_POST["lang"], $descriptionx);
                    array_push($aftertranslate, $value);
                    }
                echo json_encode($aftertranslate);
            }break;
        case ("serviceslistnextpage"): {
                $services = appdboperations::getServiceList($_POST["selectamount"], $_POST["selectfrom"]);
                
                $aftertranslate = array();
                for ($index = 0; $index < count($services); $index++) {
                    $value = $services[$index];
                     $value["type"] = TranslateClient::translate("en", $_POST["lang"], $value["type"]);
                    $value["description"] = TranslateClient::translate("en", $_POST["lang"], $value["description"]);
                    array_push($aftertranslate, $value);
                }
                echo json_encode($aftertranslate);
            }break;
    }
}

