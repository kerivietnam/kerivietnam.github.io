<?php
require_once 'connectDB/connectdb.module.php';

class Product extends ConnectDB{

    public function getAllProducts(){
        $sql = "SELECT * FROM `tbl_keri_product`";
        return $this->getArrayList($sql);
    }
    public function getProductById($id){
        $sql = "SELECT * FROM `tbl_keri_product` WHERE tbl_keri_product.idProduct = $id";
        return $this->getArrayList($sql);
    }
    public function getProductByIdCategory($id){
        $sql = "SELECT * FROM `tbl_keri_product`
                INNER JOIN tbl_keri_category ON tbl_keri_product.idCategory = tbl_keri_category.idCategory
                WHERE tbl_keri_product.idCategory = $id";
        return $this->getArrayList($sql);
    }
    function doTranslateArray2SQL($tbl_name, $arrayColumn, $arrayValue, $id, $action){
        $this->connect();
        $size = count($arrayValue);
        
        $sql = "";
        
        $sql_columns = "(";
        $sql_values = "(";
        $check = true;
        if(!empty($arrayValue)){
            $check = $this->checkProduct($arrayValue[0],$arrayValue[1],$arrayValue[2],$arrayValue[3]);
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
           
            if(empty($check)){
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
            if(empty($check)){
                $sql = $sql." where idProduct=$id";
    
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
        
            $sql  ="delete from $tbl_name where idProduct=$id";
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
            $arrData = $this->getAllProducts();
            $template = '';
            if(empty($arrData)){
                $template = "Không có dữ liệu";
            }else{
          
                foreach ($arrData as $key => $data) {
                   $template .= '<tr class="load_data_employer_io">
                                <td>'.$data["nameProduct"].'</td>
                                <td>'.$data["priceProduct"].'</td>
                                <td>'.$data["dvtProduct"].'</td>
                                <td>'.$data["vatProduct"].'</td>
                                <td><button class="btn btn-primary update_employer" id="btnUpdate" data-toggle="modal" data-target="#modalAddProduct"
                                        data-id_update_employer="'.$data["idProduct"].'">Sửa</button>
                                    <button class="btn btn-warning delete_employer " id="btnDeleteProduct"
                                        data-id_delete_employer="'.$data["idProduct"].'">Xóa</button>
                                </td>
                            </tr>';
                    }
            }
            return $template;
        }
        function checkProduct($nameProduct,$priceProduct,$dvtProduct,$vatProduct){
            $this->connect();
            $sql = "SELECT * FROM tbl_keri_product WHERE nameProduct = '$nameProduct' AND priceProduct = '$priceProduct' AND dvtProduct = '$dvtProduct' AND vatProduct = '$vatProduct' ";
            $result = $this->getArrayList($sql);
            return $result;
        }

}
