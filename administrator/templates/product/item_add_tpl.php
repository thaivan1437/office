<script src="https://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBeH3CkH9euOWqWu8vvgTOBMrTOnAF6Lb0"
      type="text/javascript"></script>
      <script type="text/javascript">

 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(<?php if($item['toado']!='') echo $item['toado']; else echo $config['locationdefault']?>);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);		
        document.getElementById("txt_location").value = center.lat().toFixed(6) +','+center.lng().toFixed(6);
	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
		  document.getElementById("txt_location").value = point.lat().toFixed(6) +','+point.lng().toFixed(6);
        });
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		document.getElementById("txt_location").value = center.lat().toFixed(6) +','+center.lng().toFixed(6);
	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("txt_location").value = point.lat().toFixed(6) +','+point.lng().toFixed(6);
        });
        });
      }
    }
function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
				 document.getElementById("txt_location").value = point.lat().toFixed(6) +','+point.lng().toFixed(6);
		 map.clearOverlays()
			map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
		 map.addOverlay(marker);

		GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
		 document.getElementById("txt_location").value = pt.lat().toFixed(6) +','+pt.lng().toFixed(6);
        });
	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("txt_location").value = center.lat().toFixed(6) +','+center.lng().toFixed(6);
	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
		document.getElementById("txt_location").value = pt.lat().toFixed(6) +','+pt.lng().toFixed(6);
        });
 
        });
            }
          }
        );
      }
    }
    </script>

<?php
	$set_level=$config['subcat'];
	$id_list=$_REQUEST["id_list"];
	if($set_level>0){
		function get_main_list(){
			global $rs_menu,$set_level,$d,$id_list;
			$d->reset();
			$sql="select * from #_product_list where com='1' and type='".$_REQUEST["type"]."' order by stt, id desc";
			$d->query($sql);
			$rs_menu=$d->result_array();
			$typeloai=$rs_menu["typeloai"];
			echo $typeloai;
			
			$str.='<label>Danh mục dự án</label>
				<div class="formRight">
					<div class="selector">
						<select name="id_parent[]" class="form-control input level" data-level="1" id="level1" onchange="load_level($(this))" >';
				$str.="<option>Chọn danh mục cấp 1</option>";
				foreach($rs_menu as $v){
					$str.='<option value="'.$v["id"].'" ';
					if($v["id"]==$id_list) $str.='selected'; 
					$str.='>'.$v["ten_vi"].'</option>';
				}
			$str.='</select>
			</div></div>
			</br>';
			$str.='<div class="level_box" id="level2"></div>';
			
			return $str;
		}
	}
?>
<?php
	$d->reset();
	$sql="select * from #_place_dist where id_city='1' order by stt";
	$d->query($sql);
	$rs_district=$d->result_array();
	
	$id_dist=($item["dist"]>0) ? $item["dist"] : $rs_district[0]['id'];
	$d->reset();
	$sql="select * from #_place_ward where id_dist='".$id_dist."' order by stt";
	$d->query($sql);
	$rs_ward=$d->result_array();
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='".$id_dist."' order by stt";
	$d->query($sql);
	$rs_street=$d->result_array();
	
	$d->reset();
	$sql="select * from #_product_list where com='1' and type='loai' order by stt, id desc";
	$d->query($sql);
	$rs_loai=$d->result_array();

		$d->reset();
	$sql="select * from #_dientich where hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_dientichsearch=$d->result_array();
	//check_data($rs_dientichsearch);

	$d->reset();
	$sql="select * from #_giasearch where hienthi=1 order by stt, id desc";
	$d->query($sql);
	$rs_giasearch=$d->result_array();
	//check_data($rs_giasearch);
	
	$d->reset();
	$sql="select * from #_huong where hienthi='1' order by stt, id desc";
	$d->query($sql);
	$rs_huong=$d->result_array();

	function checked_list($id, $id_list){
		global $d;
		$d->reset();
		$sql="select id from #_product where id='".$id."' and find_in_set('".$id_list."',list_id)>0";
		$d->query($sql);
		$row=$d->num_rows();
		if($row>0){
			return 'selected="selected"';
		}else{
			return "";
		}
	}

	function checked_list1($id, $id_dientich){
		global $d;
		$d->reset();
		$sql="select id from #_product where id='".$id."' and find_in_set('".$id_dientich."',id_dientich)>0";
		$d->query($sql);
		$row=$d->num_rows();
		if($row>0){
			return 'selected="selected"';
		}else{
			return "";
		}
	}

	function checked_list2($typedm, $id){
		global $d;
		$d->reset();
		$sql="select id from #_product where id='".$id."' and find_in_set('".$typedm."',typedm)>0";
		$d->query($sql);
		$row=$d->num_rows();
		if($row>0){
			return 'selected="selected"';
		}else{
			return "";
		}
	}



