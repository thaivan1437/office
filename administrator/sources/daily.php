<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "daily/items";
        break;
    case "add":
        $template = "daily/item_add";
        break;
    case "edit":
        get_item();
        $template = "daily/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;

    default:
        $template = "index";
}

function get_items() {
    global $d, $items, $paging;

    $sql = "select * from #_daily order by stt,ten_vi";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=daily&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=daily&act=man");

    $sql = "select * from #_daily where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=daily&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=daily&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) { // cap nhat
        $id = themdau($_POST['id']);
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['daily'] = $_POST['daily'];
        $data['skype'] = $_POST['skype'];
        $data['dienthoai'] = $_POST['dienthoai'];
        $data['email'] = $_POST['email'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaysua'] = time();

        $d->setTable('daily');
        $d->setWhere('id', $id);
        if ($d->update($data))
            header("Location:index.php?com=daily&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=daily&act=man");
    }else { // them moi
        $data['ten_vi'] = $_POST['ten_vi'];
        $data['ten_en'] = $_POST['ten_en'];
        $data['daily'] = $_POST['daily'];
        $data['skype'] = $_POST['skype'];
        $data['dienthoai'] = $_POST['dienthoai'];
        $data['stt'] = $_POST['stt'];
        $data['email'] = $_POST['email'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();

        $d->setTable('daily');
        if ($d->insert($data))
            header("Location:index.php?com=daily&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=daily&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_daily where id='" . $id . "'";
        if ($d->query($sql))
            header("Location:index.php?com=daily&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=daily&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=daily&act=man");
}

#--------------------------------------------------------------------------------------------- photo
?>


