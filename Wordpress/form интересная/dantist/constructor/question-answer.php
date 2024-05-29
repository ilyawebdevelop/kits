<section class="faq">
    <div class="page__container">
        <div class="faq__content">
            <div class="faq__info">
                
                <div class="faq__image-wrap">
                        <img class="faq__image" src="<?=!empty($args["preview-image"])? $args["preview-image"]: get_template_directory_uri() . "/app/img/doctor-video-preview.jpg";?>" alt="">
                        <?if(!empty($args["code-youtube"])):?>
                            <a class="faq__video-link" href="<?=$args["code-youtube"]?>" data-fslightbox="doctor">
                            <div class="faq__button-play" href="<?=$args["code-youtube"]?>" data-fslightbox="doctor">
                                <svg class="faq__button-play-icon" width="30" height="32">
                                    <use xlink:href="#icon-play-review"></use>
                                </svg>
                            </div>
                        <?endif;?>
                    </a>
                </div>
                <p class="title title--h3 faq__title">Вопрос ответ</p>
                <div class="faq__footer">
                    <div class="social faq__footer-social">
                        <ul class="social__list">
                            <?if($vk = clinic()["socials"]["vk"]):?>
                                <li class="social__item"><a class="social__link" href="<?=$vk?>" target="_blank" aria-label="Вконтакте">
                                    <svg class="social__link-icon" width="16" height="16">
                                        <use xlink:href="#icon-vk"></use>
                                    </svg></a></li>
                            <?endif;?>
                            <?if($facebook = clinic()["socials"]["facebook"]):?>
                                <li class="social__item"><a class="social__link" href="<?=$facebook?>" target="_blank" aria-label="Facebook">
                                    <svg class="social__link-icon" width="16" height="16">
                                    <use xlink:href="#icon-facebook"></use>
                                    </svg></a></li>
                            <?endif;?>
                            <?if($instagram = clinic()["socials"]["instagram"]):?>
                                <li class="social__item"><a class="social__link" href="<?=$instagram?>" target="_blank" aria-label="Instagram">
                                    <svg class="social__link-icon" width="16" height="16">
                                    <use xlink:href="#icon-instagram"></use>
                                    </svg></a></li>

                            <?endif;?>
                            <?if($youtube = clinic()["socials"]["youtube"]):?>
                                <li class="social__item"><a class="social__link" href="<?=$youtube?>" target="_blank" aria-label="Youtube">
                                    <svg class="social__link-icon" width="20" height="14">
                                    <use xlink:href="#icon-youtube"></use>
                                    </svg></a></li>
                            <?endif;?>
                          
                        </ul>
                    </div>
                    <p class="faq__footer-text">Больше ответов на вопросы в наших соц.сетях</p>
                </div>
            </div>
            <ul class="faq__list">
                <?foreach($args["questions"] as $k => $question):?>
                <li class="faq__item">
                    <?if(!empty($question["l"])):?>
                    <a class="faq__item-button-play" type="button" href="<?=$question["l"]?>" data-fslightbox="questions">
                        <svg class="faq__item-button-play-icon" width="14" height="16">
                            <use xlink:href="#icon-play-review"></use>
                        </svg>
                    </a>
                    <?endif;?>
                    <input class="faq__item-checkbox visually-hidden" id="faq-<?=$k?>" type="checkbox" name="faq">
                    <label class="faq__item-name" for="faq-<?=$k?>"><?=$question["q"]?></label>
                    <div class="text text--small faq__answer"><?=$question["a"]?></p>
                    </div>
                </li>
                <?endforeach;?>
            </ul>
            <a class="faq__general-link tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Задать вопрос врачу '<?=get_the_title();?>'"
                data-ajax-url="<?=APPOINTMENT;?>" 
            ><span class="title title--h5">Задать вопрос врачу
                <svg class="faq__general-icon-arrow" width="56" height="35">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg>
                <svg class="faq__general-icon-ellipse" width="77" height="52">
                    <use xlink:href="#icon-ellipse"></use>
                </svg></span>
            </a>
        </div>
    </div>
</section>
