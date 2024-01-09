<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>
<?php echo '1111111111111111111111111' ?>
<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<section class="order">
            <div class="wrapper">
                <div class="order-box">
                    <img src="/image/icon/success.png" alt="">
                    <h2 class="title">خرید شما <span class="order-success">ناموفق</span> بود</h2>
                    <p class="details">برای اطلاع بیشتر با پشتیبانی تماس حاصل نمایید.</p>
                    <a class="button-final failed" href="#">پشتیبانی</a>
                </div>
            </div>
        </section>

		<?php else : ?>

			<section class="order">
            <div class="wrapper">
                <div class="order-box">
                    <img src="/image/icon/success.png" alt="">
                    <h2 class="title">خرید شما با <span class="order-success">موفقیت</span> انجام شد</h2>
                    <p class="rec">کد رهگیری: <span><?php echo do_shortcode("{transaction_id}"); ?></span></p>
                    <p class="date">تاریخ و ســـاعت مراجعه: <span></span></p>
                    <a class="button-final success" href="#">مشاهده فاکتور</a>
                </div>
            </div>
        </section>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
