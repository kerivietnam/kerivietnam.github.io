<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

if(isset($_POST['nameEmployer']))
{
    $nameEmployer = $_POST['nameEmployer'];
    $addressEmployer = $_POST['addressEmployer'];
    $phoneEmployer = $_POST['phoneEmployer'];
    mysqli_query($mysqli,"INSERT INTO `employer` (`nameEmployer`, `addressEmployer`,`phoneEmployer`) VALUES ('$nameEmployer', '$addressEmployer','$phoneEmployer')");
}
