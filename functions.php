<?php
/* 
Created on : Apr 9, 2023, 5:51:35 PM
Author     : Mohammad Hadi Behgam
Email      : h.behgam@gmail.com
Tel        : 09379874085
*/

define("PATH", get_template_directory_uri());
require_once dirname(__FILE__) . '/plugins/cmb2/init.php';
require_once dirname(__FILE__) . '/functions/cmb2-functions.php';


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

add_filter('woocommerce_sale_flash', 'woocommerce_change_sale_flash', 10);
function woocommerce_change_sale_flash()
{
    return '<p class="sale">فروش ویژه</p>';
}
;
// conditions_checkbox_text
add_filter( 'woocommerce_get_terms_and_conditions_checkbox_text', 'custom_terms_and_conditions_checkbox_text' );
function custom_terms_and_conditions_checkbox_text( $text ){
    $text = 'قوانین و مقررات را خواندم <a href="#">aa</a>';
    return $text;
}

//
add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');

// overwrite existing output content wrapper function
function woocommerce_output_content_wrapper()
{
    echo '<div id="primary" class="content-area wrappers">
			<div class="content-products">';
}

add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

function woocommerce_output_content_wrapper_end()
{
    echo '</div>
			</div>';
}

function tirestan_setup()
{
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    register_nav_menus(
        array(
            'header-main-menu' => 'منوی اصلی',
            'footer-sidbar1' => 'منوی پایین اول',
            'footer-sidbar2' => 'منوی پایین دوم',
        )
    );
}
add_action("after_setup_theme", "tirestan_setup");
function tirestan_enqueue()
{
    wp_enqueue_style('style', PATH . '/css/style.css', array(), '1.8.0');
    wp_enqueue_style('swiper-bundel', PATH . '/css/swiper-bundle.min.css');

    wp_enqueue_script('swiperJs', PATH . '/js/swiper-bundle.min.js', array(), '', true);
    wp_enqueue_script('index', PATH . '/js/main.js', array(), '1.8.0', true);
}
add_action('wp_enqueue_scripts', 'tirestan_enqueue');

/* */
add_filter('woocommerce_product_tabs', 'woo_new_product_tab');
function woo_new_product_tab($tabs)
{
    $tabs['test_tab'] = array(
        'title' => __('عملکرد', 'woocommerce'),
        'priority' => 50,
        'callback' => 'woo_new_product_tab_content'
    );
    return $tabs;
}
function woo_new_product_tab_content()
{
    wc_get_template_part('woocommerce/content', 'performance');
}

/*
 * sort comments field
 */
