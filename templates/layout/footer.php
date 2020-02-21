<?php
	$d->reset();
	$sql="select * from #_icon where com='top' order by stt, id";
	$d->query($sql);
	$rs_icon=$d->result_array();
	
	$d->reset();
	$sql="select noidung_$lang as noidung, chinhanh_$lang as chinhanh from #_footer";
	$d->query($sql);
	$footer=$d->fetch_array();
	
	$d->reset();
	$sql="select * from #_icon where com='footer' and hienthi=1 order by stt, id desc limit 0,20";
	$d->query($sql);
	$rs_list_ft=$d->result_array();
	
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id from #_product_list where com=1 and type='loai' and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_loai_ft=$d->result_array();
	
	$d->reset();
$sql="select * from #_icon where com='top' and hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_icon=$d->result_array();


	$d->reset();
$sql="select * FROM #_place_dist where id_city=1 and hienthi=1 order by stt, id desc";
$d->query($sql);

$rs_quan=$d->result_array();

	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id from #_about where type='dich-vu' and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_dv_ft=$d->result_array();

?>
<div class="gui_email">
	<div class="container">
	
		<div class="bao">
			<div class="tab active" rel="#tuvan">
				ĐĂNG KÝ TƯ VẤN
			</div>
			<div class="tab" rel="#datlich">
				ĐẶT LỊCH ĐI XEM
			</div>
		</div>
		
		
		<div class="cat">
			Nhân viên City Office sẽ đến VP quý khách hàng tư vấn trực tiếp về việc thuê VP <br>
			và đưa đi xem hoàn toàn MIỄN PHÍ
		</div>
		
		
		<div id="tuvan" class="box_mail active">
			
			<form method="post" name="frm" class="forms ct_email" action="lien-he.html">    
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="pad-contact">
							<input type="text" class="form-control" name="tencongty" id="ten" placeholder="Tên công ty" >
						</div>
						<div class="pad-contact">
							<input class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ liên hệ" type="text" >
						</div>
						<div class="pad-contact">
							<input type="text" class="form-control" name="nglienhe" id="ten" placeholder="Người liên hệ" >
						</div> 
					</div>
					<div class="col-md-4 col-sm-6">
						
						<div class="pad-contact">
							<input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= _sodienthoai ?>" type="tel" required oninvalid="this.setCustomValidity('<?= _dienthoaigui ?>')" oninput="setCustomValidity('')">
						</div>
						<div class="pad-contact">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('<?= _emailgui ?>')" oninput="setCustomValidity('')">
						</div> 
						<div class="pad-contact">
							<input type="text" class="form-control" name="tieude" id="tieude" placeholder="Tiêu đề" >
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						
						<div class="pad-contact">
							<textarea name="noidung" id="noidung" class="form-control" rows="5" placeholder="Nội dung cần tư vấn" required oninvalid="this.setCustomValidity('<?= _noidunggui ?>')" oninput="setCustomValidity('')"></textarea>
						</div>
					</div>
				</div>
				<div class="nut">
					<button type="submit" class="btn btn_send" onclick="">Gửi đi</button>
					<input class="btn btn-primary btn_reset" type="reset" value="<?= _nhaplai ?>" onclick="document.ct_email.reset();" />
				</div>
				
			</form>
		</div>
		<div id="datlich" class="box_mail">
			
			<form method="post" name="frm" class="forms ct_email" action="lien-he.html">    
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="pad-contact">
							<input type="text" class="form-control" name="tencongty" id="ten" placeholder="Tên công ty" >
						</div>
						<div class="pad-contact">
							<input class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ liên hệ" type="text" >
						</div>
						<div class="pad-contact">
							<input type="text" class="form-control" name="nglienhe" id="ten" placeholder="Người liên hệ" >
						</div> 
					</div>
					<div class="col-md-4 col-sm-6">
						
						<div class="pad-contact">
							<input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= _sodienthoai ?>" type="tel" required oninvalid="this.setCustomValidity('<?= _dienthoaigui ?>')" oninput="setCustomValidity('')">
						</div>
						<div class="pad-contact">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('<?= _emailgui ?>')" oninput="setCustomValidity('')">
						</div> 
						<div class="pad-contact">
							<input type="text" class="form-control" name="tieude" id="tieude" placeholder="Tiêu đề" >
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						
						<div class="pad-contact">
							<textarea name="noidung" id="noidung" class="form-control" rows="5" placeholder="Nội dung cần tư vấn" required oninvalid="this.setCustomValidity('<?= _noidunggui ?>')" oninput="setCustomValidity('')"></textarea>
						</div>
					</div>
				</div>
				<div class="nut">
					<button type="submit" class="btn btn_send" onclick="">Gửi đi</button>
					<input class="btn btn-primary btn_reset" type="reset" value="<?= _nhaplai ?>" onclick="document.ct_email.reset();" />
				</div>
				
			</form>
		</div>
		<div class="">
			
		</div>
		
		
	</div>
</div>

