<?php
$navtitles = dboperation::getAllNanvTabTitle();
?>


<div class="row ">
    <div class="col-lg-12">
        <h1 class="page-header" style="text-transform: uppercase"><i class="fa fa-share-alt-square"></i></span>&nbsp;Admin Tools</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <ul class="nav nav-tabs nav nav-pills">
                    <li class="nav active"><a href="#admintab" data-toggle="tab"><i class="fa fa-user-plus"></i> Admin</a></li>
                    <li class="nav"><a href="#placetap" data-toggle="tab"><i class="fa fa-street-view"></i> Place Type </a></li>
                    <li class="nav"><a href="#itemtap" data-toggle="tab"><i class="fa fa-bullseye"></i> Souvenirs Type</a></li>
                    <li class="nav"><a href="#servicetab" data-toggle="tab"><i class="fa fa-server"></i> Services Type</a></li>
                    <li class="nav"><a href="#constanttab" data-toggle="tab"><i class="fa fa-flag"></i> Application Constant </a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" style="margin-top: 15px;">
                    <div class="tab-pane fade in active" id="admintab">
                        <form accept-charset="UTF-8" 
                              method="POST" 
                              enctype="multipart/form-data" 
                              class="forms" 
                              role="form"
                              id="form-add-new-admin">
                            <fieldset>

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-list">&nbsp;Type</i>
                                    </span>
                                    <select class="form-control"
                                            id="new-admin-type"
                                            name="new-admin-type"
                                            >
                                        <option value="1000" selected="false">  </option>
                                        <?php
                                        foreach (dboperation::getadminTypes() as $key => $value) {
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
                                           id="new-admin-name"
                                           name="new-admin-name"
                                           type="text"
                                           class="form-control"
                                           placeholder="admin name">

                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">@&nbsp;Email</i>
                                    </span>
                                    <input required="" 
                                           id="new-admin-email"
                                           name="new-admin-email"
                                           type="text"
                                           class="form-control"
                                           placeholder="admin email">

                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Password</i>
                                    </span>
                                    <input required="" 
                                           id="new-admin-password"
                                           name="new-admin-password"
                                           type="password"
                                           class="form-control"
                                           placeholder="admin password">

                                </div>
                                <div class="form-group input-group">

                                </div>
                                <input class="btn  btn-success submit-button" type="submit" id="add-new-admin" value="Add Admin">
                            </fieldset>

                            <div class="form-message">
                                <label id="form-add-new-admin-message"></label>

                            </div>

                        </form>
                        Available Admin :
                        <table id="items-list-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>Email</th>
                                    <th>Create Date</th>
                                    <th>Level</th>

                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                $selectamount = 25;
                                $placelist = json_decode(dboperation::getalladmin(0, $selectamount));
                                $num = 1;
                                foreach ($placelist->data as $key => $admin) {
                                    ?>
                                    <tr id="item_list_tr_<?php echo $num; ?>">
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $admin->adminname ?></td>
                                        <td><?php echo $admin->adminemail ?></td>
                                        <td><?php echo $admin->admincreatedate ?></td> 
                                        <td><?php echo $admin->admitypename ?>   </td>  
                                    </tr>
                                    <?php
                                    $num++;
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="placetap">
                        <form accept-charset="UTF-8" 
                              method="POST" 
                              enctype="multipart/form-data" 
                              class="forms" 
                              role="form"
                              id="form-add-new-place-type">
                            <fieldset>



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

                                </div>
                                <input class="btn  btn-success submit-button" type="submit" id="add-new-place" value="Add place">
                            </fieldset>

                            <div class="form-message">
                                <label id="form-add-new-places-message">

                                </label>
                            </div>
                        </form>

                        Available Place :
                        <table id="items-list-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>


                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                $number = 1;
                                foreach (dboperation::getPlacesTypes() as $key => $value) {
                                    ?>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $value ?></td>

                                </tr>
                                <?php
                                $number++;
                            }
                            ?>

                            </tbody>

                        </table>


                    </div>

                    <div class="tab-pane fade" id="itemtap">
                        <form accept-charset="UTF-8" 
                              method="POST" 
                              enctype="multipart/form-data" 
                              class="forms" 
                              role="form"
                              id="form-add-new-item-type">
                            <fieldset>



                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Name</i>
                                    </span>
                                    <input required="" 
                                           id="new-item-type"
                                           name="new-item-type"
                                           type="text"
                                           class="form-control"
                                           placeholder="Souvenirs name">

                                </div>


                                <div class="form-group input-group">

                                </div>
                                <input class="btn  btn-success submit-button" type="submit" id="add-new-item" value="Add Souvenirs">
                            </fieldset>

                            <div class="form-message">
                                <label id="form-add-new-item-message">

                                </label>
                            </div>
                        </form>

                        Available Souvenirs :
                        <table id="items-list-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>


                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                $number = 1;
                                foreach (dboperation::getAllItemTypes() as $key => $value) {
                                    ?>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $value ?></td>

                                </tr>
                                <?php
                                $number++;
                            }
                            ?>

                            </tbody>

                        </table>


                    </div>


                    <div class="tab-pane fade" id="servicetab">
                        <form accept-charset="UTF-8" 
                              method="POST" 
                              enctype="multipart/form-data" 
                              class="forms" 
                              role="form"
                              id="form-add-new-services-type">
                            <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit">&nbsp;Name</i>
                                    </span>
                                    <input required="" 
                                           id="new-services-type"
                                           name="new-services-type"
                                           type="text"
                                           class="form-control"
                                           placeholder="service name">

                                </div>


                                <div class="form-group input-group">

                                </div>
                                <input class="btn  btn-success submit-button" type="submit" id="add-new-item" value="Add services">
                            </fieldset>

                            <div class="form-message">
                                <label id="form-add-new-services-message">

                                </label>
                            </div>
                        </form>

                        Available Services Type :
                        <table id="items-list-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>


                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                $number = 1;
                                foreach (dboperation::getAllserviceTypes() as $key => $value) {
                                    ?>
                                <td><?php echo $number; ?></td>
                                <td><?php echo $value ?></td>

                                </tr>
                                <?php
                                $number++;
                            }
                            ?>

                            </tbody>

                        </table>


                    </div>
                    <div class="tab-pane fade" id="constanttab">

                        <?php
                        $navtitles = dboperation::getAllNanvTabTitle();
                        $constants = array();
                        $i = 0;
                        foreach ($navtitles as $key => $value) {
                            $constants[$i] = $value;
                            $i++;
                        }
                        ?>

                        <div>

                            Constants Table :
                            <table id="items-list-table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Key</th>
                                        <th>Value</th>

                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
                                    $number = 1;
                                    foreach ($constants as $constant) {
                                        ?>
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $constant["key"]; ?></td>
                                    <td><?php echo $constant["title"]; ?></td>

                                    </tr>
                                    <?php
                                    $number++;
                                }
                                ?>

                                </tbody>

                            </table>


                            <form accept-charset="UTF-8" 
                                  method="POST" 
                                  class="forms" 
                                  role="form"
                                  id="form-update-constant">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-tags"></i>
                                                </span>
                                                <select class="form-control"
                                                        id="constantid"
                                                        name="constantid"
                                                        >
                                                    <option value="1000" selected="false">  </option>
                                                    <?php
                                                    for ($index = 0; $index < count($constants); $index++) {
                                                        ?>
                                                        <option value="<?php echo $constants[$index]["id"]; ?>"><?php echo $constants[$index]["title"]; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div><!-- /input-group -->

                                        </div><!-- /.col-lg-6 -->
                                        <div class="col-lg-5">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-list"></i>
                                                </span>
                                                <input id="new-constant-title"
                                                       name="new-constant-title"
                                                       required=""
                                                       type="text" class="form-control"
                                                       placeholder="new constant value">
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        <div class="col-lg-2">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-primary" type="submit">update</button>
                                                </span>
                                                
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        <div class="form-message">
                                                <label id="form-update-constant-messege">
                                                </label>
                                                </div>
                                    </div><!-- /.row -->
                                </fieldset>
                            </form>
                        </div>

                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
