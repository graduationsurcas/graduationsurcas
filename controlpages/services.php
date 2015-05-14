<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-plus-square"></span>&nbsp;service</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table id="servicerequest-list-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>User NAME</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 25;
                        $servicerequest = json_decode(dboperation::getServicesList(0, $selectamount));
                        $num = 1;
                        foreach ($servicerequest->data as $key => $service) {
//                            {"id":"161","admin":"2","loclat":"196.584","loclan":"158.588",
//                                    "dec":"servicequest","adddate":"2015-05-01 13:55:00",
//                                    "prate":"0","nrate":"0","status":"0","title":"service request",
//                                    "userid":"161","username":"user name 111","desc":"0"}
                            ?>
                            <tr id="service_list_tr_<?php echo $num; ?>">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $service->title ?></td>
                                <td><?php echo $service->username ?></td>
                                <td><?php echo ($service->status == "true") ? "block" : "active";   ?></td>
                                <td>
                        <center>
                            
                            <span onclick="addnewservicesrequest.setprofiderinfomodale('<?php echo $service->userid ?>')" data-toggle="modal" data-target="#serviceprovider_info_modal" class="btn btn-primary btn-sm">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            $desc = str_replace("'", "\'", $service->desc);
                            ?>
                            <span onclick="addnewservicesrequest.setservicerequestmodelinf(
                                                '<?php echo $service->title ?>',
                                                '<?php echo $service->username ?>',
                                                '<?php echo $service->dec ?>',
                                                '<?php echo $service->adddate ?>'
                                                )" data-toggle="modal" data-target="#servicerequest_info_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-info-circle"></i>
                            </span>
                            <span data-toggle="modal" 
                                  data-target="#map_modal" 
                                  onclick="addnewservicesrequest.setmapplacelocation('<?php echo $service->loclat ?>', '<?php echo $service->loclan ?>')"
                                  class="btn btn-default btn-sm">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <span onclick="servicesFunctions.setremovesetservice('<?php echo $service->serviceid ?>', '<?php echo $num ?>')" data-toggle="modal" data-target="#remove_service_modal" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </span>
                        </center>
                        </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    ?>

                    </tbody>

                </table>
            </div>
            <div class="panel-footer">
                <center>


                    <nav>
                        <ul class="pagination">
                            <?php
                            $count = dboperation::ServiceRequestsTotalCount();
                            $pages = intval($count) / $selectamount;
                            if (is_float($pages)) {
                                $pages = intval($pages + 1);
                            }
                            $selectfrom = 0;
                            $selectto = $selectamount;
                            $roundnum = 1;


                            for ($index = 0; $index < $pages; $index++) {
                                ?>
                                <li>
                                    <span 

                                        onclick="addnewservicesrequest.servicerequestsxtpage('<?php echo $selectfrom; ?>', '<?php echo $selectamount ?>')"
                                        class="btn" style="border-radius: 0px;">
                                        <?php echo $index + 1; ?>
                                    </span>
                                </li>
                                <?php
                                $roundnum++;
                                $selectfrom = $selectto;
                                $selectto = $selectamount * $roundnum;
                            }
                            ?>
                        </ul>
                    </nav>
                </center>
            </div>


        </div>
    </div>

</div>