<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

if(isset($_POST['idEmployer']))
{
    $idEmployer = $_POST['idEmployer'];
    mysqli_query($mysqli,"DELETE FROM `employer` WHERE `idEmployer` = $idEmployer ");
}
?>