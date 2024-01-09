<?php
/**
 * The default template for displaying product preview header content
 */
?>

<div class="ts-shop-preview-header">

    <!-- Mark -->
    <?php get_template_part( 'template-parts/component/content', 'mark' ); ?>

    <!-- Brand -->
    <div class="ts-shop-preview-brand">
        <?php get_template_part( 'template-parts/component/content', 'brand' ); ?>
    </div>

    <h3 class="ts-shop-preview-title"><?php the_title(); ?></h3>

    <!-- Specs -->
    <div class="ts-shop-preview-specs">
        <?php get_template_part( 'template-parts/component/content', 'specs' ); ?>
    </div>

    <a href="<?php the_permalink(); ?>" class="ts-shop-preview-more">مشاهده بیشتر</a>

</div>
