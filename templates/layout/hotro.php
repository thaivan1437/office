<?php
	$d->reset();
	$sql="select ten_$lang as ten, tenkhongdau, id from #_news_item where type='bang-gia' and hienthi=1 order by stt, id limit 0,3";
	$d->query($sql);
	$rs_price=$d->result_array();
?>
<div class="container">
	<div class="tcat"><div class="icon">Bảng giá</div></div>
	<div class="box_banggia">
		<?php foreach($rs_price as $v){
			$d->reset();
			$sql="select ten_$lang as ten, tenkhongdau, id, gia from #_news where id_item='".$v["id"]."' and hienthi=1 order by stt, id desc";
			$d->query($sql);
			$rs_price_item=$d->result_array();
		?>
		<div class="item">
			<div class="row1">
				<div class="col-1s">
					<div class="title"><span><?=$v["ten"]?></span></div>
				</div>
				<div class="col-2s">
					<div class="title">Giá/Kg</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="box_scroll">
				<?php foreach ($rs_price_item as $v1){?>
				<div class="row1">
					<div class="col-1">
						<?=$v1["ten"]?>
					</div>
					<div class="col-2">
						<span><?=number_format($v1["gia"],"0",",",".")?> VNĐ</span>
					</div>
					<div class="clear"></div>
				</div>
				<?php }?>
			</div>
		</div>
		<?php }?>
		<div class="clear"></div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(".box_scroll").mCustomScrollbar({
			theme:"minimal-dark",
			setHeight: 210
		});
	})
</script>