<div class="text-right slogen">
	<div class="container">
	Chuyên cung cấp dịch vụ văn phòng ảo giá rẻ     -     Văn Phòng chia sẻ giá rẻ     -     Văn Phòng trọn gói giá rẻ nhất TP.HCM
	</div>
</div>
<div class="box_footer">
	<div class="tit_f">LIÊN HỆ</div>
	<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="title-ft"><?=$row_setting["ten_$lang"]?></div>
			<div class="noidung">
				<?=$footer["noidung"]?>
			</div>
			<div class="box_icon">
				<?php foreach($rs_icon as $v){?>
				<div class="icon">
					<a href="<?=$v["url"]?>" target="_blank" rel="nofollow">
						<img src="<?=_upload_icon_l.$v["photo"]?>" alt="<?=$v["ten_vi"]?>" class="img-responsive" />
					</a>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="col-md-8 col-sm-6 col-xs-12">
			<div class="">
				
				<ul class="dv_ft">
					<?php foreach($rs_dv_ft as $k => $v) {?>
						<li>
							<a href="tin-tuc/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html"><i class="fa fa-caret-right"></i> <?=$v["ten"]?></a>
						</li>
					<?php }?>
				</ul>
				<div style="height:10px;background:#202020;"></div>
				<ul class="quan_ft">
					<?php foreach($rs_quan as $k => $v) {?>
						<li>
							<a href="van-phong-<?=$v["tenkhongdau"]?>/"><?=$v["ten"]?></a>
						</li>
					<?php }?>
				</ul>
			</div>
			
		</div>
	</div>
		<div class="copyright">Design by ibweb</div>
	</div>
</div>
<!--div class="container">
	<div class="row">
		<div class="col-md-10 col-sm-12">
			<div class="title-ft1">cho thuê văn phòng theo quận</div>
			<?php foreach($rs_list_ft as $v){?>
			<div class="item item25">
				<a href="<?=$v["url"]?>"><?=$v["ten_vi"]?></a>
			</div>
			<?php }?>
		</div>
		<div class="col-md-2">
			<div class="title-ft1">lOẠI VĂN PHÒNG</div>
			<?php foreach($rs_loai_ft as $v){?>
			<div class="item">
				<a href="species/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html"><?=$v["ten"]?></a>
			</div>
			<?php }?>
		</div>
	</div>
	<div id="contact">
		<div class="title_contact">Liên hệ chúng tôi</div>
		<form method="post" name="frm" class="forms" action="lien-he.html">    
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="pad-contact">
						<input type="text" class="form-control" name="ten" id="ten" placeholder="<?= _hovaten ?>" required oninvalid="this.setCustomValidity('<?= _hotengui ?>')" oninput="setCustomValidity('')">
					</div>
					<div class="pad-contact">
						<input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= _sodienthoai ?>" type="tel" required oninvalid="this.setCustomValidity('<?= _dienthoaigui ?>')" oninput="setCustomValidity('')">
					</div>
					<div class="pad-contact">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('<?= _emailgui ?>')" oninput="setCustomValidity('')">
					</div> 
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="pad-contact">
						<input type="text" class="form-control" name="tieude" id="tieude" placeholder="Tối muốn" required oninvalid="this.setCustomValidity('Nhập tiêu đề bạn muốn')" oninput="setCustomValidity('')">
					</div>
					<div class="pad-contact">
						<textarea name="noidung" id="noidung" class="form-control" rows="6" required oninvalid="this.setCustomValidity('<?= _noidunggui ?>')" oninput="setCustomValidity('')"></textarea>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn_send" onclick="">GỬI LIÊN HỆ</button>
		</form>
	</div>
</div-->


<div class="float-contact">
	<button class="chat-zalo"><a href="http://zalo.me/0777777234">Chat Zalo</a></button>
	<button class="chat-face"><a href="http://m.me/vietoffice">Chat Facebook</a></button>
	<button class="hotline"><a href="tel:0777777234">Hotline: 0777 777 234</a></button>
</div>
<style>
	.float-contact {
		position: fixed;
		bottom: 20px;
		left: 20px;
		z-index: 99999;
	}
	.chat-zalo {
		background: #16afdf;
		border-radius: 20px;
		padding: 18px 18px 14px 24px;
		color: white;
		display: block;
		margin-bottom: 6px;
	}
	.chat-face {
		background: #125c9e;
		border-radius: 20px;
		padding: 18px 18px 14px 24px;
		color: white;
		display: block;
		margin-bottom: 6px;
	}
	.float-contact .hotline {
		background: #ff8500 !important;
		border-radius: 20px;
		padding: 18px 18px 14px 24px;
		color: white;
		display: block;
		margin-bottom: 6px;
	}
	.chat-zalo a, .chat-face a, .hotline a {
		font-size: 15px;
		color: white;
		font-weight: bold;
		text-transform: none;
		line-height: 0;
	}
        .chat-zalo a:before, .chat-face a:before {content:'\f086';font-family: 'FontAwesome';position: relative;right: 8px;}
        .float-contact .hotline a:before {content: '\f095';font-family: 'FontAwesome';position: relative;right: 8px;}
</style>