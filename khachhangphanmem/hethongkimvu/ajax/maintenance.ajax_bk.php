<?php

require_once '../module/maintenance.module.php';
$mainten = new Maintenance();

$customerName = isset($_POST["customerName"])? $_POST["customerName"] : null;
$cnNumber = isset($_POST["cnNumber"])? $_POST["cnNumber"] : null;
$dvhnumber = isset($_POST["dvhnumber"])? $_POST["dvhnumber"] : null;


if(!is_null($customerName) &&  !is_null($cnNumber) && !is_null($cnNumber)){
    $state = $mainten->insertContact($customerName,$dvhnumber,$cnNumber);
    if($state == "200"){
        echo "success";
        return;
    }else{
        echo "failure";
        return;
    }
}




