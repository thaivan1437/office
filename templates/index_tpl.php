<?php foreach($rs_dist_index as $v){
		$d->reset();
		$sql="select ten_$lang as ten, tenkhongdau, id, photo, dientich, gia, giakm, dist,vitri,id_huong from #_product where dist='".$v["id"]."' and noibat=1 and hienthi=1 order by stt, id desc limit 0,6";
		$d->query($sql);
		$rs_pro_index=$d->result_array();
?>
<?php if(count($rs_pro_index) >0 ){ ?>
<div class="box_content" id="service">
	<div class="tcat"><div class="icon">Văn phòng cho thuê <?=$v["ten"]?></div></div>
	<div class="content">
		<div class="row xx">
			<div class="box_product">
				<?php foreach($rs_pro_index as $v1){
					$d->reset();
					$sql="select ten, tenkhongdau, id from #_huong where id='".$v1["id_huong"]."' and hienthi=1 order by stt, id desc ";
					$d->query($sql);
					$rs_huong=$d->fetch_array();
				?>
				<div class="col-md-4 col-sm-4 tablet col-xs-12 xx">
					<div class="item">
						<div class="images">
							<a href="toa-nha-<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
								<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],400,300,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
								<span></span>
							</a>
							
						</div>
						<div class="name">
							<a href="toa-nha-<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
								<?=catchuoi($v1["ten"],60)?>
							</a>
						</div>
						<div class="hover">
							<div class="item_deltai">
							<p class="vitri"><span class="sleft"><i class="i fa fa-map-marker"></i>Vị trí</span>: <?=$v1["vitri"]?></p>
							<p class="s_sp"><span class="sleft"><i class="fa fa-cube"></i> Diện tích</span>: <?=catchuoi($v1["dientich"],15)?> m2</p>
							<p><span class="sleft"><i class="fa fa-compass"></i> Hướng</span>: <?=$rs_huong["ten"]?></p>
							<p><span class="sleft"><i class="fa fa-usd"></i> Giá thuê</span>: <span class="color bold"><?=showPrice($v1["gia"])?> /m2</span></p>
							</div>
							
							<div class="layer compair" data-id="<?=$v1["id"]?>">
								<div class="gia"><img src="assets/images/ss.png" alt="so sánh" style="margin-right:5px;" /> So sánh</div>
							</div>
							
							
							
						</div>
					</div>
				</div>
				
				<?php }?>
			</div>
		</div>
	</div>
	<div class="more">
		<a href="van-phong-<?=$v["tenkhongdau"]?>/">
			<span>Xem thêm</span>
		</a>
	</div>
</div>
<?php } ?>

	<?php }?>