<?php
require_once 'connectDB/connectdb.module.php';
class Maintenance extends ConnectDB{
  
    public function getAllSeri(){
        $sql = "SELECT * FROM `tbl_keri_seri`";
        return $this->getArrayList($sql);
    }
    public function getAllContact(){
        // $sql = "SELECT * FROM `tbl_keri_contract`";
        $sql = "SELECT * FROM `tbl_keri_contract` INNER JOIN employer ON tbl_keri_contract.idEmployer = employer.idEmployer";
        return $this->getArrayList($sql);
    }
    public function getAllMaintenanceTech(){
        // $sql = "SELECT * FROM `tbl_keri_maintenancetech`";
        $this->connect();
        $sql = "SELECT * FROM tbl_keri_maintenancetech
                INNER JOIN tbl_keri_seri ON tbl_keri_seri.seri_id = tbl_keri_maintenancetech.iddvhNumber
                INNER JOIN tbl_keri_product ON tbl_keri_maintenancetech.idProduct = tbl_keri_product.idProduct
                INNER JOIN employer ON tbl_keri_maintenancetech.idEmployer = employer.idEmployer
                INNER JOIN tbl_keri_category ON tbl_keri_maintenancetech.idCategory = tbl_keri_category.idCategory
                ORDER BY `tbl_keri_maintenancetech`.`idcnNumber` ASC";
        return $this->getArrayList($sql);
    }
    // thay đổi tên fiel contractid -> idEmployer
    public function insertContact($nameCustomer , $cnNumber){
        $this->connect();
        $checkCN = $this->checkCN($nameCustomer,$cnNumber);
        if($checkCN){
            $sql = "INSERT INTO `tbl_keri_contract` (`id`, `idEmployer`, `cusid`, `machineid`, `machinenumber`, `unit`, `quantaty`, `specs`, `spec1`, `spec2`, `spec3`, `spec4`, `spec5`, `spec6`, `spec7`, `spec8`, `spec9`, `specsspecial`, `date_sign_contract`, `date_delivery_contract`, `remainingdays`, `payhistory1`, `payhistory2`, `payhistory3`, `progress_electric`, `progress_package`, `progress`, `assignee`, `microtime`, `orderno`, `techdate`, `zairiodate`, `zairioconnectdate`, `repositoryconnectdate`, `generalconnectdate`, `electricdate`, `runtestdate`) VALUES (NULL, '$nameCustomer', '$nameCustomer', 'keri', '$cnNumber', '1', '2', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', '2021-06-02 13:06:08', '2021-06-03 13:06:08', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', '2', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri');";
            $value = mysqli_query($this->__connec, $sql);
            $lastid =   mysqli_insert_id($this->__connec);
            return $this->getContactByID($lastid);
        }
        else{
            return "301";
        }
        // if($value){
        //     $lastid =   mysqli_insert_id($this->__connec);
        //     $listDVHs = $this->convertStringToArray($listDVHNumber);
        //     $stateInsert = true;
        //     foreach ($listDVHs as $key => $dvh) {
        //         $stateInsert =  $this->insertSeri($lastid,$cnNumber,$dvh,"keri");
        //     }
        //     if($stateInsert === true){
        //         return $this->getContactByID($lastid);
        //     }else{
        //         return "401";
        //     }
        // }else{
        //     return "400";
        // }
    }

