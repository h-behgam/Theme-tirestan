<section class="relatedPost">
    <div class="wrappers">
        <div class="relatedPostTop">
            <div class="relatedPostTopRight">
                <img src="<?php echo PATH ?>/image/icon/clipboard.png" alt="">
                <h3>مطالبی در مورد لاستیک</h3>
            </div>
            <div class="relatedPostTopLeft">
                <a href="<?php echo get_category_link(1); ?>">مشاهده بیشتر</a>
            </div>
        </div>
        <div class="relatedPostBottom">
            <?php $catquery = new WP_Query('cat=1&posts_per_page=3'); ?>
            <?php while ($catquery->have_posts()):
                $catquery->the_post(); ?>
                <div class="relatedPostCard">
                    <div class="relatedPostCardImg">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <?php the_excerpt(); ?>

                </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>