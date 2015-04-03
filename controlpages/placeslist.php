<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-table"></span>&nbsp;places list</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>ADDRESS</th>
<!--                            <th>location Latitude</th>
                            <th>location Longitude</th>-->
                            <th>ACTION</th>

                        </tr>
                    </thead>
                    <tbody id="places-list-table">
                        <?php
                        $selectamount = 25;
                        $placelist = json_decode(dboperation::getPlacesList(1, $selectamount));
                        $num = 1;
                        foreach ($placelist->data as $key => $object) {
                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $object->name ?></td>
                                <td><?php echo $object->type ?></td>
                                <td><?php echo $object->address ?></td>
                                <td><span class="btn btn-sm btn-warning">
                                        <span class="fa fa-file-text-o"></span>
                                    </span>
                                    <span class="btn btn-sm btn-primary ">
                                        <span class="fa fa-edit"></span>
                                    </span>
                                    <span class="btn btn-sm btn-danger ">
                                        <span class="fa fa-trash"></span>
                                    </span>
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
                                $selectfrom = $selectto + 1;
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