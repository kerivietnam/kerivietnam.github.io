<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
if(isset($_POST['name_user'])||isset($_POST['date_user'])||isset($_POST['address_user'])||isset($_POST['phone_user']))
{
    $id_user = $_POST['id_user'];
    $name_user = $_POST['name_user'];
    $date_user = $_POST['date_user'];
    $address_user = $_POST['address_user'];
    $phone_user=$_POST['phone_user'];
    
    mysqli_query($mysqli,"UPDATE `tbl_user` SET `name_user`= '$name_user',`date_user`= '$date_user',`address_user`='$address_user',`phone_user`='$phone_user' WHERE `id_user`= $id_user");
}

