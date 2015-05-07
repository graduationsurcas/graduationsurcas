
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><span class="fa fa-map-marker"></span>&nbsp;New places</h1>
    </div>
</div>

<!--new place form-->
<div class="row">
    <div class="col-lg-7 col-md-7">
        <form accept-charset="UTF-8" 
              method="POST" 
              enctype="multipart/form-data" 
              class="forms" 
              role="form"
              id="form-add-new-places">
            <fieldset>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-list">&nbsp;Type</i>
                    </span>
                    <select class="form-control"
                            id="new-place-type"
                            name="new-place-type"
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

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Name</i>
                    </span>
                    <input required="" 
                           id="new-place-name"
                           name="new-place-name"
                           type="text"
                           class="form-control"
                           placeholder="place name">
                </div>


                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Address</i>
                    </span>
                    <input required="" 
                           id="new-place-address"
                           name="new-place-address"
                           type="text"
                           class="form-control"
                           placeholder="place address">
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker">&nbsp;Location</i>
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
                </div>
                
                
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-image">&nbsp;Images</i>
                    </span>
                    <input 
                        class="form-control"
                        name="file[]" 
                        type="file" 
                        id="file"/>
                    <input type="button"
                           class="form-control btn btn-default"
                           id="add_more"
                           class="upload"
                           value="Add More Image"/>
                  
                </div>
                
                
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Description</i>
                    </span>
                    <textarea 
                        required=""
                        class="form-control"
                        rows="5"
                        id="new-place-desc"
                        name="new-place-desc"
                        ></textarea>
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

                
            <input type="hidden" name="destination" id="destination" value="enternewplace"/>
                <input class="btn  btn-success submit-button" type="submit" id="add-new-place" value="Add Place">
            </fieldset>

            <div class="form-message">
                <label id="form-add-new-places-message">

                </label>
            </div>
        </form>
    </div>
</div>






