<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><i class="fa fa-users"></i></span>&nbsp;Users Feedback</h1>
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
                            <th>User Feedback</th>
                            <th>ADD DATE </th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $selectamount = 25;
                        $placelist = json_decode(dboperation::getuserfeedbacllist(0, $selectamount));
                        $num = 1;
                        foreach ($placelist->data as $key => $item) {
                            ?>
                        <tr id="item_list_tr_<?php echo $num;?>">
                            
<!--                            $item['username'] = $row['user_name'];
                $item['userid'] = $row['user_id'];
                $item['feedbackid'] = $row['feadback_id'];
                $item['feedbackuserid'] = $row['feadback_user_id'];
                $item['feedbackadddate'] = $row['feadback_add_date'];
                $item['feedbacktext'] = $row['feadback_text'];-->
                                <td><?php echo $num; ?></td>
                                <td><?php echo $item->username ?></td>
                                <td><?php echo substr($item->feedbacktext,0,30).'...' ?></td>
                                <td><?php echo $item->feedbackadddate ?></td>
                                <td>
                        <center>
                            
                         <?php
                            $desc = str_replace("'", "\'", $item->feedbacktext);
                            
                            ?>
                            <span onclick="feedbackfuntion.setdescriptionmodel('<?php echo $desc; ?>')" data-toggle="modal" data-target="#place_desc_modal" class="btn btn-warning btn-sm">
                                <i class="fa fa-file-text"></i>
                            </span>
                           
                            &nbsp;<span onclick="feedbackfuntion.setremovemodel('<?php echo $item->feedbackid ?>', '<?php echo $num; ?>' )" data-toggle="modal" data-target="#remove_item_modal" class="btn btn-danger btn-sm">
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