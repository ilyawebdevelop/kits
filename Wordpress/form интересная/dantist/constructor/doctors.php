<?if(empty($args["doctors"])) return false;
$args["type-view"] = isset($args["type-view"])?$args["type-view"]:"";

switch($args["type-view"]):
    case "tabs":
    $specials = JDoctor::getSpecAll();
    $args["specials"] = $specials;
    ?>

     <section class="doctors">
        <div class="page__container">
          <input class="doctors__checkbox visually-hidden" id="toggle-1" type="radio" name="doctors" value="toggle-1" checked>
            <?foreach($specials as $s):?>
                <input class="doctors__checkbox visually-hidden" id="toggle-<?=$s["id"]?>" type="radio" name="doctors" value="toggle-<?=$s["id"]?>">
            <?endforeach;?>
          <div class="doctors__tabs-wrapper">
            <label class="text text--big doctors__tab-name" for="toggle-1">Все</label>
            <?foreach($specials as $s):?>
                <label class="text text--big doctors__tab-name" for="toggle-<?=$s["id"]?>"><?=mb_strtolower($s["title"]) != 'администратор'?"Врач ": "";?><?=$s["title"]?></label>
            <?endforeach;?>
          </div>
          <section class="doctors__tab">
            <div class="doctors__tab-content">
              <ul class="doctors__list">

                <?foreach($args["doctors"] as $doctor):
                    $tax = JDoctor::getSpec($doctor["id"]);

                    $typeDoctor = mb_strtolower($tax["name"]) != 'администратор'?"Врач ": "";
                    ?>
                    <li class="doctors__item">
                        <article class="team-member">
                            <p class="title title--h5 team-member__post"><?=isset($tax["name"])? $typeDoctor . $tax["name"]:"";?></p>
                            <div class="team-member__info">
                            <div class="team-member__wrap">
                                <div class="team-member__image-wrap">
                                    <?if(!empty($doctor["props"]["base-info"]["photo"])):?>
                                        <img class="team-member__image"
                                        src="<?=$doctor["props"]["base-info"]["photo"];?>"
                                        alt="<?=$doctor["title"]?>"
                                        >
                                    <?endif;?>


                                </div>
                                <?php if (!$doctor["props"]["base-info"]["hide_bio"]): ?>
                                <a class="team-member__link" href="<?=$doctor["link"]?>">Познакомиться с врачом</a>
                              <?php endif; ?>
                            </div>
                            <p class="text text--big team-member__name"><?=$doctor["title"]?></p>
                            <?php if (!$doctor["props"]["base-info"]["hide_order"]): ?>
                            <button class="button button--dark team-member__button tm-trigger"
                                data-tm-modal="ajax-appointment"
                                data-param-title="Записаться на прием к доктору <?=$doctor["title"]?>"
                                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
                              <?php endif; ?>
                            </div>
                        </article>
                    </li>

                <?endforeach;?>


              </ul>

            </div>
          </section>

          <?foreach($specials as $s):?>
            <section class="doctors__tab">
                <div class="doctors__tab-content">
                <ul class="doctors__list">

                    <?foreach($args["doctors"] as $doctor):
                        $tax = JDoctor::getSpec($doctor["id"]);

                        if((empty($s["id"]) || empty($tax["id"])) || $s["id"] != $tax["id"]) continue;

                        $typeDoctor = mb_strtolower($tax["name"]) != 'администратор'?"Врач ": "";
                        ?>
                        <li class="doctors__item">
                            <article class="team-member">
                                <p class="title title--h5 team-member__post"><?=isset($tax["name"])? $typeDoctor . $tax["name"]:"";?></p>
                                <div class="team-member__info">
                                <div class="team-member__wrap">
                                    <div class="team-member__image-wrap">
                                        <?if(!empty($doctor["props"]["base-info"]["photo"])):?>
                                            <img class="team-member__image"
                                            src="<?=$doctor["props"]["base-info"]["photo"];?>"
                                            alt="<?=$doctor["title"]?>"
                                            >
                                        <?endif;?>


                                    </div>
                                    <?php if (!$doctor["props"]["base-info"]["hide_bio"]): ?>
                                    <a class="team-member__link" href="<?=$doctor["link"]?>">Познакомиться с врачом</a>
                                    <?endif;?>
                                </div>
                                <p class="text text--big team-member__name"><?=$doctor["title"]?></p>
                                <?php if (!$doctor["props"]["base-info"]["hide_order"]): ?>
                                <button class="button button--dark team-member__button tm-trigger"
                                data-tm-modal="ajax-appointment"
                                data-param-title="Записаться на прием к доктору <?=$doctor["title"]?>"
                                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
                                <?endif;?>
                                </div>
                            </article>
                        </li>

                    <?endforeach;?>


                </ul>

                </div>
            </section>
          <?endforeach;?>

        </div>
      </section>
        <?break;
    default:?>
    <section class="team">
    <div class="page__container">
        <div class="headline team__headline">
            <p class="title title--h3 headline__name"><?=$args["titile"]?:"Врачи центра";?></p>
            <div class="headline__buttons">
                <button class="headline__button headline__button--prev team__button-prev" type="button"
                    aria-label="Предыдущий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
                <button class="headline__button headline__button--next team__button-next" type="button"
                    aria-label="Следующий слайд">
                    <svg class="headline__button-icon" width="56" height="35">
                        <use xlink:href="<?=get_template_directory_uri()?>/app/img/sprite.svg#icon-arrow-right"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="team__container swiper-container">
            <ul class="team__list swiper-wrapper">
              <?foreach($args["doctors"] as $doctor):
                $tax = JDoctor::getSpec($doctor["id"]);

                $typeDoctor = mb_strtolower($tax["name"]) != 'администратор'?"Врач ": "";
                ?>
                <li class="team__item swiper-slide">
                    <article class="team-member">
                        <p class="title title--h5 team-member__post"><?=isset($tax["name"])? $typeDoctor . $tax["name"]:"";?></p>
                        <div class="team-member__info">
                            <div class="team-member__wrap">
                                <div class="team-member__image-wrap">
                                  <?if(!empty($doctor["props"]["base-info"]["photo"])):?>
                                    <img class="team-member__image"
                                      src="<?=$doctor["props"]["base-info"]["photo"];?>"
                                      alt="<?=$doctor["title"]?>"
                                    >
                                  <?endif;?>
                                </div>
                                <?php if (!$doctor["props"]["base-info"]["hide_bio"]): ?>
                                <a class="team-member__link" href="<?=$doctor["link"]?>">Познакомиться с врачом</a>
                                <?endif;?>
                            </div>
                            <p class="text text--big team-member__name"><?=$doctor["title"]?></p>
                            <?php if (!$doctor["props"]["base-info"]["hide_order"]): ?>
                            <button class="button button--dark team-member__button tm-trigger"
                                data-tm-modal="ajax-appointment"
                                data-param-title="Записаться на прием к доктору <?=$doctor["title"]?>"
                                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на
                                прием</button>
                                <?endif;?>
                        </div>
                    </article>
                </li>
              <?endforeach;?>
            </ul>
        </div>
    </div>
</section>
        <?break;

endswitch;
?>
