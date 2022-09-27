<?php
require_once 'connectDB/connectdb.module.php';

class Picture extends ConnectDB{


    public function getAllPictures(){
        $this->connect();
        $sql = "SELECT * FROM `tbl_keri_picture` INNER JOIN tbl_keri_seri on tbl_keri_picture.dvhNumber = tbl_keri_seri.seri_id INNER JOIN tbl_keri_product ON tbl_keri_picture.idProject = tbl_keri_product.idProduct INNER JOIN employer ON tbl_keri_picture.     idCustomer = employer.idEmployer INNER JOIN tbl_keri_picture_free ON tbl_keri_picture.idPictureFree = tbl_keri_picture_free.idPictureFree ORDER BY `employer`.`nameEmployer` ASC";
        return $this->getArrayList($sql);
    }

    public function getPictureByVersion($typePicture,$msPicture,$idProject,$idCustomer){
        $this->connect();
        $sql = "SELECT verPicture FROM `tbl_keri_picture`
                WHERE tbl_keri_picture.typePicture = '$typePicture'
                AND tbl_keri_picture.msPicture = '$msPicture'
                AND tbl_keri_picture.idProject = $idProject
                AND tbl_keri_picture.idCustomer = $idCustomer
                ORDER BY `tbl_keri_picture`.`verPicture` DESC" ;
        $value = $this->getArrayList($sql);
        return $value;
    }

    public function getPictureById($id){
        $this->connect();
        $sql = "SELECT * FROM `tbl_keri_picture` 
                INNER JOIN tbl_keri_product ON tbl_keri_picture.idProject = tbl_keri_product.idProduct
                INNER JOIN employer ON tbl_keri_picture.idCustomer = employer.idEmployer 
                WHERE tbl_keri_picture.idPicture = $id";
        return $this->getArrayList($sql);
    }

    public function getPictureFreeByID($id){
        $this->connect();
        $sql = "SELECT * FROM `tbl_keri_picture_free` WHERE idPictureFree = $id";
        return $this->getArrayList($sql);
    }

    function readData(){
        $arrData = $this->getAllPictures();
        $template = '';
        if(empty($arrData)){
            $template = "Không có dữ liệu";
        }else{
      
            foreach ($arrData as $key => $data) {
               $template .= '<tr class="t-center">      
                                <td data-value="'.$data["idEmployer"].'" data-dvhnumber="'.$data["dvhNumber"].'">'.$data["nameEmployer"].'</td>
                                <td>'.$data["serinumber"].'</td>
                                <td data-value="'.$data["idProduct"].'">'.$data["nameProduct"].'</td>
                                <td data-value="'.$data["idPictureFree"].'"><a href="../uploadPicture/'.$data["namePicrureFree"].'" target=blank>'.$data["namePicrureFree"].'</a></td>
                                <td>'.$data["quantityPicture"].'</td>
                                <td>'.$data["pricePicture"].'</td>
                                <td>'.$data["vatPicture"].'</td>
                                <td>Bản vẽ '.$data["typePictureFree"].'</td>
                                <td data-value="'.$data["verPictureFree"].'">Version '.$data["verPictureFree"].'</td>
                                <td data-value="'.$data["msPicrureFree"].'">'.$data["msPicrureFree"].'</td>
                                <td>
                                    <button class="btn btn-danger btnDeletePicture" id="'.$data["idPicture"].'">Xóa</button>
                                    <button data-toggle="modal" data-target="#modalAddPicture" class="btn btn-dark btnUpdatePicture" id="'.$data["idPicture"].'">sửa</button>
                                </td>
                            </tr>';
                }
        }
        return $template;
    }

    public function getDobyIdEmployer($idEmployer){
        $this->connect();
        $sql = "SELECT * FROM tbl_keri_seri WHERE idEmployer = $idEmployer";
        return $this->getArrayList($sql);
    }

    public function getProjectByID($idProject){
        $this->connect();
        $sql = "SELECT priceProduct,vatProduct FROM `tbl_keri_product` WHERE tbl_keri_product.idProduct = $idProject";
        return $this->getArrayList($sql);
    }

    function doTranslateArray2SQL($tbl_name, $arrayColumn, $arrayValue, $id, $action){
        $this->connect();
        $size = count($arrayValue);
        
        $sql = "";
        
        $sql_columns = "(";
        $sql_values = "(";
        $check = true;
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
                $sql = $sql." where idPicture=$id";
    
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
        
            $sql  ="delete from $tbl_name where idPicture=$id";
            $result = mysqli_query($this->__connec, $sql);
            if($result){
                return $this->readData();
            }else{
                return "404";
            }
        }

        return -1;
       }
}