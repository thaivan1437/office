<div class="box_content">
    <div class="tcat">
        <div class="icon">
            <?= $title_tcat ?>
        </div>
        <div class="tcat_right">&nbsp;</div>
    </div>
    <div class="content" id="product">
        <?php if(!empty($product)){ foreach ($product as $i => $v) {
                ?>  
			
            <div class="item_product_content <?php
                if (($i + 1) % 5 == 0) {
                    echo 'margin-0';
                }
                ?>" >
				<div class="item">
                    <div class="images">
                        <a href="san-pham/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" >
                            <img src="<?= _upload_product_l . $v['thumb'] ?>" class="img-responsive" alt="<?= $v['ten'] ?>" />
                        </a>
                    </div>
                    <div class="name">
                        <h2><a href="san-pham/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html" >
                            <?= $v['ten'] ?>
                        </a></h2>
                    </div>
					<div class="prices">
						<div class="<?php if($v["giakm"]>0) echo "throught"; else{ echo "gia"; }?>"><?php if($v["gia"]>0) echo number_format($v["gia"])." VNĐ"; else echo "Liên hệ";?></div>
						<?php if($v["giakm"]>0){?><div class="gia"><?=number_format($v["giakm"])." VNĐ"?></div><?php }?>
						<?php if($v["giakm"]<$v["gia"] && $v["gia"]>0 && $v["giakm"]>0){?><div class="giamgia">-<?=count_sale($v["gia"],$v["giakm"])?>%</div><?php }?>
					</div>
					<div class="clear"></div>
				</div>
            </div>
		<?php }} else echo "Nội dung đang được cập nhật." ?>   
        <div class="clear"></div>
        <div class="phantrang" ><?= $paging['paging'] ?></div>
    </div>
</div>
<script type="text/javascript">
	function load_detail($id){
		$("#loading").fadeIn(500);
		$.ajax({
			type:"POST",
			url:"ajax/cart.php",
			data:{id: $id, act:"load_detail"},
			success:function(data){
				$("#loading").fadeOut(2000);
				setTimeout(function(){
					
				})
				$("#flipbook").html(data);
			}
		})
	}
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#list_nb").owlCarousel({
            loop:true,
			margin:10,
			items:5,
			autoplay: true,
            navigation: true,
            pagination: false,
            navText: false,
            scrollPerPage: 1,
            slideSpeed: 200
        });
        
    });
</script>
