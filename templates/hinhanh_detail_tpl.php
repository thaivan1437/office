<div class="tcat"><div class="icon"><?= $title_tcat ?></div></div>
<div class="box_content">
    <div class="content">           
        <ul class="grid effect-2" id="grid">
            <?php foreach ($result_image as $v) { ?>
                <li><a href="<?= _upload_hinhanh_l . $v['photo'] ?>" class="swipebox"><img src="<?= _upload_hinhanh_l . $v['photo'] ?>" alt="<?= $v['ten'] ?>"></a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>

    </div> 
</div>
