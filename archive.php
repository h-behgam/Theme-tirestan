<?php

get_header();

$description = get_the_archive_description();
?>

<?php if (have_posts()): ?>
	<div class="wrappers">

		<header class="page-header alignwide">
			<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
			<?php if ($description): ?>
				<div class="archive-description">
					<?php echo wp_kses_post(wpautop($description)); ?>
				</div>
			<?php endif; ?>
		</header><!-- .page-header -->

		<?php while (have_posts()): ?>
			<?php the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php
					the_title(sprintf('<h2 class="entry-title default-max-width"><a href="%s">', esc_url(get_permalink())), '</a></h2>');
					?>
				</header><!-- .entry-header -->

				<footer class="entry-footer default-max-width">
				</footer><!-- .entry-footer -->
			</article><!-- #post-${ID} -->



		<?php endwhile; ?>


	<?php else: ?>
		<p>not found</p>
	<?php endif; ?>

</div>
<?php
get_footer();