?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
<link href="js/mutipleselect/jquery.bootstrap.treeselect.css" rel="stylesheet">
<script src="js/mutipleselect/jquery.bootstrap.treeselect.js"></script>
<script>
            
    $(function(){
        $('#productGroup').treeselect();
        $('#productGroup1').treeselect();
        $('#productGroup2').treeselect();
    });

    
</script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        <li><a href="index.php?com=product&act=man&type=<?=$_REQUEST["type"]?>"><span>dự án</span></a></li>
        <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
		$('#validate').submit();		
	}
	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save&type=<?=$_REQUEST["type"]?>&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
        </div>
		<ul class="tabs">
           
			<li>
               <a href="#info">Thông tin chung</a>
			</li>
			<?php foreach ($config['lang'] as $key => $value) { ?>
			<li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
			</li>
			<?php } ?>


		</ul>
		<div id="info" class="tab_content">
			<input type="hidden" name="id" id="id_this_product" value="<?=@$item['id']?>" />
            <div class="formRow">
            	<label>Chọn danh mục : </label>
				<div class="formRight">
					<?php
						$d->reset();
						$sql="select * from #_product_list where com='1' and type='".$_REQUEST["type"]."' order by stt, id desc";
						$d->query($sql);
						$rs_menu=$d->result_array();
					?>
					<select multiple="multiple" id="productGroup" name="list_id">
						<?php foreach($rs_menu as $v){
							$d->reset();
							$sql="select ten_vi as ten, id from #_product_list where id_parent='".$v["id"]."'";
							$d->query($sql);
							$rs_cat=$d->result_array();
						?>
			            <option value="<?=$v["id"]?>" <?=checked_list($item["id"],$v["id"])?> ><?=$v["ten_vi"]?></option>
			            <?php foreach ($rs_cat as $key => $value) {?>
			            	<option value="<?=$value["id"]?>" data-parent="<?=$v["id"]?>" <?=checked_list($item["id"],$value["id"])?> ><?=$value["ten"]?></option>
			            <?php }}?>
			        </select>
		    	</div>
		    	<div class="clear"></div>
			</div>

			

