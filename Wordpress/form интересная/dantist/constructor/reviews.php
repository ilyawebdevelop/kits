<?if(empty($args["items"])) return false;
$args["type-view"] = isset($args["type-view"])?$args["type-view"]:"";


?>

<?switch($args["type-view"]):
    case "more":?>
<section class="reviews">
   
    <div class="page__container">
        <p class="title title--h3 reviews__name"><?=$args["title"]?></p>
        <ul id="reviews-items-wrapper" class="reviews__list">
            <!-- ajax-review-items -->
            <?foreach($args["items"] as $review):
            $tax = JReview::getTax($review["id"]);
            ?>
            <li class="reviews__item">
                <article class="review">
                    <p class="title title--h5 review__name"><?=$review["title"]?></p>
                    <div class="review__info">
                        <div class="review__info-wrap">
                            <div class="review__image-wrap">
                                <?if(!empty($review["props"]["IMAGE"])):?>
                                <img class="review__image" src="<?=$review["props"]["IMAGE"]?>"
                                    alt="Отзыв <?=$review["title"]?>">
                                <?endif;?>
                                <?if(!empty($review["props"]["link-youtube"])):?>
                                <a class="review__video-link" href="<?=$review["props"]["link-youtube"]?>"
                                    data-fslightbox="reviews">
                                    <div class="review__button-play">
                                        <svg class="review__button-play-icon" width="14" height="16">
                                            <use xlink:href="#icon-play-review"></use>
                                        </svg>
                                    </div>
                                </a>
                                <?endif;?>
                            </div>
                            <a class="review__link tm-trigger" 
                                    data-tm-modal="ajax-show-review"
                                    data-param-id="<?=$review["id"];?>"
                                    data-ajax-url="<?=SHOW_REVIEW;?>" href="#">Весь отзыв</a>
                        </div>
                        <?if(!empty($review["props"]["TEXT"])):?>
                        <p class="text text--small review__text"><?=short_text($review["props"]["TEXT"], 260)?>...
                        </p>
                        <?endif;?>
                        <div class="review__item-footer">
                            <div class="rating review__rating">
                                <?if(!empty($review["props"]["RATING"])):?>
                                <div class="rating__stars">
                                    <span class="rating__stars-fill"
                                        style="width: <?=$review["props"]["RATING"]?$review["props"]["RATING"] * 20:100?>%"></span>
                                </div>
                                <?endif;?>
                                <?if(!empty($review["props"]["date"])):?>
                                <span class="rating__date"><?=$review["props"]["date"]?></span>
                                <?endif;?>
                            </div>
                            <?if(!empty($tax["icon"])):?>
                            <div class="review__source">
                                <img class="review__source-image" src="<?=$tax["icon"]?>" alt="<?=$tax["name"]?>">
                            </div>
                            <?endif;?>
                        </div>
                    </div>
                </article>
            </li>
            <?endforeach;?>
            <!-- ajax-review-items -->
        </ul>
        <div id="reviews-pagination-wrapper" class="load-show-more">
            <!-- ajax-review-pagination -->
            <?
                JRender::viewInclude("pagination-more",[
                    "wrap-class" => "pagination--reviews",
                    "items-id" => "reviews-items-wrapper",
                    "pagination-id" => "reviews-pagination-wrapper",
                ]);?>
            <!-- ajax-review-pagination -->
        </div>
       

        <?JReview::ajaxShowMore();?>
       
    </div>
</section>
<?break;
    default: ?>
<section class="reviews-block">
    <div class="page__container">
        <div class="headline reviews-block__headline">
            <p class="title title--h3 headline__name">Отзывы</p>
            <div class="headline__buttons">
                <button class="headline__button headline__button--prev reviews-block__button-prev" type="button"
                    aria-label="Предыдущий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
                <button class="headline__button headline__button--next reviews-block__button-next" type="button"
                    aria-label="Следующий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="reviews-block__container swiper-container">
            <ul class="reviews-block__list swiper-wrapper">
                <?foreach($args["items"] as $review):
                $tax = JReview::getTax($review["id"]);
                $review["tax"] = $tax;
                ?>
                <li class="reviews-block__item swiper-slide">
                    <article class="review">
                        <p class="title title--h5 review__name"><?=$review["title"]?></p>
                        <div class="review__info">
                            <div class="review__info-wrap">
                                <div class="review__image-wrap">
                                    <?if(!empty($review["props"]["IMAGE"])):?>
                                    <img class="review__image" src="<?=$review["props"]["IMAGE"]?>"
                                        alt="Отзыв <?=$review["title"]?>">
                                    <?endif;?>
                                    <?if(!empty($review["props"]["link-youtube"])):?>
                                    <a class="review__video-link" href="<?=$review["props"]["link-youtube"]?>"
                                        data-fslightbox="reviews-block">
                                        <div class="review__button-play">
                                            <svg class="review__button-play-icon" width="14" height="16">
                                                <use xlink:href="#icon-play-review"></use>
                                            </svg>
                                        </div>
                                    </a>
                                    <?endif;?>
                                </div>
                                <a class="review__link tm-trigger" 
                                    data-tm-modal="ajax-show-review"
                                    data-param-id="<?=$review["id"];?>"
                                    data-ajax-url="<?=SHOW_REVIEW;?>" href="#">Весь отзыв</a>
                            </div>
                            <?if(!empty($review["props"]["TEXT"])):?>
                            <p class="text text--small review__text"><?=short_text($review["props"]["TEXT"], 260)?>...
                            </p>
                            <?endif;?>
                            <div class="review__item-footer">
                                <div class="rating review__rating">
                                    <?if(!empty($review["props"]["RATING"])):?>
                                    <div class="rating__stars">
                                        <span class="rating__stars-fill"
                                            style="width: <?=$review["props"]["RATING"]?$review["props"]["RATING"] * 20:100?>%"></span>
                                    </div>
                                    <?endif;?>
                                    <?if(!empty($review["props"]["date"])):?>
                                    <span class="rating__date"><?=$review["props"]["date"]?></span>
                                    <?endif;?>
                                </div>
                                <?if(!empty($tax["icon"])):?>
                                <div class="review__source">
                                    <img class="review__source-image" src="<?=$tax["icon"]?>" alt="<?=$tax["name"]?>">
                                </div>
                                <?endif;?>
                            </div>
                        </div>
                    </article>
                </li>
                <?endforeach;?>
            </ul>
        </div>
        <div class="reviews-block__footer">
            <a class="button reviews-block__general-link" href="<?=get_permalink(13);?>">Все отзывы</a>
        </div>
    </div>
</section>
<?break;?>
<?endswitch;?>