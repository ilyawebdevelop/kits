<?if(empty($args["items"])) return false;?>

<script>
    view_tab = function(tab) {
        
        let childs = document.querySelectorAll(".price-table--tab");
        for (var i=0; i < childs.length; i++) {
            if (childs[i].getAttribute("id")){
                childs[i].style.display = "none";
            }
            if (childs[i].getAttribute("id") == tab) {
                childs[i].style.display = "block";
            }
        }

        let pricesItems = document.querySelectorAll(".prices__item");
        for (var i=0; i < pricesItems.length; i++) {
            if (pricesItems[i].getAttribute("href")){
                pricesItems[i].classList.remove("swiper-slide-active");
            }
            if (pricesItems[i].getAttribute("href") == tab) {
                pricesItems[i].classList.add("swiper-slide-active");
            }
        }
    }
</script>


<section class="prices">
    <div class="page__container">
        <!-- <div class="headline prices__headline">
            <p class="title title--h3 headline__name"></p>
            <div class="headline__buttons">
                <button class="headline__button headline__button--prev prices__button-prev" type="button"
                    aria-label="Предыдущий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
                <button class="headline__button headline__button--next prices__button-next" type="button"
                    aria-label="Следующий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
            </div>
        </div> -->
        <!-- swiper-container -->
        <div class="prices__container1 ">
            <ul class="prices__list">
                <?foreach($args["items"] as $ki => $item):
                    if(empty($item["props"]["price"])) continue;
                    ?>
                <li href="table-price-<?=$item["slug"]?>" onclick="view_tab('table-price-<?=$item['slug']?>')" class="prices__item<?= reset($args["items"])["id"] == $ki ?" swiper-slide-active":"";?>">
                    <p  class="prices__item-name"><?=$item["title"]?></p>
                </li>
               <?endforeach;?>
            </ul>
        </div>
    </div>
</section>

<?foreach($args["items"] as $k => $item):
    if(empty($item["props"]["price"])) continue;
    ?>
    <section id="table-price-<?=$item["slug"]?>" class="price-table price-table--tab"  <?= reset($args["items"])["id"] == $k ?" style=\"display: block;\"":"";?>>
        <div class="page__container">
            <p class="title title--h3 price-table__title"><?=$item["title"]?></p>
            <ol class="price-table__list">
                <?foreach($item["props"]["price"]["prices"] as $price):
                    $isFree = (!empty($price["free-until"]) && (strtotime(date("d.m.Y")) <= strtotime($price["free-until"])));
                    if($isFree):
                        
                        $dateTo = date_i18n("j F", strtotime($price["free-until"]));
                    endif;
                    ?>
                    <li class="price-table__item tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием '<?=$price["name"]?>'"
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
            <div class="price-table__footer">
                <button class="button price-table__footer-button tm-trigger" 
                                data-tm-modal="ajax-appointment"
                                data-param-title="Записаться на прием"
                                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться</button>
            </div>
        </div>
    </section>
<?endforeach;?>
