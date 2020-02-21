function IsNumeric(sText)
{
    var ValidChars = "0123456789";
    var IsNumber = true;
    var Char;

    for (i = 0; i < sText.length && IsNumber == true; i++)
    {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1)
        {
            IsNumber = false;
        }
    }
    return IsNumber;
}
function check_email(email)
{
    emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(email);
}

function validEmail(email){
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(email);
}
	
function finishAjax(parent, id, response) {
    $('#' + parent).hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
;
function finishAjax1(id, response) {
    $('#emailLoading').hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
function finishAjax3(id, response) {
    $('#RegLoading').hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
function fillme(name,id) {
        $("#tendoanhnghiep").val(name);
		$("#id_dn").val(id);
        $(".load_dn").html('');
		$.ajax({
			type: "POST",
			url: "ajax/check.php",
			data: {username:name, act: 'checkdoanhnghiep'},
			success:function(data){
				var kh = $.parseJSON(data);
				$("#sodt").val(kh.dienthoai);
				$("#ngaysinh").val(kh.date);
				$("#email").val(kh.email);
				
				$("#province").html(kh.load_province);
				$("#district").html(kh.load_district);
				$("#nganhnghe").html(kh.load_nganhnghe);
				$("#diachi").val(kh.diachi);
				$('#tenResult_tv').fadeOut();
				setTimeout("finishAjax('tenLoading_tv','tenResult_tv', '" + escape(kh.thongbao) + "')", 400);
				//console.log(kh);
			}
		});
    }
$(document).ready(function () {
// kiểm tra đăng kí doanh nghiêp
	$("#tendoanhnghiep").keyup(function () {
		var search_string = $("#tendoanhnghiep").val();
		if (search_string == '') {
			$(".load_dn").html('');
		} else {
			postdata = {'string': search_string, 'act':'loaddoanhnghiep'}
			$.post("ajax/check.php", postdata, function (data) {
				$(".load_dn").html(data);
			});
		}
	});
	$('#tenLoading_tv').hide();
	$('#tendoanhnghiep').blur(function () {
		var name= $('#tendoanhnghiep').val()
		$.ajax({
			type: "POST",
			url: "ajax/check.php",
			data: {username:name, act: 'checkdoanhnghiep'},
			success:function(data){
				var kh = $.parseJSON(data);
				$("#sodt").val(kh.dienthoai);
				$("#ngaysinh").val(kh.date);
				$("#email").val(kh.email);
				
				$("#province").html(kh.load_province);
				$("#district").html(kh.load_district);
				$("#nganhnghe").html(kh.load_nganhnghe);
				$("#diachi").val(kh.diachi);
				$('#tenResult_tv').fadeOut();
				setTimeout("finishAjax('tenLoading_tv','tenResult_tv', '" + escape(kh.thongbao) + "')", 400);
				//console.log(kh);
			}
		});
	})
//Kiem tra user thành viên
    $('#usernameLoading_tv').hide();
    $('#username_tv').blur(function () {
        $('#usernameLoading_tv').show();
        $.post("ajax/check.php", {
			act: "checkuser_tv",
            username: $('#username_tv').val()
        }, function (response) {
            $('#usernameResult_tv').fadeOut();
			setTimeout("finishAjax('usernameLoading_tv','usernameResult_tv', '" + escape(response) + "')", 400);
        });
        return false;
    });
//Kiem tra mật khẩu
    $('#matkhauLoading_tv').hide();
    $('#matkhau_tv').keypress(function () {
		
        $('#matkhauLoading_tv').show();
        $.post("ajax/check.php", {
			act: "checkpass_tv",
            matkhau: $('#matkhau_tv').val()
        }, function (response) {
            $('#matkhauResult_tv').fadeOut();
			setTimeout("finishAjax('matkhauLoading_tv','matkhauResult_tv', '" + escape(response) + "')", 400);
        });
        
    });

//Kiem tra nhập lại mật khẩu
    $('#golaimatkhauLoading_tv').hide();
    $('#golaimatkhau_tv').blur(function () {
        $('#golaimatkhauLoading_tv').show();
        $.post("ajax/check.php", {
			act: "checkrepass_tv",
			pass:$('#matkhau_tv').val(),
            repass: $('#golaimatkhau_tv').val()
        }, function (response) {
            $('#golaimatkhauResult_tv').fadeOut();
			setTimeout("finishAjax('golaimatkhauLoading_tv','golaimatkhauResult_tv', '" + escape(response) + "')", 400);
        });
        return false;
    });
    $('#RegLoading').hide();
//Kiem tra email
    $('#emailLoading').hide();
    $('#email').blur(function () {
		
		$('#emailLoading').show();
		$.post("ajax/check.php", {
			email: $('#email').val(),
			act:"checkemail",
		}, function (response) {
			$('#emailResult').fadeOut();
			setTimeout("finishAjax1('emailResult', '" + escape(response) + "')", 400);
		});
		return false;
		
    });
});



function check()
{
    var frm = document.formdktv;
    $('#RegLoading').show();
    /* if (frm.username_tv.value == '')
    {
        alert("Bạn chưa nhập tên đăng nhập.");
        frm.username_tv.focus();
        $('#RegLoading').hide();
        return false;
    } */
    if (frm.matkhau_tv.value == '')
    {
        alert("Bạn chưa nhập mật khẩu.");
        frm.matkhau_tv.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (frm.golaimatkhau_tv.value == '')
    {
        alert("Bạn chưa nhập lại mật khẩu");
        frm.golaimatkhau_tv.focus();
        $('#RegLoading').hide();
        return false;
    }

    if (frm.sodt.value == '')
    {
        alert("Bạn chưa nhập số điện thoại");
        frm.sodt.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (frm.ten.value == '')
    {
        alert("Bạn chưa điền họ tên.");
        frm.ten.focus();
        $('#RegLoading').hide();
        return false;
    }
	if (frm.province.value == 0)
    {
        alert("Bạn chưa chọn thành phố");
        frm.province.focus();
        $('#RegLoading').hide();
        return false;
    }
	
	if (frm.district.value == 0)
    {
        alert("Bạn chưa chọn quận huyện");
        frm.district.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (frm.diachi.value == '')
    {
        alert("Bạn chưa nhập địa chỉ");
        frm.diachi.focus();
        $('#RegLoading').hide();
        return false;
    }

    if (frm.capt.value == '')
    {
        alert("Bạn chưa nhập mã bảo vệ.");
        frm.capt.focus();
        $('#RegLoading').hide();
        return false;
    }

    if (!IsNumeric(frm.sodt.value))
    {
        alert("Bạn chưa nhập số điện thoại.");
        frm.sodt.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (!validEmail(frm.email.value)) {
        alert('Vui lòng nhập đúng địa chỉ email');
        frm.email.focus();
        $('#RegLoading').hide();
        return false;
    }
	var currentLocation = window.location;
    $.post("ajax/user.php", {
        // username: $('#username_tv').val(),
        matkhau: $('#matkhau_tv').val(),
        golaimatkhau: $('#golaimatkhau_tv').val(),
        ten: $('#ten').val(),
        sex: $('input[name="sex"]:checked').val(),
        ngaysinh: $('#ngaysinh').val(),
        email: $('#email').val(),
        sodt: $('#sodt').val(),
        province: $('#province').val(),
		district: $('#district').val(),
		diachi: $('#diachi').val(),
        capt: $('#capt').val(),
        act: 'reg'
    }, function (response) {
		$k=$.parseJSON(response);
        $('#RegResult').fadeOut();
        setTimeout("finishAjax3('RegResult', '" + escape($k.thongbao) + "')", 400);
		if($k.id==1){
			setTimeout(function(){
				location.href=base_url+"/dang-nhap.html";
			}, 3000);
		}
		
    });
}

function finishAjax_login(id, response) {
    $('#LoginLoading').hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
;
function finishAjax_reset(id, response) {
    $('#ResetLoading').hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
;

function login_check()
{
	var currentLocation = window.location;
    var frm = document.dangnhap;
    $('#LoginLoading').show();
    if (frm.login_username.value == '')
    {
        alert("Bạn chưa điền tên đăng nhập.");
        frm.login_username.focus();
        $('#LoginLoading').hide();
        return false;
    }
    if (frm.login_matkhau.value == '')
    {
        alert("Bạn chưa điền mật khẩu.");
        frm.login_matkhau.focus();
        $('#LoginLoading').hide();
        return false;
    }



    $.post("ajax/user.php", {
        username: $('#login_username').val(),
        matkhau: $('#login_matkhau').val(),
        act: 'login'
    }, function (response) {
		$k=$.parseJSON(response);
        $('#LoginResult').fadeOut();
        setTimeout("finishAjax_login('LoginResult', '" + escape($k.thongbao) + "')", 400);
		if($k.id==1){
			setTimeout(function(){
				location.href=base_url+"/trang-chu.html";
			}, 3000);
		}
    });
}
function reset_check()
{
    var frm = document.resetpass;
    $('#ResetLoading').show();
    if (!validEmail(frm.email_reset.value)) {
        alert('Vui lòng nhập đúng địa chỉ email');
        frm.email_reset.focus();
        $('#ResetLoading').hide();
        return false;
    }

    if (frm.capt_reset.value == '')
    {
        alert("Bạn chưa điền mã bảo vệ.");
        frm.capt_reset.focus();
        $('#ResetLoading').hide();
        return false;
    }


    $.post("ajax/user.php", {
        email: $('#email_reset').val(),
        username: $('#username_reset').val(),
        capt: $('#capt_reset').val(),
        act: 'lostpw'
    }, function (response) {
		$k=$.parseJSON(response);
        $('#ResetResult').fadeOut();
        setTimeout("finishAjax_reset('ResetResult', '" + escape($k.msg) + "')", 400);
		if($k.stt==1){
			setTimeout(function(){
				location.href=base_url+"/trang-chu.html";
			}, 3000);
		}else{
			return false;
		}
    });
}
function dologin(evt) {
    // IE					// Netscape/Firefox/Opera
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        login_check();
    }
}
function finishAjax_tt(id, response) {
    $('#RegLoading').hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
$(document).ready(function () {
    $('#RegLoading').hide();
});


function IsNumeric(sText)
{
    var ValidChars = "0123456789";
    var IsNumber = true;
    var Char;

    for (i = 0; i < sText.length && IsNumber == true; i++)
    {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1)
        {
            IsNumber = false;
        }
    }
    return IsNumber;
}

function check_info()
{
    var frm = document.forminfo;
    $('#RegLoading').show();


    if (frm.sodt.value == '')
    {
        alert("Bạn chưa điền số điện thoại.");
        frm.sodt.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (frm.ten.value == '')
    {
        alert("Bạn chưa điền tên.");
        frm.ten.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (frm.diachi.value == '')
    {
        alert("Bạn chưa điền địa chỉ.");
        frm.diachi.focus();
        $('#RegLoading').hide();
        return false;
    }
    if (frm.capt_tt.value == '')
    {
        alert("Bạn chưa điền mã bảo vệ.");
        frm.capt_tt.focus();
        $('#RegLoading').hide();
        return false;
    }



    if (!IsNumeric(frm.sodt.value))
    {
        alert("Vui lòng nhập đúng số điện thoại.");
        frm.sodt.focus();
        $('#RegLoading').hide();
        return false;
    }


    $.post("ajax/user.php", {
        ten: $('#ten').val(),
        sex: $('input[name="sex"]:checked').val(),
        ngaysinh: $('#ngaysinh').val(),
        sodt: $('#sodt').val(),
        diachi: $('#diachi').val(),
        capt: $('#capt_tt').val(),
        act: 'info'
    }, function (response) {
        $('#RegResult').fadeOut();
        setTimeout("finishAjax_tt('RegResult', '" + escape(response) + "')", 400);
    });
}
function finishAjax3(id, response) {
    $('#PWLoading').hide();
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}
$(document).ready(function () {
    $('#PWLoading').hide();
});

function check_doipass()
{
    var frm = document.formdoipass;
    $('#PWLoading').show();

    if (frm.matkhau.value == '')
    {
        alert("Bạn chưa điền mật khẩu.");
        frm.matkhau.focus();
        $('#PWLoading').hide();
        return false;
    }
    if (frm.matkhaumoi.value == '')
    {
        alert("Bạn chưa điền mật khẩu mới.");
        frm.matkhaumoi.focus();
        $('#PWLoading').hide();
        return false;
    }
    if (frm.golaimatkhau.value == '')
    {
        alert("Bạn chưa điền lại mật khẩu mới.");
        frm.golaimatkhau.focus();
        $('#PWLoading').hide();
        return false;
    }

    if (frm.capt.value == '')
    {
        alert("Bạn chưa điền mã bảo vệ.");
        frm.capt.focus();
        $('#PWLoading').hide();
        return false;
    }

    $.post("ajax/user.php", {
        matkhau: frm.matkhau.value,
        matkhaumoi: $('#matkhaumoi').val(),
        golaimatkhau: frm.golaimatkhau.value,
        capt: frm.capt.value,
        act: 'doimatkhau'
    }, function (response) {
        $('#PWResult').fadeOut();
        setTimeout("finishAjax3('PWResult', '" + escape(response) + "')", 400);
    }
    );
}