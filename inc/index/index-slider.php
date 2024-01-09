<section class="slider">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php $slider = tirestan_get_option('slider');
      foreach ($slider as $value) {
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
</section>