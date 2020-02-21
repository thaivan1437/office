<?php

if (!defined('_source'))
    die("Error");
//check($_POST);
$title_tcat = 'Giỏ hàng';
if (isAjaxRequest()) {

    if ($_POST['act'] == "add") {

        addtocart($_POST['id'], $_POST['sl'],$_POST["size"],$_POST["color"]);

        echo json_encode(array("num" => get_total()));
        die();
    }
}

if($_GET['act'] == "fill"){
	include _template."giohang_tpl.php";
	die;

}
?>