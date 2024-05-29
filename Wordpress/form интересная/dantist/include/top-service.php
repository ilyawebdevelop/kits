
<section class="top-banner">
    <div class="page__container">
        <div class="top-banner__content">
            <div class="top-banner__info">
                <h1 class="title title--h2 top-banner__title"><?=$args["s"]["title"];?></h1>
                <?if($args["s"]["props"]["info-service"]["preview-description"]):?>
                    <p class="text top-banner__text"><?=$args["s"]["props"]["info-service"]["preview-description"];?></p>
                <?endif;?>
                <div class="top-banner__info-footer">
                    <button class="button top-banner__button tm-trigger"
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на приём</button>
                <?php if ($args["s"]["props"]["info-service"]["online-consultation"]): ?>
                    <button class="button button--dark top-banner__button tm-trigger"
                data-tm-modal="ajax-online-consultation"
                data-param-title="Онлайн консультация"
                data-ajax-url="<?=ONLINE_CONSULTATION;?>" type="button">Онлайн консультация</button>
                <?php endif; ?>
                </div>
            </div>
            <div class="top-banner__images">
                <?if(!empty($args["s"]["props"]["info-service"]["header-images"]["small-image"])):?>
                    <div class="top-banner__small-image-wrap">
                        <img
                            class="top-banner__image"
                            src="<?=$args["s"]["props"]["info-service"]["header-images"]["small-image"]?>"
                            alt="<?=$args["s"]["title"];?>"
                        >
                    </div>
                <?endif;?>

                <div class="top-banner__big-image-wrap"> 
                    <?if(!empty($args["s"]["props"]["info-service"]["header-images"]["base-image"])):?>
                        <img class="top-banner__image"
                            src="<?=$args["s"]["props"]["info-service"]["header-images"]["base-image"]?>"
                            alt="<?=$args["s"]["title"];?>"
                        >
                    <?endif;?>
                    <?if(!empty($args["s"]["props"]["info-service"]["price"])):?>
                    <div class="top-banner__price">
                        <?if(!empty($args["s"]["props"]["info-service"]["price-old"])):?>
                            <span class="top-banner__old-price"><?=$args["s"]["props"]["info-service"]["out-price-from"]?"от ":"";?><?=$args["s"]["props"]["info-service"]["price-old"]?> ₽</span>
                        <?endif;?>

                            <span class="top-banner__new-price"><?=$args["s"]["props"]["info-service"]["out-price-from"]?"от ":"";?><?=$args["s"]["props"]["info-service"]["price"]?> ₽</span>

                    </div>
                    <?endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
