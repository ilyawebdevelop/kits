<?php if (!empty($args['images'])): ?>
<section class="logos-block">
  <div class="page__container">
    <p class="title title--h3 logos-block__title"><?=$args["title"]?></p>
    <div class="logos-block__list">
      <?php foreach($args['images'] as $item): ?>
        <div class="logos-block__item">
          <img class="logos-block__image" src="<?=$item['url']?>" alt="<?=$item['alt']?>">
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif; ?>
