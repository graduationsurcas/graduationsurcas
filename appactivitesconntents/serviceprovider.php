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
                border: none;
            }
            .panel{
                border-radius: 0px;
            }
            .fixed {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 999;
                width: 100%;
                max-height: 25%;
            }
            .scrollit {
                margin-top: 110px;
                max-height: max-content;
            }
            #thumbs-down{
                color: #ff6666;
            }
            #thumbs-up{
                color: #66cc00;
            }
        </style>
    </head>
    <body >





        <section class="main-places-section">
            <div class="fixed">
                <div class="panel">
                    <div class="panel-body">
                        <!--( [useservice_name] => Khalide Algabri [useservice_email] =>
                            2010493122@gmail.com [positive_rate] => 0 [negative_rate] => 0
                            [useservice_phone] => 98752879 [useservice_add_date] => 2015-04-30 02:37:53 
                            [account_status] => 0 )-->
                        <?php
                        $serviceprovider = appdboperations::getServiceProviderInformation(1);
                        ?>
                        <h4><?php echo $serviceprovider["useservice_name"]; ?></h4>
                        <div class="text-left" style="float: left">
                            <i class="fa fa-phone"></i>
                            <i class="fa">&nbsp;<?php echo $serviceprovider["useservice_phone"]; ?></i>
                        </div>
                        <div class="text-right"  style="float: right">
                            <a class="btn btn-sm card-icon" id="thumbs-up">
                                <i class="fa fa-thumbs-up">&nbsp;<?php echo $serviceprovider["positive_rate"]; ?></i>
                            </a>
                            <a class="btn btn-sm card-icon" id="thumbs-down">
                                <i class="fa fa-thumbs-down" >&nbsp;<?php echo $serviceprovider["negative_rate"]; ?></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scrollit">

                <?php
                $services = appdboperations::getServiceListByProvider(25, 1);
                ?>
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
                                <span id="place-title"><?php echo $services[$index]["title"] ." ". $services[$index]["type"]; ?></span>
                                <p>
                                     <?php 
                                     echo TranslateClient::translate(null, $_GET["lang"], $services[$index]["description"]);
                                     ?>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <div class="text-right">
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
            </div>
        </section>


        <?php
        require_once './includes/footers.html';
        ?>
        <script src="materialize/js/materialize.min.js" type="text/javascript"></script>
        <script type="text/javascript">
//            $(document).ready(function (){
//                var h = $(".fixed").height() + 10;
//                $(".scrollit").css("margin-top", h);
//            });
        </script>
    </body>
</html>

