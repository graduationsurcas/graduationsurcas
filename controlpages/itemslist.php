<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-table"></span>&nbsp;places list</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table id="items-list-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>PLACE</th>
                            <th>ADD DATE</th>
                            <th>IMAGE/'S</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 4;
                        $placelist = json_decode(dboperation::getItemsList(0, $selectamount));
                        $num = 1;
                        foreach ($placelist->data as $key => $item) {
                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $item->itemname ?></td>
                                <td><?php echo $item->itemtype ?></td>
                                <td><?php echo $item->itemplace ?></td>
                                <td><?php echo $item->itemadddate ?></td>
                                <td>
                        <center>
                            <span onclick="itemsListFunctions.itemsimagegallery(<?php echo $item->itemid ?>)" data-toggle="modal" data-target="#item_images_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-image"></i>
                            </span>
                        </center>
                        </td>
                        <td>
                        <center>
                            <span class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                            </span>
                            &nbsp;<span class="btn btn-danger btn-sm">
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
                            $itemscount = dboperation::itemsTotalCount();
                            $pages = intval($itemscount) / $selectamount;
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

                                        onclick="itemsListFunctions.itemsnextpage('<?php echo $selectfrom; ?>', '<?php echo $selectto ?>')"
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