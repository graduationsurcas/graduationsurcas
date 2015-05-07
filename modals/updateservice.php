<!-- Modal -->
<div class="modal fade" id="update_item_modal" tabindex="-1" role="dialog" aria-labelledby="update_item_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="update_item_modal_Label">
                    <i class="fa fa-file-text"></i>&nbsp;Update Item
                </h4>
            </div>
            <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="update-item">
                <div class="modal-body">
                    <fieldset>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-list">&nbsp;Type</i>
                            </span>
                            <select class="form-control"
                                    id="update_item_type"
                                    >
                                <option value="1000" selected="false">  </option>
                                <?php
                                foreach (dboperation::getAllItemTypes() as $key => $value) {
                                    ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-edit">&nbsp;name</i>
                            </span>
                            <input required="" 
                                   id="update_item_name"
                                   type="text"
                                   class="form-control"
                                   placeholder="item name">
                        </div>
                        
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Description</i>
                            </span>
                            <textarea 
                                required=""
                                class="form-control"
                                rows="5"
                                id="update_item_description"
                                ></textarea>
                        </div>
                        <div class="form-group">
                            <label>display status &nbsp;&nbsp;</label>
                            <label class="radio-inline">
                                <input type="radio" name="update_item_view" id="radio_item_1" value="1" checked> true
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="update_item_view" id="radio_item_0" value="2"> false
                            </label>
                        </div>
                        <input type="hidden" id="update_item_id">
                        <input type="hidden" name="destination" id="destination" value="newitem"/>

                      
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <span class="modal-form-result-text" id="update_item_modal_form_result" style="float: left;">update result</span>
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



