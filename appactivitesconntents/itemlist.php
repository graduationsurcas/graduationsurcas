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
             .load-more{
                margin-top: 15px;
                margin-bottom: 8px;
                font-size: 2em;
            }
            .load-more #loadmore-spinner{
                font-size: 1.3em;
            }
            .load-more #loadmore-icon{

            }
        </style>
    </head>
    <body >


        <section class="main-items-section">

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
            } else if (isset($_GET["placeid"])) {
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
        if(count($itemlist) == $_GET["selectamount"]){
            ?>
        <section class="load-more">
            <center>
                <span  id="loadmore-button" style="margin: 0px; padding: 0px;"  class="btn btn-sm">
                    <i style="font-size: 2.5em;" class="fa fa-angle-double-down"></i>
                </span>
                <i style="color: #0091ea; font-weight: 100;" id="loadmore-spinner" class="fa fa-circle-o-notch fa-spin"></i>
            </center>
        </section>
        <?php
        }
        ?>
        

        <input type="hidden" id="selectamount" value="<?php echo $_GET["selectamount"]; ?>">
        <input type="hidden" id="selectfrom" value="25">
        <input type="hidden" id="round" value="2">
        <input type="hidden" id="userlang" value="<?php echo $_GET["lang"]; ?>">


        <script src="js/main.js" type="text/javascript"></script>
        <?php
        require_once './includes/footers.html';
        ?>
        <script src="js/jquery.tmpl.min.js" type="text/javascript"></script>
        <script src="js/jquery.tmplPlus.min.js" type="text/javascript"></script>
        <script src="js/itemslist.js" type="text/javascript"></script>
        <script src="materialize/js/materialize.min.js" type="text/javascript"></script>

        <script id="ItemsListTemplate" type="text/x-jquery-tmpl">
             <div class="place-card">
                    <div class="panel panel-default" >
                        <div class="panel-body">
                            <h4>
                                <span  id="place-title">
                                            ${name}
                                            </span>
                                <span id="place-add-date">${date}</span>
                            </h4>
                            <div id="place-main-area">
                                <p>
                                            ${description}
                                            </p>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="text-left" style="margin: 0px; padding: 0px; float: left">
                                <span class="btn btn-sm card-icon">
                                    <a href="*share~this item comming from my app id = ${id}"
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
                                    <a href="*openitem~${id}~${name}" 
                                       >
                                        <i class="fa fa-expand card-icon"></i>
                                    </a>
                                </span>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
        </script>

        <script type="text/javascript">
$("#loadmore-spinner").hide();
        </script>
    </body>
</html>