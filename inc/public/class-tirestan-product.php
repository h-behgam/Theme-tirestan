<?php

/**
 * The product query functionality for public-facing.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 */

/**
 * The product query functionality for public-facing.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Product {

    /**
     * Query arguments
     *
     * @since     1.0.0
     * @access    private
     * @var       array    $args    Query arguments.
     */
    private $args;

    /**
     * The product query functionality for public-facing.
     * @since    1.0.0
     */
    public function __construct() {

        $this->args = array(
            'paged'          => 1,
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 12,
            'meta_query'     => array(),
            'tax_query'      => array(),
        );

    }

    /**
     * Get query arguments.
     *
     * @since     1.0.0
     * @access    private
     * @return    array    Query arguments.
     */
    private function get_args() {

        return $this->args;

    }

    /**
     * Set default query arguments.
     *
     * @since     1.0.0
     * @access    private
     */
    private function set_default_args() {

        array_push( $this->args['tax_query'], array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => array( 'snow-chain' ),
            'operator' => 'NOT IN',
        ) );

    }

    /**
     * Set orderby query arguments.
     *
     * @since     1.0.0
     * @access    private
     * @param     string    $orderby    Current orderby.
     */
    private function set_orderby_args( $orderby = '' ) {

        if ( $orderby ) {
            switch ( $orderby ) {
                case 'modified':
                    $this->args["orderby"] = "modified";
                    $this->args["order"]   = "DESC";
                    break;
                case 'random':
                    $this->args["orderby"] = "rand";
                    $this->args["order"]   = "DESC";
                    break;
                case 'popularity':
                    $this->args["orderby"]  = "meta_value_num";
                    $this->args["order"]    = "DESC";
                    $this->args["meta_key"] = "total_sales";
                    break;
                case 'low_to_high':
                    $this->args["orderby"]  = "meta_value_num";
                    $this->args["order"]    = "ASC";
                    $this->args["meta_key"] = "_price";
                    break;
                case 'high_to_low':
                    $this->args["orderby"]  = "meta_value_num";
                    $this->args["order"]    = "DESC";
                    $this->args["meta_key"] = "_price";
            }
        } else {
            array_push( $this->args['meta_query'], array(
                'relation'     => 'AND',
                'stock_status' => array(
                    'key'     => '_stock_status',
                    'compare' => 'EXISTS',
                ),
                'tyre_status'  => array(
                    'key'  => 'tyre-status',
                    'type' => 'CHAR',
                ),
                'tyre_price'   => array(
                    'key'  => '_price',
                    'type' => 'NUMERIC',
                ),
            ) );
            $this->args['orderby'] = array(
                'stock_status' => 'ASC',
                'tyre_status'  => 'ASC',
                'tyre_price'   => 'DESC',
            );
        }

    }

    /**
     * Set in stock only query arguments.
     *
     * @since     1.0.0
     * @access    private
     */
    private function set_in_stock_args() {

        array_push( $this->args['meta_query'], array(
            'key'   => '_stock_status',
            'value' => 'instock',
        ) );

    }

    /**
     * Get products.
     *
     * @param     array    $params    Query parameters.
     * @since     1.0.0
     * @return    array
     */
    public function product_query( $params = array() ) {

        $per_page      = ( ! empty( $params['per_page'] ) ) ? intval( $params['per_page'] ) : 12;
        $item_type     = ( ! empty( $params['item_type'] ) ) ? $params['item_type'] : 'normal';
        $orderby       = ( ! empty( $params['orderby'] ) ) ? $params['orderby'] : '';
        $in_stock_only = ( ! empty( $params['in_stock_only'] ) ) ? $params['in_stock_only'] : false;
        $express       = ( ! empty( $params['express'] ) ) ? $params['express'] : false;
        $sale_status   = ( ! empty( $params['status'] ) ) ? $params['status'] : '';
        $width         = ( ! empty( $params['width'] ) ) ? $params['width'] : '';
        $aspect_ratio  = ( ! empty( $params['aspect_ratio'] ) ) ? $params['aspect_ratio'] : '';
        $size          = ( ! empty( $params['size'] ) ) ? $params['size'] : '';
        $brand         = ( ! empty( $params['brand'] ) ) ? $params['brand'] : '';
        $category      = ( ! empty( $params['category'] ) ) ? $params['category'] : '';
        $tag           = ( ! empty( $params['tag'] ) ) ? $params['tag'] : '';

        $by_custom_tax = ( ! empty( $params['custom_tax'] ) );
        $attr          = ( ! empty( $params['custom_tax_name'] ) ) ? $params['custom_tax_name'] : '';
        $attr_value    = ( ! empty( $params['custom_tax_value'] ) ) ? $params['custom_tax_value'] : '';

        $by_custom_car = ( ! empty( $params['custom_car'] ) ) ? $params['custom_car'] : '';
        $car_brand     = ( ! empty( $params['car_brand'] ) ) ? $params['car_brand'] : '';
        $car_model     = ( ! empty( $params['car_model'] ) ) ? $params['car_model'] : '';
        $car_year      = ( ! empty( $params['car_year'] ) ) ? $params['car_year'] : '';

        // Posts Per Page
	    $this->args['posts_per_page'] = $per_page;

        // Paged
        $paged = 1;
        if ( isset( $params['paged'] ) && intval( $params['paged'] ) > 0 ) {
            $paged = intval( $params['paged'] );
        }
        $this->args['paged'] = $paged;

        // Orderby
        $this->set_orderby_args( $orderby );

        // Exclude snow-chain category
        $this->set_default_args();

        // In Stock Only
        if ( $in_stock_only ) {
            $this->set_in_stock_args();
        }

        // Express
        if ( $express ) {
            array_push( $this->args["meta_query"], array(
                'key'     => 'tyre-express',
                'value'   => '1',
                'compare' => '==',
            ) );
        }

        // Sale Status
        if ( $sale_status ) {
            array_push( $this->args["meta_query"], array(
                'key'     => 'tyre-status',
                'value'   => $sale_status,
                'compare' => '==',
            ) );
        }

        // Width
        if ( $width ) {
            array_push( $this->args["tax_query"], array(
                'taxonomy' => 'pa_width',
                'field'    => 'name',
                'terms'    => $width,
                'operator' => 'IN',
            ) );
        }

        // Aspect Ratio
        if ( $aspect_ratio ) {
            array_push( $this->args["tax_query"], array(
                'taxonomy' => 'pa_aspect-ratio',
                'field'    => 'name',
                'terms'    => $aspect_ratio,
                'operator' => 'IN',
            ) );
        }

        // Size
        if ( $size ) {
            array_push( $this->args["tax_query"], array(
                'taxonomy' => 'pa_size',
                'field'    => 'name',
                'terms'    => $size,
                'operator' => 'IN',
            ) );
        }

        // Brand
        if ( $brand ) {
            array_push( $this->args["tax_query"], array(
                'taxonomy' => 'yith_product_brand',
                'field'    => 'name',
                'terms'    => $brand,
                'operator' => 'IN',
            ) );
        }

        // Category
        if ( $category ) {
            array_push( $this->args["tax_query"], array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category,
                'operator' => 'IN',
            ) );
        }

        // Tag
        if ( $tag ) {
            $this->args["product_tag"] = $tag;
        }

        // By Custom Taxonomy
        if ( $by_custom_tax && $attr && $attr_value ) {
            array_push( $this->args["tax_query"], array(
                'taxonomy' => $attr,
                'field'    => 'slug',
                'terms'    => explode( ',', $attr_value ),
                'operator' => 'IN',
            ) );
        }

        // By Custom Car
        if ( $by_custom_car && $car_brand && $car_model && $car_year ) {

            $brands_array = get_option( 'car_brands' );
            $cats         = $brands_array[$car_brand][$car_model][$car_year];
            if ( $cats ) {
                $query_cats = array();
                foreach ( $cats as $cat => $cat_type ) {
                    array_push( $query_cats, $cat );
                }
                array_push( $this->args['tax_query'], array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $query_cats,
                    'operator' => 'IN',
                ) );
            }

        }

        return $this->render_products( $item_type );

    }

    /**
     * Render products based on specific query args.
     *
     * @since     1.0.0
     * @access    private
     * @param     string    $item_type    The type of product items.
     * @return    array                   Products object
     */
    private function render_products( $item_type = 'normal' ) {

        $the_query = new WP_Query( $this->get_args() );
        $output    = array(
            'items'      => '',
            'total'      => 0,
            'pages'      => 0,
            'pagination' => '',
        );

        if ( $the_query->have_posts() ) { // Found

            global $tirestan;
            $tirestan->location = 'shop';

            $output['total'] = $the_query->found_posts;
            $output['pages'] = $the_query->max_num_pages;

            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                // Get Output
	            if ( 'normal' === $item_type ) {

		            ob_start();
		            get_template_part( 'template-parts/shop/content', 'item' );
		            $output['items'] .= ob_get_contents();
		            ob_end_clean();
	            } else {

		            ob_start();
		            get_template_part( 'template-parts/shortcode/miniProduct', 'item' );
		            $output['items'] .= ob_get_contents();
		            ob_end_clean();
	            }

            }

            // Pagination
            if ( 'normal' === $item_type && 1 === $this->get_args()['paged'] ) {

                ob_start();
                get_template_part( 'template-parts/shop/content', 'pagination' );
                $output['pagination'] .= ob_get_contents();
                ob_end_clean();
            }

        } else { // Not Found

        	if ( 'normal' === $item_type ) {
		        ob_start();
		        get_template_part( 'template-parts/shop/content', 'notFound' );
		        $output['items'] .= ob_get_contents();
		        ob_end_clean();
	        }

        }

        wp_reset_postdata();

        return $output;

    }

    /**
     * Get product preview.
     *
     * @param     mixed    $product_id    Product ID.
     * @since     1.0.0
     * @return    string
     */
    public function preview_query( $product_id ) {

        if ( ! $product_id ) {
            return 'محصولی یافت نشد';
        }

        $this->args['p'] = $product_id;

        return $this->render_preview();

    }

    /**
     * Render preview based on product ID.
     *
     * @since     1.0.0
     * @access    private
     * @return    string    Preview
     */
    private function render_preview() {

        $the_query = new WP_Query( $this->get_args() );
        $preview   = 'محصولی یافت نشد';

        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                global $tirestan;
                $tirestan->location = 'preview';

                // Get Output
                ob_start();
                get_template_part( 'template-parts/shop/content', 'preview' );
                $preview = ob_get_contents();
                ob_end_clean();

            }

        }

        wp_reset_postdata();
        return $preview;

    }

}
