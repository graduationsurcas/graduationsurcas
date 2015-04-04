
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-map-marker"></span>&nbsp;new places</h1>
    </div>
</div>

<!--new place form-->
<div class="row">
    <div class="col-lg-7 col-md-7">
        <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-add-new-places">
            <fieldset>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-list">&nbsp;type</i>
                    </span>
                    <select class="form-control"
                            id="new-place-type"
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
                    <span  class="input-group-addon error-mark" id="new-place-type-error-mark"></span>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;name</i>
                    </span>
                    <input required="" 
                           id="new-place-name"
                           name="new-place-name"
                           type="text"
                           class="form-control"
                           placeholder="place name">
                    <span  class="input-group-addon error-mark" id="new-place-name-error" ></span>
                </div>


                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;address</i>
                    </span>
                    <input required="" 
                           id="new-place-address"
                           name="new-place-address"
                           type="text"
                           class="form-control"
                           placeholder="place address">
                    <span  class="input-group-addon error-mark" id="new-place-address-error" ></span>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker">&nbsp;location</i>
                    </span>
                    <input required="" 
                           id="new-place-location-h"
                           name="new-place-location-latitude"
                           type="number"
                           class="form-control"
                           placeholder="Latitude"step="any" >
                    <input required="" 
                           id="new-place-location-v"
                           name="new-place-location-Longitude"
                           type="number"
                           class="form-control"
                           placeholder="Longitude" step="any" >
                    <span id="new-place-form-open-map-modale" title="open map" data-toggle="modal" data-target="#map_modal"  class="btn input-group-addon"><i class="fa fa-map-marker"></i>
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
                        id="new-place-desc"
                        name="new-place-desc"
                        ></textarea>
                    <span  class="input-group-addon error-mark" id="new-place-description" ></span>

                </div>
                <div class="form-group">
                    <label>display status &nbsp;&nbsp;</label>
                    <label class="radio-inline">
                        <input type="radio" name="new-place-view" id="new-place-view" value="1" checked> true
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="new-place-view" id="new-place-view" value="0"> false
                    </label>
                </div>


                <input class="btn  btn-success submit-button" type="submit" id="add-new-place" value="Add Place">
            </fieldset>

            <div class="form-message">
                <label id="form-add-new-places-message">

                </label>
            </div>
        </form>
    </div>
</div>






