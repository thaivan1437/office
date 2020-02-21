<link rel="stylesheet" type="text/css" href="assets/js/sweet-alert/sweet-alert.css"/>
<script type="text/javascript" src="assets/js/sweet-alert/sweet-alert.js"></script>
<?php 
	$idl = $row_detail["id_list"];
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id,typeloai from #_product_list where id=".$idl." and hienthi=1 order by stt, id desc";
	
	
	$d->query($sql);
	$rs_listloai=$d->fetch_array();
	$typeloai=$rs_listloai["typeloai"];
	$ten=$rs_listloai["ten"];
	//check_data($typeloai);
	//check_data($ten);
	
	
	$d->reset();
	$sql="select * from #_huong where hienthi='1' and id=".$row_detail["id_huong"]." order by stt, id desc";
	$d->query($sql);
	$rs_huong=$d->fetch_array();
	
	
	
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id,typeloai from #_product_list where id=".$row_detail["loai"]." and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_xephang=$d->fetch_array();
	
	
$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, dientich, gia, giakm from #_product where spbc=1 and hienthi=1 order by stt, id desc limit 0,6";
$d->query($sql);
$rs_pro_oth=$d->result_array();


$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, dientich, gia, giakm from #_product where dist=".$row_detail["dist"]." and hienthi=1 order by stt, id desc limit 0,6";
$d->query($sql);
$rs_pro_dist=$d->result_array();
//check_data($rs_pro_dist);
	//check_data($row_hinhanhsp11);
?>

