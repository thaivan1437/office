<div class="width_left">
	<div class="box_content inner" id="service">
		<div class="tcat">
			<div class="icon">
				<h1>
					<?php if($idcc > 0){?>

					<?php } else { ?>
						<?=($tem== "vanphong") ? "Văn phòng cho thuê" : ""?>
					<?php } ?>
					  <?= $title_tcat ?>
						
				</h1>
			</div>
		</div>
		<div class="clear"></div>
		<div class="" id="product">
			
			<div class="row xx">
				<div class="box_product">
					<?php if(!empty($product)){ foreach($product as $k=>$v1){
							$d->reset();
					$sql="select ten, tenkhongdau, id from #_huong where id='".$v1["id_huong"]."' and hienthi=1 order by stt, id desc ";
					$d->query($sql);
					$rs_huong=$d->fetch_array();
						?>
					<div class="col-md-4 col-sm-4 tablet col-xs-12 xx">
						<div class="item">
							<div class="images">
								<a href="toa-nha-<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
									<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],362,280,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
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
							<!--div class="hover">
								<div class="name">
									<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
										<?=catchuoi($v1["ten"],60)?>
									</a>
								</div>
								<div class="detail">
									<div>Diện tích: <?=$v1["dientich"]?> m2</div>
								</div>
								<div class="layer">
									<div class="gia"><i class="fa fa-usd" aria-hidden="true"></i> <?=showPrice($v1["gia"])?>/m2</div>
								</div>
							</div-->
						</div>
					</div>
					<?php }}else echo "<div class='col-xs-12'>Nội dung đang được cập nhật.</div>"; ?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="pagination"><div class="phantrang" ><?= $paging['paging'] ?></div></div>
		</div>
		<div class="content_seo" style="margin-top: 15px;">
		<?php if($rs_menu["noidung"]!='') echo $rs_menu["noidung"].'<div class="clear"></div>';?>
		<?php if($noidungw!='') echo $noidungw.'<div class="clear"></div>';?>
		
		</div>
	</div>
</div>
<div class="container_mid container_left">
	<?php include _template . "layout/left.php"; ?> 
</div>
