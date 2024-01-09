<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
<div class="orderby-main">
	<div class="title">
		<img src="<?php echo PATH ?>/image/icon/sort.png" alt="">
		<p>مرتب سازی بر اساس:</p>
	</div>
	<form class="woocommerce-ordering" method="get">
		<ul name="orderby" class="orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
			<?php
			$catalog_orderby = apply_filters(
				'woocommerce_catalog_orderby',
				array(
					'date' => __('جدیدترین', 'woocommerce'),
					'popularity' => __('پربازدیدترین', 'woocommerce'),
					'price' => __('ارزانترین', 'woocommerce'),
					'price-desc' => __('گرانترین', 'woocommerce'),
				)
			);

			if (get_option('woocommerce_enable_review_rating') == 'no')
				unset($catalog_orderby['rating']);

			foreach ($catalog_orderby as $id => $name) {
				$alink = '<li';
				if ($orderby == $id) {
					$alink .= ' class="actived"';
				}
				$alink .= '><a href="' . $term_url . '?orderby=' . $id . '">' . esc_attr($name) . '</a></li>';
				echo $alink;
			}
			?>
		</ul>
		<input type="hidden" name="paged" value="1" />
		<?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
	</form>
</div>