add_filter('comment_form_fields', 'codesanjal_move_comment_field');
function codesanjal_move_comment_field($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
/*
 *
 */
function tirestan_sidebar()
{
    register_sidebar(
        array(
            'name' => 'ابزارک فوتر',
            'id' => 'footer1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => 'ابزارک فوتر2',
            'id' => 'footer2',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => 'ابزارک فوتر3',
            'id' => 'footer3',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        )
    );
    register_sidebar(
        array(
            'name' => 'ابزارک فروشگاه',
            'id' => 'shop',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<strong>',
            'after_title' => '</strong>',
        )
    );
}
add_action('widgets_init', 'tirestan_sidebar');



// add_filter( 'comments_template', function() { return '/comments.php'; }, 30 );
function woocommerce_comments()
{
    global $product;
    global $comment;
    $rjs_comment_email = get_comment_author_email();
    $rjs_gravatar = get_avatar($rjs_comment_email, 160);
    $avg_rate_score = number_format($product->get_average_rating(), 1);
    $review_count = get_comment_meta($comment->comment_ID, 'rating', true); ?>


    <li class="review even thread-even" id="comment-<?php comment_ID() ?>">
        <div class="comment_container" id="comment-<?php comment_ID() ?>">
            <div class="comment-text">
                <div class="comment-textTop">
                    <div class="rh_woo_star"
                        title="<?php printf(esc_html__('Rated %s out of 5', 'rehub-theme'), $review_count); ?>">
                        <?php for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $review_count) {
                                $active = ' active';
                            } else {
                                $active = '';
                            }
                            echo '<span class="rhwoostar rhwoostar' . $i . $active . '">&#9733;</span>';
                        } ?>
                    </div>

                    <?php if (get_option('show_avatars', true)): ?>
                        <div class="comment-authorimage">
                            <?php if ($rjs_gravatar) {
                                echo $rjs_gravatar;
                            } ?>
                        </div>
                    <?php endif; ?>

                    <div class="comment-authorinfo sans">
                        <?php if (get_comment_author_url()): ?>
                            <a href="<?php echo get_comment_author_url(); ?>" rel="external nofollow ugc"
                                class="comment-authorurl comment-authorname url"><?php echo get_comment_author(); ?></a>
                        <?php else: ?>
                            <p class="comment-authorname">
                                <?php echo get_comment_author(); ?>
                            </p>
                        <?php endif; ?>
                        <p class="comment-date">
                            <?php echo get_comment_date(); ?>
                        </p>
                    </div>
                    <div class="commentRole">
                        <p>
                            <?php $user_id = $comment->user_id;
                            if ($user_id) {
                                $user_info = get_userdata($user_id);
                                if (is_array($user_info)) {
                                    echo implode(', ', $user_info->roles);
                                } else {
                                    echo 'مدیر';
                                }
                            } else {
                                echo 'خریدار';
                            } ?>
                        </p>
                    </div>
                </div>

                <p class="comment-text">
                    <?php echo get_comment_text(); ?>
                </p>

                <div class="comment-reply">
                    <?php comment_reply_link([
                        'add_below' => true,
                        'depth' => 20,
                        'max_depth' => 200,
                        'before' => '<div class="reply">',
                        'after' => '</div>'
                    ]); ?>
                </div>
            </div>
        </div>
    </li>
<?php }


function season($season)
{
    switch ($season) {
        case 'تابستانی':
            echo '<img src="' . PATH . '/image/icon/group5.png' . '" alt="' . $season . '">';
            break;

        case 'چهار فصل':
            echo '<img src="' . PATH . '/image/icon/group6.png' . '" alt="' . $season . '">';
            break;

        case 'زمستانی':
            echo '<img src="' . PATH . '/image/icon/group6.png' . '" alt="' . $season . '">';
            break;

        default:
            break;
    }
}

function sales_price($regular_price, $sale_price)
{
    if (intval($sale_price)) {

        $_reg_price = floatval(strip_tags($regular_price));
        $_sale_price = floatval(strip_tags($sale_price));

        // Percentage calculation and text
        $percentage = round(($_reg_price - $_sale_price) / $_reg_price * 100) . '%';
        $percentage_txt = ' ' . __(' Save ', 'woocommerce') . $percentage;

        echo '<span>' . $percentage . '</span>';
    }
}
function back_to_shop()
{
    $shop_page_url = get_permalink(wc_get_page_id('shop'));
    return $shop_page_url;
}
add_filter('woocommerce_get_availability_text', 'themeprefix_change_soldout', 10, 2);
function themeprefix_change_soldout($text, $product)
{
    if (!$product->is_in_stock()) {
        $text = '<div class="out-of-stock">0</div>';
    }
    return $text;
}


/*
 *
 *
 *
 *
 *
 *
 */


$GLOBALS['tirestan'] = new stdClass();

/*
 * Enqueue Styles & Scripts
 */
add_action('wp_enqueue_scripts', function () {
    global $tirestan;
    $attributes = array(
        'pa_aspect-ratio',
        'pa_brand',
        'pa_energy',
        'pa_gol',
        'pa_layer',
        'pa_load-index',
        'pa_made-in',
        'pa_oem-marking',
        'pa_pro-year',
        'pa_rain',
        'pa_season',
        'pa_size',
        'pa_sound',
        'pa_speed-rating',
        'pa_usage',
        'pa_width',
        'yith_product_brand'
    );

    $tirestan->isShop = is_shop() || is_product_category() || is_product_tag() || is_tax($attributes);
    $tirestan->isProduct = is_singular('product');
    $paren_handle = 'parent-style';
    wp_enqueue_style(
        $paren_handle, get_template_directory_uri() . '/style.css',
        array(),
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($paren_handle),
    );
    if ($tirestan->isShop) {
        wp_enqueue_style(
            'child-style-shop', get_stylesheet_directory_uri() . '/assets/css/shop.css',
            array($paren_handle),
        );
    }
    wp_enqueue_script(
        'tirestan', get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        true
    );

    ts_localize_script();

});

