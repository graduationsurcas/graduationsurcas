<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-plus-square"></span>&nbsp;add new service requests</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table id="serviceproviders-list-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>PROVIDER NAME</th>
                            <th>TYPE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 25;
                        $servicerequestlist = json_decode(dboperation::getServiceRequestsList(0, $selectamount));
                        $num = 1;
                        foreach ($servicerequestlist->data as $key => $request) {
                            ?>
                            <!--                        [{"id":"1","title":"Alafia ",
                                                    "providername":"user name 0","providerid":"50",
                                                    "servicerequesttypeid":"2","servicerequesttypename":"resturant",
                                                    "locationlat":"10.5979","locationlang":"10.5945",
                                                    "desc":"hgyghg yutyu' ygyty ty ghj","createdate":"2015-04-30"}]-->
                            <tr id="serviceprovider_list_tr_<?php echo $num; ?>">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $request->title ?></td>
                                <td><?php echo $request->providername ?></td>
                                <td><?php echo $request->servicerequesttypename ?></td>
                                <td>
                        <center>
                            <span onclick="addnewservicesrequest.setprofiderinfomodale('<?php echo $request->id ?>')" data-toggle="modal" data-target="#serviceprovider_info_modal" class="btn btn-primary btn-sm">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            $desc = str_replace("'", "\'", $request->desc);
                            ?>
                            <span onclick="addnewservicesrequest.setservicerequestmodelinf(
                                        '<?php echo $request->title ?>',
                                        '<?php echo $request->providername ?>',
                                        '<?php echo $desc ?>',
                                        '<?php echo $request->createdate ?>'
                                        )" data-toggle="modal" data-target="#servicerequest_info_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-info-circle"></i>
                            </span>
                            <span data-toggle="modal" 
                                  data-target="#map_modal" 
                                  onclick="addnewservicesrequest.setmapplacelocation('<?php echo $request->locationlat ?>', '<?php echo $request->locationlang ?>')"
                                  class="btn btn-default btn-sm">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <span onclick="servicesFunctions.setserviceproviderupdatemodalinfo()" data-toggle="modal"
                                  data-target="#update_serviceproviderinfo_modal"
                                  class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i>
                            </span>
                            <span onclick="servicesFunctions.setremovesetserviceprovidermodalinf()" data-toggle="modal" data-target="#remove_serviceprovider_modal" class="btn btn-danger btn-sm">
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

                                        onclick="servicesFunctions.serviceprovidernextpage('<?php echo $selectfrom; ?>', '<?php echo $selectamount ?>')"
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