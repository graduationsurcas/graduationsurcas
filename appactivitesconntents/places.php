<?php
header('Content-Type: text/html; charset=utf-8');
include_once './server/config.php';
include_once './server/appdboperations.php';
?>

<html>
    <head>
        <?php
        require_once './includes/headers.html';
        ?>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <style>
            #place-title{
                font-size: 100%;
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
            $places = array();
            if(isset($_GET["orderby"])){
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
                <div class="place-card">
                    <div class="panel panel-default" >
                        <div class="panel-body">
                            <h4>
                                <span  id="place-title"><?php
                                    echo $places["name"] . " " . $places["placetype"];
                                    ;
                                    ?></span>
                                <span id="place-add-date"><?php echo $places["date"]; ?></span>
                            </h4>
                            <div id="place-main-area">
                                <p><?php echo (strlen($places["description"]) > 150) ? substr($places["description"], 0, 150) . ".." : $places["description"]; ?></p>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <!--<center>-->
                            <a href="*openplace~<?php echo $places["id"]; ?>~<?php echo $places["name"] . " " . $places["placetype"]; ?>" class="btn btn-sm" style="float: left; margin-right: 20px"><i class="fa fa-expand card-icon"></i></a>
                            <a class="btn btn-sm" style="float: left;"><i class="fa fa-heart card-icon"></i></a>
                            <a href="*share~this place comming from my app id = <?php echo $places["id"]; ?>" class="waves-effect btn-flat" style="float: right;"><i class="fa fa-share-alt card-icon"></i></a>
                            </center>
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