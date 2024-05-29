<section class="accordion">
  <div class="page__container">
    <div class="headline accordion__headline">
      <p class="title title--h3 headline__name"><?=$args["title"]?></p>
    </div>
    <ul class="accordion__list">
    <?
    $id = substr(md5(rand(999,99999)), 0, 7);
    foreach($args["tabs"] as $k=> $tab):?>
      <li class="accordion__item">
        <input class="accordion__item-checkbox visually-hidden" id="accordion-<?=$id?>-<?=$k?>" type="checkbox" name="accordion">
        <label class="accordion__item-headline" for="accordion-<?=$id?>-<?=$k?>">
          <p class="accordion__item-name"><?=$tab["t-title"]?></p>
      
          <div class="accordion__arrow">
              <svg class="accordion__arrow-icon" width="56" height="35">
                  <use xlink:href="#icon-arrow-right"></use>
              </svg>
          </div>
        </label>
        <div class="accordion__item-info">
          <?=$tab["t-content"]?>

          <? if ($tab["t-files"]): ?>
          <!-- <p class="accordion__item-info-title">Файлы:</p> -->
          <?foreach($tab["t-files"] as $arFile):?>
          <p>
            <a href="<?=$arFile["t-file"]['url'];?>" target="_blank" class="accordion__item-file">
              <? $fileIcon = $arFile['t-file']['subtype'] . '.svg'; ?>
              <i class="accordion__item-file-icon"><img src="<?=$arFile['t-file']['icon']?>" alt=""></i>
              <?=(($arFile['t-file']['caption'] ?: $arFile["t-file"]['alt']) ?: $arFile["t-file"]['title']);?>
            </a>
          </p>
          <?endforeach;?>
          <? endif; ?>
        </div>
      </li>
    <?endforeach;?>
    </ul>
  </div>
</section>