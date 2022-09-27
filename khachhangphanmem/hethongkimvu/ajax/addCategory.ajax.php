<?php 

require_once '../module/category.module.php';
$category = new Category();

$idCN = isset($_POST["idCN"]) ? $_POST["idCN"]  : null;
$idEmployer = isset($_POST["idEmployer"]) ? $_POST["idEmployer"]  : null;
$idContact = isset($_POST["idContact"]) ? $_POST["idContact"]  : null;
$idSeri = isset($_POST["idSeri"]) ? $_POST["idSeri"]  : null;
$categoryName = isset($_POST["categoryName"]) ? $_POST["categoryName"]  : null;
$idCategory = isset($_POST["idCategory"]) ? $_POST["idCategory"] : null;



if(!is_null($idCN)  &&  is_null($idEmployer) &&  is_null($idContact) &&  is_null($idSeri) &&  is_null($categoryName) ){
    $result = $category->getDVHbyCNid($idCN);
    echo json_encode($result);
}else if(is_null($idCN)  &&  !is_null($idEmployer) &&  !is_null($idContact) &&  !is_null($idSeri) &&  !is_null($categoryName) && is_null($idCategory)){
    $result = $category->addCategory($idEmployer , $idContact,$idSeri,$categoryName);
    echo $result;
}else if( is_null($idCN)  &&  is_null($idEmployer) &&  is_null($idContact) &&  is_null($idSeri) &&  is_null($categoryName) && !is_null($idCategory) ){
    $result = $category->deleteCategory($idCategory);
    echo $result;
}else if(is_null($idCN)  && !is_null($idEmployer) &&  !is_null($idContact) &&  !is_null($idSeri) &&  !is_null($categoryName) && !is_null($idCategory) ){
    $result = $category->updateCategory( $idCN , $idEmployer , $idContact , $idSeri , $categoryName , $idCategory );
    echo $result;
}else if( is_null($idCN)  && !is_null($idEmployer) &&  is_null($idContact) &&  is_null($idSeri) &&  is_null($categoryName) && is_null($idCategory) ){
    $result = $category->getCNbyidEmployer($idEmployer);
    echo json_encode($result);
}



