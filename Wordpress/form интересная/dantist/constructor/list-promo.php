<section class="blog">
    <div class="page__container">
        <div class="blog__container">
            <ul id="stock-items-wrapper" class="blog__list">
                <!-- ajax-stock-items -->
                <?foreach($args["items"] as $item):?>
                <li class="blog__item">
                    <div class="blog__item-cover">
                        <div class="blog__item-image-wrap">
                            <?if(!empty($item["props"]["base-info"]["preview-image"])):?>
                                <img class="blog__item-image" src="<?=$item["props"]["base-info"]["preview-image"];?>"
                                    alt="<?=$item["title"]?>">
                            <?endif;?>
                        </div>
                    </div>
                    <div class="blog__info">

                        <p class="blog__item-date"><?=!empty($item["props"]["base-info"]["free-until"]) ?
                            "Акция до " . date_i18n("j F", strtotime($item["props"]["base-info"]["free-until"])) :
                            "";
                        ?></p>
                        <p class="blog__item-name"><?=$item["title"]?><?if(!empty($item["props"]["base-info"]["out-price"])):?>: <span><?=isset($item["props"]["base-info"]["out-price-from"])?"от ":"";?><?=$item["props"]["base-info"]["out-price"]?> ₽</span>
                        <?endif;?></p>
                        <?if(!empty($item["props"]["base-info"]["preview-description"])):?>
                            <p class="blog__item-text"><?=$item["props"]["base-info"]["preview-description"]?></p>
                        <?endif;?>
                        <a class="button blog__item-link" href="<?=$item["link"]?>">Подробнее</a>
                    </div>
                </li>
                <?endforeach;?>
                <!-- ajax-stock-items -->
            </ul>
            <div id="stock-pagination-wrapper" class="load-show-more">
                <!-- ajax-stock-pagination -->
                <?
                    JRender::viewInclude("pagination-stock",[
                        "wrap-class" => "pagination--stock",
                        "items-id" => "stock-items-wrapper",
                        "pagination-id" => "stock-pagination-wrapper",
                        "btn-text" => "Показать ещё акции"
                    ]);?>
                <!-- ajax-stock-pagination -->
            </div>
            <?JStock::ajaxShowMore();?>
        </div>
    </div>
</section>
