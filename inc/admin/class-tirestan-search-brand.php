<?php

/**
 * The admin brand tab in the car search functionality of the theme.
 *
 * @link     https://www.nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 */

/**
 * The admin brand tab in the car search functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Search_Brand {

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
    const SETTINGS_OPTION = 'car_brands';

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

        // If the theme settings don't exist, create them.
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

        $brands = $this->get_settings();
        ?>

        <!-- Brand & Model -->
        <h2>برند و مدل</h2>
        <table class="form-table">
            <tr>
                <th>
                    <label for="ts-search-brand-parent">مادر دسته:</label>
                </th>
                <td>
                    <select title="Parent" name="parent" id="ts-search-brand-parent">
                        <option value="">بدون مادر</option>
                        <?php foreach ( $brands as $brand => $brand_array ) { ?>

                            <option value="<?php echo esc_attr( $brand ); ?>">
                                <?php echo esc_html( $brand ); ?>
                            </option>

                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="ts-search-brand-name">نام دسته:</label>
                </th>
                <td>
                    <input type="text" name="name" title="Name" id="ts-search-brand-name" />
                </td>
            </tr>
        </table>
        <p class="submit" style="clear: both;">
            <input type="button" name="add" class="button-primary"
                   value="افزودن" id="ts-search-brand-add" />
        </p>

        <!-- Edit -->
        <h2>ویرایش برند و مدل</h2>
        <table class="form-table">
            <tr>
                <th>
                    <label for="ts-search-brand-oldName">انتخاب دسته:</label>
                </th>
                <td>
                    <select title="Old Name" name="oldName" id="ts-search-brand-oldName">
                        <?php foreach ( $brands as $brand => $brand_array ) { ?>

                            <option value="<?php echo esc_attr( $brand ); ?>" data-parent="">
                                <?php echo esc_html( $brand ); ?>
                            </option>

                            <?php foreach ( $brand_array as $model => $model_array ) { ?>
                                <option value="<?php echo esc_attr( $model ); ?>"
                                        data-parent="<?php echo esc_attr( $brand ); ?>">
                                    -- <?php echo esc_html( $model ); ?>
                                </option>
                            <?php } ?>

                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="ts-search-brand-newName">نام جدید:</label>
                </th>
                <td>
                    <input type="text" name="newName" title="New Name" id="ts-search-brand-newName" />
                </td>
            </tr>
        </table>
        <p class="submit" style="clear: both;">
            <input type="button" name="edit" class="button-primary"
                   id="ts-search-brand-edit" value="ویرایش" />
            <input type="button" name="remove" class="button-primary"
                   id="ts-search-brand-remove" value="حذف" />
        </p>
        <?php

    }

    /**
     * Check whether brand name exists or not.
     *
     * @since     1.0.0
     * @access    private
     * @param     string    $brand_name    Name of brand
     * @return    bool
     */
    private function is_brand_exists( $brand_name ) {

        $brands_array = $this->get_settings();

        foreach ( $brands_array as $brand => $brand_array ) {
            if ( $brand == $brand_name ) {
                return true;
            }
        }

        return false;

    }

    /**
     * Check whether model name exists or not.
     *
     * @since     1.0.0
     * @access    private
     * @param     string    $brand_name    Name of brand
     * @param     string    $model_name    Name of model
     * @return    bool
     */
    private function is_model_exists( $brand_name, $model_name ) {

        $brands_array = $this->get_settings();
        $brand_array  = $brands_array[$brand_name];

        foreach ( $brand_array as $model => $model_array ) {
            if ( $model == $model_name ) {
                return true;
            }
        }

        return false;

    }

    /**
     * Ajax: add brand.
     *
     * @since    1.0.0
     */
    public function ajax_add_brand() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $parent       = Tirestan_Security::secure_post_field( 'parent' );
        $name         = Tirestan_Security::secure_post_field( 'name' );
        $brands_array = $this->get_settings();

        if ( $parent ) { // If Parent Exists ...

            if ( $this->is_brand_exists( $parent ) ) { // Parent Found

                if ( $this->is_model_exists( $parent, $name ) ) { // Model Found
                    echo json_encode( array(
                        'error'   => 1,
                        'message' => 'این مدل وجود دارد',
                    ) );
                    wp_die();
                } else { // OK
                    $brands_array[$parent][$name] = array();
                    if ( $this->update_settings( $brands_array ) ) {
                        echo json_encode( array(
                            'error' => 0,
                            'data'  => 'ok',
                        ) );
                        wp_die();
                    }
                }

            } else { // No Parent Found

                echo json_encode( array(
                    'error'   => 1,
                    'message' => 'مادر دسته ای با این نام وجود ندارد!',
                ) );
                wp_die();

            }

        } else { // No Parent Exists ...

            if ( $this->is_brand_exists( $name ) ) {
                echo json_encode( array(
                    'error'   => 1,
                    'message' => 'این برند وجود دارد',
                ) );
                wp_die();
            } else { // OK
                $brands_array[$name] = array();
                if ( $this->update_settings( $brands_array ) ) {
                    echo json_encode( array(
                        'error' => 0,
                        'data'  => 'ok',
                    ) );
                    wp_die();
                }
            }


        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'خطای داخلی سرور',
        ) );
        wp_die();

    }

    /**
     * Ajax: update brand.
     *
     * @since    1.0.0
     */
    public function ajax_update_brand() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $parent       = Tirestan_Security::secure_post_field( 'parent' );
        $old_name     = Tirestan_Security::secure_post_field( 'old_name' );
        $new_name     = Tirestan_Security::secure_post_field( 'new_name' );
        $brands_array = $this->get_settings();

        if ( $parent && $this->is_brand_exists( $parent ) &&
            $this->is_model_exists( $parent, $old_name ) ) { // If Target Is Model

            if ( $this->is_model_exists( $parent, $new_name ) ) {
                echo json_encode( array(
                    'error'   => 1,
                    'message' => 'این مدل وجود دارد',
                ) );
                wp_die();
            } else {
                $brands_array[$parent][$new_name] = $brands_array[$parent][$old_name];
                unset( $brands_array[$parent][$old_name] );
                if ( $this->update_settings( $brands_array ) ) {
                    echo json_encode( array(
                        'error' => 0,
                        'data'  => 'ok',
                    ) );
                    wp_die();
                }
            }

        } else { // Target Is Brand

            if ( $this->is_brand_exists( $new_name ) ) {
                echo json_encode( array(
                    'error'   => 1,
                    'message' => 'این برند وجود دارد',
                ) );
                wp_die();
            } else {
                $brands_array[$new_name] = $brands_array[$old_name];
                unset( $brands_array[$old_name] );
                if ( $this->update_settings( $brands_array ) ) {
                    echo json_encode( array(
                        'error' => 0,
                        'data'  => 'ok',
                    ) );
                    wp_die();
                }
            }

        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'چنین برند یا مدلی برای ویرایش پیدا نشد',
        ) );
        wp_die();

    }

    /**
     * Ajax: delete brand.
     *
     * @since    1.0.0
     */
    public function ajax_delete_brand() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $parent       = Tirestan_Security::secure_post_field( 'parent' );
        $target_name  = Tirestan_Security::secure_post_field( 'target_name' );
        $brands_array = $this->get_settings();

        if ( $parent && $this->is_brand_exists( $parent ) &&
            $this->is_model_exists( $parent, $target_name ) ) { // If Target Is Model

            unset( $brands_array[$parent][$target_name] );
            if ( $this->update_settings( $brands_array ) ) {
                echo json_encode( array(
                    'error' => 0,
                    'data'  => 'ok',
                ) );
                wp_die();
            }

        } else { // Target Is Brand

            if ( $this->is_brand_exists( $target_name ) ) {
                unset( $brands_array[$target_name] );
                if ( $this->update_settings( $brands_array ) ) {
                    echo json_encode( array(
                        'error' => 0,
                        'data'  => 'ok',
                    ) );
                    wp_die();
                }
            }

        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'چنین برند یا مدلی برای حذف پیدا نشد',
        ) );
        wp_die();

    }

}
