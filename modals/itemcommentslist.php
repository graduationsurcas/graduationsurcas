<!-- Modal -->
<div class="modal fade" id="item_comments_list_modal"
     tabindex="-1" role="dialog"
     aria-labelledby="item_comments_list_modal_Label"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="item_comments_list_modal_Label">
                    <i class="fa fa-comment"></i>&nbsp;Comments
                </h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">

                        <div id="nocomment-message">
                            <center>
                                <h1  style="text-transform: uppercase"><i class="fa fa-warning"></i> No Comments For This Item</h1>
                            </center>
                        </div>

                        <table id="item-comments-modal-list-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>USER</th>
                                    <th>ADD DATE</th>
                                    <th>Comment</th>
                                    <th></th>
                                </tr>
                            </thead>


                            <tbody>

                            </tbody>



                        </table>
                    </div>
                    <div class="panel-footer">
                        <center>


                            <nav>
                                <ul class="pagination" id="item-comments-modal-pagination">

                                </ul>
                            </nav>
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



