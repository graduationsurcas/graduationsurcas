<?php

include '../include/authpages.php';
include '../server/config.php';
include '../server/dboperation.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include_once '../include/headerlinkpages.html'; ?>
    </head>

    <body>

        <div id="wrapper">

            <?php
            include_once '../include/navbar.php';
            ?>



            <div id="page-wrapper">
                <div class="container-fluid">

                    <?php
                    include_once '../controlpages/sheararea.php';
                    ?>



                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
        include_once '../include/footerlinkspages.html';
        ?>
        <script src="../js/Chart.js" type="text/javascript"></script>
        <script src="../js/home.js" type="text/javascript"></script>
        <script src="../js/items.js" type="text/javascript"></script>
           <?php
        include_once '../include/footerlinkspages.html';
        include_once '../modals/shearareadelmodal.php';
        include_once '../modals/descptionmodal.html';

        ?>
        <script src="../js/sheararea.js" type="text/javascript"></script>


    </body>

</html>
