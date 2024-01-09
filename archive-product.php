<?php

get_header();
?>
<!-- <main id="site-content" role="main"> -->
    <!-- Car Search -->
    <?php get_template_part( 'template-parts/search/search', 'car' ); ?>
    <!-- Helper -->
    <?php //get_template_part( 'template-parts/shop/shop', 'helper' ); ?>
    <!-- TS Container -->
    <div class="ts-container ts-shop-container">
        <div class="ts-row ts-col-gap-10">
            <!-- Sidebar -->
            <div class="ts-column ts-col-12 ts-col-lg-3 ts-col-xl-2 woocommerce-products-right">
                <?php get_template_part( 'template-parts/sidebar/content', 'sidebar' ); ?>
            </div>
            <!-- Products -->
            <div class="ts-column ts-col-12 ts-col-lg-9 ts-col-xl-10 woocommerce-products-left">
                <!-- Sort -->
                <?php get_template_part( 'template-parts/shop/shop', 'sort' ); ?>
                <!-- Products Container -->
                <?php get_template_part( 'template-parts/shop/content', 'shop' ); ?>
            </div> 
        </div>   
    </div>
      <!-- Product Category Description -->
    <?php get_template_part( 'template-parts/shop/shop', 'categoryDesc' ); ?>
    <!-- ./TS Container -->

<!-- </main>#site-content -->

<?php get_footer(); ?>
