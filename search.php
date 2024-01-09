<?php if (!defined('ABSPATH'))
    exit; // Exit if accessed directly ?>
<?php get_header(); ?>
<section class="sale">
    <div class="wrappers">
        <div class="saleMain saleMainSearch">
            <div class="saleMainRight">
                <img src="<?php echo PATH ?>/image/icon/Asset52.png" alt="">
                <h3>فروش</h3>
                <h3>ویــــژه</h3>
                <button class="saleMainButton">مشاهده</button>
            </div>
            <div class="saleMainLeft">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post();
                        if (get_post_type(get_the_ID()) === 'product'): ?>
                            <div class="saleMainLeftCard">
                                <div class="saleMainLeftCardImg">
                                    <?php woocommerce_template_loop_product_thumbnail() ?>
                                </div>
                                <div class="saleMainLeftCardDetails">
                                    <h2 class="saleMainLeftCardTitle"><a href="<?php the_permalink(); ?>">
                                            <?php the_title() ?>
                                        </a></h2>
                                    <h3 class="saleMainLeftCardSize">سایز:
                                        <?php echo wc_get_product(get_the_ID())->get_attribute('width'); ?>
                                        /
                                        <?php echo wc_get_product(get_the_ID())->get_attribute('aspect-ratio'); ?>R
                                        <?php echo wc_get_product(get_the_ID())->get_attribute('size'); ?>
                                    </h3>
                                    <?php
                                    $value = trim(wc_get_product(get_the_ID())->get_attribute('energy'));
                                    if ($value !== '' && $value !== 0):
                                        ?>
                                        <div class="specs">
                                            <img src="<?php echo PATH ?>/image/icon/Vector1.png" alt="">
                                            <span>
                                                <?php echo wc_get_product(get_the_ID())->get_attribute('energy'); ?>
                                            </span>
                                            <img src="<?php echo PATH ?>/image/icon/Vector7.png" alt="">
                                            <img src="<?php echo PATH ?>/image/icon/Vector2.png" alt="">
                                            <span>
                                                <?php echo wc_get_product(get_the_ID())->get_attribute('rain'); ?>
                                            </span>
                                            <img src="<?php echo PATH ?>/image/icon/Vector7.png" alt="">
                                            <img src="<?php echo PATH ?>/image/icon/Vector3.png" alt="">
                                            <span>
                                                <?php echo wc_get_product(get_the_ID())->get_attribute('sound'); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="price">
                                        <?php global $product;
                                        if ($product->get_sale_price()): ?>
                                            <span class="discount">
                                                <?php sales_price($product->get_regular_price(), $product->get_sale_price()) ?>
                                            </span>
                                        <?php endif; ?>
                                        <p>هر حلقه
                                            <?php woocommerce_template_loop_price() ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php the_content(); ?>
                        <?php endif; ?>
                    <?php endwhile; else: ?>
                    <p>محصولی یافت </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- FOOTER -->
<?php get_footer(); ?>