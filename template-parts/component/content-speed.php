<?php
/**
 * The default template for displaying product speed rating content
 */

$speed_rating = ( get_the_terms( get_the_ID(), 'pa_speed-rating' ) ) ?
    get_the_terms( get_the_ID(), 'pa_speed-rating' )[0] : false;
?>

<span class="ts-prd-speed ts-prd-specs-special ts-tooltip-wrap">

    <?php if ( $speed_rating ) { ?>

        <?php echo esc_html( $speed_rating->name ); ?>
        <span class="ts-tooltip">
            <span class="ts-tooltip-bold" dir="rtl">کد سرعت:</span>
            <br />
            <span dir="ltr">
                <?php echo esc_html( $speed_rating->description ) . ' km/h'; ?>
            </span>
        </span>
        <span class="ts-prd-speed-info">حداکثر = <?php echo esc_html( $speed_rating->description ); ?> km/h</span>

    <?php } ?>

</span>
