<!-- Modal -->
<div class="modal fade" id="remove_place_modal" tabindex="-1" role="dialog" aria-labelledby="remove_place_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="remove_place_modal_Label">
                    <i class="fa fa-file-text"></i>&nbsp;Remove Place
                </h4>
            </div>
            <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-remove-place">
                <div class="modal-body">
                    <div id="remove_place_modal_body_info">
                        <fieldset>
                            <center>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock">&nbsp;Enter Your Password </i>
                                    </span>
                                    <input type="password" 
                                           required=""
                                           id="remove-place-admin-pass"
                                           class="form-control">

                                </div>
                            </center>
                            <input type="hidden" id="remove-place-id">
                            <input type="hidden" id="remove-place-tr-id">
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="modal-form-result-text" id="remove_place_modal_form_result" style="float: left;" id="">remove result</span>
                    <button  id="remove-place-modal-button" title="remove" class="btn btn-danger" type="submit">delete</i>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



