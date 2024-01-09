<?php
/**
 * The default template for displaying product buy button content
 */

global $tirestan;

$stock = ( get_post_meta( get_the_ID(),'_stock', true ) ) ?
    get_post_meta( get_the_ID(),'_stock', true ) : '0';
$stock = intval( $stock );
?>

<div class="ts-prd-buy">

    <?php if ( $stock > 0 ) { ?>

        <?php if ( 'shop' === $tirestan->location ) { ?>

            <a href="<?php echo get_the_permalink(); ?>" class="ts-prd-buy-button-column">
                <button type="button" class="ts-button ts-button-orange">مشاهده محصول</button>
            </a>

        <?php } ?>

        <a href="<?php echo esc_url( home_url( '?add-to-cart=' . get_the_ID() ) ); ?>"
           class="ts-prd-buy-button-row">
            <button type="submit" name="add-to-cart" value="<?php echo get_the_ID(); ?>"
                    class="ts-button ts-button-orange">خرید محصول</button>
        </a>

    <?php } else { ?>

        <?php if ( 'shop' === $tirestan->location ) { ?>

            <a href="<?php echo get_the_permalink(); ?>" class="ts-prd-buy-button-column">
                <button type="button"
                        class="ts-button ts-button-white ts-button-disabled">مشاهده محصول</button>
            </a>

        <?php } ?>

        <button type="button"
                class="ts-button ts-button-white ts-button-disabled ts-prd-buy-button-row">موجود نیست</button>

    <?php } ?>

</div>
