<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

if(isset($_POST['idProduct']))
{
    $id = $_POST['idProduct'];
    mysqli_query($mysqli,"DELETE FROM `tbl_keri_product` WHERE `idProduct` = $id ");
}
?>