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
