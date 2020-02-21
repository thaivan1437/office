<?php	if(!defined('_source')) die("Error");
	if($_SESSION['login_web']["username"]==''){
		transfer("Bạn chưa đăng nhập.", "dang-nhap.html");
	}
	$user=$_SESSION['login_web']["username"];
	
	$d->reset();
	$sql="select * from #_member where email='".$user."' ";
	$d->query($sql);
	$rs_user=$d->fetch_array();

	
	$d->reset();
	$sql="select * from #_place_city order by stt, id";
	$d->query($sql);
	$rs_p=$d->result_array();
	
	if($rs_user['province']!=''){ $whe=$rs_user['province'];}else{ $whe=$province;}
	$d->reset();
	$sql="select * from #_place_dist where id_city='".$whe."' order by stt, id";
	$d->query($sql);
	$rs_d=$d->result_array();
	
	if($rs_user['hometown_pro']!=''){ $whe=$rs_user['hometown_pro'];}else{ $whe=$province;}
	$d->reset();
	$sql="select * from #_place_dist where id_city='".$whe."' order by stt, id";
	$d->query($sql);
	$rs_d1=$d->result_array();
	
	$d->reset();
	$sql="select * from #_donhang where email='".$user."' order by id desc";
	$d->query($sql);
	$items_dh = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "thong-tin-tai-khoan.html";
    $maxR = 20;
    $maxP = 20;
    $paging = paging($items_dh, $url, $curPage, $maxR, $maxP);
    $items_dh = $paging['source'];
	
?>