<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
if(isset($_POST['name_user']))
{
    $name_user = $_POST['name_user'];
    $date_user = $_POST['date_user'];
    $address_user = $_POST['address_user'];
    $phone_user = $_POST['phone_user'];


    mysqli_query($mysqli,"INSERT INTO `tbl_user` (`name_user`, `date_user`, `address_user`,`phone_user`) VALUES ('$name_user','$date_user', '$address_user','$phone_user')");
}

