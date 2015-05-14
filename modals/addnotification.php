<!-- Modal -->

<div class="modal fade" id="add_notification_modal"
     tabindex="-1" role="dialog"
     aria-labelledby="item_comments_list_modal_Label"
     aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="item_comments_list_modal_Label">
                    <i class="fa fa-comment"></i>&nbsp;New Memo
                </h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                       <form accept-charset="UTF-8" 
                              method="POST" 
                              enctype="multipart/form-data" 
                              class="forms" 
                              role="form"
                              id="form-new-notification">
                    <div class="panel-body">
                        
                      
                        
                          <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Memo</i>
                    </span>
                    <textarea 
                        required=""
                        class="form-control"
                        rows="5"
                        id="add-new-notification"
                        name="add-new-notification"
                        ></textarea>
                </div>

                   <div class="form-message">
                                <label id="form-add-new-places-message">

                                </label>
                            </div>
                           
                    </div>
                     
                    <div class="panel-footer">
                     <input class="btn  btn-success submit-button" type="submit" id="add-new-notif" value="Add Memos">

                    </div>
  </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
           
        </div>
    </div>
</div>



