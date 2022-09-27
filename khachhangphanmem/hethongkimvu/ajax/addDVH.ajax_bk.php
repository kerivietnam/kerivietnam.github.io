<?php 

require_once '../module/dvh.module.php';
$DvhNumber = new DvhNumber();

$customerName = isset($_POST["customerName"]) ? $_POST["customerName"]  : null;
$dvhnumber = isset($_POST["dvhnumber"]) ? $_POST["dvhnumber"]  : null;
$idDvh = isset($_POST["idDvh"]) ? $_POST["idDvh"]  : null;
$tableName = "tbl_keri_seri";
$arrayColumn = ["serinumber","idEmployer"];
$arrayValue = [$dvhnumber,$customerName];
if(!is_null($dvhnumber) && !is_null($customerName) && is_null($idDvh)){
    $value = $DvhNumber->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,-1,"insert");
    echo json_encode($value);
}else if(is_null($dvhnumber) && is_null($customerName) && !is_null($idDvh)){
    $value = $DvhNumber->doTranslateArray2SQL($tableName,[],[],$idDvh,"delete");
    echo json_encode($value);
}else if(!is_null($dvhnumber) && !is_null($customerName) && !is_null($idDvh)){
    $value = $DvhNumber->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,$idDvh,"update");
    echo json_encode($value);
}





