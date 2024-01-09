<?php

/**
 * The search by car functionality for public-facing.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 */

/**
 * The search by car functionality for public-facing.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Car {

    /**
     * Retrieve car brands.
     *
     * @since     1.0.0
     * @return    array    Brands array.
     */
    public function get_brands() {

        $brands = get_option( 'car_brands' );
        $o      = array();

        if ( $brands ) {
            foreach ( $brands as $brand => $brand_obj ) {
                array_push( $o, $brand );
            }
        }
        sort( $o );
        return $o;

    }

    /**
     * Retrieve car models by car brand.
     *
     * @since     1.0.0
     * @param     string    $brand    Car brand
     * @return    array     Models array.
     */
    public function get_models( $brand ) {

        $brands = get_option( 'car_brands' );
        $o      = array();

        if ( $brands ) {

            $models = isset( $brands[$brand] ) ? $brands[$brand] : array();
            if ( $models ) {
                foreach ( $models as $model => $model_obj ) {
                    array_push( $o, $model );
                }
            }
        }
        sort( $o );
        return $o;

    }

    /**
     * Retrieve car production years by car brand and model.
     *
     * @since     1.0.0
     * @param     string    $brand    Car brand
     * @param     string    $model    Car model
     * @return    array     Years array.
     */
    public function get_years( $brand, $model ) {

        $brands = get_option( 'car_brands' );
        $o      = array();

        if ( $brands ) {

            $years = $brands[$brand][$model];
            if ( $years ) {
                foreach ( $years as $year => $categories ) {
                    array_push( $o, $year );
                }
            }
        }
        sort( $o );
        return $o;

    }



}
