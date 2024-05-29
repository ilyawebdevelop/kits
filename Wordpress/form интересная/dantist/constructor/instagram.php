<?if(empty($args["posts"]["data"])) return false;
unset($args["posts"]["paging"]);
?>
<section class="insta">
    <div class="page__container">
        <div class="headline insta__headline">
            <p class="title title--h3 headline__name">Мы в Instagram<span class="text text--big">Подписывайтесь на наш
            аккаунт, следите за выгодными предложениями и задавайте вопросы. Мы всегда рады новым
            знакомствам!</span>
          </p>
          <?if(!empty($args["posts"]["data"][0])):?>
          <a class="headline__link" target="_blank" href="https://www.instagram.com/<?=$args["posts"]["data"][0]["username"];?>" target="_blank">@<?=$args["posts"]["data"][0]["username"];?></a>
          <?endif;?>
        </div>
        <div class="insta__container">
            <ul class="insta__list">
            <?for($i = 0; $i < count($args["posts"]["data"]); $i++):?>
                <li class="insta__item">
                    <div class="insta__image-wrap">
                        <img class="insta__image"
                            src="<?=$args["posts"]["data"][$i]["media_url"]?>" >
                    </div>
                </li>
              <?endfor;?>
            </ul>
        </div>
    </div>
</section>