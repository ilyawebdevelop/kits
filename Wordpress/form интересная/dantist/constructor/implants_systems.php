<section class="implants-table-block">
  <div class="page__container">
    <p class="title title--h3 implants-table-block__title"><?=$args["title"]?></p>
    <div class="implants-table-block__content">
    <table class="implants-table">
      <colgroup>
        <col class="implants-table__attribute-col"/>
        <?php foreach($args["list"] as $item): ?>
          <col class="implants-table__value-col"/>
        <?php endforeach ?>
      </colgroup>
      <tr class="implants-table__head">
        <td><span class="implants-table__label">Вид систем</span></td>
        <?php foreach($args["list"] as $item): ?>
          <td><span class="implants-table__name"><?=$item['name']?></span><img class="implants-table__logo" src="<?=$item['logo']?>" alt="<?=$item['name']?>"></td>
        <?php endforeach ?>
      </tr>
      <?php foreach($args["attributes"] as $attribute): ?>
        <tr>
          <td><span class="implants-table__label"><?=$attribute['label']?></span></td>
          <?php foreach($args["list"] as $item): ?>
          <td><?php foreach($item['attributes'] as $item_attribute): ?>
          <?php if ($item_attribute['implants_systems_attribute'] == $attribute['value']): ?>
          <?=$item_attribute['value']?>
          <?php break ?>
          <?php endif ?>
          <?php endforeach ?></td>
          <?php endforeach ?>
        </tr>
      <?php endforeach ?>
    </table>
    </div>
  </div>
</section>
