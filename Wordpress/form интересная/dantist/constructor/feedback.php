<section class="feedback">
    <div class="page__container">
        <div class="feedback__content">
            <div class="feedback__info">
                <p class="feedback__info-title">Возникли вопросы?</p>
                <p class="feedback__info-text">Смело пишите нам, мы рады любой обратной связи и ответим вам в течение
                    рабочего дня</p>
                    <?JForm::form("have-questions", [
                        "title" => "Возникли вопросы?",
                        "page" => "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]
                    ]);?>
            </div>
            <div class="feedback__tour">
                <div class="feedback__tour-image-wrap">
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUynWgNtD" width="100%" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                    <!-- <img class="feedback__tour-image" src="<?= get_template_directory_uri() ?>/app/img/feedback-tour.jpg"
                        alt=""> -->
                    </div>
                <p class="feedback__tour-text">Посетите нашу клинику прямо сейчас с помощью 3D Тура</p>
            </div>
            <a class="feedback__general-link tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>"><span class="title title--h5">Записаться на прием
                <svg class="feedback__general-icon-arrow" width="56" height="35">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg>
                <svg class="feedback__general-icon-ellipse" width="77" height="52">
                    <use xlink:href="#icon-ellipse"></use>
                </svg></span>
            </a>
        </div>
    </div>
</section>