<?
if(!empty($args["services"])):

$args["out-type"] = is_array($args["out-type"]) ? reset($args["out-type"]): $args["out-type"];

switch($args["out-type"]):
  case "expаnded":?>

<section class="all-services">
    <div class="page__container">
        <ul class="all-services__list">

            <?foreach($args["services"] as $service):?>
            <li class="all-services__item">
                <a class="all-services__item-link" href="<?=$service["link"]?>">
                    <div class="all-services__image-wrap">
                        <?if(!empty($service["props"]["info-service"]["preview-image"])):?>
                            <img class="all-services__image" 
                                src="<?=$service["props"]["info-service"]["preview-image"];?>"
                                alt="<?=$service["title"]?>"
                            >
                        <?endif;?>
                    </div>
                    <?if(!empty($service["title"])):?>
                    <p class="title title--h5 all-services__item-name"><?=$service["title"]?></p>
                    <?endif;?>
                </a>
                <?if(!empty($service["props"]["info-service"]["preview-description"])):?>
                    <p class="all-services__item-text"><?=$service["props"]["info-service"]["preview-description"];?></p>
                <?endif;?>
                <?if(!empty($service["props"]["info-service"]["treatment-period"])):?>
                    <p class="all-services__item-period">срок лечения: <span><?=$service["props"]["info-service"]["treatment-period"];?></span></p>
                <?endif;?>
                <?if(!empty($service["props"]["info-service"]["price"])):?>
                    <p class="all-services__price"><?=$service["props"]["info-service"]["out-price-from"]?"от ":"";?><?=$service["props"]["info-service"]["price"]?> ₽</p>
                <?endif;?>
            </li>
            <?endforeach;?>
        </ul>
    </div>
</section>

<?break;

  default:?>
<section class="services">
    <div class="page__container">
        <p class="title title--h3 services__title">Услуги нашего центра</p>
        <ol class="services__list">
            <?foreach($args["services"] as $service):?>
                <li class="services__item">
                    <a class="services__link" href="<?=$service["link"]?>"><span
                            class="services__name"><?=$service["title"]?></span>
                        <div class="services__card">
                            <div class="services__card-content">
                                <?if(!empty($service["props"]["info-service"]["preview-image"])):?>
                                    <img class="services__image"
                                    
                                        src="<?=$service["props"]["info-service"]["preview-image"];?>" alt="<?=$service["title"]?>">
                                <?endif;?>
                                <?if(!empty($service["props"]["info-service"]["price"])):?>
                                    <span class="button services__price"><?=$service["props"]["info-service"]["out-price-from"]?"от ":"";?><?=$service["props"]["info-service"]["price"]?> ₽</span>
                                <?endif;?>
                            </div>
                        </div>
                        <div class="services__arrow">
                            <svg class="services__arrow-icon" width="56" height="35">
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </a>
                </li>
            <?endforeach;?>
        </ol>
    </div>
</section>
<?break;

endswitch;
endif;?>