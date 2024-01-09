<?php
/**
 * This snippet has been updated to reflect the official supporting of options pages by CMB2
 * in version 2.2.5.
 *
 * If you are using the old version of the options-page registration,
 * it is recommended you swtich to this method.
 */
add_action('cmb2_admin_init', 'tirestan_register_theme_options_metabox');
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function tirestan_register_theme_options_metabox()
{

	/**
	 * Registers options page menu item and form.
	 */
	$cmb = new_cmb2_box(
		array(
			'id' => 'tirestan_option_metabox',
			'title' => esc_html__('تنظیمات قالب', 'tirestan'),
			'object_types' => array('options-page'),

			/*
			 * The following parameters are specific to the options-page box
			 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
			 */

			'option_key' => 'tirestan_options', // The option key and admin menu page slug.
			// 'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
			// 'menu_title'      => esc_html__( 'Options', 'tirestan' ), // Falls back to 'title' (above).
			// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
			// 'capability'      => 'manage_options', // Cap required to view options-page.
			// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
			// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
			// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
			// 'save_button'     => esc_html__( 'Save Theme Options', 'tirestan' ), // The text for the options-page save button. Defaults to 'Save'.
		));

	/*
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */

	$header_settings = $cmb->add_field(
		array(
			'id' => 'main_settings',
			'type' => 'group',
			'description' => __( 'تنظیمات هدر', 'cmb2' ),
			'repeatable' => false,
			// use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('تنظیمات هدر', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				// 'add_button'        => __( 'Add Another Entry', 'cmb2' ),
				// 'remove_button'     => __( 'Remove Entry', 'cmb2' ),
				// 'sortable'          => true,
				'closed' => true,
				// true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($header_settings, array(
		'name' => 'لوگو',
		'id' => 'logo',
		'type' => 'file',
		'options' => array(
			'url' => false,
			
		),
	));
	$cmb->add_group_field($header_settings, array(
		'name' => 'متن لوگو',
		'id' => 'alt',
		'type' => 'text',
	));
	/*
	 * slider
	 */
	$slider = $cmb->add_field(
		array(
			'id' => 'slider',
			'type' => 'group',
			'description' => __('تنظیمات بخش اسلایدر', 'cmb2'),
			// 'repeatable'  => false, // use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('اسلایدر {#}', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				'add_button' => __('Add Another Entry', 'cmb2'),
				'remove_button' => __('Remove Entry', 'cmb2'),
				// 'sortable'          => true,
				'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($slider, array(
		'name' => 'تصویر',
		'id' => 'image',
		'type' => 'file',
		'options' => array(
			'url' => false,
			
		),
	));
	$cmb->add_group_field($slider, array(
		'name' => 'لینک',
		'id' => 'link',
		'type' => 'text',
	));
	$cmb->add_group_field($slider, array(
		'name' => 'تگ تصویر',
		'id' => 'alt',
		'type' => 'text',
	));
	/*
	 * slider
	 */
	$slider2 = $cmb->add_field(
		array(
			'id' => 'slider2',
			'type' => 'group',
			'description' => __('تنظیمات بخش اسلایدر دوم', 'cmb2'),
			// 'repeatable'  => false, // use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('اسلایدر دوم {#}', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				'add_button' => __('Add Another Entry', 'cmb2'),
				'remove_button' => __('Remove Entry', 'cmb2'),
				// 'sortable'          => true,
				'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($slider2, array(
		'name' => 'تصویر',
		'id' => 'image',
		'type' => 'file',
		'options' => array(
			'url' => false,
			
		),
	));
	$cmb->add_group_field($slider2, array(
		'name' => 'لینک',
		'id' => 'link',
		'type' => 'text',
	));
	$cmb->add_group_field($slider2, array(
		'name' => 'تگ تصویر',
		'id' => 'alt',
		'type' => 'text',
	));

	/*
	* footer
	*/
	$footer = $cmb->add_field(
		array(
			'id' => 'footer_settings',
			'type' => 'group',
			'description' => __( 'تنظیمات بخش فوتر', 'cmb2' ),
			'repeatable' => false,
			// use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('تنظیمات فوتر', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				// 'add_button'        => __( 'Add Another Entry', 'cmb2' ),
				// 'remove_button'     => __( 'Remove Entry', 'cmb2' ),
				// 'sortable'          => true,
				'closed' => true,
				// true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($footer, array(
		'name' => 'توضیحات',
		'id' => 'info',
		'type' => 'text',
	));
	$cmb->add_group_field($footer, array(
		'name' => 'آدرس',
		'id' => 'address',
		'type' => 'text',
	));
	$cmb->add_group_field($footer, array(
		'name' => 'تلفن',
		'id' => 'tel',
		'type' => 'text',
	));
	$cmb->add_group_field($footer, array(
		'name' => 'ایمیل',
		'id' => 'email',
		'type' => 'text_email',
	));
	/*
	* search
	*/
	$search = $cmb->add_field(
		array(
			'id' => 'search_settings',
			'type' => 'group',
			'description' => __( 'تنظیمات بخش پرفروشترین ها و محصولات فروش ویژه صفحه اصلی .', 'cmb2' ),
			'repeatable' => false,
			// use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('تنظیمات بخش سرچ صفحه اصلی .', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				// 'add_button'        => __( 'Add Another Entry', 'cmb2' ),
				// 'remove_button'     => __( 'Remove Entry', 'cmb2' ),
				// 'sortable'          => true,
				'closed' => true,
				// true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($search, array(
		'name' => 'آرگومان ورودی سرچ اول',
		'desc' => 'برای محصولات فروش ویژه از  _sale_price و پرفروشترین ها از total_sales استفاده کنید.',
		'id' => 'meta_key1',
		'type' => 'text',
	));
	$cmb->add_group_field($search, array(
		'name' => 'نام یک دسته بندی',
		'desc' => 'در صورت وارد کردن نام یک دسته بندی تنظیمات سرچ اول لغو می شود.',
		'id' => 'meta_key_cat_name1',
		'type' => 'text',
	));
	$cmb->add_group_field($search, array(
		'name' => 'تصویر',
		'id' => 'image1',
		'type' => 'file',
		'options' => array(
			'url' => false,
		),
	));
	$cmb->add_group_field($search, array(
		'name' => 'عنوان 2 کلمه ای وارد کنید',
		'id' => 'meta_key_title1',
		'type' => 'text',
	));
	$cmb->add_group_field($search, array(
		'name' => 'لینک ادامه مطلب را وارد گنید',
		'id' => 'meta_key_link1',
		'type' => 'text',
	));


	$cmb->add_group_field($search, array(
		'name' => 'آرگومان ورودی سرچ دوم',
		'desc' => 'برای محصولات فروش ویژه از  _sale_price و پرفروشترین ها از total_sales استفاده کنید.',
		'id' => 'meta_key2',
		'type' => 'text',
	));
	$cmb->add_group_field($search, array(
		'name' => 'نام یک دسته بندی',
		'desc' => 'در صورت وارد کردن نام یک دسته بندی تنظیمات سرچ دوم لغو می شود.',
		'id' => 'meta_key_cat_name2',
		'type' => 'text',
	));
	$cmb->add_group_field($search, array(
		'name' => 'تصویر',
		'id' => 'image2',
		'type' => 'file',
		'options' => array(
			'url' => false,
		),
	));
	$cmb->add_group_field($search, array(
		'name' => 'عنوان 2 کلمه ای وارد کنید',
		'id' => 'meta_key_title2',
		'type' => 'text',
	));
	$cmb->add_group_field($search, array(
		'name' => 'لینک ادامه مطلب را وارد گنید',
		'id' => 'meta_key_link2',
		'type' => 'text',
	));

	
	/*
	* branding
	*/
	$works_settings = $cmb->add_field(
		array(
			'id' => 'works_settings',
			'type' => 'group',
			'description' => __( 'تنظیمات لوگو برندها. تعداد لوگو ها باید بیش از 10 عدد باشد.', 'cmb2' ),
			'repeatable' => true,
			// use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('تنظیمات لوگو برندها', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				'add_button'        => __( 'Add Another Entry', 'cmb2' ),
				'remove_button'     => __( 'Remove Entry', 'cmb2' ),
				// 'sortable'          => true,
				'closed' => true,
				// true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($works_settings, array(
		'name' => 'لوگو',
		'id' => 'logo',
		'type' => 'file',
		'options' => array(
			'url' => false,
			
		),
	));
	$cmb->add_group_field($works_settings, array(
		'name' => 'توضیحات',
		'id' => 'alt',
		'type' => 'text',
	));
	/*
	 * slider
	 */
	$social = $cmb->add_field(
		array(
			'id' => 'social',
			'type' => 'group',
			'description' => __('تنظیمات بخش سوشال مدیا', 'cmb2'),
			// 'repeatable'  => false, // use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('سوشال مدیا {#}', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				'add_button' => __('Add Another Entry', 'cmb2'),
				'remove_button' => __('Remove Entry', 'cmb2'),
				// 'sortable'          => true,
				'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($social, array(
		'name' => 'تصویر',
		'id' => 'image',
		'type' => 'file',
		'options' => array(
			'url' => false,
			
		),
	));
	$cmb->add_group_field($social, array(
		'name' => 'لینک',
		'id' => 'link',
		'type' => 'text',
	));
	$cmb->add_group_field($social, array(
		'name' => 'تگ تصویر',
		'id' => 'alt',
		'type' => 'text',
	));
	/*
	* 
	*/
	$identify = $cmb->add_field(
		array(
			'id' => 'identify',
			'type' => 'group',
			'description' => __('تنظیمات بخش لوگو اعتبار سایت', 'cmb2'),
			// 'repeatable'  => false, // use false if you want non-repeatable group
			'options' => array(
				'group_title' => __('لوگو اعتبار سایت {#}', 'cmb2'),
				// since version 1.1.4, {#} gets replaced by row number
				'add_button' => __('Add Another Entry', 'cmb2'),
				'remove_button' => __('Remove Entry', 'cmb2'),
				// 'sortable'          => true,
				'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
		));

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field($identify, array(
		'name' => 'تصویر',
		'id' => 'image',
		'type' => 'file',
		'options' => array(
			'url' => false,
			
		),
	));
	$cmb->add_group_field($identify, array(
		'name' => 'لینک',
		'id' => 'link',
		'type' => 'text',
	));
	$cmb->add_group_field($identify, array(
		'name' => 'تگ تصویر',
		'id' => 'alt',
		'type' => 'text',
	));
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function tirestan_get_option($key = '', $default = false)
{
	if (function_exists('cmb2_get_option')) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option('tirestan_options', $key, $default);
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option('tirestan_options', $default);

	$val = $default;

	if ('all' == $key) {
		$val = $opts;
	} elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
		$val = $opts[$key];
	}

	return $val;
}