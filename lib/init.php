<?php
/**
 * Description
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

/**
 * Initialize the theme's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {

	$child_theme = wp_get_theme();
	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_URL', get_stylesheet_directory_uri() );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/' );
	define( 'CHILD_ASSETS_DIR', CHILD_THEME_DIR . '/assets/' );
	define( 'CHILD_COMPONENTS_DIR', CHILD_THEME_DIR . '/lib/components/' );
	define( 'SETTINGS_PREFIX', 'kr-starter' );

	define( 'CUSTOM_HEADER_WIDTH', 600 );
	define( 'CUSTOM_HEADER_HEIGHT', 160 );
	define( 'FOOTER_WIDGET_AREAS', 3 );

	define( 'WOOCOMMERCE_PRODUCTS_PER_PAGE', 8 );
	define( 'WOOCOMMERCE_SINGLE_IMAGE_WIDTH', 655 );
	define( 'WOOCOMMERCE_THUMBNAIL_IMAGE_WIDTH', 500 );
	define( 'WOOCOMMERCE_GALLERY_IMAGE_WIDTH', 180 );
	define( 'WOOCOMMERCE_GALLERY_IMAGE_HEIGHT', 180 );

}

init_constants();