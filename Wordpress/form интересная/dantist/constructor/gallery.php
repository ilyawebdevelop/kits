<?if(empty($args["images"])) return false;?>
<section class="gallery">
    <div class="page__container">
        <div class="headline gallery__headline">
            <p class="title title--h3 headline__name"><?=$args["titile"]?></p>
            <div class="headline__buttons">
                <button class="headline__button headline__button--prev gallery__button-prev" type="button"
                    aria-label="Предыдущий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
                <button class="headline__button headline__button--next gallery__button-next" type="button"
                    aria-label="Следующий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="gallery__container swiper-container">
            <ul class="gallery__list swiper-wrapper">
                <?foreach($args["images"] as $image):?>
                <li class="gallery__item swiper-slide">
                    <div class="gallery__image-wrap">
                        <img class="gallery__image" src="<?=$image?>" alt="<?=$args["titile"]?>">
                    </div>
                </li>
                <?endforeach;?>
            </ul>
        </div>
    </div>
</section>
