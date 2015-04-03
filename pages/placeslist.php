<?php
include_once '../include/auth.php';
include_once '../services/DB/dboperation.php';
include_once '../services/DB/config.php';
?>

<html lang="en">

    <head>
        <?php include_once '../include/headerlink.html'; ?>
    </head>

    <body>

        <div id="wrapper">

            <?php
            include_once '../include/navbar.php';
            ?>



            <div id="page-wrapper">
                <div class="container-fluid">

                    <?php
                                include_once '../controlpages/placeslist.php';
                    ?>
                   


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
            include_once '../include/fotterlink.html';
        ?>
        <script src="./js/places.js" type="text/javascript"></script>
        <script src="../js/placeslist.js" type="text/javascript"></script>
    </body>

</html>
