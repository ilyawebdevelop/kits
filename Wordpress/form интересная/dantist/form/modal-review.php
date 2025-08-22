<form id="<?=$args["form_id"]?>" class="popup__form" method="post" action="#">

    <input type="hidden" name="fields[title][name]" value="Название формы">
    <input type="hidden" name="fields[title][value]" value="<?=$args["title"]?>">

    <input type="hidden" name="fields[page][name]" value="Страница отправки">
    <input type="hidden" name="fields[page][value]" value="<?=$args["page"]?>">
    <input type="hidden" name="type" value="review">
    <input type="hidden" name="action" value="form_action">
    <div class="popup__content">
        <p class="title title--h5 popup__title">Оставить отзыв</p>
        <div class="input-group">
            <div class="input">
                <input type="hidden" name="fields[name][name]" value="Имя пользователя">
                <input type="hidden" name="fields[name][required]" value="true">
                <input  data-input="name" name="fields[name][value]"  class="input__field" id="name" type="text" placeholder="Наталья">
                <label class="input__label" for="name">Ваше имя<span class="input__label--star"> *</span></label>
            </div>
            <div class="input">
                <input type="hidden" name="fields[phone][name]" value="Номер телефона">
                <input type="hidden" name="fields[phone][required]" value="true">
                
                <input data-input="phone" name="fields[phone][value]" class="input__field" type="text" placeholder="8 999 999 99 99" >
                <label class="input__label" for="tel">Ваш номер телефона<span class="input__label--star"> *</span></label>
            </div>
        </div>
        <div class="input">
            <input type="hidden" name="fields[review][name]" value="Отзыв">
            <textarea data-input="review" name="fields[review][value]" class="input__field" id="review-" type="text" placeholder="Комментарий"
                rows="3"></textarea>
            <label class="input__label" for="review-">Ваш комментарий</label>
        </div>

        <div class="popup__wrap">
          <div class="rate popup__rate">
            <p class="rate__title">Ваша оценка</p>
            <div class="rate__mark">
                <input type="hidden" name="fields[rating][name]" value="Оценка">
              <input class="rate__input visually-hidden" id="5-stars" data-input="review" name="fields[rating][value]" value="5" type="radio">
              <label class="rate__label" for="5-stars" title="5 баллов">
                <svg class="rate__label-icon" width="16" height="16">
                  <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-star"></use>
                </svg>
              </label>
              <input class="rate__input visually-hidden" id="4-stars" data-input="review" name="fields[rating][value]" value="4" type="radio" checked>
              <label class="rate__label" for="4-stars" title="4 балла">
                <svg class="rate__label-icon" width="16" height="16">
                  <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-star"></use>
                </svg>
              </label>
              <input class="rate__input visually-hidden" id="3-stars" data-input="review" name="fields[rating][value]" value="3" type="radio">
              <label class="rate__label" for="3-stars" title="3 балла">
                <svg class="rate__label-icon" width="16" height="16">
                  <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-star"></use>
                </svg>
              </label>
              <input class="rate__input visually-hidden" id="2-stars" data-input="review" name="fields[rating][value]" value="2" type="radio">
              <label class="rate__label" for="2-stars" title="2 балла">
                <svg class="rate__label-icon" width="16" height="16">
                  <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-star"></use>
                </svg>
              </label>
              <input class="rate__input visually-hidden" id="1-star" data-input="review" name="fields[rating][value]" value="1" type="radio">
              <label class="rate__label" for="1-star" title="1 балл">
                <svg class="rate__label-icon" width="16" height="16">
                  <use xlink:href="<?= get_template_directory_uri() ?>/app/img/sprite.svg#icon-star"></use>
                </svg>
              </label>
            </div>
          </div>
        
        </div>
       
        <div class="popup__button-wrap">
            <button class="button popup__button" type="submit">Отправить</button>
            <p class="popup__caption">Нажимая на кнопку «Отправить» я даю согласие на обработку <a
                    class="popup__caption-link" href="/politika/" target="_blank">персональных данных</a>
            </p>
        </div>
    </div>
</form>
<script  type="text/javascript">
    new Form({
        formID: "<?=$args["form_id"]?>",
        classErrorInput: "input__field--invalid",
        reCAPTCHA_site_key: "<?=get_field('recaptcha_site_key', 'options')?>",
    }).init()
</script>
