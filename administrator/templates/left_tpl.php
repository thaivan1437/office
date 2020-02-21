<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logo.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
	<li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
	<li class="categories_li <?php if($_GET["com"]=='place') echo "activemenu";?>" id="menu_dd"><a href="" title="" class="exp"><span>Địa điểm</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=place&act=man_dist">Quản lý quận huyện</a></li>
			<li><a href="index.php?com=place&act=man_ward">Quản lý phường xã</a></li>
			<li><a href="index.php?com=place&act=man_street">Quản lý đường phố</a></li>
		</ul>
	</li>
	<li class="categories_li <?php if($_GET["com"]=='dientich' || $_GET["com"]=='giasearch' || ($_GET["com"]=='product' && $_GET["type"]=="san-pham")) echo "activemenu";?>" id="menu_sp"><a href="" title="" class="exp"><span>văn phòng</span><strong></strong></a>
		<ul class="sub">
			<?php for($i=1;$i<=$config['subcat'];$i++){?>
			<li><a href="index.php?com=product&act=man_list&subcat=<?=$i?>&type=san-pham">Quản lý danh mục cấp <?=$i?></a></li>
			<?php }?>
			<li><a href="index.php?com=product&act=man_list&subcat=1&type=loai">Quản lý loại văn phòng</a></li>
			<li><a href="index.php?com=product&act=man&type=san-pham">Quản lý văn phòng</a></li>
			<li><a href="index.php?com=giasearch&act=man">Quản lý giá tìm kiếm</a></li>
			<li><a href="index.php?com=huong&act=man">Quản lý hướng</a></li>
			<li><a href="index.php?com=dientich&act=man">Quản lý diện tích tìm kiếm</a></li>
		</ul>
	</li>


	<li class="categories_li <?php if($_GET["com"]=='comment') echo "activemenu";?>" id="menu_bl"><a href="" title="" class="exp"><span>Bình luận</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=comment&act=man">Quản lý bình luận</a></li>
		</ul>
	</li>
	<li class="categories_li <?php if(($_GET["com"]=='time')) echo "activemenu";?>" id="menu_dv"><a href="" title="" class="exp"><span>Quản lý bài viết</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=time&act=capnhat&type=bang-gia">Quản lý bảng giá</a></li>
			<li><a href="index.php?com=time&act=capnhat&type=gioi-thieu">Quản lý giới thiệu</a></li>
			<li><a href="index.php?com=time&act=capnhat&type=tuyen-dung">Quản lý tuyển dụng</a></li>
			<li><a href="index.php?com=time&act=capnhat&type=lien-he">Quản lý liên hệ chi tiết sản phẩm</a></li>
		</ul>
	</li>
	<li class="categories_li <?php if(($_GET["com"]=='about' && ($_GET["type"]=='tin-tuc' || $_GET["type"]=='he-thong')) || $_GET["com"]=="hinhanh") echo "activemenu";?>" id="menu_tt"><a href="" title="" class="exp"><span>Quản lý Tin</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=about&act=man&type=tin-tuc">Quản lý tin tức sự kiện</a></li>
			<li><a href="index.php?com=about&act=man&type=cam-ket">Quản lý cam kết</a></li>
			<li><a href="index.php?com=about&act=man&type=dich-vu">Quản lý dịch vụ footer</a></li>
			<li><a href="index.php?com=about&act=man&type=y-kien">Quản lý đánh giá KH</a></li>
		</ul>
	</li>
	<li class="categories_li <?php if($_GET["com"]=='icon') echo "activemenu";?>" id="menu_sl"><a href="" title="" class="exp"><span>Textlink</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=icon&act=man&type=left">Quản lý text link cột trái</a></li>
			<li><a href="index.php?com=icon&act=man&type=footer">Quản lý text link footer</a></li>
		</ul>
	</li>
	<li class="categories_li <?php if($_GET["com"]=='bannerqc' || $_GET["com"]=='quangcao' || $_GET["com"]=='slider' || $_GET["com"]=='doitac') echo "activemenu";?>" id="menu_sl"><a href="" title="" class="exp"><span>Hình ảnh - Slider</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=bannerqc&act=capnhat">Quản lý banner</a></li>
			<li><a href="index.php?com=slider&act=man_photo&type=slider">Quản lý slider</a></li>
		</ul>
	</li>
	<li class="categories_li <?php if($_GET["com"]=='dknhantin' || $_GET["com"]=='yahoo' ||$_GET["com"]=='lienhe' || $_GET["com"]=='footer' || $_GET["com"]=='video' || $_GET["com"]=='popub' || $_GET["com"]=='footer' || $_GET["com"]=='setting') echo "activemenu";?>" id="menu_tl"><a href="" title="" class="exp"><span>Thiết lập</span><strong></strong></a>
		<ul class="sub">
			<li><a href="index.php?com=yahoo&act=man">Quản lý hỗ trợ trực tuyến</a></li>
			<li><a href="index.php?com=schema&act=capnhat">Schema</a></li>
			<li><a href="index.php?com=lienhe&act=capnhat">Quản lý liên hệ</a></li>
			<li><a href="index.php?com=icon&act=man&type=top">Quản lý liên kết MXH</a></li>
			<li><a href="index.php?com=footer&act=capnhat">Quản lý footer</a></li>
			<li><a href="index.php?com=setting&act=capnhat">Quản lý thiết lập</a></li>
		</ul>
	</li>
	
</ul>