<?if(empty($args["prices"])) return false;?>

<section class="price-table">
    <div class="page__container">
        <p class="title title--h3 price-table__title">
            <?=$args["title"];?>
        </p>
        <ol class="price-table__list">
            <?foreach($args["prices"] as $price):
                $isFree = (!empty($price["free-until"]) && (strtotime(date("d.m.Y")) <= strtotime($price["free-until"])));
                if($isFree):
                    
                    $dateTo = date_i18n("j F", strtotime($price["free-until"]));
                endif;
                ?>
            <li class="price-table__item tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием <?=$price["name"]?>"
                data-ajax-url="<?=APPOINTMENT;?>">
                <a class="price-table__link">
                    <p class="price-table__name"><?=$price["name"]?></p>
                    <div class="price-table__value">
                        <?if(!empty($price["old-price"])):?>
                        <div class="price-table__old-value"><?=$price["old-price"]?> ₽</div>
                        <?endif;?>
                        <div class="price-table__new-value">
                            <?if($isFree):?>
                                Бесплатно<span>Акция до <?=$dateTo;?></span>
                            <?else:?>
                                <?=$price["price"]?> ₽
                            <?endif;?>
                        </div>
                    </div>
                    <div class="price-table__arrow">
                        <svg class="price-table__arrow-icon" width="56" height="35">
                            <use xlink:href="#icon-arrow-right"></use>
                        </svg>
                    </div>
                </a>
            </li>
            <?endforeach;?>
        </ol>
    </div>
</section>