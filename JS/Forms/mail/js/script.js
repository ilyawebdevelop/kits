// presentation-slider
const presentationSlider = document.querySelector('.presentation-slider');
var mySwiperPresentation = new Swiper(presentationSlider, {
  slidesPerView: 2,
  spaceBetween: 40,
  navigation: {
    nextEl: '.presentation .nav-arrow-next',
    prevEl: '.presentation .nav-arrow-prev',
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },     
    992: {
      slidesPerView: 2,     
    },  
  },
});


// Burger
const btnMenu = document.querySelector('#toggle');
let btnMenuClose = document.querySelector('.btn-close');
const menu = document.querySelector('.header__nav');
const bodyEl = document.querySelector('body');
let navItemAll = document.querySelectorAll('.header__nav-list li a');

const menuLine1 = document.querySelector('.top-bun');
const menuLine2 = document.querySelector('.meat');
const menuLine3 = document.querySelector('.bottom-bun');

const toggleMenu = function () {
  menu.classList.toggle('open');
}
const toggleBurger = function () {
  btnMenu.classList.toggle('active');
}
const bodyOverflow = function () {
  bodyEl.classList.toggle('hidden');
}

const toggleMenuLine = function () {
  menuLine1.classList.toggle('active');
  menuLine2.classList.toggle('active');
  menuLine3.classList.toggle('active');
}

btnMenu?.addEventListener('click', function (e) {
  e.stopPropagation();
  toggleMenu();
  toggleBurger();
  bodyOverflow();
  toggleMenuLine();
});
btnMenuClose.addEventListener('click', function (e) {
  e.stopPropagation();
  toggleMenu();
  toggleBurger();
  bodyOverflow();
  toggleMenuLine();
});

// close menu in Landing page
$(document).on("click", ".header__nav-list li a", function (e) {
  $('.header__nav').removeClass('open');
  $('body').removeClass('hidden');
  // $('#nav-icon3').removeClass('open');
});


let pricesBlock = document.querySelector('#prices');
// Плавная прокрутка к якорю   

if(pricesBlock){
  $(document).on("click", ".arrow-wrapper", function (e) {
    e.preventDefault();
  
    var id = $(this).attr('href');
  
    var top = $(id).offset().top; // получаем координаты блока
    $('body, html').animate({ scrollTop: top - 150 }, 800); // плавно переходим к блоку
  });
}



// Header fixed
var fixed_top = $("header");
$(window).on('scroll', function () {
  if ($(this).scrollTop() > 100) {
    fixed_top.addClass("sticky-bar animated fadeInDown");
  } else {
    fixed_top.removeClass("sticky-bar animated fadeInDown");
  }
});