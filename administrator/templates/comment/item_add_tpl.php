<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
	
</script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        <li><a href="default.php?com=about&act=man&type=<?=$_REQUEST["type"]?>"><span>Comment</span></a></li>
        <li class="current"><a href="#" onclick="return false;">Kiểm tra</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="default.php?com=comment&act=save&type=<?=$_REQUEST["type"]?>&curPage=<?=$_REQUEST['curPage']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
        </div>
		
		<div id="info" class="tab_content">
			<input type="hidden" name="id" id="id_this_about" value="<?=@$item['id']?>" />
			<div class="formRow">
				<label>Họ Tên: </label>
				<div class="formRight">
					<input type="text" id="name" name="hoten" value="<?=@$item['hoten']?>"  title="Tên người comment" readonly class="tipS" />
				</div>
				<div class="clear"></div>
			</div> 
			<div class="formRow">
				<label>Email: </label>
				<div class="formRight">
					<input type="text" id="email" name="email" value="<?=@$item['email']?>"  title="Email người comment" readonly class="tipS" />
				</div>
				<div class="clear"></div>
			</div>
            <div class="formRow">
				<label>Nội dung chính: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Nội dung comment"> </label>
				<div class="formRight">
					<textarea name="noidung" rows="8" cols="60" class="" id="content" readonly><?=@$item['noidung']?></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
				<div class="formRight">
					<input type="checkbox" name="active" id="check1" value="1" <?=(!isset($item['active']) || $item['active']==1)?'checked="checked"':''?> />
					<label for="check1">Duyệt comment</label>           
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<div class="formRight">
					
					<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
				</div>
				<div class="clear"></div>
			</div>

       </div><!-- End content <?=$key?> -->

	</div>
</form>