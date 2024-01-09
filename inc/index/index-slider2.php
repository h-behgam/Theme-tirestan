<section class="slider2">
  <div class="wrapper-slider2">
    <div class="swiper mySwiper2">
      <div class="swiper-wrapper">
        <?php $slider2 = tirestan_get_option('slider2');
        foreach ($slider2 as $value) {
          ?>
          <div class="swiper-slide">
            <a href="<?php echo $value["link"] ?>">
              <img src="<?php echo $value["image"] ?>" alt="<?php echo $value["alt"] ?>">
            </a>
          </div>
        <?php } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>