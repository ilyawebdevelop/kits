<?php

/**
 * ecity functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ecity
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}



add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	load_template(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'ast_register_custom_fields');
function ast_register_custom_fields()
{
	require get_template_directory() . '/inc/custom-field-options/metabox.php';
	require get_template_directory() . '/inc/custom-field-options/theme-options.php';
}

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

/*
* Подключение настроек темы
*/
require get_template_directory() . '/inc/theme-settings.php';

/*
* Подключение виджетов темы
*/
require get_template_directory() . '/inc/widget-areas.php';

/*
* Подключение скриптов и стилей
*/
require get_template_directory() . '/inc/enqueue-script-style.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom navigations
 */
require get_template_directory() . '/inc/navigations.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

e3r4wsar3

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
	// require get_template_directory() . '/includes/helpers.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_cart.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-single.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-content.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-checkout.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_account.php';
}


add_action( 'wp_ajax_to_basket', 'to_basket' );
add_action ('wp_ajax_nopriv__to_basket', '_to_basket');

function to_basket() {
	echo 'Привет пользователь';
	wp_die();
}






