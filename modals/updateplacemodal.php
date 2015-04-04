<!-- Modal -->
<div class="modal fade" id="update_place_modal" tabindex="-1" role="dialog" aria-labelledby="update_place_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="update_place_modal_Label">
                    <i class="fa fa-file-text"></i>&nbsp;Update Place
                </h4>
            </div>
            <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="update-place">
                <div class="modal-body">
                    <div id="update_place_modal_body_info">
                        <fieldset>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-list">&nbsp;type</i>
                                </span>
                                <div class="placetypeselection">
                                    <select class="form-control"
                                        id="update-place-type"
                                        >
                                    <option value="1000" selected="false">  </option>
                                    <?php
                                    foreach (dboperation::getPlacesTypes() as $key => $value) {
                                        ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                <span  class="input-group-addon error-mark" id="new-place-type-error-mark"></span>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-edit">&nbsp;name</i>
                                </span>
                                <input required="" 
                                       id="update-place-name"
                                       type="text"
                                       class="form-control"
                                       placeholder="place name">
                                <span  class="input-group-addon error-mark" id="new-place-name-error" ></span>
                            </div>


                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-edit">&nbsp;address</i>
                                </span>
                                <input required="" 
                                       id="update-place-address"
                                       type="text"
                                       class="form-control"
                                       placeholder="place address">
                                <span  class="input-group-addon error-mark" id="new-place-address-error" ></span>
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker">&nbsp;location</i>
                                </span>
                                <input required="" 
                                       step="any"
                                       id="update-place-location-latitude"
                                       type="number"
                                       class="form-control"
                                       placeholder="Latitude">
                                <input required="" 
                                       step="any"
                                       id="update-place-location-Longitude"
                                       type="number"
                                       class="form-control"
                                       placeholder="Longitude">
                                <span title="open map" data-toggle="modal" data-target="#map_modal"  class="btn input-group-addon"><i class="fa fa-map-marker"></i>
                                </span>
                                <span  class="input-group-addon error-mark" id="new-place-location-h-error" ></span>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-edit">&nbsp;description</i>
                                </span>
                                <textarea 
                                    required=""
                                    class="form-control"
                                    rows="5"
                                    id="update-place-desc"
                                    ></textarea>
                                <span  class="input-group-addon error-mark" id="new-place-description" ></span>

                            </div>
                            <div class="form-group">
                                <label>display status &nbsp;&nbsp;</label>
                                <label class="radio-inline">
                                    <input type="radio" id="radio_1" name="update-place-view" value="1"> true
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="radio_0" name="update-place-view" value="0"> false
                                </label>
                            </div>
                            <input type="hidden" id="place-id">
                        </fieldset>
                    </div>
                </div>
            <div class="modal-footer">
                <span class="modal-form-result-text" id="update_place_modal_form_result" style="float: left;" id="">update result</span>
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>



