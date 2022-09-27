<?php 

require_once '../module/dvh.module.php';
$DvhNumber = new DvhNumber();

$customerName = isset($_POST["customerName"]) ? $_POST["customerName"]  : null;
$dvhnumber = isset($_POST["dvhnumber"]) ? $_POST["dvhnumber"]  : null;
$idDvh = isset($_POST["idDvh"]) ? $_POST["idDvh"]  : null;
$key = isset($_POST["key"]) ? $_POST["key"]  : null;
$tableName = "tbl_keri_seri";
$arrayColumn = ["serinumber","idEmployer"];
$arrayValue = [$dvhnumber,$customerName];
if(!is_null($dvhnumber) && !is_null($customerName) && is_null($idDvh) && is_null($key)){
    $value = $DvhNumber->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,-1,"insert");
    echo json_encode($value);
}else if(is_null($dvhnumber) && is_null($customerName) && !is_null($idDvh && is_null($key))){
    $value = $DvhNumber->doTranslateArray2SQL($tableName,[],[],$idDvh,"delete");
    echo json_encode($value);
}else if(!is_null($dvhnumber) && !is_null($customerName) && !is_null($idDvh) && is_null($key)){
    $value = $DvhNumber->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,$idDvh,"update");
    echo json_encode($value);
}else if(!is_null($dvhnumber) && !is_null($customerName) && !is_null($key) && !is_null($idDvh)){
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$arrayValue = [$dvhnumber.' - COPY - '.date('d-m-Y H:i:s'),$customerName];
    $value = $DvhNumber->copySql($tableName,$arrayColumn,$arrayValue,$idDvh,$customerName);
    echo json_encode($value);
}





