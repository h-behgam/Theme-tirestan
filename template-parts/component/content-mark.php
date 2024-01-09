<?php
/**
 * The default template for displaying product mark content
 */

$status      = get_post_meta( get_the_ID(),'tyre-status', true );
$status_text = '';

if ( 'a' === $status ) {

    $status_text = 'فروش ویژه';

} elseif ( 'b' === $status ) {

    $status_text = 'پیشنهاد ویژه';

}

if ( $status_text ) { ?>

    <span class="ts-prd-mark">

        <?php echo esc_html( $status_text ); ?>

    </span>

<?php }
