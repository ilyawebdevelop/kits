<?php

function styles() {
  return '<style>
    body {
      font-family: "Forum", serif;
    }
    h2 {
      font-size: calc(20px + 10 * ((100vw - 375px) / 1545));
      margin: 0.83em 0;
      font-family: "Forum", serif;
    }
    .cws_widget_content {
      margin-top: 60px;
    }
    .cws_button {
      display: inline-block;
      padding: 11px 21px;
      font-size: 14px;
      line-height: 22px;
      border-width: 3px;
      border-style: solid;
      color: #fff;
      text-align: center;
      text-transform: uppercase;
      text-decoration: none;
      
      background-color: #7d9c9e;
      color: #fff;
      border-color: #7d9c9e;
      border-radius: 60px;
      font-family: "Forum", serif;
    }
    .cws_button:hover {
      color: #fff;
      border-color: #222222;
      background-color: #222222;
    }
    .cws_button.large {
      padding: 15px 25px;
      font-size: 18px;
      line-height: 24px;
    }

    /* FORM */
    .feedback__info {
      max-width: 600px;
      margin: 0 auto;
    }
    .input {
      display: flex;
      flex-direction: column;
      margin-bottom: 20px;
    }
    .input__label {
      font-size: calc(14px + 2 * ((100vw - 375px) / 1545));
      line-height: 1.61;
      font-weight: 400;
      font-family: "Gilroy", sans-serif;
      order: -1;
      opacity: 0.7;
      margin-bottom: 7px;
      letter-spacing: 0.02em;
      color: #828282;
      transition: all 0.2s ease;
    }
    .input__field.error ~ .input__label {
      color: #eb5757;
    }
    .input__field {
      margin: 0;
      padding: 0;
      background-image: none;
      background-color: transparent;
      box-shadow: none;
      border: none;
      outline: none;
      resize: none;
      transition: all 0.2s ease;
      font-size: calc(16px + 0 * ((100vw - 375px) / 1545));
      line-height: 1.75;
      font-weight: 400;
      font-family: "Gilroy", sans-serif;
      width: 100%;
      max-width: 100%;
      padding: 16px 14px 14px 16px;
      border: 1px solid #e0e0e0;
      border-radius: 2px;
      color: #222222;
      background-color: #ffffff;
      caret-color: #7d9c9e;
    }
    .input__field.error {
      border: 1px solid #eb5757;
      background: #ffffff url(../img/icons/icon-invalid.svg) no-repeat calc(100% - 16px) 50%;
    }
    textarea.input__field {
      padding-bottom: 26px;
    }
    .button {
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      background-color: transparent;
      transition: all 0.2s ease;
      cursor: pointer;
      display: inline-block;
      text-decoration: none;
      outline: none;
      color: inherit;
      transition: all 0.2s ease;
      font-size: calc(12px + 1 * ((100vw - 375px) / 1545));
      line-height: 1.1;
      font-weight: 500;
      font-family: "Gilroy", sans-serif;
      padding: 16px 28px;
      border-radius: 50px;
      color: #ffffff;
      background: #7d9c9e;
      letter-spacing: 0.02em;
      text-transform: uppercase;
      text-align: center;
    }
    .feedback__form-footer {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-top: 30px;
    }
    .feedback__info-title {
      margin: 0;
      padding: 0;
      font-size: calc(34px + 8 * ((100vw - 375px) / 1545));
      line-height: 1.1;
      font-weight: 400;
      font-family: "Forum", serif;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      color: #161615;
    }
    .feedback__info-text {
      margin: 0;
      padding: 0;
      font-size: calc(14px + 2 * ((100vw - 375px) / 1545));
      line-height: 1.67;
      font-weight: 400;
      font-family: "Gilroy", sans-serif;
      max-width: 400px;
      letter-spacing: 0.02em;
      color: #222222;
    }
    .feedback__form-content {
      max-width: 591px;
      margin-top: 30px;
    }
    .feedback__caption {
      margin: 0;
      padding: 0;
      font-size: calc(12px + 0 * ((100vw - 375px) / 1545));
      line-height: 1.6;
      font-weight: 400;
      font-family: "Gilroy", sans-serif;
      max-width: 285px;
      color: #828282;
    }

    #feedback {
      display: none;
    }
  </style>';
}

