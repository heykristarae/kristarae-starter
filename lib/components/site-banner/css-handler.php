<?php
/**
 * Adds CSS from the Customizer options for the site banner
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\build_banner_css_from_customizer_settings' );
/**
 * Checks the settings for the banner colors.
 * If any of these value are set the appropriate CSS is output.
 *
 * @since 1.0.0
 */
function build_banner_css_from_customizer_settings() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$banner_background = get_theme_mod( SETTINGS_PREFIX . 'site_banner_background_color' );
	$banner_text = get_theme_mod( SETTINGS_PREFIX . 'site_banner_text_color', '#fff' );
	$banner_text_hover = get_theme_mod( SETTINGS_PREFIX . 'site_banner_text_hover_color' );

	if ( $banner_background == get_default_accent_color() && $banner_text == get_default_link_color() && $banner_text_hover == get_default_link_color() ) {
		return;
	}

	$css = '';

	$css .= sprintf( '
	
		.site-banner,
		.site-banner a {
			background-color: %s;
			color: %s;
		}
		', $banner_background, $banner_text );

	$css .= sprintf( '

		.site-banner a:hover,
		.site-banner a:focus {
			color: %s;
		}
		', $banner_text_hover);

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}

