<?php
/**
 * The default template for displaying product inventory content
 */

$stock        = ( get_post_meta( get_the_ID(),'_stock', true ) ) ?
    get_post_meta( get_the_ID(),'_stock', true ) : '0';
$stock        = intval( $stock );
$stock_status = ( $stock > 0 ) ? 'full' : 'empty';
?>

<div class="ts-prd-inventory ts-prd-inventory-<?php echo esc_attr( $stock_status ); ?>">

    <span>موجودی:</span>
    <div class="ts-tooltip-wrap">
        <?php if ( $stock > 0 ) { ?>
            <span class="ts-tooltip">
                <?php echo esc_html( $stock ); ?> حلقه در انبار موجود است
            </span>
        <?php } ?>
    </div>

</div>
