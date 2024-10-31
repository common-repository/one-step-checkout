<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codenrich.com/
 * @since      1.0.0
 *
 * @package    One_Step_Checkout
 * @subpackage One_Step_Checkout/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    One_Step_Checkout
 * @subpackage One_Step_Checkout/admin
 * @author     codenrich <codenrich@gmail.com>
 */
class One_Step_Checkout_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in One_Step_Checkout_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The One_Step_Checkout_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/one-step-checkout-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in One_Step_Checkout_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The One_Step_Checkout_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/one-step-checkout-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * add menu for checkout setting page.
     */
    public function one_step_checkout_menu_page()
    {
        //create new top-level menu



        add_menu_page( 'One Step checkout', 'One Step checkout', 'manage_options','one-step-checkout', array(
                $this, 'one_step_checkout_list_page' ),
            'dashicons-cart', 50
        );
    }

    public function one_step_checkout_settings()
    {
        register_setting('one-step-checkout-settings-group', 'osc_checkout_page_layout');
        register_setting('one-step-checkout-settings-group', 'osc_billing_details_layout');
        register_setting('one-step-checkout-settings-group', 'osc_custom_css');
        register_setting('one-step-checkout-settings-group', 'some_other_option');
        register_setting('one-step-checkout-settings-group', 'option_etc');
    }

    public function one_step_checkout_list_page()
    {
        require_once('partials/one-step-checkout-admin-display.php');
        //echo "test";
    }

}
