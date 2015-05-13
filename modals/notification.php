<!-- Modal -->
<div class="modal fade" id="notification_modal"
     tabindex="-1" role="dialog"
     aria-labelledby="item_comments_list_modal_Label"
     aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="item_comments_list_modal_Label">
                    <i class="fa fa-comment"></i>&nbsp;Memos
                </h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    
                    <div class="panel-body">
                        Today Memos
                    
                               <?php
                                $selectamount = 25;
                                $notification = dboperation::getallNotification();
                                $num = 1;
                                if(count($notification)>0){
                                    ?>
                        <table id="items-list-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>added by</th>
                                    <th>Notification</th>
                                  
                                </tr>
                            </thead>
                            <tbody >
                        <?php
                        $index = 1;
                                    foreach ($notification as $notif) {
                                    ?>
                                    <tr id="item_list_tr_<?php echo $num; ?>">
                                        <td><?php echo $index; ?></td>
                                        <td><?php echo $notif["admin_name"] ?></td>
                                        <td><?php echo $notif["noti_text"]; ?></td>
                                    </tr>
                                    <?php
                                    $index++;
                                }
                                ?>
                                     </tbody>

                        </table>
                                    <?php
                                }
                                else {
                                    echo '<h1  style="text-transform: uppercase color:green"><i class="fa fa-warning"></i> No Memos</h1>';       
                                }
                                
                                ?>

                           
                    </div>
                    <div class="panel-footer">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_notification_modal">Add Memo</button>

                        </center>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



