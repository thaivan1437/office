<?php
session_start();
@define('_template', '../templates/');
@define('_source', '../sources/');
@define ( '_lib' , '../../libraries/');
error_reporting(-1);
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";

$d = new database($config['database']);
$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
	case 'province':
		$pro=$_REQUEST['pro'];
		load_district($pro);
		break;
	case 'ward':
		$pro=$_REQUEST['pro'];
		load_ward($pro);
		break;
	case 'street':
		$pro=$_REQUEST['pro'];
		load_street($pro);
		break;
	
}
function load_district($pro){
	global $d;
	$d->reset();
	$sql="select * from #_place_dist where id_city='".$pro."' order by id";
	//echo $sql;
	$d->query($sql);
	$rs_district=$d->result_array();
	$kq='';
	foreach($rs_district as $v){
		$kq.= '<option value="'.$v['id'].'">'. $v["ten"].'</option>';
	}
	echo $kq;
}
function load_ward($pro){
	global $d;
	$d->reset();
	$sql="select * from #_place_ward where id_dist='".$pro."' order by id";
	//echo $sql;
	$d->query($sql);
	$rs_district=$d->result_array();
	$kq='';
	foreach($rs_district as $v){
		$kq.= '<option value="'.$v['id'].'">'. $v["ten"].'</option>';
	}
	echo $kq;
}
function load_street($pro){
	global $d;
	$d->reset();
	$sql="select * from #_place_street where id_dist='".$pro."' order by id";
	//echo $sql;
	$d->query($sql);
	$rs_district=$d->result_array();
	$kq='';
	foreach($rs_district as $v){
		$kq.= '<option value="'.$v['id'].'">'. $v["ten"].'</option>';
	}
	echo $kq;
}
?>