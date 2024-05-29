<?foreach($args["items"] as $groupItems):?>
<ul class="navigation__sublist">
    <?foreach($groupItems as $item):?>
        <li class="navigation__sublist-item">
            <a class="navigation__sublist-link" href="<?=$item["link"]?:$item["page"];?>"><?=$item["name"]?></a>
        </li>
    <?endforeach;?>
</ul>
<?endforeach;?>
