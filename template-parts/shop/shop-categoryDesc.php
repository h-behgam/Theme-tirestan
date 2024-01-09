<?php
/**
 * The template for displaying shop product category description.
 */

if ( ! ( is_product_category() and get_queried_object()->description ) ) {
    return;
}
?>

<div class="ts-container">
    <div class="ts-row ts-col-gap-10">
        <div class="ts-column ts-col-12">

            <div class="ts-box ts-shop-category-desc">

                <?php echo get_queried_object()->description; ?>

            </div>

        </div>
    </div>
</div>
