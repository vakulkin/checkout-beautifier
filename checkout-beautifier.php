<?php
/**
 * Plugin Name: Checkout Beautifier
 * Description: Professional styling for WooCommerce checkout inputs and selects with black theme.
 * Version: 1.0.0
 * Text Domain: checkout-beautifier
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles on checkout page
function checkout_beautifier_enqueue_styles() {
    if (is_checkout()) {
        wp_enqueue_style(
            'checkout-beautifier-styles',
            plugin_dir_url(__FILE__) . 'checkout-beautifier.css',
            array(),
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'checkout_beautifier_enqueue_styles');

// Remove only the "Additional information" text (H3 title) using a translation hook
add_filter('gettext', 'checkout_beautifier_remove_additional_info_title', 10, 3);
function checkout_beautifier_remove_additional_info_title($translated_text, $text, $domain) {
    if ($domain === 'woocommerce' && $text === 'Additional information' && is_checkout()) {
        return '';
    }
    return $translated_text;
}
