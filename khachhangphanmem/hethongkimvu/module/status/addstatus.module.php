<?php
require_once '../connectDB/connectdb.module.php';
require_once '../connectDB/connect.php';
if(isset($_POST['workStatus']))
{
    $workStatus = $_POST['workStatus'];


    mysqli_query($mysqli,"INSERT INTO tbl_keri_workstatus (workStatus) VALUES ('$workStatus')");
}

