<section class="sale">
    <div class="wrappers">
        <div class="saleMain">
            <div class="saleMainRight">
                <img src="<?php echo tirestan_get_option('search_settings')[0]['image1'] ?>" alt="">
                <?php
                $title1 = tirestan_get_option('search_settings')[0]['meta_key_title1'];
                if (!empty($title1)) {
                    echo '<h3>' . $title1 . '</h3>';
                } else {
                    echo '<h3>فروش</h3>';
                    echo '<h3>ویــــژه</h3>';
                }
                ?>
                <a href="<?php echo tirestan_get_option('search_settings')[0]['meta_key_link1'] ?>">
                    <button  class="saleMainButton">مشاهده</button>
                </a>
            </div>
            <div class="saleMainLeft">
                <?php
                $meta_key = tirestan_get_option('search_settings')[0]['meta_key1'];
                $cat_key = tirestan_get_option('search_settings')[0]['meta_key_cat_name1'];
                if (!empty($cat_key)) {
                    $replywp_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'slug',
                                'terms' => $cat_key,
                            ),
                        ),
                    );
                } else {
                    $replywp_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 6,
                        'meta_key' => $meta_key,
                        'orderby' => 'meta_value_num',
                        'stock_status' => 'instock'
                    );
                }
                $replywp_query = new WP_Query($replywp_args);
                if ($replywp_query->have_posts()):
                    while ($replywp_query->have_posts()):
                        $replywp_query->the_post();
                        ?>

                        <div class="saleMainLeftCard">
                            <div class="saleMainLeftCardImg">
                                <?php woocommerce_template_loop_product_thumbnail() ?>
                            </div>
                            <div class="saleMainLeftCardDetails">
                                <h2 class="saleMainLeftCardTitle"><a href="<?php the_permalink(); ?>">
                                        <?php the_title() ?>
                                    </a></h2>
                                <h3 class="saleMainLeftCardSize">سایز:
                                    <span class="CardSize">
                                        <?php echo wc_get_product(get_the_ID())->get_attribute('width'); ?>
                                        /
                                        <?php echo wc_get_product(get_the_ID())->get_attribute('aspect-ratio'); ?>R
                                        <?php echo wc_get_product(get_the_ID())->get_attribute('size'); ?>
                                    </span>
                                </h3>
                                <?php $value = trim(wc_get_product(get_the_ID())->get_attribute('energy'));
                                if ($value !== '' && $value !== 0): ?>
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
                    <?php endwhile; else: ?>
                    <p>محصولی یافت </p>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>