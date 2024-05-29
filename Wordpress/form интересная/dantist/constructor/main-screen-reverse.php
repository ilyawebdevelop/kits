<?if($args["type-view"] == "image"):?>
<section class="top-block top-block--reverse">
    <div class="page__container">
        <div class="top-block__content">
            <div class="top-block__info">
                <h1 class="title title--h2 top-block__title"><?=get_the_title();?></h1>
                <?if(!empty($args["description"])):?>
                <p class="text top-block__text"><?=$args["description"];?></p>
                <?endif;?>
                <div class="top-block__info-footer">
                    <?if(!empty($args["type-btn"])):?>
                    <?switch($args["type-btn"]):
                            case "add-review":?>
                    <button class="button top-block__button tm-trigger"
                        data-tm-modal="ajax-appointment"
                        data-param-title="Оствить отзыв"
                        data-ajax-url="<?=REVIEW;?>" type="button">Оставить отзыв</button>

                    <?break;
                            case "appointment":?>
                    <button class="button top-block__button  tm-trigger"
                        data-tm-modal="ajax-appointment"
                        data-param-title="Записаться на прием"
                        data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на
                        прием</button>
                    <?break;
                        endswitch;?>
                    <?endif;?>
                </div>
            </div>
            <div class="top-block__image-wrap">
                <?if(!empty($args["image"])):?>
                <img class="top-block__image" src="<?=$args["image"]?>" alt="<?=get_the_title();?>">
                <?endif;?>
                <?if(!empty($args["base-info"]["out-price"])):?>
                    <div class="top-banner__price">
                        <?if(!empty($args["base-info"]["old-price"])):?>
                            <span class="top-banner__old-price"><?=isset($args["base-info"]["out-price-from"])?"от ":"";?><?=$args["base-info"]["old-price"]?> ₽</span>
                        <?endif;?>
                        <span class="top-banner__new-price"><?=isset($args["base-info"]["out-price-from"])?"от ":"";?><?=$args["base-info"]["out-price"]?> ₽</span>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
</section>
<?elseif($args["type-view"] == "double-image"):

    ?>
<section class="top-banner top-banner--reverse">
    <div class="page__container">
        <div class="top-banner__content">
            <div class="top-banner__info">
                <h1 class="<?=!empty($args["big_title"]) ? 'title title--h2 top-block__title' : 'title title--h3 top-banner__subtitle'?>"><?=get_the_title();?></h1>
                <?if(!empty($args["description"])):?>
                <p class="text top-banner__text"><?=$args["description"];?></p>
                <?endif;?>
                <div class="top-banner__info-footer">
                    <?if(!empty($args["type-btn"])):?>
                    <?switch($args["type-btn"]):
                        case "add-review":?>
                    <button class="button top-banner__button tm-trigger"
                        data-tm-modal="ajax-appointment"
                        data-param-title="Оствить отзыв"
                        data-ajax-url="<?=REVIEW;?>" type="button">Оставить отзыв</button>

                    <?break;
                        case "appointment":?>
                    <button class="button top-banner__button tm-trigger"
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
                    <?break;
                    endswitch;?>
                    <?endif;?>
                </div>
            </div>
            <div class="top-banner__images">
                <?if(!empty($args["images"]["small"])):?>
                <div class="top-banner__small-image-wrap">
                    <img class="top-banner__image" src="<?=$args["images"]["small"]?>" alt="<?=get_the_title();?>">
                </div>
                <?endif;?>
                <?if(!empty($args["images"]["big"])):?>
                    <div class="top-banner__big-image-wrap">
                        <img class="top-banner__image" src="<?=$args["images"]["big"]?>" alt="<?=get_the_title();?>">
                        <?if(!empty($args["base-info"]["out-price"])):?>
                            <div class="top-banner__price">
                                <?if(!empty($args["base-info"]["old-price"])):?>
                                    <span class="top-banner__old-price"><?=isset($args["base-info"]["out-price-from"])?"от ":"";?><?=$args["base-info"]["old-price"]?> ₽</span>
                                <?endif;?>
                                <span class="top-banner__new-price"><?=isset($args["base-info"]["out-price-from"])?"от ":"";?><?=$args["base-info"]["out-price"]?> ₽</span>
                            </div>
                        <?endif;?>
                    </div>
                <?endif;?>

            </div>
        </div>
    </div>
</section>
<?endif;?>
