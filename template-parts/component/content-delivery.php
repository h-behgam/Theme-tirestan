<?php
/**
 * The default template for displaying product delivery content
 */

$express_delivery = get_post_meta( get_the_ID(),'tyre-express', true );
?>

<div class="ts-prd-delivery <?php if ( ! $express_delivery ) echo 'ts-prd-delivery-normal'; ?>">

    <i class="tsi tsi-clock ts-prd-delivery-clock"></i>
    <span class="ts-prd-delivery-title">زمان تحویل:</span>

    <?php if ( $express_delivery ) { ?>

        <i class="tsi tsi-shipping-fast ts-prd-delivery-truck" title="ارسال فوری"></i>
        <h6 class="ts-tooltip-wrap">
            ارسال فوری
            <span class="ts-tooltip">
                این محصول در کمتر از یک ساعت در شهر تهران تحویل داده می شود
            </span>
        </h6>

    <?php } else { ?>

        <h6>ارسال معمولی</h6>

    <?php } ?>

</div>
