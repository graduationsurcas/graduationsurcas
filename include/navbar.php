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
        <a class="navbar-brand" href="index.php">Oman tourism guide</a>
    </div>

    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <span  data-toggle="modal" data-target="#notification_modal" class="btn btn-danger btn-sm">
                                <i class="fa fa-bell"></i>
                            </span>
        </li>
        <li class="dropdown">
            <a href="#" ><i class="fa fa-user"></i> <?php echo $_SESSION['login-admin-name']; ?></a>
        </li>
        <li class="dropdown">
            <a onclick="logout()" ><i class="fa fa-sign-out"></i></a>
        </li>
    </ul>



    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="home.php"><i class="fa fa-arrow-circle-o-right"></i> Home</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#placescolntrollcollapse"><i class="fa fa-fw fa-arrows-v"></i>&nbsp;Places<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="placescolntrollcollapse" class="collapse">
                    <li>
                        <a href="../pages/newplace.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;New Place</a>
                    </li>
                    <li>
                        <a href="../pages/placeslist.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;Places List</a>
                    </li>
                    <li>
                        <a href="../pages/placessearch.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;Places Search</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#itemscolntrollcollapse"><i class="fa fa-fw fa-cubes"></i>&nbsp;Items<i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="itemscolntrollcollapse" class="collapse">
                    <li>
                        <a href="../pages/newitems.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;New Item</a>
                    </li>
                    <li>
                        <a href="../pages/itemslist.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;Items List</a>
                    </li>
                    <li>
                        <a href="../pages/itemsearch.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;Items Search</a>
                    </li>
                    <li>
                        <a href="../pages/itemcomments.php"><span class="fa fa-arrow-circle-o-right"></span>&nbsp;Items Comments</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#servicecollapse"><i class="fa fa-fw fa-arrows-v"></i> services <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="servicecollapse" class="collapse">
                    <li>
                        <a href="../pages/service.php">services</a>
                    </li>
                    <li>
                        <a href="../pages/servicesrequests.php">services requests</a>
                    </li>
                    <li>
                        <a href="../pages/serviceproviders.php">service providers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../pages/sheararea.php"><i class="fa fa-fw fa-table"></i> share area</a>
            </li>
            <li>
                <a href="../pages/feedback.php"><i class="fa fa-fw fa-desktop"></i> users feedback</a>
            </li>
            <li>
                <a href="../pages/admin.php"><i class="fa fa-fw fa-desktop"></i> administration tools</a>
                
            </li>

        </ul>
        
    </div>
    <!-- /.navbar-collaps -->
</nav>
