<?php

if (!defined('_source'))
    die("Error");



@$idq = addslashes($_GET['idq']);
@$idc = addslashes($_GET['idc']);
@$idi = addslashes($_GET['idi']);
@$id = addslashes($_GET['id']);
@$dist = addslashes($_GET['dist']);

if ($id != '') {
    # Cap nhat so lan xem
    $sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);

	
    $d->reset();
    $sql_detail = "select title_$lang as title,keywords_$lang as keywords,description_$lang as description,id_list,id,photo,ten_$lang as ten,tenkhongdau,gia,giakm,noidung_$lang as noidung,luotxem, list_id,mota_$lang as mota,masp,id_item, h1, h2, h3,rate, luot_rate, tag_$lang as tag, tag_slug_$lang as tag_slug, spkm,city, gia_vp_ao, gia_cho_ngoi, gia_thue_phong, chu_dau_tu, loai_vp, gia_theo_thang, vat, dist, ward, street, dientich, template_vp, baogomdienlanh, donvi, toado,table_product.* from #_product where hienthi=1 and id='" . $id . "'";
    $d->query($sql_detail);

    $row_detail = $d->fetch_array();
	
	$x = explode(",",$row_detail['tag']);
	foreach($x as $k2=>$v2){
		if($v2){
			$list_kw[trim($v2)] = 1;
		}
	}
	
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id from #_product_list where find_in_set(".$row_detail["id_list"].", replace(set_level, '|', ','))>0 and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_menu_left=$d->result_array();

    $title_bar = $row_detail['ten'];
    $title_custom = $row_detail['title'];
    $keywords_custom = $row_detail['keywords'];
    $description_custom = $row_detail['description'];
	
	if($keywords_custom==""){
		$keywords_custom=trim($row_detail['ten']);
	}
	if($description_custom==""){
		$description_custom="Cho thuê văn phòng tòa nhà ".trim($row_detail['ten'])." Liên hệ 0905.22.00.55 Email: info@vietoffice.vn. VIETOFFICE luôn cam kết: ĐẢM BẢO SỰ HÀI LÒNG CHO TẤT CẢ QUÝ KHÁCH HÀNG";
	}
	if($title_custom==""){
		$title_custom="Cho thuê văn phòng tòa nhà ".trim($row_detail['ten']);
	}
	$d->reset();
