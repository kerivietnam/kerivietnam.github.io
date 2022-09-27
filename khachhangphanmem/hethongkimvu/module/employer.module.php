<?php
require_once 'connectDB/connectdb.module.php';

class Employer extends ConnectDB{

    public function getAllEmployers(){
        $this->connect();
        $sql = "SELECT * FROM `employer` ORDER BY `employer`.`idEmployer` DESC";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            return "400";
        } 
    }

    public function getEmployersById($idEmployer){
        $this->connect();
        $sql = "SELECT * FROM `employer` WHERE employer.idEmployer=$idEmployer";
        return $this->getArrayList($sql); 
    }

    public function getEmployersByIdMaintenance($idEmployer){
        $this->connect();
        $sql = "SELECT * FROM `employer` WHERE employer.idEmployer=$idEmployer";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            return "400";
        } 
    }
    function checkEmployer($nameEmployer){
        $this->connect();
        $sql = "SELECT * FROM `employer` WHERE employer.nameEmployer = '$nameEmployer'";
        $result = $this->getArrayList($sql);
        return $result;
    }

    function doTranslateArray2SQL($tbl_name, $arrayColumn, $arrayValue, $id, $action){
        $this->connect();
        $size = count($arrayValue);
        
        $sql = "";
        
        $sql_columns = "(";
        $sql_values = "(";
        $check = true;
        if(!empty($arrayValue)){
            $checkName = $this->checkEmployer($arrayValue[0]);
        }
        if($action=='insert'){
        
            $sql = "INSERT INTO $tbl_name ";
            
            for($i=0;$i<$size;$i++){
                
                if($i<$size-1){
                
                $sql_columns = $sql_columns.$arrayColumn[$i].",";
                $sql_values = $sql_values."'".$arrayValue[$i]."',";
                
                }else{
                
                $sql_columns = $sql_columns.$arrayColumn[$i].")";
                $sql_values = $sql_values."'".$arrayValue[$i]."')";
                
                }
            }
           
            if(empty($checkName)){
                $sql = $sql.$sql_columns."VALUES".$sql_values;
    
                $result = mysqli_query($this->__connec, $sql);
               if($result){
                   return $this->readData();
               }else{
                   return "404";
               }
            }else{
                return "204";
            }
        
        }else if($action=='update'){
        
            $sql = "update $tbl_name set ";
        
            for($i=0;$i<$size;$i++){
             
            if($i<$size-1){
            
                $sql = $sql.$arrayColumn[$i]."='".$arrayValue[$i]."',";
            }else{
                $sql = $sql.$arrayColumn[$i]."='".$arrayValue[$i]."'";
            }
            }
            
            if(empty($checkName)){
                $sql = $sql." where idEmployer=$id";
    
                $result = mysqli_query($this->__connec, $sql);
                if($result){
                    return $this->readData();
                }else{
                    return "404";
                }

            }else{
                return "204";
            }
            
        }else if($action=='delete'){
        
            $sql  ="delete from $tbl_name where idEmployer=$id";
            $result = mysqli_query($this->__connec, $sql);
            if($result){
                return $this->readData();
            }else{
                return "404";
            }
        }
         return -1;
        }
        function readData(){
            $arrData = $this->getAllEmployers();
            $template = '';
            if(empty($arrData)){
                $template = "Không có dữ liệu";
            }else{
          
                foreach ($arrData as $key => $data) {
                   $template .= '<tr class="load_data_employer_io">
                                    <td>'.$data["nameEmployer"].'</td>
                                    <td><a href="formMainternance.php?employer='.$data["idEmployer"].'&customername='.$data["nameEmployer"].'" target=blank>TT Bảo Trì</td>
                                    <td style="text-align:right;">
                                        <button data-toggle="modal" data-target="#modalAddEmployer" class="btn btn-primary update_employer" id="btnUpdate" data-id_update_employer="'.$data["idEmployer"].'">Sửa</button>
                                        <button class="btn btn-warning delete_employer " id="btnDeleteEmployer" data-id_delete_employer="'.$data["idEmployer"].'">Xóa</button>
                                    </td>
                                </tr>';
                    }
            }
            return $template;
        }

}