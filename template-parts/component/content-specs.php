<?php
/**
 * The default template for displaying product specs content
 */

$size         = ( get_the_terms( get_the_ID(), 'pa_size' ) ) ?
    get_the_terms( get_the_ID(), 'pa_size' )[0] : false;
$width        = ( get_the_terms( get_the_ID(), 'pa_width' ) ) ?
    get_the_terms( get_the_ID(), 'pa_width' )[0] : false;
$aspect_ratio = ( get_the_terms( get_the_ID(), 'pa_aspect-ratio' ) ) ?
    get_the_terms( get_the_ID(), 'pa_aspect-ratio' )[0] : false;
?>

<span class="ts-prd-specs">

    <?php
    if ( $width ) {
	    echo esc_html( $width->name ) . '/';
    }
    if ( $aspect_ratio ) {
	    echo esc_html( $aspect_ratio->name ) . 'R';
    }
    if ( $size ) {
	    echo esc_html( $size->name );
    }
    ?>

</span>
