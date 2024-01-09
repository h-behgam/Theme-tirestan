<?php

/**
 * The public-facing ajax functionality of the theme.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 */

/**
 * The public-facing ajax functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Ajax {

    /**
     * Ajax: Get products.
     *
     * @since    1.0.0
     */
    public function get_products() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $product        = new Tirestan_Product();
        $return_filters = Tirestan_Security::secure_post_field( 'return_filters', false );
        $output         = array(
            'products' => '',
            'total'    => 0,
            'pages'    => 0,
            'filters'  => array(),
            'error'    => '0',
        );

        // Get Products
        $output['products'] = $product->product_query( array(
            'paged'            => Tirestan_Security::secure_post_field( 'paged', 1 ),
            'orderby'          => Tirestan_Security::secure_post_field( 'orderby' ),
            'in_stock_only'    => Tirestan_Security::secure_post_field( 'in_stock_only', false ),
            'express'          => Tirestan_Security::secure_post_field( 'express', false ),
            'width'            => Tirestan_Security::secure_post_field( 'width' ),
            'aspect_ratio'     => Tirestan_Security::secure_post_field( 'aspect_ratio' ),
            'size'             => Tirestan_Security::secure_post_field( 'size' ),
            'brand'            => Tirestan_Security::secure_post_field( 'brand' ),
            'category'         => Tirestan_Security::secure_post_field( 'category' ),
            'tag'              => Tirestan_Security::secure_post_field( 'tag' ),
            'custom_tax'       => Tirestan_Security::secure_post_field( 'custom_tax', false ),
            'custom_tax_name'  => Tirestan_Security::secure_post_field( 'custom_tax_name' ),
            'custom_tax_value' => Tirestan_Security::secure_post_field( 'custom_tax_value' ),
            'custom_car'       => Tirestan_Security::secure_post_field( 'custom_car', false ),
            'car_brand'        => Tirestan_Security::secure_post_field( 'car_brand' ),
            'car_model'        => Tirestan_Security::secure_post_field( 'car_model' ),
            'car_year'         => Tirestan_Security::secure_post_field( 'car_year' ),
        ) );

        // Get Filters
        if ( $return_filters ) {
	        $is_initial        = Tirestan_Security::secure_post_field( 'is_initial', false );
            $filter            = new Tirestan_Filter();
            $output['filters'] = $filter->get_filters(
            	Tirestan_Security::secure_post_field( 'category' ),
            	Tirestan_Security::secure_post_field( 'width' ),
            	Tirestan_Security::secure_post_field( 'aspect_ratio' )
            );
            if ( $is_initial ) {
            	$output['filters']['width'] = $filter->get_filters(
            		Tirestan_Security::secure_post_field( 'category' )
	            )['width'];
            }
        }

        echo json_encode( $output );
        wp_die();

    }

    /**
     * Ajax: Get product preview.
     *
     * @since    1.0.0
     */
    public function get_preview() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $product_id = Tirestan_Security::secure_post_field( 'id' );
        $product    = new Tirestan_Product();
        $output     = array(
            'preview' => '',
            'error'   => '0',
        );

        $output['preview'] = $product->preview_query( $product_id );

        echo json_encode( $output );
        wp_die();

    }

    /**
     * Ajax: Get Specs.
     *
     * @since    1.0.0
     */
    public function get_filter_specs() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $is_initial   = Tirestan_Security::secure_post_field( 'is_initial', false );
        $category     = Tirestan_Security::secure_post_field( 'category' );
        $width        = Tirestan_Security::secure_post_field( 'width' );
        $aspect_ratio = Tirestan_Security::secure_post_field( 'aspect_ratio' );
        $specs        = new Tirestan_Filter();
        $output       = array(
            'specs' => array(
            	'width'        => array(),
            	'aspect_ratio' => array(),
            	'size'         => array(),
            ),
            'error' => '0',
        );

        if ( $is_initial ) {

	        $output['specs']['width']        = $specs->get_filters( $category )['width'];
	        $output['specs']['aspect_ratio'] = $specs->get_filters( $category, $width )['aspect_ratio'];
	        $output['specs']['size']         = $specs->get_filters( $category, $width, $aspect_ratio )['size'];
        } else {

	        $output['specs'] = $specs->get_filters( $category, $width, $aspect_ratio );
        }

        echo json_encode( $output );
        wp_die();

    }

    /**
     * Ajax: Get Car Brands.
     *
     * @since    1.0.0
     */
    public function get_car_brands() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $car    = new Tirestan_Car();
        $output = array(
            'brands' => array(),
            'error'  => '0',
        );

        $output['brands'] = $car->get_brands();

        echo json_encode( $output );
        wp_die();

    }

    /**
     * Ajax: Get Car Models.
     *
     * @since    1.0.0
     */
    public function get_car_models() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $brand  = Tirestan_Security::secure_post_field( 'brand' );
        $car    = new Tirestan_Car();
        $output = array(
            'models' => array(),
            'error'  => '0',
        );

        $output['models'] = $car->get_models( $brand );

        echo json_encode( $output );
        wp_die();

    }

    /**
     * Ajax: Get Car Production Years.
     *
     * @since    1.0.0
     */
    public function get_car_years() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $brand  = Tirestan_Security::secure_post_field( 'brand' );
        $model  = Tirestan_Security::secure_post_field( 'model' );
        $car    = new Tirestan_Car();
        $output = array(
            'years' => array(),
            'error' => '0',
        );

        $output['years'] = $car->get_years( $brand, $model );

        echo json_encode( $output );
        wp_die();

    }

    /**
     * Ajax: Get YITH Brands.
     *
     * @since    1.0.0
     */
    public function get_yith_brands() {

        // Verify Nonce
        Tirestan_Security::verify_ajax_nonce();

        $category     = Tirestan_Security::secure_post_field( 'category' );
        $brands       = new Tirestan_Filter();
        $output       = array(
            'brands' => array(),
            'error'  => '0',
        );

        $output['brands'] = $brands->get_yith_brands( $category );

        echo json_encode( $output );
        wp_die();

    }

}
