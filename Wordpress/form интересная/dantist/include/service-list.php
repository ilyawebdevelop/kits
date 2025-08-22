<section class="all-services">
    <div class="page__container">
        <p class="title title--h2 all-services__title"><?=get_the_title();?></p>
        <ul class="all-services__list">

            <?foreach($args["services"] as $service):?>
                <li class="all-services__item"><a class="all-services__item-link" href="<?=$service["link"]?>">

                        <div class="all-services__image-wrap">
                            <?if($service["props"]["info-service"]["preview-image"]):?>
                                <img class="all-services__image" 
                                src="<?=$service["props"]["info-service"]["preview-image"]?>"
                                alt="<?=$service["title"]?>">
                            <?endif;?>
                        </div>
                        <p class="title title--h5 all-services__item-name"><?=$service["title"]?></p>
                    </a>
                    <?if(isset($service["children"])):?>
                        <ul class="all-services__sublist">
                            <?foreach($service["children"] as $children):?>
                            <li class="all-services__subitem">
                                <a class="all-services__sublink" href="<?=$children["link"]?>"><?=$children["title"]?></a>
                            </li>
                            <?endforeach;?>
                        </ul>
                    <?endif;?>
                    <?if(!empty($service["props"]["info-service"]["price"])):?>
                    <p class="all-services__price"><?=$service["props"]["info-service"]["out-price-from"]?"от ":"";?><?=$service["props"]["info-service"]["price"]?> ₽</p>
                    <?endif;?>
                </li>
            <?endforeach;?>
      <!--  -->
            <?if(!empty($args["stock"])):?>
                <?foreach($args["stock"] as $stock):?>
                    <li class="all-services__item all-services__item--banner">
                        <div class="all-services__banner">
                            <div class="all-services__banner-content">
                                <div class="all-services__banner-info">
                                    <p class="title title--h5 all-services__banner-name"><?=$stock["title"]?>
                                        <?if(!empty($stock["props"]["base-info"]["out-price"])):?>
                                            : <span><?=$stock["props"]["base-info"]["out-price"]?> ₽</span>
                                        <?endif;?>
                                    </p>
                                    <div class="all-services__banner-image-wrap all-services__banner-image-wrap--mobile">
                                        <?if(!empty($stock["props"]["base-info"]["preview-image"])):?>
                                            <img class="all-services__banner-image" src="<?=$stock["props"]["base-info"]["preview-image"]?>" alt="<?=$stock["title"]?>">
                                        <?endif;?>
                                    </div>
                                    <?if(!empty($stock["props"]["base-info"]["preview-description"])):?>
                                        <p class="text text--small all-services__banner-text"><?=$stock["props"]["base-info"]["preview-description"]?></p>
                                    <?endif;?>
                                        <a class="button all-services__banner-link"
                                        href="<?=$stock["link"]?>">Подробнее</a>
                                </div>
                                <div class="all-services__banner-image-wrap all-services__banner-image-wrap--desktop">
                                    <?if(!empty($stock["props"]["base-info"]["preview-image"])):?>
                                        <img class="all-services__banner-image" src="<?=$stock["props"]["base-info"]["preview-image"]?>" alt="<?=$stock["title"]?>">
                                    <?endif;?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?endforeach;?>
            <?endif;?>
        </ul>
    </div>
</section>