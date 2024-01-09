<?php

/**
 * The short code functionality of the theme.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 */

/**
 * The short code functionality of the theme.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_ShortCode {

    /**
     * Initialize theme short codes.
     *
     * @since     1.0.0
     */
    public function initialize_shortcodes() {

        add_shortcode( 'ts_search', array( $this, 'render_search' ) );
        add_shortcode( 'ts_products', array( $this, 'render_products' ) );
	    add_shortcode( 'ts_mini_products', array( $this, 'render_mini_products' ) );
        add_shortcode( 'ts_order_tracking', array( $this, 'render_order_tracking' ) );

    }

    /**
     * Render: search short code.
     *
     * @since     1.0.0
     * @return    string
     */
    public function render_search() {

        // Get Output
        ob_start();
        get_template_part( 'template-parts/shortcode/content', 'search' );
        $o = ob_get_contents();
        ob_end_clean();

        return $o;

    }

    /**
     * Render: products short code.
     *
     * @since     1.0.0
     * @param     array     $atts
     * @param     mixed     $content
     * @param     string    $tag
     * @return    string
     */
    public function render_products( $atts = array(), $content = null, $tag = '' ) {

        $atts       = array_change_key_case( (array)$atts, CASE_LOWER );
        $attributes = shortcode_atts( array(
        	'category'  => 'passenger-tire',
	        'tax_slug'  => '',
	        'tax_value' => '',
	        'layout'    => 'row',
        ), $atts, $tag );
        wp_localize_script( 'tirestan', 'ts_query', array(
            'category'  => esc_attr( $attributes['category'] ),
            'tax_slug'  => esc_attr( $attributes['tax_slug'] ),
            'tax_value' => esc_attr( $attributes['tax_value'] ),
            'layout'    => esc_attr( $attributes['layout'] ),
        ) );

        ob_start();
        get_template_part( 'template-parts/shortcode/content', 'product' );
        $o = ob_get_contents();
        ob_end_clean();

        return $o;

    }

	/**
	 * Render: mini products short code.
	 *
	 * @since     1.0.0
	 * @param     array     $atts
	 * @param     mixed     $content
	 * @param     string    $tag
	 * @return    string
	 */
	public function render_mini_products( $atts = array(), $content = null, $tag = '' ) {

		$atts       = array_change_key_case( (array)$atts, CASE_LOWER );
		$attributes = shortcode_atts( array(
			'category'   => 'passenger-tire',
			'brand'      => '',
			'status'     => '',
			'number'     => 6,
			'column_sm'  => '',
			'column_md'  => '',
			'column_lg'  => '',
			'column_xl'  => '',
			'column_xxl' => '',
		), $atts, $tag );

		global $tirestan;

		$tirestan->miniProduct             = new stdClass();
		$tirestan->miniProduct->category   = esc_attr( $attributes['category'] );
		$tirestan->miniProduct->brand      = esc_attr( $attributes['brand'] );
		$tirestan->miniProduct->status     = esc_attr( $attributes['status'] );
		$tirestan->miniProduct->number     = esc_attr( intval( $attributes['number'] ) );
		$tirestan->miniProduct->column_sm  = esc_attr( $attributes['column_sm'] );
		$tirestan->miniProduct->column_md  = esc_attr( $attributes['column_md'] );
		$tirestan->miniProduct->column_lg  = esc_attr( $attributes['column_lg'] );
		$tirestan->miniProduct->column_xl  = esc_attr( $attributes['column_xl'] );
		$tirestan->miniProduct->column_xxl = esc_attr( $attributes['column_xxl'] );

		ob_start();
		get_template_part( 'template-parts/shortcode/content', 'miniProduct' );
		$o = ob_get_contents();
		ob_end_clean();

		return $o;

	}

    /**
     * Render: order tracking short code.
     *
     * @since     1.0.0
     * @return    string
     */
    public function render_order_tracking() {

        // Get Output
        ob_start();
        get_template_part( 'template-parts/shortcode/content', 'orderTracking' );
        $o = ob_get_contents();
        ob_end_clean();

        return $o;

    }

}
