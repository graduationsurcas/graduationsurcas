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
 <span >view</span>

 


            <div id="page-wrapper">
                <div class="container-fluid">

                    <?php
                    include_once '../controlpages/itemslist.php';
                    ?>



                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
        include_once '../include/footerlinkspages.html';
        include_once '../modals/itemimagesmodal.php';
        include_once '../modals/descptionmodal.html';
        include_once '../modals/removeitemmodel.php';
        include_once '../modals/updateitem.php';
        include_once '../modals/QRmodal.php';
        include_once '../modals/itemcommentslist.php';
        include_once '../modals/itemcomment.html';
        ?>
        <script src="../js/items.js" type="text/javascript"></script>
    </body>

</html>
