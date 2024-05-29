<form  id="<?=$args["form_id"]?>" class="feedback__form" method="post" action="#">

    <input type="hidden" name="fields[title][name]" value="Название формы">
    <input type="hidden" name="fields[title][value]" value="<?=$args["title"]?>">

    <input type="hidden" name="fields[page][name]" value="Страница отправки">
    <input type="hidden" name="fields[page][value]" value="<?=$args["page"]?>">

    <? if (!empty($args['mailto'])): ?>
    <input type="hidden" name="mailto" value="<?=$args['mailto']?>">
    <? endif; ?>

    <input type="hidden" name="action" value="form_action">
    <div class="feedback__form-content">
        <div class="input-group">
            <div class="input feedback__input">

                <input type="hidden" name="fields[name][name]" value="Имя пользователя">
                <input  data-input="name" name="fields[name][value]" class="input__field" id="feedback-name" type="name" placeholder="Наталья">
                <label class="input__label" for="feedback-name">Ваше имя</label>
            </div>
            <div class="input feedback__input">
                
                <input type="hidden" name="fields[phone][name]" value="Номер телефона">
                <input  data-input="phone" name="fields[phone][value]" class="input__field" id="feedback-tel" type="tel"
                    placeholder="8 999 999 99 99">
                <label class="input__label" for="feedback-tel">Ваш номер телефона</label>
            </div>
        </div>
        <div class="input-group">
            <div class="input feedback__input">

                <input type="hidden" name="fields[email][name]" value="E-mail">
                <input type="hidden" name="fields[email][required]" value="true">
                <input  data-input="email" name="fields[email][value]" class="input__field" id="feedback-email" type="email"
                    placeholder="nataly@mail.ru">
                <label class="input__label" for="feedback-email">E-mail*</label>
                <!-- <span
                    class="input__note input__note--invalid">E-mail указан неверно, пример:
                    nataly@mail.ru</span> -->
            </div>
            <div class="input feedback__input">

                <input type="hidden" name="fields[topic][name]" value="Тема вопроса">

                <input  data-input="topic" name="fields[topic][value]" class="input__field" id="feedback-topic" type="text"
                    placeholder="Расположение">
                <label class="input__label" for="feedback-topic">Тема вопроса</label>
            </div>
        </div>
        <div class="input feedback__input">
            <input type="hidden" name="fields[message][name]" value="Вопрос">
            <textarea 
                data-input="feedback" name="fields[feedback][value]" 
                class="input__field" 
                id="feedback-message" 
                placeholder="Как это прекрасно"
                rows="2"></textarea>
            <label class="input__label" for="feedback-message">Текст сообщения</label>
        </div>
    </div>
    <div class="feedback__form-footer">
        <button class="button feedback__button" type="submit">Отправить</button>
        <p class="feedback__caption">Нажимая на кнопку «Отправить» я даю согласие на обработку <a
                class="feedback__caption-link" href="#">персональных данных</a>
        </p>
    </div>
</form>

<script>
    new Form({
        formID: "<?=$args["form_id"]?>",
        classErrorInput: "input__field--invalid",
        reCAPTCHA_site_key: "<?=get_field('recaptcha_site_key', 'options')?>"
    }).init()
</script>
