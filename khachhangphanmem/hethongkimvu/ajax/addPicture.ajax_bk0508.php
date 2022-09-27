<?php 

require_once '../module/picture.module.php';
require_once '../module/product.module.php';
$picture = new Picture();
$product  = new Product();
$customerID = isset($_POST["customerID"]) ? $_POST["customerID"] : null ;
$projectID = isset($_POST["projectID"]) ? $_POST["projectID"] : null  ;
$typePictureName = isset($_POST["typePictureName"]) ? $_POST["typePictureName"] : null;
$imgName = isset($_POST["imgName"]) ? $_POST["imgName"] : null ;
$idPicture = isset($_POST["idPicture"]) ? $_POST["idPicture"] : null ;
$verPicture = isset($_POST["verPicture"]) ? $_POST["verPicture"] : null ;
$msPicture = isset($_POST["msPicture"]) ? $_POST["msPicture"] : null ;
$dvhNumber = isset($_POST["dvhNumber"]) ? $_POST["dvhNumber"] : null ;
$quantityPicture = isset($_POST["quantityPicture"]) ? $_POST["quantityPicture"] : null ;
$pricePicture = isset($_POST["pricePicture"]) ? $_POST["pricePicture"] : null ;
$vatPicture = isset($_POST["vatPicture"]) ? $_POST["vatPicture"] : null ;
$idCustomerChange = isset($_POST["idCustomerChange"]) ? $_POST["idCustomerChange"] : null ;
$idProjectChange = isset($_POST["idProjectChange"]) ? $_POST["idProjectChange"] : null ;
if(!is_null($customerID) && !is_null($projectID) && !is_null($typePictureName) && !is_null($imgName) && !is_null($msPicture) && !is_null($dvhNumber)&& !is_null($quantityPicture)&& !is_null($pricePicture) && !is_null($vatPicture)&& is_null($idPicture)){
    $result = $picture->insertPicture($customerID,$projectID,$typePictureName,$imgName,$msPicture,$dvhNumber,$quantityPicture,$pricePicture,$vatPicture);
    echo json_encode($result);
    return;
}else if(is_null($customerID) && is_null($projectID) && is_null($typePictureName) && is_null($imgName) && !is_null($idPicture)){
    $result =  $picture->deletePicture($idPicture);
    echo json_encode($result);
    return;
}else if(!is_null($customerID) && !is_null($projectID) && !is_null($typePictureName) && !is_null($idPicture) && !is_null($msPicture)  && !is_null($dvhNumber) && !is_null($quantityPicture) && !is_null($pricePicture) && !is_null($vatPicture)){
    if(!is_null($imgName)){
        $result = $picture->UpdatePicture($idPicture,$customerID,$projectID,$typePictureName,$imgName,$msPicture,$dvhNumber,$quantityPicture,$pricePicture,$vatPicture);
        echo json_encode($result);
        return;
    }else{
        $result = $picture->UpdatePicture($idPicture,$customerID,$projectID,$typePictureName,null,$msPicture,$dvhNumber,$quantityPicture,$pricePicture,$vatPicture);
        echo json_encode($result);
        return;
    }
}

if(!is_null($idCustomerChange)){
    $result = $picture->getDobyIdEmployer($idCustomerChange);
    echo json_encode($result);
}
if(!is_null($idProjectChange)){
    $result = $picture->getProjectByID($idProjectChange);
    echo json_encode($result);
}