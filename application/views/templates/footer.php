</body>
<script src="/assets/js/jquery-3.2.1.js"></script>
<script src="<?= base_url() ?>/assets/js/bootstrap.js"></script>
<script src="<?= base_url() ?>/assets/js/jasny-bootstrap.min.js"></script>

<script>

    var quantity = 0;
    $(document).ready(function () {
        $('.modal_click').click(function () {
            var id = $(this).data('param');
            var price = $(this).data('param1');
            quantity = $(this).data('param2');
            console.log(id + ',' + price + ',' + quantity);
            $('input[name=price_modal]').val(price);
            $('input[name=price_modals]').val(price);
            $('input[name=pid]').val(id);
            $('.cart_modal').modal('show');
        });

        $('.quantity_change').change(function () {
            var q = this.value;
            if (q <= 0) {
                $('.show_alert').html('<div class="alert alert-warning" role="alert">Quantity should not be less than 0.</div>');
                $('.button_save').attr('disabled', 'disabled');
            } else if (q > quantity) {
                $('.show_alert').html('<div class="alert alert-warning" role="alert">Remaining quantity is ' + quantity + '</div>');
                $('.button_save').attr('disabled', 'disabled');
            }
            else {
                $('.show_alert').html('');
                $('.button_save').removeAttr('disabled');
            }
        })
    });
</script>
<?php if (uri_string() == 'my_cart') { ?>
    <script>
        var url = window.location.href;
        var searchString = url.search('paypal-home');
        paypal.Button.render({
            env: 'sandbox', // Or 'sandbox',
            client: {
                sandbox: 'AbtnoLFoAWj1wUFsY4HVHMgi8pLLZ-AY0CsuVgIRO7nH1erZ7hnHGeXk9s9Ze4c2YZ4kPxKKH0x22rYN',
                production: ''
            },
            commit: true, // Show a 'Pay Now' button
            payment: function (data, actions) {
                var total = $('#total').html();
                var totals = Number(total).toFixed(2);
                var currency = 'PHP';
                return actions.payment.create({
                    transactions: [
                        {
                            amount: {
                                total: totals,
                                currency: currency
                            }
                        }
                    ]
                })
                // Set up the payment here
            },
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function (payment) {
                    if (payment.state === 'approved') {

                    } else {
                        alert('Error Occured Please try again.');
                    }
                });
                // Execute the payment here
            }
        }, '#paypal-button');
    </script>
<?php } ?>