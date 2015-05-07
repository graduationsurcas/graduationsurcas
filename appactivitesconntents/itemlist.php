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
        <style>
            #place-title{
                font-size: 100%;
                font-weight: 600;
                color: #2196F3;
            }
            .card-icon{
                color: #03A9F4;
            }
        </style>
    </head>
    <body >


        <section class="main-places-section">

            <?php
            $itemlist = appdboperations::getItemsList(250);

            foreach ($itemlist as $item) {
                ?>
                <div class="place-card">
                    <div class="panel panel-default" >
                        <div class="panel-body">
                            <h4>
                                <span  id="place-title"><?php
                                    echo $item["name"];
                                    ;
                                    ?></span>
                                <span id="place-add-date"><?php echo $item["date"]; ?></span>
                            </h4>
                            <div id="place-main-area">
                                <p><?php echo (strlen($item["description"]) > 150) ? substr($item["description"], 0, 150) . ".." : $item["description"]; ?></p>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <!--<center>-->
                            <a href="*openitem~<?php echo $item["id"]; ?>~<?php echo $item["name"]; ?>" class="btn btn-sm" style="float: left; margin-right: 20px"><i class="fa fa-expand card-icon"></i></a>
                            <a class="btn btn-sm" style="float: left;"><i class="fa fa-heart card-icon"></i></a>
                            <a href="*share~this item comming from my app id = <?php echo $item["id"]; ?>" class="waves-effect btn-flat" style="float: right;"><i class="fa fa-share-alt card-icon"></i></a>
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