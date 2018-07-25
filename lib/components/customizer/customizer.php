<?php
/**
 * Handles the Customizer
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

use WP_Customize_Color_Control;

add_action( 'customize_register', __NAMESPACE__ . '\register_with_customizer' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function register_with_customizer() {
	global $wp_customize;

	$wp_customize->add_setting(
		SETTINGS_PREFIX . '_link_color',
		array(
			'default'           => get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			SETTINGS_PREFIX . '_link_color',
			array(
				'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', CHILD_TEXT_DOMAIN ),
			    'label'       => __( 'Link Color', CHILD_TEXT_DOMAIN ),
			    'section'     => 'colors',
			    'settings'    => SETTINGS_PREFIX . '_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		SETTINGS_PREFIX . '_accent_color',
		array(
			'default'           => get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			SETTINGS_PREFIX . '_accent_color',
			array(
				'description' => __( 'Change the default color for button hovers.', CHILD_TEXT_DOMAIN ),
			    'label'       => __( 'Accent Color', CHILD_TEXT_DOMAIN ),
			    'section'     => 'colors',
			    'settings'    => SETTINGS_PREFIX . '_accent_color',
			)
		)
	);

}
