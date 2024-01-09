<?php
/**
 * The default template for displaying product season content
 */

$season     = ( get_the_terms( get_the_ID(), 'pa_season' ) ) ?
    get_the_terms( get_the_ID(), 'pa_season' )[0] : false;
$icon_class = '';

if ( $season ) {

    if ( 'summer' === $season->slug ) {

        $icon_class = '/image/icon/group5.png';

    } elseif ( 'winter' === $season->slug ) {

        $icon_class = '/image/icon/group7.png';

    } elseif ( 'all' === $season->slug ) {

        $icon_class = '/image/icon/group6.png';

    }

}
?>

<span class="ts-prd-season">

    <?php if ( $icon_class ) { ?>
        <span class="ts-prd-season-info"><?php echo esc_html( $season->name ); ?></span>
			<img src="<?php echo PATH . esc_attr( $icon_class ); ?>" alt="<?php echo esc_attr( $season->name ); ?>">
    <?php } ?>

</span>
