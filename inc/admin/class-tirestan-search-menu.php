<?php

/**
 * The admin car search menu functionality of the theme.
 *
 * @link     https://www.nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 */

/**
 * The admin car search menu functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/admin
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Search_Menu {

    /**
     * Admin menu slug.
     *
     * @since    1.0.0
     */
    const MENU_SLUG = 'tirestan_search';

    /**
     * Setup admin menu.
     *
     * @since    1.0.0
     */
    public function setup_menu() {

        add_submenu_page(
            'woocommerce',
            'جستجوی ماشین',
            'جستجوی ماشین',
            'manage_options',
            $this::MENU_SLUG,
            array( $this, 'render_menu' )
        );

    }

    /**
     * Render admin menu and panel.
     *
     * @since    1.0.0
     * @param    string    $active_tab    Active tab
     */
    public function render_menu( $active_tab = '' ) {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        settings_errors();
        ?>
        <div class="wrap">

            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <div class="ts-wrap">

                <?php
                if ( isset( $_GET['tab'] ) ) {
                    $active_tab = $_GET['tab'];
                } elseif ( 'year' == $active_tab ) {
                    $active_tab = 'year';
                } elseif ( 'category' == $active_tab ) {
                    $active_tab = 'category';
                } else {
                    $active_tab = 'brand';
                }
                ?>

                <h2 class="nav-tab-wrapper">
                    <a href="?page=tirestan_search&tab=brand"
                       class="nav-tab <?php if ( 'brand' === $active_tab ) echo 'nav-tab-active'; ?>">
                        برند و مدل
                    </a>
                    <a href="?page=tirestan_search&tab=year"
                       class="nav-tab <?php if ( 'year' === $active_tab ) echo 'nav-tab-active'; ?>">
                        سال تولید
                    </a>
                    <a href="?page=tirestan_search&tab=category"
                       class="nav-tab <?php if ( 'category' === $active_tab ) echo 'nav-tab-active'; ?>">
                        دسته جستجو
                    </a>
                </h2>

                <div class="tab-content">

                    <?php
                    if ( 'brand' === $active_tab ) {
                        do_action( 'ts_render_tab_brand' );
                    } elseif ( 'year' === $active_tab ) {
                        do_action( 'ts_render_tab_year' );
                    } elseif ( 'category' === $active_tab ) {
                        do_action( 'ts_render_tab_category' );
                    }
                    ?>

                </div>

            </div>

        </div>
        <!-- ./Wrap -->
        <?php

    }

}