/*
 * Localize Scripts
 */
function ts_localize_script()
{

    global $tirestan;

    $arr = array(
        'is_shop' => $tirestan->isShop,
        'is_product' => $tirestan->isProduct,
        'ajax_url' => admin_url('admin-ajax.php'),
        'shop_url' => get_permalink(wc_get_page_id('shop')),
        'nonce' => wp_create_nonce('ts_ajax_nonce'),
    );

    // Search & Filter
    if ($tirestan->isShop) {

        $url = $_SERVER['REQUEST_URI'];
        $paths = explode('/', $url);

        $arr['car_brand'] = isset($_GET['car_brand']) ? sanitize_text_field($_GET['car_brand']) : '';
        $arr['car_model'] = isset($_GET['car_model']) ? sanitize_text_field($_GET['car_model']) : '';
        $arr['car_year'] = isset($_GET['pro_year']) ? sanitize_text_field($_GET['pro_year']) : '';
        $arr['width'] = isset($_GET['width']) ? sanitize_text_field($_GET['width']) : '';
        $arr['aspect_ratio'] = isset($_GET['aspect_ratio']) ? sanitize_text_field($_GET['aspect_ratio']) : '';
        $arr['size'] = isset($_GET['size']) ? sanitize_text_field($_GET['size']) : '';
        $arr['category'] = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

        // Category and Tag
        if (in_array('product-tag', $paths) || in_array('product-category', $paths)) {
            $param = $paths[sizeof($paths) - 2];
            if (in_array('product-tag', $paths)) {
                $arr['tag'] = $param;
            } else {
                $arr['category'] = $param;
            }
        }

        // YITH Brand
        if (in_array('product-brands', $paths)) {
            $brand_term = get_term_by('slug', $paths[sizeof($paths) - 2], 'yith_product_brand');
            if ($brand_term) {
                $arr['tire_brand'] = $brand_term->name;
            }
        }

    }

    wp_localize_script('tirestan', 'tirestan', $arr);

}

/*
 * Add WooCommerce Support
 */
add_action('after_setup_theme', function () {
    add_theme_support('woocommerce');
});

/*
 * Register Custom Archive Products Template
 */
add_filter('template_include', function ($template) {

    $attributes = array(
        'pa_aspect-ratio',
        'pa_brand',
        'pa_energy',
        'pa_gol',
        'pa_layer',
        'pa_load-index',
        'pa_made-in',
        'pa_oem-marking',
        'pa_pro-year',
        'pa_rain',
        'pa_season',
        'pa_size',
        'pa_sound',
        'pa_speed-rating',
        'pa_usage',
        'pa_width',
        'yith_product_brand'
    );

    if (is_shop() || is_product_category() || is_product_tag() || is_tax($attributes)) {
        $new_template = locate_template(array('archive-product.php'));
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}, 99);

/*
 * Register Custom Single Products Template
 */
add_filter('template_include', function ($template) {
    if (is_product()) {
        $new_template = locate_template(array('single-product.php'));
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}, 99);

/*
 * Add Order Tracking To Header
 */
add_action('wp_body_open', 'ts_add_to_body');
function ts_add_to_body()
{
    // Loading
    get_template_part('template-parts/header/header', 'loading');
    // Order Tracking
    get_template_part('template-parts/header/header', 'orderTracking');
}
add_action('admin_head', 'my_custom_fonts');
/*
 * Begins execution of the theme.
 */
require_once get_stylesheet_directory() . '/inc/class-tirestan.php';
function run_tirestan()
{
    $theme = new Tirestan();
    $theme->run();
}
/*  Remove Hentry for all pages that are not single blog posts */
function remove_hentry($classes)
{
    if (!is_single()) {
        $classes = array_diff($classes, array('hentry'));
        return $classes;
    } else {
        return $classes;
    }
}
add_filter('post_class', 'remove_hentry');
run_tirestan();