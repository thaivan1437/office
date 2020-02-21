<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "capnhat":
        get_gioithieu();
        $template = "schema/item_add";
        break;
    case "save":
        save_gioithieu();
        break;

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

function get_gioithieu() {
    global $d, $item;

    $sql = "select * from #_schema limit 0,1";
    $d->query($sql);
    //if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "default.php");
    $item = $d->fetch_array();
}

function save_gioithieu() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "default.php?com=schema&act=capnhat");
	//dump($_POST);
    $data['name'] = magic_quote($_POST['name']);
    $data['shortname'] = magic_quote($_POST['shortname']);

    $data['additionaltype'] = magic_quote($_POST['additionaltype']);
    $data['priceRange'] = magic_quote($_POST['PriceRange']);

    $data['hasMap'] = magic_quote($_POST['hasMap']);
    $data['hasOfferCatalog'] = magic_quote($_POST['hasOfferCatalog']);
	$data['sameas'] = magic_quote($_POST['sameas']);
	$data['ward'] = magic_quote($_POST['ward']);
	$data['street'] = magic_quote($_POST['street']);
	$data['district'] = magic_quote($_POST['district']);
	$data['postalCode'] = magic_quote($_POST['postalCode']);
	$data['city'] = magic_quote($_POST['city']);
	$data['dayOfWeek'] = implode(",",$_POST['dayOfWeek']);
	$data['opens'] = magic_quote($_POST['opens']);
	$data['closes'] = magic_quote($_POST['closes']);
	$data['urlTemplate'] = magic_quote($_POST['urlTemplate']);
	$data['inLanguage'] = magic_quote($_POST['inLanguage']);
	$data['potentialAction'] = magic_quote($_POST['potentialAction']);
	$data['personname'] = magic_quote($_POST['personname']);
	$data['jobTitle'] = magic_quote($_POST['jobTitle']);
	$data['image'] = magic_quote($_POST['image']);
	$data['worksFor'] = magic_quote($_POST['worksFor']);
	$data['url'] = magic_quote($_POST['url']);
	$data['personsameAs'] = magic_quote($_POST['personsameAs']);
	$data['AlumniOf'] = magic_quote($_POST['AlumniOf']);
	$data['addressLocality'] = magic_quote($_POST['addressLocality']);
	$data['addressRegion'] = magic_quote($_POST['addressRegion']);
	$data['ratingValue'] = magic_quote($_POST['ratingValue']);
	$data['reviewCount'] = magic_quote($_POST['reviewCount']);
	$data['priceCurrency'] = magic_quote($_POST['priceCurrency']);
	$data['perdescription'] = magic_quote($_POST['perdescription']);
	$data['datePublished'] = magic_quote($_POST['datePublished']);
	$data['price'] = magic_quote($_POST['price']);
	$data['schemar'] = magic_quote($_POST['schema']);
	$data['offer'] = magic_quote($_POST['offer']);
	$data['type'] = magic_quote($_POST['type']);
	

    
    /* if ($photo = upload_image("file", 'jpg|png|gif', _upload_hinhanh, $file_name)) {
        $data['fav'] = $photo;
        $d->setTable('schema');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() > 0) {
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['fav']);
        }
    } */
    $d->reset();
    $d->setTable('schema');
    if ($d->update($data))
        header("Location:default.php?com=schema&act=capnhat");
    else
        transfer("Cập nhật dữ liệu bị lỗi", "default.php?com=schema&act=capnhat");
}

?>