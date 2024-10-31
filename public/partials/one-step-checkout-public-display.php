<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://codenrich.com/
 * @since      1.0.0
 *
 * @package    One_Step_Checkout
 * @subpackage One_Step_Checkout/public/partials
 */

//$colum_option = get_option('cart_colum');
$osc_checkout_page_layout = get_option('osc_checkout_page_layout');
$osc_billing_details_layout = get_option('osc_billing_details_layout');

?>
<div class="codenrich-row">
    <div class="<?php echo $osc_checkout_page_layout; ?>">
        <?php echo do_shortcode('[woocommerce_cart]') ?>
    </div>
    <div class="<?php echo $osc_checkout_page_layout; ?>">
        <?php echo do_shortcode('[woocommerce_checkout]') ?>
    </div>
</div>
<?php

$option_billing_colum = get_option('osc_billing_details_layout');
if ( $option_billing_colum == "one-column" ) {
    $option_val__billing_colum='98%';
}else{
    $option_val__billing_colum='48%';
}
?>
<style type="text/css" media="screen">
    .woocommerce #customer_details .col-1,.woocommerce #customer_details .col-2{
        width: <?php echo $option_val__billing_colum;?>;
    }
    .cart-collaterals .cross-sells{
        display: none;
    }
    @media (max-width:640px) {
        .woocommerce #customer_details .col-1,.woocommerce #customer_details .col-2{
            width: 100% !important;
        }
    }
</style>