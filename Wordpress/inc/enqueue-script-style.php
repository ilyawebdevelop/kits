<?php
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue scripts and styles.
 */

add_action('wp_enqueue_scripts', 'ecity_scripts');
function ecity_scripts()
{
	wp_enqueue_script('ecity-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('ecity-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.1.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('ecity-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('ecity-swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('ecity-main-js', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true);

	if (is_product()) {
		wp_enqueue_script('ecity-product-js', get_template_directory_uri() . '/assets/js/product.js', array(), _S_VERSION, true);
	}
	if( is_shop()){
		wp_enqueue_script('ecity-shop-js', get_template_directory_uri() . '/assets/js/shop.js', array(), _S_VERSION, true);
	}
	if(is_page(5)){
		wp_enqueue_script('ecity-shop-js', get_template_directory_uri() . '/assets/js/shop.js', array(), _S_VERSION, true);
	}
	if(is_page(74)){
		wp_enqueue_script('ecity-cart-js', get_template_directory_uri() . '/assets/js/cart.js', array(), _S_VERSION, true);
		wp_enqueue_script('ecity-send-js', get_template_directory_uri() . '/assets/js/send.js', array(), _S_VERSION, true);
		wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( '/wp-admin/admin-ajax.php' ) ) );
 
	}
}

add_action('wp_enqueue_scripts', 'ecity_style');
function ecity_style()
{
	wp_enqueue_style('ecity-style-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('ecity-style-swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), _S_VERSION);
	wp_enqueue_style('ecity-style', get_stylesheet_uri(), array(), _S_VERSION);
}
