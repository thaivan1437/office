<script type="text/javascript">	
	
	function TreeFilterChanged2(){
		$('#validate').submit();
	}
</script>
<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=dientich&act=man"><span>Danh mục diện tích</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="index.php?com=dientich&act=save" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>	

		<ul class="tabs">
           
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
           


       </ul>


       <!-- begin: info -->
       <div id="info" class="tab_content">
			<div class="formRow">
	            <label>Tên</label>
	            <div class="formRight">
	                <input type="text" name="ten" title="Nhập tên" id="ten" class="tipS" value="<?=@$item['ten']?>" />
	            </div>
	            <div class="clear"></div>
	        </div> 
	        <div class="formRow">
				<label>diện tích min</label>
				<div class="formRight">
	                <input type="text" name="giatu" title="Nhập diện tích min" id="giatu" class="tipS validate[required]" value="<?=@$item['giatu']?>" />
				</div>
				<div class="clear"></div>
			</div>
	        <div class="formRow">
				<label>diện tích max</label>
				<div class="formRight">
	                <input type="text" name="giaden" title="Nhập diện tích max" id="giaden" class="tipS validate[required]" value="<?=@$item['giaden']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Title</label>
				<div class="formRight">
	                <input type="text" name="title" title="Nhập title seo" id="giatu" class="tipS validate[required]" value="<?=@$item['title']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Keywords</label>
				<div class="formRight">
	                <input type="text" name="keywords" title="Nhập từ khóa seo" id="keywords" class="tipS validate[required]" value="<?=@$item['keywords']?>" />
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Description</label>
				<div class="formRight">
	                <textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description"><?=@$item['description']?></textarea>(Tốt nhất là 160 ký tự)</b>
				</div>
				<div class="clear"></div>
			</div>
			
	        <div class="formRow">
	          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
	          <div class="formRight">
	           
	            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
	            <label for="check1">Hiển thị</label>            
	          </div>
	          <div class="clear"></div>
	        </div>
	        <div class="formRow">
	            <label>Số thứ tự: </label>
	            <div class="formRight">
	                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của danh mục, chỉ nhập số">
	            </div>
	            <div class="clear"></div>
	        </div>
       </div>
        <!-- end: info -->

		
		<div class="formRow">
			<div class="formRight">
                 <input type="hidden" name="id" id="id_this_dientich" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
		
	</div>  
	
</form>        </div>