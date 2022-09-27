<?php
require_once 'connectDB/connectdb.module.php';

class Picture extends ConnectDB{

    public function insertPicture($customerID,$projectID,$typePictureName,$imgName,$msPicture,$dvhNumber,$quantytiPicture,$pricePicture,$vatPicture){
        $this->connect();

        $check = $this->getPictureByVersion($typePictureName,$msPicture,$projectID,$customerID);
        $verPicture;
        if(empty($check)){
           $verPicture =  1;
        }else{
            $verPicture = $check[0]["verPicture"] + 1;
        }
        $sql = "INSERT INTO `tbl_keri_picture` (`idPicture`, `idCustomer`, `idProject`, `typePicture`, `pictureName`, `verPicture`, `msPicture`, `dvhNumber`, `quantityPicture`, `pricePicture`, `vatPicture`) VALUES (NULL, '$customerID', '$projectID', '$typePictureName', '$imgName', '$verPicture', '$msPicture','$dvhNumber','$quantytiPicture','$pricePicture','$vatPicture');";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $this->readData();
        }else{
            return "401";
        }

    }

    public function getAllPictures(){
        $this->connect();
        // $sql = "SELECT * FROM `tbl_keri_picture` INNER JOIN tbl_keri_product ON tbl_keri_picture.idProject = tbl_keri_product.idProduct INNER JOIN employer ON tbl_keri_picture.idCustomer = employer.idEmployer ORDER BY `employer`.`nameEmployer` DESC";
        $sql = "SELECT * FROM `tbl_keri_picture` 
        INNER JOIN tbl_keri_seri on tbl_keri_picture.dvhNumber = tbl_keri_seri.seri_id
        INNER JOIN tbl_keri_product ON tbl_keri_picture.idProject = tbl_keri_product.idProduct 
        INNER JOIN employer ON tbl_keri_picture.idCustomer = employer.idEmployer ORDER BY `employer`.`nameEmployer` DESC";
        return $this->getArrayList($sql);
    }

    public function deletePicture($idPicture){
        $this->connect();
        $sql = "DELETE FROM `tbl_keri_picture` WHERE tbl_keri_picture.idPicture = $idPicture";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $this->readData();
        }else{
            return "400";
        } 
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

    public function UpdatePicture($idPicture,$customerID,$projectID,$typePictureName,$imgName,$msPicture,$dvhNumber,$quantytiPicture,$pricePicture,$vatPicture){
        $this->connect();
        $sql;
        if($imgName){
            $sql = "UPDATE `tbl_keri_picture` SET `idCustomer` = '$customerID', `idProject` = '$projectID', `typePicture` = '$typePictureName', `pictureName` = '$typePictureName', `msPicture` = '$msPicture', `dvhNumber` = '$dvhNumber', `quantityPicture` = '$quantytiPicture', `pricePicture` = '$pricePicture', `vatPicture` = '$vatPicture' WHERE `tbl_keri_picture`.`idPicture` = $idPicture;";
        }else{
            $sql = "UPDATE `tbl_keri_picture` SET `idCustomer` = '$customerID', `idProject` = '$projectID', `typePicture` = '$typePictureName', `msPicture` = '$msPicture', `dvhNumber` = '$dvhNumber', `quantityPicture` = '$quantytiPicture', `pricePicture` = '$pricePicture', `vatPicture` = '$vatPicture' WHERE `tbl_keri_picture`.`idPicture` = $idPicture;";
        }
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $this->readData();
        }else{
            return "400";
        } 
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
                                <td>'.$data["pictureName"].'</td>
                                <td>'.$data["quantityPicture"].'</td>
                                <td>'.$data["pricePicture"].'</td>
                                <td>'.$data["vatPicture"].'</td>
                                <td>Bản vẽ '.$data["typePicture"].'</td>
                                <td data-value="'.$data["verPicture"].'">Version '.$data["verPicture"].'</td>
                                <td data-value="'.$data["msPicture"].'">'.$data["msPicture"].'</td>
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
}