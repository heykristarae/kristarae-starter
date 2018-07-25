/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 1.0.0
 *
 * @author Krista Rae LLC
 * @license GPL
 * @package KristaRae\Starter
 */

jQuery( document ).on(
	'click', '.genesis-sample-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'dismiss_woocommerce_notice'
				}
			}
		);

	}
);
