<?php
/**
 * The default template for displaying product production information content
 */

$pro_country = ( get_the_terms( get_the_ID(), 'pa_made-in' ) ) ?
    get_the_terms( get_the_ID(), 'pa_made-in' )[0] : false;
$pro_year    = ( get_the_terms( get_the_ID(), 'pa_pro-year' ) ) ?
    get_the_terms( get_the_ID(), 'pa_pro-year' )[0] : '';
?>

<div class="ts-prd-production">

    <?php if ( $pro_country && $pro_year ) { ?>

        <span>تولید:</span>
        <b>
            <span><?php echo esc_html( $pro_country->name ) . ' '; ?></span>
            <span><?php echo esc_html( $pro_year->name ); ?></span>
        </b>

    <?php } ?>

</div>
