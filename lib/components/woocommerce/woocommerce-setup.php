<?php
/**
 * This file adds the required WooCommerce setup functions to the theme.
 *
 * @package KristaRae\Starter\WooCommerce
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter\WooCommerce;

// Adds product gallery support.
if ( class_exists( 'WooCommerce' ) ) {

	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-zoom' );

}

add_filter( 'woocommerce_style_smallscreen_breakpoint', __NAMESPACE__ . '\modify_woocommerce_breakpoint' );
/**
 * Modifies the WooCommerce breakpoints.
 *
 * @since 1.0.0
 *
 * @return string Pixel width of the theme's breakpoint.
 */
function modify_woocommerce_breakpoint() {

	$current = genesis_site_layout();
	$layouts = array(
		'one-sidebar' => array(
			'content-sidebar',
			'sidebar-content',
		),
	);

	if ( in_array( $current, $layouts['one-sidebar'], true ) ) {
		return '1200px';
	}

	return '860px';

}

add_filter( 'genesiswooc_products_per_page', __NAMESPACE__ . '\set_default_products_per_page' );
/**
 * Sets the default products per page.
 *
 * @since 1.0.0
 *
 * @return int Number of products to show per page.
 */
function set_default_products_per_page() {

	return WOOCOMMERCE_PRODUCTS_PER_PAGE;

}

add_filter( 'woocommerce_pagination_args', __NAMESPACE__ . '\update_woocommerce_pagination' );
/**
 * Updates the next and previous arrows to the default Genesis style.
 *
 * @param array $args The previous and next text arguments.
 * @since 1.0.0
 *
 * @return array New next and previous text arguments.
 */
function update_woocommerce_pagination( $args ) {

	$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'CHILD_TEXT_DOMAIN' ) );
	$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'CHILD_TEXT_DOMAIN' ) );

	return $args;

}

add_action( 'after_switch_theme', __NAMESPACE__ . '\define_image_dimensions_after_theme_setup', 1 );
/**
 * Defines WooCommerce image sizes on theme activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function define_image_dimensions_after_theme_setup() {

	global $pagenow;

	// Checks conditionally to see if we're activating the current theme and that WooCommerce is installed.
	if ( ! isset( $_GET['activated'] ) || 'themes.php' !== $pagenow || ! class_exists( 'WooCommerce' ) ) { // phpcs:ignore WordPress.CSRF.NonceVerification.NoNonceVerification -- low risk, follows official snippet at https://goo.gl/nnHHQa.
		return;
	}

	update_woocommerce_image_dimensions();

}

add_action( 'activated_plugin', __NAMESPACE__ . '\define_woocommerce_image_dimensions_after_woo_activation', 10, 2 );
/**
 * Defines the WooCommerce image sizes on WooCommerce activation.
 *
 * @since 1.0.0
 *
 * @param string $plugin The path of the plugin being activated.
 *
 * @return void
 */
function define_woocommerce_image_dimensions_after_woo_activation( $plugin ) {

	// Checks to see if WooCommerce is being activated.
	if ( 'woocommerce/woocommerce.php' !== $plugin ) {
		return;
	}

	update_woocommerce_image_dimensions();

}

/**
 * Updates WooCommerce image dimensions.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_woocommerce_image_dimensions() {

	// Updates image size options.
	update_option( 'woocommerce_single_image_width', WOOCOMMERCE_SINGLE_IMAGE_WIDTH );    // Single product image.
	update_option( 'woocommerce_thumbnail_image_width', WOOCOMMERCE_THUMBNAIL_IMAGE_WIDTH ); // Catalog image.

	// Updates image cropping option.
	update_option( 'woocommerce_thumbnail_cropping', '1:1' );

}

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', __NAMESPACE__ . '\filter_gallery_image_thumbnail' );
/**
 * Filters the WooCommerce gallery image dimensions.
 *
 * @since 1.0.0
 *
 * @param array $size The gallery image size and crop arguments.
 * @return array The modified gallery image size and crop arguments.
 */
function filter_gallery_image_thumbnail( $size ) {

	$size = array(
		'width'  => WOOCOMMERCE_GALLERY_IMAGE_WIDTH,
		'height' => WOOCOMMERCE_GALLERY_IMAGE_HEIGHT,
		'crop'   => 1,
	);

	return $size;

}