<?php if($typeloai=="theo-quan") { ?>
<div class="box_content">
	<?php if($breakcrumb!='') {?><div class="breadcrumb-arrow"><?=$breakcrumb?></div><?php }?>
	<div class="content">
	
		<div class="name_product"><h1><?= $row_detail['ten'] ?></h1></div>
		
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="app-figure" id="zoom-fig">
					<a id="Zoom-1" class="MagicZoom" title="<?=$row_detail["ten"]?>" href="<?=_upload_product_l.$row_detail["photo"]?>"	>
						<img src="<?=thumb($row_detail["photo"],_upload_product_l,$row_detail["tenkhongdau"],500,350,2,80)?>" alt="<?=$row_detail["ten"]?>"/>
					</a>
					<div class="selectors slick">
						<div class="item_zoom">
							<a data-zoom-id="Zoom-1" href="<?= _upload_product_l . $row_detail['photo'] ?>" data-image="<?= _upload_product_l . $row_detail['photo'] ?>" >
								<img srcset="<?=thumb($row_detail["photo"],_upload_product_l,$row_detail["tenkhongdau"],120,120,1,80)?>" alt="<?=$row_detail["ten"]?>" src="<?=thumb($row_detail["photo"],_upload_product_l,$row_detail["tenkhongdau"],120,120,1,80)?>" alt="<?=$row_detail["ten"]?>" alt="<?=$row_detail["ten"]?>" />
							</a>
						</div>
						<?php for ($i = 0; $i < count($row_hinhanhsp11); $i++) { ?>
						<div class="item_zoom">
							<a data-zoom-id="Zoom-1" href="<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>" data-image="<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>" >
								<img srcset="<?=thumb($row_hinhanhsp11[$i]["photo"],_upload_product_l,$row_hinhanhsp11[$i]["tenkhongdau"],120,120,1,80)?>" alt="<?=$row_hinhanhsp11[$i]["ten"]?>" src="<?=thumb($row_hinhanhsp11[$i]["photo"],_upload_product_l,$row_hinhanhsp11[$i]["tenkhongdau"],120,120,1,80)?>" alt="<?=$row_hinhanhsp11[$i]["ten"]?>" alt="<?=$row_detail["ten"]?>" />
								
																
							</a>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="product_info">
				
					<div class="check">
						<b> Tên toàn nhà: </b> <p> <?= $row_detail['tentoanha'] ?></p>
					</div>
					
					<div class="check">
						<b>Địa chỉ:</b> <p>Đường <?=show_street($row_detail["street"])?>, Phường <?=show_ward($row_detail["ward"])?>, Quận <?=get_district($row_detail["dist"])?>, TP HCM</p>
					</div>
					<div class="check">
						<b>Diện tích:</b> <p><?=$row_detail["dientich"]?> m2</p>
					</div>
					
					
					<div class="check">
						<b>Hướng:</b> <p><?=$rs_huong["ten"]?> <!--b class="xxx"><img src="assets/images/boi.png" alt="xem hướng hợp phong thủy" style="margin-right:5px" />Xem hướng hợp phong thủy</b--></p>
					</div>
					<div class="check">
						<b>Xếp hạng:</b> <p><?=$rs_xephang["ten"]?> </p>
					</div>
					<div class="check">
						<b>Tình trạng:</b> <p><?=$row_detail["tinhtrang"]?> </p>
					</div>
					<div class="check">
						<b>Thời hạn thuê:</b> <p><?=$row_detail["thoihan"]?> năm</p>
					</div>								
					<div class="check">
						<b>Giá:</b> <span><?=showPrice($row_detail["gia"])?> USD/m2</span>
					</div>
					
					<div class="cacloaiphi">
						<div class="name">
							Các loại phí
						</div>
						<div class="detail">
							<ul>
								<li><b>+ Phí quản lí</b> <span><?=$row_detail["phiql"]?> USD/m2/Tháng</span></li>
								<li><b>+ Tiền điện</b> <span><?=$row_detail["tiendien"]?> USD/m2/Tháng</span></li>
								<li><b>+ Phí xe máy</b> <span><?=$row_detail["phixemay"]?> USD/m2/Tháng</span></li>
								<li><b>+ Tiền điện lạnh</b> <span><?=$row_detail["tiendienlanh"]?> USD/m2/Tháng</span></li>
								
								<li><b>+ Phí ô tô</b> <span><?=$row_detail["phioto"]?> USD/m2/Tháng</span></li>
								<li><b>+ Tiền đặt cọc</b> <span><?=$row_detail["tiendatcoc"]?> USD/m2/Tháng</span></li>
								<li><b>+ Phí ngoài giờ</b> <span><?=$row_detail["phingoaigio"]?> USD/m2/Tháng</span></li>
								<li><b>+ Thanh toán</b> <span><?=$row_detail["thanhtoan"]?> </span></li>
								
							</ul>
							
						</div>
					</div>
					
					
					
					<div class="box_s">
						<div class="star_date">
							<?php echo export_star(round(($v["rate"]/$v["luot_rate"]), 1));?>
						</div>
						<div class="icon">							
							<img src="assets/images/like.png" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive addtim" />	
							<?=$row_detail["luot_rate"]?>
							Đánh giá
						</div>
						<div class="icon">
							<img src="assets/images/asw.png" data-id="<?=$v["id"]?>" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive addtocart" /> 
							Câu trả lời
						</div>
					</div>
					
					<div class="nut">
						<div class="tvn" data-toggle="modal" data-target="#myModal">
							Tư vấn nhanh
						</div>
						<div class="hot">
							<a href="tel:<?=$row_setting["hotline"]?>">HOTLINE</a>
						</div>
						<div class="cdx">
							Chọn đi xem
						</div>
					</div>
				
				</div>
			</div>
		</div>
		
		
		<div class="tab">
			<div class="ct_tab" rel="#gioithieu">
				Giới thiệu
			</div>
			<div class="ct_tab active" rel="#ketcau">
				Kết cấu
			</div>
			<div class="ct_tab" rel="#vitri">
				Vị trí
			</div>
			<div class="ct_tab" rel="#bando">
				Bản đồ
			</div>
			<div class="ct_tab" rel="#phidv">
				Phí dịch vụ
			</div>
			<div class="ct_tab" rel="#phongthuy">
				Phong thủy
			</div>
			<div class="ct_tab" rel="#uudiem">
				Ưu điểm
			</div>
			<div class="ct_tab" rel="#danhgia">
				Đánh giá (<?=$row_detail["luot_rate"]?>)
			</div>
		</div>
		
		<div class="width_left">
		
		<div id="gioithieu" class="content_ct">
			<div class="title"><h2>Giới thiệu tòa nhà <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				<?= $row_detail['noidung'] ?>
			</div>
		</div>
		
		<div id="ketcau" class="content_ct">
			<div class="title"><h2>Kết cấu tòa nhà <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				<?= $row_detail['ketcautoanha'] ?>
			</div>
		</div>
		
		<div id="vitri" class="content_ct">
			<div class="title"> Bản đồ tòa nhà<?= $row_detail['tentoanha'] ?></div>
			<div class="content">
				<div id="map_canvas"></div>
        
			</div>
		</div>
		<div id="bando" class="content_ct">
			<div class="title"><h2>Vị trí <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				<?= $row_detail['bando'] ?>
			</div>
		</div>
		<div id="phidichvu" class="content_ct">
			<div class="title"><h2>Phí dịch vụ tòa nhà <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				<?= $row_detail['phidichvu'] ?>
			</div>
		</div>
		<div id="uudiem" class="content_ct">
			<div class="title"><h2>Ưu điểm tòa nhà <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				<?= $row_detail['uudiem'] ?>
			</div>
		</div>
		<div id="phongthuy" class="content_ct">
			<div class="title"><h2>Phong thủy tòa nhà <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				<?= $row_detail['phongthuy'] ?>
			</div>
		</div>
		<div id="danhgia" class="content_ct">
			<div class="title"><h2>Đánh giá tòa nhà <?= $row_detail['tentoanha'] ?></h2></div>
			<div class="content">
				
				<!--comment-->
					<div class="box_comment">
					<div class="danhgia">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="danhgia1">
									<h5>Đánh giá trung bình</h5>
									<p>Có (<?=$row_detail["luot_rate"]?>) lượt đánh giá</p>
									<p class="danhgia1-rate" itemprop="ratingValue"><?=($row_detail["luot_rate"]>0) ? round(($row_detail["rate"]/$row_detail["luot_rate"]), 1) : "0"?></p>
									<div class="danhgia1-star"></div>
								</div>
								<div class="danhgia2">
									<div class="danhgia2-wrap">
										<span class="danhgia2-so"><span>5</span> <i class="glyphicon glyphicon-star"></i></span>
										<div class="danhgia2-khung"><span style="width:<?=($row_detail["rate5"]/$row_detail["luot_rate"])*100;?>%" ></span></div>
										<span class="danhgia2-chu"><span class="rate-number"><?=$row_detail["rate5"]?></span></span>								
									</div>
									<div class="danhgia2-wrap">
										<span class="danhgia2-so"><span>4</span> <i class="glyphicon glyphicon-star"></i></span>
										<div class="danhgia2-khung"><span style="width:<?=($row_detail["rate4"]/$row_detail["luot_rate"])*100;?>%" ></span></div>
										<span class="danhgia2-chu"><?=$row_detail["rate4"]?></span>								
									</div>
									<div class="danhgia2-wrap">
										<span class="danhgia2-so"><span>3</span> <i class="glyphicon glyphicon-star"></i></span>
										<div class="danhgia2-khung"><span style="width:<?=($row_detail["rate3"]/$row_detail["luot_rate"])*100;?>%" ></span></div>
										<span class="danhgia2-chu"><?=$row_detail["rate3"]?></span>								
									</div>
									<div class="danhgia2-wrap">
										<span class="danhgia2-so"><span>2</span> <i class="glyphicon glyphicon-star"></i></span>
										<div class="danhgia2-khung"><span style="width:<?=($row_detail["rate2"]/$row_detail["luot_rate"])*100;?>%" ></span></div>
										<span class="danhgia2-chu"><?=$row_detail["rate2"]?></span>								
									</div>
									<div class="danhgia2-wrap">
										<span class="danhgia2-so"><span>1</span> <i class="glyphicon glyphicon-star"></i></span>
										<div class="danhgia2-khung"><span style="width:<?=($row_detail["rate1"]/$row_detail["luot_rate"])*100;?>%" ></span></div>
										<span class="danhgia2-chu"><?=$row_detail["rate1"]?></span>								
									</div>
								
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="danhgia3">
									<div class="comment" id="comment">
										<div class="title_cat">
											Bình luận
										</div>
										
										<form name="frm_config" id="frm_config" onsubmit="return comment_check();" action="" method="post" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-4 col-sm-4 col-xs-12">
													Đánh giá của bạn
												</div>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input id="rating-input" name="rating" data-min="0" data-max="5" data-step="0.5" data-glyphicon=0>
												</div>
												<div class="clear height"></div>
											</div>
											<div class="row">
												<div class="col-md-4 col-sm-4 col-xs-12">
													Họ tên (<span class="red-color">*</span>)
												</div>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" name="hoten" id="hoten" class="form-control" value="<?=$_SESSION["login_web"]["ten"]?>" placeholder="Họ và tên ..." required oninvalid="this.setCustomValidity('Họ tên của bạn')" oninput="setCustomValidity('')" />
												</div>
												<div class="clear height"></div>
												<div class="col-md-4 col-sm-4 col-xs-12">
													Nhận xét (<span class="red-color">*</span>)
												</div>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<textarea name="noidung" id="noidung" class="form-control" placeholder="Nội dung nhận xét ..." rows="3" required></textarea>
												</div>
												<div class="clear height"></div>
											</div>
											<div class="text-center">
												<input type="button" onclick="comment_check();" value="Gửi nhận xét" class="button btn btn-primary" />
											</div>
											<div class="result_comment1"></div>
											
											<div id="RegLoading" class="blue-color"></div>
											<input type="hidden" name="command" value="binh-luan" />
											<input type="hidden" name="id_sp" id="id_sp" value="<?=$row_detail["id"]?>" />
											
										</form>
										
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Show bình luận -->
				<div class="show_comment">
					<div class="box_result_comment">
					<?php if(!empty($rs_comment)){ foreach($rs_comment as $v){?>
					<div class="result_comment">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12 user_comment">
								<!--div class="avatar">
									<img src="" width="100px" class="img-responsive" alt="<?=$v['ten']?>" />
								</div-->
								<div class="info">
									<div class="name">
										<?=$v["hoten"]?>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-12 content_comment">
								<div class="star_date">
									<?php echo export_star(round(($v["rate"]/$v["luot_rate"]), 1));?> 
								</div>
								<div class="name"><?=$v['ten']?></div>
								<div class="noidung"><?=$v['noidung']?></div>
							</div>
						</div>
					</div>
					<?php }?>
					</div>
					<form id="formx" class="">
						<input type="hidden" id="total" name="total" value="<?=@$total?>"/>
						<input type="hidden" id="current" name="current" value="<?=@$current?>" />
					</form>
					<?php }?>
				</div>
				<!--end comment -->
				
			</div>
		</div>
		</div>
	</div>	
	
	<div class="box_content" id="service">
		<div class="width_right">
			<div class="left_pr">
				
				<div class="tit">
					Văn phòng theo quận <?=get_district($row_detail["dist"])?>
				</div>
				<div class="ct_sp_oth">
				<?php foreach($rs_pro_dist as $v1) { ?>
					<div class="item">
						<div class="images">
							<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
								<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],305,240,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
								<span></span>
							</a>
							<div class="name">
								<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
									<?=catchuoi($v1["ten"],60)?>
								</a>
							</div>
						</div>
						<div class="hover">
							<div class="item_deltai">
							<p><span class="sleft"><i class="i fa fa-map-marker"></i>Vị trí</span>: <?=$v1["vitri"]?></p>
							<p class="s_sp"><span class="sleft"><i class="fa fa-cube"></i> Diện tích</span>: <?=catchuoi($v1["dientich"],15)?> m2</p>
							<p><span class="sleft"><i class="fa fa-compass"></i> Số chỗ</span>: <?=$v1["sochongoi"]?></p>
							<p><span class="sleft"><i class="fa fa-usd"></i> Giá thuê</span>: <span class="color bold"><?=$v1["gia"]?> USD/m2</span></p>
							</div>
							
						</div>
					</div>
				<?php } ?>
				</div>
				
				<?php if(!empty($rs_danhmuc_street)){?>
				<div class="module_left">
					<div class="tit">Các tuyến đường quận <?=get_district($row_detail["dist"])?></div>
					<div class="content Conditions">
						<ul class="list_cat_product">
							<?php foreach($rs_danhmuc_street as $k=>$v){?>
							<li class="" >
								<a href="duong-<?= $v['tenkhongdau'] ?>/">Đường <?= $v['ten'] ?></a>
							</li>
							<?php }?>
						</ul>
					</div>            	                                   
				</div>
				<?php }?>
				
				<?php if(!empty($rs_danhmuc_ward)){?>
				<div class="module_left">
					<div class="tit">Các phương thuộc quận <?=get_district($row_detail["dist"])?></div>
					<div class="content Conditions">
						<ul class="list_cat_product">
							<?php foreach($rs_danhmuc_ward as $k=>$v){?>
							<li class="" >
								<a href="phuong-<?= $v['tenkhongdau'] ?>/">Phường <?= $v['ten'] ?></a>
							</li>
							<?php }?>
						</ul>
					</div>            	                                   
				</div>
				<?php }?>
				
			</div>
		</div>
	</div>	
				
				
				
		<div class="clear"></div>
		<div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
	</div>
</div>
<div class="clear height"></div>
<div class="box_content" id="service">

	<div class="tcat"><div class="icon"><a href="<?=getTenkhongdauList($v["city"])?>-cho-thue-<?=$rs_dist_fetch["tenkhongdau"]?>/">Văn phòng quận khác liên quan</a></div></div>
	<div class="contents">
		<div class="row xx">
			<div class="box_product">
				<?php if(!empty($sanpham_dist)){ foreach($sanpham_dist as $k=>$v1){?>
				<div class="col-md-4 col-sm-4 tablet col-xs-12 xx">
					<div class="item">
						
						
						<div class="images">
							<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
								<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],366,240,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
								<span></span>
							</a>
							<div class="name">
								<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
									<?=catchuoi($v1["ten"],60)?>
								</a>
							</div>
						</div>
						<div class="hover">
							<div class="item_deltai">
							<p><span class="sleft"><i class="i fa fa-map-marker"></i>Vị trí</span>: <?=$v1["vitri"]?></p>
							<p class="s_sp"><span class="sleft"><i class="fa fa-cube"></i> Diện tích</span>: <?=catchuoi($v1["dientich"],15)?> m2</p>
							<p><span class="sleft"><i class="fa fa-compass"></i> Hướng</span>: <?=$rs_huong["ten"]?></p>
							<p><span class="sleft"><i class="fa fa-usd"></i> Giá thuê</span>: <span class="color bold"><?=$v1["gia"]?> USD/m2</span></p>
							</div>
							
							

						</div>

					</div>
				</div>
				<?php }}else echo "<div class='col-xs-12'>Nội dung đang được cập nhật.</div>"; ?>
			</div>
		</div>
	</div>

	
