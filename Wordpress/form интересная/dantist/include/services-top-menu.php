<div class="menu-right">
    <p class="menu__title">Услуги</p>
    <button class="menu__close-services-button close-services-menu" type="button">
        <svg class="menu__close-services-button-icon" width="19" height="19">
            <use xlink:href="#icon-arrow-right"></use>
        </svg><span>Назад</span>
    </button>
    <ul class="menu-right__list">
        <?foreach($args["services"] as $service):?>
        <li class="menu-right__item">
            <a href="<?=$service["link"];?>" class="menu-right__sublist-title"><?=$service["title"];?></a>
            <?if(!empty($service["children"])):?>
            <a class="menu-right__more-link show-extra-menu" href="#">
                <svg class="menu-right__more-link-icon" width="19" height="19">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg>
            </a>
          
            <ul class="menu-right__sublist">
                <li class="menu-right__subitem menu-right__subitem--button">
                    <button class="menu__close-extra-button close-extra-menu" type="button">
                        <svg class="menu__close-extra-button-icon" width="19" height="19">
                            <use xlink:href="#icon-arrow-right"></use>
                        </svg><span>Назад</span>
                    </button>
                </li>
                <?foreach($service["children"] as $child):?>
                <li class="menu-right__subitem"><a class="menu-right__sublink" href="<?=$child["link"];?>"><?=$child["title"];?></a></li>
                <?endforeach;?>
            </ul>
            <?endif;?>
        </li>
        <?endforeach;?>
    </ul>
</div>
