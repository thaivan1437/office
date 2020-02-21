<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "dientich/items";
        break;
    case "add":
        $template = "dientich/item_add";
        break;
    case "edit":
        get_item();
        $template = "dientich/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;
    #===================================================	
    case "man_cat":
        get_cats();
        $template = "dientich/cats";
        break;
    case "add_cat":
        $template = "dientich/cat_add";
        break;
    case "edit_cat":
        get_cat();
        $template = "dientich/cat_add";
        break;
    case "save_cat":
        save_cat();
        break;
    case "delete_cat":
        delete_cat();
        break;
    default:
        $template = "index";

    default:
        $template = "index";
}

function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}

function get_items() {
    global $d,$type, $items, $paging;
	if(!empty($_POST)){
		$multi=$_REQUEST['multi'];
		$id_array=$_POST['iddel'];
		$count=count($id_array);
		if($multi=='show'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_dientich SET hienthi =1 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=dientich&act=man&type=".$type);			
		}
		
		if($multi=='hide'){
			for($i=0;$i<$count;$i++){
				$sql = "UPDATE table_dientich SET hienthi =0 WHERE  id = ".$id_array[$i]."";
				mysql_query($sql) or die("Not query sqlUPDATE_ORDER");				
			}
			redirect("index.php?com=dientich&act=man&type=".$type);			
		}
		
		if($multi=='del'){
			for($i=0;$i<$count;$i++){
				
				$sql = "select id from #_dientich where id= ".$id_array[$i]."";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						delete_file(_upload_tintuc.$row['photo']);
						delete_file(_upload_tintuc.$row['thumb']);			
					}
				}
				$sql = "delete from table_dientich where id = ".$id_array[$i]."";
				
				if(mysql_query($sql)){
					
					
				}
							
			}
			redirect("index.php?com=dientich&act=man&type=".$type);			
		}
		
		
	}
    $sql = "select * from #_dientich ";
    $sql.=" order by stt,id desc";

    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=dientich&act=man";
    $maxR = 20;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d,$type, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=dientich&act=man");

    $sql = "select * from #_dientich where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=dientich&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d,$type;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=dientich&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	//Phần dữ liệu chung
	if ($_POST['ten'] != '') {
		$data['ten'] = $_POST['ten'];
	}
	$data['tenkhongdau'] = changeTitle($_POST['ten']);
	$data['giatu'] = (int)$_POST['giatu'];
	$data['giaden'] = (int)$_POST['giaden'];
	$data['donvi'] = (int)$_POST['donvi'];
	$data['title'] = magic_quote($_POST['title']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	$data['description'] = magic_quote($_POST['description']);

	$data['stt'] = $_POST['stt'];
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
    if ($id) {
        $id = themdau($_POST['id']);
		
        $d->setTable('dientich');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=dientich&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dientich&act=man");
    }else {

        $d->setTable('dientich');
        if ($d->insert($data))
            redirect("index.php?com=dientich&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=dientich&act=man");
    }
}

function delete_item() {
    global $d,$type;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select * from #_dientich where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            $sql = "delete from #_dientich where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=dientich&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=dientich&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=dientich&act=man");
}

//===========================================================
?>