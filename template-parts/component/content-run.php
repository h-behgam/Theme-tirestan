<?php
/**
 * The default template for displaying product run flat content
 */

$run_flat      = get_post_meta( get_the_ID(), 'run_flat', true );
$run_flat_info = get_post_meta( get_the_ID(), 'run_flat_info', true );
?>

<span class="ts-prd-run-flat ts-prd-specs-special ts-tooltip-wrap">

    <?php if ( $run_flat ) { ?>

        <?php echo esc_html( $run_flat ); ?>
        <span class="ts-tooltip">
            <?php echo esc_html( $run_flat_info ); ?>
        </span>

    <?php } ?>

</span>
