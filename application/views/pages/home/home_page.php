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
    <div class="col-md-12 body-container">
        <div class="panel p-body">
            <div class="panel-heading search">
                <div class="col-md-6">
                    <h4>Products</h4>
                </div>
            </div>
            <div class="panel-body">

                <div class="col-md-12" style="margin-top: 30px">
                    <?= $this->session->flashdata('message'); ?>
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

