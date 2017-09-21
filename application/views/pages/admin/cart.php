<?php
$product_record = $this->home->getCart();
//print_r($product_record);

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

        <div class="col-md-12" style="margin-top: 10px;">
            <table class="table table-bordered" style="padding: 10px;">
                <tr>
                    <th style="text-align: center">Image</th>
                    <th style="text-align: center">Item Name</th>
                    <th style="text-align: center">Quantity</th>
                    <th style="text-align: center">Price</th>
                    <th style="text-align: center">Sub Total</th>
                </tr>
                <tbody>
                <?php foreach ($product_record as $val) { ?>
                    <tr>
                        <td width="200">
                            <img src="/assets/images/<?= $val['image'] ?>" alt="" style="max-width: 100px;text-align: center">
                        </td>
                        <td><?= $val['item_name'] ?></td>
                        <td style="text-align: right"><?= $val['q'] ?></td>
                        <td style="text-align: right"><?= $val['p'] ?></td>
                        <td style="text-align: right"><?= number_format($val['q'] * $val['p'], 2, '.', ',') ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan="4" style="text-align: center">Grand Total</th>

                    <th style="text-align: right"><b>2,0000</b></th>
                </tr>
                </tbody>
            </table>
        </div>



    </div>
</div>