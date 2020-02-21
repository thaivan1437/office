<div class="box_content">
<div class="content-index " id="dangnhap" >
    <div class="modal-dialog">
        <div class="modal-content Login">
            <div class="modal-header">
                <h4 class="modal-title white-color" id="myModalLabel">MỜI BẠN ĐĂNG NHẬP</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" enctype="multipart/form-data" name="dangnhap" id="dangnhap" onsubmit="return login_check();">
                    <div class="form-group clear">
                        <label for="recipient-name" class="col-xs-12 control-label">Tên đăng nhập</label>
                        <div class="col-xs-12">
                            <input type="text" class="form-control" name="username" id="login_username" placeholder="Tên đăng nhập">

                        </div>
                    </div>
                    <div class="form-group clear">
                        <label for="recipient-name" class="col-xs-12 control-label">Mật khẩu</label>
                        <div class="col-xs-12">
                            <input type="password" class="form-control" name="matkhau" id="login_matkhau" placeholder="Mật khẩu" onkeypress="dologin(event);">
                        </div>

                    </div>
					<?php /*<div class="form-group clear">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><img src="images/login_f" onclick="loginFb(); return false;" class="img-responsive" alt="đăng nhập bằng facebook" /></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <img src="images/login_g" class="img-responsive" onclick="login(); return false;" alt="đăng nhập bằng Google Plus" />
                        </div>
                    </div>*/?>
                    <div class="clear"></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-xs-12">
                    <span id="LoginLoading" style="display: none;"><img src="assets/images/ajax-loader.gif" width="16"></span>
                    <span id="LoginResult"></span>	
                </div>
                <div class="col-xs-12">
                    <button type="button" class="btn btn-default" onclick="javascript:window.location = 'quen-mat-khau.html'">Quên mật khẩu</button>
                    <button type="button" class="btn btn-primary" onclick="return login_check();">Đăng nhập</button>
                </div>
            </div>  
        </div>
    </div>
</div>
</div>