<?php
/**
 * The default template for displaying product price content
 */

$sale_price    = get_post_meta( get_the_ID(),'_sale_price', true );
$regular_price = get_post_meta( get_the_ID(),'_regular_price', true );
?>

<div class="ts-prd-price">

    <?php if ( $sale_price || $regular_price ) { ?>

        <span class="ts-prd-price-ring">هر حلقه</span>
        <span class="ts-prd-price-fee">
            <?php if ( $sale_price ) {
                echo esc_html( number_format( $sale_price ) );
            } else {
                echo esc_html( number_format( $regular_price ) );
            } ?>
            <span class="ts-prd-price-symbol">تومان</span>
        </span>

    <?php } ?>

</div>
