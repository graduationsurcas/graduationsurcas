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

        <?php
        $services = appdboperations::getServiceList($_GET["selectamount"]);
        ?>

        <section class="main-services-section">
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
                            <span id="place-title">
                                <?php echo $services[$index]["title"] . " " . TranslateClient::translate("en", $_GET["lang"], $services[$index]["type"]); ?>
                            </span>
                            <p>
                                <?php
                                echo TranslateClient::translate("en", $_GET["lang"], $services[$index]["description"]);
                                ?>
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="text-left" style="margin: 0px; padding: 0px; float: left">
                                <span class="btn btn-sm card-icon">
                                    <a href="*share~هذا التطبيق تمت برمجته بواسطة طلاب البرمجة"
                                       class="waves-effect" >
                                        <i class="fa fa-share-alt card-icon"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="text-right" style="margin: 0px; padding: 0px; float: right">
                                <span class="btn btn-sm card-icon" style="margin-right: 5px;">
                                    <a href="*map~<?php echo $services[$index]["locationlat"]; ?>~<?php echo $services[$index]["locationlong"]; ?>">
                                        <i class="fa fa-map-marker card-icon"></i>
                                    </a>
                                </span>   
                                <span class="btn btn-sm card-icon">
                                    <a href="*providerprofile~<?php echo $services[$index]["providerid"]; ?>~<?php echo $services[$index]["providername"]; ?>" 
                                       >
                                        <i class="fa fa-user card-icon"></i>
                                    </a>
                                </span>
                            </div>
                            <br>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <input type="hidden" id="selectamount" value="<?php echo $_GET["selectamount"]; ?>">
                <input type="hidden" id="selectfrom" value="25">
                <input type="hidden" id="round" value="2">
                <input type="hidden" id="userlang" value="<?php echo $_GET["lang"]; ?>">


                
            </div>
        </section>

        <?php
        if(count($services) == $_GET["selectamount"]){
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

<script src="js/main.js" type="text/javascript"></script>
        <?php
        require_once './includes/footers.html';
        ?>
        <script src="js/jquery.tmpl.min.js" type="text/javascript"></script>
        <script src="js/jquery.tmplPlus.min.js" type="text/javascript"></script>
        <script src="js/serviceslist.js" type="text/javascript"></script>
        <script src="materialize/js/materialize.min.js" type="text/javascript"></script>
       <script id="ServicesListTemplate" type="text/x-jquery-tmpl">
             <div class="panel place-card">
                        <div class="panel-body">
                            <span id="place-title">
                                        ${title}&nbsp;${type}
                                        </span>
                            <p>
                                ${description}
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="text-left" style="margin: 0px; padding: 0px; float: left">
                                <span class="btn btn-sm card-icon">
                                    <a href="*share~هذا التطبيق تمت برمجته بواسطة طلاب البرمجة"
                                       class="waves-effect" >
                                        <i class="fa fa-share-alt card-icon"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="text-right" style="margin: 0px; padding: 0px; float: right">
                                <span class="btn btn-sm card-icon" style="margin-right: 5px;">
                                    <a href="*map~${locationlat}~${locationlong}">
                                        <i class="fa fa-map-marker card-icon"></i>
                                    </a>
                                </span>   
                                <span class="btn btn-sm card-icon">
                                    <a href="*providerprofile~${providerid}~${providername}" 
                                       >
                                        <i class="fa fa-user card-icon"></i>
                                    </a>
                                </span>
                            </div>
                            <br>
                        </div>
                    </div>
        </script>
        <script type="text/javascript">
$("#loadmore-spinner").hide();
        </script>
    </body>
</html>