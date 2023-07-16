<div id="review-popup" class="popup popup-review">
    <div class="popup__title">
        <h3 class="popup__head">Оставить отзыв</h3>
    </div>
    {form class="reviews-form" method="POST" onsubmit="return JSmart.AjaxForm(event, this);"}
    <div class="form-item">
        <input type="text" name="form[r_name]" class="form-field _medium" placeholder="Ваше имя" data-required required>
    </div>
    <div class="form-item">
        <input type="tel" name="form[r_phone]" class="form-field _medium" placeholder="Ваш номер телефона" data-required required>
    </div>

    <!-- <div class="form-item">
        <div class="field__wrapper">
            <input name="form[r_file]" type="file" id="field__file-2" class="field field__file" value="{r_file}">
            <label class="field__file-wrapper" for="field__file-2">
                <div class="field__file-fake">
                    Файл
                </div>
                <div class="field__file-button">
                    <img src="{template}/assets/images/reviews/add.svg" alt="">
                </div>
            </label
        </div>
    </div> -->

    <div class="form-item">
        <span style="border: 1px solid grey; padding: 5px;" data-form-file="r_file">Выбор файла</span>
        <input type="hidden" name="form[r_file]" value="{r_file}">
    </div>



    <div class="form-item">
        <textarea class="form-field _medium long" name="form[r_comment]" id="reviews-text" cols="30" placeholder="Ваш отзыв" rows="10" data-required required></textarea>

    </div>
    <input type="hidden" name="form_reviews" value="1">
    <button class="btn _medium">Отправить отзыв</button>
    <div class="agreement">   
        <div class="agreement__item">
            <input type="checkbox" id="personal" checked required>
            <label for="personal">
                <span class="rect"></span>
                <div class="agreement__text">
                    Согласен с <a href="/politika-konfidencialnosti" target="_blank">политикой обработки персональных данных</a>
                </div>
            </label>
        </div>
    </div>
    {/form}
    <button title="Закрыть" class="close-btn ic ic-close review-close-btn"></button>
</div>

<style>
    #review-popup textarea::placeholder {
        color: #959a9b;
    }
    #review-popup .btn {
        margin-bottom: 15px;
    }
	.agreement__text {
		font-size: 14px;
	}
	.agreement__item {
		display: flex;
		gap: 7px;
	}
	.agreement__item input {
		height: fit-content;
		position: relative;
		top: 3px;
		width: 18px;
		min-width: 18px;
    height: 16px;
	}
    .form-item {
        margin-bottom: 10px!important;
    }
</style>