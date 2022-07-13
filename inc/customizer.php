<?php
/**
 * chess store Theme Customizer
 *
 * @package chess_store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chess_store_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'chess_store_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'chess_store_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'chess_store_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function chess_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function chess_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chess_store_customize_preview_js() {
	wp_enqueue_script( 'chess-store-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _CHESS_STORE_VERSION, true );
}
add_action( 'customize_preview_init', 'chess_store_customize_preview_js' );

/* Hide sections from WordPress customizer */
function hide_customizer_sections($wp_customize)
{
	$wp_customize->remove_section('static_front_page'); // Homepage settings
	$wp_customize->remove_section('colors'); // Colors
	$wp_customize->remove_section('header_image'); // Header imagen
	$wp_customize->remove_section('background_image'); // Background image
	$wp_customize->remove_section('themes'); // Themes
}
add_action('customize_register', 'hide_customizer_sections', 30);

/**
 * Topbar Settings for HEADER
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function add_topbar_options($wp_customize)
{

	$wp_customize->add_panel('header_options_panel', array(
		'title' 		=> __('Topbar Options', 'chess-store'),
		'priority' 		=> 10,
		'capability'	=> 'edit_theme_options',
	));

	$wp_customize->add_section('header_options_section', array(
		'title' 		=> __('Topbar Options', 'chess-store'),
		'description'	=> __('Please set the values for Topbar', 'chess-store')
	));

	$wp_customize->add_setting('topbar_options_facebook', array());
	$wp_customize->add_control('topbar_options_facebook', array(
		'label'		=> __('Facebook Address', 'chess-store'),
		'section'	=> 'header_options_section',
		'priority'	=> 1
	));

	$wp_customize->add_setting('topbar_options_insta', array());
	$wp_customize->add_control('topbar_options_insta', array(
		'label'		=> __('Instagram Address', 'chess-store'),
		'section'	=> 'header_options_section',
		'priority'	=> 2
	));

	$wp_customize->add_setting('topbar_options_whatsapp', array());
	$wp_customize->add_control('topbar_options_whatsapp', array(
		'label'		=> __('WhatsApp Number', 'chess-store'),
		'section'	=> 'header_options_section',
		'priority'	=> 3
	));

	$wp_customize->add_setting('topbar_options_phone_one', array());
	$wp_customize->add_control('topbar_options_phone_one', array(
		'label'		=> __('Phone Number 1', 'chess-store'),
		'section'	=> 'header_options_section',
		'priority'	=> 4
	));

	$wp_customize->add_setting('topbar_options_phone_two', array());
	$wp_customize->add_control('topbar_options_phone_two', array(
		'label'		=> __('Phone Number 2', 'chess-store'),
		'section'	=> 'header_options_section',
		'priority'	=> 5
	));
}
add_action('customize_register', 'add_topbar_options');

/**
 * Footer Settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function footer_settings($wp_customize)
{
	$wp_customize->add_panel('footer_options_panel', array(
		'title' 		=> __('Footer Options', 'chess-store'),
		'priority' 		=> 10,
		'capability'	=> 'edit_theme_options',
	));

	$wp_customize->add_section('footer_options_section', array(
		'title' 		=> __('Footer Options', 'chess-store'),
		'description'	=> __('Please set the values for Footer', 'chess-store')
	));

	$wp_customize->add_setting('footer_options_phone_one', array());
	$wp_customize->add_control('footer_options_phone_one', array(
		'label'		=> __('Phone Number 1', 'chess-store'),
		'section'	=> 'footer_options_section',
		'priority'	=> 4
	));

	$wp_customize->add_setting('footer_options_phone_two', array());
	$wp_customize->add_control('footer_options_phone_two', array(
		'label'		=> __('Phone Number 2', 'chess-store'),
		'section'	=> 'footer_options_section',
		'priority'	=> 5
	));

	$wp_customize->add_setting('footer_options_credit', array());
	$wp_customize->add_control('footer_options_credit', array(
		'label'			=> __('Footer Credits', 'chess-store'),
		'type'			=> 'textarea',
		'section'		=> 'footer_options_section',
		'priority'		=> 5
	));

	$wp_customize->add_setting('footer_logo_image', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'footer_logo_image', array(
			'label' => __('Footer Logo', 'chess-store'),
			'section' => 'footer_options_section',
			'settings' => 'footer_logo_image',
		))
	);
}
add_action('customize_register', 'footer_settings');