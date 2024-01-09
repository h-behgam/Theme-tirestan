<?php
/**
 * The default template for displaying product item footer content
 */
?>

<div class="ts-column ts-col-4 ts-shop-item-footer">

    <form action="<?php the_permalink(); ?>" method="post" enctype='multipart/form-data'>

        <div class="ts-row">

            <!-- <div class="ts-column ts-col-6 ts-shop-item-stock"> -->
			<div class="ts-column ts-col-12 ts-shop-item-end">

                <!-- Shipping -->
                <div class="ts-shop-item-shipping2">
                    <?php get_template_part( 'template-parts/component/content', 'shipping' ); ?>
                </div>
                <!-- Inventory -->
                <div class="ts-shop-item-inventory">
                    <?php get_template_part( 'template-parts/component/content', 'progress' ); ?>
                </div>

                <!-- year -->
                <div class="ts-shop-item-year">
                    <?php get_template_part( 'template-parts/component/content', 'year' ); ?>
                </div>

                <!-- Price -->
                <div class="ts-shop-item-price">
                    <?php get_template_part( 'template-parts/component/content', 'price' ); ?>
                </div>
				
				<div class="ts-wrap-item-buy">
				                <!-- Quantity -->
                <div class="ts-shop-item-quantity">
                    <?php get_template_part( 'template-parts/component/content', 'quantity' ); ?>
                </div>
				
                <!-- Buy Button -->
                <div class="ts-shop-item-buy">
                    <?php get_template_part( 'template-parts/component/content', 'buy' ); ?>
                </div>
                </div>

                <!-- Delivery -->
                <!-- <div class="ts-shop-item-delivery"> -->
                    <?php //get_template_part( 'template-parts/component/content', 'delivery' ); ?>
                <!-- </div> -->

            </div>

        </div>

    </form>

</div>
