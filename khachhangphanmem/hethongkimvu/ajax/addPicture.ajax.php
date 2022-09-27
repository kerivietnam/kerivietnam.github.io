<?php 

require_once '../module/picture.module.php';
$picture = new Picture();

$idPicture = isset($_POST["idPicture"]) ? $_POST["idPicture"] : null ;
$customerID = isset($_POST["customerID"]) ? $_POST["customerID"] : null ;
$projectID = isset($_POST["projectID"]) ? $_POST["projectID"] : null ;
$dvhNumber = isset($_POST["dvhNumber"]) ? $_POST["dvhNumber"] : null ;
$quantityPicture = isset($_POST["quantityPicture"]) ? $_POST["quantityPicture"] : null ;
$pricePicture = isset($_POST["pricePicture"]) ? $_POST["pricePicture"] : null ;
$vatPicture = isset($_POST["vatPicture"]) ? $_POST["vatPicture"] : null ;
$pictureFree = isset($_POST["pictureFree"]) ? $_POST["pictureFree"] : null ;

$arrayColumn = ["idCustomer","dvhNumber","idProject","quantityPicture","pricePicture","vatPicture","idPictureFree"];
$arrayValue =[$customerID,$dvhNumber,$projectID,$quantityPicture,$pricePicture,$vatPicture,$pictureFree];
$tableName = "tbl_keri_picture";

if( !is_null($customerID) &&  !is_null($projectID) &&  !is_null($dvhNumber) &&  !is_null($quantityPicture)&& !is_null($pricePicture)&& !is_null($vatPicture) && is_null($idPicture) ){
    $value = $picture->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,-1,"insert");
    echo json_encode($value);
}else if(is_null($customerID) &&  is_null($projectID) && is_null($dvhNumber) &&  is_null($quantityPicture)&& is_null($pricePicture)&& is_null($vatPicture) && !is_null($idPicture)){
    $value = $picture->doTranslateArray2SQL($tableName,[],[],$idPicture,"delete");
    echo json_encode($value);
}else if(!is_null($customerID) &&  !is_null($projectID) &&  !is_null($dvhNumber) &&  !is_null($quantityPicture)&& !is_null($pricePicture)&& !is_null($vatPicture) && !is_null($idPicture)){
    $value = $picture->doTranslateArray2SQL($tableName,$arrayColumn,$arrayValue,$idPicture,"update");
    echo json_encode($value);
}


$idCustomerChange = isset($_POST["idCustomerChange"]) ? $_POST["idCustomerChange"] : null ;
$idProjectChange = isset($_POST["idProjectChange"]) ? $_POST["idProjectChange"] : null ;
$idPictureFreeChange = isset($_POST["idPictureFreeChange"]) ? $_POST["idPictureFreeChange"] : null ;



if(!is_null($idCustomerChange)){
    $result = $picture->getDobyIdEmployer($idCustomerChange);
    echo json_encode($result);
}
if(!is_null($idProjectChange)){
    $result = $picture->getProjectByID($idProjectChange);
    echo json_encode($result);
}
if(!is_null($idPictureFreeChange)){
    $result = $picture->getPictureFreeByID($idPictureFreeChange);
    echo json_encode($result);
}