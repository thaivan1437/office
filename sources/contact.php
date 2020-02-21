
<?php

if (!defined('_source'))
    die("Error");

$title_bar .= _lienhe . " - ";
$breakcrumb='<li><a href="http://'.$config_url.'">Trang chủ</a></li>';
$breakcrumb.='<li class="active">Liên hệ</li>';
$arr_breakcumb[0]=array("url"=>"http://".$config_url,"name"=>"Trang chủ");
$arr_breakcumb[1]=array("url"=>"http://".$config_url."/".$com.".html","name"=>"Liên hệ");
if (!empty($_POST)) {
    include_once _lib . "C_email.php";
    $data['ten'] = $_POST['ten'];

    $data['nglienhe'] = $_POST['nglienhe'];
    $data['tencongty'] = $_POST['tencongty'];
    
       $data['tenvp'] = $_POST['tenvp'];
    $data['diachi'] = $_POST['diachi'];
    $data['dienthoai'] = $_POST['dienthoai'];
    $data['email'] = $_POST['email'];
    $data['tieude'] = $_POST['tieude'];
    $data['noidung'] = $_POST['noidung'];
    $data['ngaytao'] = time();

   // check_data($_POST);

    $subject = "Thư liên hệ từ " . $row_setting['title'];
    $body = '<table>';
    $body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website ' . $row_setting['website'] . '</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>';

                if($_POST['ten']!=''){
                $body.='<tr>
                    <th>Họ tên :</th><td>' . $_POST['ten']  . '</td>
                </tr>';}
                if($_POST['nglienhe'] !=''){
                $body.='<tr>
                    <th>Họ tên :</th><td>' . $_POST['nglienhe']  . '</td>
                </tr>';}
                if($_POST['tenvp'] !=''){
                $body.='<tr>
                    <th>Văn phòng chọn đi xem :</th><td>' . $_POST['tenvp']  . '</td>
                </tr>';}

				$body .= '
                <tr>
                    <th>Tên công ty :</th><td>' . $_POST['tencongty']  . '</td>
                </tr>


                ';
				if($_POST['diachi'] != ''){
				$body.='<tr>
					<th>Địa chỉ :</th><td>' . $_POST['diachi'] . '</td>
				</tr>';}
				$body.='<tr>
					<th>Điện thoại :</th><td>' . $_POST['dienthoai'] . '</td>
				</tr>
				<tr>
					<th>Email :</th><td>' . $_POST['email'] . '</td>
				</tr>';
				if($_POST['tieude'] != ''){
				$body.='<tr>
					<th>Tiêu đề :</th><td>' . $_POST['tieude'] . '</td>
				</tr>';
				}
				$body.='<tr>
					<th>Nội dung :</th><td>' . $_POST['noidung'] . '</td>
				</tr>';
    $body .= '</table>';

    //dump($body);

    include_once "phpmailer/class.phpmailer.php";
    //Khởi tạo đối tượng
    $mail = new PHPMailer();
	
    //Thiet lap thong tin nguoi gui va email nguoi gui
    $mail->IsSMTP(); // Gọi đến class xử lý SMTP
    $mail->SMTPAuth = true;                  // Sử dụng đăng nhập vào account
    $mail->Host = $iphost;     // Thiết lập thông tin của SMPT
    $mail->Username = $userhost; // SMTP account username
    $mail->Password = $passhost;            // SMTP account password
    $mail->SetFrom($userhost, $row_setting['title_vi']);
    //Thiết lập thông tin người nhận
    $mail->AddAddress($row_setting['email'], $_POST['hoten']);
    $mail->AddBCC($email);

    //Thiết lập email nhận email hồi đáp
    //nếu người nhận nhấn nút Reply
    $mail->AddReplyTo($userhost, $row_setting['title_vi']);


    /* =====================================
     * THIET LAP NOI DUNG EMAIL
     * ===================================== */

    //Thiết lập tiêu đề
    $mail->Subject = "Thông tin liên hệ";

    //Thiết lập định dạng font chữ
    $mail->CharSet = "utf-8";

    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

    //Thiết lập nội dung chính của email
    $mail->MsgHTML($body);

    if (!$mail->Send()) {
        transfer("Có lỗi xảy ra!", "index.html");
    } else {

        transfer("Gửi liên hệ thành công!<br/>", "index.html");
    }
}
$d->reset();
$sql_contact = "select noidung_$lang as noidung from #_lienhe ";
$d->query($sql_contact);
$company_contact = $d->fetch_array();


$image_share='http://' . $config_url .'/'._upload_hinhanh_l.$row_photo["logo"];
?>