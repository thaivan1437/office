<?php
$d->query("select photo_$lang as photo, logo from #_photo where com='banner_top'");
$row_photo = $d->fetch_array();

$d->reset();
$sql="select * from #_icon where com='top' and hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_icon=$d->result_array();
?>
<article class="banner">
<div class="top_header">
	<div class="container">		
		<div class="col-md-5">
			<ul class="hidden-sm hidden-xs">
				<li><a href="gioi-thieu.html">Giới thiệu</a></li>
				<li> | </li>
				<li><a href="tin-tuc.html">Tin tức</a></li>
				<li> | </li>
				<li><a href="lien-he.html">Liên hệ</a></li>
				<!--li><a href="tuyen-dung.html">Tuyển dụng</a></li>
				<li><a href="bang-gia.html">Bảng giá</a></li>
				<li><a href="lien-he.html">Liên hệ</a></li-->
			</ul>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="abn">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="logo_header">
					<a href="http://<?=$config_url?>" >
					<img src="<?=_upload_hinhanh_l.$row_photo['logo']?>" alt="<?=$row_setting['ten_'.$lang]?>" class="img-responsive" />
					</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12 ">		
				<div class="live hidden-sm hidden-xs">
					<a href="Skype:<?= $row_setting['twitter'] ?>?chat"><div class="skype">Skype</div></a>
					<a href="gioi-thieu.html"><div class="hotline">Về chúng tôi</div></a>
					<a href="mailto:<?=$row_setting["email"]?>"><div class="email"><?=$row_setting["email"]?></div></a>

					<div class="dropdown tiente">
					    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php if($row_setting["donvi"]==1) 
					    	echo 'USD';
					    	else echo 'VNĐ';
					    ?> 
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu">
					      <li data-id="1">USD</li>
					      <li data-id="2">VNĐ</li>					      
					    </ul>
					</div>
					<!--div class="dropdown-menu tiente">						
						<option value="1" <?php if($row_setting["donvi"]==1) echo 'selected="selected"';?>>USD </option>
						<option value="2" <?php if($row_setting["donvi"]==2) echo 'selected="selected"';?>> VNĐ</option>
					</div-->
				</div>
				
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="timework">
					<span>Thời gian làm việc</span>
					08h - 17h thứ 2 - 6 | 08h - 12h thứ 7
				</div>
			</div>
		</div>
		<div class="chat" data-toggle="modal" data-target="#myModal">Ký gửi cho thuê</div>
	</div>
	<div class="hot_h">
		<div class="container">
			<div class="item_h">
				Hotline: <?=$row_setting["hotline"]?>
			</div>
		</div>
	</div>
	<nav id="cssmenu" class="wow fadeIn" data-wow-delay="0.7s">
		<?php include _template . "layout/menu_top.php"; ?>
	</nav>
</div>
</article>

<div class="hidden-md hotline_fixed">
	<div class="container">
		<div class="row">
		<div class="col-xs-4">
			<a href="mailto:<?=$row_setting["email"]?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
		</div>
		<div class="col-xs-4">
			<a href="tel:<?=$row_setting["hotline"]?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
		</div>
		<div class="col-xs-4">
			<a href="sms:<?=$row_setting["hotline"]?>"><i class="fa fa-comments-o" aria-hidden="true"></i></a>
		</div>
	</div>
	</div>
</div>
<!--script>
	$(document).ready(function(){
		$(window).scroll(function(){
			var scrollTop  = $(window).scrollTop();
			if(scrollTop > $(".banner").height()){
				$('nav').addClass('fixed');
				$("#main").css({"margin-top":$("nav").height()})
			}else{
				$('nav').removeClass('fixed');
				$("#main").css({"margin-top":"0px"})
			}
		})
	})
</script-->