<?

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'speciality_doctors', [ 'doctors' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Специальности',
			'singular_name'     => 'Специальность',
			'search_items'      => 'Поиск специальности',
			'all_items'         => 'Все специальности',
			'view_item '        => 'Просмотр специальности',
			'parent_item'       => 'Родительская специальность',
			'parent_item_colon' => 'Родительская специальность:',
			'edit_item'         => 'Изменить специальность',
			'update_item'       => 'Обновить специальность',
			'add_new_item'      => 'Добавить новую специальность',
			'new_item_name'     => 'Новое название специальности',
			'menu_name'         => 'Специальность',
		],
		'description'           => '',
		'public'                => true,

		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy

	] );


	register_taxonomy( 'type_reviews', [ 'reviews' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Типы отзыва',
			'singular_name'     => 'Тип отзыва',
			'search_items'      => 'Поиск типа отзыва',
			'all_items'         => 'Все типы',
			'view_item '        => 'Просмотр типа отзыва',
			'parent_item'       => 'Родительский тип отзыва',
			'parent_item_colon' => 'Родительский тип отзыва:',
			'edit_item'         => 'Изменить тип отзыва',
			'update_item'       => 'Обновить тип отзыва',
			'add_new_item'      => 'Добавить тип отзыва',
			'new_item_name'     => 'Новое название типа отзыва',
			'menu_name'         => 'Тип отзыва',
		],
		'description'           => '',
		'public'                => true,

		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy

	] );
}


