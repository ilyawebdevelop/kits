<section class="blog">
    <div class="page__container">
        <div class="blog__container">
            <ul id="recommendations-items-wrapper" class="blog__list">
                <!-- ajax-recommendations-items -->
                <?foreach($args["items"] as $item):?>
                <li class="blog__item">
                    <div class="blog__item-cover">
                        <div class="blog__item-image-wrap">
                            <?if(!empty($item["props"]["base-info"]["preview-image"])):?>
                                <img 
                                    class="blog__item-image" 
                                    src="<?=$item["props"]["base-info"]["preview-image"];?>"
                                    alt="<?=$item["title"]?>"
                                >
                            <?endif;?>
                        </div>
                    </div>
                    <div class="blog__info">
                        <p class="blog__item-date"><?=$item["props"]["base-info"]["date"]?:"";?></p>
                        <p class="blog__item-name"><?=$item["title"]?></p>
                        <p class="blog__item-text"><?=$item["props"]["base-info"]["preview-description"]?:"";?></p>
                        <a class="button blog__item-link" href="<?=$item["link"]?>">Подробнее</a>
                    </div>
                </li>
                <?endforeach;?>
                <!-- ajax-recommendations-items -->
            </ul>
            <div id="recommendations-pagination-wrapper" class="load-show-more">
                <!-- ajax-recommendations-pagination -->
                <?
                    JRender::viewInclude("pagination-blog",[
                        "wrap-class" => "pagination--blog",
                        "items-id" => "recommendations-items-wrapper",
                        "pagination-id" => "recommendations-pagination-wrapper",
                        "btn-text" => "Показать ещё рекомендации",
                        "type-name" => "recommendations",
                    ]);?>
                <!-- ajax-recommendations-pagination -->
            </div>
            <?JArticle::ajaxShowMore();?>
        </div>
    </div>
</section>
