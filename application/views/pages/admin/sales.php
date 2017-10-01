<?php
$product_record = $this->home->viewSales();
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
                    <table class="table table-bordered" style="padding: 10px;">
                        <tr>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Item Name</th>
                            <th style="text-align: center">Quantity</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Sub Total</th>
                        </tr>
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
                            </tr>
                            <?php
                            $subtotal = $val['q'] * $val['p'];
                            $total += $subtotal;
                        } ?>
                        <tr>
                            <th colspan="4" style="text-align: center">Grand Total</th>
                            <th style="text-align: right"><span
                                    id="total"><?= number_format($total, 2, '.', ',') ?></span>
                            </th>
                        </tr>
                        </tbody>
                    </table>
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