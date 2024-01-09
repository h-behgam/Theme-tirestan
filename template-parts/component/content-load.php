<?php
/**
 * The default template for displaying product load index content
 */

$load_index = ( get_the_terms( get_the_ID(), 'pa_load-index' ) ) ?
    get_the_terms( get_the_ID(), 'pa_load-index' )[0] : false;
?>

<span class="ts-prd-load-index ts-prd-specs-special ts-tooltip-wrap">

    <?php if ( $load_index ) { ?>

        <?php echo esc_html( $load_index->name ); ?>
        <span class="ts-tooltip">
            <span class="ts-tooltip-bold" dir="rtl">شاخص وزن:</span>
            <br />
            <span dir="ltr">
                <?php echo esc_html( $load_index->description ) . ' KG'; ?>
            </span>
        </span>
        <span class="ts-prd-load-index-info">حداکثر = <?php echo esc_html( $load_index->description ); ?> kg</span>

    <?php } ?>

</span>
