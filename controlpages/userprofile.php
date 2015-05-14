<div class="container">
    <div class="row vertical-offset-100">
        <div id="login-form" class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" >
                <div class="panel-heading">                                
                    <div class="row-fluid user-row">
                        <img class="center-content img-responsive" alt="oman map" 
                             src="../images/iconmap.png"

                             />
                       
                    </div>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" method="POST" role="form" id="form-user-profile">
                        <fieldset>
                            <center>
                                <label id="user_profile_result">
                                </label>
                            </center>
                            <div class="input-group">
                                    <div class="input-group-addon"><span>@&nbsp;</span>User Name</div>
                                    <input class="form-control" value="<?php echo $_SESSION['login-admin-name']; ?>"required="" name="user-profile-name" id="useremail" type="user-profile-name">
                                
                            </div>
                            <div class="input-group">
                                    <div class="input-group-addon"><span>@&nbsp;</span>Email</div>
                                    <input class="form-control" value="<?php echo $_SESSION['login-admin-email']; ?>" required="" name="user-profile-email" id="useremail" type="user-profile-email">
                                
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-addon" ><span class="fa fa-lock">&nbsp;</span>Password</div>
                                <input class="form-control" placeholder="Old Password" required="" name="user-profile-password-old" id="user-profile-password-old" type="password"><br>
                                <input class="form-control" placeholder="Password" required="" name="user-profile-password-new" id="user-profile-password-new" type="password"><br>
                                <input class="form-control" placeholder="Re-Password" required="" name="user-profile-password-new-repeat" id="user-profile-password-new-repeat" type="password">

                            </div>
                            <br>
                            <input class="btn  btn-success btn-block" type="submit" id="login" value="Change">
                            <hr>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
