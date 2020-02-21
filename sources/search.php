<?php

if (!defined('_source'))
    die("Error");

    $keyword = $_GET['keyword'];
	$ward = $_GET['ward'];
	$street = $_GET['street'];
	$dist = $_GET['dist'];
	$dientich = $_GET['dientich'];
	$gia = $_GET['gia'];
	    $hang=$_GET['hang'];
    $huong=$_GET['huong'];
	//dump($_GET);

    $keyword = trim(strip_tags($keyword));
	if (get_magic_quotes_gpc() == false) {
        $keyword = mysql_real_escape_string($keyword);
    } 

    //echo $keyword;

	$where ='';
	if ($ward > 0) {
        $where.=' and ward="'.$ward.'"';
    }
	if ($street > 0) {
        $where.=' and street="'.$street.'"';
    }
	if ($dist > 0) {
        $where.=' and dist="'.$dist.'"';
    }
	if ($dientich > 0) {
		$d->reset();
		$sql="select * from #_dientich where id='".$dientich."'";
		$d->query($sql);
		$rs_price=$d->fetch_array();
		
		$d->reset();
		$sql="select * from #_product_dientich where dientich>".$rs_price["giatu"]." and dientich<".$rs_price["giaden"];
		$d->query($sql);
		$rs_a_id=$d->result_array();
		$array_id="";
		foreach($rs_a_id as $k=>$v){
			if($k==0){
				$array_id.=$v["id_product"];
			}else{
				$array_id.=', '.$v["id_product"];
			}
			
		}

		$where.=' and id IN ('.$array_id.')';
    }
    if ($gia > 0) {
		$d->reset();
		$sql="select * from #_giasearch where id='".$gia."'";
		$d->query($sql);
		$rs_price=$d->fetch_array();

		if($rs_price["giaden"]==0){
			$where.=" and gia>".$rs_price["giatu"]."";
		}else{
			$where.=" and gia>".$rs_price["giatu"]." and gia<".$rs_price["giaden"]."";
		}
		//$where.=" and donvi='".$rs_price["donvi"]."'";
    }
    if ($hang > 0) {
        $where.=' and loai="'.$hang.'"';
    }
     if ($huong > 0) {
        $where.=' and id_huong="'.$huong.'"';
    }
	if($keyword != '' ){
		
		$where.= " and (ten_vi LIKE '%$keyword%' or tenkhongdau LIKE '%$keyword%' )";
	}
	
	//dump($where);
    $title_tcat = 'Kết quả tìm kiếm';

    $sql = "select ten_$lang as ten,id,tenkhongdau,thumb,photo,gia,spbc,noibat,giakm,rate, luot_rate,masp, id_list, mota_$lang as mota, spkm, masp, dientich, donvi, id_cat, id_item, city, dist, vitri from #_product where hienthi=1 $where order by stt, id desc";
    $d->query($sql);
  //  check_data($d);
    $product = $d->result_array();
  //  check_data($product);

    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 27;
    $maxP = 2;
    $paging = paging_home($product, $url, $curPage, $maxR, $maxP);
    $product = $paging['source'];

?>