<?php
include_once './server/config.php';
include_once './server/appdboperations.php';
?>

<html>
    <head>
        <?php
        require_once './includes/headers.html';
        ?>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >


        <section class="main-places-section">

            <?php
            $places = appdboperations::getPlacesList(250);

            foreach ($places as $places) {
                ?>
                <div class="place-card">
                    <div class="panel panel-default" >
                        <div class="panel-body">
                            <h4>
                                <span id="place-title"><?php echo $places["name"]; ?></span>
                                <span id="place-add-date"><?php echo $places["date"]; ?></span>
                            </h4>
                            <div id="place-main-area">
                                <p><?php echo (strlen($places["description"]) > 150)? substr($places["description"], 0, 150).".." : $places["description"]; ?></p>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <!--<center>-->
                                <a href="*openplace~<?php echo $places["id"]; ?>~<?php echo $places["name"] . " " . $places["placetype"]; ?>" class="btn btn-sm" style="float: left; margin-right: 20px"><i class="fa fa-expand card-icon"></i></a>
                                <a class="btn btn-sm" style="float: left;"><i class="fa fa-heart card-icon"></i></a>
                                <a href="*share~this place comming from my app id = <?php echo $places["id"]; ?>" class="btn btn-sm" style="float: right;"><i class="fa fa-share-alt card-icon"></i></a>
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
    </body>
</html>