<?php
session_start();
error_reporting(0);
$session = session_id();
@define('_lib', './libraries/');
@define(_upload_folder, './media/upload/');

include_once _lib . "Mobile_Detect.php";
$detect = new Mobile_Detect;
$check = $detect->isMobile();
$check2 = $detect->isTablet();
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
@define ( '_template' , './templates/');
@define('_source', './sources/');


if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'vi';
}

$lang = $_SESSION['lang']; //Lấy ngỗn ngữ
require_once _source . "lang_$lang.php";

include_once _lib . "config.php";

include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "class.database.php";
include_once _lib . "file_requick.php";
include_once _source . "counter.php";
include_once _source . "useronline.php";
ob_start("sanitize_output");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
    <head>
        <base href="https://<?= $config_url ?>/"  />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?></title>
        <meta name="keywords" content="<?= ($keywords_custom != '') ? $keywords_custom : $row_setting['keywords_' . $lang] ?>" />
        <meta name="description" content="<?= ($description_custom != '') ? $description_custom : $row_setting['description_' . $lang] ?>" />
        <meta name="author" content="<?=$row_setting["ten_vi"]?>" />
        <meta name="copyright" content="<?=$row_setting["ten_vi"]?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<meta name="DC.title" content="<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" />
		<meta name="DC.language" scheme="utf-8" content="vi" />
		<meta name="DC.identifier" content="<?= $row_setting['website'] ?>" />
		<meta name="robots" content="noodp,index,follow" />
		<meta name='revisit-after' content='1 days' />
		<meta http-equiv="content-language" content="vi" />
		<meta property="og:site_name" content="<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" />
		<meta property="og:url" content="<?= getCurrentPageUrl() ?>" />
		<meta type="og:url" content="<?= getCurrentPageUrl(); ?>" >
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" />
		<meta property="og:image" content="<?php echo (isset($image_share) ? $image_share : '')?>?>" />
		<meta property="og:description" content="<?= ($description_custom != '') ? $description_custom : $row_setting['description_' . $lang] ?>" />
		<link href="<?= _upload_hinhanh_l . $row_setting['fav'] ?>" rel="shortcut icon" type="image/x-icon" />
		<!--<link rel="stylesheet" type="text/css" href="assets/font/font-awesome-4.2.0/css/font-awesome.css"/>
		<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.2.0/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/font.css"/>
		<link rel="stylesheet" type="text/css" href="assets/js/owlcarousel/owl.carousel.css" media="screen" />
		<link href="assets/js/rating/star-rating.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="assets/js/menu/menumaker.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/popup.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="assets/js/magiczoomplus/magiczoomplus.css"/>
		<link rel="stylesheet" type="text/css" href="assets/js/ivewslider/style.css"/>
		<link rel="stylesheet" type="text/css" href="assets/js/ivewslider/iview.css"/>
		<link rel="stylesheet" type="text/css" href="assets/js/custom-scrollbar/jquery.mCustomScrollbar.css"/>-->
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>

		<style>
			<?php echo file_get_contents('https://'.$config_url.'/css.php');?>
		</style>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135471682-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135471682-1');
