<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
global $woocommerce;
$shipping_methods = $woocommerce->shipping->load_shipping_methods();
$avg_rate_score = number_format($product->get_average_rating(), 1);

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('', $product); ?>>
	<div class="produc-details">
		<div class="produc-detailsright">
			<div class="right">
				<div class="batchRight">
					<?php season(wc_get_product(get_the_ID())->get_attribute('season')) ?>
				</div>
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				<div class="batchRight2">
					<?php sales_price($product->get_regular_price(), $product->get_sale_price()) ?>
				</div>
			</div>
			<div class="left">
				<h2 title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<h3 class="saleMainLeftCardSize">سایز:
					<span>
						<?php echo wc_get_product(get_the_ID())->get_attribute('width'); ?>
						/
						<?php echo wc_get_product(get_the_ID())->get_attribute('aspect-ratio'); ?>R
						<?php echo wc_get_product(get_the_ID())->get_attribute('size'); ?>
					</span>
				</h3>
				<?php $value = trim(wc_get_product(get_the_ID())->get_attribute('energy'));
				if ($value !== '' && $value !== 0): ?>
					<div class="batch">
						<div class="specs">
							<img src="<?php echo PATH ?>/image/icon/Vector1.png" alt="">
							<span>
								<?php echo wc_get_product(get_the_ID())->get_attribute('energy'); ?>
							</span>
							<img src="<?php echo PATH ?>/image/icon/Vector7.png" alt="">
							<img src="<?php echo PATH ?>/image/icon/Vector2.png" alt="">
							<span>
								<?php echo wc_get_product(get_the_ID())->get_attribute('rain'); ?>
							</span>
							<img src="<?php echo PATH ?>/image/icon/Vector7.png" alt="">
							<img src="<?php echo PATH ?>/image/icon/Vector3.png" alt="">
							<span>
								<?php echo wc_get_product(get_the_ID())->get_attribute('sound'); ?>
							</span>
						</div>
					</div>
				<?php endif; ?>
				<h3 class="saleMainLeftCardSize">تولید:
					<span>
						<?php echo wc_get_product(get_the_ID())->get_attribute('made-in'); ?>
					</span>
				</h3>
				<div class="rh_woo_star"
					title="<?php printf(esc_html__('Rated %s out of 5', 'rehub-theme'), $avg_rate_score); ?>">
					<?php for ($i = 1; $i <= 5; $i++) {
						if ($i <= $avg_rate_score) {
							$active = ' active';
						} else {
							$active = '';
						}
						echo '<span class="rhwoostar rhwoostar' . $i . $active . '">&#9733;</span>';
					} ?>
					<span class="numbers">
						<?php comments_number() ?>
					</span>
				</div>
			</div>
		</div>
		<div class="produc-details-left">
			<div class="shipping">
				<?php
				if ($shipping_methods['free_shipping']->enabled == "yes"): ?>
					<div>
						<img src="<?php echo PATH . '/image/icon/trucktick.png' ?>" alt="">
						<p>ارســال رایگـــان</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="progress">
				<div>
					<p>موجودی</p>
				</div>
				<?php $stock = (int) get_post_meta($post->ID, '_stock', true);
				switch ($stock) {
					case 0:
						echo '<progress value="0" max="100" title="' . $stock . '"></progress>';
						break;
					case 1:
						echo '<progress value="24" max="100" title="' . $stock . '"></progress>';
						break;
					case 2:
						echo '<progress value="50" max="100" title="' . $stock . '"></progress>';
						break;
					case 3:
						echo '<progress value="75" max="100" title="' . $stock . '"></progress>';
						break;
					case 4:
						echo '<progress value="100" max="100" title="' . $stock . '"></progress>';
						break;

					default:
						echo '<progress value="100" max="100" title="' . $stock . '"></progress>';
						break;
				}
				?>
			</div>
			<h3 class="saleMainLeftCardSize">سال تولید:
				<div class="select">
					<select>
						<option selected>
							<?php echo wc_get_product(get_the_ID())->get_attribute('pro-year'); ?>
						</option>
					</select>
				</div>
			</h3>
			<div class="price">
				<div>
					<p class="price2">هر حلقه</p>
				</div>
				<?php woocommerce_template_single_price(); ?>
			</div>
			<div class="quantity1">
				<div class="quantityBottom3">
					<?php woocommerce_template_single_add_to_cart(); ?>
				</div>
			</div>
		</div>
	</div>
</li>