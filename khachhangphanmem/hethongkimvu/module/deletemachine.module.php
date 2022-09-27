<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    mysqli_query($mysqli,"DELETE FROM tbl_product_details WHERE id='$id'");
}
?>
