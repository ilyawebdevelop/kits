<div class="overlay overlay--header"></div>
    <header class="header<?=is_front_page()?" header--main": "";?>">
      <div class="page__container">
        <div class="header__content">
          <div class="header__left">
            <div class="burger header__burger"><span class="burger__line"></span></div>
            <!--  -->
            <?JRender::viewTopMenu();?>
            
            <div class="social header__social">
              <ul class="social__list">
                <?if($vk = clinic()["socials"]["vk"]):?>
                  <li class="social__item"><a class="social__link" href="<?=$vk?>" target="_blank" aria-label="Вконтакте">
                      <svg class="social__link-icon" width="16" height="16">
                        <use xlink:href="#icon-vk"></use>
                    </svg></a></li>
                <?endif;?>
                <?if($facebook = clinic()["socials"]["facebook"]):?>
                <li class="social__item"><a class="social__link" href="<?=$facebook?>" target="_blank" aria-label="Facebook">
                    <svg class="social__link-icon" width="16" height="16">
                      <use xlink:href="#icon-facebook"></use>
                    </svg></a></li>
                <?endif;?>
                <?if($instagram = clinic()["socials"]["instagram"]):?>
                <li class="social__item"><a class="social__link" href="<?=$instagram?>" target="_blank" aria-label="Instagram">
                    <svg class="social__link-icon" width="16" height="16">
                      <use xlink:href="#icon-instagram"></use>
                    </svg></a></li>

                <?endif;?>
                <?if($youtube = clinic()["socials"]["youtube"]):?>
                <li class="social__item"><a class="social__link" href="<?=$youtube?>" target="_blank" aria-label="Youtube">
                    <svg class="social__link-icon" width="20" height="14">
                      <use xlink:href="#icon-youtube"></use>
                    </svg></a></li>
                <?endif;?>
              </ul>
            </div>
          </div>
          <div class="header__center">
              <a class="logo header__logo" href="/">
                <img class="logo__image logo__image--light" width="118" height="79" src="<?=get_template_directory_uri()?>/app/img/icons/icon-logo-light.png" alt="Логотип компании PRO. зубы"><img class="logo__image logo__image--dark" width="118" height="79" src="<?=get_template_directory_uri()?>/app/img/icons/icon-logo-dark.png" alt="Логотип компании PRO. зубы"></a></div>
          <div class="header__right">
            <div class="header__special">
              <a class="specialButton" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" style="cursor: pointer;">
                <?=file_get_contents(get_template_directory_uri() . '/app/img/icons/special.svg')?>
              </a>
            </div>
            <div class="header__call">
              <?if($phone = clinic()["phone"]):?>
                <a class="header__call-link" href="tel:<?=preg_replace("/[^+0-9]/", '', $phone);?>">
                <span><?=$phone;?></span>
                <svg class="header__call-link-icon" width="19" height="19">
                  <use xlink:href="#icon-phone"></use>
                </svg>
              </a>
              <?endif;?>
              <button class="header__call-button tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-ajax-url="<?=CALL;?>" 
                data-param-title="Обратный звонок"
                type="button"
              >Обратный звонок</button>
            </div>

            <div class="header__location"><span class="header__location-current"><?=clinic()["text-head"]?></span>
              <button class="header__location-change tm-trigger" 
                data-tm-modal="ajax-choice-clinic"
                data-ajax-url="<?=CHOICE_CLINIC;?>" type="button">Изменить клинику</button>
            </div>
            <div class="header__appointment">
              <button class="button button--clear header__appointment-button tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>"  type="button">Записаться на прием</button>
            </div>
          </div>
        </div>
      </div>
    </header>