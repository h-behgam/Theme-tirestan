<?php
/**
 * The default template for displaying product category content
 */

$categories = get_the_terms( get_the_ID(), 'product_cat' );
?>

<span class="ts-prd-categories">

    <?php
    foreach ( $categories as $category ) {
        if ( $category->term_id == get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', true ) ) {
            echo esc_html( $category->name );
            break;
        }
    }
    ?>

</span>
