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
                font-size: 105%;
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
        </style>
    </head>
    <body >

        <?php
        $services = appdboperations::getServiceList($limit = 25);
        ?>

        <section class="main-places-section">
            <div class="panel-group" 
                 style="padding: 0px;"
                 id="accordion" 
                 role="tablist" 
                 aria-multiselectable="true">
                     <?php
                     for ($index = 0; $index < count($services); $index++) {
                         ?>
                <div class="panel place-card">
                            <div class="panel-body">
                                <span id="place-title"><?php echo $services[$index]["title"] ." ". TranslateClient::translate(null, $_GET["lang"], $services[$index]["type"]); ?></span>
                                <p>
                                     <?php 
                                     echo TranslateClient::translate(null, $_GET["lang"], $services[$index]["description"]);
                                     ?>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <div class="text-right">
                                        <span class="btn btn-sm card-icon">
                                            <!--*providerprofile~id~name-->
                                            <a href="*providerprofile~<?php echo $services[$index]["providerid"]; ?>~<?php echo $services[$index]["providername"]; ?>">
                                                <i class="fa fa-user"></i>
                                            </a>
                                        </span>
                                        <span class="btn btn-sm card-icon">
                                            <a href="*map~<?php echo $services[$index]["locationlat"]; ?>~<?php echo $services[$index]["locationlong"]; ?>">
                                                <i class="fa fa-map-marker"></i>
                                            </a>
                                        </span>
                                        <span class="btn btn-sm card-icon">
                                            <a href="*share~هذا التطبيق تمت برمجته بواسطة طلاب البرمجة">
                                                <i class="fa fa-share-alt"></i>
                                            </a>
                                        </span>
                                    </div>
                            </div>
                        </div>
                <?php
                    }
                    ?>



                </div>
        </section>


        <?php
        require_once './includes/footers.html';
        ?>
        <script src="materialize/js/materialize.min.js" type="text/javascript"></script>

    </body>
</html>