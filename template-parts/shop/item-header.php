<?php
/**
 * The default template for displaying product item header content
 */
?>

<div class="ts-column ts-col-2 ts-shop-item-header">

    <!-- Mark -->
    <?php get_template_part( 'template-parts/component/content', 'mark' ); ?>

    <!-- Season -->
    <div class="ts-shop-item-season">
        <?php get_template_part( 'template-parts/component/content', 'season' ); ?>
    </div>

    <!-- Thumbnail -->
    <a href="<?php the_permalink(); ?>" class="ts-shop-item-thumbnail">
        <div class="ts-shop-item-thumbnail-loading">
            <!-- <div class="ts-loading-circle"><div>  -->
			<!-- </div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div> -->
        </div>
        <?php get_template_part( 'template-parts/component/content', 'thumbnail' ); ?>
    </a>
	
	<!-- sale -->
	<div class="ts-shop-item-sale">
        <?php get_template_part( 'template-parts/component/content', 'sale' ); ?>
    </div>

</div>
