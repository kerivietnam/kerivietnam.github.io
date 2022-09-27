<?php
require_once '../connectDB/connectdb.module.php';
require_once '../connectDB/connect.php';

if(isset($_POST['id_workStatus']))
{
    $id_workStatus = $_POST['id_workStatus'];
    mysqli_query($mysqli,"DELETE FROM `tbl_keri_workstatus` WHERE `id` = $id_workStatus ");
}
?>