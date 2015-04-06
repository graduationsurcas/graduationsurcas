<!-- Modal -->
<div class="modal fade" id="search_guide_modal" tabindex="-1" role="dialog" aria-labelledby="search_guide_modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="search_guide_modal_Label">
                    <i class="fa fa-info-circle"></i>&nbsp;Search Guide
                </h4>
            </div>
            <div class="modal-body">
                <div id="search_guide_modal_body_info">
                    
                    <p>
                        you can search by use one of place characteristic's:
                    </p>
                    
                    <ul>
                        <li>
                            <label>type : </label>
                            <?php
                            foreach (dboperation::getPlacesTypes() as $key => $value) {
                                ?>
                                <span><?php echo $value; ?>,</span>
                                <?php
                            }
                            ?>
                        </li>
                        <li>
                            <label>name </label>
                        </li>
                        <li>
                            <label>address </label>
                        </li>
                        <li>
                            <label>add date :&nbsp;</label><span>year(2015-01-13), month(01), day(13)</span>
                        </li>
                        <li>
                            <label>description</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



