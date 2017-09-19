<div class="col-md-12" style="margin-top: 60px">

</div>

<div class="row">
    <div class="col-md-12 header">
        <div class="jumbotron col-md-8">
            <div class="col-md-offset-4 col-md-3">
                <img class="login-pic" src="<?php echo base_url('assets/images/5155029.jpg'); ?>">
            </div>
        </div>

        <div class="col-md-4">
            <form method="post" class="form-horizontal login" action="/authenticate">
                <h2 class="sign">
                    <b>Sign in</b>
                </h2>
                <br/>

                <?= $this->session->flashdata('message') ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button class="btn btn-primary" style="float:right;" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-md-12 bg-panel">
        <div class="row">

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Goal</h3>
                        <hr/>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Mission</h3>
                        <hr/>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Vision</h3>
                        <hr/>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9" style="display: none">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Items</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-3 ">
                <div class="panel panel-default panel_height" style="border">
                    <div class="panel-body ">
                    </div>
                    <div class="panel-footer hover_panel" style="text-align: center"><a href="" class="hover_panel"
                                                                                        style="display:block">Add to
                            Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" style="border">
                    <div class="panel-body">
                    </div>
                    <div class="panel-footer hover_panel" style="text-align: center"><a href="" class="hover_panel"
                                                                                        style="display:block">Add to
                            Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" style="border">
                    <div class="panel-body">
                    </div>
                    <div class="panel-footer hover_panel" style="text-align: center"><a href="" class="hover_panel"
                                                                                        style="display:block">Add to
                            Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" style="border">
                    <div class="panel-body">
                    </div>
                    <div class="panel-footer hover_panel" style="text-align: center"><a href="" class="hover_panel"
                                                                                        style="display:block">Add to
                            Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="col-md-3" style="display: none">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">User Login</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="/authenticate">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <label for="username " class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username " class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" required>
                        <a class="text_login" href="">Register</a> / <a href="" class="text_login">Forgot password?</a>
                    </div>
                </div>
                <button class="btn btn-primary" style="float:right;" type="submit">Login</button>
            </form>

        </div>
    </div>
</div>