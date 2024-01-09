<?php
/**
 * The default template for displaying product short info content
 */

$info = get_post_meta( get_the_ID(),'tyre-short-info', true );
?>

<p class="ts-prd-info">

    <?php
    if ( $info ) {
        echo esc_html( $info );
    }
    ?>

</p>
