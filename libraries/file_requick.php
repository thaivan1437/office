<?php
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$d = new database($config['database']);

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();

//lấy logo trang
$d->reset();
$sql="select photo_$lang as photo, logo from #_photo where com='banner_top'";
$d->query($sql);
$row_photo = $d->fetch_array();

if(isset($_SESSION["login_web"]["id"]) && $_SESSION["login_web"]["id"]!=''){
	$d->reset();
	$sql="select * from #_member where id='".$_SESSION["login_web"]["id"]."'";
	$d->query($sql);
	$rs_user=$d->fetch_array();
}

$title_custom = '';
$keywords_custom = '';
$description_custom = '';

		
switch ($com) {
    case 'thoat':
        $source = "logout";
        $template = "index";
        break;
    
    case 'complete-nl':
        $source = "complete_nl";
        $template = "complete_nl";
        break;
    case 'complete':
        $source = "complete";
        $template = "complete";
        break;
	case 'success123':
			$source = "success123";
			$template ="success123";
			break;
	case 'xu-ly':
		$source = "index";
		$template ="success";
		break;
    case 'compare':
        $source = "compare";
        $template = "compare";
        break;
	case 'loi-thanh-toan':
		$source = "thanhtoan";
		$template ="thatbai";
		break;
	case 'notify123pay':
			$source = "notify";
			$template ="notify";
			break;
	case 'notify1':
		$source = "notify1";
		$template ="notify";
		break;
    case 'gioi-thieu':
        $source = "amthuc";
		$table="about";
		$type='gioi-thieu';
		$title_bar = _gioithieu . ' - ';
		$title_tcat = _gioithieu;
        $template = isset($_GET['id']) ? "about_detail" : "about";
        break;
	case 'bang-gia':
        $source = "about";
		$table='time';
		$type='bang-gia';
		$title_bar = 'Bảng giá - ';
		$title_tcat = 'Bảng giá';
        $template = isset($_GET['id']) ? "baiviet" : "baiviet";
        break;
	case 'tuyen-dung':
        $source = "about";
		$table='time';
		$type='tuyen-dung';
		$title_bar = 'Tuyển dụng - ';
		$title_tcat = 'Tuyển dụng';
        $template = isset($_GET['id']) ? "baiviet" : "baiviet";
        break;
	case 'tag':
        $source = "tag";
        $template = "product";
        break;

	case 'doi-tac':
		$table='about';
		$type="he-thong";
		$title_bar = _doitac .' - ';
		$title_tcat = _doitac;
        $source = "amthuc";
        $template = isset($_GET['id']) ? "about_detail" : "about";
        break;
	case 'san-giao-dich':
		$table='about';
		$type="dich-vu";
		$title_bar = 'Sản giao dịch BĐS - ';
		$title_tcat = 'Sản giao dịch BĐS';
        $source = "amthuc";
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;
	case 'tin-tuc':
		$table='about';
		$type="tin-tuc";
		$title_bar = _tintuc .' - ';
		$title_tcat = _tintuc;
        $source = "amthuc";
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;
	case 'cam-ket':
		$table='about';
		$type="cam-ket";
		$title_bar = 'Cam kết dịch vụ - ';
		$title_tcat = 'Cam kết dịch vụ';
        $source = "amthuc";
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;
	case 'link-huu-ich':
		$table='about';
		$type="link";
		$title_bar = 'Link hữu ích - ';
		$title_tcat = 'Link hữu ích';
        $source = "amthuc";
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;
	case 'phong-thuy':
		$table='about';
		$type="phong-thuy";
		$title_bar = 'Phong thủy - ';
		$title_tcat = 'Phong thủy';
        $source = "amthuc";
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;
	case 'thu-mua':
		$table='about';
		$type="xu-huong";
		$title_bar = 'Thu mua - ';
		$title_tcat = 'Thu mua';
        $source = "amthuc";
        $template = isset($_GET['id']) ? "news_detail" : "news";
        break;
	
	
    case 'thanh-toan-banking':
			$source = "banking";
			$template ="banking";
			break;
	case 'bang-gia':
		$source = "banggia";
		$template ="banggia";
		break;
    case 'hinh-anh-cong-ty':
        $source = "hinhanh";
        $template = isset($_GET['id']) ? "hinhanh_detail" : "hinhanh";
        break;
    case 'sitemap':
        $source = "sitemap";
        $template = "sitemap";
        break;
    

    case 'dat-lich':
        $source = "datlich";
        $template = "contact";
        break;
	case 'lien-he':
        $source = "contact";
        $template = "contact";
        break;
	case 'video':
        $source = "video";
        $template = "video";
        break;

    case 'tim-kiem':
        $source = "search";
        $template = "product";
        break;
    case 'gio-hang':
        $source = "giohang";
        $template = "giohang";
        break;
    case 'thanh-toan':
        $source = "thanhtoan";
        $template = "thanhtoan";
        break;
	case 'thanh-toan-step1':
        $source = "step1";
        $template = "step1";
        break;
    case 'ajax':
        $source = "ajax";
        break;
    
	case 'van-phong':
		$type='san-pham';
		$title_bar = 'Cho thuê văn phòng - ';
		$title_tcat = 'Cho thuê văn phòng';
        $source = "product";
        $typedm=1;
        $tem="vanphong";
        $template = isset($_GET['id']) ? "product_detail" : "product";
        break;

    case 'van-phong-tron-goi':
        $type='san-pham';
        $title_bar = 'Cho thuê văn phòng - ';
        $title_tcat = 'Cho thuê văn phòng';
        $source = "product";
        $typedm=2;
        $tem="vanphong";
        $template = isset($_GET['id']) ? "product_detail" : "product";
        break;

    case 'toa-nha-nguyen-can':
        $type='san-pham';
        $title_bar = 'Cho thuê văn phòng - ';
        $title_tcat = 'Cho thuê văn phòng';
        $source = "product";
        $typedm=3;
        $tem="vanphong";
        $template = isset($_GET['id']) ? "product_detail" : "product";
        break;

    case 'vanphong':
        $type='san-pham';
        $title_bar = 'Cho thuê văn phòng - ';
        $title_tcat = 'Cho thuê văn phòng';
        $source = "product";
        $tem="vanphong";
        $template = isset($_GET['id']) ? "product_detail" : "product";
        break;



	case 'huong':
		$type='san-pham';
        $source = "place";
        $template = "product";
        $tem="diachi";
        break;
	case 'district':
		$type='san-pham';
        $source = "place";
        $template = "product";
        $tem="diachi";
        break;
	case 'ward':
		$type='san-pham';
        $source = "place";
        $template = "product";
       $tem="diachi";
        break;
	case 'street':
		$type='san-pham';
        $source = "place";
        $template = "product";
       $tem="diachi";
        break;

    case 'dien-tich':
        $tit="xxx";
        $type='san-pham';
        $source = "place";
        $title_bar = 'Diện tích thuê - ';
        $title_tcat = 'Diện tích thuê';
        $template = "product";
        break;
    case 'gia-thue':
        $tit="xxx";
        $type='san-pham';
        $source = "place";
        $title_bar = 'Giá cho thuê - ';
        $title_tcat = 'Giá cho thuê';
        $template = "product";
        break;




	case 'species':
		$type='san-pham';
        $source = "species";
        $template = "product";
        break;
	
	case 'dang-ki':
        $source = "dangki";
        $template = "dangki";
        break;
	case 'login':
        $source = "member";
        $template = "dangnhap";
        break;
	case 'quen-mat-khau':
        $source = "dangki";
        $template = "quenmatkhau";
        break;
	case 'dang-nhap':
        $source = "dangki";
        $template = "dangnhap";
        break;
	case 'thong-tin-tai-khoan':
		$source = "user/thongtin";
		$template = "user/thongtin";
		break;
	case 'kiem-tra-don-hang':
		$source = "user/thongtin";
		$template = "user/thongtin";
		break;
	case 'user':
        switch ($act){
			case 'kich-hoat-tai-khoan':
				$source = "user/kichhoat";
				$template = "user/kichhoat";
				break;
		}
        break;
    case 'ngonngu':
        if (isset($_GET['lang'])) {
            switch ($_GET['lang']) {
                case 'vi':
                    $_SESSION['lang'] = 'vi';
                    break;
                case 'en':
                    $_SESSION['lang'] = 'en';
                    break;
                case 'jp':
                    $_SESSION['lang'] = 'jp';
                    break;
                default:
                    $_SESSION['lang'] = 'vi';
                    break;
            }
        } else {
            $_SESSION['lang'] = 'vi';
        }
        redirect($_SERVER['HTTP_REFERER']);
        break;

    default:
        $source = "index";
        $template = "index";
        break;
}

if ($source != "")
    include _source . $source . ".php";

if (isset($_REQUEST['com']) && $_REQUEST['com'] == 'logout') {
    session_unregister($login_name);
    header("Location:index.php");
}
?>