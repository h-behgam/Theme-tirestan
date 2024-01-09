<?php
/**
 * The template for displaying car search section.
 */
?>

<div class="ts-container ts-container-fluid">
    <section class="ts-search-car">

        <h3 class="ts-search-car-title">جستجو بر اساس خودرو:</h3>
        <i class="tsr tsr-times-circle ts-search-car-close"></i>
        <p class="ts-search-car-info">
            در منوی پایین میتوانید با انتخاب برند و مدل ماشین به محصول مورد نظر خود برسید
        </p>

        <!-- Brand -->
        <div class="ts-search-car-box">
            <label>برند ماشین:</label>
            <div class="ts-select ts-select-gray2 ts-select-130">
                <select title="Brand" name="brand" class="ts-search-brand">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>

        <!-- Model -->
        <div class="ts-search-car-box">
            <label>مدل ماشین:</label>
            <div class="ts-select ts-select-gray2 ts-select-130">
                <select title="Model" name="model" class="ts-search-model">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>

        <!-- Year -->
        <div class="ts-search-car-box">
            <label>سال تولید:</label>
            <div class="ts-select ts-select-gray2 ts-select-130">
                <select title="Year" name="model" class="ts-search-year">
                    <option value="">همه</option>
                </select>
                <span></span>
            </div>
        </div>

        <button type="button" class="ts-button ts-button-red ts-search-car-submit">
            جستجو
            <img src="<?php echo PATH . '/image/icon/searchnormal1.png' ?>" alt="">
        </button>

    </section>
</div>