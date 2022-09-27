<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
var_dump($_POST);
if(isset($_POST['nameProduct']))
{
    $nameProduct = $_POST['nameProduct'];
    $priceProduct = $_POST['priceProduct'];
    $dvtProduct = $_POST['dvtProduct'];
    $idCategory = $_POST['idCategory'];
    $vatProduct = $_POST['vatProduct'];
    
    mysqli_query($mysqli,"INSERT INTO `tbl_keri_product` (`nameProduct`, `priceProduct`, `dvtProduct`, `idCategory`, `vatProduct`) VALUES ('$nameProduct','$priceProduct','$dvtProduct','$idCategory','$vatProduct')");
}

