<?php
require_once 'connectDB/connectdb.module.php';
class Maintenance extends ConnectDB{

    public function insertContact($nameCustomer , $listDVHNumber, $cnNumber){
        $this->connect();
        $sql = "INSERT INTO `tbl_keri_contract` (`id`, `contractid`, `cusid`, `machineid`, `machinenumber`, `unit`, `quantaty`, `specs`, `spec1`, `spec2`, `spec3`, `spec4`, `spec5`, `spec6`, `spec7`, `spec8`, `spec9`, `specsspecial`, `date_sign_contract`, `date_delivery_contract`, `remainingdays`, `payhistory1`, `payhistory2`, `payhistory3`, `progress_electric`, `progress_package`, `progress`, `assignee`, `microtime`, `orderno`, `techdate`, `zairiodate`, `zairioconnectdate`, `repositoryconnectdate`, `generalconnectdate`, `electricdate`, `runtestdate`) VALUES (NULL, '$nameCustomer', '$nameCustomer', '$listDVHNumber', '$cnNumber', '1', '2', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', '2021-06-02 13:06:08', '2021-06-03 13:06:08', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', '2', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri', 'keri');";

        $value = mysqli_query($this->__connec, $sql);
        if($value){
            $lastid =   mysqli_insert_id($this->__connec);
            $listDVHs = $this->convertStringToArray($listDVHNumber);
            $stateInsert = true;
            foreach ($listDVHs as $key => $dvh) {
                $stateInsert =  $this->insertSeri($lastid,$cnNumber,$dvh,"keri");
            }
            if($stateInsert === true){
                return "200";
            }else{
                return "401";
            }
        }else{
            return "400";
        }
        $this->disConnect();
    }

    function insertSeri($lastid,$cnNumber,$dvh,$assignee){
        $this->connect();
        $sql = "INSERT INTO `tbl_keri_seri` (`id`, `machinecontractid`, `machinenumber`, `serinumber`, `assignee`) VALUES (NULL, '$lastid', '$cnNumber', '$dvh', '$assignee');";
        $value = mysqli_query($this->__connec, $sql);
        return $value;
    }

    function convertStringToArray($str){
        return explode(",",$str) ;
    }

}