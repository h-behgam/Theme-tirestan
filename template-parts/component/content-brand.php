<?php
/**
 * The default template for displaying product brand content
 */

$brand = ( get_the_terms( get_the_ID(), 'yith_product_brand' ) ) ?
    get_the_terms( get_the_ID(), 'yith_product_brand' )[0] : false;

if ( $brand ) {
    $url          = get_term_link( $brand->term_id, 'yith_product_brand' );
	$thumbnail_id = get_term_meta( $brand->term_id, 'thumbnail_id', true );
	if ( $thumbnail_id ) {
		$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		if ( sizeof( $thumbnail_url ) > 0 ) {
			$thumbnail_url = $thumbnail_url[0];
		}
	}
}
?>

<div class="ts-prd-brand">

    <?php if ( $brand && $url && $thumbnail_url ) { ?>

        <span><?php echo esc_html( $brand->name ); ?></span>
        <a href="<?php echo esc_url( $url ); ?>">
            <img src="<?php echo esc_url( $thumbnail_url ); ?>"
                 alt="<?php echo esc_attr( $brand->slug ) ?>"
                 title="<?php echo esc_attr( $brand->name ) ?>" />
        </a>

    <?php } ?>

</div>
