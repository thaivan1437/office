<?php

if (!defined('_source'))
    die("Error");

$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';

$arr_breakcumb[0]=array("url"=>"http://".$config_url,"name"=>"Trang chủ");


	$d->reset();
	$sql="select ten, tenkhongdau, id from #_place_dist where noibat=1 and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_dist_index=$d->result_array();
	
	$d->reset();
	$sql="select ten, tenkhongdau, id from #_place_dist where id_city=1 and hienthi=1 order by stt, id desc";
	$d->query($sql);
	$list_quan=$d->result_array();
	

	$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
?>