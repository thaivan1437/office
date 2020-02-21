<?php
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id from #_news_item where type='".$type."' and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_danhmuc=$d->result_array();
?>
<div class="box_content inner">
	<div class="tcat"><div class="icon"><h2><?= $title_tcat ?></h2></div></div>
	<div class="content">   
		<?php foreach($tintuc as $v){?>
		<div class="courseListItem">
			<div class="courseListItem__intensity1">
				<?php iF($com=="tin-tuc"){?>
					<a href="van-phong-<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">
				<?php }else{?>
				<a href="<?=$_GET["com"]?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">
				<?php }?>
				
				<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],260,200,1,80)?>" onerror="if(this.src != 'assets/images/no-image.png') this.src = 'assets/images/no-image.png';" alt="<?=$v['ten']?>" class="img-responsive" />
				</a>
			</div>
			<div class="courseListItem__desc">
				<?php iF($com=="tin-tuc"){?>
					<a href="van-phong-<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">
				<?php }else{?>
				<a href="<?=$_GET["com"]?>/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">
				<?php }?>
				<h2 class="courseListItem__desc__title"><?=$v['ten']?></h2>
				</a>
				<div class="small"><i class="fa fa-calendar" aria-hidden="true"></i> Ngày đăng: <?=date("d/m/Y",$v["ngaytao"])?> , Lượt xem: <?=$v["luotxem"]?></div>
				<p class="courseListItem__desc__paragraph"><?=catchuoi($v['mota'], 350)?></p>
			</div>
		</div>
		<?php }?>
		
		<div class="clear"></div>
		<div class="pagination"><div class="phantrang" ><?= $paging['paging'] ?></div></div>
	</div> 
</div>

