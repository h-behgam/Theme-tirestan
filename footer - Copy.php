<?php get_template_part('inc/index/index', 'works') ?>
<footer class="">
    <div class="wrappers paddingx-20">
        <div id="footerAbout">
            <h3>درباره تایرستان</h3>
            <img src="<?php echo PATH ?>/image/icon/Vector11.png" width="39" alt="">
            <p>
                <?php echo tirestan_get_option('footer_settings')[0]['info']; ?>
            </p>
            <div class="location">
                <img src="<?php echo PATH ?>/image/icon/locationred.png" alt="">
                <p>
                    <?php echo tirestan_get_option('footer_settings')[0]['address']; ?>
                </p>
            </div>
            <div class="location">
                <img src="<?php echo PATH ?>/image/icon/callincoming.png" alt="">
                <p><a href="tel:<?php echo tirestan_get_option('footer_settings')[0]['tel']; ?>"><?php echo tirestan_get_option('footer_settings')[0]['tel']; ?></a></p>
            </div>
            <div class="location">
                <img src="<?php echo PATH ?>/image/icon/messagetext1.png" alt="">
                <p><a href="mailto:<?php echo tirestan_get_option('footer_settings')[0]['email']; ?>"><?php echo tirestan_get_option('footer_settings')[0]['email']; ?></a></p>
            </div>
        </div>
        <div id="footerLinks1">
            <h3>لینک های مفید</h3>
            <img src="<?php echo PATH ?>/image/icon/Vector11.png" width="39" alt="">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1')) {
                dynamic_sidebar('footer1');
            }
            ?>
        </div>
        <div id="footerLinks2">
            <h3>لینک های مفید</h3>
            <img src="<?php echo PATH ?>/image/icon/Vector11.png" width="39" alt="">
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
    <div class="copyright">
        <p>تمامی حقوق محفوط و متعلق به تایرستان می باشد. طراحی شده توسط <a href="mailto:h.behgam@gmail.com">h.behgam</a></p>
    </div>
    <?php wp_footer() ?>
</footer>
</main>
</body>

</html>