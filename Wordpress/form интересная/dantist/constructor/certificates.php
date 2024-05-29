<section class="education">
    <div class="page__container">
        <div class="headline works__headline">
            <p class="title title--h3 headline__name"><?=!empty($args["title"])?$args["title"]:"Сертификаты и документация";?></p>
        </div>
        <div class="education__content">
            <div class="education__slider">
              <?if(!empty($args["image-certificates"])):?>
                <div class="education__container swiper-container">
                    <ul class="education__list swiper-wrapper">
                      <?foreach($args["image-certificates"] as $img):?>
                        <li class="education__item swiper-slide">
                            <a class="education__link" data-fslightbox="education"
                                href="<?=$img?>">
                                <div class="education__image-wrap">
                                    <img class="education__image"
                                        src="<?=$img?>"
                                        alt="<?=get_the_title();?>">
                                    </div>
                            </a>
                        </li>
                        <?endforeach;?>
                    </ul>
                </div>
                <div class="education__buttons">
                    <button class="education__button education__button--prev" type="button"
                        aria-label="Предыдущий документ">
                        <svg class="education__button-icon" width="56" height="35">
                            <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right">
                            </use>
                        </svg>
                    </button>
                    <button class="education__button education__button--next" type="button"
                        aria-label="Следующий документ">
                        <svg class="education__button-icon" width="56" height="35">
                            <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right">
                            </use>
                        </svg>
                    </button><span class="title title--h5 education__current">01</span>
                </div>
              <?endif;?>
            </div>
            <?if(isset($args["type-view"]) && $args["type-view"] == "multi"):?>
                 <!--  -->
            <div class="education__info">
                <?if(isset($args["texts"]) && !empty($args["texts"])):?>
                    <div class="education__info-content education__info-content--more">
                        <?foreach($args["texts"] as $text):?>
                            <?if(!empty($text["title"])):?>
                                <p class="title title--h5 education__info-title"><?=$text["title"]?></p>
                            <?endif;?>
                            <?if(!empty($text["text"])):?>
                                <div class="text text--small education__info-text">
                                    <?=$text["text"]?>
                                </div>
                            <?endif;?>
                        <?endforeach;?>

                            
                    </div>
                    <button class="education__button-more" type="button">Загрузить ещё</button>
                <?endif;?>
            </div>
            <!--  -->
           
            <?else:?>
                <div class="education__info">
                    <div class="education__info-content">
                    
                            <?if(!empty($args["description"])):?>
                                <div class="text text--small education__info-text">
                                <?=$args["description"]?>
                                </div>
                            <?endif;?>
                    
                    </div>
                </div>
            <?endif;?>
           
        </div>
    </div>
</section>
