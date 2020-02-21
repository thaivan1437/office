<?php
function get_main_city($id=0)
    {
        $sql="select * from table_place_city order by stt";
        $stmt=mysql_query($sql);
        $str='
            <select id="id_city" name="id_city" class="main_font">
            <option>Chọn tỉnh thành</option>            
            ';
        while ($row=@mysql_fetch_array($stmt)) 
        {
            if($row["id"]==(int)$id)
                $selected="selected";
            else 
                $selected="";
            $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';            
        }
        $str.='</select>';
        return $str;
    }
    
    ?>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=place&act=mam_province"><span>Quận huyện</span></a></li>
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
<form name="supplier" id="validate" class="form" action="index.php?com=place&act=save_dist&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<input type="hidden" name="id_city" value="<?=@$item['id_city']?>" />
		
		<div class="formRow">
			<label>Tên</label>
			<div class="formRight">
                <input type="text" name="name" title="Nhập tên quận huyện" id="name" class="tipS validate[required]" value="<?=@$item['ten']?>" />
			</div>
			<div class="clear"></div>
		</div>		        
        <div class="formRow">
			<label>Title</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
	
		<div class="formRow">
			<label>Từ khóa</label>
			<div class="formRight">
				<input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho bài viết" class="tipS" />
			</div>
			<div class="clear"></div>
		</div>
	
		<div class="formRow">
			<label>Description:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description"><?=@$item['description']?></textarea>(Tốt nhất là 160 ký tự)</b>
			</div>
			<div class="clear"></div>
		</div>
        
        <div class="formRow">
            <label>H1</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung thẻ h1" class="tipS description_input" name="h1"><?=@$item['h1']?></textarea>(Tốt nhất là 160 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H2:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung thẻ h2" class="tipS description_input" name="h2"><?=@$item['h2']?></textarea>(Tốt nhất là 160 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>H3:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung thẻ h3" class="tipS description_input" name="h3"><?=@$item['h3']?></textarea>(Tốt nhất là 160 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
                <label>Nội dung chính: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
                <div class="formRight">
                    <textarea name="noidung" rows="8" cols="60" class="editor" id="noidung"><?=@$item['noidung']?></textarea>
                </div>
                <div class="clear"></div>
            </div>
    
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
		
	<div class="formRow">
            <div class="formRight">
                <input type="hidden" name="id" id="id_this_place" value="<?=@$item['id']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>	
	</div>
   
	
</form>   