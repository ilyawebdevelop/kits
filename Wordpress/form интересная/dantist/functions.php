<?php
/**
 * dantist functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dantist
 */

  /**
 * Plugging a special class JCacheData
 */

require_once "classes/JCacheData.php";

 /**
 * Plugging a special class JPost
 */

require_once "classes/JPost.php";

/**
 * Plugging a special class JBreadcrumbs
 */

require_once "classes/JBreadcrumbs.php";

/**
 * Plugging a special class JRender
 */

require_once "classes/JRender.php";

/**
 * Plugging a special class JClinic
 */

require_once "classes/JClinic.php";


/**
 * Plugging a special class JService
 */

require_once "classes/JService.php";


/**
 * Plugging a special class JReview
 */

require_once "classes/JReview.php";


/**
 * Plugging a special class JDoctor
 */

require_once "classes/JDoctor.php";

/**
 * Plugging a special class JArticle
 */

require_once "classes/JArticle.php";

require_once "classes/JRecommendation.php";

/**
 * Plugging a special class JPrice
 */

require_once "classes/JPrice.php";

/**
 * Plugging a special class JStock
 */

require_once "classes/JStock.php";


/**
 * Plugging a special class JVacancy
 */

require_once "classes/JVacancy.php";

/**
 * Plugging a special class JOurWork
 */

require_once "classes/JOurWork.php";

/**
 * Plugging a special class JInstagram
 */

 
require_once "classes/JInstagram.php";

/**
 * Plugging a special class JConstructor
 */

require_once "classes/JConstructor.php";

/**
 * Plugging a special class JServiceConstructor
 */

require_once "classes/JServiceConstructor.php";

/**
 * Plugging a special class JDoctorConstructor
 */

require_once "classes/JDoctorConstructor.php";

/**
 * Plugging a special class JForm
 */

require_once "classes/JForm.php";


/**
 * Plugging a special function register post type
 */

require_once "special-functions/registerPostType.php";

JClinic::getInstance()->init();

function clinic($clinic = null){
	if (!$clinic) {
		$clinic = JClinic::getInstance()->getClinic();
	}
	return [
		"title" => $clinic["title"],
		"text-head" => $clinic["props"]["base-info"]["text-head"]?:"",
		"title-contacts" => $clinic["props"]["base-info"]["title-contacts"]?:"",
		"phone" => $clinic["props"]["phones"]["phone"]?:"",
		"phones" => $clinic["props"]["phones"]["phones"]?:"",
		"contacts" => $clinic["props"]["contacts"]?:[],
		"socials" => get_field("socials", "option"),
	];
}

function clinics(){
	return array_map(function($clinic) {
		return clinic($clinic);
	}, JClinic::getInstance()->getClinics());
}

/**
 * Enqueue scripts and styles.
 */
function dantist_scripts() {
// 
	// wp_enqueue_script( 'dantist-yandex-map', 'https://api-maps.yandex.ru/2.0/?load=package.standard,package.geoObjects&lang=ru-RU&apikey=');	
	wp_enqueue_script( 'dantist-yandex-map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=1bf094da-8004-45a2-a3cc-4d7dd702d776');	
 
	wp_enqueue_script( 'dantist-swiper-bundle-min-js', get_template_directory_uri() . '/app/js/swiper-bundle.min.js');
	wp_enqueue_script( 'dantist-fslightbox-js', get_template_directory_uri() . '/app/js/fslightbox.js');
	wp_enqueue_script( 'dantist-lottie-player-js', get_template_directory_uri() . '/app/js/lottie-player.js');
	wp_enqueue_script( 'dantist-modal-js', get_template_directory_uri() . '/js/modal.js');
	wp_enqueue_script( 'dantist-form-js', get_template_directory_uri() . '/js/Form.js');
	wp_enqueue_script( 'dantist-index-js', get_template_directory_uri() . '/app/js/index.js','','',true);
	wp_enqueue_script( 'dantist-script-js', get_template_directory_uri() . '/js/script.js');
	wp_enqueue_style( 'dantist-modal-css', get_template_directory_uri() . '/css/modal.css' );
	wp_enqueue_style( 'dantist-style-css', get_template_directory_uri() . '/app/css/style.css' );
	wp_enqueue_style( 'dantist-custom-css', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'dantist-style', get_stylesheet_uri());
	
	wp_enqueue_script( 'dantist-special-jquery', 'https://lidrekon.ru/slep/js/jquery.js');
	wp_enqueue_script( 'dantist-special-js', get_template_directory_uri() . '/js/special.js');
	wp_enqueue_style( 'dantist-special-css', get_template_directory_uri() . '/css/special.css' );

}
add_action( 'wp_enqueue_scripts', 'dantist_scripts' );
 
add_action( 'wp_ajax_form_action', 'form_action');
add_action( 'wp_ajax_nopriv_form_action', 'form_action' );

function form_action(){
	header('Content-Type: application/json; charset=utf-8');
	JForm::send();
	die();
}

add_action( 'wp_ajax_template_modal', 'template_modal');
add_action( 'wp_ajax_nopriv_template_modal', 'template_modal' );

function template_modal(){
	header('Content-Type: application/json; charset=utf-8');
	JForm::getForm();
	//JForm::send();
	die();
}



function short_text($text, $len = 200)
{
	$tarr = explode(' ', $text);
	$txt = '';
	$i = 0;
	while (mb_strlen($txt) < $len && isset($tarr[$i]))
	{
		$txt .= $tarr[$i] . ' ';
		$i++;
	}
	return $txt;
}


add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}


add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}
define("CALL", "/wp-admin/admin-ajax.php?action=template_modal&template=modal-call&page=https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
define("APPOINTMENT", "/wp-admin/admin-ajax.php?action=template_modal&template=modal-appointment&page=https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
define("ONLINE_CONSULTATION", "/wp-admin/admin-ajax.php?action=template_modal&template=modal-online-consultation&page=https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
define("REVIEW", "/wp-admin/admin-ajax.php?action=template_modal&template=modal-review&page=https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
define("SHOW_REVIEW", "/wp-admin/admin-ajax.php?action=template_modal&template=modal-show-review&page=https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
define("CHOICE_CLINIC", "/wp-admin/admin-ajax.php?action=template_modal&template=modal-choice-clinic&page=https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);

add_action('init', 'dantist_start_session', 1);
function dantist_start_session() {
    if (!session_id()) {
        session_start();
    }
}
add_action('wp_logout', 'dantist_end_session');
add_action('wp_login', 'dantist_end_session');
function dantist_end_session() {
    session_destroy();
}

add_filter('acf/load_field/name=implants_systems_attribute', function($field) {
	if (!is_admin()) {
		return $field;
	}

	$list = get_field('implants_systems_attributes', 'options') ?: [];

	$field['choices'] = [];

	foreach ($list as $item) {
			$field['choices'][$item['value']] = $item['label'];
	}

	return $field;
});
