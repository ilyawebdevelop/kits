<?if(empty($args["promotions"])) return false;
$args["title"] = !empty($args["title"]) ? $args["title"]:"Акции";
?>
<section class="stocks-block">
    <div class="page__container">
        <div class="stocks-block__content">
            <div class="stocks-block__info">
                <p class="title title--h3 stocks-block__title"><?=$args["title"]?></p>
                <p class="stocks-block__text">Хотите получить максимально полную информацию о наших услугах и сервисе от
                    пациентов? Изучите мнение о нас на независимых авторитетных интернет-ресурсах</p>
            </div>
            <div class="stocks-block__slider">
                <div class="stocks-block__container swiper-container">
                    <ul class="stocks-block__list swiper-wrapper">

                      <?foreach($args["promotions"] as $stock):?>
                        <li class="stocks-block__item swiper-slide">
                            <div class="stocks-block__item-wrap">
                                <p class="title title--h5 stocks-block__name"><?=$stock["title"]?>
                                  <?=!empty($stock["props"]["base-info"]["out-price"]) ?': <span>' . $stock["props"]["base-info"]["out-price"] . ' ₽</span>': '';?>
                                </p>
                                <div class="stocks-block__image-wrap">
                                    <img class="stocks-block__image"
                                    <?if(isset($stock["props"]["base-info"]["preview-image"])):?>
                                        src="<?=$stock["props"]["base-info"]["preview-image"];?>"
                                    <?else:?>
                                        src="<?=get_template_directory_uri()?>/app/img/stocks-block-1.jpg"
                                    <?endif;?>
                                        alt="<?=$stock["title"]?>">
                                    </div>
                                    <?if(!empty($stock["props"]["base-info"]["preview-description"])):?>
                                      <p class="text text--small stocks-block__text"><?=$stock["props"]["base-info"]["preview-description"];?></p>
                                    <?endif;?>
                                    <a class="button stocks-block__link" href="<?=$stock["link"]?>">Подробнее</a>
                            </div>
                        </li>
                      <?endforeach;?>
                    </ul>
                </div>
                <div class="stocks-block__buttons">
                    <button class="stocks-block__button stocks-block__button--prev" type="button"
                        aria-label="Предыдущая акция">
                        <svg class="stocks-block__button-icon" width="56" height="35">
                            <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right">
                            </use>
                        </svg>
                    </button>
                    <button class="stocks-block__button stocks-block__button--next" type="button"
                        aria-label="Следующая акция">
                        <svg class="stocks-block__button-icon" width="56" height="35">
                            <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right">
                            </use>
                        </svg>
                    </button>
                </div>
            </div>
                <a class="stocks-block__general-link" href="<?=get_permalink(63);?>"><span class="title title--h5">Все акции
                    <svg class="stocks-block__general-icon-arrow" width="56" height="35">
                        <use xlink:href="#icon-arrow-right"></use>
                    </svg>
                    <svg class="stocks-block__general-icon-ellipse" width="77" height="52">
                        <use xlink:href="#icon-ellipse"></use>
                    </svg></span>
                </a>
        </div>
    </div>
</section>