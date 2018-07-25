<?php
/**
 * Creates the Customizer textarea control
 *
 * @package KristaRae\Starter
 * @since   1.0.0
 * @author  Krista Rae LLC
 * @link    https://kristarae.co
 * @license GPL
 */
namespace KristaRae\Starter;

add_action( 'customize_register', __NAMESPACE__ . '\create_textbox_control' );

/**
 * Creates multi-line textbox in Customizer
 *
 * @since 1.0.0
 *
 * @param $wp_customize
 *
 * @return void
 */
function create_textbox_control($wp_customize) {

	class Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

}