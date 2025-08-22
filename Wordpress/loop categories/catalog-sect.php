<section class="catalog-sect">
    <div class="container">
        <div class="title-wrapper mx-auto">
            <div class="catalog-sect__title--lg section-title--lg">
                catalog
            </div>
            <h2 class="catalog-sect__title section-title">
                Наша продукция
            </h2>
        </div>
        <div class="tabs" data-tabs="popup">
            <ul class="tabs__nav">
                <?php
                $categories = get_categories([
                    'taxonomy'     => 'category',
                    'type'         => 'post',
                    // 'child_of'     => 0,
                    'parent'       => 1,
                    'orderby'      => 'name',
                    'order'        => 'ASC',
                    'hide_empty'   => 0,
                    // 'hierarchical' => 1,
                    'exclude'      => '',
                    'include'      => '',
                    // 'number'       => 0,
                    'pad_counts'   => false,
                    // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
                ]);

                foreach ($categories as $category) {                 
                ?>
                    <li class="tabs__nav-item"><button class="tabs__nav-btn" type="button"><?php echo $category->name; ?></button></li>                   
                <?php
                }
                ?>
             
            </ul>
            <div class="tabs__content">
                <?php
                foreach ($categories as $category) {
                ?>
                    <div class="tabs__panel">
                        <div class="slider-wrapper">
                            <div class="swiper catalog-slider">
                                <div class="swiper-wrapper">

                                    <?php
                                    // параметры по умолчанию
                                    $my_posts = get_posts(array(
                                        'numberposts' => -1,
                                        'category'    => $category->term_id,
                                        'post_type'   => 'post',
                                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                    ));

                                    global $post;
                                    foreach ($my_posts as $post) {
                                        setup_postdata($post);
                                    ?>

                                        <div class="swiper-slide catalog-slide catalog-card">
                                            <div class="catalog-card__img-wrapper">
                                                <a href="#" class="catalog-card__link" data-toggle="modal" data-target="#modal-product">
                                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="image" class="catalog-card__img">
                                                </a>
                                                <a href="#" class="catalog-card__btn btn" data-toggle="modal" data-target="#modal-product">
                                                    <span>
                                                        подробнее
                                                    </span>
                                                    <svg>
                                                        <use xlink:href="<?= get_template_directory_uri() . '/assets/img/icons/icons.svg#slider-next' ?>"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <a href="#" class="catalog-slide__title catalog-card__title" data-toggle="modal" data-target="#modal-product">
                                                <?php echo carbon_get_the_post_meta('product_title_1'); ?>
                                                <span>
                                                    <?php echo carbon_get_the_post_meta('product_title_2'); ?>
                                                </span>
                                            </a>
                                        </div><!-- /catalog-card -->

                                    <?php
                                    }
                                    wp_reset_postdata(); // сброс
                                    ?>

                                </div>
                            </div><!-- /catalog-slider -->
                            <div class="nav-arrow-wrapper">
                                <button class="nav-arrow nav-arrow--prev">
                                    <svg>
                                        <use xlink:href="<?= get_template_directory_uri() . '/assets/img/icons/icons.svg#slider-prev' ?>"></use>
                                    </svg>
                                </button>
                                <button class="nav-arrow nav-arrow--next">
                                    <svg>
                                        <use xlink:href="<?= get_template_directory_uri() . '/assets/img/icons/icons.svg#slider-next' ?>"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
              
            </div>
        </div>

        <a href="#" class="catalog-sect__btn btn btn--orange mx-auto">
            Посмотреть весь каталог
        </a>
    </div>

</section>