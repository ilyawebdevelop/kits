<section class="top-block top-block--reverse">
    <div class="page__container">
        <div class="top-block__content">
            <div class="top-block__info">
                <h1 class="title title--h3 top-block__subtitle"><?=$args["title"]?></h1>
                <div class="top-block__info-footer">
                    <button class="button top-block__button tm-trigger"
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
                </div>
            </div>
            <div class="top-block__image-wrap">
                <?if(!empty($args["base-info"]["image"])):?>
                    <img class="top-block__image" src="<?=$args["base-info"]["image"]?>"
                        alt="<?=$args["title"]?>">
                    </div>
                <?endif;?>
        </div>
    </div>
</section>
