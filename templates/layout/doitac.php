<?php
$d->reset();
$sql_doitac1 = "select ten_vi as ten,tenkhongdau,id, photo,mota from #_doitac where com='doitac' and hienthi =1 order by stt,id desc";
$d->query($sql_doitac1);
$result_doitac1 = $d->result_array();

$d->reset();
$sql_qc = "select ten_vi as ten,tenkhongdau,id, photo,mota_$lang as mota from #_about where type='y-kien' and hienthi =1 order by stt,id desc";
$d->query($sql_qc);
$result_qc = $d->result_array();

$d->reset();
$sql_doitac2 = "select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota from #_about where type='y-kien' and hienthi=1 and noibat>0 order by id";
$d->query($sql_doitac2);
$rs_doitac2 = $d->result_array();

$d->reset();
$sql_doitac1 = "select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota from #_about where type='y-kien' and hienthi=1 order by id desc";
$d->query($sql_doitac1);
$rs_doitac3 = $d->result_array();

$d->reset();
$sql_doitac1 = "select ten_$lang as ten, tenkhongdau, id, photo, link from #_video where  hienthi=1 order by id desc";
$d->query($sql_doitac1);
$rs_video = $d->result_array();


$d->reset();
$sql_doitac2 = "select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota from #_about where type='tin-tuc' and hienthi=1 and noibat>0 order by id";
$d->query($sql_doitac2);
$rs_tintuc_f = $d->result_array();

?> 

<div id="showYKien">
	<div class="container">
		<div class="row">
			<div class="tieuDe center-block">
				<span class="boiXanh">NHẬN XÉT</span> CỦA KHÁCH HÀNG
			</div>
			<div class="box_product">
			<div class="col-md-7 col-sm-7 col-xs-12">
				<div id="leftCMT">
					<div class="pad">
						<div class="owl-demo-KH">
							<?php foreach($rs_doitac3 as $k=>$v){?>						
								<div id="ct-CMT">
									<div class="detail">
										<div class="images">
											<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],209,339,1,100)?>" class="img-responsive">
										</div>
										<div class="x2">
											<div class="tieude-cmt"><?= $v['ten'] ?></div>
											<div class="noidung-cmt"><?= catchuoi($v['mota'],120) ?></div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							<?php }?>				
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-12">
					<?php foreach($rs_doitac2 as $k=>$v){?>
						<div id="cmtRIGHT">
							<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],143,143,2,100)?>" class="img-responsive cmtTRAI">
							<div class="cmtPHAI">
								<div class="tieude-cmt"><?= $v['ten'] ?></div>
								<div class="noidung-cmt"><?= catchuoi($v['mota'],100) ?></div>
							</div>
							<div class="clear"></div>
						</div>
					<?php }?>							
			</div>	
			</div>
			<div class="clear"></div>	
		</div>
	</div>	
</div>
<div class="video">
	<div class="container">
		<div class="content">
			<div id="owl-demo-dt2">
				<?php foreach ($rs_tintuc_f as $v) { ?>
					<div class="item_doitac">
						<a class="" href="tin-tuc/<?=$v['tenkhongdau']?>-<?=$v['id']?>.html">
							<div class="images">
								<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],282,183,1,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" onerror="if (this.src != 'no-image.png') this.src = 'assets/images/no-image.png';" />
							</div>
							<div class="name">
								<?=$v["ten"]?>
							</div>
							
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="thuonghieu">
	<div class="container">
		<div class="content">
			<div id="owl-demo-dt1">
				<?php foreach ($result_doitac1 as $v) { ?>
					<div class="item_doitac">
						<a href="<?= $v['mota'] ?>" target="_blank" rel="nofollow" >
							<img src="<?=thumb($v["photo"],_upload_hinhanh_l,$v["tenkhongdau"],140,80,1,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" onerror="if (this.src != 'no-image.png') this.src = 'assets/images/no-image.png';" />
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>