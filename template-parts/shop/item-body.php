<?php
/**
 * The default template for displaying product item body content
 */
?>

<div class="ts-column ts-col-6 ts-shop-item-body">

    <!-- Title -->
    <h3 class="ts-shop-item-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h3>

    <!-- General Specs -->
    <div class="ts-shop-item-specs" dir="ltr">
		<!-- Hom -->
		<?php get_template_part( 'template-parts/component/content', 'homologated' ); ?>
        <!-- Specs -->
        <?php get_template_part( 'template-parts/component/content', 'specs' ); ?>

        <!-- Load Index -->
        <?php get_template_part( 'template-parts/component/content', 'load' ); ?>

        <!-- Speed -->
        <?php get_template_part( 'template-parts/component/content', 'speed' ); ?>

        <!-- Run Flat -->
        <?php get_template_part( 'template-parts/component/content', 'run' ); ?>

		<span>:سایز </span>
    </div>

    <!-- Label -->
    <div class="ts-shop-item-label">
        <?php get_template_part( 'template-parts/component/content', 'label' ); ?>
    </div>

    <!-- Country & Year -->
    <div class="ts-shop-item-production">
        <?php get_template_part( 'template-parts/component/content', 'production' ); ?>
    </div>


    <!-- Rating -->
    <div class="ts-shop-item-rating">
        <?php get_template_part( 'template-parts/component/content', 'rating' ); ?>
    </div>

    <!-- Short Info -->
    <div class="ts-shop-item-info">
        <?php get_template_part( 'template-parts/component/content', 'info' ); ?>
    </div>

</div>
