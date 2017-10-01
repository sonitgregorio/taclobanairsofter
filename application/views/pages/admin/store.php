<?php
$product_record = $this->home->getProducts();
?>
<div class="col-md-2">

</div>
<div class="col-md-10 body-container">
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
                            <div class="product-info smart-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-danger modal_click" data-param="<?= $val['id'] ?>"
                                           data-param1="<?= $val['price'] ?>" data-param2="<?= $val['quantity'] ?>"><span class="glyphicon glyphicon-shopping-cart"></span> &nbsp;Add
                                            to cart</a>
                                        <!--                                        <a href="javascript:void(0);" class="btn btn-info">More info</a>-->
                                    </div>
                                    <!--                                        <div class="col-md-12">-->
                                    <!--                                            <div class="rating">Rating:-->
                                    <!--                                                <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>-->
                                    <!--                                                <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>-->
                                    <!--                                                <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>-->
                                    <!--                                                <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>-->
                                    <!--                                                <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
        <!--End of First Product-->

        <!--Start Modal Here-->
        <div class="modal fade cart_modal" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                <form class="form-horizontal" action="/save_to_cart" method="post">
                    <div class="modal-content">
                        <div class="modal-header panel-heading search">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Quantity</h4>
                        </div>
                        <div class="modal-body">
                            <div class="show_alert">

                            </div>
                            <input type="hidden" name="pid" value="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" disabled name="price_modal" class="form-control">
                                    <input type="hidden" name="price_modals" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Quantity</label>
                                <div class="col-sm-9">
                                    <input type="number" name="quantity" class="form-control quantity_change">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary button_save" disabled>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--End Modal Here-->
        <br/>
    </div>
</div>