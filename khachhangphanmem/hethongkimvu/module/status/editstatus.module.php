<?php
require_once '../connectDB/connectdb.module.php';
require_once '../connectDB/connect.php';
if(isset($_POST['workStatus']))
{
    $id_workStatus = $_POST['id_workStatus'];
    $workStatus = $_POST['workStatus'];
    
    mysqli_query($mysqli,"UPDATE tbl_keri_workstatus SET workStatus = '$workStatus' WHERE id= '$id_workStatus'");
	echo "UPDATE tbl_keri_workstatus SET workStatus = '$workStatus' WHERE id= '$id_workStatus'";
}

