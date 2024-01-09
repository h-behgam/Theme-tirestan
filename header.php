<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <header>
        <div id="headerTop" class="wrappers hWrapper">
            <div id="headerTopRight">
                <a href="<?php bloginfo('url') ?>">
                    <img src="<?php echo PATH ?>/image/logo.png" alt="" srcset="">
                </a>
            </div>
            <div id="headerTopLeft">
                <div id="headerTopLeftHelp">
                    <div class="headerTopLeftImage">
                        <img src="<?php echo PATH ?>/image/icon/messages3.png" alt="">
                    </div>
                    <div class="headerTopLeftP">
                        <p>پشتیبانی</p>
                        <a class="address" href="tel:+982174836">021-74836</a>
                    </div>
                </div>
                <div id="headerTopLeftAddress">
                    <div class="headerTopLeftImage">
                        <img src="<?php echo PATH ?>/image/icon/location.png" alt="">
                    </div>
                    <div class="headerTopLeftP">
                        <p>آدرس</p>
                        <a class="address" href="https://goo.gl/maps/qqFQRrrwpNZTdt5A6" target="_blank" rel="noopener noreferrer">بزرگراه رسالت، بین دردشت و باقری</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom">
            <div class="wrappers">
                <div>
                    <?php wp_nav_menu(array('theme_location' => 'header-main-menu')) ?>
                    <a href="#" class="icon" id="menuIcon">
                        <div id="menu-button" class="hamburger"><span></span></div>
                    </a>
                </div>
                <div>
                    <div class="shoppingCartImg">
                        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                            <input id="shoppingCartInput" type="text" name="s" value="<?php echo get_search_query(); ?>"
                                placeholder="<?php echo esc_attr_x('نام محصول مورد نظر ...', 'placeholder', 'replyWp'); ?>"
                                maxlength="50" required="required" />
                                <input type="submit" id="search-input" value="">
                            <!-- <input type="hidden" name="post_type" value="product"> -->
                        </form>
                        <img id="shoppingCartIcon" src="<?php echo PATH ?>/image/icon/searchnormal1.png" alt="">
                    </div>
                    <!-- <div class="shoppingCartImg">
                        <a href="#"><img src="<?php echo PATH ?>/image/icon/profile.png" alt=""><?php wp_get_current_user() ?></a>
                    </div> -->
                    <div class="shoppingCartImg">
                        <a href="cart/">
                            <span id="shoppingCartNumber">
                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                            </span>
                            <img id="shoppingcartPic" src="<?php echo PATH ?>/image/icon/shoppingcart.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ts-loading-wrap">
            <div class="ts-loading">
                <div class="ts-loading-item">
                    <img src="<?php echo PATH ?>/image/icon/loading.gif" width="150" height="150" alt="">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        style="margin: auto; display: block;" width="74px" height="74px" viewBox="0 0 100 100"
                        preserveAspectRatio="xMidYMid">
                        <g transform="rotate(112.693 50 50)">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s"
                                values="0 50 50;180 50 50" keyTimes="0;1"></animateTransform>

                            <ellipse cx="50" cy="50" rx="40" ry="0.1" fill="none" stroke="#ee2e24" stroke-width="6"
                                transform="rotate(0 50 50)"></ellipse>
                            <ellipse cx="50" cy="50" rx="40" ry="0.1" fill="none" stroke="#ee2e24" stroke-width="6"
                                transform="rotate(45 50 50)"></ellipse>
                            <ellipse cx="50" cy="50" rx="40" ry="0.1" fill="none" stroke="#ee2e24" stroke-width="6"
                                transform="rotate(90 50 50)"></ellipse>
                            <ellipse cx="50" cy="50" rx="40" ry="0.1" fill="none" stroke="#ee2e24" stroke-width="6"
                                transform="rotate(135 50 50)"></ellipse>
                        </g>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="#54595b" stroke-width="6"></circle>
                        <circle cx="50" cy="50" r="20" fill="#54595b" stroke="#ee2e24" stroke-width="6"></circle>
                    </svg> -->

                </div>
            </div>
        </div>
    </header>
    <main>