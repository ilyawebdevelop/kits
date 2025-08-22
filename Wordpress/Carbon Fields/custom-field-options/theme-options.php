<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Add second options page under 'Basic Options'
Container::make('theme_options', 'Настройки темы')
  ->set_icon('dashicons-carrot')
  ->add_tab(__('Шапка'), array(
    Field::make('image', 'crb_logo', 'Логотип')
      ->set_width(33)
      ->set_value_type('url'),
  ))
  ->add_tab(__('Подвал'), array(
    Field::make('text', 'footer_copyright', 'Копирайт')
      ->set_width(33),
    Field::make('text', 'footer_politic_1', 'Политика конфиденциальности')
      ->set_width(33),
    Field::make('text', 'crb_down_link', 'Ссылка на 1 файл')
      ->set_width(33),
    Field::make('text', 'crb_down_link_2', 'Ссылка на 2 файл')
      ->set_width(33),
  ))
  ->add_tab(__('Соцсети,телефоны, адрес'), array(
    Field::make('text', 'crb_phone', 'Телефон')
      ->set_width(33),
    Field::make('text', 'crb_phone_clean', 'Телефон без символов')
      ->set_width(33),
    Field::make('text', 'crb_phone_2', 'Телефон 2')
      ->set_width(33),
    Field::make('text', 'crb_phone_clean_2', 'Телефон без символов 2')
      ->set_width(33),
    Field::make('text', 'crb_mail', 'E-mail')
      ->set_width(33),
    Field::make('text', 'crb_mail_2', 'E-mail')
      ->set_width(33),
    Field::make('text', 'crb_tele', 'tele ссылка')
      ->set_width(30),
    Field::make('text', 'crb_whats', 'whatsapp ссылка')
      ->set_width(30),
    Field::make('text', 'crb_skype', 'skype ссылка')
      ->set_width(30),
    Field::make('text', 'crb_address', 'Адрес')
      ->set_width(33),
    Field::make('text', 'crb_address_link', 'Адрес(ссылка)')
      ->set_width(33),
    Field::make('text', 'crb_time', 'Время работы')
      ->set_width(33),
  ));

  
