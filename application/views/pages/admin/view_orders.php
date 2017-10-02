<?php
$product_record = $this->home->viewOrders();
$total = 0;
?>
<div class="col-md-2">

</div>
<div class="col-md-10 body-container">
    <div class="panel p-body">
        <div class="panel-heading search">
            <div class="col-md-6">
                <h4>Cart</h4>
            </div>
        </div>

        <div class="panel-body">
            <div class="col-md-12">
                <?= $this->session->flashdata('message') ?>
            </div>
            <?php if (count($product_record) != 0) { ?>
                <div class="col-md-12" style="margin-top: 10px;">
                    <table class="table table-bordered display example_data" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Name</td>
                            <td style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Item Name</td>
                            <td style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Quantity</td>
                            <td style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Price</td>
                            <td style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Sub Total</td>
                            <td style="background-image: linear-gradient(#8EB891, #799F7C, #698A6B);">Action</td>
                        </tr>

                        </thead>
                        <tbody>
                        <?php foreach ($product_record as $val) { ?>
                            <tr>
                                <td>
                                    <?= $val['first_name'] . ' ' . $val['last_name'] ?>
                                </td>
                                <td><?= $val['item_name'] ?></td>
                                <td style="text-align: right"><?= $val['q'] ?></td>
                                <td style="text-align: right"><?= $val['p'] ?></td>
                                <td style="text-align: right"><?= number_format($val['q'] * $val['p'], 2, '.', ',') ?></td>
                                <td><a href="/paid_item/<?= $val['cart_id'] ?>" class="btn btn-primary btn-xs"
                                       onclick="return confirm('Are you sure this item is already paid ?')"><span
                                            class="glyphicon glyphicon-thumbs-up"></span> Paid</a></td>
                            </tr>
                            <?php
                            $subtotal = $val['q'] * $val['p'];
                            $total += $subtotal;
                        } ?>

                        </tbody>
                    </table>

                    <br/>
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-success">
                            <span style="font-size: 20px"><strong>GRAND TOTAL : <?= number_format($total, 2, '.', ',') ?></strong></span>
                        </div>
                    </div>

                    <div id="paypal-button" style="float: right;">

                    </div>
                </div>

            <?php } else { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        No Orders
                    </div>
                </div>

            <?php } ?>
        </div>


    </div>
</div>