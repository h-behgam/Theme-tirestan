<?php
/**
 * The default template for displaying shop sorting content
 */
?>

<div class="ts-row gray radius-10 shadow">
    <div class="ts-column ts-col-12">

        <div class="ts-box ts-shop-sort gray radius-10">

            <img class="ts-shop-sort-img" src="<?php echo PATH ?>/image/icon/sort.png" alt="">
            <span class="ts-shop-sort-title">مرتب سازی بر اساس:</span>
            <ul>
                <li><a href="javascript:void(0);" data-sort="modified">جدیدترین</a></li>
                <li><a href="javascript:void(0);" data-sort="popularity">پر بازدیدترین</a></li>
                <li><a href="javascript:void(0);" data-sort="low_to_high">ارزانترین</a></li>
                <li><a href="javascript:void(0);" data-sort="high_to_low">گرانترین</a></li>
            </ul>

            <div class="ts-shop-sort-layout">
                <i class="tsi tsi-bars ts-shop-sort-layout-active" data-layout="row"></i>
                <i class="tsi tsi-th" data-layout="column"></i>
            </div>

            <div class="ts-shop-sort-info">
                <div>
                    <b id="ts-shop-sort-total-pages">0</b>
                    <span>تعداد صفحه:</span>
                </div>
                <div>
                    <b id="ts-shop-sort-total-items">0</b>
                    <span>تعداد محصول:</span>
                </div>
            </div>

        </div>

    </div>
</div>
