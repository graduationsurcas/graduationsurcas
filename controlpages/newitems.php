
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><span class="fa fa-cube"></span>&nbsp;Items</h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-7 col-md-7">

        <form accept-charset="UTF-8" 
              method="POST" 
              enctype="multipart/form-data" 
              class="forms" 
              role="form"
              id="form_add_new_item">
            <fieldset>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-list">&nbsp;Place</i>
                    </span>
                    <select class="form-control"
                            name="new_item_place"
                            >
                        <option value="1000" selected="false">  </option>
                        <?php
                        foreach (dboperation::getAllPlaces() as $row) {
                            ?>
                            <option value="<?php echo $row["place_id"]; ?>"><?php echo $row["place_name"] . " " . $row["type"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>

                </div>
                
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-list">&nbsp;Type</i>
                    </span>
                    <select class="form-control"
                            name="new_item_type"
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
                           name="new_item_name"
                           type="text"
                           class="form-control"
                           placeholder="item name">
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
                        name="new_item_description"
                        ></textarea>
                </div>
                <div class="form-group">
                    <label>display status &nbsp;&nbsp;</label>
                    <label class="radio-inline">
                        <input type="radio" name="new_item_view" id="new_item_view" value="1" checked> true
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="new_item_view" id="new_item_view" value="2"> false
                    </label>
                </div>
                
                <input type="hidden" name="destination" id="destination" value="newitem"/>
                
                <input class="btn  btn-success submit-button" type="submit"  value="Add Item">
                <i class="fa fa-spinner fa-spin submit-form-spinner" id="new_item_form_spinner"></i>
            </fieldset>

            <div class="form-message">
                <label id="form-add-new-item-message"></label>
            </div>
        </form>
    </div>
</div>


