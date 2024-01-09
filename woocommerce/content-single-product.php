<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('wrappers', $product); ?>>
	<div class="productTop">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action('woocommerce_before_single_product_summary');
		?>

		<div class="summary entry-summary">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action('woocommerce_single_product_summary');
			?>
			<span>
				<?php //echo wc_get_product(get_the_ID())->get_attribute('brand'); ?>
			</span>
			<h2>مشخصات</h2>
			<hr>
			<h3 class="saleMainLeftCardSize">سایز:
				<span class="CardSize">
					<?php echo wc_get_product(get_the_ID())->get_attribute('width'); ?>
					/
					<?php echo wc_get_product(get_the_ID())->get_attribute('aspect-ratio'); ?>R
					<?php echo wc_get_product(get_the_ID())->get_attribute('size'); ?>
				</span>
			</h3>
			<h3 class="saleMainLeftCardSize">کد سرعت:
				<span>
					<?php echo wc_get_product(get_the_ID())->get_attribute('speed-rating'); ?>
				</span>
			</h3>
			<h3 class="saleMainLeftCardSize">شاخص وزن:
				<span>
					<?php echo wc_get_product(get_the_ID())->get_attribute('load-index'); ?>
				</span>
			</h3>
			<h3 class="saleMainLeftCardSize">تولید:
				<span>
					<?php echo wc_get_product(get_the_ID())->get_attribute('made-in'); ?>
				</span>
			</h3>
			<h3 class="saleMainLeftCardSize">فابریک:
				<span>
					<?php echo get_field('field_5b1994a2d6345'); ?>
				</span>
			</h3>
			<hr>
			<div class="batch">
				<div class="batchRight">
					<img src="<?php echo PATH . '/image/icon/group6.png' ?>" alt="">
					<p>
						<?php echo wc_get_product(get_the_ID())->get_attribute('season'); ?>
					</p>
				</div>
				<?php $value = trim(wc_get_product(get_the_ID())->get_attribute('energy'));
				if ($value !== '' && $value !== 0): ?>
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
				<?php endif; ?>
			</div>
		</div>
		<div class="addToCard" id="navigation">
			<div class="addToCardTop">
				<?php
				global $woocommerce;
				$shipping_methods = $woocommerce->shipping->load_shipping_methods();
				// var_dump();
				if (get_field('field_5b2b83812e265')): ?>
					<div class="free-delivery">
						<img src="<?php echo PATH . '/image/icon/trucktick.png' ?>" alt="">
						<p>ارســال رایگـــان</p>
					</div>
				<?php endif; ?>

				<?php if (get_field('field_59c6382f616f9')): ?>
					<div class="free-delivery">
						<img src="<?php echo PATH . '/image/icon/timer1.png' ?>" alt="">
						<p>زمان تحویل: فوری</p>
					</div>
				<?php endif; ?>
			</div>
			<hr>
			<!-- <div class="progress">
				<div>
					<img src="<?php echo PATH . '/image/icon/boxtick.png' ?>" alt="">
					<p>موجودی</p>
				</div> -->
				<?php 
				get_template_part( 'template-parts/component/content', 'progress' );
				// (int) $stock = get_post_meta($post->ID, '_stock', true);
				// switch ($stock) {
				// 	case 0:
				// 		echo '<progress value="0" max="100" title="' . $stock . '"></progress>';
				// 		break;
				// 	case 1:
				// 		echo '<progress value="24" max="100" title="' . $stock . '"></progress>';
				// 		break;
				// 	case 2:
				// 		echo '<progress value="50" max="100" title="' . $stock . '"></progress>';
				// 		break;
				// 	case 3:
				// 		echo '<progress value="75" max="100" title="' . $stock . '"></progress>';
				// 		break;
				// 	case 4:
				// 		echo '<progress value="100" max="100" title="' . $stock . '"></progress>';
				// 		break;

				// 	default:
				// 		echo '<progress value="100" max="100" title="' . $stock . '"></progress>';
				// 		break;
				// }
				?>
			<!-- </div> -->
			<div class="quantity1">
				<div>
					<img src="<?php echo PATH . '/image/icon/coin.png' ?>" alt="">
					<p>تعداد</p>
				</div>
				<div class="quantityBottom">
					<button id="decrement">-</button>
					<?php woocommerce_template_single_add_to_cart(); ?>
					<button id="increment">+</button>
				</div>
			</div>
			<div class="years">
				<div>
					<img src="<?php echo PATH . '/image/icon/calendar2.png' ?>" alt="">
					<p>سال تولید</p>
				</div>
				<?php echo wc_get_product(get_the_ID())->get_attribute('pro-year'); ?>
			</div>
			<div class="price">
				<div>
					<p class="price1">قیمت محصول </p>
					<p class="price2">هر حلقه</p>
				</div>
				<?php woocommerce_template_single_price(); ?>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>