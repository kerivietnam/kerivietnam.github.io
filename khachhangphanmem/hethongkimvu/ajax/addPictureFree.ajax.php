<?php 

require_once '../module/pictureFree.module.php';
$pictureFree = new pictureFree();


$idPictureFree = isset($_POST["idPictureFree"]) ? $_POST["idPictureFree"]  : null;
$corePictureFree = isset($_POST["corePictureFree"]) ? $_POST["corePictureFree"]  : null;
$msPicrureFree = isset($_POST["msPicrureFree"]) ? $_POST["msPicrureFree"]  : null;
$namePictureFree = isset($_POST["namePictureFree"]) ? $_POST["namePictureFree"]  : null;
$typePictureFree = isset($_POST["typePictureFree"]) ? $_POST["typePictureFree"]  : null;
$nicknamePictureFree = isset($_POST["nicknamePictureFree"]) ? $_POST["nicknamePictureFree"]  : null;
$arrayColum = ["namePicrureFree","corePictureFree","msPicrureFree","typePictureFree","nicknamePicrureFree","verPictureFree"];
$arrayValue = [$namePictureFree,$corePictureFree,$msPicrureFree,$typePictureFree,$nicknamePictureFree];
$tableName = "tbl_keri_picture_free";
if( !is_null($corePictureFree) && !is_null($msPicrureFree) && !is_null($namePictureFree) && !is_null($typePictureFree) && is_null($idPictureFree)){
    
    $value = $pictureFree->doTranslateArray2SQL($tableName,$arrayColum,$arrayValue,-1,"insert");
    echo json_encode($value);

}else if(is_null($corePictureFree) && is_null($msPicrureFree) && is_null($namePictureFree) && is_null($typePictureFree) && !is_null($idPictureFree)){
    $value = $pictureFree->doTranslateArray2SQL($tableName,[],[],$idPictureFree,"delete");
    echo json_encode($value);

}else if(!is_null($corePictureFree) && !is_null($msPicrureFree) && !is_null($namePictureFree) && !is_null($typePictureFree) && !is_null($idPictureFree)){
    $value = $pictureFree->doTranslateArray2SQL($tableName,$arrayColum,$arrayValue,$idPictureFree,"update");
    echo json_encode($value);
}




