<footer class="footer">
    <div class="top-footer">
        <div class="page__container">
            <div class="top-footer__content">
                <div class="top-footer__logo">
                    <a class="top-footer__logo-link" href="/">
                        <img class="top-footer__logo-image"
                            src="<?=get_template_directory_uri()?>/app/img/icons/icon-logo-footer.png"
                            alt="Логотип компании PRO. зубы">
                    </a>
                </div>
                <p class="top-footer__text">Регулярные стоматологические профосмотры помогают выявить ранние признаки
                    многих проблем со здоровьем. Регулярно посещайте своих стоматологов и оставайтесь здоровыми.</p>
            </div>
        </div>
    </div>
    <div class="middle-footer">
        <div class="page__container">
            <div class="middle-footer__content">
                <div class="navigation middle-footer__navigation">
                    <ul class="navigation__list">
                        <li class="navigation__item">
                            <input class="navigation__item-checkbox visually-hidden" id="nav-1" type="checkbox"
                                name="nav">
                            <label class="navigation__item-name navigation__item-name--group" for="nav-1">Контакты
                                <svg class="navigation__item-icon" width="16" height="16">
                                    <use xlink:href="#icon-arrow-down"></use>
                                </svg>
                            </label>
                            <div class="navigation__sublist navigation__sublist--group">
                                <div class="navigation__sublist-wrap">
                                    <p class="navigation__item-name">Адреса:</p>
                                    <?php foreach(clinics() as $clinic): ?>
                                    <ul class="navigation__sublist">
                                        <?if($title = $clinic["title"]):?>
                                        <li class="navigation__sublist-item"><strong><?=$title;?></strong></li>
                                        <?endif;?>
                                        <?if($address = $clinic["contacts"]["address"]):?>
                                        <li class="navigation__sublist-item"><?=$address;?></li>
                                        <?endif;?>
                                        <?if($workTimes = $clinic["contacts"]["work-times"]):
										foreach($workTimes as $work): ?>
										<li class="navigation__sublist-item"><?=$work["t"]?></li>
										<? endforeach; ?>
										<li class="navigation__sublist-item">
											<a href="tel:+78612123717">+7 (861) 212-37-17</a>
										</li>
									  	<? endif; ?>
                                    </ul>
                                    <?php endforeach ?>
                                </div>
                                <div class="navigation__sublist-wrap navigation__sublist-wrap--desktop">
                                    <p class="navigation__item-name">Свяжитесь с нами</p>
                                    <ul class="navigation__sublist">
                                        <?if($phone = clinic()["phone"]):?>
                                        <li class="navigation__sublist-item"><a
                                                href="tel:<?=preg_replace("/[^+0-9]/", '', $phone);?>"><?=$phone?></a>
                                        </li>
                                        <?endif;?>
                                        <?if($email = clinic()["contacts"]["email"]):?>
                                        <li class="navigation__sublist-item"><a
                                                href="mailto:<?=$email?>"><?=$email?></a></li>
                                        <?endif;?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?JRender::viewServicesBottomMenu();?>
                        <li class="navigation__item">
                            <input class="navigation__item-checkbox visually-hidden" id="nav-3" type="checkbox"
                                name="nav">
                            <label class="navigation__item-name" for="nav-3">Разделы
                                <svg class="navigation__item-icon" width="16" height="16">
                                    <use xlink:href="#icon-arrow-down"></use>
                                </svg>
                            </label>
                            <div class="navigation__sublist-group">
                                <?JRender::viewSectionBottomMenu();?>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="contact middle-footer__contact">
                    <div class="social middle-footer__social">
                        <ul class="social__list">

                            <?if($vk = clinic()["socials"]["vk"]):?>
                            <li class="social__item"><a class="social__link" href="<?=$vk?>" target="_blank"
                                    aria-label="Вконтакте">
                                    <svg class="social__link-icon" width="16" height="16">
                                        <use xlink:href="#icon-vk"></use>
                                    </svg></a></li>
                            <?endif;?>
                            <?if($facebook = clinic()["socials"]["facebook"]):?>
                            <li class="social__item"><a class="social__link" href="<?=$facebook?>" target="_blank"
                                    aria-label="Facebook">
                                    <svg class="social__link-icon" width="16" height="16">
                                        <use xlink:href="#icon-facebook"></use>
                                    </svg></a></li>
                            <?endif;?>
                            <?if($instagram = clinic()["socials"]["instagram"]):?>
                            <li class="social__item"><a class="social__link" href="<?=$instagram?>" target="_blank"
                                    aria-label="Instagram">
                                    <svg class="social__link-icon" width="16" height="16">
                                        <use xlink:href="#icon-instagram"></use>
                                    </svg></a></li>

                            <?endif;?>
                            <?if($youtube = clinic()["socials"]["youtube"]):?>
                            <li class="social__item"><a class="social__link" href="<?=$youtube?>" target="_blank"
                                    aria-label="Youtube">
                                    <svg class="social__link-icon" width="20" height="14">
                                        <use xlink:href="#icon-youtube"></use>
                                    </svg></a></li>
                            <?endif;?>

                        </ul>

                        <a class="specialButton" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" style="cursor: pointer;">
                            <?=file_get_contents(get_template_directory_uri() . '/app/img/icons/special.svg')?>
                            ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ
                        </a>
                    </div>
                    <div class="question middle-footer__question">
                        <p class="question__text">Задайте вопрос напрямую:</p>
                        <ul class="question__list question__list--mobile">

                            <?if($phone = clinic()["phone"]):?>
                            <li class="question__item">
                                <a class="question__link question__link--phone"
                                    href="tel:<?=preg_replace("/[^+0-9]/", '', $phone);?>" target="_blank">
                                    <svg class="question__icon" width="16" height="16">
                                        <use xlink:href="#icon-phone"></use>
                                    </svg><span>Позвонить</span>
                                </a>
                            </li>

                            <?endif;?>
                            <?if($email = clinic()["contacts"]["email"]):?>
                            <li class="question__item">
                                <a class="question__link question__link--mail" href="mailto:<?=$email?>"
                                    target="_blank">
                                    <svg class="question__icon" width="16" height="17">
                                        <use xlink:href="#icon-mail"></use>
                                    </svg><span>Написать на почту</span>
                                </a>
                            </li>
                            <?endif;?>

                        </ul>
                        <ul class="question__list">
                            <?if($whatsapp = clinic()["socials"]["whatsapp"]):?>
                            <li class="question__item">
                                <a class="question__link question__link--whatsapp" href="https://wa.me/<?=$whatsapp;?>"
                                    target="_blank">
                                    <svg class="question__icon" width="16" height="16">
                                        <use xlink:href="#icon-whatsapp"></use>
                                    </svg><span>WhatsApp</span>
                                </a>
                            </li>
                            <?endif;?>
                            <?if($telegram = clinic()["socials"]["telegram"]):?>
                            <li class="question__item">
                                <a class="question__link question__link--telegram" href="<?=$telegram;?>"
                                    target="_blank">
                                    <svg class="question__icon" width="16" height="16">
                                        <use xlink:href="#icon-telegram"></use>
                                    </svg><span>Telegram</span>
                                </a>
                            </li>
                            <?endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="page__container">
            <div class="bottom-footer__content">
                <div class="bottom-footer__left">
                    <p class="bottom-footer__copyright">© <?=date("Y");?> ООО ПРО.ЗУБЫ</p>
                    <div><a class="bottom-footer__privacy show-privacy-popup" href="#" target="_blank">Политика конфиденциальности</a></div>
                    <div><a class="bottom-footer__privacy" href="/polozhenie-i-garantijah/" target="_blank">Положение о гарантиях</a></div>
                </div>
                <div class="bottom-footer__right">
                    <p class="bottom-footer__develop">Разработка и продвижение
                        <a class="bottom-footer__develop-link" href="https://dragoweb.ru/" target="_blank">
                            <svg class="bottom-footer__develop-icon" width="81" height="15">
                                <use xlink:href="#icon-dragoweb"></use>
                            </svg></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<button class="float-button float-button--order tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>">
    <svg class="float-button__icon"
        xmlns="http://www.w3.org/2000/svg">
        <use href="#float-order"></use>
    </svg>
    <span class="float-button__text">Записаться<br>online</span>
  </button>
