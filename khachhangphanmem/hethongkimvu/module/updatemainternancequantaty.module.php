<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
$idProductValue = $_POST['idProductValue'];
$idProduct = $_POST['idProduct'];
$sql_query  = "update tbl_keri_product_2021 set quantityPicture = '$idProductValue' WHERE idProduct = '$idProduct'";
$mysqli2 = new mysqli("localhost","root","Keri2021@","hpspicture");
mysqli_query($mysqli2, $sql_query);
