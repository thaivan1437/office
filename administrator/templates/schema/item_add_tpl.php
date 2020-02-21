<?php
	function check_dateofWeek($val){
		global $item;
		
		$day=explode(",",$item["dayOfWeek"]);
		if(in_array($val,$day)){
			return "checked";
		}
	}
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=schema&act=capnhat"><span>Thiết lập hệ thống</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Cấu hình schema website</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=schema&act=save&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">	
	
    <div class="widget">
		<div class="title"><img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
			<h6>Thông tin công ty</h6>
		</div>
		<div id="content_lang_2" class="tab_content">       	   
			<div class="formRow">
				<label>Tên</label>
				<div class="formRight">
					<input type="text" value="<?=(@$item['name'])?>" name="name" title="Nhập tên công ty" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Tên ngắn</label>
				<div class="formRight">
					<input type="text" value="<?=(@$item['shortname'])?>" name="shortname" title="Nhập tên công ty rút gọn" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="formRow">
				<label>Link thông tin lĩnh vực</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['additionaltype']?>" name="additionaltype" title="Nhập link thông tin về lĩnh vực hoạt động" class="tipS" />
				</div>
				<div class="clear"></div>
				Note: mỗi link cách nhau bằng 1 dấu ,
			</div>
			<div class="formRow">
				<label>Nhập link social</label>
				<div class="formRight">
					<textarea rows="8" cols="" title="Nhập link social công ty" class="tipS" name="sameas"><?=@$item['sameas']?></textarea>
				</div>
				<div class="clear"></div>
				Note: mỗi link cách nhau bằng 1 dấu ,
			</div>
			 <div class="formRow">
				<label>PriceRange</label>
				<div class="formRight">
					<input type="text" value="<?=(@$item['priceRange'])?>" name="PriceRange" title="Nhập khoảng giá" class="tipS" />
				</div>
				<div class="clear"></div>
				Note: ví dụ 10$-20$
			</div>
			<div class="formRow">
				<label>hasMap</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['hasMap']?>" name="hasMap"  title="Nhập link địa điểm google maps" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Tên lĩnh vực hoạt động</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['hasOfferCatalog']?>" name="hasOfferCatalog"  title="Nhập tên lĩnh vực hoạt động" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Địa chỉ(số nhà,đường)</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['street']?>" name="street"  title="Nhập số nhà đường phố địa chỉ công ty" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Phường</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['ward']?>" name="ward"  title="Nhập phường địa chỉ công ty" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Quận</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['district']?>" name="district"  title="Nhập quận địa chỉ công ty" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Thành phố</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['city']?>" name="city"  title="Nhập tỉnh thành phố địa chỉ công ty" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Mã bưu chính</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['postalCode']?>" name="postalCode"  title="Nhập mã bưu chính" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Giờ mở cửa</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['opens']?>" name="opens" title="Giờ mở cửa" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Giờ đóng cửa</label>
				<div class="formRight">
					<input type="text" value="<?=@$item['closes']?>" name="closes" title="Giờ đóng cửa" class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Ngày mở cửa</label>
				<div class="formRight">
					<label><input type="checkbox" value="Monday" name="dayOfWeek[]" <?=check_dateofWeek("Monday")?> title="" class="tipS" />Thứ 2</label>
					<label><input type="checkbox" value="Tuesday" name="dayOfWeek[]" <?=check_dateofWeek("Tuesday")?> title="" class="tipS" />Thứ 3</label>
					<label><input type="checkbox" value="Wednesday" name="dayOfWeek[]" <?=check_dateofWeek("Wednesday")?> title="" class="tipS" />Thứ 4</label>
					<label><input type="checkbox" value="Thursday" name="dayOfWeek[]" <?=check_dateofWeek("Thursday")?> title="" class="tipS" />Thứ 5</label>
					<label><input type="checkbox" value="Friday" name="dayOfWeek[]" <?=check_dateofWeek("Friday")?> title="" class="tipS" />Thứ 6</label>
					<label><input type="checkbox" value="Saturday" name="dayOfWeek[]" <?=check_dateofWeek("Saturday")?> title="" class="tipS" />Thứ 7</label>
					<label><input type="checkbox" value="Sunday" name="dayOfWeek[]" <?=check_dateofWeek("Sunday")?> title="" class="tipS" />Chủ nhật</label>
				</div>
				<div class="clear"></div>
			</div>
		</div>
        <div class="formRow">
			<label>Link hành động</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['urlTemplate']?>" name="urlTemplate" title="Nhập link " class="tipS" />
			</div>
			<div class="clear"></div>
			Example: Lĩnh vực mua bán sản phẩm: link hướng dẫn mua hàng or hướng dẫn thanh toán. Lĩnh vực dịch vụ nhà hàng: link đặt dịch vụ, ....
		</div>
        <div class="formRow">
			<label>Tên Link hành động</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['potentialAction']?>" name="potentialAction" title="Nhập link " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Language</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['inLanguage']?>" name="inLanguage" title="Nhập ngôn ngữ website " class="tipS" />
			</div>
			<div class="clear"></div>
			Example: vi, en, ....
		</div>
		<div class="formRow">
			<label>Rating Value</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['ratingValue']?>" name="ratingValue" title="Nhập rating Value " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>review Count</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['reviewCount']?>" name="reviewCount" title="Nhập số lượng đánh giá " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tiền tệ website</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['priceCurrency']?>" name="priceCurrency" title="Nhập đơn vị tiền tệ " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tỉ giá</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['price']?>" name="price" title="Nhập tỉ giá tiền tệ " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Ngày triển khai</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['datePublished']?>" name="datePublished" title="Nhập ngày triển khai " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Schema Type</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['type']?>" name="type" title="Nhập kiểu schema " class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
    
    <div class="widget">
		<div class="title"><img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
			<h6>Thông tin người điều hành</h6>
		</div>			
		
        
        <div class="formRow">
			<label>Tên</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['personname']?>" name="personname" title="Nhập tên người điều hành" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        
         <div class="formRow">
			<label>Chức vụ</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['jobTitle']?>" name="jobTitle" title="Nhập chức vụ" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Link hình ảnh</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['image']?>" name="image" title="Nhập link hình ảnh" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nơi làm việc</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['worksFor']?>" name="worksFor" title="Nhập nơi làm việc" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Website</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['url']?>" name="url" title="Nhập địa chỉ url" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nhập link social</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nhập link social cá nhân" class="tipS" name="personsameAs"><?=@$item['personsameAs']?></textarea>
			</div>
			<div class="clear"></div>
			Note: mỗi link cách nhau bằng 1 dấu ,
		</div>
		<div class="formRow">
			<label>Các trường đã theo học</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nhập link social cá nhân" class="tipS" name="AlumniOf"><?=@$item['AlumniOf']?></textarea>
			</div>
			<div class="clear"></div>
			Note: mỗi link cách nhau bằng 1 dấu ,
		</div>
        <div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['addressLocality']?>" name="addressLocality" title="Nhập địa chỉ" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Quốc gia</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['addressRegion']?>" name="addressRegion" title="Nhập địa chỉ" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
		
        <div class="formRow">
			<label>Mô tả:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS" name="perdescription"><?=@$item['perdescription']?></textarea>
				<b>(Tốt nhất là 160 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>		
	</div>
    <div class="widget">
		<div class="title"><img src="./images/icons/dark/users.png" alt="" class="titleIcon" />
			<h6>Bổ sung</h6>
		</div>
        <div class="formRow">
			<label>Schema bổ sung:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung schema thêm" class="tipS" name="schema"><?=@$item['schema']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Offer:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung offer thêm" class="tipS" name="offer"><?=@$item['offer']?></textarea>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_schema" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 			
	</div>
      
</form>   