<?php foreach(clinics() as $clinic_id => $clinic):
    $workTimesText = '';
?>
<section class="contacts">
    <div class="page__container">
        <div class="contacts__content">
            <div class="contacts__info">
                <?if($titleContacts = $clinic["title-contacts"]):?>
                <p class="title title--h3 contacts__title"><?=$titleContacts;?></p>
                <?endif;?>
                <ul class="contacts__list">
                    <li class="contacts__item">
                        <img class="contacts__icon" src="<?=get_template_directory_uri()?>/app/img/icons/icon-time.png"
                            alt="">
                        <div class="contacts__item-info">
                            <p class="contacts__item-title">Приходите к нам</p>
                            <p class="contacts__item-text">
                                <?if($address = $clinic["contacts"]["address"]):?>
                                <?=$address;?>
                                <?endif;?>
                                <?if($workTimes = $clinic["contacts"]["work-times"]):
                                  foreach($workTimes as $n => $work):
                                    if (!$n)
                                        $workTimesText = $work["t"];
                                  ?>
                                          <br><?=$work["t"]?>
                                <? 
                                  endforeach;
                                endif;?>
                            </p>
                        </div>
                    </li>

                    <?if($email = $clinic["contacts"]["email"]):?>
                    <li class="contacts__item"><img class="contacts__icon"
                            src="<?=get_template_directory_uri()?>/app/img/icons/icon-mail.png" alt="">
                        <div class="contacts__item-info">
                            <p class="contacts__item-title">Пишите нам</p>
                            <a class="contacts__item-text" href="mailto:<?=$email?>"><?=$email?></a>
                        </div>
                    </li>
                    <?endif;?>
                    
                    <?if($whatsapp = $clinic["contacts"]["whatsapp_phone"]):
                        $whatsapp_text = $clinic["contacts"]["whatsapp_text"];
                    ?>
                    <li class="contacts__item"><img class="contacts__icon"
                            src="<?=get_template_directory_uri()?>/app/img/icons/icon-wa.svg" alt="">
                        <div class="contacts__item-info">
                            <p class="contacts__item-title">Напишите нам в Whatsapp</p>
                            <a class="contacts__item-text" href="https://api.whatsapp.com/send/?phone=<?=preg_replace('/[^\d\+]+/', '', $whatsapp)?>&text=<?=$whatsapp_text?>&type=phone_number&app_absent=0" target="_blank"><?=$whatsapp?></a>
                        </div>
                    </li>
                    <?endif;?>

                    <li class="contacts__item"><img class="contacts__icon"
                            src="<?=get_template_directory_uri()?>/app/img/icons/icon-call.png" alt="">
                        <div class="contacts__item-info">
                            <p class="contacts__item-title">Звоните <?=(!empty($clinic['contacts']['call-times']) ? $clinic['contacts']['call-times'] : (!empty($workTimesText) ? $workTimesText : 'с 10:00 до 20:00')); ?></p>
                            <?if($phone = $clinic["phone"]):?>
                            <a class="contacts__item-text"
                                href="tel:<?=preg_replace("/[^+0-9]/", '', $phone);?>"><?=$phone?></a>
                            <?endif;?>
                            <?if($phones = $clinic["phones"]):
                              foreach($phones as $phone):?>
                                    <a class="contacts__item-text"
                                        href="tel:<?=preg_replace("/[^+0-9]/", '', $phone["p"]);?>"><?=$phone["p"]?></a>
                              <?endforeach;
                            endif;?>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="contacts__location">
                <div class="contacts__map">
                    <div class="contacts__map-image-wrap">
                        <div id="contacts-map-<?=$clinic_id?>"></div>
                        <?if($coords = $clinic["contacts"]["coords"]):?>
                        <script>
                        ymaps.ready(init<?=$clinic_id?>);

                        function init<?=$clinic_id?>(ymaps) {
                            var mapYandex = new ymaps.Map("contacts-map-<?=$clinic_id?>", {
                                    center: [<?=$coords;?>],
                                    zoom: 13
                                }),
                                geoObject = new ymaps.GeoObject({
                                    geometry: {
                                        type: "Point",
                                        coordinates: [<?=$coords;?>],
                                    },
                                    properties: {
                                      <?if($address = $clinic["contacts"]["address"]):?>
                                        balloonContent: '<?=$address;?>'
                                      <?endif;?>
                                    }

                                })
                            mapYandex.geoObjects
                                .add(geoObject)
                        }
                        </script>
                        <?endif;?>
                        <!-- <img class="contacts__map-image" src="<?=get_template_directory_uri()?>/app/img/map.jpg" alt="Карта"> -->
                    </div>
                </div>
                <?if($howGet = $clinic["contacts"]["how-get"]):?>
                <div class="contacts__way">
                    <p class="contacts__way-title">Как добраться</p>
                    <ul class="contacts__way-list">
                        
                            <?foreach($howGet as $get):?>
                              <li class="contacts__way-item">
                                    <?=$get["text"]?>
                              </li>
                            <?endforeach;?>
                         

                    </ul>
                </div>
                <?endif;?>
            </div>
            <a class="contacts__general-link tm-trigger" 
                data-tm-modal="ajax-appointment"
                data-param-title="Записаться на прием"
                data-ajax-url="<?=APPOINTMENT;?>">
              <span class="title title--h5">
                Записаться на прием
                <svg class="contacts__general-icon-arrow" width="56" height="35">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg>
                <svg class="contacts__general-icon-ellipse" width="77" height="52">
                    <use xlink:href="#icon-ellipse"></use>
                </svg>
              </span>
            </a>
        </div>
    </div>
</section>
<?php endforeach ?>
