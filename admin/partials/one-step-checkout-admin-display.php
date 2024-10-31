<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codenrich.com/
 * @since      1.0.0
 *
 * @package    One_Step_Checkout
 * @subpackage One_Step_Checkout/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>One Step Checkout Settings</h1>
    <form method="post" action="options.php">
        <?php settings_fields('one-step-checkout-settings-group'); ?>
        <?php do_settings_sections('one-step-checkout-settings-group'); ?>
        <table class="form-table table">
        <div class="container">

	<ul class="tabs">
		<li class="tab-link current" data-tab="Checkout-tab">Checkout Page Layout</li>
		<li class="tab-link" data-tab="Billing-tab">Billing Details Layout</li>
		<li class="tab-link" data-tab="Custom-tab">Custom CSS</li>
		<li class="tab-link" data-tab="Shortcode-tab">Shortcode</li>
	</ul>
    <div class="tab-container">
	<div id="Checkout-tab" class="tab-content current">
    <h3>Checkout Page Layout</h3>
		<div class="radio-button">
                    <input type="radio" value="one-column" 
                           name="osc_checkout_page_layout" <?php checked('one-column', get_option('osc_checkout_page_layout'), true); ?>>
                    One Column
                    <input type="radio" value="two-column"
                           name="osc_checkout_page_layout" <?php checked('two-column', get_option('osc_checkout_page_layout'), true); ?> >
                    Two Column
                </div>
	</div>
	<div id="Billing-tab" class="tab-content">
       <h3>Billing Details Layout</h3>
		 <div class="radio-button">
                    <input type="radio" value="one-column" 
                           name="osc_billing_details_layout" <?php checked('one-column', get_option('osc_billing_details_layout'), true); ?>>
                    One Column<br>
                    <input type="radio" value="two-column"
                           name="osc_billing_details_layout" <?php checked('two-column', get_option('osc_billing_details_layout'), true); ?>>
                    Two Column
                </div>
	</div>
	<div id="Custom-tab" class="tab-content">
      <h3>Custom CSS</h3>
		<div class="teatarea">
                    <textarea value="<?php echo esc_attr(get_option('osc_custom_css')); ?>" name="osc_custom_css"
                              rows="10" cols="30"><?php echo esc_attr(get_option('osc_custom_css')); ?></textarea>
                </div>
	</div>
	<div id="Shortcode-tab" class="tab-content">
	<div class="welcome-panel option-div checkout">
                        <h3>Shortcode:</h3>
                        <p>Update This shortcode in your checkout page:</p>
                         <div class="pw-promolist__tablist__right promocopy-outer">
                            <input readonly type="text" value="[osc_one_step_checkout]" id="promoCopy">
	                       <button type="button"><i class="fal fa-copy"></i> <span class="tersalin">Copy</span></button>
                        </div>
                    </div>
	</div>
        <div class="submit-data">
        <?php submit_button(); ?>
</div>
</div>
</div><!-- container -->

    </form>
</div>
