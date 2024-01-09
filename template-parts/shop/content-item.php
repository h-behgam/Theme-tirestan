<?php
/**
 * The default template for displaying product item content
 */

// $background   = get_post_meta( get_the_ID(), 'tyre-bg-image', true );
// $status       = get_post_meta( get_the_ID(), 'tyre-status', true );
// $status_class = ( 'a' === $status || 'b' === $status ) ? 'ts-prd-special' : 'ts-prd-normal';
?>

<div class="product ts-column ts-col-12 ts-shop-item-wrap shadow radius-10 gray">
    <article class="produc-detailsts-box ts-prd ts-shop-item <?php echo esc_attr( $status_class ); ?>" data-id="<?php echo get_the_ID(); ?>"
             style="<?php if ( $background ) echo 'style="background-image: url('. esc_url( $background ) .');"'; ?>">

        <div class="ts-row">

            <!-- Header -->
            <?php get_template_part( 'template-parts/shop/item', 'header' ); ?>

            <!-- Body -->
            <?php get_template_part( 'template-parts/shop/item', 'body' ); ?>

            <!-- Footer -->
            <?php get_template_part( 'template-parts/shop/item', 'footer' ); ?>

        </div>

        <!-- Item Preview -->
        <div class="ts-shop-preview-wrap2"
             data-id="<?php echo get_the_ID(); ?>"
             data-status="off">
        </div>

    </article>
</div>
