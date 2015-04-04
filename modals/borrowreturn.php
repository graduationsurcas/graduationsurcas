<!-- Modal -->
<div class="modal fade" id="borrow_return_modal" tabindex="-1" role="dialog" aria-labelledby="borrow_return_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="borrow_return_modal_Label">
                    <i id="borrow_return_modal_info">
                        <span class="fa fa-edit fa-2x">
                        </span>
                    </i>
                    <span>
                        Borrow Return (  
                        <span id="borrow_return_modal_item_type">LAPTOP</span>
                        :
                        <span id="borrow_return_modal_item_name">Z01</span>
                        ),
                        <span id="borrow_return_modal_borrower_name">Gheith Hamood Ali Alrawai</span>
                    </span>
                </h4>
            </div>
            <form accept-charset="UTF-8"
                  role="form"
                  id="borrow_return_modal_form">
                <div class="modal-body">

                    <fieldset>
                        <label>
                            <div id="borrow_return_modal_info_result"></div>
                        </label>
                        <label>
                            borrow return report
                            <br>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-print"></i>
                                </div>
                                <textarea
                                    placeholder="return repotr"
                                    title="return repotr"
                                    style="resize: none; font-size: 18px"

                                    class="form-control"
                                    id="borrow_return_modal_return_report_text"
                                    rows="9"></textarea>
                            </div>
                        </label>
                        <input type="hidden" id="borrowitem_amaountid">
                        <input type="hidden" id="borrowitem_id">
                        <input type="hidden" id="tr_id">
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <span class="form-model-result" id="return-borrow-model-result"></span>
                    <button id="borrow_return_modal_return_report_submit_button" type="button" class="btn btn-success"><span id="submit-button-icon"><i  class="fa fa-cog"> </i></span><span>&nbsp;Complete</span></button>
                    <button type="button" id="borrow_return_modal_return_report_Close_button"  class="btn btn-danger" data-dismiss="modal">Close</button>
                  
                </div>
            </form>
        </div>
    </div>
</div>



