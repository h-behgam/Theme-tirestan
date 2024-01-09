<?php
/**
 * The default template for displaying product homologated information content
 */

$homologated = get_post_meta( get_the_ID(), 'homologated', true );
?>

<span class="ts-prd-homologated">

    <?php if ( $homologated ) { ?>

        <span><?php echo esc_html( $homologated ); ?></span>
        <div class="ts-tooltip-wrap">
            <i class="tsi tsi-car"></i>
            <span class="ts-tooltip">
                <span><?php echo esc_html( $homologated ); ?></span>
            </span>
        </div>

    <?php } ?>

</span>
