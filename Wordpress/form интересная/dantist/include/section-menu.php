<p class="menu__title">Разделы</p>
<div class="menu-left__header">
    <div class="menu-left__call">
        <?if($phone = clinic()["phone"]):?>
            <a class="menu-left__call-link" href="tel:<?=preg_replace("/[^+0-9]/", '', $phone);?>">
                <span>
                    <?=$phone;?>
                </span>
            </a>
        <?endif;?>
        <button class="menu-left__call-button tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>" type="button">Обратный звонок</button>
    </div>
    <div class="menu-left__location">
        <button class="menu-left__location-change" type="button"><?=clinic()["text-head"]?></button>
    </div>
</div>
<ul class="menu-left__list">
    <li class="menu-left__item menu-left__item--mobile">
        <a class="menu-left__link" href="<?=get_permalink(19);?>">Услуги</a>
        <a class="menu-left__more-link show-services-menu" href="#">
            <svg class="menu-left__more-link-icon" width="19" height="19">
                <use xlink:href="#icon-arrow-right"></use>
            </svg>
        </a>
    </li>
    <?foreach($args["items"] as $item):?>
        <li class="menu-left__item">
            <a class="menu-left__link" href="<?=$item["link"]?:$item["page"];?>"><?=$item["name"]?></a>
        </li>
    <?endforeach;?>
</ul>