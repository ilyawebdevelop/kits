<section class="doctor">
    <div class="page__container">
        <div class="doctor__content">
            <div class="doctor__info">
                <?if(!empty($args["d"]["props"]["info-doctor"]["speciality"])):?>
                <p class="text text--pale doctor__post"><?=$args["d"]["props"]["info-doctor"]["speciality"]?:"";?></p>
                <?endif;?>
                <h1 class="title title--h3 doctor__name"><?=$args["d"]["title"]?></h1>
                <?if(!empty($args["d"]["props"]["info-doctor"]["preview-description"])):?>
                <p class="text doctor__text"><?=$args["d"]["props"]["info-doctor"]["preview-description"]?:"";?></p>
                <?endif;?>
                <div class="doctor__info-footer">
                    <button class="button doctor__button tm-trigger"
                        data-tm-modal="ajax-appointment"
                        data-param-title="Записаться на прием к доктору <?=$args["d"]["title"]?>"
                        data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
                    <?if(!empty($args["d"]["props"]["info-doctor"]["instagram"])):?>
                    <a
                        class="doctor__link" href="<?=$args["d"]["props"]["info-doctor"]["instagram"]?>" target="_blank">
                        <svg class="doctor__link-icon" width="16" height="16">
                            <use xlink:href="#icon-instagram"></use>
                        </svg>
                    </a>
                    <?endif;?>
                    <?if(!empty($args["d"]["props"]["base-info"]["video_url"])):?>
                    <a
                        class="button button--clear doctor__video" href="<?=$args["d"]["props"]["base-info"]["video_url"]?>" target="_blank" data-fslightbox="doctor-video">
                        Видео о докторе
                    </a>
                    <?endif;?>
                </div>
            </div>
            <?if(!empty($args["d"]["props"]["info-doctor"]["images"])):?>
            <div class="doctor__image-wrap">
                <img class="doctor__image" src="<?=$args["d"]["props"]["info-doctor"]["images"]?:"";?>"
                    alt="<?=$args["d"]["title"]?>">
            </div>
            <?endif;?>
        </div>
    </div>
</section>
