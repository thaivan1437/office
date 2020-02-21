<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="default.php?com=comment&act=man&type=<?=$_REQUEST["type"]?>"><span>Bình luận</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='default.php?com=comment&act=add&type=<?=$_REQUEST["type"]?>'" />
        <!--<input type="button" class="blueB" value="Hiện" onclick="ChangeAction('default.php?com=product&act=man&type=<?=$_REQUEST["type"]?>&multi=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('default.php?com=product&act=man&type=<?=$_REQUEST["type"]?>&multi=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('default.php?com=product&act=man&type=<?=$_REQUEST["type"]?>&multi=del');return false;" />-->
    </div>
	
</div>



<div class="widget">
	<div class="title">
		<span class="titleIcon">
			<input type="checkbox" id="titleCheck" name="titleCheck" />
		</span>
		<h6>Danh sách các bài viết hiện có</h6>
	</div>
	<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
		<thead>
			<tr>
				<td></td>
				<td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
				<td width="150">Họ tên</td>
				<td width="400"><div>Bình luận<span></span></div></td>
				<td width="150"><div>Ngày bình luận<span></span></div></td>
				<td class="tb_data_small">Duyệt</td>
				<td width="150">Thao tác</td>
			</tr>
		</thead>
		<tbody>
			<?php for($i=0, $count=count($items); $i<$count; $i++){?>
			<tr>
				<td>
					<input type="checkbox" name="iddel[]" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
				</td>
				<td align="center">
					<?=$i+1?>
				</td> 
				<td align="center">
					<?= $items[$i]['hoten'] ?>
				</td>
				<td align="center" class="title_name_data" >
					<?php
						$d->reset();
						$sql="select ten_vi from #_product where id='".$items[$i]["id_sp"]."'";
						$d->query($sql);
						$rs=$d->fetch_array();
						echo $rs["ten_vi"];
					?>
				</td>
				<td >
					<?=date("d/m/Y",$items[$i]['ngaytao']) ?>
				</td>
				<td align="center">
					<input type="checkbox" data-com="active" data-table="comment" data-id="<?=$items[$i]['id']?>" <?php if($items[$i]['active']==1) echo "checked";?> name="active" value="<?=$items[$i]['id']?>" class="check_box" />
				</td>
				<td class="actBtns">
					<a href="default.php?com=comment&act=edit&id=<?=$items[$i]['id']?>&type=<?=$_REQUEST["type"]?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/pencil.png" alt=""></a>
					<a href="" onclick="CheckDelete('default.php?com=comment&act=delete&id=<?=$items[$i]['id']?>&type=<?=$_REQUEST["type"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/icons/dark/close.png" alt=""></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10"><div class="pagination paging"><?= $paging['paging'] ?></div></td>
			</tr>
		</tfoot>
	</table>
</div>
</form>
<script type="text/javascript">
	
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá bài viết này?'))
		{
			location.href = l;	
		}
	}	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}
</script>