function formHTML() {
  return '<section id="feedback">
    <div class="feedback__info">
      <p class="feedback__info-title">НАПИСАТЬ РУКОВОДИТЕЛЮ</p>
      <p class="feedback__info-text">Смело пишите нам, мы рады любой обратной связи и ответим вам в течение рабочего дня</p>
      <form id="form" class="feedback__form" method="post" action="#" onsubmit="send()">
        <div class="feedback__form-content">
          <div class="input-group">
            <div class="input feedback__input">
              <input data-input="name" name="name" class="input__field" id="feedback-name" type="name" placeholder="Наталья">
              <label class="input__label" for="feedback-name">Ваше имя</label>
            </div>
            <div class="input feedback__input">
              <input data-input="phone" name="phone" class="input__field" id="feedback-tel" type="tel" placeholder="8 999 999 99 99">
              <label class="input__label" for="feedback-tel">Ваш номер телефона</label>
            </div>
          </div>
          <div class="input feedback__input">
            <textarea data-input="feedback" name="message" class="input__field" id="feedback-message" placeholder="Сообщение" rows="2"></textarea>
            <label class="input__label" for="feedback-message">Текст сообщения</label>
          </div>
        </div>
        <div class="feedback__form-footer">
          <button class="button feedback__button" type="submit">Отправить</button>
          <p class="feedback__caption">Нажимая на кнопку «Отправить» я даю согласие на обработку <a class="feedback__caption-link" href="#">персональных данных</a></p>
        </div>
      </form>
    </div>
  </section>';
}

function formScript() {
  return '<script>send = async function() {
    window.event.preventDefault();

    let response = await fetch("", {
      method: "POST",
      body: new FormData(form)
    });

    let result = await response.json();

    if (result.status == "fail") {
      let input = form.querySelector(".input__field[name=\'"+result.error.name+"\']");
      console.log(input)
      if (input)
        input.classList.add("error");
    } else {
      feedback.remove();
      feedbackSuccess.style.display = "block";
    }
  }</script>';
}

function formSend() {
  if (empty($_POST)) return;

  try {
    if (empty($_POST['name'])) {
      throw new Exception(json_encode(array('name' => 'name', 'text' => 'Введите имя')));
    }
    if (empty($_POST['phone'])) {
      throw new Exception(json_encode(array('name' => 'phone', 'text' => 'Введите телефон')));
    }
    if (empty($_POST['message'])) {
      throw new Exception(json_encode(array('name' => 'message', 'text' => 'Введите сообщение')));
    }

    $toAll = array(
      // To
      'dr.levon@mail.ru',
      // Bcc
      'GaUniQue@yandex.ru'
    );

    $subject = "Письмо руководителю";

    $message = '<h1>Письмо руководителю</h1>
    <p>Имя: ' . $_POST['name'] . '</p>
    <p>Телефон: ' . $_POST['phone'] . '</p>
    <p>Сообщение: ' . $_POST['message'] . '</p>';

    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
    $headers .= "From: PRO.Зубы - Письмо руководителю <mail@prozuby23.ru>\r\n";
    // $headers .= 'Bcc: ' . $bcc . "\r\n";

    foreach($toAll as $to) {
      mail($to, $subject, $message, $headers);
    }

    $result = array(
      'message' => 'Спасибо!',
      'status' => 'ok'
    );
  } catch (Exception $e) {
    $result = array(
      'error' => json_decode($e->getMessage(), true),
      'status' => 'fail'
    );
  }

  die(json_encode($result));
}

function formSuccess() {
  return '<section id="feedbackSuccess" style="display:none;max-width: 600px;margin: 0 auto;">
    <p class="feedback__info-title">Ваше сообщение отправлено руководителю</p>
    <p class="feedback__info-text">Ожидайте, скоро с вами свяжутся!</p>
  </section>';
}

function buttonsHTML($link) {
  return '<section id="buttons" class="cws_widget_content">
    <h2 style="text-align: center;">Оцените ваш прием</h2>
    <p>&nbsp;</p>
    <p style="text-align: center;"><a href="' . $link . '" target="_blank" class="cws_button large custom_color">ОТЛИЧНО</a></p>
    <p style="text-align: center;"><a href="' . $link . '" target="_blank" class="cws_button large custom_color">ХОРОШО</a></p>
    <p style="text-align: center;"><a href="javascript:void(0)" class="cws_button large custom_color" onclick="buttons.remove();feedback.style.display = \'block\'">ПРИЕМЛЕМО</a></p>
    <p style="text-align: center;"><a href="javascript:void(0)" class="cws_button large custom_color" onclick="buttons.remove();feedback.style.display = \'block\'">ПЛОХО</a></p>
    <p style="text-align: center;"><a href="javascript:void(0)" class="cws_button large custom_color" onclick="buttons.remove();feedback.style.display = \'block\'">УЖАСНО</a></p>
  </section>';
}