<?php
function get_main_city($id="")
    {
		$arr=explode(",",$id);
		error_reporting(0);
        $sql="select * from table_place_dist order by id";
        $stmt=mysql_query($sql);
        $str='
            <select id="id_dist" name="id_dist[]" multiple class="chosen-select">
            <option value="0">Chọn quận huyện</option>            
            ';
        while ($row=@mysql_fetch_array($stmt)) 
        {
            if(in_array($row["id"],$arr))
                $selected="selected";
            else 
                $selected="";
            $str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';            
        }
        $str.='</select>';
        return $str;
    }
    
    ?>
<link href="js/chosen/chosen.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/chosen/chosen.jquery.js"></script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=place&act=mam_street"><span>Đường</span></a></li>
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
<form name="supplier" id="validate" class="form" action="index.php?com=place&act=save_street&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<input type="hidden" name="id_city" value="<?=@$item['id_city']?>" />
        <div class="formRow">
            <label>Quận huyện</label>
            <div class="formRight">
				<?=get_main_city(@$item['id_dist'])?>
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
			<label>Tên</label>
			<div class="formRight">
                <input type="text" name="name" title="Nhập tên tỉnh thành" id="name" class="tipS validate[required]" value="<?=@$item['ten']?>" />
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
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>