</div>
<?php } else if($typeloai=="tron-goi") { ?>
	<div class="box_content">
	<?php if($breakcrumb!='') {?><div class="breadcrumb-arrow"><?=$breakcrumb?></div><?php }?>
	<div class="content">
		<div class="name_product"><h1><?= $row_detail['ten'] ?></h1></div>
		
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="app-figure" id="zoom-fig">
					<a id="Zoom-1" class="MagicZoom" title="<?=$row_detail["ten"]?>" href="<?=_upload_product_l.$row_detail["photo"]?>"	>
						<img src="<?=_upload_product_l.$row_detail["photo"]?>" alt="<?=$row_detail["ten"]?>"/>
					</a>
					<div class="selectors slick">
						<div class="item_zoom">
							<a data-zoom-id="Zoom-1" href="<?= _upload_product_l . $row_detail['photo'] ?>" data-image="<?= _upload_product_l . $row_detail['photo'] ?>" >
								<img srcset="timthumb.php?src=<?= _upload_product_l . $row_detail['photo'] ?>&w=120&h=100&zc=1" src="timthumb.php?src=<?= _upload_product_l . $row_detail['photo'] ?>&w=120&h=100&zc=1" alt="<?=$row_detail["ten"]?>" />
							</a>
						</div>
						<?php for ($i = 0; $i < count($row_hinhanhsp11); $i++) { ?>
						<div class="item_zoom">
							<a data-zoom-id="Zoom-1" href="<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>" data-image="<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>" >
								<img srcset="timthumb.php?src=<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>&w=120&h=100&zc=1" src="timthumb.php?src=<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>&w=120&h=120&zc=1" alt="<?=$row_detail["ten"]?>" />
							</a>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="product_info">
					<span class="name_product"><h2><?= $row_detail['ten'] ?></h2></span>
					<div class="check">
						<b>Địa chỉ:</b> <p>Đường <?=show_street($row_detail["street"])?>, Phường <?=show_ward($row_detail["ward"])?>, Quận <?=get_district($row_detail["dist"])?>, TP HCM</p>
					</div>
					<div class="check">
						<b>Diện tích:</b> <span><?=$row_detail["dientich"]?> m2</span>
					</div>
					<div class="check">
						<b>Giá:</b> <span><?=showPrice($row_detail["gia"])?> USD/m2</span>
					</div>
					<div class="check">
						<b>Phí quản lý:</b> <span><?=$row_detail["giakm"]?> USD/m2</span>
					</div>
					
					<div class="box_s">
						<div class="star_date">
							<?php echo export_star(round(($v["rate"]/$v["luot_rate"]), 1));?>
						</div>
						<div class="icon">							
							<img src="assets/images/like.png" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive addtim" />	
							<?=$row_detail["luot_rate"]?>
							Đánh giá
						</div>
						<div class="icon">
							<img src="assets/images/asw.png" data-id="<?=$v["id"]?>" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive addtocart" /> 
							Câu trả lời
						</div>
					</div>
					
					<div class="nut">
						<div class="tvn">
							Tư vấn nhanh
						</div>
						<div class="hot">
							HOTLINE
						</div>
						<div class="cdx">
							Chọn đi xem
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="content_ct">
			<div class="title">Thông tin chi tiết</div>
			<div class="content">
				<?= $row_detail['noidung'] ?>
			</div>
		</div>
		<div class="content_ct">
			<div class="title">Thông tin liên hệ</div>
			<div class="content">
				<?php
					$d->reset();
					$sql="select noidung_$lang as noidung from #_time where type='lien-he'";
					$d->query($sql);
					$rs_lienhe=$d->fetch_array();
				?>
				<?= $rs_lienhe['noidung'] ?>
			</div>
		</div>
		<div class="content_ct">
			<div class="title">Vị trí</div>
			<div class="content">
				<div id="map_canvas"></div>
        
			</div>
		</div>
		<div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
	</div>
</div>
<div class="clear height"></div>
<?php } else{?> 
<div class="box_content">
	<?php if($breakcrumb!='') {?><div class="breadcrumb-arrow"><?=$breakcrumb?></div><?php }?>
	<div class="content">
		<div class="name_product"><h2><?= $row_detail['ten'] ?></h2></div>
		
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="app-figure" id="zoom-fig">
					<a id="Zoom-1" class="MagicZoom" title="<?=$row_detail["ten"]?>" href="<?=_upload_product_l.$row_detail["photo"]?>"	>
						<img src="<?=_upload_product_l.$row_detail["photo"]?>" alt="<?=$row_detail["ten"]?>"/>
					</a>
					<div class="selectors slick">
						<div class="item_zoom">
							<a data-zoom-id="Zoom-1" href="<?= _upload_product_l . $row_detail['photo'] ?>" data-image="<?= _upload_product_l . $row_detail['photo'] ?>" >
								<img srcset="timthumb.php?src=<?= _upload_product_l . $row_detail['photo'] ?>&w=120&h=100&zc=1" src="timthumb.php?src=<?= _upload_product_l . $row_detail['photo'] ?>&w=120&h=100&zc=1" alt="<?=$row_detail["ten"]?>" />
							</a>
						</div>
						<?php for ($i = 0; $i < count($row_hinhanhsp11); $i++) { ?>
						<div class="item_zoom">
							<a data-zoom-id="Zoom-1" href="<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>" data-image="<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>" >
								<img srcset="timthumb.php?src=<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>&w=120&h=100&zc=1" src="timthumb.php?src=<?= _upload_product_l . $row_hinhanhsp11[$i]['photo'] ?>&w=120&h=120&zc=1" alt="<?=$row_detail["ten"]?>" />
							</a>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="product_info">
				
					<div class="check">
						<b>Theo quận:</b> <p><?=get_district($row_detail["dist"])?></p>
					</div>
					<div class="check">
						<b>Vị trí:</b> <p>Đường <?=show_street($row_detail["street"])?>, Phường <?=show_ward($row_detail["ward"])?>, Quận <?=get_district($row_detail["dist"])?>, TP HCM</p>
					</div>
					<div class="check">
						<b>Kết cấu:</b> <p><?=$row_detail["ketcau"]?></p>
					</div>
					<div class="check">
						<b>Diện tích xây dựng:</b> <p><?=$row_detail["dientichxaydung"]?> m2</p>
					</div>
					<div class="check">
						<b>Diện tích sử dụng:</b> <p><?=$row_detail["dientichsudung"]?> m2</p>
					</div>
					<div class="check">
						<b>Loại cho thuê:</b> <p><?=$row_detail["loaichothue"]?> m2</p>
					</div>
					
					<div class="check">
						<b>Giá thuê / tháng:</b> <span><?=showPrice($row_detail["gia"])?> USD/tháng</span>
					</div>
					
					
					<div class="box_s">
						<div class="star_date">
							<?php echo export_star(round(($v["rate"]/$v["luot_rate"]), 1));?>
						</div>
						<div class="icon">							
							<img src="assets/images/like.png" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive addtim" />	
							<?=$row_detail["luot_rate"]?>
							Đánh giá
						</div>
						<div class="icon">
							<img src="assets/images/asw.png" data-id="<?=$v["id"]?>" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive addtocart" /> 
							Câu trả lời
						</div>
					</div>
					
					<div class="nut">
						<div class="tvn">
							Tư vấn nhanh
						</div>
						<div class="hot">
							HOTLINE
						</div>
						<div class="cdx">
							Chọn đi xem
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="width_left">
		<div class="content_ct">
			<div class="title">Thông tin chi tiết</div>
			<div class="content">
				<?= $row_detail['noidung'] ?>
			</div>
		</div>
		
		<div class="content_ct">
			<div class="title">Vị trí</div>
			<div class="content">
				<div id="map_canvas"></div>
        
			</div>
		</div>
		
		</div>
		<div class="box_content" id="service">
		<div class="width_right">
			<div class="left_pr">
				<div class="tit">
					Tòa nhà quận khác liên quan
				</div>
				<div class="ct_sp_oth">
				<?php foreach($rs_pro_oth as $v1) { ?>
					<div class="item">
						<div class="images">
							<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
								<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],366,240,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
								<span></span>
							</a>
							<div class="name">
								<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>.html">
									<?=catchuoi($v1["ten"],60)?>
								</a>
							</div>
						</div>
						<div class="hover">
							<div class="item_deltai">
							<p><span class="sleft"><i class="i fa fa-map-marker"></i>Vị trí</span>: <?=$v1["vitri"]?></p>
							<p class="s_sp"><span class="sleft"><i class="fa fa-cube"></i> Diện tích</span>: <?=catchuoi($v1["dientich"],15)?> m2</p>
							<p><span class="sleft"><i class="fa fa-compass"></i> Số chỗ</span>: <?=$v1["sochongoi"]?></p>
							<p><span class="sleft"><i class="fa fa-usd"></i> Giá thuê</span>: <span class="color bold"><?=$v1["gia"]?> USD/m2</span></p>
							</div>
							
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
		
		</div>
		
		<div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
	</div>
</div>
<div class="clear height"></div>
<?php } ?>
<script type="text/javascript">
			var map;
			var infowindow;
			var marker = new Array();
			var old_id = 0;
			var infoWindowArray = new Array();
			var infowindow_array = new Array();
			function initialize() {
				var defaultLatLng = new google.maps.LatLng(<?= $row_detail['toado'] ?>);
				var myOptions = {
					zoom: 16,
					center: defaultLatLng,
					scrollwheel: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				map.setCenter(defaultLatLng);
				var arrLatLng = new google.maps.LatLng(<?= $row_detail['toado'] ?>);
				infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?= $row_detail['ten'] ?></div><div>Đường <?=show_street($row_detail["street"])?>, Phường <?=show_ward($row_detail["ward"])?>, Quận <?=get_district($row_detail["dist"])?>, TP HCM</div></div>';
				loadMarker(arrLatLng, infoWindowArray[7895], 7895);

				moveToMaker(7895);
			}
			function loadMarker(myLocation, myInfoWindow, id) {
				marker[id] = new google.maps.Marker({position: myLocation, map: map, visible: true});
				var popup = myInfoWindow;
				infowindow_array[id] = new google.maps.InfoWindow({content: popup});
				google.maps.event.addListener(marker[id], 'mouseover', function () {
					if (id == old_id)
						return;
					if (old_id > 0)
						infowindow_array[old_id].close();
					infowindow_array[id].open(map, marker[id]);
					old_id = id;
				});
				google.maps.event.addListener(infowindow_array[id], 'closeclick', function () {
					old_id = 0;
				});
			}
			function moveToMaker(id) {
				var location = marker[id].position;
				map.setCenter(location);
				if (old_id > 0)
					infowindow_array[old_id].close();
				infowindow_array[id].open(map, marker[id]);
				old_id = id;
			}</script>
<script src="assets/js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>