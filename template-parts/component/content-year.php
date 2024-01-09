<?php
/**
 * The default template for displaying product year information content
 */

$pro_year    = ( get_the_terms( get_the_ID(), 'pa_pro-year' ) ) ?
    get_the_terms( get_the_ID(), 'pa_pro-year' )[0] : '';
?>

<div class="ts-prd-year">

    <?php if ( $pro_year ) { ?>

            <span>سال تولید:</span>
			
			<div class="ts-select ts-select-80">
			<select title="year" name="year">
                <option value="<?php echo esc_html( $pro_year->name ); ?>" selected=""><?php echo esc_html( $pro_year->name ); ?></option>
			</select>
			<span></span>
			</div>
			
    <?php } ?>

</div>