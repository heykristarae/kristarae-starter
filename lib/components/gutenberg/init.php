<?php
/**
 * Gutenberg theme support
 *
 * @package KristaRae\Starter\Gutenberg
 * @since   1.1.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter\Gutenberg;

/**
 * Enqueues Gutenberg admin editor fonts and styles.
 *
 * @since 1.1.0
 */
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\genesis_sample_block_editor_styles' );
function genesis_sample_block_editor_styles() {

	$block_editor_settings = genesis_get_config( 'block-editor-settings' );

	wp_enqueue_style(
		'genesis-sample-gutenberg-fonts',
		$block_editor_settings['admin-fonts-url'],
		array(),
		CHILD_THEME_VERSION
	);

}

add_filter( 'body_class', __NAMESPACE__ . '\genesis_sample_blocks_body_classes' );
/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @since 2.8.0
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */
function genesis_sample_blocks_body_classes( $classes ) {

	if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks' ) ) {
		return $classes;
	}

	if ( ! has_blocks() ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}

	$post_object = get_post( get_the_ID() );
	$blocks      = (array) parse_blocks( $post_object->post_content );

	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}

	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}

	return $classes;

}

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueue editor styles.
add_editor_style( '/lib/components/gutenberg/style-editor.css' );

// Adds support for block alignments.
add_theme_support( 'align-wide' );

// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );

$genesis_sample_block_editor_settings = genesis_get_config( 'block-editor-settings' );

// Adds support for editor font sizes.
add_theme_support(
	'editor-font-sizes',
	$genesis_sample_block_editor_settings['editor-font-sizes']
);

// Adds support for editor color palette.
add_theme_support(
	'editor-color-palette',
	$genesis_sample_block_editor_settings['editor-color-palette']
);

require_once get_stylesheet_directory() . '/lib/components/gutenberg/inline-styles.php';

add_action( 'after_setup_theme', __NAMESPACE__ . '\genesis_sample_content_width', 0 );
/**
 * Set content width to match the “wide” Gutenberg block width.
 */
function genesis_sample_content_width() {

	$block_editor_settings = genesis_get_config( 'block-editor-settings' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'genesis_sample_content_width', $block_editor_settings['content-width'] );

}
