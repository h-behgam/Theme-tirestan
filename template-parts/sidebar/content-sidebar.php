<?php
/**
 * The default template for displaying shop sidebar content.
 */
?>

<!-- Toggle -->
<div class="ts-row ts-col-gap-10 ts-shop-sidebar-toggle-wrap gray shadow radius-10">
    <div class="ts-column ts-col-12">

        <div class="ts-box ts-shop-sidebar-toggle">
            <i class="tsi tsi-filter"></i>
            <span>جستجوی پیشرفته</span>
        </div>

    </div>
</div>

<div class="ts-shop-sidebar-wrap">
    <aside class="ts-row ts-shop-sidebar ts-shop-sidebar-static-top gray shadow radius-10">

        <!-- Filter By Specifications -->
        <div class="ts-column ts-col-12">

			<?php get_template_part( 'template-parts/sidebar/sidebar', 'specs' ); ?>

        </div>

        <!-- Only In Stock Filter -->
        <div class="ts-column ts-col-12">

			<?php get_template_part( 'template-parts/sidebar/sidebar', 'stock' ); ?>

        </div>

        <!-- Express Delivery -->
        <div class="ts-column ts-col-12">

			<?php get_template_part( 'template-parts/sidebar/sidebar', 'express' ); ?>

        </div>

        <!-- Close -->
        <div class="ts-shop-sidebar-close">اعمال فیلتر</div>

    </aside>
</div>
