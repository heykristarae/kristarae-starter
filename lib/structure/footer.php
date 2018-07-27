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

add_action ( 'widgets_init', __NAMESPACE__ . '\register_footer_widgets' );
/**
 * Register footer widget areas
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_footer_widgets() {

	genesis_register_sidebar( array(
		'id' => 'footer-widget-header',
		'name' => __( 'Footer Widget Header', CHILD_TEXT_DOMAIN ),
		'description' => __( 'This appears above the footer', CHILD_TEXT_DOMAIN ),
	) );

}

// Position footer widget header
add_action ( 'genesis_before_footer', __NAMESPACE__ . '\position_above_footer_widgets', 7 );
/**
 * Position widget area that appears above footer
 *
 * @since 1.0.0
 *
 * @return void
 */
function position_above_footer_widgets ()  {

	genesis_widget_area( 'footer-widget-header', array(
		'before' => '<div class="footer-widget-header">',
		'after'  => '</div>',
	) );

}

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