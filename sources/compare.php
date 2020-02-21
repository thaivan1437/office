<?php
if (!defined('_source'))
    die("Error");  $class_dm="none_active";

	if(!is_array($_SESSION["compare"])){ transfer("Không có sản phẩm so sánh", "index.html");}else{
		foreach($_SESSION["compare"] as $k=>$v){
			//die('a');
			$d->reset();
			$sql="select ten_$lang as ten, tenkhongdau, id, photo,  gia, giakm, masp, id_list, mota_$lang as mota,table_product.* from #_product where id='".$v["productid"]."'";
			$d->query($sql);
			$rs_row=$d->fetch_array();
			foreach($rs_row as $k1=>$v1){
				$rs_compare[$k][$k1]=$v1;
			}
			//dump($rs_compare);
		}
	}
	// breakcrumb
	$title_tcat="So sánh sản phẩm";
	$title_bar="So sánh sản phẩm - ";
	$breakcrumb="<li><a href='http://".$config_url."'>Trang chủ </a></li><li class='active'>So sánh sản phẩm</li>";
	//share
	$image_share='http://' . $config_url.'/' ._upload_hinhanh_l.$row_photo["logo"];
?>