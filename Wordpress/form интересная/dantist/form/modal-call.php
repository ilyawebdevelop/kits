<?

$clinicInstance = JClinic::getInstance();
$clinics = $clinicInstance->getClinics();
$clinic = $clinicInstance->getClinic();
?>
<form id="<?=$args["form_id"]?>" class="popup__form" method="post">
    <input type="hidden" name="fields[title][name]" value="Название формы">
    <input type="hidden" name="fields[title][value]" value="<?=$args["title"]?>">

    <input type="hidden" name="fields[page][name]" value="Страница отправки">
    <input type="hidden" name="fields[page][value]" value="<?=$args["page"]?>">

    <input type="hidden" name="action" value="form_action">

    <div class="popup__content">
        <p class="title title--h5 popup__title">Обратный звонок</p>
        <div class="input">
            <input type="hidden" name="fields[name][name]" value="Имя пользователя">
            <input  data-input="name" name="fields[name][value]"  class="input__field" id="name" type="text" name="name" placeholder="Наталья">
            <label class="input__label" for="name">Ваше имя</label>
        </div>
        <div class="input">
            <input type="hidden" name="fields[phone][name]" value="Номер телефона">
            <input type="hidden" name="fields[phone][required]" value="true">
            
            <input data-input="phone" name="fields[phone][value]" class="input__field" id="tel" type="text" name="tel" placeholder="8 999 999 99 99">
            <label class="input__label" for="tel">Ваш номер телефона<span class="input__label--star">
                    *</span></label>
        </div>
        <div class="select">
            <div class="select__search">
                <div class="input">

                    <input type="hidden" name="fields[clinic][name]" value="Клиника">
                    <input data-input="clinic" name="fields[clinic][value]" class="input__field select__search-field" id="clinic" type="text"
                        placeholder="<?=$clinic["title"]?>" autocomplete="off" readonly value="<?=$clinic["title"]?>">
                    <label class="input__label" for="clinic">Клиника</label>
                </div>
                <button class="select__list-button" type="button" aria-label="Открыть список">
                    <svg class="select__list-icon" width="12" height="7">
                        <use xlink:href="#icon-dropdown"></use>
                    </svg>
                </button>
            </div>
            <ul class="select__list">
                <?foreach($clinics as $clinic):?>
                    <li class="select__item"><?=$clinic["title"]?></li>
                <?endforeach;?>
            </ul>
        </div>
        <p class="popup__caption">Нажимая на кнопку «Отправить» я даю согласие на обработку <a
                class="popup__caption-link" target="_blank" href="/politika/">персональных данных</a>
        </p>
        <button class="button popup__button" type="submit">Отправить</button>
    </div>
</form>

<script  type="text/javascript">
    new Form({
        formID: "<?=$args["form_id"]?>",
        classErrorInput: "input__field--invalid",
        reCAPTCHA_site_key: "<?=get_field('recaptcha_site_key', 'options')?>",
    }).init()
</script>
