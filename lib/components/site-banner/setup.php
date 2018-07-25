<?php
/**
 * Sets up theme for use of site banner
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

include_once( CHILD_COMPONENTS_DIR . 'site-banner/customizer.php' );
include_once( CHILD_COMPONENTS_DIR . 'site-banner/css-handler.php' );


add_action( 'genesis_before', __NAMESPACE__ . '\build_site_banner_html' );
/**
 * Outputs site banner HTML
 *
 * @since 1.0.0
 *
 * @return void
 */
function build_site_banner_html() {

	if ( !get_theme_mod(SETTINGS_PREFIX . 'site_banner_display') ) {
		return;
	}

	$content = '<div class="site-banner">';

	if ( get_theme_mod(SETTINGS_PREFIX . 'site_banner_new_tab') ) {
		$content .= '<a href="' . get_theme_mod( SETTINGS_PREFIX . "site_banner_link", "#" ) . '" target="_blank">' . get_theme_mod( SETTINGS_PREFIX . 'site_banner_text', 'Your banner text' ) . '</a>';
	} else {
		$content .= '<a href="' . get_theme_mod( SETTINGS_PREFIX . "site_banner_link", "#" ). '">' . get_theme_mod( SETTINGS_PREFIX . 'site_banner_text', 'Your banner text' ) . '</a>';
	}

	$content .= '</div>';

	echo $content;

}