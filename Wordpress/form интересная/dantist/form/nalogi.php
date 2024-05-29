<form id="<?= $args["form_id"] ?>" class="nalogi__form" method="post" action="#">

    <input type="hidden" name="fields[title][name]" value="Название формы">
    <input type="hidden" name="fields[title][value]" value="<?= $args["title"] ?>3dsaasd">

    <input type="hidden" name="fields[page][name]" value="Страница отправки">
    <input type="hidden" name="fields[page][value]" value="<?= $args["page"] ?>ggds344">

    <!-- <input type="hidden" name="mailto" value="prozuby23nalog@yandex.ru"> -->
    <input type="hidden" name="mailto" value="ilia199116@gmail.com">
    <!-- <input type="hidden" name="mailto" value="prozuby23buh@yandex.ru"> -->

    <input type="hidden" name="action" value="form_action">
    <div class="nalogi__form-content">
        <p class="title">Данные плательщика <span class="nalogi__required">*</span></p>
        <div class="input-group">
            <div class="input nalogi__input">
                <input type="hidden" name="fields[name][name]" value="Имя пользователя">
                <input type="hidden" name="fields[name][required]" value="true">
                <input data-input="name" name="fields[name][value]" class="input__field" id="nalogi-name" type="name" placeholder="Наталья">
                <label class="input__label" for="nalogi-name">Ваше имя</label>
                <span class="input__note input__note--invalid">Укажите ваше имя</span>
            </div>
            <div class="input nalogi__input">
                <input type="hidden" name="fields[lastname][name]" value="Фамилия пользователя">
                <input type="hidden" name="fields[lastname][required]" value="true">
                <input data-input="lastname" name="fields[lastname][value]" class="input__field" id="nalogi-lastname" type="lastname" placeholder="Иванова">
                <label class="input__label" for="nalogi-lastname">Ваша фамилия</label>
                <span class="input__note input__note--invalid">Укажите вашу фамилию</span>
            </div>
            <div class="input nalogi__input">
                <input type="hidden" name="fields[midname][name]" value="Отчество пользователя">
                <input type="hidden" name="fields[midname][required]" value="true">
                <input data-input="midname" name="fields[midname][value]" class="input__field" id="nalogi-midname" type="midname" placeholder="Ивановна">
                <label class="input__label" for="nalogi-midname">Ваше отчество</label>
                <span class="input__note input__note--invalid">Укажите ваше отчество</span>
            </div>
        </div>
        <p class="title">Паспортные данные <span class="nalogi__required">*</span></p>
        <div class="input-group">
            <div class="input nalogi__input">
                <input type="hidden" name="fields[passport_seria][name]" value="Серия паспорта">
                <input type="hidden" name="fields[passport_seria][required]" value="true">
                <input data-input="passport_seria" name="fields[passport_seria][value]" class="input__field" id="nalogi-passport_seria" type="passport_seria" placeholder="＿＿＿＿">
                <label class="input__label" for="nalogi-passport_seria">Серия паспорта</label>
                <span class="input__note input__note--invalid">Введите серию паспорта</span>
            </div>
            <div class="input nalogi__input">
                <input type="hidden" name="fields[passport_number][name]" value="Номер паспорта">
                <input type="hidden" name="fields[passport_number][required]" value="true">
                <input data-input="passport_number" name="fields[passport_number][value]" class="input__field" id="nalogi-passport_number" type="passport_number" placeholder="＿＿＿＿＿＿">
                <label class="input__label" for="nalogi-passport_number">Номер паспорта</label>
                <span class="input__note input__note--invalid">Введите номер паспорта</span>
            </div>
            <div class="input nalogi__input">
                <input type="hidden" name="fields[passport_date][name]" value="Дата выдачи паспорта">
                <input type="hidden" name="fields[passport_date][required]" value="true">
                <input data-input="passport_date" name="fields[passport_date][value]" class="input__field" id="nalogi-passport_date" type="date" data-placeholder="01.01.2024" aria-required="true">
                <label class="input__label" for="nalogi-passport_date">Дата выдачи паспорта</label>
                <span class="input__note input__note--invalid">Выберите дату выдачи паспорта</span>
            </div>
        </div>
        <div class="input-group">
            <div class="input nalogi__input">
                <input type="hidden" name="fields[passport_organ][name]" value="Кем выдан паспорт">
                <input type="hidden" name="fields[passport_organ][required]" value="true">
                <input data-input="passport_organ" name="fields[passport_organ][value]" class="input__field" id="nalogi-passport_organ" type="passport_organ" placeholder="">
                <label class="input__label" for="nalogi-passport_organ">Кем выдан паспорт</label>
                <span class="input__note input__note--invalid">Введите кем выдан паспорт</span>
            </div>
        </div>
        <p class="title">ИНН плательщика</p>
        <div class="input-group">
            <div class="input nalogi__input">
                <input type="hidden" name="fields[inn][name]" value="ИНН Плательщика">
                <input data-input="inn" name="fields[inn][value]" class="input__field" id="nalogi-inn" type="inn" placeholder="Введите номер ИНН">
                <p>Не является обязательным для заполнения</p>
                <!-- <span class="input__note input__note--invalid">Укажите ИНН плательщика</span> -->
            </div>
        </div>
        <p class="title">Выберите кому была оказана услуга <span class="nalogi__required">*</span></p>
        <div class="input-group">
            <div class="input nalogi__input">
                <input type="hidden" name="fields[pacient_type][name]" value="Кому была оказана услуга?">
                <input type="hidden" name="fields[pacient_type][required]" value="true">
                <div class="input__radio">
                    <label>
                        <input data-input="pacient_type" name="fields[pacient_type][value][]" checked value="Плательщику" class="input__field" id="nalogi-pacient_type" type="checkbox" placeholder="Ивановна">
                        Плательщику
                        <span class="input__note input__note--invalid">Выберите кому была оказана услуга</span>
                    </label>
                    <label>
                        <input data-input="pacient_type" name="fields[pacient_type][value][]" value="Супругу (супруге)" class="input__field" id="nalogi-pacient_type" type="checkbox" placeholder="Ивановна">
                        Супругу (супруге)
                    </label>
                    <label>
                        <input data-input="pacient_type" name="fields[pacient_type][value][]" value="Сыну (дочери)" class="input__field" id="nalogi-pacient_type" type="checkbox" placeholder="Ивановна">
                        Сыну (дочери)
                    </label>
                    <label>
                        <input data-input="pacient_type" name="fields[pacient_type][value][]" value="Отцу (матери)" class="input__field" id="nalogi-pacient_type" type="checkbox" placeholder="Ивановна">
                        Отцу (матери)
                    </label>
                </div>
            </div>
        </div>
        <p class="title">Пациент <span class="nalogi__required">*</span></p>
        <p>Если пациент является плательщиком укажите свое ФИО, если пациент<br />не является плательщиком укажите тут только ФИО пациента</p>
        <div class="pacient">
            <p class="pacient_num">Пациент 1</p>
            <input type="hidden" name="fields[pacient_number][name]" value="Номер пациента">
            <input type="hidden" name="fields[pacient_number][value]" value="1">
            <div class="input-group">
                <div class="input nalogi__input">
                    <input type="hidden" name="fields[pacient_name][name]" value="Имя пациента">
                    <input type="hidden" name="fields[pacient_name][required]" value="true">
                    <input data-input="pacient_name" name="fields[pacient_name][value]" class="input__field" id="nalogi-pacient_name" type="text" placeholder="Наталья">
                    <label class="input__label" for="nalogi-pacient_name">Имя пациента</label>
                    <span class="input__note input__note--invalid">Укажите имя пациента</span>
                </div>
                <div class="input nalogi__input">
                    <input type="hidden" name="fields[pacient_lastname][name]" value="Фамилия пациента">
                    <input type="hidden" name="fields[pacient_lastname][required]" value="true">
                    <input data-input="pacient_lastname" name="fields[pacient_lastname][value]" class="input__field" id="nalogi-pacient_lastname" type="text" placeholder="Иванова">
                    <label class="input__label" for="nalogi-pacient_lastname">Фамилия пациента</label>
                    <span class="input__note input__note--invalid">Укажите фамилия пациента</span>
                </div>
            </div>
            <div class="input-group">
                <div class="input nalogi__input">
                    <input type="hidden" name="fields[pacient_midname][name]" value="Отчество пациента">
                    <input type="hidden" name="fields[pacient_midname][required]" value="true">
                    <input data-input="pacient_midname" name="fields[pacient_midname][value]" class="input__field" id="nalogi-pacient_midname" type="text" placeholder="Ивановна">
                    <label class="input__label" for="nalogi-pacient_midname">Отчество пациента</label>
                    <span class="input__note input__note--invalid">Укажите отчество пациента</span>
                </div>
                <div class="input nalogi__input">
                    <input type="hidden" name="fields[pacient_date][name]" value="Дата рождения">
                    <input type="hidden" name="fields[pacient_date][required]" value="true">
                    <input data-input="pacient_date" name="fields[pacient_date][value]" class="input__field" id="nalogi-pacient_date" type="date" data-placeholder="01.01.2024" aria-required="true">
                    <label class="input__label" for="nalogi-pacient_date">Дата рождения</label>
                    <span class="input__note input__note--invalid">Укажите дату рождения</span>
                </div>
                <div class="nalogi__input nalogi__input--buttons">
                    <button class="button nalogi__button nalogi__button--add" type="button">Добавить пациента</button>
                    <button class="button nalogi__button nalogi__button--delete" type="button">Удалить</button>
                </div>
            </div>
        </div>
        <p class="title">Документы</p>
        <div class="input-group">
            <!-- <div class="input nalogi__input nalogi__input--dogovor_copy">
                <input type="hidden" name="fields[dogovor_copy][name]" value="Нужна ли копия договора?">
                <div class="input__radio">
                    <label>
                        <input data-input="dogovor_copy" name="fields[dogovor_copy][value]" value="Да" class="input__field" id="nalogi-dogovor_copy" type="radio" placeholder="Ивановна">
                        Да
                    </label>
                    <label>
                        <input data-input="dogovor_copy" name="fields[dogovor_copy][value]" checked value="Нет" class="input__field" id="nalogi-dogovor_copy" type="radio" placeholder="Ивановна">
                        Нет
                    </label>
                </div>
                <label class="input__label" for="nalogi-dogovor_copy">Нужна ли копия договора?</label>
            </div> -->
            <div class="input nalogi__input">
                <input type="hidden" name="fields[dogovor_years][name]" value="За какой год планируется подавать документы?">
                <input type="hidden" name="fields[dogovor_years][required]" value="true">
                <div class="input__radio">
                    <label>
                        <input data-input="dogovor_years" name="fields[dogovor_years][value][]" value="2022" class="input__field" id="nalogi-dogovor_years" type="checkbox" placeholder="Ивановна">
                        2022
                        <span class="input__note input__note--invalid">Выберите за какой год планируете подавать документы</span>
                    </label>
                    <label>
                        <input data-input="dogovor_years" name="fields[dogovor_years][value][]" checked value="2023" class="input__field" id="nalogi-dogovor_years" type="checkbox" placeholder="Ивановна">
                        2023
                    </label>
                </div>
                <label class="input__label" for="nalogi-dogovor_years">За какой год планируете подавать документы? <span class="nalogi__required">*</span></label>
            </div>
            <div class="input nalogi__input nalogiPlace">
                <input type="hidden" name="fields[dogovor_place][name]" value="С какого филиала будете забирать документы?">
                <div class="input__radio">
                    <label>
                        <input data-input="dogovor_place" name="fields[dogovor_place][value]" checked value="Клиника на Георгия Бочарникова, 12/1 (мкр-н Губернский)" class="input__field" id="nalogi-dogovor_place_1" type="radio" placeholder="Ивановна">
                        На Георгия Бочарникова, 12/1
                    </label>
                    <label>
                        <input data-input="dogovor_place" name="fields[dogovor_place][value]" value="Клиника на Акад. Трубилина, 34 (мкр-н Юбилейный)" class="input__field" id="nalogi-dogovor_place_2" type="radio" placeholder="Ивановна">
                        На Акад. Трубилина, 34
                    </label>
                    <label>
                        <input data-input="dogovor_place" name="fields[dogovor_place][value]" value="Клиника на Домбайской, 59 (мкр-н Губернский)" class="input__field" id="nalogi-dogovor_place_3" type="radio" placeholder="Ивановна">
                        На Домбайской, 59
                    </label>
                </div>
                <label class="input__label" for="nalogi-dogovor_delivery">С какого филиала будете забирать документы?</label>
            </div>
            <!-- <div class="input nalogi__input">
                <input type="hidden" name="fields[dogovor_delivery][name]" value="Способ отправки документов?">
                <div class="input__radio">
                    <label>
                        <input  data-input="dogovor_delivery" name="fields[dogovor_delivery][value]"  value="по электронной почте" class="input__field" id="nalogi-dogovor_delivery" type="radio" placeholder="Ивановна">
                        по электронной почте
                    </label>
                    <label>
                        <input  data-input="dogovor_delivery" name="fields[dogovor_delivery][value]" checked value="заберу сам в клинике" class="input__field" id="nalogi-dogovor_delivery" type="radio" placeholder="Ивановна">
                        заберу сам в клинике
                    </label>
                </div>
                <label class="input__label" for="nalogi-dogovor_delivery">Выберите каким способом отправить для Вас пакет документов?</label>
            </div> -->
        </div>
        <p class="title">Контактные данные <span class="nalogi__required">*</span></p>
        <div class="input-group">
            <div class="input nalogi__input">
                <input type="hidden" name="fields[phone][name]" value="Номер телефона">
                <input type="hidden" name="fields[phone][required]" value="true">
                <input data-input="phone" name="fields[phone][value]" class="input__field" id="nalogi-tel" type="tel" placeholder="8 999 999 99 99">
                <label class="input__label" for="nalogi-tel">Ваш номер телефона</label>
                <span class="input__note input__note--invalid">Телефон указан неверно, пример: 8 999 999 99 99</span>
            </div>
            <div class="input nalogi__input">
                <input type="hidden" name="fields[email][name]" value="E-mail">
                <input type="hidden" name="fields[email][required]" value="true">
                <input data-input="email" name="fields[email][value]" class="input__field" id="nalogi-email" type="email" placeholder="nataly@mail.ru">
                <label class="input__label" for="nalogi-email">E-mail</label>
                <span class="input__note input__note--invalid">E-mail указан неверно, пример: nataly@mail.ru</span>
            </div>
        </div>
    </div>

    <div class="nalogi__form-footer">
        <p>Документы на налоговый вычет будут готовы в течении 14 дней</p>
    </div>

    <div class="nalogi__form-footer">
        <button class="button nalogi__button" type="submit">Отправить</button>
        <p class="nalogi__caption">
            Нажимая на кнопку «Отправить»<br />я даю согласие на обработку
            <a class="nalogi__caption-link" href="#">персональных данных</a>
        </p>
    </div>
</form>

<script>
    new Form({
        formID: "<?= $args["form_id"] ?>",
        classErrorInput: "input__field--invalid",
        reCAPTCHA_site_key: "<?= get_field('recaptcha_site_key', 'options') ?>"
    }).init()
</script>