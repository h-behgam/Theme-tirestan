<?php

/**
 * The public-facing functionality of the theme.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 */

/**
 * The public-facing functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Public {

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->load_dependencies();

    }

    /**
     * Load the required dependencies for the public facing functionality.
     *
     * @since     1.0.0
     * @access    private
     */
    private function load_dependencies() {

        /**
         * The class responsible for product query.
         */
        require_once get_stylesheet_directory() . '/inc/public/class-tirestan-product.php';
        /**
         * The class responsible for product filtering.
         */
        require_once get_stylesheet_directory() . '/inc/public/class-tirestan-filter.php';
        /**
         * The class responsible for search by car.
         */
        require_once get_stylesheet_directory() . '/inc/public/class-tirestan-car.php';
        /**
         * The class responsible for theme shortcodes.
         */
        require_once get_stylesheet_directory() . '/inc/public/class-tirestan-shortcode.php';
        /**
         * The class responsible for ajax calls.
         */
        require_once get_stylesheet_directory() . '/inc/public/class-tirestan-ajax.php';

    }

    /**
     * Woocommerce: cart validation
     *
     * @since    1.0.0
     */
    public function cart_validation() {

        global $woocommerce;

        $items            = $woocommerce->cart->get_cart();
        $shipping_classes = array();

        foreach( $items as $item => $values ) {

            $sc = $values['data']->get_shipping_class();

            if ( ! empty( $sc ) && ! in_array( $sc, $shipping_classes ) ) {

                array_push( $shipping_classes, $sc );
            }

        }

        if ( sizeof( $shipping_classes ) > 1 ) {
            wc_add_notice( 'امکان سفارش محصولاتی با روش ارسال متفاوت وجود ندارد. لطفا سبد خرید خود را بررسی کنید.', 'error' );
        }

    }

}
