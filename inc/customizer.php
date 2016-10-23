<?php
/**
 * Sanremo theme Customizer
 *
 * @package Sanremo
 */

function sanremo_theme_options( $wp_customize ) {
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register' , 'sanremo_theme_options' );

/**
 * Options for WordPress Theme Customizer.
 */
function sanremo_customizer( $wp_customize ) {

	global $sanremo_site_layout;

	/**
	 * Section: Theme layout options
	 */

	$wp_customize->add_section('sanremo_layout_section', array(
		'title' => __('Layout options', 'sanremo'),
		'description' => sprintf(__('Choose website layout', 'sanremo')),
		'priority' => 31,
	));

		// Sidebar position
		$wp_customize->add_setting('sanremo_sidebar_position', array(
			'default' => 'ot-sidebar-right',
			'sanitize_callback' => 'sanremo_sanitize_layout'
		));

		$wp_customize->add_control('sanremo_sidebar_position', array(
			'label' => __('Website Layout Options', 'sanremo'),
			'section' => 'sanremo_layout_section',
			'type'    => 'select',
			'description' => __('Choose between different layout options to be used as default', 'sanremo'),
			'choices'    => $sanremo_site_layout
		));	

	/**
	 * Section: Slider settings
	 */

	$wp_customize->add_section( 
		'sanremo_slider_options', 
		array(
			'title'       => __( 'Slider Settings', 'sanremo' ),
			'priority'    => 32,
			'capability'  => 'edit_theme_options',
			'description' => __('Change slider settings here.', 'sanremo'), 
		) 
	);

		// chose category for slider
		$wp_customize->add_setting( 'sanremo_slider_cat', array(
			'default' => 0,
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanremo_sanitize_slidercat'
		) );	

		$wp_customize->add_control( 'sanremo_slider_cat', array(
			'type' => 'select',
			'label' => 'Choose a category',
			'choices' => sanremo_cats(),
			'section' => 'sanremo_slider_options',
		) );

		// checkbox show/hide slider
		$wp_customize->add_setting( 'show_sanremo_slider', array(
			'default'        => false,
			'transport'  =>  'refresh',
			'sanitize_callback' => 'sanremo_sanitize_checkbox'
		) );

		$wp_customize->add_control(
			'show_sanremo_slider',
			array(
				'label'     => __('Show Slider?','sanremo'),
				'section'   => 'sanremo_slider_options',
				'type'      => 'checkbox'
			)
		);

}

add_action( 'customize_register', 'sanremo_customizer' );

/**
 * Adds sanitization callback function: Slider Category
 */
function sanremo_sanitize_slidercat( $input ) {
	if ( array_key_exists( $input, sanremo_cats()) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitze checkbox for WordPress customizer
 */
function sanremo_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitze number for WordPress customizer
 */
function sanremo_sanitize_number($input) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Sanitze blog layout
 */
function sanremo_sanitize_layout( $input ) {
	global $sanremo_site_layout;
	if ( array_key_exists( $input, $sanremo_site_layout ) ) {
		return $input;
	} else {
		return '';
	}
}