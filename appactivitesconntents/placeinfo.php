<?php
header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';
use Stichoza\GoogleTranslate\TranslateClient;
try {
    include_once './server/config.php';
    include_once './server/appdboperations.php';
    $place = appdboperations::getPlaceInformation($_GET["id"]);
    ?>

    <html>
        <head>
            <?php
            require_once './includes/headers.html';
            ?>
            <link href="css/main.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>

            <?php
           $placedesc = TranslateClient::translate(null, $_GET["lang"], $place["description"]);
           $placetype = TranslateClient::translate(null, $_GET["lang"], $place["placetype"]);
            ?>

            <!--         ( [place_id] => 98 [place_name] => place test 
                     [description] => fsvtgegbtrbr t reb [createdate] => 2015-04-15 
                     [last_update] => 2015-04-15 01:46:25 [create_date] => 2015-04-15 01:46:25 
                     [view] => 1 [place_admin_creator] => 2 [place_location_lng] => 7878710 
                     [place_location_lat] => 454578 [address] => oman [place_type] => 3
                     [placetype] => museum )-->

            <section class="main-placeinformation-section">
                
                <?php
                $placeimages = appdboperations::getPlaceImage($_GET["id"]);
                if (count($placeimages) > 0) {
                    for ($index = 0; $index < count($placeimages); $index++) {
                        ?>
                        <div class="panel panel-default placeinformation-card">
                            <div class="panel-image">
                                <center>
                                     <img style="max-width: 100%;" src="<?php echo $placeimages[$index]; ?>" class="panel-image-preview" />
                                </center>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                
                <div class="panel panel-default placeinformation-card">

                    <div class="panel-body">
                        <p><?php echo $placedesc;?></p>
                    </div>
                </div>
                


                <div class="panel panel-default placeinformation-card">

                    <div class="panel-body">
                        <span style="float: left; margin-top: 3px;" id="place-address">
                            <?php echo $place["address"] ?>
                        </span>
                        <span style="float: right;">
                            <a><i class="fa fa-heart"></i></a>
                            <?php
                            $itemcount = appdboperations::getItemsOnPlaceCount($_GET["id"]);
                            if ($itemcount > 0) {
                                ?>
                            <a href="*placeitemslist~<?php echo $_GET["id"]; ?>~<?php echo $place["place_name"]." ".$placetype; ?>" class="btn btn-sm">
                                    <i class="fa fa-diamond"></i>
                                    <i class="fa"><?php echo $itemcount; ?></i>
                                </a>
                                <?php
                            }
                            ?>
                            <a href="*map~<?php echo $place["place_location_lat"]; ?>~<?php echo $place["place_location_lng"]; ?>" class="btn btn-sm" style=""><i class="fa fa-map-marker"></i></a>
                        </span>
                    </div>
                </div>

            </section>


            <?php
            require_once './includes/footers.html';
            ?>
        </body>
    </html>
    <?php
} catch (Exception $ex) {
    
}
