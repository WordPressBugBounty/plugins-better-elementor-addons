<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
class BAE_Admin {

    protected $plugin_slug = 'better_el_addons';
    
    public function __construct() {
        $this->includes();
        $this->init_hooks();
    }

    
    public function includes() {

        // load class admin ajax function
        require_once BEA_PLUGIN_DIR . 'admin/admin-ajax.php';
    }

    public function init_hooks() {

        // Build admin menu/pages
        add_action('admin_menu', array($this, 'add_plugin_admin_menu'));
        add_action('admin_init', array($this, 'handle_external_redirects'), 1);
        
        // Load admin style sheet and JavaScript.
        add_action('admin_enqueue_scripts', array($this, 'bea_enqueue_admin_scripts'));

    }

    public function add_plugin_admin_menu() {

        add_menu_page(
            __('Better Addons for Elementor', 'better-elementor-addons'),
            __('Better Addons', 'better-elementor-addons'),
            'manage_options',
            $this->plugin_slug,
            array($this, 'display_settings_page')
        );

        // add plugin settings submenu page
        add_submenu_page(
            $this->plugin_slug,
            __('Widgets Settings', 'better-elementor-addons'),
            __('Settings', 'better-elementor-addons'),
            'manage_options',
            $this->plugin_slug,
            array($this, 'display_settings_page')
        );

        // add import/export submenu page
        add_submenu_page(
            $this->plugin_slug,
            __('Widgets Documentation', 'better-elementor-addons'),
            __('Documentation', 'better-elementor-addons'),
            'manage_options',
            $this->plugin_slug . '_documentation',
            '__return_false',
            null
        );

    }

    public function handle_external_redirects() {
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Checking admin page parameter, not processing form data
        if (empty($_GET['page'])) {
            return;
        }

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Checking admin page parameter for redirect
        if ($this->plugin_slug . '_documentation' === $_GET['page']) {
            add_filter('allowed_redirect_hosts', function($hosts) {
                $hosts[] = 'widgets.betteraddons.com';
                return $hosts;
            });
            wp_safe_redirect('https://widgets.betteraddons.com/');
            exit;
        }
    }

    public function display_settings_page() {
        require_once('views/admin-header.php');
        require_once('views/admin-banner2.php');
        require_once('views/settings.php');
        require_once('views/admin-footer.php');
    }

    public function bea_enqueue_admin_scripts() {
        // // get current admin screen
        // $screen = get_current_screen();
        //         // If screen is a part of Addons for Elementor plugin options page
        // if (strpos($screen->id, $this->plugin_slug) !== false) {

            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');

            wp_register_style('bea-admin-styles', BEA_PLUGIN_URL . 'admin/assets/css/bea-admin.css', array(), BEA_VERSION);
            wp_enqueue_style('bea-admin-styles');

            wp_register_script('bea-admin-scripts', BEA_PLUGIN_URL . 'admin/assets/js/bea-admin.js', array(), BEA_VERSION, true);
            wp_enqueue_script('bea-admin-scripts');

            wp_register_style('bea-admin-page-styles', BEA_PLUGIN_URL . 'admin/assets/css/bea-admin-page.css', array(), BEA_VERSION);
            wp_enqueue_style('bea-admin-page-styles');
            
        //}

    }

}
new BAE_Admin;