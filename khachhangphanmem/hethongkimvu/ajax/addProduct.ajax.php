<?php 

require_once '../module/product.module.php';
$product = new Product();

$idProduct = isset($_POST["idProduct"]) ? $_POST["idProduct"]  : null;
$nameProduct = isset($_POST["nameProduct"]) ? $_POST["nameProduct"]  : null;
$priceProduct = isset($_POST["priceProduct"]) ? $_POST["priceProduct"]  : null;
$dvtProduct = isset($_POST["dvtProduct"]) ? $_POST["dvtProduct"]  : null;
$vatProduct = isset($_POST["vatProduct"]) ? $_POST["vatProduct"]  : null;
$tableName = "tbl_keri_product";
$arrayColumn = ["nameProduct","priceProduct","dvtProduct","vatProduct"];
$arrayValue = [$nameProduct,$priceProduct,$dvtProduct,$vatProduct];
if(!is_null($nameProduct) && !is_null($priceProduct) && !is_null($dvtProduct) &&!is_null($vatProduct) && is_null($idProduct)){
    $value = $product->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,-1,'insert');
    echo json_encode($value);
}else if(is_null($nameProduct) && is_null($priceProduct) && is_null($dvtProduct) &&is_null($vatProduct) && !is_null($idProduct)){
    $value = $product->doTranslateArray2SQL($tableName,[],[],$idProduct,'delete');
    echo json_encode($value);
}else if(!is_null($nameProduct) && !is_null($priceProduct) && !is_null($dvtProduct) && !is_null($vatProduct) && !is_null($idProduct)){
    $value = $product->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,$idProduct,'update');
    echo json_encode($value);
}





