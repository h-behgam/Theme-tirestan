<?php
/**
 * The default template for displaying product subtitle content
 */

$brand = ( get_the_terms( get_the_ID(), 'pa_brand' ) ) ?
    get_the_terms( get_the_ID(), 'pa_brand' )[0] : false;
$gol   = ( get_the_terms( get_the_ID(), 'pa_gol' ) ) ?
    get_the_terms( get_the_ID(), 'pa_gol' )[0] : false;
?>

<span class="ts-prd-subtitle">

    <?php
    if ( $brand ) { ?>

        <span><?php echo esc_html( $brand->name ) . ' '; ?></span>

    <?php }
    if ( $gol ) { ?>

        <span><?php echo esc_html( $gol->name ) . ' '; ?></span>

    <?php }
    ?>

</span>
