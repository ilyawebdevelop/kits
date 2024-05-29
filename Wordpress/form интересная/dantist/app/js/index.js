"use strict";

TomloprodModal.start({
  closeOnOverlay: true,
  removeOverlay: false,
  showMessages: false,
});

TomloprodModal.registerHandler("opened", function () {
  if (TomloprodModal.modal.id === 'ajax-appointment') {
      const isBookingForm = Boolean(TomloprodModal.modal.querySelector('[data-booking-form]'))
      if (isBookingForm && typeof window.onlineBooking !== 'undefined') {
          TomloprodModal.closeModal()
          onlineBooking.open()
      }
  }
});

refreshFsLightbox();

// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

document.addEventListener('DOMContentLoaded', () => {
  (function () {
    // Init team slider
    const teamSlider = document.querySelector('.team__container');

    if (teamSlider) {
      new Swiper(teamSlider, {
        slidesPerView: 1.32,
        spaceBetween: 30,
        breakpoints: {
          576: {
            slidesPerView: 1.6,
            spaceBetween: 40
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 40
          },
          1024: {
            slidesPerView: 2.4,
            spaceBetween: 40
          },
          1200: {
            slidesPerView: 2.8,
            spaceBetween: 60
          },
          1440: {
            slidesPerView: 3.38,
            spaceBetween: 60
          },
          1921: {
            slidesPerView: 4,
            spaceBetween: 60
          }
        },
        navigation: {
          prevEl: '.team__button-prev',
          nextEl: '.team__button-next'
        },
        grabCursor: true,
        watchOverflow: true,
      });
    }
  })();

  (function () {
    // Init reviews block slider
    const reviewsBlockSlider = document.querySelector('.reviews-block__container');

    if (reviewsBlockSlider) {
      new Swiper(reviewsBlockSlider, {
        slidesPerView: 1.32,
        spaceBetween: 30,
        breakpoints: {
          576: {
            slidesPerView: 1.6,
            spaceBetween: 40
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 40
          },
          1024: {
            slidesPerView: 2.4,
            spaceBetween: 40
          },
          1200: {
            slidesPerView: 2.8,
            spaceBetween: 60
          },
          1440: {
            slidesPerView: 3.38,
            spaceBetween: 60
          },
          1921: {
            slidesPerView: 4,
            spaceBetween: 60
          }
        },
        navigation: {
          prevEl: '.reviews-block__button-prev',
          nextEl: '.reviews-block__button-next'
        },
        grabCursor: true,
        loop: true
      });
    }
  })();

  (function () {
    // Init stocks block slider
    const stocksBlockSlider = document.querySelector('.stocks-block__container');

    if (stocksBlockSlider) {
      new Swiper(stocksBlockSlider, {
        slidesPerView: 1,
        navigation: {
          prevEl: '.stocks-block__button--prev',
          nextEl: '.stocks-block__button--next'
        },
        grabCursor: true,
        loop: true
      });
    }
  })();

  (function () {
    // Init works slider
    const worksSlider = document.querySelector('.works__container');

    if (worksSlider) {
      const currentSlide = document.querySelector('.works__current');

      const addZero = number => number > 9 ? number : "0".concat(number);

      const slider = new Swiper(worksSlider, {
        slidesPerView: 1.32,
        spaceBetween: 30,
        breakpoints: {
          576: {
            slidesPerView: 1.8,
            spaceBetween: 40
          },
          1024: {
            slidesPerView: 1.2,
            spaceBetween: 30
          },
          1200: {
            slidesPerView: 1.4,
            spaceBetween: 30
          },
          1440: {
            slidesPerView: 1.69,
            spaceBetween: 30
          },
          1600: {
            slidesPerView: 1.69,
            spaceBetween: 60
          },
          1921: {
            slidesPerView: 2,
            spaceBetween: 40
          }
        },
        navigation: {
          prevEl: '.works__button-prev',
          nextEl: '.works__button-next'
        },
        grabCursor: true,
        loop: true
      });
      slider.on('slideChange', () => {
        currentSlide.innerHTML = addZero(slider.realIndex + 1);
      });
    }
  })();

  (function () {
    // Init education slider
    const educationSlider = document.querySelector('.education__container');

    if (educationSlider) {
      const currentSlide = document.querySelector('.education__current');

      const addZero = number => number > 9 ? number : "0".concat(number);

      const slider = new Swiper(educationSlider, {
        slidesPerView: 1,
        navigation: {
          prevEl: '.education__button--prev',
          nextEl: '.education__button--next'
        },
        grabCursor: true,
        loop: true
      });
      slider.on('slideChange', () => {
        currentSlide.innerHTML = addZero(slider.realIndex + 1);
      });
    }
  })();

  (function () {
    // Init blog slider
    const blogSliderContainer = document.querySelector('.blog--slider');

    if (blogSliderContainer) {
      const blogSlider = blogSliderContainer.querySelector('.blog__container');

      if (blogSlider) {
        new Swiper(blogSlider, {
          slidesPerView: 1.32,
          spaceBetween: 30,
          breakpoints: {
            577: {
              slidesPerView: 1.8,
              spaceBetween: 30
            },
            769: {
              slidesPerView: 2.5,
              spaceBetween: 30
            },
            1025: {
              slidesPerView: 2,
              spaceBetween: 50
            },
            1920: {
              slidesPerView: 2,
              spaceBetween: 94
            }
          },
          navigation: {
            prevEl: '.blog__button-prev',
            nextEl: '.blog__button-next'
          },
          grabCursor: true,
          loop: true
        });
      }
    }
  })();

  (function () {
    // Init gallery slider
    const gallerySlider = document.querySelector('.gallery__container');

    if (gallerySlider) {
      new Swiper(gallerySlider, {
        slidesPerView: 1.33,
        spaceBetween: 25,
        breakpoints: {
          576: {
            slidesPerView: 1.6,
            spaceBetween: 30
          },
          768: {
            slidesPerView: 1.8,
            spaceBetween: 40
          },
          1024: {
            slidesPerView: 2.2,
            spaceBetween: 40
          },
          1440: {
            slidesPerView: 2.47,
            spaceBetween: 60
          },
          1921: {
            slidesPerView: 3,
            spaceBetween: 40
          }
        },
        navigation: {
          prevEl: '.gallery__button-prev',
          nextEl: '.gallery__button-next'
        },
        grabCursor: true,
        loop: true
      });
    }
  })();

  (function () {
    // Init prices slider
    const pricesSlider = document.querySelector('.prices__container');

    if (pricesSlider) {
      new Swiper(pricesSlider, {
        slidesPerView: 'auto',
        spaceBetween: 0,
        navigation: {
          prevEl: '.prices__button-prev',
          nextEl: '.prices__button-next'
        },
        loop: true,
        slideToClickedSlide: true
      });
    }
  })();

  (function () {
    // Promo video behavior
    const backgroundVideo = document.querySelector('.promo__video');

    if (backgroundVideo) {
      const playButton = document.querySelector('.promo__button-play');
      playButton.addEventListener('click', () => {
        backgroundVideo.pause();
      });

      fsLightboxInstances['promo'].props.onClose = () => backgroundVideo.play();
    }
  })();

  // (function () {
  //   // Change header with scroll
  //   const header = document.querySelector('header');

  //   if (header) {
  //     let lastScrollTop = 0;
  //     document.addEventListener("scroll", () => {
  //       let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  //       if (scrollTop > 0) {
  //         header.classList.add('scroll');
  //       } else {
  //         header.classList.remove('scroll');
  //       }

  //       if (scrollTop < lastScrollTop) {
  //         header.style.top = '0';
  //       } else if (scrollTop > lastScrollTop) {
  //         header.style.top = '-100%';
  //       }

  //       lastScrollTop = scrollTop;
  //     });
  //   }
  // })();

  (function () {
    // Change header with scroll
    const header = document.querySelector('header');

    if (header) {
      let lastScrollTop = 0;
      document.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > header.scrollHeight) {
          header.classList.add('scroll');
        } else {
          header.classList.remove('scroll');
        }

        if (scrollTop > header.scrollHeight - 2) {
          if (scrollTop < lastScrollTop) {
            header.style.transform = 'translateY(0)';
          } else if (scrollTop > lastScrollTop) {
            header.style.transform = 'translateY(-200%)';
          }
        } else {
          header.style.transform = '';
        }

        lastScrollTop = scrollTop;
      });
    }
  })();

  (function () {
    // Open mobile menu
    const burgerButton = document.querySelector('.burger');
    const menu = document.querySelector('.menu');

    if (burgerButton && menu) {
      const ESC_KEYCODE = 27;
      const header = document.querySelector('header');
      const body = document.querySelector('body');
      const overlay = document.querySelector('.overlay--header');
      const extraServiceLists = menu.parentElement.querySelectorAll('.menu-right__sublist');
      let isPageScrolled;

      const openMenu = () => {
        isPageScrolled = header.classList.contains('scroll');
        burgerButton.classList.add('show');
        menu.classList.add('show');
        overlay.classList.add('show');
        header.classList.remove('scroll');
        body.classList.add('no-scroll', 'open-menu');
        burgerButton.addEventListener('click', closeMenu);
        burgerButton.removeEventListener('click', openMenu);
        overlay.addEventListener('click', closeMenu);
        document.addEventListener('keydown', onEscPress);
      };

      const closeMenu = () => {
        burgerButton.classList.remove('show');
        menu.classList.remove('show', 'services-menu');
        extraServiceLists.forEach(extraServiceList => {
          extraServiceList.classList.remove('show');
        });
        overlay.classList.remove('show');
        isPageScrolled && header.classList.add('scroll');
        body.classList.remove('no-scroll', 'open-menu');
        burgerButton.removeEventListener('click', closeMenu);
        burgerButton.addEventListener('click', openMenu);
        overlay.removeEventListener('click', closeMenu);
        document.removeEventListener('keydown', onEscPress);
      };

      const onEscPress = evt => {
        if (evt.keyCode === ESC_KEYCODE) {
          closeMenu();
        }
      };

      burgerButton.addEventListener('click', openMenu);
    }
  })();

  (function () {
    // Open services menu
    const openServicesButton = document.querySelector('.show-services-menu');
    const menu = document.querySelector('.menu');
    const closeServicesButton = document.querySelector('.close-services-menu');

    if (openServicesButton && menu && closeServicesButton) {
      openServicesButton.addEventListener('click', evt => {
        evt.preventDefault();
        menu.classList.add('services-menu');
      });
      closeServicesButton.addEventListener('click', evt => {
        evt.preventDefault();
        menu.classList.remove('services-menu');
      });
    }
  })();

  (function () {
    // Open extra services menu
    const openExtraServicesButtons = document.querySelectorAll('.show-extra-menu');

    if (openExtraServicesButtons) {
      openExtraServicesButtons.forEach(openExtraServicesButton => {
        const extraServiceList = openExtraServicesButton.parentElement.querySelector('.menu-right__sublist');
        const closeExtraServiceButton = extraServiceList.querySelector('.close-extra-menu');
        openExtraServicesButton.addEventListener('click', evt => {
          evt.preventDefault();
          extraServiceList.classList.add('show');
        });
        closeExtraServiceButton.addEventListener('click', evt => {
          evt.preventDefault();
          extraServiceList.classList.remove('show');
        });
      });
    }
  })();

  (function () {
    // Open privacy popup
    const privacyPopup = document.querySelector('.privacy-popup');

    if (privacyPopup) {
      const ESC_KEYCODE = 27;
      const closeButton = privacyPopup.querySelector('.popup__button-close');
      const openButtons = document.querySelectorAll('.show-privacy-popup');
      const overlay = document.querySelector('.overlay--popup');
      const body = document.querySelector('body');

      const openPopup = evt => {
        evt.preventDefault();
        overlay.classList.add('show');
        privacyPopup.classList.add('show');
        body.classList.add('no-scroll');
        closeButton.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);
        document.addEventListener('keydown', onEscPress);
      };

      const closePopup = () => {
        overlay.classList.remove('show');
        privacyPopup.classList.remove('show');
        body.classList.remove('no-scroll');
        closeButton.removeEventListener('click', closePopup);
        overlay.removeEventListener('click', closePopup);
        document.removeEventListener('keydown', onEscPress);
      };

      const onEscPress = evt => {
        if (evt.keyCode === ESC_KEYCODE) {
          closePopup();
        }
      };

      if (openButtons && overlay) {
        openButtons.forEach(openButton => {
          openButton.addEventListener('click', openPopup);
        });
      }
    }
  })();

  (function () {
    // Open review popup
    const reviewPopup = document.querySelector('.review-popup');

    if (reviewPopup) {
      const ESC_KEYCODE = 27;
      const closeButton = reviewPopup.querySelector('.popup__button-close');
      const openButtons = document.querySelectorAll('.show-review-popup');
      const overlay = document.querySelector('.overlay--popup');
      const body = document.querySelector('body');

      const openPopup = evt => {
        evt.preventDefault();
        overlay.classList.add('show');
        reviewPopup.classList.add('show');
        body.classList.add('no-scroll');
        closeButton.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);
        document.addEventListener('keydown', onEscPress);
      };

      const closePopup = () => {
        overlay.classList.remove('show');
        reviewPopup.classList.remove('show');
        body.classList.remove('no-scroll');
        closeButton.removeEventListener('click', closePopup);
        overlay.removeEventListener('click', closePopup);
        document.removeEventListener('keydown', onEscPress);
      };

      const onEscPress = evt => {
        if (evt.keyCode === ESC_KEYCODE) {
          closePopup();
        }
      };

      if (openButtons && overlay) {
        openButtons.forEach(openButton => {
          openButton.addEventListener('click', openPopup);
        });
      }
    }
  })();

  (function () {
    // Open feedback popup
    const feedbackPopup = document.querySelector('.feedback-popup');

    if (feedbackPopup) {
      const ESC_KEYCODE = 27;
      const closeButton = feedbackPopup.querySelector('.popup__button-close');
      const openButtons = document.querySelectorAll('.show-feedback-popup');
      const overlay = document.querySelector('.overlay--popup');
      const body = document.querySelector('body');

      const openPopup = evt => {
        evt.preventDefault();
        overlay.classList.add('show');
        feedbackPopup.classList.add('show');
        body.classList.add('no-scroll');
        closeButton.addEventListener('click', closePopup);
        overlay.addEventListener('click', closePopup);
        document.addEventListener('keydown', onEscPress);
      };

      const closePopup = () => {
        overlay.classList.remove('show');
        feedbackPopup.classList.remove('show');
        body.classList.remove('no-scroll');
        closeButton.removeEventListener('click', closePopup);
        overlay.removeEventListener('click', closePopup);
        document.removeEventListener('keydown', onEscPress);
      };

      const onEscPress = evt => {
        if (evt.keyCode === ESC_KEYCODE) {
          closePopup();
        }
      };

      if (openButtons && overlay) {
        openButtons.forEach(openButton => {
          openButton.addEventListener('click', openPopup);
        });
      }
    }
  })();

  (function () {
    // Add indents to sections depends on header
    const header = document.querySelector('header');
    const body = document.querySelector('body');
    const promo = document.querySelector('.promo');

    const addIndents = () => {
      const headerHeight = header.clientHeight;
      body.style.marginTop = "".concat(headerHeight, "px");
      promo && (promo.style.marginTop = "-".concat(headerHeight, "px"));
    };

    addIndents();
    window.addEventListener('resize', addIndents);
  })(); // Show more eduction section


  (function () {
    const eductionSections = document.querySelectorAll('.education');

    if (eductionSections) {
      eductionSections.forEach(eductionSection => {
        const showMoreButton = eductionSection.querySelector('.education__button-more');
        const textContainer = eductionSection.querySelector('.education__info-content--more');

        if (showMoreButton && textContainer) {
          showMoreButton.addEventListener('click', evt => {
            evt.preventDefault();
            textContainer.style.height = "".concat(textContainer.scrollHeight, "px");
            textContainer.classList.add('show');
            showMoreButton.remove();
          });
        }
      });
    }
  })(); // Show more info block section


  (function () {
    const infoBlockSections = document.querySelectorAll('.info-block');

    if (infoBlockSections) {
      infoBlockSections.forEach(infoBlockSection => {
        const showMoreButton = infoBlockSection.querySelector('.info-block__button-more');
        const textContainer = infoBlockSection.querySelector('.info-block__text-content');

        if (showMoreButton && textContainer) {
          showMoreButton.addEventListener('click', evt => {
            evt.preventDefault();
            textContainer.style.height = "".concat(textContainer.scrollHeight, "px");
            textContainer.classList.add('show');
            showMoreButton.remove();
          });
        }
      });
    }
  })();

  // Select
  (function () {
    const selects = document.querySelectorAll('.select');

    if (selects) {
      const ACTIVE_CLASS = 'show-list';
      selects.forEach(select => {
        const selectButton = select.querySelector('.select__list-button');
        const selectField = select.querySelector('.select__search-field');
        const selectList = select.querySelector('.select__list');

        const onDocumentClickClose = evt => {
          if (evt.target === select || select.contains(evt.target)) {
            return;
          }

          closeSelect();
        };

        const openSelect = () => {
          select.classList.add(ACTIVE_CLASS);
          document.addEventListener('click', onDocumentClickClose);
        };

        const closeSelect = () => {
          select.classList.remove(ACTIVE_CLASS);
          document.removeEventListener('click', onDocumentClickClose);
        };

        selectButton.addEventListener('click', () => {
          if (select.classList.contains(ACTIVE_CLASS)) {
            closeSelect();
          } else {
            openSelect();
          }
        });
        selectList.addEventListener('click', evt => {
          const selectedOption = evt.target.textContent;
          selectField.value = selectedOption;
          closeSelect();
        });
        selectField.addEventListener('focus', () => {
          openSelect();
        });
      });
    }
  })();

  refreshFsLightbox();
});
