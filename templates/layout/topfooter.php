<?php
$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota from #_about where type='tin-tuc' and noibat=1 and hienthi=1 order by stt, id desc limit 0,4";
$d->query($sql);
$rs_news=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota from #_about where type='phong-thuy' and noibat=1 and hienthi=1 order by stt, id desc limit 0,4";
$d->query($sql);
$rs_phongthuy=$d->result_array();

?>
<div id="news">
	<div class="container">
		<div id="info_deals" class="usual"> 
			<ul id="tab_content">
				<li class="selected"><a rel="#tab1">Tin tức sự kiện</a></li>
				<li class=""><a rel="#tab2">Phong thủy</a></li>
			</ul>
			<div id="tab1" class="content_tab selected">
				<?php foreach($rs_news as $k=>$v){?>
					<div class="box_news">
						<div class="images zoom-img">
							<a href="tin-tuc/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" >
								<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],210,175,1,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" onerror="if (this.src != 'no-images.png') this.src = 'assets/images/no-images.png';" />
							</a>
						</div>
						<div style="overflow: hidden">
							<div class="name">
								<a href="tin-tuc/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" >
									<?=$v["ten"]?>
								</a>
							</div>
							<div class="mota"><?=catchuoi($v["mota"],250)?></div>
						</div>
					</div>
				<?php }?>
			</div>
			<div id="tab2" class="content_tab">
				<?php foreach($rs_phongthuy as $k=>$v){?>
					<div class="box_news">
						<div class="images zoom-img">
							<a href="phong-thuy/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" >
								<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],210,175,1,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" onerror="if (this.src != 'no-images.png') this.src = 'assets/images/no-images.png';" />
							</a>
						</div>
						<div style="overflow: hidden">
							<div class="name">
								<a href="phong-thuy/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" >
									<?=$v["ten"]?>
								</a>
							</div>
							<div class="mota"><?=catchuoi($v["mota"],250)?></div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<script>
	$().ready(function(){
		$('#info_deals #tab_content li a').click(function(){
			$rel=$(this).attr("rel");
			//$('#info_deals .content_tab').height("0");
			//$($rel).height($($rel).data("height"));
			$('#info_deals #tab_content li').removeClass("selected");
			$('#info_deals .content_tab').removeClass("selected");
			$(this).parents("li").addClass("selected");
			$($rel).addClass("selected");
		})
	})
</script>