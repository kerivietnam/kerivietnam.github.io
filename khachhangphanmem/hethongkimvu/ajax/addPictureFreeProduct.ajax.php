<?php 

require_once '../module/pictureFreeProduct.module.php';
$product = new Product();

$idEmployer = isset($_POST["customerName"]) ? $_POST["customerName"]  : null;
$seri_id = isset($_POST["dvhNumber"]) ? $_POST["dvhNumber"]  : null;

$idProduct = isset($_POST["idProduct"]) ? $_POST["idProduct"]  : null;
$nameProduct = isset($_POST["nameProduct"]) ? $_POST["nameProduct"]  : null;
$priceProduct = isset($_POST["priceProduct"]) ? $_POST["priceProduct"]  : null;
$dvtProduct = isset($_POST["dvtProduct"]) ? $_POST["dvtProduct"]  : null;
$vatProduct = isset($_POST["vatProduct"]) ? $_POST["vatProduct"]  : null;

// From freePicture
$idPictureFree = isset($_POST["idPictureFree"]) ? $_POST["idPictureFree"]  : null;
$corePictureFree = isset($_POST["corePictureFree"]) ? $_POST["corePictureFree"]  : null;
$msPicrureFree = isset($_POST["msPicrureFree"]) ? $_POST["msPicrureFree"]  : null;
$namePictureFree = isset($_POST["namePictureFree"]) ? $_POST["namePictureFree"]  : null;
$typePictureFree = isset($_POST["typePictureFree"]) ? $_POST["typePictureFree"]  : null;
$nicknamePictureFree = isset($_POST["nicknamePictureFree"]) ? $_POST["nicknamePictureFree"]  : null;

$tableName = "tbl_keri_product_2021";
$arrayColumn = ["idEmployer","seri_id","nameProduct","priceProduct","dvtProduct","vatProduct","namePicrureFree","corePictureFree","msPicrureFree","typePictureFree","nicknamePicrureFree","verPictureFree"];
$arrayValue = [$idEmployer,$seri_id,$nameProduct,$priceProduct,$dvtProduct,$vatProduct,$namePictureFree,$corePictureFree,$msPicrureFree,$typePictureFree,$nicknamePictureFree];


if(
       !is_null($idEmployer) && !is_null($seri_id) && !is_null($nameProduct) && !is_null($priceProduct) && !is_null($dvtProduct) &&!is_null($vatProduct) 
	&& !is_null($corePictureFree) && !is_null($msPicrureFree) && !is_null($namePictureFree) && !is_null($typePictureFree)
	&& is_null($idProduct)){
    $value = $product->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,-1,'insert');
    //echo json_encode($value);
	echo $value;
}else if(
       is_null($idEmployer) && is_null($seri_id) && is_null($nameProduct) && is_null($priceProduct) && is_null($dvtProduct) &&is_null($vatProduct)
	&& is_null($corePictureFree) && is_null($msPicrureFree) && is_null($namePictureFree) && is_null($typePictureFree)
	&& !is_null($idProduct)){
    $value = $product->doTranslateArray2SQL($tableName,[],[],$idProduct,'delete');
    //echo json_encode($value);
	echo $value;
}else if(
       !is_null($idEmployer) && !is_null($seri_id) && !is_null($nameProduct) && !is_null($priceProduct) && !is_null($dvtProduct) && !is_null($vatProduct)
	&& !is_null($corePictureFree) && !is_null($msPicrureFree) && !is_null($namePictureFree) && !is_null($typePictureFree)
	&& !is_null($idProduct)){
    $value = $product->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,$idProduct,'update');
    //echo json_encode($value);
	echo $value;
}
