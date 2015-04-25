<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-table"></span>&nbsp;Item List</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table id="items-comments-list-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ITEM</th>
                            <th>USER</th>
                            <th>ADD DATE</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                        <?php
                        $selectamount = 25;
                        $commentslist = json_decode(dboperation::getItemsCommentsList(0, $selectamount));
                        $num = 1;
                        foreach ($commentslist->data as $key => $comment) {
                            ?>
                        <tr id="comment_tr_<?php echo $num; ?>">
                                <td><?php echo $num; ?></td>
                                <td><?php echo $comment->itemname ?></td>
                                <td><?php echo $comment->username ?></td>
                                <td><?php echo $comment->commdate ?></td>
                                <td>
                                    <?php
                                    if(strlen($comment->commtext) > 100){
                                        echo substr($comment->commtext, 0, 100);
                                        ?>
                                    <a onclick="itemcommentfunction.setcommentmodal('<?php echo $comment->commtext ?>')" data-toggle="modal" data-target="#item_comment_modal">[..]</a>
                                    <?php       
                                    }else{
                                        echo $comment->commtext;
                                    }
                                    ?>
                                </td>
                                <td ALIGN=center>
                                    <span onclick="itemcommentfunction.removecomment('<?php echo $comment->commid ?>', '<?php echo $num ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>
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
                            $commentcount = dboperation::itemsCommentTotalCount();
                            $pages = intval($commentcount) / $selectamount;
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

                                        onclick="itemcommentfunction.commentnextpage('<?php echo $selectfrom; ?>', '<?php echo $selectamount ?>')"
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