<?php
/**
 * Handles the Customizer settings for the site banner
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */

namespace KristaRae\Starter;

use WP_Customize_Control;
use WP_Customize_Color_Control;

add_action( 'customize_register', __NAMESPACE__ . '\add_banner_settings' );
/**
 * Creates the site banner settings and controls
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function add_banner_settings( $wp_customize ) {

//	global $wp_customize;

	$section = SETTINGS_PREFIX . '_site_banner_section';

	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Site Banner',
			'description' => 'Sitewide banner shown at the top of every page',
			'priority'    => 35,
		)
	);

	// Show banner
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_display' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_display', array(
		'label'    => 'Display banner?',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_display',
		'type'     => 'checkbox',
		'priority' => 0
	) ) );

	// Text
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_text' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_text', array(
		'label'    => 'Banner text',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_text',
		'priority' => 1
	) ) );

	// Link
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_link' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_link', array(
		'label'    => 'Banner link',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_link',
		'priority' => 2
	) ) );

	// Open link in new tab
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_new_tab' );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_new_tab', array(
		'label'    => 'Open link in new tab?',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_new_tab',
		'type'     => 'checkbox',
		'priority' => 3
	) ) );

	// Text color
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_text_color', array(
		'default' => '#fff',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_text_color', array(
		'label'    => 'Text color',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_text_color',
		'priority' => 4
	) ) );

	// Text hover color
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_text_hover_color', array(
		'default' => '#eee',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_text_hover_color', array(
		'label'    => 'Text hover color',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_text_hover_color',
		'priority' => 5
	) ) );

	// Background color
	$wp_customize->add_setting( SETTINGS_PREFIX . 'site_banner_background_color', array(
		'default' => '#479182',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, SETTINGS_PREFIX . 'site_banner_background_color', array(
		'label'    => 'Background color',
		'section'  => $section,
		'settings' => SETTINGS_PREFIX . 'site_banner_background_color',
		'priority' => 6
	) ) );

}