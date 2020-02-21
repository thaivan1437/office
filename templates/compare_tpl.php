<div class="box_content">
    <div class="tcat"><div class="icon">So sánh văn phòng</div></div>
    <div class="content">
		<div class="group_compare">
			<div class="text-center"><button class="btn btn-success btn_dateview"  data-toggle="modal" data-target="#myModal1">ĐẶT LỊCH ĐI XEM VĂN PHÒNG</button></div>
			<div class="item_gr">
				<div class="title_compare"><b>Văn phòng</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%"><?=$v["ten"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Hình ảnh</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<img src="<?=thumb($v["photo"],_upload_product_l,$v["tenkhongdau"],240,180,2,80)?>" alt="<?=$v["ten"]?>" class="img-responsive" />
					<div class="btn_remove_compare" data-id="<?=$v["id"]?>"></div>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Tên toàn nhà</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=$v["tentoanha"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Vị trí</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					Đường <?=show_street($v["street"])?>, Phường <?=show_ward($v["ward"])?>, Quận <?=get_district($v["dist"])?>, TP HCM
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			
			<div class="item_gr">
				<div class="title_compare"><b>Diện tích</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=$v["dientich"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Giá thuê</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<div class="prices">
						<?=showPrice($v["gia"])?>
					</div>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Phí quản lý</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=showPrice($v["phiql"])?> m2/tháng
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Tiền đặt cọc</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=showPrice($v["tiendatcoc"])?> m2/tháng
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Thanh toán</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=$v["thanhtoan"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Thời hạn thuê</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=$v["thoihan"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Phí giữ xe</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					Ô tô: <?=$v["phioto"]?><br />
					Xe máy: <?=$v["phixemay"]?><br />
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Phí ngoài giờ</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=$v["phingoaigio"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Xếp hạng</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?php
						$d->reset();
						$sql="select ten_$lang as ten, tenkhongdau, id,typeloai from #_product_list where id=".$v["loai"]." and hienthi=1 order by stt, id desc";
						$d->query($sql);
						$rs_xephang=$d->fetch_array();
					?>
					<?=$rs_xephang["ten"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			<div class="item_gr">
				<div class="title_compare"><b>Tình trạng</b></div>
				<?php foreach($rs_compare as $k=>$v){?>
				<div class="item compare_<?=$v["id"]?>" style="width:<?=(75/count($rs_compare))?>%">
					<?=$v["tinhtrang"]?>
				</div>
				<?php }?>
				<div class="clear"></div>
			</div>
			
			
		</div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$(".btn_remove_compare").click(function(){
			$id=$(this).data("id");
			$root=$(this);
			$.ajax({
				url:"ajax/xuly.php",
				type:"POST",
				data:{id:$id, act:"delete_compare"},
				success:function(data){
					$(".compare_"+$id).html("");
					$(".compares_"+$id).html("<a href='van-phong.html' class='btn btn-success'>Thêm văn phòng</a>");
					$(".icon_compaire span").html(data);
				}
			})
		})
		
	})
</script>
<style>
	.prices{font-family: robotobold;}
	.prices span{color: #f00;}
</style>