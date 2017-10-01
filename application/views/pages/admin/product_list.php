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
        <br/>

        <div class="panel-body">

            <?= $this->session->flashdata('message') ?>
            <form class="form-horizontal" action="/save_products" method="post" enctype="multipart/form-data">
                <!--            <form action="/save_products" method="post" class="form-horizontal">-->
                <input type="hidden" value="<?= $product['id'] ?>" name="record_id">
                <div class="col-md-1">
                    <div class="form-group" style="margin-left: 50px;">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img src="<?php echo "/assets/images/" . $product['image'] ?>" alt=""/>
                                <img src="" alt=""/>
                            </div>
                            <div>
                                <span class="btn btn-info btn-file"><span class="fileinput-new">Select image</span><span
                                        class="fileinput-exists">Change</span><input type="file" name="picture"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">


                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Serial No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="serial" required
                                   value="<?= $product['serial'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="quantity" required
                                   value="<?= $product['quantity'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Item Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="item_name" required
                                   value="<?= $product['item_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" required
                                   value="<?= $product['price'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="short_description" required
                                   value="<?= $product['short_description'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <a href="/products" class="btn btn-info" style="float:right;margin-left: 5px;">Cancel</a>
                            <button class="btn btn-primary" style="float:right;" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel panel-default"
             style="margin-bottom:30px;margin-right: 20px;margin-left: 20px;">
            <div class="panel-heading">
                Product List
            </div>
            <div class="panel-body">


                <table class="table table-bordered display example_data" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Serial No</th>
                        <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Item Name</th>
                        <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Stock</th>
                        <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Price</th>
                        <th style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($product_record as $val) { ?>
                        <tr>
                            <td><?= $val['serial'] ?></td>
                            <td><?= $val['item_name'] ?></td>
                            <td><?= $val['quantity'] ?></td>
                            <td><?= $val['price'] ?></td>
                            <td style="width: 150px">
                                <a href="/products/edit/<?= $val['id'] ?>" class="label label-primary">Edit &nbsp;&nbsp;
                                    <span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="/products/delete/<?= $val['id'] ?>" class="label label-danger"
                                   onclick="confirm('Are you sure you want to delete this item ?')">Delete
                                    &nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>