<?php
require_once 'connectDB/connectdb.module.php';

class DvhNumber extends ConnectDB{

    public function getAllDVH(){
        $sql = "SELECT * FROM `tbl_keri_seri` INNER JOIN employer ON tbl_keri_seri.idEmployer = employer.idEmployer";
        // $sql = "SELECT * FROM `tbl_keri_seri`";
        return $this->getArrayList($sql);
    }

    
    function copySql($tbl_name, $arrayColumn, $arrayValue,$id,$idEmployer){
        $this->connect();
        $size = count($arrayValue);
        $sql = "";
        $sql_columns = "(";
        $sql_values = "(";
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
        
        $sql = $sql.$sql_columns."VALUES".$sql_values;
        $allPictureForDo = $this->getAllPictureByIdDo($id);
        $result = mysqli_query($this->__connec, $sql);
        $check = $this->handleCopyPicture($allPictureForDo,$idEmployer, $this->__connec->insert_id);
         if($check){
             
             if($result){
                 return $this->readData();
             }else{
                 return "404";
             }

         }
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
                // echo $sql;
                // die;
                    $result = mysqli_query($this->__connec, $sql);
                   if($result){
                       return $this->readData();
                   }else{
                       return "404";
                   }
            }else{
                echo $check."k thể copy";
                die;
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
                                <td style="text-align:right;">
								    <button class="btn btn-dark btnUpdateDVH" data-toggle="modal" data-target="#modalAddDVH" id="'.$data["seri_id"].'">sửa</button>
                                    <button class="btn btn-warning btnCopyDVH" data-toggle="modal" data-target="#confirmCopy" data-employer="'.$data["idEmployer"].'" data-dvhnumber="'.$data["serinumber"].'" id="'.$data["seri_id"].'">copy</button>
									<button class="btn btn-danger btnDeleteDVH" id="'.$data["seri_id"].'">Xóa</button>

                                </td>
                            </tr>';
            }
        }
        return $template;
    }

   public function checkDvh($idEmployer,$dvhName){
        $sql = "SELECT * FROM `tbl_keri_seri` WHERE idEmployer = $idEmployer AND serinumber = '$dvhName'";         
        $value = $this->getArrayList($sql);
        return  empty($value);
    }
    public function getAllPictureByIdDo($idDO){
        $sql = "SELECT * FROM `tbl_keri_picture` WHERE dvhNumber = $idDO";         
        return $this->getArrayList($sql); 
     }
     public function getKeyArray($arr){
         $array = array_keys($arr);
         return  array_splice($array,1);
     }
     public function getValueOfKey($arr,$idEmployer,$con, $newDOid){
         $array = [];
         foreach ($arr as $key => $value) {
             if($key != $con){
				if($key == "dvhNumber"){ 
				$value = $newDOid;
				}
                array_push($array , $value);
             }
         }
         $array[0] = $idEmployer;
         return $array;
     }
     function handleCopyPicture($allPictureForDo,$id, $newDOid){
        $check = true;
        foreach ($allPictureForDo as $key => $value) {
            $arrayColumn = $this->getKeyArray($value);
            $arrayValue = $this->getValueOfKey($value,$id,"idPicture", $newDOid);
            $value = $this->doTranslateArray2SQL("tbl_keri_picture",$arrayColumn,$arrayValue,-1,"insert");
            if($value == "204"){
               $check = false;
               break;
            }
        }
        return $check;
     }
}