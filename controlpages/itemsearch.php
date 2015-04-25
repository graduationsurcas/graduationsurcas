<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <span class="fa fa-map-marker"></span>
            &nbsp;Item search
        </h1>
    </div>
</div>


<!--search about place-->
<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="row">

            <div class="col-lg-7 col-md-7">
                <label class="form-title"><span class="fa fa-search"></span>&nbsp;search</label>
                <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-item-search">
                    <fieldset>
                        <div class="form-group input-group">
                            <input type="text" 
                                   required=""
                                   id="items-search-key"
                                   name="items-search-key"
                                   class="form-control">
                            <span class="input-group-btn">
                                <button title="search" class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                </button>
                                <span data-toggle="modal" data-target="#search_guide_modal" title="search guide" class="btn btn-default"><i class="fa fa-info"></i>
                                </span>
                            </span>
                        </div>
                    </fieldset>

                    <div class="form-message">
                        <label id="form-item-search-message"></label>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="row" id="form-item-search-result">






            </div>
        </div>
    </div>
</div>