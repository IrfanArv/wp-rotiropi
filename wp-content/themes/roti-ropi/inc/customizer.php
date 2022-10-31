<?php

defined('ABSPATH') || exit;

/**
 * Implement Theme Customizer additions and adjustments.
 * https://codex.wordpress.org/Theme_Customization_API
 *
 * How do I "output" custom theme modification settings? https://developer.wordpress.org/reference/functions/get_theme_mod
 * echo get_theme_mod( 'copyright_info' );
 * or: echo get_theme_mod( 'copyright_info', 'Default (c) Copyright Info if nothing provided' );
 *
 * "sanitize_callback": https://codex.wordpress.org/Data_Validation
 */
function roti_ropi_customize($wp_customize)
{
	/**
	 * Initialize sections
	 */
	$wp_customize->add_section(
		'theme_header_section',
		array(
			'title'    => __('Header', 'roti-ropi'),
			'priority' => 1000,
		)
	);

	$wp_customize->add_section('additional_field', array(
		'title'    => __('Web Settings', 'roti-ropi'),
	));

	$wp_customize->add_setting(
		'footer_add',
		array(
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'footer_add',
		array(
			'type'     => 'textarea',
			'label'    => __('Description Footer', 'roti-ropi'),
			'section'  => 'additional_field',
			'settings' => 'footer_add',
		)
	);

	$wp_customize->add_setting(
		'facebook',
		array(
			'default' => 'https://facebook.com/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'facebook',
		array(
			'type'     => 'text',
			'label'    => __('Facebook', 'roti-ropi'),
			'section'  => 'additional_field',
			'settings' => 'facebook',
		)
	);

	$wp_customize->add_setting(
		'instagram',
		array(
			'default' => 'https://instagram.com/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'instagram',
		array(
			'type'     => 'text',
			'label'    => __('Instagram', 'roti-ropi'),
			'section'  => 'additional_field',
			'settings' => 'instagram',
		)
	);

	$wp_customize->add_setting(
		'linkedin',
		array(
			'default' => 'https://linkedin.com/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'linkedin',
		array(
			'type'     => 'text',
			'label'    => __('Linked in', 'roti-ropi'),
			'section'  => 'additional_field',
			'settings' => 'linkedin',
		)
	);

	$wp_customize->add_setting(
		'youtube',
		array(
			'default' => 'https://youtube.com/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'youtube',
		array(
			'type'     => 'text',
			'label'    => __('Youtube', 'roti-ropi'),
			'section'  => 'additional_field',
			'settings' => 'youtube',
		)
	);

	/**
	 * Section: Page Layout
	 */
	// Header Logo.
	$wp_customize->add_setting(
		'header_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_logo',
			array(
				'label'       => __('Upload Header Logo', 'roti-ropi'),
				'description' => __('Height: &gt;80px', 'roti-ropi'),
				'section'     => 'theme_header_section',
				'settings'    => 'header_logo',
				'priority'    => 1,
			)
		)
	);

	// Predefined Navbar scheme.
	$wp_customize->add_setting(
		'navbar_scheme',
		array(
			'default'           => 'default',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'navbar_scheme',
		array(
			'type'     => 'radio',
			'label'    => __('Navbar Scheme', 'roti-ropi'),
			'section'  => 'theme_header_section',
			'choices'  => array(
				'navbar-light bg-light'  => __('Default', 'roti-ropi'),
				'navbar-dark bg-dark'    => __('Dark', 'roti-ropi'),
				'navbar-dark bg-primary' => __('Primary', 'roti-ropi'),
			),
			'settings' => 'navbar_scheme',
			'priority' => 1,
		)
	);

	// Fixed Header?
	$wp_customize->add_setting(
		'navbar_position',
		array(
			'default'           => 'static',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'navbar_position',
		array(
			'type'     => 'radio',
			'label'    => __('Navbar', 'roti-ropi'),
			'section'  => 'theme_header_section',
			'choices'  => array(
				'static'       => __('Static', 'roti-ropi'),
				'fixed_top'    => __('Fixed to top', 'roti-ropi'),
				'fixed_bottom' => __('Fixed to bottom', 'roti-ropi'),
			),
			'settings' => 'navbar_position',
			'priority' => 2,
		)
	);

	// Search?
	$wp_customize->add_setting(
		'search_enabled',
		array(
			'default'           => '1',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'search_enabled',
		array(
			'type'     => 'checkbox',
			'label'    => __('Show Searchfield?', 'roti-ropi'),
			'section'  => 'theme_header_section',
			'settings' => 'search_enabled',
			'priority' => 3,
		)
	);
}
add_action('customize_register', 'roti_ropi_customize');


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function roti_ropi_customize_preview_js()
{
	wp_enqueue_script('customizer', get_template_directory_uri() . '/inc/customizer.js', array('jquery'), null, true);
}
add_action('customize_preview_init', 'roti_ropi_customize_preview_js');
