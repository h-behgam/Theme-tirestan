<?php
/**
 * The default template for displaying product thumbnail content
 */

global $tirestan;
?>

<div class="ts-prd-thumbnail">

    <?php
    if ( has_post_thumbnail() ) {

        if ( 'product' === $tirestan->location ) {

            the_post_thumbnail( 'full', array(
                'data-zoom-image' => get_the_post_thumbnail_url(),
            ) );

        } else {

            the_post_thumbnail( 'full' );

        }

    }
    ?>

</div>
