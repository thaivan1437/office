<div class="box_content">
	<div class="content">
		<div class="tcat">
			<div class="icon">Đăng ký tài khoản</div>
			<div class="tcat_right"></div>
		</div>
		<div class="modal-body">
			<form role="form" action="" method="post" enctype="multipart/form-data" name="formdktv" id="formdktv" onsubmit="return check();">
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Email</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email"> 
						<span id="emailLoading" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
						<span id="emailResult"></span>
					</div>
				</div>
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Mật khẩu</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="password" class="form-control" name="matkhau" id="matkhau_tv" placeholder="Mật khẩu">
						<span id="matkhauLoading_tv" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
						<span id="matkhauResult_tv"></span>
					</div>
				</div>
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Gõ lại mật khẩu</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="password" class="form-control" name="golaimatkhau" id="golaimatkhau_tv" placeholder="Gõ lại mật khẩu">
						<span id="golaimatkhauLoading_tv" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
						<span id="golaimatkhauResult_tv"></span>
					</div>
				</div>
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Họ và Tên</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="text" class="form-control" name="ten" id="ten" placeholder="Họ và Tên">
					</div>
				</div>
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Giới tính</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="radio" class="" name="sex" value="1" id="nam" checked="" style="width:13px; display: initial; margin-left: 20px"> <label for="nam">Nam</label>
						<input type="radio" class="" name="sex" value="0" id="nu" style="width:13px; display: initial; margin-left: 10px"> <label for="nu">Nữ</label> 
					</div>
				</div>
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ngày sinh</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="date" name="ngaysinh" id="ngaysinh" max="2100-12-31" min="1970-12-31" style="line-height: 20px;" class="">
					</div> 
				</div>
				
				<div class="form-group clear">
					<label for="recipient-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Số điện thoại</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="text" name="sodt" id="sodt" class="form-control" placeholder="Số điện thoại">
					</div> 
				</div>

				<div class="form-group clear">
					
					<label for="message-text" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Địa chỉ</label>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<select name="province" id="province" class="input form-control">
							<option value='0'> --- Chọn tỉnh thành phố ---</option>
							<?php foreach($rs_province1 as $v){?>
							<option value="<?=$v['id']?>" <?php if($v['id']==$item['province']) echo "selected"; ?> ><?=$v["ten"]?></option>
							<?php }?>
						</select>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<select name="district" id="district" class="input form-control">
							<option value='0'> --- Chọn Quận huyện ---</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<input class="form-control" id="diachi" name="diachi" placeholder="Số nhà, đường phố,.." />
					</div>
				</div>

				<div class="form-group clear">
					<label for="message-text" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Mã bảo vệ</label>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<input type="text" name="capt" id="capt" class="input">
						<span class="error">
						</span><br>
						<img src="captcha_image.php">
					</div>
				</div>
				<div class="clear"></div>
			</form>
		</div>
		<div class="modal-footer">
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<span id="RegLoading" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
				<span id="RegResult"></span>	
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
				
				<button type="button" class="btn btn-primary" onclick="return check();">Đăng ký</button>
			</div>
		</div>  
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e) {
        $('#province').change(function(){
			var pro = $(this).val();
			$('#district').load("ajax/xuly.php?act=load-quan&id="+$(this).val());
		})
    });
</script>