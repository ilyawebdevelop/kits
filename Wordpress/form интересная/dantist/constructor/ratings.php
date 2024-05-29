<section class="score">
    <div class="page__container">
        <div class="score__content">
            <div class="score__info">
                <p class="title title--h3 score__title">Независимые рейтинги</p>
                <p class="score__text">Хотите получить максимально полную информацию о наших услугах и сервисе от
                    пациентов? Изучите мнение о нас на независимых авторитетных интернет-ресурсах</p>
            </div>
            <ul class="score__list">
              <?foreach($args["items"] as $item):?>
                <li class="score__item">
                  <img class="score__image" src="<?=$item["icon"]?>" alt="<?=$item["title"]?>">
                    <div class="rating score__rating">
                        <div class="rating__stars">
                          <span class="rating__stars-fill" style="width: <?=$item["rating"]*20;?>%"></span>
                        </div>
                    </div>
                    <a class="score__link"

                      <?=$item["link"]? 'target="_blank" href="' . $item["link"] . '" ':"";?>
                    target="_blank"><?=$item["static_count"] ? $item["static_count"] : $item["count"]?> отзывов</a>
                </li>
              <?endforeach;?>
            </ul>
            <a class="score__general-link" href="<?=get_permalink(21);?>">
              <span class="title title--h5">О компании
                <svg class="score__general-icon-arrow" width="56" height="35">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg>
                <svg class="score__general-icon-ellipse" width="77" height="52">
                    <use xlink:href="#icon-ellipse"></use>
                </svg>
              </span>
            </a>
        </div>
    </div>
</section>
