<div class="menu">
    <div class="menu__wrapper">
        <div class="page__container">
            <div class="menu__content">
                <div class="menu-left">
                    <?JRender::viewSectionMenu();?>

                    <div class="question menu__question">
                        <p class="question__text">Задайте вопрос напрямую:</p>
                        <ul class="question__list">

                            <?if($whatsapp = clinic()["socials"]["whatsapp"]):?>
                                <li class="question__item">
                                <a class="question__link question__link--whatsapp" href="https://wa.me/<?=$whatsapp;?>" target="_blank">
                                    <svg class="question__icon" width="16" height="16">
                                    <use xlink:href="#icon-whatsapp"></use>
                                    </svg><span>WhatsApp</span>
                                </a>
                                </li>
                            <?endif;?>
                            <?if($telegram = clinic()["socials"]["telegram"]):?>
                                <li class="question__item">
                                    <a class="question__link question__link--telegram" href="<?=$telegram;?>" target="_blank">
                                    <svg class="question__icon" width="16" height="16">
                                        <use xlink:href="#icon-telegram"></use>
                                    </svg><span>Telegram</span>
                                    </a>
                                </li>
                            <?endif;?>
                    
                        </ul>
                    </div>
                    <div class="social menu__social">
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
                <?JRender::viewServicesTopMenu();?>
            </div>
        </div>
    </div>
</div>