<?php

/**
 * The security functionality of the theme.
 *
 * @link     https://www.nik96.me
 * @since    1.0.0
 *
 * @package    Tirestan
 */

/**
 * The security functionality of the theme.
 *
 * @package    Tirestan
 * @author     Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Security {

    /**
     * Verify User Capability.
     *
     * @static
     * @since     1.0.0
     */
    public static function verify_user_capability() {

        if ( ! current_user_can( 'manage_options' ) ) {

            wp_die( json_encode( array(
                'data'  => '',
                'error' => 'ACCESS_DENIED',
            ) ) );

        }

    }

    /**
     * Verify ajax nonce.
     *
     * @static
     * @since     1.0.0
     */
    public static function verify_ajax_nonce() {

        if ( ! ( isset( $_POST['_wpnonce'] )
            && wp_verify_nonce( $_POST['_wpnonce'], 'ts_ajax_nonce' ) ) ) {

            wp_die( json_encode( array(
                'data'  => '',
                'error' => 'ACCESS_DENIED',
            ) ) );

        }

    }

    /**
     * Sanitize field.
     *
     * @static
     * @since     1.0.0
     * @param     string    $field       The field variable.
     * @param     mixed     $default     The default value.
     * @return    mixed
     */
    public static function secure_post_field( $field, $default = '' ) {

        if ( isset( $_POST[$field] ) ) {
            return sanitize_text_field( $_POST[$field] );
        }

        return $default;

    }

    /**
     * Sanitize array.
     *
     * @static
     * @since     1.0.0
     * @param     string    $field       The field variable.
     * @return    array
     */
    public static function secure_post_array( $field ) {

        if ( isset( $_POST[$field] ) ) {
            return json_decode( stripslashes( $_POST[$field] ) );
        }

        return array();

    }

}
