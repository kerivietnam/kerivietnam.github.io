<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';


if(isset($_POST['idProduct'])||$_POST['name_product']||$_POST['price_product'])
{
    $id = $_POST['idProduct'];
    $nameProduct = $_POST['nameProduct'];
    $priceProduct = $_POST['priceProduct'];
    $dvtProduct = $_POST['dvtProduct'];
    $vatProduct = $_POST['vatProduct'];
    $idCategory = $_POST['idCategory'];
    mysqli_query($mysqli,"UPDATE `tbl_keri_product` SET `nameProduct`= '$nameProduct',`priceProduct`= '$priceProduct',`dvtProduct`= '$dvtProduct',`idCategory`= '$idCategory',`vatProduct`= '$vatProduct' WHERE `idProduct`= $id");
}
    



