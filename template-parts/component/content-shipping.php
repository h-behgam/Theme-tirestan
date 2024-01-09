<?php
/**
 * The default template for displaying product shipping content
 */

$free_delivery = get_field('field_5b2b83812e265');
$instant_delivery = get_field('field_59c6382f616f9');
?>

<div class="ts-prd-shipping <?php if ($free_delivery)
    echo 'ts-prd-shipping-normal'; ?>">

    <!-- <i class="tsi tsi-truck"></i> -->

    <div>
        <?php if ($free_delivery) { ?>
            <img src="<?php echo PATH . '/image/icon/trucktick.png' ?>" alt="">
            <h6>ارسال رایگان</h6>

        <?php } else { ?>

            <h6>فاقد ارسال رایگان</h6>

        <?php } ?>
    </div>

    <div>
        <?php if ($instant_delivery) { ?>
            <img src="<?php echo PATH . '/image/icon/timer1.png' ?>" alt="">
            <h6>تحویل فوری</h6>

        <?php } else { ?>

            <h6>فاقد تحویل فوری</h6>

        <?php } ?>
    </div>

</div>