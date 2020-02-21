<?php
if (!defined('_source'))
    die("Error");
@$id = addslashes($_GET['id']);
@$idc = addslashes($_GET['idc']);
@$idq = addslashes($_GET['idq']);
if($com=="district"){
	$d->reset();
	$d->query("select ten,id, tenkhongdau, noidung, title, keywords, description from #_place_dist where id='" . $id . "'");
	$rs_menu = $d->fetch_array();
//check_data($d);
	$where_st="and dist='" . $rs_menu['id'] . "'";
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";

	$title_custom = $rs_menu['title'];
	$keywords_custom = $rs_menu['keywords'];
	$description_custom = $rs_menu['description'];
	//share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	//Lấy danh mục cấp con nổi bật

	$d->reset();
	$sql="select * from #_place_ward where id_dist='" . $rs_menu['id'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_ward=$d->result_array();
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='" . $rs_menu['id'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_street=$d->result_array();

	$title_bar = $rs_menu['ten'] . ' - ';
	$title_tcat = $rs_menu['ten'];

}else if($com=="ward"){
	$d->reset();
	$d->query("select ten,id, tenkhongdau, noidung, title, keywords, description, id_dist from #_place_ward where id='" . $id . "'");
	$rs_menu = $d->fetch_array();
	//check_data($d);
	$where_st="and ward='" . $rs_menu['id'] . "'";

	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";

	$title_custom = $rs_menu['title'];
	$keywords_custom = $rs_menu['keywords'];
	$description_custom = $rs_menu['description'];
	//share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	//Lấy danh mục cấp con nổi bật

	$d->reset();
	$sql="select * from #_place_ward where id_dist='" . $rs_menu['id_dist'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_ward=$d->result_array();
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='" . $rs_menu['id_dist'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_street=$d->result_array();

	$title_bar = $rs_menu['ten'] . ' - ';
	$title_tcat = 'Phường ' . $rs_menu['ten'];
	
}else if($com=="street"){

	$d->reset();
	$d->query("select ten,id, tenkhongdau, noidung, title, keywords, description, id_dist from #_place_street where id='" . $id . "'");
	$rs_menu = $d->fetch_array();
	//check_data($d);
	$where_st="and street='" . $rs_menu['id'] . "'";

	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";

	$title_custom = $rs_menu['title'];
	$keywords_custom = $rs_menu['keywords'];
	$description_custom = $rs_menu['description'];
	//share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	//Lấy danh mục cấp con nổi bật

	$d->reset();
	$sql="select * from #_place_ward where id_dist='" . $rs_menu['id_dist'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_ward=$d->result_array();
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='" . $rs_menu['id_dist'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_street=$d->result_array();

	$title_bar = $rs_menu['ten'] . ' - ';
	$title_tcat ='Đường ' . $rs_menu['ten'];
	//check_data($title_tcat);



}
else if($com=="dien-tich"){
	$d->reset();
	$d->query("select ten,id, tenkhongdau, title, keywords, description from #_dientich where id='" . $id . "'");
	$rs_menu = $d->fetch_array();
	//check_data($d);
	$where_st="and  find_in_set('" . $rs_menu['id'] . "',id_dientich)>0";
	if($idq!=''){
		$d->reset();
		$d->query("select ten,id,title,keywords,description,noidung, tenkhongdau from #_place_dist where tenkhongdau='" . $idq . "'");	
		$rs_wards = $d->fetch_array();
		
		$where_st.=" and dist='" . $rs_wards["id"] . "'";
		$noidungw="<b class='blue'>Thuê văn phòng ".$rs_wards["ten"]." giá tốt</b>: ".$row_setting["ten_".$lang]." chuyên cho thuê văn phòng tại ".$rs_wards["ten"]." nhiều diện tích và vị trí tốt nhất với giá tiết kiệm lâu dài, giảm chi phí dịch vụ ngoài giờ,... Dựa theo lựa chọn của Quý Khách với diện tích thuê từ <b class='black'>".$rs_menu["ten"]."</b> thì hệ thống của Office Saigon đã lọc ra những sản phẩm tốt nhất để Quý Khách có thể lựa những sản phẩm phù hợp. Ngoài ra, ".$row_setting["ten_".$lang]." với đội ngũ chuyên viên tư vấn trên 30 nhân sự sẽ giúp tư vấn Quý Khách có những lựa chọn nhanh chóng và tiết kiệm thời gian. Đừng ngần ngại gọi cho chúng tôi để có thêm những chính sách ưu đãi tốt nhất - Hotline: <b class='red'>".$row_setting["hotline"]."</b>";
	}else{
		$noidungw="<b class='blue'>Thuê văn phòng HCM giá tốt</b>: ".$row_setting["ten_".$lang]." chuyên cho thuê văn phòng tại HCM nhiều diện tích và vị trí tốt nhất với giá tiết kiệm lâu dài, giảm chi phí dịch vụ ngoài giờ,... Dựa theo lựa chọn của Quý Khách với diện tích thuê từ <b class='black'>".$rs_menu["ten"]."</b> thì hệ thống của Office Saigon đã lọc ra những sản phẩm tốt nhất để Quý Khách có thể lựa những sản phẩm phù hợp. Ngoài ra, ".$row_setting["ten_".$lang]." với đội ngũ chuyên viên tư vấn trên 30 nhân sự sẽ giúp tư vấn Quý Khách có những lựa chọn nhanh chóng và tiết kiệm thời gian. Đừng ngần ngại gọi cho chúng tôi để có thêm những chính sách ưu đãi tốt nhất - Hotline: <b class='red'>".$row_setting["hotline"]."</b>";
	}

	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";

	$title_custom = $rs_menu['title'];
	if($title_custom==''){
		$title_custom = $title_bar;
	}
	$keywords_custom = $rs_menu['keywords'];
	$description_custom = $rs_menu['description'];
	//share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	//Lấy danh mục cấp con nổi bật
	$title_tcat="Văn phòng cho thuê diện tích ".$rs_menu["ten"]." ".$rs_wards["ten"];
	$title_bar="Văn phòng cho thuê diện tích ".$rs_menu["ten"]." ".$rs_wards["ten"];
	
}else if($com=="gia-thue"){
		$d->reset();
	$d->query("select ten,id, tenkhongdau, title, keywords, description from #_giasearch where id='" . $id . "'");
	$rs_menu = $d->fetch_array();
	//check_data($d);
	$where_st="and  find_in_set('" . $rs_menu['id'] . "',id_giasearch)>0";
	if($idq!=''){
		$d->reset();
		$d->query("select ten,id,title,keywords,description,noidung, tenkhongdau from #_place_dist where tenkhongdau='" . $idq . "'");	
		$rs_wards = $d->fetch_array();
		
		$where_st.=" and dist='" . $rs_wards["id"] . "'";
		$noidungw="<b class='blue'>Thuê văn phòng ".$rs_wards["ten"]." giá tốt</b>: ".$row_setting["ten_".$lang]." chuyên cho thuê văn phòng tại ".$rs_wards["ten"]." nhiều diện tích và vị trí tốt nhất với giá tiết kiệm lâu dài, giảm chi phí dịch vụ ngoài giờ,... Dựa theo lựa chọn của Quý Khách với mức thuê từ <b class='black'>".$rs_menu["ten"]."</b> thì hệ thống của Office Saigon đã lọc ra những sản phẩm tốt nhất tại ".$rs_wards["ten"]." để Quý Khách có thể lựa những sản phẩm phù hợp. Ngoài ra, ".$row_setting["ten_".$lang]." với đội ngũ chuyên viên tư vấn trên 30 nhân sự sẽ giúp tư vấn Quý Khách có những lựa chọn nhanh chóng và tiết kiệm thời gian. Đừng ngần ngại gọi cho chúng tôi để có thêm những chính sách ưu đãi tốt nhất - Hotline: <b class='red'>".$row_setting["hotline"]."</b>";
	}else{
		$noidungw="<b class='blue'>Thuê văn phòng HCM giá tốt</b>: ".$row_setting["ten_".$lang]." chuyên cho thuê văn phòng tại HCM nhiều diện tích và vị trí tốt nhất với giá tiết kiệm lâu dài, giảm chi phí dịch vụ ngoài giờ,... Dựa theo lựa chọn của Quý Khách với mức thuê từ <b class='black'>".$rs_menu["ten"]."</b> thì hệ thống của Office Saigon đã lọc ra những sản phẩm tốt nhất để Quý Khách có thể lựa những sản phẩm phù hợp. Ngoài ra, ".$row_setting["ten_".$lang]." với đội ngũ chuyên viên tư vấn trên 30 nhân sự sẽ giúp tư vấn Quý Khách có những lựa chọn nhanh chóng và tiết kiệm thời gian. Đừng ngần ngại gọi cho chúng tôi để có thêm những chính sách ưu đãi tốt nhất - Hotline: <b class='red'>".$row_setting["hotline"]."</b>";
	}
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";

	//share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	$title_tcat="Văn phòng cho thuê giá ".$rs_menu["ten"]." ".$rs_wards["ten"];
	$title_bar="Văn phòng cho thuê giá ".$rs_menu["ten"]." ".$rs_wards["ten"];
	
	$title_custom = $rs_menu['title'];
	if($title_custom==''){
		$title_custom = $title_bar;
	}
	$keywords_custom = $rs_menu['keywords'];
	$description_custom = $rs_menu['description'];
}else if($com=="huong"){
		$d->reset();
	$d->query("select * from #_huong where id='" . $id . "'");
	$rs_menu = $d->fetch_array();
	//check_data($d);
	$where_st="and  id_huong='".$id."'";
	if($idq!=''){
		$d->reset();
		$d->query("select ten,id,title,keywords,description,noidung, tenkhongdau from #_place_dist where tenkhongdau='" . $idq . "'");	
		$rs_wards = $d->fetch_array();
		
		$where_st.=" and dist='" . $rs_wards["id"] . "'";
		$noidungw="<b class='blue'>Thuê văn phòng ".$rs_wards["ten"]." giá tốt</b>: ".$row_setting["ten_".$lang]." chuyên cho thuê văn phòng tại ".$rs_wards["ten"]." nhiều diện tích và vị trí tốt nhất với giá tiết kiệm lâu dài, giảm chi phí dịch vụ ngoài giờ,... Dựa theo lựa chọn của Quý Khách với mức thuê từ <b class='black'>".$rs_menu["ten"]."</b> thì hệ thống của Office Saigon đã lọc ra những sản phẩm tốt nhất tại ".$rs_wards["ten"]." để Quý Khách có thể lựa những sản phẩm phù hợp. Ngoài ra, ".$row_setting["ten_".$lang]." với đội ngũ chuyên viên tư vấn trên 30 nhân sự sẽ giúp tư vấn Quý Khách có những lựa chọn nhanh chóng và tiết kiệm thời gian. Đừng ngần ngại gọi cho chúng tôi để có thêm những chính sách ưu đãi tốt nhất - Hotline: <b class='red'>".$row_setting["hotline"]."</b>";
	}else{
		$noidungw="<b class='blue'>Thuê văn phòng HCM giá tốt</b>: ".$row_setting["ten_".$lang]." chuyên cho thuê văn phòng tại HCM nhiều diện tích và vị trí tốt nhất với giá tiết kiệm lâu dài, giảm chi phí dịch vụ ngoài giờ,... Dựa theo lựa chọn của Quý Khách với mức thuê từ <b class='black'>".$rs_menu["ten"]."</b> thì hệ thống của Office Saigon đã lọc ra những sản phẩm tốt nhất để Quý Khách có thể lựa những sản phẩm phù hợp. Ngoài ra, ".$row_setting["ten_".$lang]." với đội ngũ chuyên viên tư vấn trên 30 nhân sự sẽ giúp tư vấn Quý Khách có những lựa chọn nhanh chóng và tiết kiệm thời gian. Đừng ngần ngại gọi cho chúng tôi để có thêm những chính sách ưu đãi tốt nhất - Hotline: <b class='red'>".$row_setting["hotline"]."</b>";
	}
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$breakcrumb.="<li class='active'>".$rs_menu["ten"]."</li>";

	//share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	$title_tcat="Văn phòng cho thuê ".$rs_menu["ten"]." ".$rs_wards["ten"];
	$title_bar="Văn phòng cho thuê ".$rs_menu["ten"]." ".$rs_wards["ten"];
	
	$title_custom = $rs_menu['title'];
	if($title_custom==''){
		$title_custom = $title_bar;
	}
	$keywords_custom = $rs_menu['keywords'];
	$description_custom = $rs_menu['description'];
}

if($idc>0){
	$where_st.=' and id_list="'.$idc.'"';
}





	$d->reset();
	$sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,spbc,noibat,giakm,rate, luot_rate,masp, id_list, mota_$lang as mota, spkm, donvi, dientich, dist,vitri, id_huong from #_product where hienthi=1 $where_st order by stt, id desc";
	$d->query($sql);
	//dump($d);
	$product = $d->result_array();
	

	$tongsanpham = count($tintuc);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url = getCurrentPageURL();
	$maxR = 36;
	$maxP = 5;
	$paging = paging_home($product, $url, $curPage, $maxR, $maxP);
	$product = $paging['source'];
?>