add_action('init', 'initRegisterPostTypes');
function initRegisterPostTypes(){

	register_post_type('prices', array(
		'labels'             => array(
			'name'               => 'Цены', // Основное название типа записи
			'singular_name'      => 'Цена', // отдельное название записи типа Book
			'add_new'            => 'Добавить цену',
			'add_new_item'       => 'Добавить новую цену',
			'edit_item'          => 'Редактировать цену',
			'new_item'           => 'Новая цена',
			'view_item'          => 'Посмотреть цену',
			'search_items'       => 'Найти цену',
			'not_found'          => 'Цены не найдены',
			'not_found_in_trash' => 'В корзине цен не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Цены'

		  ),
			'public'             => false,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-money',
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'page-attributes')
		) 
	);

	register_post_type('stock', array(
		'labels'             => array(
			'name'               => 'Акции', // Основное название типа записи
			'singular_name'      => 'Акция', // отдельное название записи типа Book
			'add_new'            => 'Добавить акцию',
			'add_new_item'       => 'Добавить новую акцию',
			'edit_item'          => 'Редактировать акцию',
			'new_item'           => 'Новая акция',
			'view_item'          => 'Посмотреть акцию',
			'search_items'       => 'Найти акцию',
			'not_found'          => 'Акции не найдено',
			'not_found_in_trash' => 'В корзине акций не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Акции'

		  ),
		  'public'             => true,
		  'publicly_queryable' => true,
		  'menu_icon' => 'dashicons-businessperson',
		  'show_ui'            => true,
		  'show_in_menu'       => true,
		  'query_var'          => true,
		  'rewrite'            => true,
		  'capability_type'    => 'post',
		  'has_archive'        => true,
		  'hierarchical'       => false,
		  'menu_position'      => null,
		  'supports'           => array('title', 'page-attributes')
		) 
	);

	register_post_type('doctors', array(
		'labels'             => array(
			'name'               => 'Врачи', // Основное название типа записи
			'singular_name'      => 'Врач', // отдельное название записи типа Book
			'add_new'            => 'Добавить Врача',
			'add_new_item'       => 'Добавить нового Врача',
			'edit_item'          => 'Редактировать Врача',
			'new_item'           => 'Новый врач',
			'view_item'          => 'Посмотреть Врача',
			'search_items'       => 'Найти Врача',
			'not_found'          => 'Врачей не найдено',
			'not_found_in_trash' => 'В корзине Врачей не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Врачи'

		  ),
			'public'             => true,
			'publicly_queryable' => true,
			'menu_icon' => 'dashicons-businessperson',
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'page-attributes')
		) 
	);
	
	register_post_type('recommendations', array(
		'labels'             => array(
			'name'               => 'Рекомендации', // Основное название типа записи
			'singular_name'      => 'Рекомендация', // отдельное название записи типа Book
			'add_new'            => 'Добавить Рекомендацию',
			'add_new_item'       => 'Добавить новую Рекомендацию',
			'edit_item'          => 'Редактировать Рекомендацию',
			'new_item'           => 'Новая Рекомендация',
			'view_item'          => 'Посмотреть Рекомендацию',
			'search_items'       => 'Найти Рекомендацию',
			'not_found'          => 'Рекомендации не найдены',
			'not_found_in_trash' => 'В корзине Рекомендации не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Рекомендации врача'

		  ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon' => 'dashicons-businessperson',
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'page-attributes')
		) 
	);

	register_post_type('reviews', array(
		'labels'             => array(
			'name'               => 'Отзывы', // Основное название типа записи
			'singular_name'      => 'Отзыв', // отдельное название записи типа Book
			'add_new'            => 'Добавить Отзыв',
			'add_new_item'       => 'Добавить нового Отзыв',
			'edit_item'          => 'Редактировать Отзыв',
			'new_item'           => 'Новый Отзыв',
			'view_item'          => 'Посмотреть Отзыв',
			'search_items'       => 'Найти Отзыв',
			'not_found'          => 'Отзывы не найдены',
			'not_found_in_trash' => 'В корзине Отзывы не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Отзывы'

		  ),
		  'public'             => false,
		  'publicly_queryable' => false,
			'menu_icon' => 'dashicons-pressthis',
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'page-attributes')
		) 
	);

	register_post_type('articles', array(
		'labels'             => array(
			'name'               => 'Статьи', // Основное название типа записи
			'singular_name'      => 'Статья', // отдельное название записи типа Book
			'add_new'            => 'Добавить Статью',
			'add_new_item'       => 'Добавить нового Статью',
			'edit_item'          => 'Редактировать Статью',
			'new_item'           => 'Новая Статья',
			'view_item'          => 'Посмотреть Статью',
			'search_items'       => 'Найти Статью',
			'not_found'          => 'Статьи не найдены',
			'not_found_in_trash' => 'В корзине Статьи не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Статьи'

		  ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon' => 'dashicons-screenoptions',
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'page-attributes')
		) 
	);

	register_post_type('services', array(
		'labels'             => array(
			'name'               => 'Услуги', // Основное название типа записи
			'singular_name'      => 'Услуга', // отдельное название записи типа Book
			'add_new'            => 'Добавить Услугу',
			'add_new_item'       => 'Добавить нового Услугу',
			'edit_item'          => 'Редактировать Услугу',
			'new_item'           => 'Новая Услуга',
			'view_item'          => 'Посмотреть Услугу',
			'search_items'       => 'Найти Услугу',
			'not_found'          => 'Услуги не найдены',
			'not_found_in_trash' => 'В корзине Услуги не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Услуги'

		  ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'menu_icon' => 'dashicons-book-alt',
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'page',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'page-attributes'
	
			)
		) 
	);

	
	register_post_type( 'vacancies', [
		'label'  => null,
		'labels' => [
			'name'               => 'Вакансии', // основное название для типа записи
			'singular_name'      => 'Вакансия', // название для одной записи этого типа
			'add_new'            => 'Добавить Вакансию', // для добавления новой записи
			'add_new_item'       => 'Добавление Вакансии', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Вакансии', // для редактирования типа записи
			'new_item'           => 'Новая Вакансия', // текст новой записи
			'view_item'          => 'Смотреть Вакансию', // для просмотра записи этого типа.
			'search_items'       => 'Искать Вакансии', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Вакансии', // название меню
		],
		'public'             => false,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-buddicons-tracking',
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'page-attributes')
	] );

	register_post_type( 'doctor_works', [
		'label'  => null,
		'labels' => [
			'name'               => 'Наши работы', // основное название для типа записи
			'singular_name'      => 'Наши работы', // название для одной записи этого типа
			'add_new'            => 'Добавить Наши работы', // для добавления новой записи
			'add_new_item'       => 'Добавление Наши работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Наши работы', // для редактирования типа записи
			'new_item'           => 'Новые Наши работы', // текст новой записи
			'view_item'          => 'Смотреть Наши работы', // для просмотра записи этого типа.
			'search_items'       => 'Искать Наши работы', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Наши работы', // название меню
		],
		'public'             => false,
		'publicly_queryable' => false,
		'menu_icon' => '',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'page-attributes')
	] );

	register_post_type( 'clinics', [
		'label'  => null,
		'labels' => [
			'name'               => 'Клиники', // основное название для типа записи
			'singular_name'      => 'Клиника', // название для одной записи этого типа
			'add_new'            => 'Добавить клинику', // для добавления новой записи
			'add_new_item'       => 'Добавление клиники', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование клиники', // для редактирования типа записи
			'new_item'           => 'Новые клиники', // текст новой записи
			'view_item'          => 'Смотреть клиники', // для просмотра записи этого типа.
			'search_items'       => 'Искать клиники', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Клиники', // название меню
		],
		'public'             => false,
		'publicly_queryable' => false,
		'menu_icon' => '',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'page-attributes')
	] );

	register_post_type( 'message_mail', [
		'label'  => null,
		'labels' => [
			'name'               => 'Заявки', // основное название для типа записи
			'singular_name'      => 'Заявка', // название для одной записи этого типа
			'add_new'            => 'Добавить Заявку', // для добавления новой записи
			'add_new_item'       => 'Добавление Заявки', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Заявки', // для редактирования типа записи
			'new_item'           => 'Новое Заявка', // текст новой записи
			'view_item'          => 'Смотреть Заявку', // для просмотра записи этого типа.
			'search_items'       => 'Искать Заявки', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Заявки', // название меню
		],
		'public'             => false,
		'publicly_queryable' => false,
		'menu_icon' => 'dashicons-welcome-view-site',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array()
	] );

}


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(
			array(
				'page_title' 	=> 'Основные настройки сайта',
				'menu_title'	=> 'Настройки сайта',
				'menu_slug' 	=> 'site_setting',
				'capability'	=> 'manage_options',
				'redirect'		=> false
			)
		);

		acf_add_options_page(
			array(
				'page_title' 	=> 'Контентные блоки',
				'menu_title'	=> 'Контентные блоки',
				'menu_slug' 	=> 'content_blocks',
				'capability'	=> 'manage_options',
				'redirect'		=> false
			)
		);
	
	
		acf_add_options_page(
			array(
				'page_title' 	=> 'Меню',
				'menu_title'	=> 'Меню',
				'menu_slug' 	=> 'menu',
				'capability'	=> 'manage_options',
				'redirect'		=> false
			)
		);

	}
}