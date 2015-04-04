<!-- Modal -->
<div  class="modal fade" id="borrow_item_history_modal" tabindex="-1" role="dialog" aria-labelledby="borrow_item_history_modal_Label" aria-hidden="true">
    <div style="width: 95%;" class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="borrow_item_history_modal_Label">
                    <i id="borrow_return_modal_info">
                        <span class="fa fa-info-circle fa-2x">
                        </span>
                    </i>
                    <span>
                        <span id="borrow_item_history_modal_item_type">LAPTOP</span>
                        :
                        <span id="borrow_item_history_modal_item_name">Z01</span>
                    </span>
                </h4>
            </div>
            <div class="modal-body" id="borrowitemhistorybody">
                <div id="norecordemessage">
                    
                </div>
                <table id="borrowitemhistorytable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>BORROWER NAME</th>
                            <th>BORROW DATE</th>
                            <th>RETURN DATE</th>
                            <th>EFFECTIVE RETURN DATE</th>
                            <th>REPORT</th>
                        </tr>
                    </thead>
                    <tbody style="height: 50px;">
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <span class="form-model-result" id="borrow-item-history-modal-result"></span>
                <button type="button" id=""  class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>

        </div>
    </div>
</div>



