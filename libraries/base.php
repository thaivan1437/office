<?php 
function __autoload($class){
	die("Y");
    include_once _lib."/class.$class.php";
}
	@define ( '_lib' , './libraries/');
	@define ( '_source' , './sources/');
	@define ( _cache_folder , './cache/' );//Folder lưu cache
	@define ( _cache_time , '0' );//Thời gian lưu cache	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."class.database.php";	
	include_once _lib."assets.php";	
	include_once _lib."functions.php";
	include_once _lib."library.php";
	$d = new database($config['database']);
	$assets = new Assets();
	$assets->setDeveloper($config['developer']);
	//$cache = phpFastCache();
	$keyword_webpage = md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']);
	
	/* if($assets->is_dev){
		$cache->delete($keyword_webpage); // For removing a cached thing
		$cache->clean();
		$chtml = false;
	}else{
		
		$chtml = __c("files")->get($keyword_webpage);
		
	} */
	
	$chtml  = false;
	if(!$chtml) {
		
	/* include_once _lib."class.setting.php";
	
	include_once _lib."class.product.php";
	include_once _lib."class.post.php";	
	include_once _lib."class.info.php";	
	include_once _lib."class.yahoo.php";
//	include_once _lib."class.lkweb.php";
	include_once _lib."class.video.php";	
	include_once _lib."class.photo.php";
	include_once _lib."class.cart.php";
	include_once _lib."class.useronline.php"; */
	

	/* $setting = new Setting($d,true);
	$setting->Construct();
	$lang = $setting->getLang();
	$product = new Product($d);
	$yahoo = new Yahoo($d);
	$photo = new Photo($d);
	$post = new Post($d);
	$video = new Video($d);
	$cart = new Cart($d);
	$info = new Info($d);
	
	$useronline = new Useronline($d); */
	
	
	
	// add css and js
	
	
	$assets->addJs("js/jquery.min.js");
	$assets->addJs("assets/bootstrap-3.2.0/js/bootstrap.js");
	$assets->addJs("assets/js/script.js");
	$assets->addJs("assets/js/owlcarousel/owl.carousel.js");
	$assets->addJs("assets/js/menu/menumaker.js");
	$assets->addJs("assets/js/rating/star-rating.js");
	$assets->addJs("assets/js/ivewslider/raphael-min.js");
	$assets->addJs("assets/js/ivewslider/jquery.easing.js");
	$assets->addJs("assets/js/ivewslider/iview.js");
	$assets->addJs("assets/js/custom-scrollbar/jquery.mCustomScrollbar.js");
	$assets->addJs("assets/js/chosen/chosen.jquery.js");
	
	
	$assets->addCss("assets/font/font-awesome-4.2.0/css/font-awesome.css");
	$assets->addCss("assets/bootstrap-3.2.0/css/bootstrap.css");
	$assets->addCss("assets/css/font.css");
	$assets->addCss("assets/css/animate.css");
	$assets->addCss("assets/js/jquery.bxslider/jquery.bxslider.css");
	$assets->addCss("assets/js/menu/menumaker.css");
	$assets->addCss("assets/css/style.css");
	$assets->addCss("assets/js/sweet-alert/sweet-alert.css");
	
	
	
	}