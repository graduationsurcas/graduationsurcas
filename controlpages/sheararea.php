<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><i class="fa fa-share-alt-square"></i></span>&nbsp;Shear area</h1>
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
                            <th>User</th>
                            <th>Share Area desc</th>
                            <th>ADD DATE </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 25;
                        $placelist = json_decode(dboperation::getsheaareaist(0, $selectamount));
                        $num = 1;
                        foreach ($placelist->data as $key => $item) {
                            ?>
                        <tr id="item_list_tr_<?php echo $num;?>">
                            
                            
<!--                            $item['userid'] = $row['user_id'];
                $item['username'] = $row['user_name'];
                $item['shareareaid'] = $row['sharearea_id'];
                $item['sheareatext'] = $row['sharearea_text'];
                $item['shearareaid'] = $row['sharearea_user_id'];
                $item['shearareauserid'] = $row['sharearea_user_id'];
                $item['sheaareaadddate'] = $row['sharearea_add_date'];
                $item['shearareallocation'] = $row['sharearea_location'];-->
                                <td><?php echo $num; ?></td>
                                <td><?php echo $item->username ?></td>
                                <td><?php echo substr($item->sheareatext,0,30).'...'?></td>
                                <td><?php echo $item->sheaareaadddate ?></td>
                                <td>
                        <center>
                            
                         <?php
                            $desc = str_replace("'", "\'", $item->sheareatext);
                            
                            ?>
                            <span onclick="sheararealistfuntion.setdescriptionmodel('<?php echo $desc; ?>')" data-toggle="modal" data-target="#place_desc_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-file-text"></i>
                            </span>
                           
                            &nbsp;<span onclick="sheararealistfuntion.setremovemodel('<?php echo $item->shareareaid ?>', '<?php echo $num; ?>' )" data-toggle="modal" data-target="#remove_sharearea_modal" class="btn btn-danger btn-sm">
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