$sql="select * from #_place_dist where id=".$row_detail["dist"]." and hienthi=1 order by stt";
$d->query($sql);
$quancc=$d->fetch_array();
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li> <li><a href="http://'.$config_url.'">'.$quancc["ten"].'</a></li>';
	$arr=explode(",",$row_detail["list_id"]);
	$arr_breakcumb[0]=array("url"=>"http://".$config_url,"name"=>"Trang chủ");
	$arr_breakcumb[1]=array("url"=>"http://".$config_url."/san-pham.html","name"=>"Sản phẩm");
	$arr=explode(",",$row_detail["list_id"]);
	$dem=2;
	/*if(!empty($arr)){
		foreach($arr as $k=>$v){
			
			$d->query("select tenkhongdau, ten_vi, id from #_product_list where id='".$v."'");
			$rs=$d->fetch_array();
			if(!empty($rs)){
			$breakcrumb.='<li><a href="'.$rs["tenkhongdau"].'-'.$rs["id"].'/">'.$rs["ten_vi"].'</a> </li>';
				$arr_breakcumb[$dem]=array("url"=>"http://".$config_url."/".$rs["tenkhongdau"].'-'.$rs["id"].'/',"name"=>$rs["ten_vi"]);
				$dem++;
			}
		}
	}*/
	$breakcrumb.='<li class="active">'.$row_detail["ten"].'</li>';
	$arr_breakcumb[$dem+1]=array("url"=>"http://".$config_url."/".$com."/".$rs["tenkhongdau"].'-'.$rs["id"].'.html',"name"=>$row_detail["ten"]);
	
	$h1_custom=$row_detail['h1'];
	$h2_custom=$row_detail['h2'];
	$h3_custom=$row_detail['h3'];
	//share
	if($row_detail["photo"]==''){
		$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	}else{
		$image_share='http://' . $config_url .'/'. _upload_product_l.$row_detail["photo"];
	}
    $sql_hinhanh = "select photo,thumb,thumb1,id from #_product_hinhanh where hienthi=1 and id_photo = '" . $row_detail['id'] . "' order by stt,id desc";
    $d->query($sql_hinhanh);
    $row_hinhanhsp11 = $d->result_array();

    $d->reset();
    $sql_sanphamkhac = "select id,thumb,ten_$lang as ten,photo,tenkhongdau,gia,masp,spbc,giakm,rate, luot_rate,noibat, luotxem, id_list, spkm, donvi, dientich, dist from #_product where hienthi=1 and id !='" . $row_detail["id"] . "' and find_in_set('" . $row_detail['id_list'] . "',list_id)>0  order by gia,stt,ngaytao desc limit 0,3";
    $d->query($sql_sanphamkhac);
    $sanpham_khac = $d->result_array();
	
	$d->reset();
	$sql="select * from #_place_ward where id_dist='" . $row_detail['dist'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_ward=$d->result_array();
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='" . $row_detail['dist'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_street=$d->result_array();


	$d->reset();
	$sql="select id, ten_$lang as ten, tenkhongdau, photo, mota_$lang as mota,gia from #_product where find_in_set('" . $row_detail['street'] . "',street)>0 and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_toanha_street=$d->result_array();
	//check_data($rs_toanha_street);


	
	$d->reset();
	$d->query("select id, ten_$lang as ten, tenkhongdau, photo, mota_$lang as mota, ngaytao from #_about where type='cam-ket' and hienthi=1  order by stt, id desc");
	$rs_camket = $d->result_array();
	
	$d->reset();
    $sql = "select id,thumb,ten_$lang as ten,photo,tenkhongdau,gia,masp,spbc,giakm,rate, luot_rate,noibat, luotxem, id_list, spkm, donvi, dientich, dist, vitri from #_product where hienthi=1 and id !='" . $row_detail["id"] . "' and dist='" . $row_detail['dist'] . "' order by gia,stt,ngaytao desc limit 0,8";
    $d->query($sql);
    $sanpham_dist = $d->result_array();
	
	$d->reset();
    $sql = "select id,thumb,ten_$lang as ten,photo,tenkhongdau,gia,masp,spbc,giakm,rate, luot_rate,noibat, luotxem, id_list, spkm, donvi, dientich, dist from #_product where hienthi=1 and id !='" . $row_detail["id"] . "' and street='" . $row_detail['street'] . "' order by gia,stt,ngaytao desc limit 0,6";
    $d->query($sql);
    $sanpham_street = $d->result_array();
	
	$d->reset();
	$sql="select tenkhongdau, id from #_place_dist where id='".$row_detail["dist"]."'";
	$d->query($sql);
	$rs_dist_fetch=$d->fetch_array();
	
	$d->reset();
	$sql="select tenkhongdau, id from #_place_street where id='".$row_detail["street"]."'";
	$d->query($sql);
	$rs_street_fetch=$d->fetch_array();
} else if ($idc != '') {
    $d->query("select ten_$lang as ten,id, id_parent, set_level,avata, photo, h1, h2, h3,noidung_$lang as noidung, title_$lang as title, keywords_$lang as keywords, description_$lang as description,com from #_product_list where id='" . $idc . "'");
	
    $rs_menu = $d->fetch_array();
	
	$idcc=$rs_menu["id"];
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
	$arr_breakcumb[0]=array("url"=>"http://".$config_url,"name"=>"Trang chủ");
	$arr_breakcumb[1]=array("url"=>"http://".$config_url."/".$com.".html","name"=>$title_tcat);
	$arr=explode("|",$rs_menu["set_level"]);
	$dem=2;
	/*foreach($arr as $v){
		if($v!=''){
			$d->query("select tenkhongdau, ten_$lang as ten, id from #_product_list where id='".$v."'");
			$rs=$d->fetch_array();
			$arr_breakcumb[$dem]=array("url"=>"http://".$config_url."/".$rs["tenkhongdau"].'-'.$rs["id"]."/","name"=>$rs["ten"]);
			$breakcrumb.='<li><a href="'.$rs["tenkhongdau"].'-'.$rs["id"].'/">'.$rs["ten"].'</a></li>';
			$dem++;
		}
	}*/
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
	if($dist > 0){
    	$que= "and dist='".$dist."'";
   }
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
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,spbc,noibat,giakm,rate, luot_rate,masp, id_list, mota_$lang as mota, spkm, donvi, dientich, dist,table_product.* from #_product where hienthi=1 and find_in_set('" . $rs_menu['id'] . "',list_id)>0 $que order by gia,stt, id desc";
    $d->query($sql);
	//dump($d);
    $product = $d->result_array();

    $tongsanpham = count($tintuc);
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 27;
    $maxP = 5;
    $paging = paging_home($product, $url, $curPage, $maxR, $maxP);
    $product = $paging['source'];

}else if($idq!=""){ // lấy ten khong dau truy van id quan sau do truy van sp
	
	$idq1=$idq;
	$d->query("select ten,id,title,keywords,description,noidung, tenkhongdau from #_place_dist where tenkhongdau='" . $idq . "'");	
    $rs_wards = $d->fetch_array();
	//check_data($rs_ward);




	$d->reset();
	$sql="select * from #_place_ward where id_dist='" . $rs_wards['id'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_ward=$d->result_array();
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='" . $rs_wards['id'] . "' and hienthi=1 order by ten, id desc";
	$d->query($sql);
	$rs_danhmuc_street=$d->result_array();




	
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';

	$breakcrumb.="<li class='active'>".$rs_wards["ten"]."</li>";
	
	$h1_custom=$rs_menu['h1'];
	$h2_custom=$rs_menu['h2'];
	$h3_custom=$rs_menu['h3'];
	$title_custom = $rs_wards['title'];
    $keywords_custom = $rs_wards['keywords'];
    $description_custom = $rs_wards['description'];
    $noidungw = $rs_wards['noidung'];
	//share
	if($row_detail["photo"]==''){
		$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	}else{
		$image_share='http://' . $config_url .'/'. _upload_product_l.$rs_wards["photo"];
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

    $title_bar = $rs_wards['ten'] . ' - ';
    $title_tcat = $rs_wards['ten'];
	
	
	$d->reset();
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,spbc,noibat,giakm,rate, luot_rate,masp, id_list, mota_$lang as mota, spkm, donvi, dientich, dist,table_product.* from #_product where hienthi=1 and find_in_set('" . $rs_wards['id'] . "',dist)>0  $que order by gia,stt, id desc";
    $d->query($sql);
	//dump($d);
    $product = $d->result_array();
    //check_data($product);

    $tongsanpham = count($tintuc);
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 27;
    $maxP = 5;
    $paging = paging_home($product, $url, $curPage, $maxR, $maxP);
    $product = $paging['source'];
} else {
	$where=' and type="'.$type.'"';
	// break crumb
	$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li><li class="active"> dịch vụ</li>';
	$arr_breakcumb[0]=array("url"=>"http://".$config_url,"name"=>"Trang chủ");
	$arr_breakcumb[1]=array("url"=>"http://".$config_url."/".$com.".html","name"=>$title_tcat);
	#share
	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
	
    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,giakm,rate, luot_rate, id_list, mota_$lang as mota, spkm, masp, donvi, dientich, dist,table_product.* from #_product where hienthi=1 $where order by gia,stt, id desc";
    $d->query($sql);
    $product = $d->result_array();

    $tongsanpham = count($tintuc);
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 27;
    $maxP = 5;
    $paging = paging_home($product, $url, $curPage, $maxR, $maxP);
    $product = $paging['source'];
}
?>