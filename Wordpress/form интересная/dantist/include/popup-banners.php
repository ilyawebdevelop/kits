<?php 
	date_default_timezone_set('Europe/Moscow');

  $popup_banners = is_array(get_field('popup_banners', 'option')) ? get_field('popup_banners', 'option') : [];
	$popup_banner = false;

	if(!is_array($_SESSION)) $_SESSION = [];
	if(!isset($_SESSION['popup_banners']) || !is_array($_SESSION['popup_banners'])) $_SESSION['popup_banners'] = [];

	$current_date = (int)date("Ymd");
	foreach($popup_banners as $popup_banner_item) {
    if (!$popup_banner_item['active']) continue;
    if ($popup_banner_item['start_date'] && $current_date < $popup_banner_item['start_date']) continue;
    if ($popup_banner_item['end_date'] && $current_date > $popup_banner_item['end_date']) continue;

    if(!is_array($_SESSION['popup_banners']['popup_banners_'.$popup_banner_item['id']])) $_SESSION['popup_banners']['popup_banners_'.$popup_banner_item['id']] = [];

    // print("<pre>".print_r($_SESSION['popup_banners']['popup_banners_'.$popup_banner_item['id']], true)."</pre>"); // debug
    // $_SESSION['popup_banners']['popup_banners_'.$popup_banner_item['id']] = []; // reset

    $count_show = count($_SESSION['popup_banners']['popup_banners_'.$popup_banner_item['id']]);
    if ($count_show >= 1) {
      continue;
    }

    $popup_banner = $popup_banner_item;
    $_SESSION['popup_banners']['popup_banners_'.$popup_banner_item['id']][] = $current_date;
    break;
	}
	if($popup_banner) {
		?>
		<div class="popup-banner">
			<div class="popup-banner__content">
        <button class="popup-banner__close"></button>
        <?php ob_start(); ?>
        <picture>
            <source media="(orientation: portrait)" srcset="<?=$popup_banner['image_mobile']?>">
            <img src="<?=$popup_banner['image']?>" alt="" class="popup-banner__image">
        </picture>
        <?php $popup_banner_content = ob_get_clean(); ?>
				<?php if($popup_banner['post']) { ?>
					<a href="<?=get_the_permalink($popup_banner['post']->ID)?>" class="popup-banner__link"><?=$popup_banner_content?></a>
				<?php } else { ?>
					<?=$popup_banner_content?>
				<?php } ?>
			</div>
		</div>
    <style>
      .popup-banner {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10%;
        transition: .3s;
        opacity: 0;
        visibility: hidden;
        background-color: rgba(21,21,21,.72);
      }

      .popup-banner-open .popup-banner {
        opacity: 1;
        visibility: visible;
      }

      .popup-banner__link {
        display: block;
      }

      .popup-banner__content {
        position: relative;
      }

      .popup-banner__close {
        position: absolute;
        top: 0;
        right: 0;
        background-color: #000;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        padding: 0;
        margin: 0;
        box-shadow: none;
        cursor: pointer;
      }

      .popup-banner__close:before,
      .popup-banner__close:after {
        content: '';
        background-color: #fff;
        height: 1px;
        width: 24px;
        position: absolute;
        transform-origin: center;
      }

      .popup-banner__close:before {
        transform: rotate(-45deg);
      }

      .popup-banner__close:after {
        transform: rotate(45deg);
      }
    </style>
		<script type="text/javascript">
			(function() {
        var popupBanner = document.querySelector(".popup-banner");
        if (!popupBanner) return
        
        popupBanner.addEventListener("click", function() {
          document.body.classList.remove('popup-banner-open');
        });
        document.addEventListener("DOMContentLoaded", function() {
          setTimeout(function() {
            document.body.classList.add('popup-banner-open');
          }, 3000);
        });
      })()
		</script>
		<?php
	}
	?>