<?php if($_REQUEST["type"]=="san-pham"){ ?>
	<div class="formRow">
    	<label>Chọn diện tích search : </label>
		<div class="formRight">
			<select multiple="multiple" id="productGroup1" name="id_dientich">
				<?php foreach($rs_dientichsearch as $v){ ?>
	            <option value="<?=$v["id"]?>" <?=checked_list1($item["id"],$v["id"])?> ><?=$v["ten"]?></option>
	            <?php } ?>
	        </select>
    	</div>
    	<div class="clear"></div>
	</div>
				
<?php } ?>	

	<div class="formRow">
		<label>Chọn template cho văn phòng</label>
		<div class="formRight">
			<select name="template_vp" title="Nhập loại template cho văn phòng">
				<option value="" <?php if(empty($item['template_vp'])) echo "selected"; ?> >-- Mặc định --</option>
				<option value="tron-goi" <?php if($item['template_vp']=="tron-goi") echo "selected"; ?> >Văn phòng trọn gói</option>
				<option value="nguyen-can" <?php if($item['template_vp']=="nguyen-can") echo "selected"; ?> >Tòa nhà nguyên căn</option>
			</select>
			<span> (Nếu muốn để template mặc định thì không chọn)</span>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tên toàn nhà : </label>
		<div class="formRight">
			<input type="text" id="price" name="tentoanha" value="<?=@$item['tentoanha']?>"  title="Nhập tên tòa nhà " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giá thuê văn phòng ảo : </label>
		<div class="formRight">
			<input type="text" id="price" name="gia_vp_ao" value="<?=@$item['gia_vp_ao']?>"  title="Nhập giá văn phòng ảo " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giá thuê chỗ ngồi làm việc : </label>
		<div class="formRight">
			<input type="text" id="price" name="gia_cho_ngoi" value="<?=@$item['gia_cho_ngoi']?>"  title="Nhập giá thuê chỗ ngồi làm việc " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giá thuê phòng làm việc : </label>
		<div class="formRight">
			<input type="text" id="price" name="gia_thue_phong" value="<?=@$item['gia_thue_phong']?>"  title="Nhập giá thuê phòng làm việc " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Chủ đầu tư : </label>
		<div class="formRight">
			<input type="text" id="price" name="chu_dau_tu" value="<?=@$item['chu_dau_tu']?>"  title="Nhập chủ đầu tư " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Xếp hạng văn phòng : </label>
		<div class="formRight">
			<div class="selector">
				<select name="loai">
					<option value="">Chọn xếp hạng</option>
					<?php foreach($rs_loai as $v){?>
					<option value="<?=$v["id"]?>" <?=($v["id"]==$item["loai"]) ? "selected" : "";?> ><?=$v["ten_vi"]?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Loại văn phòng : </label>
		<div class="formRight"><input type="text" id="price" name="loai_vp" value="<?=@$item['loai_vp']?>"  title="Nhập loại văn phòng(trọn gói - chia sẻ) " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tầng cho thuê : </label>
		<div class="formRight">
			<input type="text" id="price" name="tangchothue" value="<?=@$item['tangchothue']?>"  title="Nhập tâng cho thuê" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giá thuê tháng (tòa nhà nguyên căn) : </label>
		<div class="formRight">
			<input type="text" id="price" name="gia_theo_thang" value="<?=@$item['gia_theo_thang']?>"  title="Nhập giá thuê theo tháng cho tòa nhà nguyên căn" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Thuế VAT : </label>
		<div class="formRight">
			<input type="text" id="price" name="vat" value="<?=@$item['vat']?>"  title="Nhập thuế VAT" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Loại cho thuê : </label>
		<div class="formRight">
			<input type="text" id="price" name="loaichothue" value="<?=@$item['loaichothue']?>"  title="Nhập loại cho thuê" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Vị trí : </label>
		<div class="formRight">
			<input type="text" id="price" name="vitri" value="<?=@$item['vitri']?>"  title="Nhập vị trí " class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giá : </label>
		<div class="formRight">
			<input type="text" id="price" name="gia" value="<?=@$item['gia']?>"  title="Nhập giá sản phẩm" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Đơn vị: </label>
		<div class="formRight">
			<div class="selector">
				<select name="donvi" id="donvi">
					<option value="0">Chọn đơn vị tiền tệ</option>
					<option value="1" <?php if($item["donvi"]==1) echo 'selected="selected"';?>>USD </option>
					<option value="2" <?php if($item["donvi"]==2) echo 'selected="selected"';?>> VNĐ</option>
				</select>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Phí quản lý : </label>
		<div class="formRight">
			<input type="text" id="giakm" name="giakm" value="<?=@$item['giakm']?>"  title="Nhập phí quản lý" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>

			<!--<div class="formRow">
				<label>Đơn vị: </label>
				<div class="formRight">
					<div class="selector">
						<select name="donvi" id="donvi">
							<option value="0">Chọn đơn vị tiền tệ</option>
							<option value="1" <?php if($item["donvi"]==1) echo 'selected="selected"';?>>Triệu VNĐ</option>
							<option value="2" <?php if($item["donvi"]==2) echo 'selected="selected"';?>>Tỉ VNĐ</option>
						</select>
					</div>
				</div>
				<div class="clear"></div>
			</div>-->




		<div class="formRow">
			<label>Diện tích : </label>
			<div class="formRight">
				<input type="text" id="dientich" name="dientich" value="<?=@$item['dientich']?>"  title="Nhập diện tích sản phẩm. Đơn vị m2" class="tipS" />
				Note: nhập dạng 150-200
			</div>
			<div class="clear"></div>
		</div> 
		<div class="formRow">
			<label>Quận huyện: </label>
			<div class="formRight">
				<div class="selector">
					<select name="district" id="district">
						<option value="0">Chọn quận huyện</option>
						<?php foreach($rs_district as $v){?>
						<option value="<?=$v["id"]?>" <?php if($v["id"]==$item["dist"]) echo 'selected="selected"';?>><?=$v["ten"]?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Phường / xã: </label>
			<div class="formRight">
				<div class="selector">
					<select name="ward" id="ward">
						<option value="0">Phường / xã</option>
						<?php foreach($rs_ward as $v){?>
						<option value="<?=$v["id"]?>" <?php if($v["id"]==$item["ward"]) echo 'selected="selected"';?>><?=$v["ten"]?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Đường: </label>
			<div class="formRight">
				<div class="selector">
					<select name="street" id="street">
						<option value="0">Chọn đường</option>
						<?php foreach($rs_street as $v){?>
						<option value="<?=$v["id"]?>" <?php if($v["id"]==$item["street"]) echo 'selected="selected"';?>><?=$v["ten"]?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="clear"></div>
		</div>

		



<div class="formRow">
	<label>Kết cấu: </label>
	<div class="formRight">
		<input type="text" id="dientich" name="ketcau" value="<?=@$item['ketcau']?>"  title="Nhập kết cấu" class="tipS" />
		
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label>Diện tích xây dựng: </label>
	<div class="formRight">
		<input type="text" id="dientich" name="dientichxaydung" value="<?=@$item['dientichxaydung']?>"  title="Nhập diện tích. Đơn vị m2" class="tipS" />
		
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label>Diện tích sử dụng : </label>
	<div class="formRight">
		<input type="text" id="tinhtrang" name="dientichsudung" value="<?=@$item['dientichsudung']?>"  title="Nhập diện tích sử dụng" class="tipS" />
		
	</div>
	<div class="clear"></div>
</div>



	<div class="formRow">
		<label>Số chỗ ngồi : </label>
		<div class="formRight">
			<input type="text" id="tinhtrang" name="sochongoi" value="<?=@$item['sochongoi']?>"  title="Nhập số chỗ ngồi" class="tipS" />
			
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giờ làm việc : </label>
		<div class="formRight">
			<input type="text" id="thoihan" name="giolamviec" value="<?=@$item['giolamviec']?>"  title="Nhập giờ làm việc" class="tipS" />
			
		</div>
		<div class="clear"></div>
	</div>



	<div class="formRow">
		<label>Giá search: </label>
		<div class="formRight">
			<div class="selector">
				<select name="id_giasearch" id="id_giasearch">
					<option value="0">Chọn giá</option>
					<?php foreach($rs_giasearch as $v){?>
					<option value="<?=$v["id"]?>" <?php if($v["id"]==$item["id_giasearch"]) echo 'selected="selected"';?>><?=$v["ten"]?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="clear"></div>
	</div>



			<!--div class="formRow">
				<label>Xếp hạng: </label>
				<div class="formRight">
					<div class="selector">
						<select name="loai" id="loai">
							<option value="0">Chọn loại</option>
							<?php foreach($rs_loai as $v){?>
							<option value="<?=$v["id"]?>" <?php if($v["id"]==$item["loai"]) echo 'selected="selected"';?>><?=$v["ten_vi"]?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="clear"></div>
			</div-->


	<div class="formRow">
		<label>Hướng: </label>
		<div class="formRight">
			<div class="selector">
				<select name="id_huong" id="id_huong">
					<option value="0">Chọn loại</option>
					<?php foreach($rs_huong as $v){?>
					<option value="<?=$v["id"]?>" <?php if($v["id"]==$item["id_huong"]) echo 'selected="selected"';?>><?=$v["ten"]?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<div class="formRow">
		<label>Địa chỉ bản đồ</label>
		<div class="formRight">
			<input type="text" value="<?=(@$item['diachi'])?>" name="diachi" title="Nhập địa chỉ công ty" class="tipS" onblur="showAddress(this.value);" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tọa độ bản đồ: </label>
		<div class="formRight">
			<input type="text" id="txt_location" name="toado" value="<?=@$item['toado']?>"  title="Nhập Tọa độ văn phòng" class="tipS" />
			<div id="map" style="width: 100%;height:400px; margin-top:10px;"></div>
		</div>
		<div class="clear"></div>
	</div>
			


			<div class="formRow">
				<label>Hình ảnh đại diện: </label>
				<div class="formRight">
					<?php if ($_REQUEST['act']=='edit' && $item['photo']!='' ) { ?>
					<img width="100" src="<?=_upload_product.$item['photo']?>">
					<!--<a title="Xoá ảnh" href="index.php?com=product&act=delete_img&id=<?=@$item['id']?>">Xoá ảnh</a>-->
					<br>
					<?php }?>
					<input type="file" id="file" name="file" /><img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho dự án (ảnh JPEG, GIF , JPG , PNG)">Width: 560px & height: 500px
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Hình ảnh kèm theo: </label>
				<div class="formRight">
					<a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="fa fa-paperclip"></i> Thêm ảnh</a>
					<?php if($act=='edit'){?>
						<?php if(count($ds_photo)!=0){?>       
							<?php for($i=0;$i<count($ds_photo);$i++){?>
							<div class="item_trich trich<?=$ds_photo[$i]['id']?>">
								<img class="img_trich" width="100px" height="80px" src="<?=_upload_product.$ds_photo[$i]['photo']?>" />
								<input type="text" id="stt_trich<?=$ds_photo[$i]['id']?>" value="<?=$ds_photo[$i]['stt']?>" onkeypress="return OnlyNumber(event)" class="tipS" onchange="return updateStthinh('hasp', '<?=$ds_photo[$i]['id']?>')" />
								<a href="javascript:void(0)" class="change_stt" rel="<?=$ds_photo[$i]['id']?>"><i class="fa fa-trash-o"></i></a>
								<div id="loader<?=$ds_photo[$i]['id']?>" class="loader_trich"><img src="images/loader.gif" /></div>
							</div>
							<?php }?>
						<?php }?>
					<?php }?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
				<div class="formRight">
					<input type="checkbox" name="is_noindex" id="check2" <?=(!isset($item['is_noindex']) || $item['is_noindex']==1)?'checked="checked"':''?> />
					<label for="check2">Noindex, nofollow <img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Check nếu bạn muốn Google không index dự án này!" style="float:right; margin-top:0;" /></label>
					<input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
					<label for="check1">Hiển thị</label>          
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Số thứ tự: </label>
				<div class="formRight">
					<input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của dự án, chỉ nhập số">
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<div class="formRight">
					
					<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				</div>
				<div class="clear"></div>
			</div>
		</div>


		<?php foreach ($config['lang'] as $key => $value) {?>

		<div id="content_lang_<?=$key?>" class="tab_content">        
    <div class="formRow">
		<label>Tên dự án</label>
		<div class="formRight">
			<input type="text" name="ten_<?=$key?>" title="Nhập tên dự án" id="ten_<?=$key?>" class="tipS" value="<?=@$item['ten_'.$key]?>" />
		</div>
		<div class="clear"></div>
	</div>  

	<div class="formRow">
		<label>Mô tả ngắn:<img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết mô tả ở đây"> </label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Viết mô tả ngắn dự án" class="editor" name="mota_<?=$key?>" id="mota_<?=$key?>"><?=@$item['mota_'.$key]?></textarea>
		</div>
		<div class="clear"></div>
	</div>  

    <div class="formRow">
		<label>Tổng quan dự án: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
		<div class="formRight">
			<textarea name="noidung_<?=$key?>" rows="8" cols="60" class="editor" id="noidung_<?=$key?>"><?=@$item['noidung_'.$key]?></textarea>
		</div>
		<div class="clear"></div>
	</div>

	<div class="formRow">
		<label>Title</label>
		<div class="formRight">
			<input type="text" value="<?=@$item['title_'.$key]?>" name="title_<?=$key?>" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>

	<div class="formRow">
		<label>Từ khóa</label>
		<div class="formRight">
			<input type="text" value="<?=@$item['keywords_'.$key]?>" name="keywords_<?=$key?>" title="Từ khóa chính cho dự án" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>

	<div class="formRow">
		<label>Description:</label>
		<div class="formRight">
			<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description_<?=$key?>"><?=@$item['description_'.$key]?></textarea>(Tốt nhất là 160 ký tự)</b>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="formRow">
		<label>Kết cấu tòa nhà: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
		<div class="formRight">
			<textarea name="ketcautoanha" rows="8" cols="60" class="editor" id="ketcautoanha"><?=@$item['ketcautoanha']?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Bản đồ: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
		<div class="formRight">
			<textarea name="bando" rows="8" cols="60" class="editor" id="bando"><?=@$item['bando']?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Phí dịch vụ: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
		<div class="formRight">
			<textarea name="phidichvu" rows="8" cols="60" class="editor" id="phidichvu"><?=@$item['phidichvu']?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="formRow">
		<label>Uu điểm: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
		<div class="formRight">
			<textarea name="uudiem" rows="8" cols="60" class="editor" id="uudiem"><?=@$item['uudiem']?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Phong thủy: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
		<div class="formRight">
			<textarea name="phongthuy" rows="8" cols="60" class="editor" id="phongthuy"><?=@$item['phongthuy']?></textarea>
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="formRow">
		<label>Trình trạng : </label>
		<div class="formRight">
			<input type="text" id="tinhtrang" name="tinhtrang" value="<?=@$item['tinhtrang']?>"  title="Nhập tình trạng" class="tipS" />
			Note: Đang cho thuê, Có phòng....
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Thời hạn : </label>
		<div class="formRight">
			<input type="text" id="thoihan" name="thoihan" value="<?=@$item['thoihan']?>"  title="Nhập thời hạn" class="tipS" />
			Note: 6 tháng, 1 năm, 2 năm,...
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Giá thuê : </label>
		<div class="formRight">
			<input type="text" id="price" name="giatoanha" value="<?=@$item['giatoanha']?>"  title="Nhập giá thue tòa nhà" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="formRow">
		<label>Phí quản lí : </label>
		<div class="formRight">
			<input type="text" id="price" name="phiql" value="<?=@$item['phiql']?>"  title="Nhập phí quản lí" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Phí xe máy : </label>
		<div class="formRight">
			<input type="text" id="price" name="phixemay" value="<?=@$item['phixemay']?>"  title="Nhập phí xe máy" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Phí ô tô : </label>
		<div class="formRight">
			<input type="text" id="price" name="phioto" value="<?=@$item['phioto']?>"  title="Nhập phí" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Phí ngoài giờ : </label>
		<div class="formRight">
			<input type="text" id="price" name="phingoaigio" value="<?=@$item['phingoaigio']?>"  title="Nhập phí" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tiền điện : </label>
		<div class="formRight">
			<input type="text" id="price" name="tiendien" value="<?=@$item['tiendien']?>"  title="Nhập phí" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tiền điện lạnh : </label>
		<div class="formRight">
			<input type="text" id="price" name="tiendienlanh" value="<?=@$item['tiendienlanh']?>"  title="Nhập phí" class="tipS" />
			<input type="checkbox" name="baogomdienlanh" id="check3" value="1" <?=(!isset($item['baogomdienlanh']) || $item['baogomdienlanh']==1)?'checked="checked"':''?> />
			<label for="check3">Bao gồm điện lạnh</label> 
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tiền đặt cọc: </label>
		<div class="formRight">
			<input type="text" id="price" name="tiendatcoc" value="<?=@$item['tiendatcoc']?>"  title="Nhập phí" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Thanh toán : </label>
		<div class="formRight">
			<input type="text" id="price" name="thanhtoan" value="<?=@$item['thanhtoan']?>"  title="Nhập phí" class="tipS" />
		</div>
		<div class="clear"></div>
	</div>


			<div class="formRow">
				<div class="formRight">
					
					<input type="button" class="blueB check_dkm" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				</div>
				<div class="clear"></div>
			</div>

       </div><!-- End content <?=$key?> -->
      
     <?php } ?>
	
	
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function(e) {
        $('#district').change(function(){
			var pro = $(this).val();
			$('#ward').load("ajax/ajax_admin.php?pro="+ pro+"&act=ward");
			$('#street').load("ajax/ajax_admin.php?pro="+ pro+"&act=street");
		})
    });
</script>
<script>
	function updateStthinh($act,$id){
		$val=$("#stt_trich"+$id).val();
		$.ajax({
			url:"ajax/ajax.php",
			type:"POST",
			data:{act: $act,id: $id,val: $val},
			success:function(data){
				if(data==1){
					alert("Cập nhật thành công");
				}else{
					alert("Cập nhật thất bại");
				}
				
			}
		})
	}
	$(document).ready(function() {
		$(".change_stt").click(function(){
			$id=$(this).attr("rel");
			if(confirm("Bạn có chắc chắn là muốn xóa ảnh này!")==true){
				$.ajax({
					url:"ajax/xuly_admin_dn.php",
					type:"POST",
					data:{act:"remove_image", id:$id},
					success: function(data){
						$(".trich"+$id).fadeOut();
					}
				})
			}
		})
		$('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.remove_image').click(function(){
			var id=$(this).data("id");
			$.ajax({
				type: "POST",
				url: "ajax/xuly_admin_dn.php",
				data: {id:id, act: 'remove_image'},
				success:function(data){
					$jdata = $.parseJSON(data);					
					$("#"+$jdata.md5).fadeOut(500);
					setTimeout(function(){
						$("#"+$jdata.md5).remove();
					}, 1000)
				}
			})
		})
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		load_level($(".level"));
		//load_option($(".level"));
		$(".level").change(function(){
			$id=$(this).val();
			if($id!=0){
			$.ajax({
				type:"POST",
				url:"ajax/ajax.php",
				data:{id:$id, act: "load_option_select",id_sp:"<?= ($_REQUEST["id"]!='') ? $_REQUEST["id"] : '0'?>"},
				success: function(data){
					$("#option").html(data);
					$(".option").click();
				}
			})
			}
		})
	})
	function load_level($obj){
		$level=$obj.data("level");
		$id=$obj.val();
		if($id!=0){
		$.ajax({
			type:"POST",
			url:"ajax/ajax.php",
			data:{max_level:<?=$config['subcat']?>,level:$level,id:$id, act: "load_level_sp", id_parent: "<?=$_REQUEST["id_parent"]?>",id_sp:"<?= ($_REQUEST["id"]!='') ? $_REQUEST["id"] : '0'?>"},
			success: function(data){
				
				$("#level"+($level+1)).html(data);
			}
		})
		}
	}
</script>
