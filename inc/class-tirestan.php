<?php

/**
 * The core theme class.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/includes
 */

/**
 * The core theme class.
 *
 * @since         1.0.0
 * @package       Tirestan
 * @subpackage    Tirestan/includes
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan {

    /**
     * Define the core functionality of the theme.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->load_dependencies();

    }

    /**
     * Load the required dependencies for this theme.
     *
     * @since     1.0.0
     * @access    private
     */
    private function load_dependencies() {

        /**
         * The class responsible for theme security functionality of the theme.
         */
        require_once get_stylesheet_directory() . '/inc/class-tirestan-security.php';
        /**
         * The class responsible for defining all actions that occur in the admin
         * side of the site.
         */
        require_once get_stylesheet_directory() . '/inc/admin/class-tirestan-admin.php';
        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once get_stylesheet_directory() . '/inc/public/class-tirestan-public.php';

    }

    /**
     * Register all of the hooks related to the admin-facing functionality
     * of the theme.
     *
     * @since     1.0.0
     * @access    private
     */
    private function register_admin_hooks() {

        $theme_admin           = new Tirestan_Admin();
        $theme_search_menu     = new Tirestan_Search_Menu();
        $theme_search_brand    = new Tirestan_Search_Brand();
        $theme_search_year     = new Tirestan_Search_Year();
        $theme_search_category = new Tirestan_Search_Category();

        // Scripts & Styles
        add_action( 'admin_enqueue_scripts', array( $theme_admin, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $theme_admin, 'enqueue_scripts' ) );

        // Menu
        add_action( 'admin_menu', array( $theme_search_menu, 'setup_menu' ) );

        // Brand
        add_action( 'ts_render_tab_brand', array( $theme_search_brand, 'render_content' ) );
        add_action( 'wp_ajax_tsbrandadd', array( $theme_search_brand, 'ajax_add_brand' ) );
        add_action( 'wp_ajax_tsbrandupdate', array( $theme_search_brand, 'ajax_update_brand' ) );
        add_action( 'wp_ajax_tsbranddelete', array( $theme_search_brand, 'ajax_delete_brand' ) );

        // Year
        add_action( 'ts_render_tab_year', array( $theme_search_year, 'render_content' ) );
        add_action( 'wp_ajax_tsyearadd', array( $theme_search_year, 'ajax_add_year' ) );
        add_action( 'wp_ajax_tsyeardelete', array( $theme_search_year, 'ajax_delete_year' ) );

        // Category
        add_action( 'ts_render_tab_category', array( $theme_search_category, 'render_content' ) );
        add_action( 'wp_ajax_tscatadd', array( $theme_search_category, 'ajax_add_category' ) );
        add_action( 'wp_ajax_tscatdelete', array( $theme_search_category, 'ajax_delete_category' ) );

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the theme.
     *
     * @since     1.0.0
     * @access    private
     */
    private function register_public_hooks() {

        $theme_public    = new Tirestan_Public();
        $theme_shortcode = new Tirestan_ShortCode();
        $theme_ajax      = new Tirestan_Ajax();

        // Product Query
        add_action( 'wp_ajax_tsproducts', array( $theme_ajax, 'get_products' ) );
        add_action( 'wp_ajax_nopriv_tsproducts', array( $theme_ajax, 'get_products' ) );
        // Preview Query
        add_action( 'wp_ajax_tspreview', array( $theme_ajax, 'get_preview' ) );
        add_action( 'wp_ajax_nopriv_tspreview', array( $theme_ajax, 'get_preview' ) );
        // Specs Query
        add_action( 'wp_ajax_tsfilterspecs', array( $theme_ajax, 'get_filter_specs' ) );
        add_action( 'wp_ajax_nopriv_tsfilterspecs', array( $theme_ajax, 'get_filter_specs' ) );
        // Car: Brands Query
        add_action( 'wp_ajax_tscarbrands', array( $theme_ajax, 'get_car_brands' ) );
        add_action( 'wp_ajax_nopriv_tscarbrands', array( $theme_ajax, 'get_car_brands' ) );
        // Car: Models Query
        add_action( 'wp_ajax_tscarmodels', array( $theme_ajax, 'get_car_models' ) );
        add_action( 'wp_ajax_nopriv_tscarmodels', array( $theme_ajax, 'get_car_models' ) );
        // Car: Years Query
        add_action( 'wp_ajax_tscaryears', array( $theme_ajax, 'get_car_years' ) );
        add_action( 'wp_ajax_nopriv_tscaryears', array( $theme_ajax, 'get_car_years' ) );
        // YITH Brands Query
        add_action( 'wp_ajax_tsyithbrands', array( $theme_ajax, 'get_yith_brands' ) );
        add_action( 'wp_ajax_nopriv_tsyithbrands', array( $theme_ajax, 'get_yith_brands' ) );

        // Short Codes
        add_action( 'init', array( $theme_shortcode, 'initialize_shortcodes' ) );

        // Woocommerce: Cart Validation
        add_action( 'woocommerce_check_cart_items', array( $theme_public, 'cart_validation' ) );

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {

        $this->register_admin_hooks();
        $this->register_public_hooks();

    }

}
