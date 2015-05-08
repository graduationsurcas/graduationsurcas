<?php
header('Content-Type: text/html; charset=utf-8');
try {
    include_once './server/config.php';
    include_once './server/appdboperations.php';
    $item = appdboperations::getItemInformation($_GET["id"]);
    ?>

    <html>
        <head>
            <?php
            require_once './includes/headers.html';
            ?>
            <link href="css/main.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>

            <!--            Array ( [itemid] => 209 [itemtypeid] => 2 [itemtype] => Furniture
                        [placeid] => 4 [placename] => Nizwa [placetype] => fort 
                        [itemname] => تطبيق إيثار [createdate] => 2015-04-25 
                        [description] => تم إنشاء هذا ر [locationlat] => 22.9332 
                        [locationlong] => 57.5302 )-->

            <section class="main-placeinformation-section">
                <div class="panel panel-default placeinformation-card">

                    <div class="panel-body">
                        <span><?php echo $item["itemtype"] ?></span>
                    </div>
                </div>
                <div class="panel panel-default placeinformation-card">

                    <div class="panel-body">
                        <p><?php echo $item["description"] ?></p>
                    </div>
                </div>
                <?php
                $itemimages = appdboperations::getItemImage($_GET["id"]);
                if (count($itemimages) > 0) {
                    for ($index = 0; $index < count($itemimages); $index++) {
                        ?>
                        <div class="panel panel-default placeinformation-card">
                            <div class="panel-image">
                                <center>
                                    <img style="max-width: 100%;" src="<?php echo $itemimages[$index]; ?>" class="panel-image-preview" />
                                </center>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>


                <div class="panel panel-default placeinformation-card">

                    <div class="panel-body">
                        <span style="float: left; margin-top: 3px;" id="place-address"><?php echo $item["address"] ?></span>
                        <span style="float: right;">
                            <a href="*openplace~<?php echo $item["placeid"]; ?>~<?php echo $item["placename"] . " " . $item["placetype"]; ?>" class="btn btn-sm"><i class="fa fa-flag card-icon"></i></a>
                            <a href="*map~<?php echo $item["locationlat"]; ?>~<?php echo $item["locationlong"]; ?>" class="btn btn-sm" style=""><i class="fa fa-map-marker"></i></a>
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
