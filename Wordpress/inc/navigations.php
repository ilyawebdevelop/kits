<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

register_nav_menus(array(
  'header' => 'Шапка',
  'footer' => 'Подвал', 
  'footer_2' => 'Подвал 2', 
  'header_catalog' => 'Шапка каталог', 
  'nav_catalog' => 'Каталог в шапке по кнопке', 
  'shop_sidebar' => 'Каталог магазин сайдбар', 
));

function ecity_header_menu(){
  wp_nav_menu(
    array(
      'theme_location' => 'header',
      'container'       => 'ul',
      'menu_class'      => 'header__nav-list',
    )
  );
}

function ecity_footer_menu(){
  wp_nav_menu(
    array(
      'theme_location' => 'footer',
      'container'       => 'ul',
      'menu_class'      => 'footer__nav-list',
    )
  );
}

function ecity_footer_menu_2(){
  wp_nav_menu(
    array(
      'theme_location' => 'footer_2',
      'container'       => 'ul',
      'menu_class'      => 'footer__nav-list',
    )
  );
}

function ecity_header_catalog(){
  wp_nav_menu(
    array(
      'theme_location' => 'header_catalog',
      'container'       => 'ul',
      'menu_class'      => 'header__nav_catalog-list',
    )
  );
}

function ecity_nav_catalog(){
  wp_nav_menu(
    array(
      'theme_location' => 'nav_catalog',
      'container'       => 'ul',
      'menu_class'      => 'catalog-nav__list',
    )
  );
}

function ecity_shop_sidebar(){
  wp_nav_menu(
    array(
      'theme_location' => 'shop_sidebar',
      'container'       => 'div',
      'menu_class'      => 'catalog__sidebar catalog-sidebar',
    )
  );
}