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
                color: #3F51B5;
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
        $sharearea = appdboperations::getShareAreaList($_GET["selectamount"]);
        ?>

        <section class="main-services-section">
            <div class="panel-group" 
                 style="padding: 0px;"
                 id="accordion" 
                 role="tablist" 
                 aria-multiselectable="true">
                     <?php
                     for ($index = 0; $index < count($sharearea); $index++) {
                         ?>
                <div class="panel place-card">
                        <div class="panel-body">
                            <p>
                                <?php
                                $description = TranslateClient::translate("en", $_GET["lang"], $sharearea[$index]["description"]);
                                echo $description;
                                ?>
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="text-right" style="margin: 0px; padding: 0px; float: right">
                                <span class="btn btn-sm card-icon">
                                    <a href="*share~<?php echo $title." ".$description; ?>"
                                       class="waves-effect" >
                                        <i class="fa fa-share-alt card-icon"></i>
                                    </a>
                                </span>
                            </div>
                            <br>
                        </div>
                    </div>
                    <?php
                }
                ?>

                
            </div>
        </section>

        <?php
        if(count($sharearea) == $_GET["selectamount"]){
            ?>
       
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
   
        <script type="text/javascript">
$("#loadmore-spinner").hide();
        </script>
    </body>
</html>