<?php
require_once 'connectDB/connectdb.module.php';

class Category extends ConnectDB{

    public function getDVHbyCNid($id){
        $sql = "SELECT * FROM `tbl_keri_seri` WHERE tbl_keri_seri.machinecontractid = $id";
        return $this->getArrayList($sql);
    }
    public function getCNbyidEmployer($id){
        $sql = "SELECT * FROM `tbl_keri_contract` INNER JOIN employer WHERE tbl_keri_contract.idEmployer = employer.idEmployer AND employer.idEmployer = $id";
        return $this->getArrayList($sql);
    }
    public function getAllCategory(){
        $sql = "SELECT * FROM `tbl_keri_category` 
        INNER JOIN employer ON tbl_keri_category.idEmployer = employer.idEmployer 
        INNER JOIN tbl_keri_seri ON tbl_keri_category.idContact = tbl_keri_seri.seri_id";
        return $this->getArrayList($sql);
    }

    public function addCategory($idEmployer , $idSeri,$idContact,$categoryName){
        $this->connect();
        $sql = "INSERT INTO `tbl_keri_category` (`idCategory`, `idEmployer`, `idSeri`, `idContact`, `categoryName`) VALUES (NULL, '$idEmployer', '$idSeri', '$idContact', '$categoryName');";
        mysqli_query($this->__connec, $sql);
        return $this->readData();
    }

    public function deleteCategory($idCategory){
        $this->connect();
        $sql = "DELETE FROM `tbl_keri_category` WHERE `tbl_keri_category`.`idCategory` = $idCategory";
        mysqli_query($this->__connec, $sql);
        return $this->readData();
    }
    public function updateCategory($idCN , $idEmployer , $idContact , $idSeri , $categoryName , $idCategory){
        $this->connect();
        $sql = "UPDATE `tbl_keri_category` SET `idEmployer` = '$idEmployer', `idSeri` = '$idContact', `idContact` = '$idSeri', `categoryName` = '$categoryName' WHERE `tbl_keri_category`.`idCategory` = $idCategory;";
        mysqli_query($this->__connec, $sql);
        return $this->readData();
    }

    public function readData(){
        $arrData = $this->getAllCategory();
        $template = '';
        if( empty($arrData)){
            $template = "Không có dữ liệu";
        }else{
            $index = 1;
            foreach ($arrData as $key => $data) {
               $template .= '<tr class="t-center">
                                <td>'.$index.'</td>
                                <td data-value="'.$data["idEmployer"].'">'.$data["nameEmployer"].'</td>
                                <td data-value="'.$data["idSeri"].'">'.$data["machinenumber"].'</td>
                                <td data-value="'.$data["idContact"].'">'.$data["serinumber"].'</td>
                                <td>'.$data["categoryName"].'</td>
                                <td>
                                    <button class="btn btn-danger btnDeleteCategory" id="'.$data["idCategory"].'">Xóa</button>
                                    <button class="btn btn-dark btnUpdateCategory"  data-toggle="modal" data-target="#modalAddCategory" id="'.$data["idCategory"].'">sửa</button>
                                </td>
                            </tr>';
                $index++;
            }
        }
        return $template;
    }

}