    function insertSeri($lastid,$cnNumber,$dvh,$assignee){
        $this->connect();
        $sql = "INSERT INTO `tbl_keri_seri` (`seri_id`, `machinecontractid`, `machinenumber`, `serinumber`, `assignee`) VALUES (NULL, '$lastid', '$cnNumber', '$dvh', '$assignee');";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            die(mysqli_error($this->__connec));
        }
    }

    function convertStringToArray($str){
        return explode(",",$str) ;
    }

    function insertMaintenanceTech($soCN,$soDVH,$status,$product_name,$unit,$amount,$typeBV,$embryo,$gc,$unit_price,$into_money,$vat,$into_money_vat,$pay,$rest,$idCategory,$nameEmployer){
        $this->connect();
        $sql = "INSERT INTO `tbl_keri_maintenancetech` (`idMaintenance`, `idcnNumber`, `iddvhNumber`, `status`, `idProduct`, `unit`, `amount`, `idPicture`, `embryo`, `gc`, `unit_price`, `into_money`, `vat`, `into_money_vat`, `pay`,`rest`,`idCategory`,`idEmployer`) VALUES (NULL, '$soCN', '$soDVH', '$status', '$product_name', '$unit', '$amount', '$typeBV', '$embryo', '$gc', '$unit_price', '$into_money', '$vat', '$into_money_vat', '$pay', '$rest', '$idCategory','$nameEmployer');";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            $lastID = mysqli_insert_id($this->__connec);
            return $this->getMaintenanceTechByID($lastID);
        }else{
            die(mysqli_error($this->__connec));
        }
        return $value;
    }

    function updateMaintenanceTech($soCN,$soDVH,$status,$product_name,$unit,$amount,$typeBV,$embryo,$gc,$unit_price,$into_money,$vat,$into_money_vat,$pay,$rest,$idCategory,$idMaintenance,$nameEmployer){
        $this->connect();
        $sql = "UPDATE `tbl_keri_maintenancetech` SET `idcnNumber` = '$soCN', `iddvhNumber` = '$soDVH', `status` = '$status', `idProduct` = '$product_name', `unit` = '$unit', `amount` = '$amount', `idPicture` = '$typeBV', `embryo` = '$embryo', `gc` = '$gc', `unit_price` = '$unit_price', `into_money` = '$into_money', `vat` = '$vat', `into_money_vat` = '$into_money_vat', `pay` = '$pay', `rest` = '$rest',`idCategory` = '$idCategory', `idEmployer` = '$nameEmployer' WHERE `tbl_keri_maintenancetech`.`idMaintenance` = $idMaintenance;";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return "update successfully!!!";
        }
        return "update failure !!!";
    }

    function updateContact($nameCustomer , $cnNumber,$id){
        $this->connect();
        $sql = "UPDATE `tbl_keri_contract` SET `idEmployer` = '$nameCustomer', `cusid` = '$nameCustomer', `machinenumber` = '$cnNumber' WHERE `tbl_keri_contract`.`id` = $id;";
        $value = mysqli_query($this->__connec, $sql);
        // if($value){
        //     $this->deleteSeri($id);
        //     $listDvh = $this->convertStringToArray($listDVHNumber);
        //     $stateInsert = true;
        //     foreach ($listDvh as $key => $dvh) {
        //         $stateInsert =  $this->insertSeri($id,$cnNumber,$dvh,"keri");
        //     }
        //     if($stateInsert === true){
        //         return "update successfully !!!";
        //     }else{
        //         return mysqli_error($this->__connec);
        //     }
        // }
        return mysqli_error($this->__connec);
    }

    function getMaintenanceTechByID($id){
        $this->connect();
        $sql = "SELECT * FROM tbl_keri_maintenancetech
                INNER JOIN tbl_keri_seri ON tbl_keri_seri.seri_id = tbl_keri_maintenancetech.iddvhNumber
                INNER JOIN tbl_keri_product ON tbl_keri_maintenancetech.idProduct = tbl_keri_product.idProduct
                INNER JOIN tbl_keri_picture ON tbl_keri_maintenancetech.idPicture = tbl_keri_picture.idPicture
                INNER JOIN employer ON tbl_keri_maintenancetech.idEmployer = employer.idEmployer
                INNER JOIN tbl_keri_category ON tbl_keri_maintenancetech.idCategory = tbl_keri_category.idCategory
                WHERE tbl_keri_maintenancetech.idMaintenance = $id";
        return $this->getArrayList($sql);
    }

    
    function getContactByID($id){
        $this->connect();
        $sql = "SELECT * FROM `tbl_keri_contract` INNER JOIN employer ON tbl_keri_contract.idEmployer = employer.idEmployer WHERE tbl_keri_contract.id = $id";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return mysqli_fetch_assoc($value);
        }else{
            return "400";
        }
    }

    function deleteMaintenanceTechByID($id){
        $this->connect();
        $sql = "DELETE FROM `tbl_keri_maintenancetech` WHERE `tbl_keri_maintenancetech`.`idMaintenance` = $id";
        $value = mysqli_query($this->__connec, $sql);
        return $value;
    }

    function deleteContactByID($id){
        $this->connect();
        $sql = "DELETE FROM `tbl_keri_contract` WHERE `tbl_keri_contract`.`id` = $id";
        $value = mysqli_query($this->__connec, $sql);
       if($value){
            $this->deleteSeri($id);
           return $value;
       }else{
           return "loi " . $id;
       }
    }

    function getAllByID($id){
        $sql = "SELECT * FROM tbl_keri_seri INNER JOIN tbl_keri_contract ON tbl_keri_contract.id = tbl_keri_seri.machinecontractid INNER JOIN tbl_keri_maintenancetech on tbl_keri_seri.seri_id = tbl_keri_maintenancetech.iddvhNumber INNER JOIN tbl_keri_product ON tbl_keri_maintenancetech.idProduct = tbl_keri_product.idProduct INNER JOIN tbl_keri_picture ON tbl_keri_product.idProduct = tbl_keri_picture.idProject INNER JOIN employer ON tbl_keri_contract.idEmployer = employer.idEmployer WHERE tbl_keri_contract.id = $id";          
        return $this->getArrayList($sql);
    }
    function deleteSeri($id){
        $sql = "DELETE FROM `tbl_keri_seri` WHERE `tbl_keri_seri`.`machinecontractid` = $id";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            die(mysql_error($this->__conec));
        }
    }
    function checkCN($idEmployer,$cnNumber){
        $sql = "SELECT * FROM `tbl_keri_contract` WHERE idEmployer = $idEmployer AND machinenumber LIKE '%$cnNumber%'";          
        $value = $this->getArrayList($sql);
        return  empty($value);
    }
}