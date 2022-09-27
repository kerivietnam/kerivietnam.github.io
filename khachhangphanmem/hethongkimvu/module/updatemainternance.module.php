<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
$workStatus = $_POST['workStatus'];
$seri_id = $_POST['dvhNumber'];
$idProduct = $_POST['idProject'];
$sql_query  = "update tbl_keri_product_2021 set workStatus = '$workStatus'
WHERE seri_id = '$seri_id' and idProduct = '$idProduct'";
$mysqli2 = new mysqli("localhost","root","Keri2021@","hpspicture");
mysqli_query($mysqli2, $sql_query);
