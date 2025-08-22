<?
if(empty((int)$args["id"])) return false;
$objReview = new JReview;
$review = $objReview->getModalReview((int)$args["id"]);
?>


<div class="popup__content">
    <p class="title title--h5 reviews-block__name"><?=$review["title"]?></p>
    <div class="reviews-block__info">
        <div class="reviews-block__info-wrap">
            <div class="reviews-block__image-wrap">
            <?if(!empty($review["props"]["IMAGE"])):?>
                <img class="reviews-block__image"
                    src="<?=$review["props"]["IMAGE"]?>"
                    alt="Отзыв <?=$review["title"]?>">
                <?endif;?>
                <!-- <a class="reviews-block__video-link" href="video/review.mp4"
                    data-fslightbox="reviews-block">
                    <div class="reviews-block__button-play">
                        <svg class="reviews-block__button-play-icon" width="14" height="16">
                            <use xlink:href="#icon-play-review"></use>
                        </svg>
                    </div>
                </a> -->

            </div>
        </div>
        <?if(!empty($review["props"]["TEXT"])):?>
        <p class="text text--small reviews-block__text"><?=$review["props"]["TEXT"];?>
        </p>
        <?endif;?>
     
        <div class="reviews-block__item-footer">
            <div class="rating reviews-block__rating">
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
            <?if(!empty($review["tax"]["icon"])):?>
            <div class="reviews-block__source">
                <img class="reviews-block__source-image" src="<?=$review["tax"]["icon"]?>" alt="<?=$review["tax"]["name"]?>">
            </div>
            <?endif;?>
      
        </div>
    </div>
</div>