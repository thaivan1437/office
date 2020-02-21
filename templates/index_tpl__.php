<div class="box_content inner">
	<div class="tcat">
        <div class="icon">
            <h2>Hộp quà tặng</h2>
        </div>
    </div>
	<div class="content">
		<div class="box4">
			<div class="images">
				<a href="y-tuong-thiet-ke.html">
				<img src="<?=thumb($rs_moi["photo"],_upload_hinhanh_l,$rs_moi["tenkhongdau"],465,450,1,80)?>" alt="<?=$rs_moi["ten"]?>" class="img-responsive" />
				</a>
			</div>
			<div class="name">
				<a href="y-tuong-thiet-ke.html">
					<?=$rs_moi["ten"]?>
				</a>
			</div>
		</div>
		<div class="box4">
			<div class="images">
				<a href="khuyen-mai.html">
				<img src="<?=thumb($rs_muanhieu["photo"],_upload_hinhanh_l,$rs_muanhieu["tenkhongdau"],465,450,1,80)?>" alt="<?=$rs_muanhieu["ten"]?>" class="img-responsive" />
				</a>
			</div>
			<div class="name">
				<a href="y-tuong-thiet-ke.html">
					<?=$rs_muanhieu["ten"]?>
				</a>
			</div>
		</div>
		<?php foreach($rs_product_list as $k=>$v){ if($k<2){?>
		<div class="box4">
			<div class="images">
				<a href="<?=$v["tenkhongdau"]?>-<?=$v["id"]?>/">
				<img src="<?=thumb($v["photo"],_upload_product_l,$v["tenkhongdau"],465,450,1,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" />
				</a>
			</div>
			<div class="name">
				<a href="<?=$v["tenkhongdau"]?>-<?=$v["id"]?>/">
					<?=$v["ten"]?>
				</a>
			</div>
		</div>
		<?php }}?>
		<div class="clear height"></div>
	</div>
</div>
<div class="box_content inner">
	<div class="tcat">
        <div class="icon">
            <h2><?=$rs_list_1["ten"]?></h2>
        </div>
    </div>
	<div class="content">
		<div class="row">
			<div class="box_product">
				<?php foreach($rs_product_khuyenmai as $k=>$v){?>
				<div class="col-md-3 col-sm-4 tablet col-xs-6">
					<div class="item_product_content">
						<div class="images zoom-img">
							<a href="<?=getTenkhongdauList($v["id_list"])?>/<?=$v["tenkhongdau"]?>">
								<img src="<?=thumb($v["photo"],_upload_product_l,$v["tenkhongdau"],215,200,1,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" />
							</a>
							
						</div>
						<div class="name">
							<a href="<?=getTenkhongdauList($v["id_list"])?>/<?=$v["tenkhongdau"]?>">
								<?=$v["ten"]?>
							</a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear height"></div>
	</div>
</div>