<?php
$d->reset();
$sql_slider = "select ten,photo,link, mota from #_slider where hienthi=1 order by stt,id desc";
$d->query($sql_slider);
$result_slider = $d->result_array();

$d->reset();
$sql="select * from #_place_dist where id_city='1' and hienthi=1 order by stt";
$d->query($sql);
$rs_district=$d->result_array();

$d->reset();
$sql="select * from #_place_ward where id_dist='".$rs_district[0]["id"]."' and hienthi=1 order by stt";
$d->query($sql);
$rs_ward=$d->result_array();

$d->reset();
$sql="select * from #_place_street where id_dist='".$rs_district[0]["id"]."' and hienthi=1 order by stt";
$d->query($sql);
$rs_street=$d->result_array();

$d->reset();
$sql="select ten, tenkhongdau, id from #_giasearch where hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_gianha=$d->result_array();

$d->reset();
$sql="select ten, tenkhongdau, id from #_dientich where hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_dientich=$d->result_array();

$d->reset();
$sql="select ten, tenkhongdau, id from #_huong where hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_huong=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id from #_product_list where hienthi=1 and type='loai' order by stt, id desc";
$d->query($sql);
$rs_loai=$d->result_array();

?>
<div id="center-container">
	<?php if($source=="index"){?>
	<div id="iview">
		<?php for ($i = 0; $i < count($result_slider); $i++) { ?> 
		<div data-iview:image="<?= _upload_hinhanh_l . $result_slider[$i]["photo"] ?>">
			
		</div>
		<?php }?>
	</div>
	<?php }else{?>
	<div class="images">
		<img src="<?=_upload_hinhanh_l.$row_setting["tuvan"]?>" class="img-responsive" alt="<?=$row_setting["ten_".$lang]?>" />
	</div>
	<div class="search_detail">
		<div class="container">
			<div class="search_1">
				<ul class="x_search">
					<li class="">
						<div class="box_search">
							<input type="text" name="keyword" class="form-control" id="keyword" placeholder="Nhập từ khóa tìm kiếm ..." onkeypress="doEnter(event,'keyword');">
						</div>
					</li>
					<li>
						<div class="form-group">
							<select name="dist_s" class="form-control chosen-select" id="dist_s" placeholder="Quận cần thuê">
								<option value="0">Quận cần thuê</option>
								<?php foreach($rs_district as $k=>$v){?>
								<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
								<?php }?>
							<select>
						</div>
															   
					</li>
					<li class="search-last">
						<div class="form-group" id="box_street_s">
							<select name="street_s" class="form-control chosen-select" id="street_s">
								<option value="0">Đường cần thuê</option>
								<?php foreach($rs_street as $k=>$v){?>
								<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
								<?php }?>
							<select>
						</div>
						
					</li>
					<li class="live_eff">					
						<div class="form-group" id="box_ward_s">
							<select name="ward_s" class="form-control chosen-select" id="ward_s">
								<option value="0">Phường cần thuê</option>
								<?php foreach($rs_ward as $k=>$v){?>
								<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
								<?php }?>
							<select>
						</div>
					</li>
					
					<li class="live_eff">
						<div class="form-group">
							<select name="dientich" class="form-control chosen-select" id="dientich">
								<option value="0">Chọn diện tích</option>
								<?php foreach($rs_dientich as $k=>$v){?>
								<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
								<?php }?>
							<select>
						</div>
					
					</li>
					<li class="live_eff">
						<div class="form-group">
							<select name="giasearch" class="form-control chosen-select" id="giasearch">
								<option value="0">Chọn giá</option>
								<?php foreach($rs_gianha as $k=>$v){?>
								<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
								<?php }?>
							<select>
						</div>
					</li>
				</ul>
				<div class="more_s">
					<div class="s_nut">TÌM KIẾM VĂN PHÒNG</div>
				</div>
				<div class="search_2">
					<ul class="detail_sea2">
						<?php foreach($rs_district as $k => $v) {?> 
							<li class="item">
								<a href="van-phong-<?=$v["tenkhongdau"]?>/">
									<div class="name"><?=$v["ten"]?></div>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			
		</div>
	</div>
	<?php }?>

	<?php if($source=="index") { ?>
<div class="search-ct">	
<div class="wpsh">
    <div class="wpsearch">
        <form name="frmSearch" id="frmSearch" method="post">
            <ul class="x_search">
				<div class="tit">
					TÌM KIẾM VĂN PHÒNG
				</div>
                <li class="live_eff">
					<div class="box_search">
						<input type="text" name="keyword" class="form-control" id="keyword" placeholder="Nhập từ khóa tìm kiếm ..." onkeypress="doEnter(event,'keyword');">
					</div>
                </li>
				<li>
					<div class="form-group">
						<select name="dist_s" class="form-control chosen-select" id="dist_s" placeholder="Quận cần thuê">
							<option value="0">Quận cần thuê</option>
							<?php foreach($rs_district as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
                                                           
                </li>
                <li class="search-last">
					<div class="form-group" id="box_street_s">
						<select name="street_s" class="form-control chosen-select" id="street_s">
							<option value="0">Đường cần thuê</option>
							<?php foreach($rs_street as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
					
                </li>
				
				<li class="live_eff">					
                    <div class="form-group" id="box_ward_s">
						<select name="ward_s" class="form-control chosen-select" id="ward_s">
							<option value="0">Phường cần thuê</option>
							<?php foreach($rs_ward as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
				</li>
                
				<li class="">
					<div class="form-group">
						<select name="dientich" class="form-control chosen-select" id="dientich">
							<option value="0">Chọn diện tích</option>
							<?php foreach($rs_dientich as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
				
				</li>
				<li class="search-last">
					<div class="form-group">
						<select name="giasearch" class="form-control chosen-select" id="giasearch">
							<option value="0">Chọn giá</option>
							<?php foreach($rs_gianha as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
				</li>
				<li class="">
					<div class="form-group">
						<select name="hang" class="form-control chosen-select" id="hang">
							<option value="0">Chọn hạng</option>
							<?php foreach($rs_loai as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
				
				</li>
				<li class="search-last">
					<div class="form-group">
						<select name="huong" class="form-control chosen-select" id="huong">
							<option value="0">Chọn hướng</option>
							<?php foreach($rs_huong as $k=>$v){?>
							<option value="<?=$v["id"]?>"><?=$v["ten"]?></option>
							<?php }?>
						<select>
					</div>
				</li>
            </ul>
			<div class="nut_s">
			
            <input type="button" name="btnSearch" id="btnSearch" value="Tìm Kiếm" class="btnsubmit submit2"> 
			</div>
		</form>
    </div>
</div>
</div>

<div class="list_vp">
	<div class="container">
		<div class="ct_vp">
			<?php foreach($list_quan as $k => $v) {?> 
				<div class="item">
					<a href="van-phong-<?=$v["tenkhongdau"]?>/">
						<div class="name"><?=$v["ten"]?></div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


	
	<?php } ?>
		
		
		
		
	
</div><!---end #center-container-->
<?php
if ($_POST['email_newsletter']) {
    $d->query("select email from #_dknhantin where email='" . $_POST['email_newsletter'] . "'");
    $email = $d->result_array();
	
    if (count($email) > 0) {
        alert("Email này đã được đăng kí. Bạn vui lòng chọn email khác");
    } else {
        $email1 = $_POST['email_newsletter'];
        $ngaydangky = time();

        $sql = "INSERT INTO  table_dknhantin(email,ngaytao ) 
				  VALUES ('$email1','$ngaydangky')";

        mysql_query($sql) or die(mysql_error());
        alert("Đăng kí nhận thông báo thành công!");
    }
}
?>