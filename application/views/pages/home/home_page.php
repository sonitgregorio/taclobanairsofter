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
                        <input type="text" class="form-control" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <a href="#" class="btn btn-success sign_up" style="float:right;">Sign Up</a>
                        <button class="btn btn-primary" style="float:right; margin-right: 5px;" type="submit">Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>
</div>
<div class="col-md-12 body-container">
    <div class="panel p-body">
        <div class="panel-heading search">
            <div class="col-md-6">
                <h4>Products</h4>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-md-12" style="margin-top: 30px">
            </div>
            <!--  Start of Product Listing      -->
            <?php $product_record = $this->home->getProducts(); ?>
            <?php foreach ($product_record as $val) { ?>
                <div class="col-md-4">
                    <div class="prod-info-main prod-wrap clearfix">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div class="product-image" style="padding-top: 0px;min-height: 200px">
                                    <img src="/assets/images/<?= $val['image'] ?>" class="img-responsive"
                                         style="min-height:200px ">
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-deatil">
                                    <h5 class="name">
                                        <a href="#">
                                            <?= $val['item_name'] ?>
                                        </a>
                                        <a href="#">
                                            <span><?= $val['serial'] ?></span>
                                        </a>
                                    </h5>
                                    <p class="price-container">
                                        <span>PHP &nbsp;<?= $val['price'] ?></span>
                                    </p>
                                    <span class="tag1"></span>
                                </div>
                                <div class="description">
                                    <p style="color:red">Remaining Quantity : <?= $val['quantity'] ?></p>
                                    <p><?= $val['short_description'] ?> </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!--End of First Product-->


        <br/>
    </div>


</div>


<div class="modal fade sign_up_modal" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form class="form-horizontal" action="/save_contact" method="post">
            <div class="modal-content">
                <div class="modal-header panel-heading search">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="position" value="2">
                    <input type="hidden" name="type_of_registration" value="1">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="firstname"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="lastname"
                                   value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="dob" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Place of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pob" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Work / Profession</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="work" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Contact Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact"
                                   value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Office Location</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="location"
                                   value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Email Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value=""
                                   pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary button_save" >Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
