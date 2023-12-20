console.log('Init!');

// let inputs = document.querySelectorAll('input[type="tel"]');
// let im = new Inputmask('+7 (999) 999-99-99');
// im.mask(inputs);

// inputmask
const form = document.querySelectorAll('.form');
let successEl = document.querySelector('.success');


// function successText() {
//   successEl.style.display = 'block';
// }



const validation_1 = new JustValidate('.form_1');
const validation_2 = new JustValidate('.form_2');
const validation_3 = new JustValidate('.form_3');



validation_1
  .addField('.form-tel', [
    {
      rule: 'required',
      value: true, 
      errorMessage: 'Заполните телефон',
    },
    {
      rule: 'minNumber',
      value: 3,
      errorMessage: 'Введите корректный номер',
    },

  ]).onSuccess((event) => {
    console.log('Validation passes and form submitted', event);

    let formData = new FormData(event.target);

    console.log(...formData);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log('Отправлено');
          // successText();
          location.href = 'https://xn----7sbnekcnb5bky.xn--p1ai/thanks.html';
        }
      }
    }

    xhr.open('POST', 'mail.php', true);
    xhr.send(formData);

    event.target.reset();
  });

  validation_2
  .addField('.modal-name', [
    {
      rule: 'minLength',
      value: 3,
      errorMessage: 'Введите минимум 3 буквы'
    },
    {
      rule: 'maxLength',
      value: 30,
    },
    {
      rule: 'required',
      value: true,
      errorMessage: 'Заполните имя'
    }
  ])
  .addField('.modal-tel', [
    {
      rule: 'required',
      value: true, 
      errorMessage: 'Заполните телефон',
    },
    {
      rule: 'minNumber',
      value: 3,
      errorMessage: 'Введите корректный номер',
    },

  ]).onSuccess((event) => {
    console.log('Validation passes and form submitted', event);

    let formData = new FormData(event.target);

    console.log(...formData);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log('Отправлено');
          // successText();
          location.href = 'https://xn----7sbnekcnb5bky.xn--p1ai/thanks.html';
        }
      }
    }

    xhr.open('POST', 'mail.php', true);
    xhr.send(formData);

    event.target.reset();
  });


  validation_3
  .addField('.callback-tel', [
    {
      rule: 'required',
      value: true, 
      errorMessage: 'Заполните телефон',
    },
    {
      rule: 'minNumber',
      value: 3,
      errorMessage: 'Введите корректный номер',
    },

  ]).onSuccess((event) => {
    console.log('Validation passes and form submitted', event);

    let formData = new FormData(event.target);

    console.log(...formData);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log('Отправлено');
          // successText();
          location.href = 'https://xn----7sbnekcnb5bky.xn--p1ai/thanks.html';
        }
      }
    }

    xhr.open('POST', 'mail.php', true);
    xhr.send(formData);

    event.target.reset();
  });
