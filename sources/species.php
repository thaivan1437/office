<?php

if (!defined('_source'))
    die("Error");

@$idl = addslashes($_GET['idl']);
@$idc = addslashes($_GET['idc']);
@$idi = addslashes($_GET['idi']);
@$id = addslashes($_GET['id']);
	$d->reset();
	$d->query("select ten_$lang as ten,id, id_parent, set_level,avata, photo, h1, h2, h3,noidung_$lang as noidung, title_$lang as title, keywords_$lang as keywords, description_$lang as description,com from #_product_list where id='" . $id . "'");
    $rs_menu = $d->fetch_array();
	
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$arr=explode("|",$rs_menu["set_level"]);
	foreach($arr as $v){
		if($v!=''){
			$d->query("select tenkhongdau, ten_$lang as ten, id from #_product_list where id='".$v."'");
			$rs=$d->fetch_array();
			
			$breakcrumb.='<li><a href="'.$rs["tenkhongdau"].'-'.$rs["id"].'/">'.$rs["ten"].'</a></li>';
		}
	}
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";
	
	$h1_custom=$rs_menu['h1'];
	$h2_custom=$rs_menu['h2'];
	$h3_custom=$rs_menu['h3'];
	$title_custom = $rs_menu['title'];
    $keywords_custom = $rs_menu['keywords'];
    $description_custom = $rs_menu['description'];
	//share
	if($row_detail["photo"]==''){
		$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	}else{
		$image_share='http://' . $config_url .'/'. _upload_product_l.$rs_menu["photo"];
	}
	//Lấy danh mục cấp con nổi bật
	
	$d->reset();
	$sql="select * from #_product_list where find_in_set('" . $rs_menu['id'] . "',set_level)>0 and hienthi=1 and noibat>0 order by stt, id desc";
	$d->query($sql);
	$rs_danhmuc_child=$d->result_array();

	if($rs_menu["set_level"]!=''){
		$arr=explode("|",$rs_menu["set_level"]);
		$id_list=$arr[0];
	}else{ $id_list=$rs_menu["id"]; }

    $title_bar = $rs_menu['ten'] . ' - ';
    $title_tcat = $rs_menu['ten'];
	
	
	$d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,spbc,noibat,giakm,rate, luot_rate,masp, id_list, mota_$lang as mota, spkm, donvi, dientich from #_product where hienthi=1 and find_in_set('" . $rs_menu['id'] . "',list_id)>0 order by stt, id desc";
    $d->query($sql);
    $product = $d->result_array();

    $tongsanpham = count($tintuc);
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 16;
    $maxP = 5;
    $paging = paging_home($product, $url, $curPage, $maxR, $maxP);
    $product = $paging['source'];
?>