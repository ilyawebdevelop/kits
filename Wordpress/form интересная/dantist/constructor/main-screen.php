

<?

if(!empty($args["link-video"])):
  $replacePlayBtn = '
    <a class="promo__button-play" href="' . $args["link-video"] . '" data-fslightbox="promo">
        <svg class="promo__button-play-icon" width="40" height="40">
            <use xlink:href="#icon-play"></use>
        </svg>
        <svg class="promo__button-play-text-icon" width="124" height="124">
            <use xlink:href="#icon-play-text"></use>
        </svg>
    </a>
  ';


else:
  $replacePlayBtn = "";
endif;

$title = str_replace("#PLAY_BTN#", $replacePlayBtn, $args["title"]);



?>
<section class="promo" <?=!empty($args["bg-image"])? "style=\"background-image: url(" . $args["bg-image"] . ");\"": "";?>>
    <?if(!empty($args["link-video"]) && !wp_is_mobile()):?>
      <div class="promo__bg">
          <video class="promo__video" src="<?=$args["link-video"]?>" autoplay muted
              loop></video>
      </div>
    <?endif;?>
    <div class="page__container">
        <div class="promo__content">
            <h1 class="title title--h1 promo__title">
              <?=$title;?>
            </h1>
            <a class="promo__scroll" href="#about">
                <svg class="promo__scroll-icon" width="22" height="33">
                    <use xlink:href="#icon-arrow-down"></use>
                </svg>
            </a>
            <ul class="promo__social-list">
                <?if($youtube = clinic()["socials"]["youtube"]):?>
                    <li class="promo__social-item"><a class="promo__social-link" href="<?=$youtube;?>" target="_blank"
                            aria-label="Youtube">
                            <svg class="promo__social-link-icon" width="31" height="29">
                                <use xlink:href="#icon-youtube"></use>
                            </svg></a></li>
                <?endif;?>
                <?if($instagram = clinic()["socials"]["instagram"]):?>
                    <li class="promo__social-item"><a class="promo__social-link" href="<?=$instagram;?>" target="_blank"
                            aria-label="Instagram">
                            <svg class="promo__social-link-icon" width="28" height="28">
                                <use xlink:href="#icon-instagram"></use>
                            </svg></a></li>
                <?endif;?>
            </ul>
        </div>
    </div>
</section>