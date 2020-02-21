<?php

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id from #_product_list where com=1 and type='loai' and hienthi=1 and noibat=1 order by stt, id desc";
$d->query($sql);
$rs_list=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten, dienthoai, email, yahoo, skype from #_yahoo where hienthi=1 order by stt, id";
$d->query($sql);
$rs_yahoo=$d->result_array();

$d->reset();
$sql="select ten, tenkhongdau, id from #_place_dist where id_city=1 and hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_dist_l=$d->result_array();


$d->reset();
$sql="select ten, tenkhongdau, id from #_dientich where hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_dientichl=$d->result_array();

$d->reset();
$sql="select ten, tenkhongdau, id from #_giasearch where hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_gial=$d->result_array();

$d->reset();
$sql="select ten, tenkhongdau, id from #_huong where hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_phongthuy=$d->result_array();

$d->reset();
$d->query("select id, ten_$lang as ten, tenkhongdau, photo, mota_$lang as mota, ngaytao from #_about where type='tin-tuc' and noibat>0 and hienthi=1  order by stt, id desc limit 0,3");
$rs_news = $d->result_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, dientich, gia, giakm from #_product where spbc=1 and hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_pro_re=$d->result_array(); 
?>

<div class="module_left">
	<div class="title t1">Diện tích cho thuê <?=($rs_wards["ten"]!='') ? $rs_wards["ten"] : "các quận";?></div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_dientichl as $k=>$v){?>
			<li class="" >
				<a href="dien-tich-<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>/<?=($rs_wards["ten"]!='') ? $rs_wards["tenkhongdau"].'/' : "";?>">Diện tích <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div>
<div class="module_left">
	<div class="title t2">Giá cho thuê <?=($rs_wards["ten"]!='') ? $rs_wards["ten"] : "các quận";?></div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_gial as $k=>$v){?>
			<li class="" >
				<a href="gia-thue-<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>/<?=($rs_wards["ten"]!='') ? $rs_wards["tenkhongdau"].'/' : "";?>"> <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div>
<?php if(!empty($rs_danhmuc_ward)){?>
<div class="module_left">
	<div class="title t1">Phường cho thuê <?=($rs_wards["ten"]!='') ? $rs_wards["ten"] : "các quận";?></div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_danhmuc_ward as $k=>$v){?>
			<li class="" >
				<a href="phuong-<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>/">Phường <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div>
<?php }?>
<?php if(!empty($rs_danhmuc_street)){?>
<div class="module_left">
	<div class="title t2">Tuyến đường <?=($rs_wards["ten"]!='') ? $rs_wards["ten"] : "các quận";?></div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_danhmuc_street as $k=>$v){?>
			<li class="" >
				<a href="duong-<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>/">Đường <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div>
<?php }?>
<div class="module_left">
	<div class="title t1">Văn phòng theo hướng  <?=($rs_wards["ten"]!='') ? $rs_wards["ten"] : "";?></div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_phongthuy as $k=>$v){?>
			<li class="" >
				<a href="van-phong-<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"> <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div>


<!--div class="module_left">
	<div class="title t1">Hạng văn phòng</div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_list as $k=>$v){?>
			<li class="" >
				<a href="<?=showidlist($v["id"])?>-<?= $v['tenkhongdau'] ?>/"> <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div-->


<div class="module_left">
	<div class="title">Cần thuê văn phòng</div>
    <div class="content Conditions">
		<ul class="list_cat_product">
			<?php foreach($rs_dist_l as $k=>$v){?>
			<li class="" >
				<a href="van-phong-<?= $v['tenkhongdau'] ?>/">Cần thuê văn phòng <?= $v['ten'] ?></a>
			</li>
			<?php }?>
		</ul>
    </div>            	                                   
</div>





<?php /* foreach($rs_list as $v){
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id, photo, dientich, gia, giakm from #_product where loai='".$v["id"]."' and hienthi=1 order by stt, id desc limit 0,10";
	$d->query($sql);
	$rs_pro=$d->result_array();
?>
<div class="module_left">
	<div class="title"><?=$v["ten"]?></div>
    <div class="content">
		<?php foreach($rs_pro as $v1){ $arr_dt=explode("-",$v1["dientich"]);?>
		<div class="item_sp">
			<div class="images">
				<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>">
				<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],310,230,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
				</a>
			</div>
			<div class="info">
				<div class="name">
					<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>">
					<?=$v1["ten"]?>
					</a>
				</div>
				<div>Giá thuê: <span class="red"><?=$v1["gia"]?>USD/m2</span></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php }?>
    </div>            	                                   
</div>
<?php  } */?>
<!--div class="module_left hidden-sm hidden-xs">
	<div class="title">Fanpage</div>
    <div class="content" style="overflow: hidden">
		<div class="fb-page" data-href="<?=$row_setting["facebook"]?>" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"></div>
    </div>            	                                   
</div>
<div class="module_left hidden-sm hidden-xs">
	<div class="title">Hỗ trợ trực tuyến</div>
    <div class="content1">
		<div class="tuvan">
			<div class="hotline"><?=$row_setting["hotline"]?></div>
		</div>
		<?php foreach($rs_yahoo as $v){?>
		<div class="box_hotro">
			
			<div class="yahoo">
				<a href="<?=$v["yahoo"]?>" target="_blank">
					<img src="assets/images/icon_facebook.ico" width="30px" class="img-responsive" alt="yahoo" />
				</a>
			</div>
			<div class="skype">
				<a href="skype:<?=$v["skype"]?>?chat">
					<img src="assets/images/skype.png" class="img-responsive" alt="skype" />
				</a>
			</div>
			<div class="info">
				<div class="name"><?=$v["ten"]?></div>
				<div class="dienthoai"><?=$v["dienthoai"]?></div>
			</div>
		</div>
		<?php }?>
    </div>            	                                   
</div>
<!--div class="module_left hidden-sm hidden-xs">
	<div class="title">Văn phòng giá rẻ</div>
    <div class="content">
		<?php foreach($rs_pro_re as $v1){ $arr_dt=explode("-",$v1["dientich"]);?>
		<div class="item_sp">
			<div class="images">
				<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>">
				<img src="<?=thumb($v1["photo"],_upload_product_l,$v1["tenkhongdau"],310,230,1,80)?>" alt="<?=$v1["ten"]?>" class="img-responsive" />
				</a>
			</div>
			<div class="info">
				<div class="name">
					<a href="<?=getTenkhongdauList($v1["dist"])?>/<?=$v1["tenkhongdau"]?>-<?=$v1["id"]?>">
					<?=$v1["ten"]?>
					</a>
				</div>
				<div>Giá thuê: <span class="red"><?=$v1["gia"]?>USD/m2</span></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php }?>
    </div>            	                                   
</div-->
<div class="module_left">
	<div class="title">Tư vấn - Kinh nghiệm chọn văn phòng</div>
    <div class="content" id="news">
		<?php foreach($rs_news as $k=>$v){?>
		<div class="box_news  wow zoomIn">
			<div class="images">
				<img src="<?=thumb($v["photo"],_upload_tintuc_l,$v["tenkhongdau"],80,80,2,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" />
			</div>
			<div>
				<div class="name">
					<a href="tin-tuc/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" style="font-size: 13px; text-transform: none;" >
						<?=catchuoi($v["ten"],40)?>
					</a>
					<div class="date">
						Tháng <?=date("m , Y",$v["ngaytao"])?>
					</div>
				</div>
				
			</div>
			<div class="clear"></div>
			<div class="cat">
				<?=catchuoi($v["mota"],100)?>
			</div>
		</div>
		<?php }?>
    </div>            	                                   
</div>
