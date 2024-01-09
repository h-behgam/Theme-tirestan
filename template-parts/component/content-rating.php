<?php
/**
 * The default template for displaying product star rating content
 */

global $product;

$average = $product->get_average_rating();
?>

<div class="ts-prd-rating">

    <div class="ts-prd-rating-stars">
        <i class="tsr tsr-star"></i>
        <i class="tsr tsr-star"></i>
        <i class="tsr tsr-star"></i>
        <i class="tsr tsr-star"></i>
        <i class="tsr tsr-star"></i>

        <span style="width: <?php echo esc_attr( ( ( $average / 5 ) * 100 ) ) ?>%;">
            <i class="tsi tsi-star"></i>
            <i class="tsi tsi-star"></i>
            <i class="tsi tsi-star"></i>
            <i class="tsi tsi-star"></i>
            <i class="tsi tsi-star"></i>
        </span>
    </div>

    <span class="ts-prd-rating-count">
        <?php echo esc_html( $product->get_rating_count() ); ?> دیدگاه
    </span>

</div>
