<!-- Modal -->
<div class="modal fade" id="update_serviceproviderinfo_modal" tabindex="-1" role="dialog" aria-labelledby="update_serviceproviderinfo_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="update_serviceproviderinfo_modal_Label">
                    <i class="fa fa-file-text"></i>&nbsp;Update Service Provider Information
                </h4>
            </div>
            <div class="modal-body">
                <div id="update_serviceproviderinfo_modal_body_info">
                    <fieldset>
                        <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="update-serviceproviderinfo">


                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user">&nbsp;name</i>
                                </span>
                                <input required="" 
                                       id="update-serviceproviderinfo-name"
                                       type="text"
                                       class="form-control"
                                       placeholder="service namerovider name">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i>&nbsp;@</i>
                                </span>
                                <input required="" 
                                       id="update-serviceproviderinfo-email"
                                       type="text"
                                       class="form-control"
                                       placeholder="service namerovider email">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone">&nbsp;phone</i>
                                </span>
                                <input required="" 
                                       id="update-serviceproviderinfo-phone"
                                       type="number"
                                       class="form-control"
                                       placeholder="service namerovider phone">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-list">&nbsp;account status</i>
                                </span>
                                <div class="accountstatusselection">
                                    <select class="form-control"
                                            id="update-serviceproviderinfo-status"
                                            >
                                        <option value="active">active</option>
                                        <option value="block">block</option>
                                    </select>
                                </div>
                            </div>
                            <span style="float: right;" class="modal-form-result-text" id="update-serviceproviderinfo-result"></span>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                        <hr>
                        <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="update-serviceproviderinfo-password">
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key">&nbsp;password</i>
                                </span>
                                <input required="" 
                                       step="any"
                                       id="update-serviceproviderinfo-password-pass"
                                       type="password"
                                       class="form-control"
                                       placeholder="new password">
                                <input required="" 
                                       step="any"
                                       id="update-serviceproviderinfo-password-repass"
                                       type="password"
                                       class="form-control"
                                       placeholder="retype new password">

                            </div>
                            <span class="modal-form-result-text" id="update-serviceproviderinfo-password-result" style="float: right;"></span>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>

                        <input type="hidden" id="update-serviceproviderinfo-id">
                    </fieldset>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



