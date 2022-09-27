<?php 

require_once '../module/picture.module.php';
require_once '../module/product.module.php';
$picture = new Picture();
$product  = new Product();
$idProduct = isset($_POST["idProduct"]) ? $_POST["idProduct"] : null ;
$idCategory = isset($_POST["idCategory"]) ? $_POST["idCategory"] : null ;

if(!is_null($idProduct) && is_null($idCategory) ){
    $result =  $product->getProductById($idProduct);
    echo json_encode($result);
    return;
}else if(is_null($idProduct) && !is_null($idCategory)){
    $result = $product->getProductByIdCategory($idCategory);
    echo json_encode($result);
    return;
}