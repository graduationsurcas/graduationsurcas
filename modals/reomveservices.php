<!-- Modal -->
<div class="modal fade" id="remove_service_modal" tabindex="-1" role="dialog" aria-labelledby="remove_serviceprovider_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="remove_serviceprovider_modal_Label">
                    <i class="fa fa-file-text"></i>&nbsp;Remove Service
                </h4>
            </div>
            <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-remove-service">
                <div class="modal-body">
                    <div id="remove_place_modal_body_info">
                        <fieldset>
                            <center>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock">&nbsp;Enter Your Password </i>
                                    </span>
                                    <input type="password" 
                                           required=""
                                           id="remove-service-admin-pass"
                                           class="form-control">

                                </div>
                            </center>
                            <input type="hidden" id="remove-service-id">
                            <input type="hidden" id="remove-service-tr-id">
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="modal-form-result-text" id="remove_serviceprovider_modal_form_result" style="float: right;"></span>
                    <div class="text-left">
                        <button  id="remove-serviceprovider-modal-button" title="remove" class="btn btn-danger" type="submit">delete</i>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



