<?php

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    function custom_shipping_method_init() {

        if ( ! class_exists( 'Tirestan_Core_Shipping' ) ) {

            class Tirestan_Core_Shipping extends WC_Shipping_Method {


                /**
                 * Constructor for shipping class
                 *
                 * @access    public
                 * @param    $instance_id
                 * @return    void
                 */
                public function __construct( $instance_id = 0 ) {

                    $this->id                 = 'ts_shipping_method'; // Id for your shipping method. Should be uunique.
                    $this->instance_id        = absint( $instance_id );
                    $this->method_title       = __( 'Tirestan Shipping Method' );  // Title shown in admin
                    $this->method_description = 'برای تحویل محصولات باید حتما در تاریخ و ساعت انتخابی حضور داشته باشید عدم حضور باعت از بین رفتن خرید شما بصورت اتوماتیک میشود. 10 درصد بابت استردادهای خرید اینترنتی کسر می شود. نام خریدار ،کارت ملی و سند سبز( سند ماشین) باید به یک نام باشد. تایرها تحویل داده نمیشود و فقط بر روی خودرو نصب میگردد. اجرت تعویض و بالانس هر چرخ 250,000 ريال میباشد. که این مبلغ از شما هنگام سفارش دریافت گردیده شده است.';
                    $this->supports           = array(
                        'shipping-zones',
                        'instance-settings',
                        'instance-settings-modal',
                    );

                    $this->init();

                }

                /**
                 * Init settings
                 *
                 * @access    public
                 * @return    void
                 */
                function init() {

                    // Load the settings.
                    $this->init_form_fields();
                    $this->init_settings();

                    $this->enabled = $this->get_option( 'enabled' );
                    $this->title   = $this->get_option( 'title' );
                    $this->cost    = $this->get_option( 'cost' );

                    // Save settings in admin if you have any defined
                    add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );

                }

                /**
                 * Init form fields.
                 */
                public function init_form_fields() {

                    $shipping_classes = get_terms( array(
                        'taxonomy'   => 'product_shipping_class',
                        'hide_empty' => false,
                    ) );

                    $options = array();
                    foreach ( $shipping_classes as $s ) {
                        $options[$s->term_id] = $s->name;
                    }

                    $this->instance_form_fields = array(
                        'enabled' => array(
                            'title' 		=> __( 'Enable/Disable', 'woocommerce' ),
                            'type' 			=> 'checkbox',
                            'label' 		=> __( 'Enable this shipping method' ),
                            'default' 		=> 'yes',
                        ),
                        'title' => array(
                            'title' 		=> __( 'Title', 'woocommerce' ),
                            'type' 			=> 'text',
                            'description' 	=> __( 'This controls the title which the user sees during checkout.' ),
                            'default'		=> __( 'Tirestan Shipping Method' ),
                            'desc_tip'		=> true,
                        ),
                        'cost'       => array(
                            'title'       => __( 'Cost', 'woocommerce' ),
                            'type'        => 'text',
                            'placeholder' => '0',
                            'description' => __( 'cost', 'woocommerce' ),
                            'default'     => '250000',
                            'desc_tip'    => true,
                        ),
                        'shipping_class'       => array(
                            'title'       => __( 'Shipping Class', 'woocommerce' ),
                            'type'        => 'select',
                            'description' => __( 'Shipping Class', 'woocommerce' ),
                            'options'     => $options,
                        ),
                    );

                }

                /**
                 * calculate_shipping function.
                 *
                 * @access    public
                 * @param    array    $package
                 */
                public function calculate_shipping( $package = array() ) {

                    $quantity       = 0;
                    $items_price    = 0;
                    $cost           = ( $this->get_option( 'cost' ) ) ? intval( $this->get_option( 'cost' ) ) : 0;
                    $shipping_class = $this->get_option( 'shipping_class' );
                    foreach ( $package['contents'] as $item_id => $values ) {
                        $product_shipping_id = strval( $values['data']->get_shipping_class_id() );
                        if ( $product_shipping_id == $shipping_class ) {
                            $quantity    += intval( $values['quantity'] );
                            $items_price += ( intval( $values['data']->get_price() ) * intval( $values['quantity'] ) );
                        }
                    }

                    $this->add_rate( array(
                        'id'    => $this->id . $this->instance_id,
                        'label' => $this->title,
                        'cost'  => ( $quantity * $cost ) - $items_price,
                    ) );

                }

                public function is_available( $package = array() ) {

                    $found          = false;
                    $shipping_class = $this->get_option( 'shipping_class' );
                    foreach ( $package['contents'] as $item_id => $values ) {
                        $product_shipping_id = strval( $values['data']->get_shipping_class_id() );
                        if ( $product_shipping_id == $shipping_class ) {
                            $found = true;
                        }
                    }
                    return $found;

                }

            }

        }

    }
    add_action( 'woocommerce_shipping_init', 'custom_shipping_method_init' );


    function add_custom_shipping_method( $methods ) {

        $methods['ts_shipping_method'] = 'Tirestan_Core_Shipping';
        return $methods;

    }
    add_filter( 'woocommerce_shipping_methods', 'add_custom_shipping_method' );


    function customize_order_shipping_to_display( $shipping, $order, $tax_display ) {

        $shipping_method = reset( $order->get_items( 'shipping' ) );

        if ( 'ts_shipping_method' === $shipping_method->get_method_id() ) {
            $shipping = WC()->shipping->get_shipping_methods()['ts_shipping_method']->get_method_description();
        }

        return $shipping;

    }
    add_filter( 'woocommerce_order_shipping_to_display', 'customize_order_shipping_to_display', 10, 3 );

}