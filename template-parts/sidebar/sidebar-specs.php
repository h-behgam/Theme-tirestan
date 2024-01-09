<?php
/**
 * The default template for displaying shop specs sidebar content.
 */
?>

<div class="ts-box ts-shop-sidebar-item">

    <div class="ts-shop-sidebar-item-header">
        <h5>اندازه لاستیک</h5>
        <i class="tsi tsi-chevron-up"></i>
		<span id="ts-sidebar-close" class="tsr tsr-times-circle"></span>
    </div>

    <div class="ts-shop-sidebar-item-body">
        <!-- Width -->
        <div class="ts-shop-filter-select">
            <label>پهنا:</label>
            <div class="ts-select ts-select-90p ts-select-normal ts-select-gray1">
                <select title="Width" name="width" class="ts-filter-specs-width" id="ts-shop-filter-width">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>
        <!-- Aspect Ratio -->
        <div class="ts-shop-filter-select">
            <label>فاق:</label>
            <div class="ts-select ts-select-90p ts-select-normal ts-select-gray1">
                <select title="Aspect Ratio" name="aspectRatio" class="ts-filter-specs-aspectRatio"
                        id="ts-shop-filter-aspectRatio">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>
        <!-- Size -->
        <div class="ts-shop-filter-select">
            <label>سایز:</label>
            <div class="ts-select ts-select-90p ts-select-normal ts-select-gray1">
                <select title="Size" name="size" class="ts-filter-specs-size" id="ts-shop-filter-size">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>

        <!-- Car Search -->
        <p class="ts-shop-filter-car" id="ts-shop-filter-car">
            <a href="javascript:void(0);">جستجو بر اساس مدل خودرو</a>
        </p>
		
		<!-- Brand -->
        <div class="ts-shop-filter-select">
            <label>برند لاستیک:</label>
            <div class="ts-select ts-select-90p ts-select-normal ts-select-gray1">
                <select title="Brand" id="ts-shop-filter-brand" name="brand">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>

    </div>

</div>
