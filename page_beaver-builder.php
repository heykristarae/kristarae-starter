<?php
/**
 * Template Name: Beaver Builder
 *
 * Page template allowing full-width sections using the
 * Beaver Builder plugin
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Adds a css class to the body element
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function add_body_class( $classes ) {

	$classes[] = 'fl-builder-full';
	return $classes;

}


add_filter( 'genesis_attr_site-inner', __NAMESPACE__ . '\add_site_inner_attribute' );
/**
 * Add attributes for site-inner element, since we're removing 'content'.
 *
 * @since 1.0.0
 *
 * @param array $attributes existing attributes.
 *
 * @return array amended attributes.
 */
function add_site_inner_attribute( $attributes ) {

	$attributes = wp_parse_args( $attributes, genesis_attributes_entry( array() ) );
	return $attributes;

}


// Display Header
get_header();

// Display Content
the_post();

the_content();

// Display Comments
genesis_get_comments_template();

// Display Footer
get_footer();