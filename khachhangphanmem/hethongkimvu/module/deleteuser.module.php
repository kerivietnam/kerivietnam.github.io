<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

if(isset($_POST['id_user']))
{
    $id = $_POST['id_user'];
    mysqli_query($mysqli,"DELETE FROM `tbl_user` WHERE `id_user` = $id ");
}
?>