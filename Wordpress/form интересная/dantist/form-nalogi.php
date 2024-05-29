<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ТехРесурс
 */

/*
Template Name: Форма налогового вычета
*/ 
$constructor = new JConstructor();
$constructor->getHeader();

wp_enqueue_style( 'form-nalogi.css', '/wp-content/themes/dantist/css/form-nalogi.css');
wp_enqueue_style( 'form-nalogi.css', '/wp-content/themes/dantist/css/form-nalogi.css');
wp_enqueue_script( 'form-nalogi-js', '/wp-content/themes/dantist/js/form-nalogi.js', '', '', true);


?><div class="nalogi">
  <div class="page__container">
    <div class="headline works__headline">
      <h1 class="title title--h4">Заявление на получение справки об оплате медицинских услуг для подачи в налоговую инспекцию</h1>
    </div>

    <p class="title title--h5">Пожалуйста заполните форму ниже и нажмите кнопку «Отправить»</p>

    <div class="nalogi__wrapper">
      <?JForm::form("nalogi", [
          "title" => "Заявление на получение справки",
          "page" => "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]
      ]);?>
    </div>
  </div>
</div><?

$constructor->getFooter();