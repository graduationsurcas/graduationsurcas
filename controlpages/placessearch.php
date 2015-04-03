<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><span class="fa fa-map-marker"></span>&nbsp;places search</h1>
    </div>
</div>


<!--search about place-->
<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="row">

            <div class="col-lg-7 col-md-7">
                <label class="form-title"><span class="fa fa-search"></span>&nbsp;search</label>
                <form accept-charset="UTF-8" method="POST" class="forms" role="form" id="form-places-search">
                    <fieldset>
                        <div class="form-group input-group">
                            <input type="text" 
                                   required=""
                                   id="places-search-key"
                                   name="places-search-key"
                                   class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </fieldset>
                    <div class="form-message">
                        <label id="form-places-search-message"></label>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="row" id="form-places-search-result">

            </div>
        </div>
    </div>
</div>