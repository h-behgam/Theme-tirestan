<?php
/**
 * The template for displaying shop product helper.
 */

$brand = ( isset( $_GET['car_brand'] ) ) ? sanitize_text_field( $_GET['car_brand'] ) : false;
$model = ( isset( $_GET['car_model'] ) ) ? sanitize_text_field( $_GET['car_model'] ) : false;
$year  = ( isset( $_GET['pro_year'] ) ) ? sanitize_text_field( $_GET['pro_year'] ) : false;

if ( ! ( $brand && $model && $year ) ) {
    return;
}

$brands_array = get_option( 'car_brands' ) ?? array();
$categories   = $brands_array[$brand][$model][$year] ?? array();
$alternatives = array();
?>

<div class="ts-container">
    <div class="ts-row ts-col-gap-10">
        <div class="ts-column ts-col-12">

            <div class="ts-box ts-shop-helper">

                <!-- Header -->
                <div class="ts-shop-helper-header">

                    <span>مدل ماشین انتخابی شما:</span>
                    <b>
                        <?php echo esc_html( $brand ) . ' ' . esc_html( $model ) . ' سال ' . esc_html( $year ); ?>
                    </b>

                    <a href="<?php echo home_url( '', 'https' ); ?>">
                        <button type="button" class="ts-button ts-button-orange">بازگشت به صفحه اصلی</button>
                    </a>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
                        <button type="button" class="ts-button ts-button-orange">بازگشت به فروشگاه</button>
                    </a>

                </div>

                <!-- Body -->
                <div class="ts-shop-helper-body">

                    <p>لطفا دفترچه راهنمای خودروی خود را برای اطلاع از مشخصات لاستیک چک کنید.</p>

                    <?php if ( is_array( $categories ) and $categories ) { ?>

                        <div class="ts-shop-helper-body-title">دسته های مشابه:</div>
                        <div class="ts-shop-helper-box">

                            <?php
                            foreach ( $categories as $cat_id => $cat_type ) {

                                if ( '0' == $cat_type ) { // If Cat Type == Both
                                    $cat = get_term_by( 'id', $cat_id, 'product_cat' );

                                    if ( $cat ) { ?>

                                        <a href="<?php echo get_term_link( $cat->term_id ); ?>">
                                            <span><?php echo esc_html( $cat->name ); ?></span>
                                        </a>

                                    <?php }

                                } elseif ( '1' == $cat_type || '2' == $cat_type ) { // If Cat Type == Front Or Rear

                                    $alternatives[$cat_id] = $cat_type;

                                }
                            }
                            ?>
                        </div>

                        <div class="ts-shop-helper-body-title">دسته های جایگزین:</div>
                        <div class="ts-shop-helper-box">

                            <?php foreach ( $alternatives as $cat_id => $cat_type ) {

                                $cat = get_term_by( 'id', $cat_id, 'product_cat' );
                                if ( $cat ) {
                                    if ( '1' == $cat_type ) { ?>

                                        <a href="<?php echo get_term_link( $cat->term_id ); ?>">
                                            <span><?php echo esc_html( $cat->name ); ?>(جلو) </span>
                                        </a>

                                    <?php } else { ?>

                                        <a href="<?php echo get_term_link( $cat->term_id ); ?>">
                                            <span><?php echo esc_html( $cat->name ); ?>(عقب) </span>
                                        </a>

                                    <?php }
                                }

                            } ?>
                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
</div>
