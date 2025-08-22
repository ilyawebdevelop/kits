<section class="vacancy">
    <div class="page__container">
        <div class="headline vacancy__headline">
            <p class="title title--h3 headline__name"><?=$args["title"]?></p>
        </div>
        <ul class="vacancy__list">

        <?foreach($args["tabs"] as $k=> $tab):?>
            <li class="vacancy__item">
                <input class="vacancy__item-checkbox visually-hidden" id="vacancy-<?=$k?>" type="checkbox" name="vacancy">
                <label class="vacancy__item-headline" for="vacancy-<?=$k?>">
                    <p class="vacancy__item-name"><?=$tab["t-title"]?></p>
                
                    <p class="vacancy__item-experience">
                        <?=$tab["t-right"]["n"]?:"";?><?=$tab["t-right"]["v"]?': <span>' . $tab["t-right"]["v"] . '</span>':"";?>
                    </p>
                    <div class="vacancy__arrow">
                        <svg class="vacancy__arrow-icon" width="56" height="35">
                            <use xlink:href="#icon-arrow-right"></use>
                        </svg>
                    </div>
                </label>
                <div class="vacancy__item-info">
                    <?foreach($tab["t-group"] as $group):?>
                    <p class="vacancy__item-info-title"><?=$group["g-title"]?>:</p>
                    <ul>
                        <?foreach($group["g-items"] as $item):
                            if(empty($item["i"])) return false;
                            ?>
                        <li><?=$item["i"];?></li>
                        <?endforeach;?>
                    </ul>
                    <?endforeach;?>
                </div>
            </li>
        <?endforeach;?>
        </ul>
    </div>
</section>