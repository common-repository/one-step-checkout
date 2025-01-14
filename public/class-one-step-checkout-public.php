<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codenrich.com/
 * @since      1.0.0
 *
 * @package    One_Step_Checkout
 * @subpackage One_Step_Checkout/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    One_Step_Checkout
 * @subpackage One_Step_Checkout/public
 * @author     codenrich <codenrich@gmail.com>
 */
class One_Step_Checkout_Public
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
     * @param string $plugin_name The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/one-step-checkout-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/one-step-checkout-public.js', array('jquery'), $this->version, false);

    }
    /**
     * Function for display shortcode
     *
     * @since 1.0.0
     */
    /*public function osc_one_step_checkout_fun(){
        return 'sample test';
    }*/
    public function register_shortcodes()
    {

        //add_shortcode( 'osc_one_step_checkout', 'osc_one_step_checkout_fun' );
        add_shortcode('osc_one_step_checkout', array($this, 'osc_one_step_checkout_fun'));
    }

    public function osc_custom_style()
    {
        if (get_option('osc_custom_css') != "") {
            ?>
            <style>
                <?php echo get_option('osc_custom_css');  ?>
            </style>
        <?php }
    }

    public function osc_one_step_checkout_fun()
    {
        require_once('partials/one-step-checkout-public-display.php');
    }

}
