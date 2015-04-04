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
                                <button title="search" class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                </button>
                                <span data-toggle="modal" data-target="#search_guide_modal" title="search guide" class="btn btn-default"><i class="fa fa-info"></i>
                                </span>
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
                
                
<!--                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="placessearch-card" id="placessearch-card-placename">Nizwa Fort</span>
                        </div>
                        <div class="panel-body">
                            <label class="placessearch-card-info">
                                <span class="placessearch-card-info-title" >
                                    Type&nbsp;:&nbsp;
                                </span>
                                <span class="placessearch-card-info-value">
                                    Fort
                                </span>
                            </label>
                            <label class="placessearch-card-info">
                                <span class="placessearch-card-info-title" >
                                    Add On&nbsp;:&nbsp;
                                </span>
                                <span class="placessearch-card-info-value">
                                    20/10/2015
                                </span>
                            </label>
                            <label class="placessearch-card-info">
                                <span class="placessearch-card-info-title" >
                                    Address&nbsp;:&nbsp;
                                </span>
                                <span class="placessearch-card-info-value">
                                    Oman Sur
                                </span>
                            </label>
                        </div>
                        <div class="panel-footer">
                            <center>
                                <span title="open on the map" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i></span>
                                <span title="descrption" class="btn btn-sm btn-warning "><i class="fa fa-file"></i></span>
                                <span title="edit place information" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></span>
                                <span title="remove" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></span>
                           
                            </center>
                        </div>
                    </div>
                </div>-->
                
                
                
            </div>
        </div>
    </div>
</div>