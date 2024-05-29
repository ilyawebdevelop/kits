<section class="reasons">
    <div class="page__container">
        <div class="reasons__content">
            <div class="reasons__info">
                <?if(!empty($args["image"])):?>
                    <div class="reasons__image-wrap">
                        <img class="reasons__image" src="<?=$args["image"]?>"
                            alt="<?=$args["titile"]?>">
                            <?if(!empty($args["link-video"])):?>
                            <a class="reasons__video-link" href="<?=$args["link-video"]?>" data-fslightbox="doctor">
                                <div class="reasons__button-play" href="<?=$args["link-video"]?>" data-fslightbox="doctor">
                                    <svg class="reasons__button-play-icon" width="30" height="32">
                                        <use xlink:href="#icon-play-review"></use>
                                    </svg>
                                </div>
                            </a>
                            <?endif;?>
                    </div>
                <?endif;?>
                <p class="title title--h3 reasons__title"><?=$args["titile"]?></p>
            </div>
            <ul class="reasons__list">
            <?foreach($args["advantages"] as $k => $advantage):?>
                <li class="reasons__item">
                    <?if(empty($advantage["i"])):?>
                        <img 
                            class="reasons__icon" 
                            src="<?=get_template_directory_uri()?>/app/img/icons/icon-<?=$args["type-view-icon"] == "icon"?"item":"number";?>-<?=$k+1;?>.png" 
                            alt="<?=$advantage["t"]?>"
                        >
                    
                    <?else:?>
                        
                        <img class="reasons__icon" src="<?=$advantage["i"]?>" alt="<?=$advantage["t"]?>">
                    <?endif;?>
                    <p class="title title--h5 reasons__name"><?=$advantage["t"]?></p>
                    <p class="text text--small reasons__text"><?=$advantage["a"]?></p>
                </li>
            <?endforeach;?>
            </ul>
            <a class="reasons__general-link tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>"><span class="title title--h5">Записаться на прием
                    <svg class="reasons__general-icon-arrow" width="56" height="35">
                        <use xlink:href="#icon-arrow-right"></use>
                    </svg>
                    <svg class="reasons__general-icon-ellipse" width="77" height="52">
                        <use xlink:href="#icon-ellipse"></use>
                    </svg></span></a>
        </div>
    </div>
</section>