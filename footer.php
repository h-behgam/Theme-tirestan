<?php get_template_part('inc/index/index', 'works') ?>
<footer class="">
    <div class="wrappers paddingx-20">
        <div id="footerAbout">
            <div class="aboute-up">
                <h3>درباره تایرستان</h3>
                <p>
                    <?php echo tirestan_get_option('footer_settings')[0]['info']; ?>
                </p>
            </div>
            <div class="aboute-down">
                <div class="right">
                    <div id="footerLinks1">
                        <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1')) {
                            dynamic_sidebar('footer1');
                        }
                        ?>
                    </div>
                    <div id="footerLinks2">
                        <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2')) {
                            dynamic_sidebar('footer2');
                        }
                        ?>
                    </div>
                    <div id="footerLinks3">
                        <?php
                        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3')) {
                            dynamic_sidebar('footer3');
                        }
                        ?>
                    </div>
                </div>
                <div id="footerLinks4">
                    <ul class="time">
                        <li>شنبه تا چهار شنبه:</li>
                        <li>ساعت 9 الی 13 - 14 الی 18</li>
                        <li>پنج شنبه ها:</li>
                        <li>9 الی 14</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-leftside">
            <div class="socialmedia">
                <h3 class="title">شبکه های اجتماعی</h3>
                <div class="socials">
                    <?php $socials = tirestan_get_option('social');
                    foreach ($socials as $social) { ?>
                        <a href="<?php echo $social['link'] ?>" class="socials-links"><img
                                src="<?php echo $social['image'] ?>" alt="<?php echo $social['alt'] ?>" class="social"></a>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <div class="address">
                <h3 class="title">آدرس</h3>
                <p class="address">
                    <?php echo tirestan_get_option('footer_settings')[0]['address']; ?>
                </p>
                <p class="tel">تلفن: <a
                        href="tel:+98<?php echo tirestan_get_option('footer_settings')[0]['tel']; ?>"></a>
                    <?php echo tirestan_get_option('footer_settings')[0]['tel']; ?>
                </p>
            </div>
            <hr>
            <div class="logos">
                <?php $identify = tirestan_get_option('identify');
                foreach ($identify as $item) { ?>
                    <div class="logo">
                        <a href="<?php echo $item['link'] ?>" class="image"><img src="<?php echo $item['image'] ?>"
                                alt="<?php echo $item['alt'] ?>" class="pic"></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>تمامی حقوق محفوط و متعلق به تایرستان می باشد. طراحی شده توسط <a href="mailto:h.behgam@gmail.com">h.behgam</a>
        </p>
    </div>
    <?php wp_footer() ?>
</footer>
</main>
</body>

</html>