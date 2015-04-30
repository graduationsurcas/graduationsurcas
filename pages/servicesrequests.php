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
                    include_once '../controlpages/addnewservicerequests.php';
                    ?>



                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
        include_once '../include/footerlinkspages.html';
        include_once '../modals/serviceproviderinfo.php';
        include_once '../modals/updateserviceproviderinfo.php';
        include_once '../modals/removesetserviceprovidermodal.php';
        include_once '../modals/servicerequestinfo.php';
        include_once '../modals/mapmodel.php';
        ?>

        <script src="../js/services.js" type="text/javascript"></script>
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
        type="text/javascript"></script>
        <script src="../js/map.js" type="text/javascript"></script>
    </body>

</html>
