<?php
$works_settings = tirestan_get_option('works_settings');
if (!empty($works_settings)): ?>

    <section class="works">
        <div class="works-wrapper">
            <div class="swiper workSlider">
                <div class="swiper-wrapper">
                    <?php foreach ($works_settings as $item) { ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $item['logo']; ?>" alt="<?php echo $item['alt']; ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>