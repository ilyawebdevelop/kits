<section class="education">
    <div class="page__container">
        <div class="headline works__headline">
            <p class="title title--h3 headline__name"><?=$args["title"];?></p>
        </div>
        <div class="education__content">
            <div class="education__slider">
                <div class="education__container swiper-container">
                    <ul class="education__list swiper-wrapper">
                        <?foreach($args["images"] as $image):?>
                        <li class="education__item swiper-slide"><a class="education__link" data-fslightbox="education"
                                href="<?= $image?>">
                                <div class="education__image-wrap"><img class="education__image"
                                        src="<?= $image?>" alt="Сертификат"></div>
                            </a>
                        </li>
                        <?endforeach;?>
                    </ul>
                </div>
                <div class="education__buttons">
                    <button class="education__button education__button--prev" type="button"
                        aria-label="Предыдущий сертификат">
                        <svg class="education__button-icon" width="56" height="35">
                            <use xlink:href="img/sprite.svg#icon-arrow-right"></use>
                        </svg>
                    </button>
                    <button class="education__button education__button--next" type="button"
                        aria-label="Следующий сертификат">
                        <svg class="education__button-icon" width="56" height="35">
                            <use xlink:href="img/sprite.svg#icon-arrow-right"></use>
                        </svg>
                    </button><span class="title title--h5 education__current">01</span>
                </div>
            </div>
            <div class="education__info">
                <div class="education__info-content">
                    <div class="requisites">
                    <?foreach($args["requizites"] as $requizit):?>
                        <p class="requisites__line">
                            <?=$requizit["n"]?>: <span><?=$requizit["v"]?></span>
                        </p>
                    <?endforeach;?>
                      
                        <p class="requisites__caption">Ознакомиться подробнее с документами вы можете в нашей клинике
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>