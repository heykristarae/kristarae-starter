<?php
/**
 * Footer HTML markup structures
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

add_filter( 'genesis_footer_creds_text', __NAMESPACE__ . '\customize_site_credits' );
/**
 * Customizes the theme credits in the site footer
 *
 * @since 1.0.0
 *
 * @return void
 */
function customize_site_credits () {

	$content = '<div class="creds">' . get_bloginfo( "name" ) . ' &copy; ';
	$content .= date('Y');
	$content .= ' | Site By <a href="https://kristarae.co/">Krista Rae</a>';
	$content .= '</div>';

	echo $content;
}