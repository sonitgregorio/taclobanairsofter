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
        <!--  Start of Product Listing      -->
        <div class="col-md-4">
            <div class="prod-info-main prod-wrap clearfix">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="product-image">
                            <img src="/assets/images/no_image.png" class="img-responsive" style="height: 100$">
                            <span class="tag2 hot">
                                 SPECIAL
                               </span>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-deatil">
                            <h5 class="name">
                                <a href="#">
                                    Product Code/Name here
                                </a>
                                <a href="#">
                                    <span>Product Category</span>
                                </a>
                            </h5>
                            <p class="price-container">
                                <span>$199</span>
                            </p>
                            <span class="tag1"></span>
                        </div>
                        <div class="description">
                            <p>A Short product description here </p>
                        </div>
                        <div class="product-info smart-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-danger">Add to cart</a>
                                    <a href="javascript:void(0);" class="btn btn-info">More info</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="rating">Rating:
                                        <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                                        <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                                        <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                                        <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                                        <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--End of First Product-->

        <br/>
    </div>
</div>