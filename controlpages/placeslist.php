<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-table"></span>&nbsp;places list</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table id="places-list-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>ADDRESS</th>
                            <!--<th>location Latitude</th>-->
                            <th>ADD DATE</th>
                            <th>ACTION</th>

                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 30;
                        $placelist = json_decode(dboperation::getPlacesList(0, $selectamount));
                        $num = 1;
                        foreach ($placelist->data as $key => $object) {
                            ?>
                        <tr id="place_list_tr_<?php echo $num; ?>">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $object->name ?></td>
                                <td><?php echo $object->type ?></td>
                                <td><?php echo $object->address ?></td>
                                <td><?php echo $object->creatdate ?></td>
                                <td>
                        <center>
                            <span data-toggle="modal" data-target="#map_modal" onclick="PlaceOperations.setmapplacelocation('<?php echo $object->locationlat ?>', '<?php echo $object->locationlang ?>')"title="open on the map" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i></span>
                            <span onclick="PlaceOperations.setplacedesc('<?php echo $object->desc ?>')" data-toggle="modal" data-target="#place_desc_modal" title="descrption" class="btn btn-sm btn-warning "><i class="fa fa-file"></i></span>
                            <span onclick="PlaceOperations.setupdateplacemodelforminfo(
                                        '<?php echo $object->id ?>',
                                        '<?php echo $object->placetypeid ?>',
                                        '<?php echo $object->name ?>',
                                        '<?php echo $object->address ?>',
                                        '<?php echo $object->locationlat ?>',
                                        '<?php echo $object->locationlang ?>',
                                        '<?php echo $object->desc ?>',
                                        '<?php echo $object->view ?>'
                                        )" data-toggle="modal" data-target="#update_place_modal" title="edit place information" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></span>
                            <span onclick="PlaceOperations.setdeletplacemodelforminfo( '<?php echo $object->id ?>',  '<?php echo $num?>')" data-toggle="modal" data-target="#remove_place_modal" title="remove" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></span>

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
                            $placecount = dboperation::placeTotalCount();
                            $pages = intval($placecount) / $selectamount;
                            if (is_float($pages)) {
                                $pages = intval($pages + 1);
                            }
                            $selctfrom = 0;
                            $selectto = 0;
                            $roundnum = 1;

                            for ($index = 0; $index < $pages; $index++) {
                                $selectfrom = $selectto;
                                $selectto = $selectamount * $roundnum;
                                ?>
                                <li>
                                    <span 

                                        onclick="placesListFunctions.placesnextpage('<?php echo $selectfrom; ?>', '<?php echo $selectto ?>')"
                                        class="btn" style="border-radius: 0px;">
                                        <?php echo $index + 1; ?>
                                    </span>
                                </li>
                                <?php
                                $roundnum++;
                            }
                            ?>
                        </ul>
                    </nav>
                </center>
            </div>


        </div>
    </div>

</div>