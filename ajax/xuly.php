<?php

include ("configajax.php");

$act = $_REQUEST['act'];
switch ($act) {
    case "comment":
        comment();
        break;
	case "step1":
        step1();
        break;
	case "load-quan":
        loadquan();
        break;
	case "load-phuong":
        loadphuong();
        break;
	case "load-street":
        loadstreet();
        break;
	case 'answer_comment':
		answer_comment();
		break;
    case 'add_compare':
		add_compare();
		break;
	case 'add_compare1':
		add_compare1();
		break;
	case 'delete_compare':
		delete_compare();
		break;
	case 'chuyendoi':
		chuyendoi();
		break;
}

function chuyendoi(){

	global $d, $lang;
	$id=$_POST["id"];

    $d->reset();
	$data["donvi"]= $id;

	$d->setTable("setting");

	if($d->update($data)){
		$rs["stt"]=1;
	}else
	{
		$rs["stt"]=2;
	}
	echo json_encode($rs);


}
function delete_compare(){
	$id=$_POST["id"];
	remove_compare($id);
	$kq=get_total_compare();
	echo $kq;
}
function add_compare1(){

	global $d, $lang;
	$id=$_POST["id"];

	addcompare($id);

	$kq=get_total_compare();
	echo $kq;
}
function add_compare(){

	global $d, $lang;
	$id=$_POST["id"];

	addcompare($id);

	$kq='';
	//check_data($_SESSION["compare"]);

	foreach($_SESSION["compare"] as $k=>$v){
		$kq.='<div class="form-group addcompare">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<div class="closes" data-id="'.$v["productid"].'"><img src="assets/images/icon_del.png" alt="remove" class="img-responsive" /></div>
				<img src="'.thumb(get_product_image($v["productid"]),_upload_product_l,get_product_namekd($v["productid"]),200,140,1,80).'" alt="'.get_product_name($v["productid"]).'" class="img-responsive" />
			</div>
			<div class="col-md-8 col-sm-8 col-xs-8" style="padding-top: 20px;">
				<b>'.get_product_name($v["productid"]).'</b>
			</div>
			<div class="clear"></div>
		</div>';
	}
	$kq.='<script>
	$(document).ready(function(){
		$(".addcompare .closes").click(function(){
			$root=$(this).parents(".addcompare");
			$pid=$(this).data("id");
			$.ajax({
				url:"ajax/xuly.php",
				type:"POST",
				data:{id:$pid, act:"delete_compare"},
				success:function(data){
					$root.remove();
				}
			})
		})
	})
	</script>';
	echo $kq;
}
function answer_comment(){
	global $d;
	
	$ten=$_POST['hoten'];
	$email=$_POST['email'];
	$noidung=$_POST['noidung'];
	
	$ten = trim(strip_tags($ten));
	$noidung = trim(strip_tags($noidung));
	
	$ngaytao=time();
	$data['hoten']=$ten;
	$data['noidung']=$noidung;
	$data['email']=$email;
	$data['active']=1;
	$data["id_parent"]=$_POST["id_parent"];
	$data["ngaytao"]=$ngaytao;
	
	$d->reset();
	$d->setTable("comment");
	if($d->insert($data)){
		$id=$d->insert_id;
		$d->reset();
		$sql="select * from #_comment where id='".$id."'";
		$d->query($sql);
		$v1=$d->fetch_array();
		$kq='<div class="result_comment" id="'.md5($v1["id"]).'">
				<div class="content_comment">
					<div class="name"><span>'.$v1['hoten'].'</span> - '.date("h:i:s d/m/Y",$v1["ngaytao"]).'</div>';
					
					$kq.='<div class="noidung">'.$v1['noidung'].'</div>
				</div>
			</div>';
			$rs["kq"]=$kq;
			$rs["stt"]=1;
	}else{
		$rs["stt"]=0;
	}
	echo json_encode($rs);
}
function comment() {
    global $config_url, $d,$row_setting;
	
    $ten = $_POST['hoten'];
	$noidung = $_POST['noidung'];
	$id_sp = $_POST['id_sp'];
	$rate = $_POST['rating'];
	

    //validate dữ liệu
    $sodt = trim(strip_tags($sodt));
    $ten = trim(strip_tags($ten));
    $email = trim(strip_tags($email));
    $tieude = trim(strip_tags($tieude));
	$noidung = trim(strip_tags($noidung));
    $_SESSION['email_reg'] = $email;

    $coloi = false;
    /* if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $coloi = true;
        $error_email = "Email không đúng định dạng <br>";
    } */

    
    if ($ten == NULL) {
        $coloi = true;
        $error_ten = "Chưa nhập họ tên <br>";
    }

    /* if ($email == NULL) {
        $coloi = true;
        $error_email = "Chỉ có thành viên học mới có thể nhận xét khóa học <br>";
    } */
	if ($noidung == NULL) {
        $coloi = true;
        $error_noidung = "Chưa nhập nội dung bình luận <br>";
    }

    $thongbao = ' <div class="error_mess">' . $error_email . $error_noidung . '</div>';
	
    if ($coloi == FALSE) {
		$d->reset();
        $data["ngaytao"] = time();
		$data["hoten"]=$ten;
		$data["email"]=$email;
		$data["noidung"]=$noidung;
		$data["id_sp"]=$id_sp;
		$data["danhgia"]=$rate;
		$d->setTable("comment");
		if($d->insert($data)){
			$d->reset();
			$sql="update table_product set rate=rate+".$rate.", luot_rate=luot_rate + 1 ,rate".$rate."=rate".$rate." + 1 where id=".$id_sp."";
			$d->query($sql);
			$rs["id"]=1;
			$rs["thongbao"]="<span style='color:red;'>Cảm ơn bạn đã nhận xét này. Nhận xét của bạn sẽ được duyệt và đăng lên trong thời gian sớm nhất. </span>";
		}
		else{
			$rs["id"]=0;
			$rs["thongbao"]= "<span style='color:red;'>Nhận xét thất bại. </span>";
		}
    } else {
        $rs["id"]=0;
		$rs["thongbao"]= $thongbao;
    }
	echo json_encode($rs);
}
function step1(){
	global $d, $row_setting;
	
	$chon = $_POST['chon'];
	$username = $_POST['email'];
    $password = $_POST['pass'];
	if($chon==2){
		$_SESSION["thanhtoan"]["email"]=$username;
		$rs["id"]=1;
		$rs["thongbao"]="";
		$rs["url"]="thanh-toan.html";
	}else{
		/* $username = mysql_real_escape_string($username); */
		$matkhau = mysql_real_escape_string($matkhau);
		$sql = "select * from #_member where email='" . $username . "'";
		$d->query($sql);
		if ($d->num_rows() == 1) {
			$row = $d->fetch_array();
			if ($row['hienthi'] ==1) {
				if ($row['password'] == md5($password)) {
					$_SESSION[$login_name] = true;
					$_SESSION['login_web']['id'] = $row['id'];
					$_SESSION['login_web']['username'] = $row['email'];
					$_SESSION['login_web']['ten'] = $row['ten_vi'];
					$_SESSION['login_web']['com'] = $row['com'];
					$rs["id"]=1;
					$rs["thongbao"]="<span style='color:#f00;'>Đăng nhập thành công!. Hệ thống sẽ chuyển trang trong giây lát. </span>";
					$rs["url"]="thanh-toan.html";
				} else{
					$rs["id"]=0;
					$rs["thongbao"]="<span style='color:#f00'>Mật khẩu đăng nhập chưa đúng.</span><a href='quen-mat-khau.html'>Quên mật khẩu</a>";
				}
			} else{
				$rs["id"]=0;
				$rs["thongbao"]="<span style='color:#f00'>" . _taikhoanchuakichhoat . "</span>";
			}
		} else{
			$rs["id"]=0;
			$rs["thongbao"]="<span style='color:#f00'>Tài khoản không tồn tại </span>";
		}
	}
	echo json_encode($rs);
}
function loadquan(){
	global $d;
	
	$province=$_REQUEST["id"];
	$district=$_REQUEST["idi"];
	
	$d->reset();
	$sql="select * from #_place_dist where id_city='".$province."' order by stt, id";
	$d->query($sql);
	$rs=$d->result_array();
	
	$data='<option value=""> -- Chọn quận huyên -- </option>';
	foreach($rs as $v){
		$data.='<option value="'.$v["id"].'"'; if($v["id"]==$district) $data.="selected";$data.= '>'.$v["ten"].'</option>';
	}
	
	echo $data;
}
function loadphuong(){
	global $d;
	
	$province=$_REQUEST["id"];
	$district=$_REQUEST["idi"];
	
	$d->reset();
	$sql="select * from #_place_ward where id_dist='".$province."' order by stt, id";
	$d->query($sql);
	$rs=$d->result_array();
	
	$data='<select name="ward_s" class="form-control chosen-select" id="ward_s"><option value=""> -- Phường cần thuê -- </option>';
	foreach($rs as $v){
		$data.='<option value="'.$v["id"].'"'; if($v["id"]==$district) $data.="selected";$data.= '> Phường '.$v["ten"].'</option>';
	}
	$data.='</select>
	<script>
		$(document).ready(function(){
			var config = {
				  ".chosen-select"           : {}
				}
				for (var selector in config) {
				  $(selector).chosen(config[selector]);
				}
		})
	</script>
	';
	echo $data;
}
function loadstreet(){
	global $d;
	
	$province=$_REQUEST["id"];
	$district=$_REQUEST["idi"];
	
	$d->reset();
	$sql="select * from #_place_street where id_dist='".$province."' order by stt, id";
	$d->query($sql);
	$rs=$d->result_array();
	
	$data='<select name="street_s" class="form-control chosen-select" id="street_s"><option value=""> -- Đường cần thuê -- </option>';
	foreach($rs as $v){
		$data.='<option value="'.$v["id"].'"'; if($v["id"]==$district) $data.="selected";$data.= '>'.$v["ten"].'</option>';
	}
	$data.='</select>
	<script>
		$(document).ready(function(){
			var config = {
				  ".chosen-select"           : {}
				}
				for (var selector in config) {
				  $(selector).chosen(config[selector]);
				}
		})
	</script>
	';
	
	echo $data;
}
?>