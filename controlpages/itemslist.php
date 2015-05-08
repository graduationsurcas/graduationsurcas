<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-table"></span>&nbsp;Item List</h1>
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
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 25;
                        $placelist = json_decode(dboperation::getItemsList(0, $selectamount));
                        $num = 1;
                        foreach ($placelist->data as $key => $item) {
                            ?>
                        <tr id="item_list_tr_<?php echo $num;?>">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $item->itemname ?></td>
                                <td><?php echo $item->itemtype ?></td>
                                <td><?php echo $item->itemplace ?></td>
                                <td><?php echo $item->itemadddate ?></td>
                                <td>
                        <center>
                            <?php
                            $desc = str_replace("'", "\'", $item->itemdesc);
//                            "omantourismguide~item~itemid~itemname"
                            $itemqrdata = "omantourismguide~item~".$item->itemid."~".$item->itemname;
                            ?>
                            <span data-toggle="modal" data-target="#qr_modal"
                                        onclick="itemsListFunctions.setItemQrModal('<?php echo $itemqrdata ?>',
                                        '<?php echo $item->itemname?>')" title="QR" 
                            class="qr-button btn btn-sm btn-default"><i class="fa fa-qrcode"></i></span>
                            <span onclick="itemsListFunctions.setdescriptionmodel('<?php echo $desc ?>')" data-toggle="modal" data-target="#place_desc_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-file-text"></i>
                            </span>
                            <span onclick="itemcommentfunction.setsingleitemcomment('<?php echo $item->itemid?>', '25', '0', 1)"  data-toggle="modal" data-target="#item_comments_list_modal" class="btn btn-primary btn-sm">
                                <i class="fa fa-comments"></i>
                            </span>
                            <span onclick="itemsListFunctions.itemsimagegallery(<?php echo $item->itemid ?>)" 
                                  data-toggle="modal" data-target="#item_images_modal"
                                  class="btn btn-default btn-sm">
                                <i class="fa fa-image"></i>
                            </span>
                            
                            <span onclick="itemsListFunctions.setupdateitemmodel(
                                            '<?php echo $item->itemid ?>',
                                            '<?php echo $item->itemplaceid ?>',
                                            '<?php echo $item->itemtypeid ?>',
                                            '<?php echo $item->itemname ?>',
                                            '<?php echo $desc ?>',
                                            '<?php echo $item->itemstatusview ?>'
                                            )" data-toggle="modal"
                                  data-target="#update_item_modal"
                                  class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </span>
                            &nbsp;<span onclick="itemsListFunctions.setremovemodel('<?php echo $item->itemid ?>', '<?php echo $num; ?>' )" data-toggle="modal" data-target="#remove_item_modal" class="btn btn-danger btn-sm">
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
                            $selectfrom = 0;
                            $selectto = $selectamount;
                            $roundnum = 1;
                            

                            for ($index = 0; $index < $pages; $index++) {
                                
                                ?>
                                <li>
                                    <span 

                                        onclick="itemsListFunctions.itemsnextpage('<?php echo $selectfrom; ?>', '<?php echo $selectamount ?>')"
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