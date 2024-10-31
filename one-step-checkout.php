<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codenrich.com/
 * @since             1.0.0
 * @package           One_Step_Checkout
 *
 * @wordpress-plugin
 * Plugin Name:       One Step Checkout
 * Plugin URI:        https://wordpress.org/plugins/one-step-checkout/
 * Description:       One step checkout page will allow users to complete the checkout process without spending time moving to a separate checkout page.
 * Version:           1.1
 * Author:            codenrich
 * Author URI:        https://codenrich.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       one-step-checkout
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
add_action( 'plugins_loaded', 'one_step_checkout_initialize_plugin' );
$wc_active = in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ), true );

/**
 * Check Initialize plugin in case of WooCommerce plugin is missing.
 *
 * @since    1.0.0
 */
function one_step_checkout_initialize_plugin()
{
    $wc_active = in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ), true );

    if ( current_user_can( 'activate_plugins' ) && $wc_active !== true || $wc_active !== true ) {
        add_action( 'admin_notices', 'one_step_checkout_admin_woo_notice' );
    } else {
        run_one_step_checkout();
    }

}

/**
 * Show admin notice in case of WooCommerce plugin is missing.
 *
 * @since    1.0.0
 */
function one_step_checkout_admin_woo_notice()
{
    $vpe_plugin = esc_html__( 'One Step Checkout ');
    $wc_plugin = esc_html__( 'WooCommerce' );
    ?>
    <div class="error">
        <p>
            <?php
            echo  sprintf( esc_html__( '%1$s is could not be activate it requires %2$s to be installed and active.', 'woo-checkout-for-digital-goods' ), '<strong>' . esc_html( $vpe_plugin ) . '</strong>', '<strong>' . esc_html( $wc_plugin ) . '</strong>' ) ;
            ?>
        </p>
    </div>
    <?php
}

if (in_array('woocommerce/woocommerce.php',apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
    /**
     * Currently plugin version.
     * Start at version 1.0.0 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     */
    define('ONE_STEP_CHECKOUT_VERSION', '1.0.0');


    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-one-step-checkout-activator.php
     */
    function activate_one_step_checkout()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/class-one-step-checkout-activator.php';
        One_Step_Checkout_Activator::activate();
    }

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-one-step-checkout-deactivator.php
     */
    function deactivate_one_step_checkout()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/class-one-step-checkout-deactivator.php';
        One_Step_Checkout_Deactivator::deactivate();
    }

    register_activation_hook(__FILE__, 'activate_one_step_checkout');
    register_deactivation_hook(__FILE__, 'deactivate_one_step_checkout');

    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require plugin_dir_path(__FILE__) . 'includes/class-one-step-checkout.php';

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function run_one_step_checkout()
    {

        $plugin = new One_Step_Checkout();
        $plugin->run();

    }


}