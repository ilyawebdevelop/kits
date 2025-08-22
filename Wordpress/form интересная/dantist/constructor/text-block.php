<?
if(empty($args["text"])) return false;

switch($args["out-type"]):
    case "text-images":?>
    <?if(empty($args["link-video"])):?>
    <section class="about" id="about">
        <div class="page__container">
            <div class="about__content">
                <div class="about__image-wrap">
                  <?if(!empty($args["image"])):?>
                  <img class="about__image"
                        src="<?=$args["image"]?>" alt="<?=$args["title"]?>">
                  <?endif;?>
                </div>
                <div class="about__info">
                    <<?=$args["tag"]?> class="title title--h3 about__title"><?=$args["title"]?></<?=$args["tag"]?>>
                    <?foreach($args["text"] as $text):?>
                      <p  class="text text--small about__text"><?=$text["a"]?></p> 
                    <?endforeach;?>
                    <button class="button about__button tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
                </div>
            </div>
        </div>
    </section>


    <?else:?>


      <section class="video-block">
        <div class="page__container">
            <div class="video-block__content">
                <div class="video-block__media">
                  <div class="video-block__image-wrap">
                    <?if(!empty($args["image"])):?>
                    <img class="video-block__image"
                          src="<?=$args["image"]?>" alt="<?=$args["title"]?>">
                    <?endif;?>
                    <a class="video-block__button-play" href="<?=$args["link-video"]?>" data-fslightbox="promo">
                      <svg class="video-block__button-play-icon" width="40" height="40">
                        <use xlink:href="#icon-play"></use>
                      </svg>
                      <svg class="video-block__button-play-text-icon" width="124" height="124">
                        <use xlink:href="#icon-play-text"></use>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="video-block__info">
                 <div class="video-block__info-content">
                    <<?=$args["tag"]?> class="title title--h3 video-block__title"><?=$args["title"]?></<?=$args["tag"]?>>
                    <?foreach($args["text"] as $text):?>
                      <p  class="text text--small video-block__text"><?=$text["a"]?></p> 
                    <?endforeach;?>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <?endif;?>
      <?break;
    case "text":
    default:?>
        <?php $hide = isset($args["no_hide"]) ? !$args["no_hide"] : true; ?>
       <section class="info-block">
          <div class="page__container">
            <? if ($args["title"]): ?>
            <div class="info-block__content">
              <<?=$args["tag"]?> class="title title--h3 info-block__title"><?=$args["title"]?></<?=$args["tag"]?>>
            <? else: ?>
            <div class="info-block__content" style="grid-template-columns: calc(70% - 142px) auto;">
            <? endif; ?>
              <div class="info-block__text">
                <div class="info-block__text-content <?=$hide ? '' : 'show'?>" style="max-width:768px">
                  <div class="text text--small">
                    <?foreach($args["text"] as $text):?>
                      <p><?=$text["a"]?></p> 
                    <?endforeach;?>
                  </div>
                </div>
                <?if($hide && !empty($args["text"])):?>
                <button class="info-block__button-more" type="button">Загрузить ещё</button>
                <?endif;?>
              </div>
            </div>
          </div>
        </section>

      <?break;
  
endswitch;
?>