</script>
	<?php include _template . "layout/schema.php"; ?>
	</head>
	<body <?php if($source=="product" || $source=="contact") echo 'onLoad="initialize()"';?>>
		<a href="compare.html" class="icon_compaire" data-com="<?=get_total_compare()?>">
			<img src="assets/images/compare-icon-8.png" alt="So sánh văn phòng" /> So sánh
			<span><?=get_total_compare()?></span>
		</a>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".icon_compaire").click(function(){
					$sl=$(this).find("span").html();
					if($sl==0){ 
						$('body').append('<div class="login-popup"><div class="close-popup"></div><div class="sosanh"><div class="tit">So sánh văn phòng cho thuê</div><div><b>Quý khách có thể chọn 3 tòa nhà để so sánh</b></div><p><?=$row_setting["diachi_vi"]?></p><p><?=$row_setting["hotline"]?> - Email: <?=$row_setting["email"]?></p><div class="titde">Quý khách vui lòng chọn tòa nhà để so sánh</div><a href="van-phong.html" class="chon-toa-nha">Chọn tòa nhà</a></div></div>');
						$('.login-popup').fadeIn(300);
									
						var chieucao = $('.login-popup').height() / 2;
						var chieurong = $('.login-popup').width() /2;
						$('.login-popup').css({'margin-top':-chieucao,'margin-left':-chieurong});
						$('body').append('<div id="baophu"></div>');
						$('#baophu').fadeIn(300);
						
						$('#baophu, .close-popup').click(function(){
							$('#baophu, .login-popup').fadeOut(300, function(){
								$('#baophu').remove();
								$('.login-popup').remove();
							});			
						});
						return false;
					}
				})
			})
		</script>
		<div id="fb-root"></div>
		<script>(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=362166527297572&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div id="bg_page">
			<header >				    	             			           
				<?php include _template . "layout/banner.php"; ?>
			</header><!-- End header -->
			
			<section id="main">
				<article>
					<div class="box_slider" >
						<?php include _template . "layout/slideranh.php"; ?>
					</div>
					<div class="bg_container" >
						<div class="container">
							<?php if($source=="product" || $source=="search" || $source=="contact"){?>
								<div class="container_mid" id="content">
									<?php include _template . $template . "_tpl.php"; ?> 
								</div>
							
							<?php }else if($source=="place"){ ?>
								<div class="container_mid " id="content">
									<?php include _template . $template . "_tpl.php"; ?> 
								</div>
								
							<?php }else if($type=="tin-tuc"){ ?>
								<div class="container_mid container_right" id="content">
									<?php include _template . $template . "_tpl.php"; ?> 
								</div>
								<div class="container_left" id="content">
									<?php include _template . "layout/left1.php"; ?> 
								</div>
							<?php } else{?>
								<div class="container_mid container_right" id="content">
									<?php include _template . $template . "_tpl.php"; ?> 
								</div>
								<div class="container_left" id="content">
									<?php include _template . "layout/left.php"; ?> 
								</div>
							<?php }?>
							<div class="clear"></div>
						</div>
					</div><!-- End container right -->
					<?php if($source=="index"){ ?>
					<?php include _template . "layout/doitac.php"; ?>
					<?php } ?>
				</article>
			</section>		
			
		</div>
		<footer class="wow fadeInUp">
			<?php include _template . "layout/footer.php"; ?>
		</footer><!-- End footer --> 

		<div id="popub">
			<div class="allload"></div>
			<div class="popub">
				<div class="close"></div>
				<div class="tie">Danh sách so sánh</div>
				<div id="form">
					
				</div>
				<a href="compare.html" id="startBtn" class="btn btn-default">Xem kết quả</a>
			</div>
		</div>

<div class="modal fade in" id="myModal" role="dialog"  aria-hidden="false" style="">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        	<div class="modal-header">
		        <div class="md_hea">
		        	<div class="tit"> Thông tin liên hệ </div>
		        	<p class="dec"> <?=$row_setting["diachi_vi"]?> <br/>
		        		Điện thoai: <?=$row_setting["dienthoai_vi"]?> - Hotline:<a href="tel:<?=$row_setting["hotline"]?>"> <span><?=$row_setting["hotline"]?></span></a>
		        	</p>
		        </div>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
            <div class="modal-body">
                <form method="post" name="frm" class="forms" action="lien-he.html">
                    <div class="tbl-contacts">
                        <div class="pad-contact">
                            <input type="text" class="form-control" name="ten" id="ten" placeholder="Họ và tên" required="" oninvalid="this.setCustomValidity('_hotengui')" oninput="setCustomValidity('')">
                        </div>
                        
                        <div class="pad-contact">
                            <input class="form-control" name="dienthoai" id="dienthoai" placeholder="Điện thoại" type="number" required="" oninvalid="this.setCustomValidity('_dienthoaigui')" oninput="setCustomValidity('')">
                        </div>
                        <div class="pad-contact">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" oninvalid="this.setCustomValidity('_emailgui')" oninput="setCustomValidity('')">
                        </div>
                        <div class="pad-contact">
                            <textarea name="noidung" id="noidung" class="form-control" rows="3" required="" oninvalid="this.setCustomValidity('_noidunggui')" oninput="setCustomValidity('')"></textarea>
                        </div>

                        <div class="pad-contact">
                            <button type="submit" class="btn btn-success" onclick="">
                                Gửi </button>
                            <input class="btn btn-primary" type="reset" value=" Nhập lại " onclick="document.frm.reset();">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="myModal1" role="dialog"  aria-hidden="false" style="">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        	<div class="modal-header">
		        <div class="md_hea">
		        	<div class="tit"> Thông tin liên hệ </div>
		        	<p class="dec"> <?=$row_setting["diachi_vi"]?> <br/>
		        		Điện thoai: <?=$row_setting["dienthoai_vi"]?> - Hotline:<a href="tel:<?=$row_setting["hotline"]?>"> <span><?=$row_setting["hotline"]?></span></a>
		        	</p>
		        	<p> Văn phòng chọn xem : <span class="vpcdx"></span> </p>
		        </div>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
            <div class="modal-body">
                <form method="post" name="frm" class="forms" action="lien-he.html">
                    <div class="tbl-contacts">
                        <div class="pad-contact">
                            <input type="text" class="form-control" name="ten" id="ten" placeholder="Họ và tên" required="" oninvalid="this.setCustomValidity('_hotengui')" oninput="setCustomValidity('')">

                             <input type="hidden" class="form-control vpcdx1" name="tenvp" id="tenvp" value="" >
                        </div>

                        <div class="pad-contact">
                            <input class="form-control" name="dienthoai" id="dienthoai" placeholder="Điện thoại" type="number" required="" oninvalid="this.setCustomValidity('_dienthoaigui')" oninput="setCustomValidity('')">
                        </div>
                        <div class="pad-contact">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" oninvalid="this.setCustomValidity('_emailgui')" oninput="setCustomValidity('')">
                        </div>
                        <div class="pad-contact">
                            <input type="date" class="form-control" name="tieude1" id="tieude1" placeholder="Ngày đi xem" />
                        </div>
                        <div class="pad-contact">
                            <textarea name="noidung" id="noidung" class="form-control" rows="3" required="" oninvalid="this.setCustomValidity('_noidunggui')" oninput="setCustomValidity('')"></textarea>
                        </div>

                        <div class="pad-contact">
                            <button type="submit" class="btn btn-success" onclick="">
                                Gửi </button>
                            <input class="btn btn-primary" type="reset" value=" Nhập lại " onclick="document.frm.reset();">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>	
		<script type="text/javascript" src="assets/bootstrap-3.2.0/js/bootstrap.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
		<script type="text/javascript" src="assets/js/owlcarousel/owl.carousel.js"></script>
		<script type="text/javascript" src="assets/js/menu/menumaker.js"></script>
		<script src="assets/js/rating/star-rating.js" type="text/javascript"></script>
		<script>var base_url = 'http://<?=$config_url?>';  </script>
		<script type="text/javascript" src="assets/js/ivewslider/raphael-min.js"></script>
		<script type="text/javascript" src="assets/js/ivewslider/jquery.easing.js"></script>
		<script src="assets/js/ivewslider/iview.js"></script>
		<script src="assets/js/custom-scrollbar/jquery.mCustomScrollbar.js"></script>
		<!-- Init Plugin -->
		<script type="text/javascript" src="assets/js/chosen/chosen.jquery.js"></script>
		<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBeH3CkH9euOWqWu8vvgTOBMrTOnAF6Lb0'>
		</script>
		<!--script src="assets/js/gmaps.js" type="text/javascript" ></script-->
		<?php $arr=(explode(",",$row_setting['toado']));?>
		<script type="text/javascript">
			function validEmail1(obj) {
				var s = obj.value;
				for (var i = 0; i < s.length; i++)
					if (s.charAt(i) == " ") {
						return false;
					}
				var elem, elem1;
				elem = s.split("@");
				if (elem.length != 2)
					return false;

				if (elem[0].length == 0 || elem[1].length == 0)
					return false;

				if (elem[1].indexOf(".") == -1)
					return false;

				elem1 = elem[1].split(".");
				for (var i = 0; i < elem1.length; i++)
					if (elem1[i].length == 0)
						return false;
				return true;
			}//Kiem tra dang email

			function checkemail() {
				var frm = document.subscribe_form;
				var email = document.getElementById("email_newsletter").value;
				if (frm.email_newsletter.value == '')
				{
					alert("Bạn chưa điền email.");
					frm.email_newsletter.value = "";
					frm.email_newsletter.focus();
					return false;
				}

				if (!validEmail1(frm.email_newsletter)) {
					alert('Vui lòng nhập đúng địa chỉ email');
					frm.email_newsletter.value = "";
					frm.email_newsletter.focus();
					return false;
				}
				frm.submit();
			}
			$(document).ready(function(){
				var config = {
				  '.chosen-select'           : {}
				}
				for (var selector in config) {
				  $(selector).chosen(config[selector]);
				}
			})
		</script>
		<?php include _template . "layout/back_to_top.php"; ?>
		<!-- Subiz -->

<script>

(function(s, u, b, i, z){

u[i]=u[i]||function(){

u[i].t=+new Date();

(u[i].q=u[i].q||[]).push(arguments);

};

z=s.createElement('script');

var zz=s.getElementsByTagName('script')[0];

z.async=1; z.src=b; z.id='subiz-script';

zz.parentNode.insertBefore(z,zz);

})(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');

subiz('setAccount', 'acovogdfidcugyy97f58');

</script>

<!-- End Subiz -->
	</body>
</html>