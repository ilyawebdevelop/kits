<? 
$clinics = JClinic::getInstance()->getClinics();?>
<div class="modal-clinic">
    <p class="title title--h5 popup__title">Выбор клиники</p>
    <div class="modal-clinic--items">
        <?foreach($clinics as $clinic):?>
        <a href="?chioce-clinik=<?=$clinic["id"]?>" class="modal-clinic--item"><?=$clinic["title"]?></a>
        <?endforeach;?>
    </div>
</div>