<?if(empty($args["works"])) return false;?>
<section class="works">
    <div class="page__container">
        <div class="headline works__headline">
            <p class="title title--h3 headline__name"><?=isset($args["title"])?$args["title"]:"Наши работы";?></p>
            <div class="headline__buttons">
                <button class="headline__button headline__button--prev works__button-prev" type="button"
                    aria-label="Предыдущая работа">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
                <button class="headline__button headline__button--next works__button-next" type="button"
                    aria-label="Следующая работа">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button><span class="title title--h5 headline__current works__current">01</span>
            </div>
        </div>
        <div class="works__container swiper-container">
            <ul class="works__list swiper-wrapper">
              <?foreach($args["works"] as $work):?>
                <li class="works__item swiper-slide">
                    <ul class="works__gallery">
                        <?if(!empty($work["props"]["base-info"]["image-before"])):?>
                          <li class="works__gallery-item"><span class="title title--h5 works__gallery-period">До</span>
                              <div class="works__gallery-image-wrap">
                                <img 
                                  class="works__gallery-image"
                                  src="<?=$work["props"]["base-info"]["image-before"]?>" 
                                  alt="<?=$work["title"]?>"
                                >
                              </div>
                          </li>
                        <?endif;?>
                        <?if(!empty($work["props"]["base-info"]["image-after"])):?>
                          <li class="works__gallery-item"><span class="title title--h5 works__gallery-period">После</span>
                              <div class="works__gallery-image-wrap">
                                <img 
                                  class="works__gallery-image"
                                  src="<?=$work["props"]["base-info"]["image-after"]?>" 
                                  alt="<?=$work["title"]?>"
                                >
                              </div>
                          </li>
                        <?endif;?>
                    </ul>
                    <div class="works__info">
                        <?if(!empty($work["props"]["base-info"]["description"])):?>
                          <p class="text text--small works__description"><?=$work["props"]["base-info"]["description"]?></p>
                        <?endif;?>
                        <?if(!empty($work["props"]["base-info"]["doctors"])):?>
                            <ul class="works__artists">
                              <?foreach($work["props"]["base-info"]["doctors"] as $doctor):?>
                                <li class="text text--small works__artist">
                                  <?=$doctor["doctors-speciality"] ? $doctor["doctors-speciality"] . " ": "";?>
                                  <?if(!empty($doctor["linking-doctor"])):
                                    $doctorId = is_array($doctor["linking-doctor"])? reset($doctor["linking-doctor"]):$doctor["linking-doctor"];
                                    ?>
                                    <a href="<?=get_permalink($doctorId);?>"><?=get_the_title($doctorId);?></a>
                                  <?endif;?>
                                </li>
                              <?endforeach;?>
                            </ul>
                        <?endif;?>
                    </div>
                </li>
              <?endforeach;?>
            </ul>
        </div>
    </div>
</section>