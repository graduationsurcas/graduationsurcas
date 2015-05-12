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
                font-size: 1.35em;
                font-weight: 600;
                color: #2196F3;
            }
            .card-icon{
                color: #999999;
                border: none;
            }
            .panel{
                border-radius: 0px;
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


        <section class="main-places-section">

            <?php
            $places = array();
            if (isset($_GET["orderby"])) {
                switch ($_GET["orderby"]) {
                    case "date":
                        $places = appdboperations::getPlacesList($_GET["selectamount"]);
                        break;
                    case "location":
                        $places = appdboperations::getPlacesListOrderByLocation
                                        ($_GET["selectamount"], $_GET["locationlat"], $_GET["locationlong"]);
                        break;
                    default:
                        break;
                }
            }

            foreach ($places as $places) {
                ?>

                <div class="panel place-card">
                    <div class="panel-body">
                        <span id="place-title" style="margin-bottom: 10px;">
                            <?php
                            echo TranslateClient::translate(null, $_GET["lang"], $places["name"]);
                            ?>

                        </span>
                        <p>
                            <?php
                            $description = (strlen($places["description"]) > 150) ? substr($places["description"], 0, 150) . ".." : $places["description"];
                            $description = TranslateClient::translate(null, $_GET["lang"], $description);
                            echo $description;
                            ?>
                        </p>
                    </div>
                    <div class="panel-body">
                        <div class="text-left" style="margin: 0px; padding: 0px; float: left">
                            <span class="btn btn-sm card-icon">
                                <a href="*share~this place comming from my app id = <?php echo $places["id"]; ?>"
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
                                <a href="*openplace~<?php echo $places["id"]; ?>~<?php echo TranslateClient::translate(null, $_GET["lang"], $places["name"]);    ?>" 
                                   >
                                    <i class="fa fa-expand card-icon"></i>
                                </a>
                            </span>
                        </div>
                        <br>
                    </div>
                </div>
                <?php
            }
            ?>
        </section>

        <section class="load-more">
            <center>
                <span  id="loadmore-button" style="margin: 0px; padding: 0px;"  class="btn btn-sm">
                    <i style="font-size: 2.5em;" class="fa fa-angle-double-down"></i>
                </span>
                <i style="color: #0091ea; font-weight: 100;" id="loadmore-spinner" class="fa fa-circle-o-notch fa-spin"></i>
            </center>
        </section>

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
        
        <script id="PlacesListTemplate" type="text/x-jquery-tmpl">
              <div class="panel place-card">
                    <div class="panel-body">
                        <span id="place-title" style="margin-bottom: 10px;">
                          ${name}  
                        </span>
                        <p>
                          ${description}
                        </p>
                    </div>
                    <div class="panel-body">
                        <div class="text-left" style="margin: 0px; padding: 0px; float: left">
                            <span class="btn btn-sm card-icon">
                                <a href="*share~this place comming from my app id = ${id}"
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
                                <a href="*openplace~${id}~${name}" 
                                   >
                                    <i class="fa fa-expand card-icon"></i>
                                </a>
                            </span>
                        </div>
                        <br>
                    </div>
                </div>
        </script>
        <script src="js/placeslist.js" type="text/javascript"></script>
        <script type="text/javascript">
            // $("#loadmore-button").hide();
            $("#loadmore-spinner").hide();
        </script>
        <script src="materialize/js/materialize.min.js" type="text/javascript"></script>
        
    </body>
</html>