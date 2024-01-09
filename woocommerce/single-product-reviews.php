<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined('ABSPATH') || exit;

global $product;

$review_count = $product->get_review_count();
$avg_rate_score = number_format($product->get_average_rating(), 1);
$rate_counts = array();
for ($i = 0; $i < 5; $i++) {
	$rate_counts[] = $product->get_rating_count($i);
}
;

if (!comments_open()) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<h3>نظرات کاربران</h3>
	<div id="comments">
		<h4 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ($count && wc_review_ratings_enabled()) {
				/* translators: 1: reviews count 2: product name */
				$reviews_title = sprintf(esc_html(_n('%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce')), esc_html($count), '<span>' . get_the_title() . '</span>');
				echo apply_filters('woocommerce_reviews_title', $reviews_title, $count, $product); // WPCS: XSS ok.
			} else {
				esc_html_e('Reviews', 'woocommerce');
			}
			?>
		</h4>
		<hr>
		<div class="rateReview">
			<div class="woo-avg-rating">
				<span class="orangecolor font200 fontbold">
					<?php echo '' . $avg_rate_score; ?>
				</span> <span class="greycolor font90">
					<?php esc_html_e('از', 'rehub-theme'); ?> 5
				</span>
				<div class="clearfix"></div>
				<?php
				if (0 < $avg_rate_score) {
					echo '<div class="rh_woo_star rh_woo_star_big" title="' . sprintf(esc_html__('Rated %s out of', 'woocommerce'), (float) $avg_rate_score) . ' 5">';
					// echo wc_get_star_rating_html($avg_rate_score, $review_count);
					?>
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
					</div>
					<?php
					echo '</div>';
				}
				?>
			</div>

			<div class="woo-rev-part pl20 pr20 rh-line-left rh-line-right rh-flex-grow1">
				<div class="woo-rating-bars">
					<?php for ($rating = 5; $rating > 0; $rating--): ?>
						<div class="rating-bar">
							<div class="star-rating-wrap">
								<div class="rh_woo_star"
									title="<?php printf(esc_html__('Rated %s out of 5', 'rehub-theme'), $rating); ?>">
									<?php for ($i = 1; $i <= 5; $i++) {
										if ($i <= $rating) {
											$active = ' active';
										} else {
											$active = '';
										}
										echo '<span class="rhwoostar rhwoostar' . $i . $active . '">&#9733;</span>';
									}
									?>
								</div>

							</div>
							<?php
							$rating_percentage = 0;
							if (isset($rate_counts[$rating]) && $review_count != 0) {
								$rating_percentage = (round($rate_counts[$rating] / $review_count, 2) * 100);
							}
							?>
							<div class="rating-percentage-bar-wrap">
								<div class="rating-percentage-bar">
									<span style="width:<?php echo esc_attr($rating_percentage); ?>%"
										class="rating-percentage"></span>
								</div>
							</div>
							<?php if (isset($rate_counts[$rating])): ?>
								<span class="rating-count">
									<?php echo esc_html($rate_counts[$rating]) . ' دیدگاه'; ?>
								</span>
							<?php else: ?>
								<span class="rating-count zero">0 دیدگاه</span>
							<?php endif; ?>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>

		<?php if (have_comments()): ?>
			<ol class="commentlist">
				<?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
			</ol>

			<?php
			if (get_comment_pages_count() > 1 && get_option('page_comments')):
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type' => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else: ?>
			<p class="woocommerce-noreviews">
				<?php esc_html_e('There are no reviews yet.', 'woocommerce'); ?>
			</p>
		<?php endif; ?>
	</div>

	<?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())): ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply' => have_comments() ? esc_html__('', 'woocommerce') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'woocommerce'), get_the_title()),
					/* translators: %s is product title */
					'title_reply_to' => esc_html__('Leave a Reply to %s', 'woocommerce'),
					'title_reply_before' => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after' => '</span>',
					'comment_notes_after' => '',
					'label_submit' => esc_html__('Submit', 'woocommerce'),
					'logged_in_as' => '',
					'comment_field' => '',
				);

				$name_email_required = (bool) get_option('require_name_email', 1);
				$fields = array(
					'author' => array(
						'label' => __('Name', 'woocommerce'),
						'type' => 'text',
						'value' => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email' => array(
						'label' => __('Email', 'woocommerce'),
						'type' => 'email',
						'value' => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ($fields as $key => $field) {
					$field_html = '<p class="comment-form-' . esc_attr($key) . '">';
					$field_html .= '<label for="' . esc_attr($key) . '">' . esc_html($field['label']);

					if ($field['required']) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . ' /></p>';

					$comment_form['fields'][$key] = $field_html;
				}

				$account_page_url = wc_get_page_permalink('myaccount');
				if ($account_page_url) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'woocommerce'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
				}

				if (wc_review_ratings_enabled()) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__('Your rating', 'woocommerce') . (wc_review_ratings_required() ? '&nbsp; ' : '') . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__('Rate&hellip;', 'woocommerce') . '</option>
						<option value="5">' . esc_html__('Perfect', 'woocommerce') . '</option>
						<option value="4">' . esc_html__('Good', 'woocommerce') . '</option>
						<option value="3">' . esc_html__('Average', 'woocommerce') . '</option>
						<option value="2">' . esc_html__('Not that bad', 'woocommerce') . '</option>
						<option value="1">' . esc_html__('Very poor', 'woocommerce') . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__('Your review', 'woocommerce') . '&nbsp;</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

				comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
				?>
			</div>
		</div>
	<?php else: ?>
		<p class="woocommerce-verification-required">
			<?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?>
		</p>
	<?php endif; ?>

	<div class="clear"></div>
</div>