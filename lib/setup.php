<?php
/**
 * Sets up the child theme
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;


add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup child theme.
 *
 * @since 1.0.3
 *
 * @return void
 */
function setup_child_theme() {
	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );
	unregister_genesis_callbacks();
	adds_theme_supports();
	unregister_layouts();
	adds_new_image_sizes();
}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	unregister_menu_callbacks();

}

/**
 * Unregister default Genesis layouts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_layouts() {
	unregister_sidebar( 'sidebar-alt' );

	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
}

/**
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_theme_supports() {
	$config = array(
		'html5'                           => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		),
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),
		'genesis-responsive-viewport'     => null,
		'custom-background'               => null,
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => FOOTER_WIDGET_AREAS,
		'genesis-menus'                   => array(
			'primary'   => __( 'Header Menu', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
		),
		'custom-logo'   => array(
			'height'      => CUSTOM_HEADER_HEIGHT, // set to your dimensions
			'width'       => CUSTOM_HEADER_WIDTH,
			'flex-height' => true,
			'flex-width'  => true,
		),
	);
	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Adds new image sizes.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_new_image_sizes() {
	$config = array(
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
	);
	foreach( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;
		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
/**
 * Set theme settings defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function set_theme_settings_defaults( array $defaults ) {
	$config = get_theme_settings_defaults();
	$defaults = wp_parse_args( $config, $defaults );
	return $defaults;
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
 * Sets the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults() {
	$config = get_theme_settings_defaults();
	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}
	update_option( 'posts_per_page', $config['blog_cat_num'] );
}

/**
 * Get the theme settings defaults.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults() {
	return array(
		'blog_cat_num'              => 12,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	);
}

/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', __NAMESPACE__ . 'genesis_child_gutenberg_support' );
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.

	require_once get_stylesheet_directory() . '/lib/components/gutenberg/init.php';

}