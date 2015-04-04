<?php
include_once './include/auth.php';
include './server/dboperation.php';
include './server/config.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include_once './include/headerlink.html'; ?>
    </head>

    <body>

        <div id="wrapper">



            <?php
            include_once './include/navbar.php';
            ?>



            <div id="page-wrapper">
                <div class="container-fluid">

                    <?php
                    include_once './page/status.php';
                    ?>



                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php
        include_once 'include/fotterlink.html';
        ?>

    </body>

</html>
