<?php

/**
 * The product filtering functionality for public-facing.
 *
 * @link     https://nik96.me
 * @since    1.0.0
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 */

/**
 * The product filtering functionality for public-facing.
 *
 * @package       Tirestan
 * @subpackage    Tirestan/public
 * @author        Nik96 <Nik96i@outlook.com>
 */
class Tirestan_Filter {

    /**
     * Retrieve specific product taxonomy names.
     *
     * @param     string    $product_id    The ID of the product
     * @param     string    $taxonomy      The name of taxonomy
     * @since     1.0.0
     * @access    private
     * @return    array    names array.
     */
    private function get_product_taxonomy_names( $product_id, $taxonomy ) {

        $o     = array();
        $tax   = ( get_the_terms( $product_id, $taxonomy ) ) ?
            get_the_terms( $product_id, $taxonomy ) : array();

        if ( is_array( $tax ) && sizeof( $tax ) > 0 ) {
            foreach ( $tax as $t ) {
                array_push( $o, $t->name );
            }
        }

        return $o;

    }

    /**
     * Retrieve products taxonomies.
     *
     * @param     array    $products      The products array
     * @param     array    $taxonomies    Desired taxonomies
     * @since     1.0.0
     * @access    private
     * @return    array    Taxonomies array.
     */
    private function get_products_taxonomies( $products, $taxonomies ) {

        $o = array();

        foreach ( $taxonomies as $tax ) {
            $o[$tax['name']] = array();
        }

        foreach ( $products as $product ) {

            foreach ( $taxonomies as $tax ) {
	            $o[$tax['name']] = array_merge( $o[$tax['name']],
		            $this->get_product_taxonomy_names( $product->ID, $tax['slug'] )
	            );
            }

        }

        foreach ( $taxonomies as $tax ) {
            $o[$tax['name']] = array_unique( $o[$tax['name']] );
            sort( $o[$tax['name']] );
        }

        return $o;

    }

    /**
     * Retrieve taxonomies.
     *
     * @param     array    $taxonomies    Desired taxonomies
     * @since     1.0.0
     * @access    private
     * @return    array    Taxonomies array.
     */
    private function get_terms( $taxonomies ) {

        $o = array();

        foreach ( $taxonomies as $tax ) {

            $o[$tax['name']] = array();
            $args            = array(
                'hide_empty' => false,
                'taxonomy'   => $tax['slug'],
            );
            $terms           = get_terms( $args );

            if ( $terms ) {
                foreach ( $terms as $term ) {
                    array_push( $o[$tax['name']], $term->name );
                }

                $o[$tax['name']] = array_unique( $o[$tax['name']] );
                sort( $o[$tax['name']] );
            }

        }

        return $o;

    }

    /**
     * Retrieve YITH brands.
     *
     * @since     1.0.0
     * @param     string    $category    The query category parameter
     * @return    array                  brands array.
     */
    public function get_yith_brands( $category ) {

        $args     = array(
            'numberposts' => -1,
            'post_type'   => 'product',
            'post_status' => 'publish',
            'tax_query'   => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => array( $category ),
                    'operator' => 'IN',
                ),
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => array( 'snow-chain' ),
                    'operator' => 'NOT IN',
                ),
            ),
        );
        $o        = array();
        $products = get_posts( $args );

        foreach ( $products as $product ) {

            $tax = ( get_the_terms( $product->ID, 'yith_product_brand' ) ) ?
                get_the_terms( $product->ID, 'yith_product_brand' ) : array();

            if ( is_array( $tax ) && sizeof( $tax ) > 0 ) {
                foreach ( $tax as $t ) {
                	if ( array_key_exists( $t->slug, $o ) ) {
                		continue;
	                }
                    $arr = array(
                        'name'      => $t->name,
                        'slug'      => $t->slug,
                        'id'        => $t->term_id,
                        'thumbnail' => '',
                        'url'       => get_term_link( $t->term_id, 'yith_product_brand' ),
                    );
                    $thumbnail_id = get_term_meta( $t->term_id, 'thumbnail_id', true );
                    if ( $thumbnail_id ) {
                        $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                        if ( sizeof( $thumbnail_url ) > 0 ) {
                            $arr['thumbnail'] = $thumbnail_url[0];
                        }
                    }
                    if ( $arr['thumbnail'] ) {
	                    $o[$t->slug] = $arr;
                    }
                }
            }

            if ( sizeof( $o ) > 24 ) {
                break;
            }

        }

        ksort( $o );
	    $output = array();
	    foreach ( $o as $o_slug => $o_obj ) {
		    array_push( $output, $o_obj );
	    }

	    return $output;

    }

    /**
     * Retrieve filter values.
     *
     * @since     1.0.0
     * @param     string    $category        The query category parameter
     * @param     string    $width           The query width parameter
     * @param     string    $aspect_ratio    The query aspect ratio parameter
     * @return    array                      Filters array.
     */
    public function get_filters( $category = '', $width = '', $aspect_ratio = '' ) {

        $args = array(
            'numberposts' => -1,
            'post_type'   => 'product',
            'post_status' => 'publish',
            'tax_query'   => array(),
        );

        // exclude snow-chain category and include received category
        if ( $category ) {
            array_push( $args['tax_query'], array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => array( $category ),
                'operator' => 'IN',
            ) );
        }
        array_push( $args['tax_query'], array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => array( 'snow-chain' ),
            'operator' => 'NOT IN',
        ) );

        if ( $width ) {
            array_push( $args['tax_query'], array(
                'taxonomy' => 'pa_width',
                'field'    => 'name',
                'terms'    => $width,
                'operator' => 'IN',
            ) );
        }

        if ( $aspect_ratio ) {
            array_push( $args['tax_query'], array(
                'taxonomy' => 'pa_aspect-ratio',
                'field'    => 'name',
                'terms'    => $aspect_ratio,
                'operator' => 'IN',
            ) );
        }

        $products = get_posts( $args );
        $filters  = $this->get_products_taxonomies( $products, array(
            array( 'name' => 'width',        'slug' => 'pa_width' ),
            array( 'name' => 'aspect_ratio', 'slug' => 'pa_aspect-ratio' ),
            array( 'name' => 'size',         'slug' => 'pa_size' ),
            array( 'name' => 'brand',        'slug' => 'yith_product_brand' )
        ) );

        return $filters;

    }

}
