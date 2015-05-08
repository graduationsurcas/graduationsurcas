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
                    if($_SESSION['root-admin-sign-in'] == false){
                        include_once '../controlpages/adminlogin.php';
                    }else{
                        include_once '../controlpages/home.php';
                    }
                    
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
        
        <script src="../js/adminlogin.js" type="text/javascript"></script>

    </body>

</html>
