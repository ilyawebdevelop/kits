<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Главная страница')
  ->show_on_template('front-page.php')
  ->add_tab(__('Intro'), array(
    Field::make('image', 'intro_baner', 'Банер')
      ->set_width(50)
      ->set_value_type('url'),
    Field::make('complex', 'intro_repeat', 'Слайдер')
      ->add_fields(array(
        Field::make('textarea', 'intro-item_title', 'Заголовок')
          ->set_width(33),
        Field::make('textarea', 'intro-item_descr', 'Описание')
          ->set_width(33),
        Field::make('text', 'intro-item_link', 'Ссылка (если есть)')
          ->set_width(33),
        Field::make('image', 'intro-item_image', 'Изображение')
          ->set_width(50)
          ->set_value_type('url'),
      )),
    Field::make('text', 'intro_link_1', 'Ссылка 1 банера')
      ->set_width(50),
    Field::make('text', 'intro_link_2', 'Ссылка 2 банера')
      ->set_width(50),
  ))
  ->add_tab(__('Преимущества'), array(
    Field::make('text', 'adv-item_title', '1 Преимущество Заголовок')
      ->set_width(50),
    Field::make('text', 'adv-item_text', '1 Преимущество Описание')
      ->set_width(50),
    Field::make('text', 'adv-item_title_2', '2 Преимущество Заголовок')
      ->set_width(50),
    Field::make('text', 'adv-item_text_2', '2 Преимущество Описание')
      ->set_width(50),
    Field::make('text', 'adv-item_title_3', '3 Преимущество Заголовок')
      ->set_width(50),
    Field::make('text', 'adv-item_text_3', '3 Преимущество Описание')
      ->set_width(50),
    Field::make('text', 'adv-item_title_4', '4 Преимущество Заголовок')
      ->set_width(50),
    Field::make('text', 'adv-item_text_4', '4 Преимущество Описание')
      ->set_width(50),
  ))
  ->add_tab(__('Слайдер'), array(
    Field::make('complex', 'main-slider', 'Слайд')
      ->add_fields(array(
        Field::make('text', 'main-slider_title', 'Заголовок')
          ->set_width(50),
        Field::make('textarea', 'main-slider_descr', 'Описание')
          ->set_width(50),
        Field::make('image', 'main-slider_image', 'Изображение')
          ->set_width(50)
          ->set_value_type('url'),
        Field::make('text', 'main-slider_link', 'Ссылка')
          ->set_width(33),
      )),
  ))
  ->add_tab(__('О компании'), array(
    Field::make('complex', 'about_repeat', 'Текст (виден)')
      ->add_fields(array(
        Field::make('text', 'about_text', 'Абзац')
          ->set_width(100),
      )),
    Field::make('complex', 'about_repeat_hide', 'Текст (скрыт)')
      ->add_fields(array(
        Field::make('text', 'about_text_hide', 'Абзац')
          ->set_width(100),
      )),
  ))
  ->add_tab(__('Сертификаты'), array(
    Field::make('separator', 'crb_style_options', 'Контакты отдела продаж'),
    Field::make('complex', 'cert_repeat', 'Сертификат')
      ->add_fields(array(
        Field::make('image', 'cert_img', 'Изображение')
          ->set_width(50)
          ->set_value_type('url'),
      )),
  ));

function category_options()
{
  return array(
    'sensory-davleniya' => 'Сенсоры давления',
    'mikroshemy' => 'Микросхемы',
    'mikrokontrollery' => 'Микроконтроллеры',
    'rezistory-i-kondensatory' => 'Резисторы и конденсаторы',
    'razemy' => 'Разъемы',
    'kabel-gidrometricheskij' => 'Кабель гидрометрический',
    'bloki-klapannye-ventilnye' => 'Блоки клапанные (вентильные)',
    'korpusa-alyuminievye' => 'Корпуса алюминиевые',
    'korpusa-plastikovye' => 'Корпуса пластиковые	',
    'komponenty-dlya-datchikov-temperatury' => 'Компоненты для датчиков температуры	',
    'rele' => 'Реле',
    'klemmy-na-din-rejku' => 'Клеммы',
    'svetodiodnye-indikatory' => 'Светодиодные индикаторы',
  );
}

Container::make('post_meta', 'Табы')
  ->show_on_post_type('product')
  // ->show_on_template('woocommerce/single-product.php')
  ->add_tab(__('Цена по запросу'), array(
    Field::make('checkbox', 'price_order', 'Цена по запросу')
      ->set_option_value('yes')
  ))
  ->add_tab(__('Количество кратность'), array(
    Field::make('text', 'product_number', 'Количество (партия продажи)')
      ->set_width(50),
    Field::make('text', 'product_type', 'Ед.измерения(шт,парт.)')
      ->set_width(50),
    Field::make('text', 'product_min', 'Минимум, количество')
      ->set_width(50),
  ))
  ->add_tab(__('Категории'), array(
    Field::make("multiselect", "crb_category_list", "Рекомендуемые категории")
      ->add_options('category_options'),
  ))

  ->add_tab(__('Документация'), array(
    Field::make('file', 'document_link', 'Файл')
      ->set_value_type('url'),
  ))
  ->add_tab(__('Характеристики'), array(
    Field::make('rich_text', 'product_params', 'Текст')
      ->set_rows(10),
  ));

Container::make('post_meta', 'Новости')
  // ->where('term_taxonomy', '=', 'category')
  ->where('post_term', '=', array(
    'field' => 'slug',
    'value' => 'news',
    'taxonomy' => 'category',
  ))
  ->add_tab(__('Новости'), array(
    Field::make('image', 'news_main_img', 'Главная картинка в самой новости')
      ->set_width(20)
      ->set_value_type('url'),
    Field::make('text', 'news_date', 'Дата')
      ->set_width(50),
    Field::make('media_gallery', 'crb_media_gallery')
      ->set_type(array('image', 'video'))
  ));

Container::make('term_meta', __('Term Options', 'crb'))
  ->where('term_taxonomy', '=', 'product_cat') // only show our new field for categories
  ->add_fields(array(
    Field::make('image', 'cat_img', 'Изображение')
      ->set_width(33)
      ->set_value_type('url'),
  ));

  // Field::make('association', 'related_posts', 'Рекомендуемые работы')
  // ->set_types(array(
  //   array(
  //     'type'      => 'post',
  //     'post_type' => 'work',
  //   )
  // ))


    // Field::make('association', 'related_portfolio', 'Рекомендуемые проекты')
    //   ->set_types(array(
    //     array(
    //       'type'      => 'post',
    //       'post_type' => 'post',
    //       'category' => 3,
    //     )
    //   ))
