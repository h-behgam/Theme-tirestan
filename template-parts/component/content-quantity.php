<?php
/**
 * The default template for displaying product quantity content
 */

$stock    = ( get_post_meta( get_the_ID(),'_stock', true ) ) ?
    get_post_meta( get_the_ID(),'_stock', true ) : '0';
$stock    = intval( $stock );
$disabled = ( $stock < 1 ) ? 'disabled' : '';
// $color    = ( $stock > 0 ) ? 'orange' : 'grey';
?>

<div class="ts-prd-quantity">

    <div class="ts-select ts-select-80 ts-select-<?php echo esc_attr( $color ); ?>">
        <select title="Quantity" <?php echo esc_attr( $disabled ); ?> name="quantity">
				
				<option 'selected'>تعداد</option>
            <?php for ( $i = 1; $i <= $stock; $i++ ) { ?>

                <option value="<?php echo esc_attr( $i ); ?>" <?php if ( 4 === $i ) //echo 'selected'; ?>>
                    <?php echo esc_html( $i ); ?>
                </option>
                <?php if ( 8 === $i ) {
                    break;
                } ?>

            <?php } ?>

        </select>
        <span></span>
    </div>

</div>
