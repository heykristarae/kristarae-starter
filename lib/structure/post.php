<?php
/**
 * Post HTML markup structures
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\author_box_gravatar' );
/**
 * Modify size of the Gravatar in the author box
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function author_box_gravatar( $size ) {

	return 90;

}