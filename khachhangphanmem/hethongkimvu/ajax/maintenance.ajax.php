<?php

require_once '../module/maintenance.module.php';
$mainten = new Maintenance();

$customerName = isset($_POST["customerName"])? $_POST["customerName"] : null;
$cnNumber = isset($_POST["cnNumber"])? $_POST["cnNumber"] : null;
// $dvhnumber = isset($_POST["dvhnumber"])? $_POST["dvhnumber"] : null;
$idContact = isset($_POST["idContact"])? $_POST["idContact"] : null;

if(!is_null($customerName) &&  !is_null($cnNumber) && is_null($idContact)){
      $state = $mainten->insertContact($customerName,$cnNumber);
    echo json_encode($state);
   return;
}else if(is_null($customerName) &&  is_null($cnNumber) && !is_null($idContact)){
    $state = $mainten->deleteContactByID($idContact);
    echo $state;
    return;
}else if(!is_null($customerName) &&  !is_null($cnNumber) && !is_null($idContact)){
    $state = $mainten->updateContact($customerName,$cnNumber,$idContact);
    echo $state;
    return;
}

$nameEmployer = isset($_POST["nameEmployer"])? $_POST["nameEmployer"] : null;
$soCN = isset($_POST["soCN"])? $_POST["soCN"] : null;
$soDVH = isset($_POST["soDVH"])? $_POST["soDVH"] : null;
$status =isset($_POST["status"])? $_POST["status"] : null;
$product_name = isset($_POST["product_name"])? $_POST["product_name"] : null;
$unit = isset($_POST["unit"])? $_POST["unit"] : null;
$amount = isset($_POST["amount"])? $_POST["amount"] : null;
$typeBV = isset($_POST["typeBV"])? $_POST["typeBV"] : null;
$embryo = isset($_POST["embryo"])? $_POST["embryo"] : null;
$gc = isset($_POST["gc"])? $_POST["gc"] : null;
$unit_price = isset($_POST["unit_price"])? $_POST["unit_price"] : null;
$into_money = isset($_POST["into_money"])? $_POST["into_money"] : null;
$vat = isset($_POST["vat"])? $_POST["vat"] : null;
$into_money_vat = isset($_POST["into_money_vat"])? $_POST["into_money_vat"] : null;
$pay = isset($_POST["pay"])? $_POST["pay"] : null;
$rest = isset($_POST["rest"])? $_POST["rest"] : null;
$idCategory = isset($_POST["idCategory"])? $_POST["idCategory"] : null;
$idMaintenance = isset($_POST["idMaintenance"])? $_POST["idMaintenance"] : null;
if(!is_null($soCN) && !is_null($soDVH) && !is_null($status) && !is_null($product_name) && !is_null($unit) && !is_null($amount) && !is_null($typeBV) && !is_null($embryo) && !is_null($gc) && !is_null($unit_price) && !is_null($into_money) && !is_null($vat) && !is_null($into_money_vat) && !is_null($pay)&& !is_null($rest) && !is_null($nameEmployer) && !is_null($idCategory) && is_null($idMaintenance)){
   $result =  $mainten->insertMaintenanceTech($soCN,$soDVH,$status,$product_name,$unit,$amount,$typeBV,$embryo,$gc,$unit_price,$into_money,$vat,$into_money_vat,$pay,$rest,$idCategory,$nameEmployer);
   echo json_encode($result[0]);
   return;
}else if(is_null($soCN) && is_null($soDVH) && is_null($status) && is_null($product_name) && is_null($unit) && is_null($amount) && is_null($typeBV) && is_null($embryo) && is_null($gc) && is_null($unit_price) && is_null($into_money) && is_null($vat) && is_null($into_money_vat) && is_null($pay)&& is_null($rest)&& is_null($nameEmployer) && !is_null($idMaintenance)){
    $result = $mainten->deleteMaintenanceTechByID($idMaintenance);
    echo $result;
    return;
}else if(!is_null($soCN) && !is_null($soDVH) && !is_null($status) && !is_null($product_name) && !is_null($unit) && !is_null($amount) && !is_null($typeBV) && !is_null($embryo) && !is_null($gc) && !is_null($unit_price) && !is_null($into_money) && !is_null($vat) && !is_null($into_money_vat) && !is_null($pay)&& !is_null($rest)&& !is_null($idCategory) && !is_null($idMaintenance)&& !is_null($nameEmployer)){
    $result = $mainten->updateMaintenanceTech($soCN,$soDVH,$status,$product_name,$unit,$amount,$typeBV,$embryo,$gc,$unit_price,$into_money,$vat,$into_money_vat,$pay,$rest,$idCategory,$idMaintenance,$nameEmployer);
    echo $result;
    return;
}



