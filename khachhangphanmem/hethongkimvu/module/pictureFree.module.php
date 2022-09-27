<?php
require_once 'connectDB/connectdb.module.php';

class pictureFree extends ConnectDB{

    public function getAllPictureFree(){
        $this->connect();
        $sql = "SELECT * FROM `tbl_keri_picture_free`";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            return "400";
        } 
    }


    function getMSBV($namePictureFree,$typePictureFree,$msPictureFree){
        $this->connect();
        $sql = "SELECT verPictureFree FROM `tbl_keri_picture_free` WHERE namePicrureFree = '$namePictureFree' and typePictureFree = '$typePictureFree' AND msPicrureFree = '$msPictureFree' ORDER BY `tbl_keri_picture_free`.`verPictureFree` DESC ";
        $result = $this->getArrayList($sql);
        return $result;
    }

    function doTranslateArray2SQL($tbl_name, $arrayColumn, $arrayValue, $id, $action){
        $this->connect();
        $sql = "";
        
        $sql_columns = "(";
        $sql_values = "(";
        $checkVersion = true;
        $version = 1;
        if(!empty($arrayValue)){
            $check = $this->getMSBV($arrayValue[0],$arrayValue[3],$arrayValue[2]);
            if(empty($check)){
                $version = 1;
            }else{
                $version = $check[0]["verPictureFree"] + 1;
            }
        }
        array_push($arrayValue,$version);
        $size = count($arrayValue);
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
            $sql = $sql.$sql_columns."VALUES".$sql_values;
           
            $result = mysqli_query($this->__connec, $sql);
           if($result){
               return $this->readData();
           }else{
               return "404";
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
                $sql = $sql." where idPictureFree=$id";
    
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
        
            $sql  ="delete from $tbl_name where idPictureFree=$id";
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
            $arrData = $this->getAllPictureFree();
            $template = '';
            if(empty($arrData)){
                $template = "Không có dữ liệu";
            }else{
          
                foreach ($arrData as $key => $data) {
                   $template .= '<tr>
                                    <td>'.$data["namePicrureFree"].'</td>
                                    <td>'.$data["nicknamePicrureFree"].'</td>
                                    <td>'.$data["typePictureFree"].'</td>
                                    <td>'.$data["corePictureFree"].'</td>
                                    <td>'.$data["msPicrureFree"].'</td>
                                    <td> Version '.$data["verPictureFree"].'</td>
                                    <td>
                                        <button class="btn btn-danger btnDeletePictureFree" id="'.$data["idPictureFree"].'">Xóa</button>
                                        <button data-toggle="modal" data-target="#modalAddPictureFree" class="btn btn-dark btnUpdatePictureFree" id="'.$data["idPictureFree"].'">sửa</button>
                                    </td>
                                </tr>';
                    }
            }
            return $template;
        }

}