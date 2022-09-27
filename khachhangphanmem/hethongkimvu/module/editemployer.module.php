<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
if(isset($_POST['idEmployer']))
{
    $idEmployer = $_POST['idEmployer'];
    $nameEmployer = $_POST['nameEmployer'];
    $addressEmployer = $_POST['addressEmployer'];
    $phoneEmployer = $_POST['phoneEmployer'];
    
    mysqli_query($mysqli,"UPDATE `employer` SET `nameEmployer`= '$nameEmployer',`addressEmployer`= '$addressEmployer',`phoneEmployer`='$phoneEmployer' WHERE `idEmployer`= $idEmployer");
}
