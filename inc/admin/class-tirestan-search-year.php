<?php

/**
 * The admin year tab in the car search functionality of the theme.
 *
 * @link     https://www.nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 */

/**
 * The admin year tab in the car search functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Search_Year {

    /**
     * The settings option.
     *
     * @since     1.0.0
     * @access    private
     * @var       array    $settings    The settings option.
     */
    private $settings;

    /**
     * Admin settings option name.
     *
     * @since    1.0.0
     */
    const SETTINGS_OPTION = 'car_years';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->settings = array();

        $this->default_settings();

    }

    /**
     * Provides default values for settings.
     *
     * @since     1.0.0
     * @access    private
     */
    private function default_settings() {

        // If the plugin settings don't exist, create them.
        if ( false == get_option( $this::SETTINGS_OPTION ) ) {
            add_option( $this::SETTINGS_OPTION, array() );
        }

    }

    /**
     * Get settings option.
     *
     * @since     1.0.0
     * @access    private
     * @return    array
     */
    private function get_settings() {

        if ( empty( $this->settings ) ) {
            $this->settings = get_option( $this::SETTINGS_OPTION );
        }
        return $this->settings;

    }

    /**
     * Update settings option.
     *
     * @since     1.0.0
     * @access    private
     * @param     array    $options    New options.
     * @return    bool
     */
    private function update_settings( $options ) {

        return update_option( $this::SETTINGS_OPTION, $options );

    }

    /**
     * Render content.
     *
     * @since    1.0.0
     */
    public function render_content() {

        $years = $this->get_settings();
        ?>

        <!-- Brand & Model -->
        <h1>سال تولید</h1>
        <table class="form-table">
            <tr>
                <th>
                    <label>انتخاب سال:</label>
                </th>
                <td>
                    <div class="ts-search-box">
                        <?php
                        if ( $years ) {
                            foreach ( $years as $year ) {
                                ?>
                                <div class="ts-search-box-mini">
                                    <input type="checkbox" title="Year" name="year"
                                           value="<?php echo esc_attr( $year ); ?>"
                                           class="ts-search-year-checkbox" />
                                    <label><?php echo esc_html( $year ); ?></label>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="ts-search-year-name">نام سال:</label>
                </th>
                <td>
                    <input type="text" name="year" title="Year" id="ts-search-year-name" />
                </td>
            </tr>
        </table>
        <p class="submit" style="clear: both;">
            <input type="button" name="add" class="button-primary"
                   value="افزودن" id="ts-search-year-add" />
            <input type="button" name="delete" class="button-primary"
                   value="حذف" id="ts-search-year-delete" />
        </p>
        <?php

    }

    /**
     * Ajax: add year.
     *
     * @since    1.0.0
     */
    public function ajax_add_year() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $year        = Tirestan_Security::secure_post_field( 'year' );
        $years_array = $this->get_settings();

        // Year Not Exist
        if ( ! in_array( $year, $years_array ) ) {
            array_push( $years_array, $year );
            sort( $years_array );
            if ( $this->update_settings( $years_array ) ) {
                echo json_encode( array(
                    'error' => 0,
                    'data'  => 'ok',
                ) );
                wp_die();
            }
        } else {
            echo json_encode( array(
                'error'   => 1,
                'message' => 'این سال تولید وجود دارد',
            ) );
            wp_die();
        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'مشکلی در افزودن سال رخ داد',
        ) );
        wp_die();

    }

    /**
     * Ajax: add year.
     *
     * @since    1.0.0
     */
    public function ajax_delete_year() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $years       = Tirestan_Security::secure_post_array( 'years' );
        $years_array = $this->get_settings();

        foreach ( $years as $year ) {
            $index = array_search( $year, $years_array );
            if ( false !== $index ) {
                unset( $years_array[$index] );
            }
        }

        if ( $this->update_settings( $years_array ) ) {
            echo json_encode( array(
                'error' => 0,
                'data'  => 'ok',
            ) );
            wp_die();
        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'چنین سالی وجود ندارد',
        ) );
        wp_die();

    }

}
