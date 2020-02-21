
<div class="box_content">
    <div class="tcat"><div class="icon"><?= $title_tcat ?></div><div class="tcat_right">&nbsp;</div></div>
    <div class="content">   
		<?php foreach($tintuc as $v){?>
		<div class="col-md-4 col-sm-4 tablet col-xs-12 wow bounceInUp">
			<div class="box_news">
				
				<div class="images">
					<a href="<?=$_GET["com"]?>/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html">
						<img src="timthumb.php?src=<?=_upload_tintuc_l.$v["photo"]?>&w=385&h=220&zc=2&q=80" alt="<?=$v["ten"]?>" class="img-responsive" />
					</a>
				</div>
				<div class="name">
					<a href="<?=$_GET["com"]?>/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html">
						<?=$v["ten"]?>
					</a>
				</div>
				<p><?=catchuoi($v["mota"],400)?></p>
				<div class="clear"></div>
			</div>
		</div>
		<?php }?>
        
        <div class="clear"></div>
        <div class="pagination"><div class="phantrang" ><?= $paging['paging'] ?></div></div>
    </div> 
</div>

