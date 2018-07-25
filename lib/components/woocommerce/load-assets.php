<?php
/**
 * Loads the WooCommerce assets
 *
 * @package KristaRae\Starter\WooCommerce
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter\WooCommerce;

add_filter( 'woocommerce_enqueue_styles', __NAMESPACE__ . '\enqueue_woocommerce_styles' );
/**
 * Enqueues the theme's custom WooCommerce styles to the WooCommerce plugin.
 *
 * @param array $enqueue_styles The WooCommerce styles to enqueue.
 * @since 2.3.0
 *
 * @return array Modified WooCommerce styles to enqueue.
 */
function enqueue_woocommerce_styles( $enqueue_styles ) {

	$enqueue_styles[CHILD_TEXT_DOMAIN . '-woocommerce-styles'] = array(
		'src'     => CHILD_URL . '/lib/components/woocommerce/kristarae-woocommerce.min.css',
		'deps'    => '',
		'version' => CHILD_THEME_VERSION,
		'media'   => 'screen',
	);

	return $enqueue_styles;

}