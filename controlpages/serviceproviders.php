<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-truck"></span>&nbsp;service providers</h1>
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
                            <th>NAME</th>
                            <th>CREATE Date</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 25;
                        $serviceproviderslist = json_decode(dboperation::getServiceProvidersList(0, $selectamount));
                        $num = 1;
                        foreach ($serviceproviderslist->data as $key => $userprovider) {
                            ?>
                        
                        <tr id="serviceprovider_list_tr_<?php echo $num;?>">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $userprovider->name ?></td>
                                <td><?php echo $userprovider->createdate ?></td>
                                <td><?php echo ($userprovider->blockstatus == "true")? "block" : "active" ?></td>
                                <td>
                        <center>
                            <span onclick="servicesFunctions.setserviceprovidermodalinfo(
                                        '<?php echo $userprovider->name ?>',
                                        '<?php echo $userprovider->email ?>',
                                        '<?php echo $userprovider->phone ?>',
                                        '<?php echo $userprovider->createdate ?>',
                                        '<?php echo $userprovider->positiveevaluation ?>',
                                        '<?php echo $userprovider->negativeevaluation ?>',
                                        '<?php echo ($userprovider->blockstatus == "true")? "block" : "active" ?>'
                                        )" data-toggle="modal" data-target="#serviceprovider_info_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-info-circle"></i>
                            </span>
                             <span onclick="servicesFunctions.setserviceproviderupdatemodalinfo(
                                        '<?php echo $userprovider->id ?>',
                                        '<?php echo $userprovider->name ?>',
                                        '<?php echo $userprovider->email ?>',
                                        '<?php echo $userprovider->phone ?>',
                                        '<?php echo ($userprovider->blockstatus == "true")? "block" : "active" ?>'
                                        )" data-toggle="modal"
                                  data-target="#update_serviceproviderinfo_modal"
                                  class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                             </span>
                            <span onclick="servicesFunctions.setremovesetserviceprovidermodalinf('<?php echo $userprovider->id ?>', '<?php echo $num ?>')" data-toggle="modal" data-target="#remove_serviceprovider_modal" class="btn btn-danger btn-sm">
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
                            $count = dboperation::serviceProvidersTotalCount();
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