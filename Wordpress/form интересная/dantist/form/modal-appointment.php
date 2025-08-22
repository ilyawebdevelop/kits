<form id="<?=$args["form_id"]?>" class="popup__form" method="post" action="#" data-booking-form>

    <input type="hidden" name="fields[title][name]" value="Название формы">
    <input type="hidden" name="fields[title][value]" value="<?=$args["title"]?>">

    <input type="hidden" name="fields[page][name]" value="Страница отправки">
    <input type="hidden" name="fields[page][value]" value="<?=$args["page"]?>">

    <input type="hidden" name="action" value="form_action">
    <div class="popup__content">
        <p class="title title--h5 popup__title">Записаться на приём</p>
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
            <input type="hidden" name="fields[wish][name]" value="Пожелания клиента">
            <textarea data-input="wish" name="fields[wish][value]" class="input__field" id="review" type="text" placeholder="Заметки"
                rows="3"></textarea>
            <label class="input__label" for="review">Ваши пожелания</label>
        </div>
       
        <div class="popup__button-wrap">
            <button class="button popup__button" type="submit">Отправить</button>
            <p class="popup__caption">Нажимая на кнопку «Отправить» я даю согласие на обработку <a
                    class="popup__caption-link"  href="/politika/" target="_blank">персональных данных</a>
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
