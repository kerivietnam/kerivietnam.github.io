<?php
require_once 'connectDB/connectdb.module.php';

class DvhNumber extends ConnectDB{

    public function getAllDVH(){
        $sql = "SELECT * FROM `tbl_keri_seri` INNER JOIN employer ON tbl_keri_seri.idEmployer = employer.idEmployer";
        // $sql = "SELECT * FROM `tbl_keri_seri`";
        return $this->getArrayList($sql);
    }

    function doTranslateArray2SQL($tbl_name, $arrayColumn, $arrayValue, $id, $action){
        $this->connect();
        $size = count($arrayValue);
        
        $sql = "";
        
        $sql_columns = "(";
        $sql_values = "(";
        $check = true ;
        if(!empty($arrayValue)){
            $check = $this->checkDvh($arrayValue[1],$arrayValue[0]);
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
            
            if($check){
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
            if($check){

                $sql = $sql." where seri_id=$id";
    
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
        
            $sql  ="delete from $tbl_name where seri_id=$id";
            $result = mysqli_query($this->__connec, $sql);
            if($result){
                return $this->readData();
            }else{
                return "404";
            }
        }
         return -1;
        }

    public function readData(){
        $arrData = $this->getAllDVH();
    
        $template = '';
        if( empty($arrData)){
            $template = "Không có dữ liệu";
        }else{
            foreach ($arrData as $key => $data) {
               $template .= '<tr class="t-center">
                                <td id="'.$data["idEmployer"].'">'.$data["nameEmployer"].'</td>
                                <td>'.$data["serinumber"].'</td>
                                <td>
                                    <button class="btn btn-danger btnDeleteDVH" id="'.$data["seri_id"].'">Xóa</button>
                                    <button class="btn btn-dark btnUpdateDVH" data-toggle="modal" data-target="#modalAddDVH" id="'.$data["seri_id"].'">sửa</button>
                                </td>
                            </tr>';
            }
        }
        return $template;
    }

   public function checkDvh($idEmployer,$dvhName){
        $sql = "SELECT * FROM `tbl_keri_seri` WHERE idEmployer = $idEmployer AND serinumber LIKE '%$dvhName%'";         
        $value = $this->getArrayList($sql);
        return  empty($value);
    }

}