<ul class="header__list">
    <li class="header__item"><a class="header__link" href="<?=get_permalink(19);?>">Услуги</a></li>
    <?foreach($args["items"] as $item):
        if($item["not-header"]) continue;
        ?>
        <li class="header__item">
            <a class="header__link" href="<?=$item["link"]?:$item["page"];?>"><?=$item["name"]?></a>
        </li>
    <?endforeach;?>

</ul>