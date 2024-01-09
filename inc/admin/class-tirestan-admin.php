<?php

/**
 * The admin functionality of the theme.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 */

/**
 * The admin functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Admin {

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->load_dependencies();

    }

    /**
     * Load the required dependencies for the admin functionality.
     *
     * @since     1.0.0
     * @access    private
     */
    private function load_dependencies() {

        /**
         * The class responsible for theme car search admin menu.
         */
        require_once get_stylesheet_directory() . '/inc/admin/class-tirestan-search-menu.php';
        /**
         * The class responsible for theme brand tab in car search admin menu.
         */
        require_once get_stylesheet_directory() . '/inc/admin/class-tirestan-search-brand.php';
        /**
         * The class responsible for theme year tab in car search admin menu.
         */
        require_once get_stylesheet_directory() . '/inc/admin/class-tirestan-search-year.php';
        /**
         * The class responsible for theme category tab in car search admin menu.
         */
        require_once get_stylesheet_directory() . '/inc/admin/class-tirestan-search-category.php';
        /**
         * The class responsible for theme admin custom shipping.
         */
        require_once get_stylesheet_directory() . '/inc/admin/class-tirestan-shipping.php';

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        wp_enqueue_style(
            'tirestan-admin',
            get_stylesheet_directory_uri() . '/inc/admin/assets/css/tirestan-admin.css',
            array(),
            '1.0',
            'all'
        );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script(
            'tirestan-admin',
            get_stylesheet_directory_uri() . '/inc/admin/assets/js/tirestan-admin.js',
            array( 'jquery' ),
            '1.0',
            true
        );
        wp_localize_script( 'tirestan-admin', 'tirestan', array(
            'admin_ajax' => admin_url( 'admin-ajax.php' ),
            'nonce'      => wp_create_nonce( 'ts_ajax_nonce' ),
        ) );

    }

}
