<?php

/**
 * The admin category tab in the car search functionality of the theme.
 *
 * @link     https://www.nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 */

/**
 * The admin category tab in the car search functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Search_Category {

    /**
     * The car brands settings option.
     *
     * @since     1.0.0
     * @access    private
     * @var       array    $settings_brand    The car brands settings option.
     */
    private $settings_brand;

    /**
     * The car years settings option.
     *
     * @since     1.0.0
     * @access    private
     * @var       array    $settings_year    The car years settings option.
     */
    private $settings_year;

    /**
     * The car brands settings option name.
     *
     * @since    1.0.0
     */
    const SETTINGS_OPTION_BRAND = 'car_brands';

    /**
     * The car years settings option name.
     *
     * @since    1.0.0
     */
    const SETTINGS_OPTION_YEAR = 'car_years';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->settings_brand = array();
        $this->settings_year  = array();

        $this->default_settings( 'brand' );
        $this->default_settings( 'year' );

    }

    /**
     * Provides default values for settings.
     *
     * @since     1.0.0
     * @param     string    $settings_name    Name of settings
     * @access    private
     */
    private function default_settings( $settings_name ) {

        $option_name = ( 'brand' === $settings_name ) ?
            $this::SETTINGS_OPTION_BRAND : $this::SETTINGS_OPTION_YEAR;

        // If the plugin settings don't exist, create them.
        if ( false == get_option( $option_name ) ) {
            add_option( $option_name, array() );
        }

    }

    /**
     * Get settings option.
     *
     * @since     1.0.0
     * @access    private
     * @param     string    $settings_name    Name of settings
     * @return    array
     */
    private function get_settings( $settings_name ) {

        if ( 'brand' === $settings_name ) {
            if ( empty( $this->settings_brand ) ) {
                $this->settings_brand = get_option( $this::SETTINGS_OPTION_BRAND );
            }
            return $this->settings_brand;
        } else {
            if ( empty( $this->settings_year ) ) {
                $this->settings_year = get_option( $this::SETTINGS_OPTION_YEAR );
            }
            return $this->settings_year;
        }

    }

    /**
     * Update settings option.
     *
     * @since     1.0.0
     * @access    private
     * @param     array     $options          New options.
     * @param     string    $settings_name    Name of settings
     * @return    bool
     */
    private function update_settings( $options, $settings_name ) {

        $option_name = ( 'brand' === $settings_name ) ?
            $this::SETTINGS_OPTION_BRAND : $this::SETTINGS_OPTION_YEAR;

        return update_option( $option_name, $options );

    }

    /**
     * Render content.
     *
     * @since    1.0.0
     */
    public function render_content() {

        $brands_array = $this->get_settings( 'brand' );
        $years_array  = $this->get_settings( 'year' );
        ?>
        <div class="wrap">
            <h2>افزودن</h2>
            <table class="form-table">
                <tr>
                    <th>
                        <label for="ts-search-cat-model">انتخاب مدل:</label>
                    </th>
                    <td>
                        <select title="Parent" name="model" id="ts-search-cat-model">
                            <option value=""></option>
                            <?php foreach ( $brands_array as $brand => $brand_array ) { ?>

                                <option value="<?php echo esc_attr( $brand ); ?>" disabled>
                                    <?php echo esc_html( $brand ); ?>
                                </option>

                                <?php foreach ( $brand_array as $model => $model_array ) { ?>
                                    <option value="<?php echo esc_attr( $model ); ?>">
                                        -- <?php echo esc_html( $model ); ?>
                                    </option>
                                <?php } ?>

                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>سال تولید:</label>
                    </th>
                    <td>
                        <div class="ts-search-box">
                            <?php foreach ( $years_array as $year ) { ?>

                                <div class="ts-search-box-mini">
                                    <input type="checkbox" class="ts-search-cat-checkbox-year"
                                           title="Year" name="year"
                                           value="<?php echo esc_attr( $year ); ?>" />
                                    <label><?php echo esc_html( $year ); ?></label>
                                </div>

                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>انتخاب دسته:</label>
                    </th>
                    <td>
                        <div class="ts-search-box">
                            <?php
                            $args = array(
                                'taxonomy'   => "product_cat",
                                'hide_empty' => false,
                                'orderby'    => 'name',
                                'order'      => 'ASC',
                            );
                            $cats = get_terms( $args );
                            foreach ( $cats as $cat ) {
                                if ( 4 === strpos( $cat->slug, "-" ) and intval( substr( $cat->slug, 5, -1 ) ) ) { ?>

                                    <div class="ts-search-box-mini">
                                        <label class="ts-search-label-bold">
                                            <?php echo ' سایز' . esc_html( $cat->name ); ?>
                                        </label>
                                    </div>

                                    <?php
                                    $id = $cat->term_id;
                                    foreach ( $cats as $child ) {
                                        if ( $child->parent == $id ) { ?>

                                            <div class="ts-search-box-mini">
                                                <input type="checkbox" class="ts-search-cat-checkbox-cat" title="Category"
                                                       name="categories" value="<?php echo esc_attr( $child->term_id ); ?>" />
                                                <label>
                                                    <?php echo esc_html( $child->name ); ?>
                                                </label>
                                            </div>

                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="ts-search-cat-type">نوع دسته:</label>
                    </th>
                    <td>
                        <select title="Type" name="type" id="ts-search-cat-type">
                            <option value="">هردو</option>
                            <option value="1">جلو</option>
                            <option value="2">عقب</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p class="submit" style="clear: both;">
                <input type="button" name="add" class="button-primary"
                       value="افزودن" id="ts-search-cat-add" />
            </p>

            <h2>نمایش و حذف</h2>
            <table class="form-table">
                <tr>
                    <th>
                        <label for="ts-search-cat-parent">انتخاب سال تولید:</label>
                    </th>
                    <td>
                        <select title="Parent" id="ts-search-cat-parent">
                            <option value=""></option>

                            <?php foreach ( $brands_array as $brand => $brand_array ) { ?>

                                <optgroup label="<?php echo esc_attr( $brand ); ?>">

                                    <?php foreach ( $brand_array as $model => $model_array ) { ?>

                                        <option value="<?php echo esc_attr( $model ); ?>" disabled>
                                            <?php echo esc_html( $model ); ?>
                                        </option>

                                        <?php foreach ( $model_array as $year => $year_array ) { ?>

                                            <option value="<?php echo esc_attr( $year ); ?>" data-brand="<?php echo esc_attr( $brand ); ?>"
                                                    data-model="<?php echo esc_attr( $model ); ?>">
                                                -- <?php echo esc_html( $year ); ?>
                                            </option>

                                            <?php foreach ( $year_array as $tag => $tag_type ) {
                                                $size = get_term_by( 'id', intval( $tag ), 'product_cat' );
                                                if ( 0 == $tag_type ) {
                                                    $tag_type = 'هردو';
                                                }
                                                if ( 1 == $tag_type ) {
                                                    $tag_type = 'جلو';
                                                }
                                                if ( 2 == $tag_type ) {
                                                    $tag_type = 'عقب';
                                                }
                                                ?>

                                                <option value="<?php echo esc_attr( $size->slug ); ?>" disabled>
                                                    ---
                                                    <?php echo esc_html( $size->name ) . ' ' . esc_html( $tag_type ); ?>
                                                </option>

                                                <?php
                                            }
                                        }
                                    }
                                    ?>

                                </optgroup>

                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <p class="submit" style="clear: both;">
                <input type="button" name="delete" class="button-primary"
                       value="حذف" id="ts-search-cat-delete" />
            </p>

        </div>
        <?php

    }

    /**
     * Ajax: add category.
     *
     * @since    1.0.0
     */
    public function ajax_add_category() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $model        = Tirestan_Security::secure_post_field( 'model' );
        $type         = Tirestan_Security::secure_post_field( 'type' );
        $years        = Tirestan_Security::secure_post_array( 'years' );
        $cats         = Tirestan_Security::secure_post_array( 'cats' );
        $brands_array = $this->get_settings( 'brand' );

        if ( ! $type ) {
            $type = 0;
        }

        foreach ( $years as $year ) {
            foreach ( $brands_array as $brand => $brand_array ) {
                if ( array_key_exists( $model, $brands_array[$brand] ) ) {
                    foreach ( $cats as $category ) {
                        $brands_array[$brand][$model][$year][$category] = $type;
                    }
                }
            }
        }

        if ( $this->update_settings( $brands_array, 'brand' ) ) {
            echo json_encode( array(
                'error' => 0,
                'data'  => 'ok',
            ) );
            wp_die();
        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'خطای داخلی سرور',
        ) );
        wp_die();

    }

    /**
     * Ajax: delete category.
     *
     * @since    1.0.0
     */
    public function ajax_delete_category() {

        Tirestan_Security::verify_user_capability();
        Tirestan_Security::verify_ajax_nonce();

        $target_brand = Tirestan_Security::secure_post_field( 'brand' );
        $target_model = Tirestan_Security::secure_post_field( 'model' );
        $target_year  = Tirestan_Security::secure_post_field( 'year' );
        $brands_array = $this->get_settings( 'brand' );

        foreach ( $brands_array as $brand => $brand_array ) {
            if ( $brand === $target_brand ) {
                foreach ( $brand_array as $model => $model_array ) {
                    if ( $model === $target_model ) {
                        if ( array_key_exists( $target_year, $brands_array[$brand][$model] ) ) {
                            unset( $brands_array[$brand][$model][$target_year] );
                            if ( $this->update_settings( $brands_array, 'brand' ) ) {
                                echo json_encode( array(
                                    'error' => 0,
                                    'data'  => 'ok',
                                ) );
                                wp_die();
                            }
                        }
                    }
                }
            }
        }

        echo json_encode( array(
            'error'   => 1,
            'message' => 'چنین دسته ای برای حذف وجود ندارد',
        ) );
        wp_die();

    }

}
