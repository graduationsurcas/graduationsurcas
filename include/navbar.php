<?php

$navtitles = dboperation::getAllNanvTabTitle();
$notcount =dboperation::NotificationCount();
?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        <a class="navbar-brand" href="../pages/home.php">Oman tourism guide</a>
    </div>

    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#"  data-toggle="modal" data-target="#notification_modal"><span style="color: white" class="badge badge-notify"> <?php echo $notcount;?> <i class="fa fa-bell"></i></a>

        </li>
        <li class="dropdown">
            <a href="../pages/userprofile.php" ><i class="fa fa-user"></i> <?php echo $_SESSION['login-admin-name']; ?></a>
        </li>
        <li class="dropdown">
            <a onclick="logout()" ><i class="fa fa-sign-out"></i></a>
        </li>
    </ul>

    <div class="collapse navbar-collapse ">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="home.php"><i class="fa fa-arrow-circle-o-right"></i> Home</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#placescolntrollcollapse">
                    <i class="fa fa-fw fa-arrows-v"></i>&nbsp;<?php echo $navtitles["placetitle"]["title"];?><i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="placescolntrollcollapse" class="collapse">
                    <li>
                        <a href="../pages/newplace.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["placenew"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/placeslist.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["placelist"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/placessearch.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["placesearch"]["title"];?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#itemscolntrollcollapse"><i class="fa fa-fw fa-cubes"></i>&nbsp;<?php echo $navtitles["souvenirtitle"]["title"];?><i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="itemscolntrollcollapse" class="collapse">
                    <li>
                        <a href="../pages/newitems.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["newsouvenir"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/itemslist.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["listsouvenirtitle"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/itemsearch.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["searchsouvenir"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/itemcomments.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;<?php echo $navtitles["commintsouvenir"]["title"];?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#servicecollapse"><i class="fa fa-fw fa-arrows-v"></i> <?php echo $navtitles["servicestitle"]["title"];?><i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="servicecollapse" class="collapse">
                    <li>
                        <a href="../pages/service.php"><?php echo $navtitles["servicestitle"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/servicesrequests.php"><?php echo $navtitles["Servicesrequests"]["title"];?></a>
                    </li>
                    <li>
                        <a href="../pages/serviceproviders.php"><?php echo $navtitles["servicesproviders"]["title"];?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../pages/sheararea.php"><i class="fa fa-fw fa-table"></i> <?php echo $navtitles["sheararea"]["title"];?></a>
            </li>
            <li>
                <a href="../pages/feedback.php"><i class="fa fa-fw fa-desktop"></i><?php echo $navtitles["feedback"]["title"];?></a>
            </li>
            <li>
                <a href="../pages/admin.php"><i class="fa fa-fw fa-desktop"></i> administration tools</a>
                
            </li>

        </ul>
       
        <?php 
        include_once '../modals/notification.php';
         include_once '../modals/addnotification.php'; 
        
        ?>
    </div>
</nav>
