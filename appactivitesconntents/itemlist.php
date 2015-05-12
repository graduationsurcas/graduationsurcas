<?php
header('Content-Type: text/html; charset=utf-8');
include_once './server/config.php';
include_once './server/appdboperations.php';
require 'vendor/autoload.php';

use Stichoza\GoogleTranslate\TranslateClient;
?>

<html>
    <head>
        <?php
        require_once './includes/headers.html';
        ?>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <style>
            #place-title{
                font-size: 95%;
                font-weight: 600;
                color: #2196F3;
            }
            .card-icon{
                color: #999999;
            }
        </style>
    </head>
    <body >


        <section class="main-places-section">

            <?php
            $itemlist = array();
            if (isset($_GET["orderby"])) {
                switch ($_GET["orderby"]) {
                    case "date":
                        $itemlist = appdboperations::getItemsList($_GET["selectamount"]);
                        break;
                    case "location":
                        $itemlist = appdboperations::getItemsListByLocation
                                        ($_GET["selectamount"], $_GET["locationlat"], $_GET["locationlong"]);
                        break;
                    default:
                        break;
                }
            }
            else if (isset($_GET["placeid"])) {
                $itemlist = appdboperations::getItemsList($_GET["selectamount"], $_GET("placeid"));
            }




            foreach ($itemlist as $item) {
                ?>
                <div class="place-card">
                    <div class="panel panel-default" >
                        <div class="panel-body">
                            <h4>
                                <span  id="place-title"><?php
                                    echo $item["name"];
                                    ?></span>
                                <span id="place-add-date"><?php echo $item["date"]; ?></span>
                            </h4>
                            <div id="place-main-area">
                                <p><?php
                                    $descriptionx = (strlen($item["description"]) > 150) ? substr($item["description"], 0, 150) . ".." : $item["description"];
                                    echo TranslateClient::translate(null, $_GET["lang"], $descriptionx);
                                    ?></p>
                            </div>
                        </div>
                        <div class="panel-body">
                        <div class="text-left" style="margin: 0px; padding: 0px; float: left">
                            <span class="btn btn-sm card-icon">
                                <a href="*share~this item comming from my app id = <?php echo $item["id"]; ?>"
                                   class="waves-effect" >
                                    <i class="fa fa-share-alt card-icon"></i>
                                </a>
                            </span>
                        </div>
                        <div class="text-right" style="margin: 0px; padding: 0px; float: right">
                            <span class="btn btn-sm card-icon" style="margin-right: 5px;">
                                <a><i class="fa fa-heart card-icon"></i></a>
                            </span>   
                            <span class="btn btn-sm card-icon">
                                <a href="*openitem~<?php echo $item["id"]; ?>~<?php echo $item["name"]; ?>" 
                                   >
                                    <i class="fa fa-expand card-icon"></i>
                                </a>
                            </span>
                        </div>
                        <br>
                    </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </section>


        <?php
        require_once './includes/footers.html';
        ?>
        <script src="materialize/js/materialize.min.js" type="text/javascript"></script>

    </body>
</html>