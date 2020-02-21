<?php
$d->query("select ten_vi, id,url, photo from #_icon where hienthi=1 order by stt");
$icon = $d->result_array();

$d->reset();
$sql_banner_giua = "select photo_$lang as photo from #_photo where com='banner_top' order by id desc";
$d->query($sql_banner_giua);
$row_banner_giua = $d->result_array();


$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, fontawesome, dist,value_menu from #_product_list where com=1 and type='van-phong-tron-goi' and hienthi=1 order by stt, id desc";
$d->query($sql);
$vptg=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, fontawesome, dist,value_menu from #_product_list where com=1 and type='toa-nha-nguyen-can' and hienthi=1 order by stt, id desc";
$d->query($sql);
$tnnc=$d->result_array();



$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, fontawesome, dist,value_menu from #_product_list where com=1 and type='san-pham' and hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_list=$d->result_array();
//check_data($rs_list);

function dist_menu($id, $tenkhongdau, $id_list){
	global $d;
	$d->reset();
	$sql="select ten, tenkhongdau, id from #_place_dist where id='".$id."'";
	$d->query($sql);
	$rs=$d->fetch_array();
	$kq='<li><a href="'.$tenkhongdau.'-'.$id_list."/".$rs["tenkhongdau"]."-".$rs["id"].'">'.$rs["ten"].'</a></li>';
	return $kq;
}
?> 
<ul class="container" >
	<li>
		<a href="http://<?=$config_url?>" <?php if($source=="index") echo 'class="active"'; ?> title="<?=_trangchu?>" >
			
			<span><?=_trangchu?></span>
		</a>
	</li>
	<li>
		<a href="van-phong.html" title="Văn phòng HCM" >
			
			<span>Văn phòng HCM</span>
		</a>
		<ul>
			<?php
				$d->reset();
				$sql="select ten, tenkhongdau, id from #_place_dist where id_city=1 and hienthi=1 order by stt, id desc";
				$d->query($sql);
				$rs_list_vp=$d->result_array();
				foreach($rs_list_vp as $v){
			?>
			<li><a href="van-phong-<?=$v["tenkhongdau"]?>/"><?=$v["ten"]?></a></li>
			<?php }?>
		</ul>
	</li>
	<?php foreach($rs_list as $v){
		$d->reset();
		$sql="select ten_$lang as ten, tenkhongdau, id from #_product_list where id_parent='".$v["id"]."' order by stt, id desc";
		$d->query($sql);
		$rs_cat=$d->result_array();
		//check_data($rs_cat);
	?>
	<li><a href="<?=$v["tenkhongdau"]?>-<?=$v["id"]?>">
			
			<span><?=$v["ten"]?></span>
		</a>
		<ul>
		<?php
			if($v["value_menu"]==1){
				foreach ($rs_cat as $key => $value) {?>
					<li><a href="<?=$value["tenkhongdau"]?>-<?=$value["id"]?>"><?=$value["ten"]?></a></li>
				<?php }
			}?>

			<?php if($v["value_menu"]>1){
				$array_list=explode(",",$v["dist"]); 
				if(!empty($array_list)){ ?>		
					<?php foreach($array_list as $v1){ if($v1!=''){?>
						<?=dist_menu($v1,$v["tenkhongdau"],$v["id"])?>
					<?php }}?>
				<?php }
			}?>
		</ul>
	</li>
	<?php }?>

	

	<li class="hidden-md"><a href="gioi-thieu.html" <?php if($_GET["com"]=="gioi-thieu") echo 'class="active"'; ?>  title="<?=_gioithieu?>" ><p><i class="fa fa-comment-o" aria-hidden="true"></i></p><span><?=_gioithieu?></span></a></li>
	<li class="hidden-md"><a href="tin-tuc.html" <?php if($_GET["com"]=="tin-tuc") echo 'class="active"'; ?>  title="<?=_tintuc?>" ><p><i class="fa fa-newspaper-o" aria-hidden="true"></i></p><span><?=_tintuc?></span></a></li>
	<li class="hidden-md"><a href="tin-tuc.html" <?php if($_GET["com"]=="tin-tuc") echo 'class="active"'; ?>  title="<?=_tintuc?>" ><p><i class="fa fa-newspaper-o" aria-hidden="true"></i></p><span><?=_tintuc?></span></a></li>
	<li class="hidden-md"><a href="tuyen-dung.html" <?php if($_GET["com"]=="tuyen-dung") echo 'class="active"'; ?>  title="<?=_tuyendung?>" ><p><i class="fa fa-handshake-o" aria-hidden="true"></i></p><span><?=_tuyendung?></span></a></li>
	<li class="hidden-md"><a href="bang-gia.html" <?php if($_GET["com"]=="bang-gia") echo 'class="active"'; ?>  title="Bảng giá" ><p><i class="fa fa-print" aria-hidden="true"></i></p><span>Bảng giá</span></a></li>
	<li class="hidden-md"><a href="lien-he.html" <?php if($_GET["com"]=="lien-he") echo 'class="active"'; ?>  title="<?=_lienhe?>" rel="<?=($source=="index") ? "contact" : "";?>" ><p><i class="fa fa-envelope" aria-hidden="true"></i></p><span><?=_lienhe?></span></a></li>
</ul>

