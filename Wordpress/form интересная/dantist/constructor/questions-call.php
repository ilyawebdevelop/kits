<section class="ask">
  <div class="page__container">
    <div class="ask__content">
      <div 
        class="ask__bg" 
        <?if(empty($args["image"])):?>
          style="background-image: url(<?= get_template_directory_uri() ?>/app/img/ask.png)"
        <?else:?>
          style="background-image: url(<?=$args["image"]?>)"
        <?endif;?>
      ></div>
      <div class="ask__content-info">
        <div class="ask__info">
          <p class="title title--h3 ask__title"><?=$args["title"]?></p>
          <button class="button ask__button tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>" type="button">Записаться на прием</button>
        </div>
      </div>
    </div>
  </div>
</section>