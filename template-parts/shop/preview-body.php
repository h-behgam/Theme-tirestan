<?php
/**
 * The default template for displaying product preview body content
 */
?>

<div class="ts-shop-preview-body">

    <!-- Thumbnail -->
    <div class="ts-shop-preview-thumbnail">
        <?php get_template_part( 'template-parts/component/content', 'thumbnail' ); ?>
    </div>

    <!-- Right Side -->
    <div class="ts-shop-preview-right">

        <!-- Specs -->
        <span class="ts-shop-preview-property">سایز لاستیک:</span>
        <div class="ts-shop-preview-value" dir="ltr">
		    <?php get_template_part( 'template-parts/component/content', 'specs' ); ?>
        </div>

        <!-- Speed -->
        <span class="ts-shop-preview-property">کد سرعت:</span>
        <span class="ts-shop-preview-value">
            <?php get_template_part( 'template-parts/component/content', 'speed' ); ?>
        </span>

        <!-- Load Index -->
        <span class="ts-shop-preview-property">شاخص وزن:</span>
        <span class="ts-shop-preview-value">
            <?php get_template_part( 'template-parts/component/content', 'load' ); ?>
        </span>

        <!-- Season -->
        <span class="ts-shop-preview-property">فصل:</span>
        <span class="ts-shop-preview-value ts-shop-preview-season">
            <?php get_template_part( 'template-parts/component/content', 'season' ); ?>
        </span>

        <!-- Categories -->
        <span class="ts-shop-preview-property">دسته بندی:</span>
        <span class="ts-shop-preview-value">
            <?php get_template_part( 'template-parts/component/content', 'category' ); ?>
        </span>

        <!-- Rating -->
        <div class="ts-shop-preview-rating">
            <span class="ts-shop-preview-rating-label">امتیاز:</span>
            <?php get_template_part( 'template-parts/component/content', 'rating' ); ?>
        </div>

        <!-- Short Info -->
        <div class="ts-shop-preview-info">
            <?php get_template_part( 'template-parts/component/content', 'info' ); ?>
        </div>

    </div>
    <!-- ./Right Side -->

    <!-- Left Side -->
    <div class="ts-shop-preview-left">

        <!-- Shipping -->
        <div class="ts-shop-preview-box ts-shop-preview-shipping">
            <?php get_template_part( 'template-parts/component/content', 'shipping' ); ?>
        </div>

        <!-- Delivery -->
        <div class="ts-shop-preview-box ts-shop-preview-delivery">
            <?php get_template_part( 'template-parts/component/content', 'delivery' ); ?>
        </div>

        <form action="<?php the_permalink(); ?>" method="post" enctype='multipart/form-data'>

            <!-- Stock -->
            <div class="ts-shop-preview-stock">

                <!-- Inventory -->
                <div class="ts-shop-preview-inventory">
                    <?php get_template_part( 'template-parts/component/content', 'inventory' ); ?>
                </div>

                <!-- Quantity -->
                <div class="ts-shop-preview-quantity">
                    <?php get_template_part( 'template-parts/component/content', 'quantity' ); ?>
                </div>

            </div>

            <div class="ts-shop-preview-buy">

                <!-- Price -->
                <?php get_template_part( 'template-parts/component/content', 'price' ); ?>

                <!-- Buy -->
                <?php get_template_part( 'template-parts/component/content', 'buy' ); ?>

            </div>

        </form>

    </div>
    <!-- ./Left Side -->

</div>
