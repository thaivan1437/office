<?php
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='sanpham' order by stt,id desc";
	$d->query($sql);
	$product_danhmuc=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='dichvu' order by stt,id desc";
	$d->query($sql);
	$product_danhmuc2=$d->result_array();
?>
<!--Hover menu-->
<script language="javascript" type="text/javascript">
	$(document).ready(function() { 
		//Hover vào menu xổ xuống
		$(".menu ul li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300); 
			},function(){ 
			$(this).find('ul:first').css({visibility: "hidden"});
			}); 
		$(".menu ul li").hover(function(){
				$(this).find('>a').addClass('active2'); 
			},function(){ 
				$(this).find('>a').removeClass('active2'); 
		}); 
		//Click vào danh mục xổ xuống
		$("#danhmuc > ul > li > a").click(function(){
			if($(this).parents('li').children('ul').find('li').length>0)
			{
				$("#danhmuc ul li ul").hide(300);
				if($(this).hasClass('active'))
				{
					$("#danhmuc ul li a").removeClass('active');
					$(this).parents('li').find('ul:first').hide(300); 
					$(this).removeClass('active');
				}
				else
				{
					$("#danhmuc ul li a").removeClass('active');
					$(this).parents('li').find('ul:first').show(300); 
					$(this).addClass('active');
				}
				return false;
			}
		});
	});  
</script>
<!--Hover menu-->


<script>
	$(document).ready(function() {

		$('.wmenu_tab span').click(function(event) {
			$('.wmenu_tab span').removeClass('active');
			$(this).addClass('active');
			var id_tab = $(this).data('tab');
			$('.wnmenu_tab2').removeClass('active');
			$('.tab_dm_'+id_tab).addClass('active');
		});

		$('.wnmenu_tab2_trai a').hover(function() {
			/* Stuff to do when the mouse enters the element */
			var image = $(this).data('img');
			// alert(image);
			$(this).parent('.wnmenu_tab2_trai').parent('.wnmenu_tab2').children('.wnmenu_tab2_phai').find('img').attr('src',image);
		}, function() {
			/* Stuff to do when the mouse leaves the element */
		});
	});
</script>

<nav id="menu">
<ul>

    <li><a class="<?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href=""><?=_trangchu?></a></li>


    <li><a class="<?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a></li>


    <li class="hover_to_ull" style="position: unset"><a class="<?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?></a>
   		
   		<section class="new_ull clearfix">
   			<div class="wmenu_tab">
	   			<?php foreach ($product_danhmuc as $key => $value) { ?>
					<span data-tab="<?=$value['id']?>" class="<?php if($key==0) echo 'active' ?>"><?=$value['ten']?></span>
	   			<?php } ?>
   			</div>
			
			<?php foreach ($product_danhmuc as $key => $value) {
   				$d->reset();
				$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_list where hienthi=1 and type='sanpham' and id_danhmuc=".$value['id']." order by stt,id desc";
				$d->query($sql);
				$product_list=$d->result_array(); ?>

			<div class="wnmenu_tab2 <?php if($key==0) echo 'active' ?> tab_dm_<?=$value['id']?> clearfix">
				<?php if(!empty($product_list))  { ?>
					<div class="wnmenu_tab2_trai">
						<?php foreach ($product_list as $key2 => $value2) { ?>
							<a data-img="thumb/350x240/1/<?=_upload_sanpham_l.$value2['photo']?>" href="<?=$value2['tenkhongdau']?>"><?=$value2['ten']?></a>
						<?php } ?>
					</div>
					<div class="wnmenu_tab2_phai">
						<img src="thumb/350x240/1/<?=_upload_sanpham_l.$product_list[0]['photo']?>" alt="<?=$product_list[0]['ten']?>">
					</div>
				<?php } ?>
			</div>

			<?php } ?>
			
   		</section>
	

    </li>
	
	<li class="hover_to_ull" style="position: unset"><a class="<?php if($_REQUEST['com'] == 'dich-vu') echo 'active'; ?>" href="dich-vu.html"><?=_dichvu?></a>
		

		<section class="new_ull clearfix">
   			<div class="wmenu_tab">
	   			<?php foreach ($product_danhmuc2 as $key => $value) { ?>
					<span data-tab="<?=$value['id']?>" class="<?php if($key==0) echo 'active' ?>"><?=$value['ten']?></span>
	   			<?php } ?>
   			</div>
			
			<?php foreach ($product_danhmuc2 as $key => $value) {
   				$d->reset();
					$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_list where hienthi=1 and type='dichvu' and id_danhmuc=".$value['id']." order by stt,id desc";
					$d->query($sql);
					$product_list2=$d->result_array(); ?>

			<div class="wnmenu_tab2 <?php if($key==0) echo 'active' ?> tab_dm_<?=$value['id']?> clearfix">
				<?php if(!empty($product_list2))  { ?>
					<div class="wnmenu_tab2_trai">
						<?php foreach ($product_list2 as $key2 => $value2) { ?>
							<a data-img="thumb/350x240/1/<?=_upload_sanpham_l.$value2['photo']?>" href="<?=$value2['tenkhongdau']?>"><?=$value2['ten']?></a>
						<?php } ?>
					</div>
					<div class="wnmenu_tab2_phai">
						<img src="thumb/350x240/1/<?=_upload_sanpham_l.$product_list2[0]['photo']?>" alt="<?=$product_list2[0]['ten']?>">
					</div>
				<?php } ?>
			</div>

			<?php } ?>
			
   		</section>



	</li>

	<li><a class="<?php if($_REQUEST['com'] == 'du-an') echo 'active'; ?>" href="du-an.html"><?=_congtrinh?></a></li>

	<li><a class="<?php if($_REQUEST['com'] == 'thu-vien') echo 'active'; ?>" href="thu-vien.html"><?=_thuvien?></a></li>

    <li><a class="<?php if($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?>" href="tuyen-dung.html"><?=_tuyendung?></a></li>
	
    <li><a class="<?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a></li>

    <div class="flex_cart"><a href="gio-hang.html"><i class="fas fa-shopping-cart"></i> <?=_giohang?> (<span><?=count($_SESSION['cart'])?></span>)</a></div>
	<div id="lang_menu">
            <a href="index.php?com=ngonngu&lang=en" title="English"><img src="img/en.png" alt="English" /> </a>
            <a href="index.php?com=ngonngu&lang=" title="Việt Nam"><img src="img/vi.png" alt="Việt Nam" /></a>
        </div>
</ul>
</nav>
