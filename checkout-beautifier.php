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

// Remove Additional Fields (Order Notes) and its H3 title using WooCommerce hook
add_filter('woocommerce_enable_order_notes_field', '__return_false', 9999);
