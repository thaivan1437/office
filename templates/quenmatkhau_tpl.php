<?php 
	$d->reset();
	$sql="select * from #_province order by provinceid";
	$d->query($sql);
	$rs_province=$d->result_array();
	
	$d->reset();
	$sql="select * from #_district where provinceid='".$province."' order by districtid";
	$d->query($sql);
	$rs_district=$d->result_array();
?>
<div class="box_content">
	<div class="content">
		<div class="tcat">
			<div class="icon">Quên mật khẩu</div>
			<div class="tcat_right"></div>
		</div>
		<div class="modal-body">
			<form role="form" action="" method="post" enctype="multipart/form-data" name="resetpass" id="resetpass" onsubmit="return reset_check();">				
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Email</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="email" name="email_reset" id="email_reset" class="form-control" placeholder="Email"> 
						<span id="emailLoading" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
						<span id="emailResult"></span>
					</div>
				</div>
				

				<div class="form-group clear">
					<label for="message-text" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Mã bảo vệ</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="text" name="capt_reset" id="capt_reset" class="input">
						<span class="error">
						</span><br>
						<img src="captcha_image.php">
					</div>
				</div>
				<div class="clear"></div>
				<button type="button" class="btn btn-primary" onclick="return reset_check();" >Lấy lại mật khẩu</button>
			</form>
		</div>
		<div class="modal-footer">
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<span id="ResetLoading" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
				<span id="ResetResult"></span>	
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				
				
			</div>
		</div>  
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e) {
        $('#province').change(function(){
			var pro = $(this).val();
			$('#district').load("admin/ajax/ajax_admin.php?pro="+ pro+"&act=province");
		})
    });
</script>