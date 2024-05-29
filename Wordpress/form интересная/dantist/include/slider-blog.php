<?if(empty($args["items"]) || count($args["items"]) < 2) return false;?>
<section class="blog blog--slider">
    <div class="page__container">
        <div class="headline blog__headline">
            <p class="title title--h3 headline__name"><?=$args["title"]?></p>
            <div class="headline__buttons">
                <button class="headline__button headline__button--prev blog__button-prev" type="button"
                    aria-label="Предыдущий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
                <button class="headline__button headline__button--next blog__button-next" type="button"
                    aria-label="Следующий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="blog__container swiper-container">
            <ul class="blog__list swiper-wrapper">
                <?foreach($args["items"] as $item):?>
                    <li class="blog__item  swiper-slide">
                        <div class="blog__item-cover">
                            <div class="blog__item-image-wrap">
                                <?if(!empty($item["props"]["base-info"]["preview-image"])):?>
                                    <img 
                                        class="blog__item-image" 
                                        src="<?=$item["props"]["base-info"]["preview-image"];?>"
                                        alt="<?=$item["title"]?>"
                                    >
                                <?endif;?>
                            </div>
                        </div>
                        <div class="blog__info">
                            <?if(!empty($item["props"]["base-info"]["date"])):?>
                                <p class="blog__item-date"><?=$item["props"]["base-info"]["date"]?:"";?></p>
                            <?endif;?>
                            <p class="blog__item-name"><?=$item["title"]?></p>
                            <?if(!empty($item["props"]["base-info"]["preview-description"])):?>
                                <p class="blog__item-text"><?=$item["props"]["base-info"]["preview-description"]?:"";?></p>
                            <?endif;?>
                            <a class="button blog__item-link" href="<?=$item["link"]?>">Подробнее</a>
                        </div>
                    </li>
                <?endforeach;?>
         
            </ul>
        </div>
    </div>
</section>
