<li class="navigation__item">
    <input class="navigation__item-checkbox visually-hidden" id="nav-2" type="checkbox" name="nav">
    <label class="navigation__item-name" for="nav-2">Услуги
        <svg class="navigation__item-icon" width="16" height="16">
            <use xlink:href="#icon-arrow-down"></use>
        </svg>
    </label>
    <ul class="navigation__sublist">
        <?foreach($args["services"] as $service):?>
        <li class="navigation__sublist-item navigation__sublist-item--catalog">
            <a class="navigation__sublist-link"
                href="<?=$service["link"]?>">
                <?=$service["title"]?>
                <?if(!empty($service["children"])):?>
                <svg class="navigation__sublist-icon" width="16" height="10">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg>
                <?endif;?>
            </a>
            <?if(!empty($service["children"])):?>
                <ul class="navigation__detailed-list">
                    <?foreach($service["children"] as $child):?>
                        <li 
                            class="navigation__detailed-item"
                        >
                            <a 
                                class="navigation__detailed-link" 
                                href=" <?=$child["link"]?>"
                            >
                            <?=$child["title"]?>
                            </a>
                        </li>
                    <?endforeach;?>
                </ul>
            <?endif;?>
        </li>
        <?endforeach;?>
    </ul>
</li>
