<?php
require_once 'connectDB/connectdb.module.php';

class Product extends ConnectDB {

    public function getAllProducts(){
        $sql = "SELECT * FROM tbl_keri_product_2021 p 
		INNER JOIN employer e ON e.idEmployer	= p.idEmployer
		INNER JOIN tbl_keri_seri s ON s.seri_id	= p.seri_id
		order by p.idEmployer, p.idProduct, p.nicknamePicrureFree desc";
        return $this->getArrayList($sql);
    }
    public function getProductById($id){
        $sql = "SELECT * FROM `tbl_keri_product_2021` WHERE tbl_keri_product_2021.idProduct = $id";
        return $this->getArrayList($sql);
    }
    public function getProductByIdCategory($id){
        $sql = "SELECT * FROM `tbl_keri_product_2021`
                INNER JOIN tbl_keri_category ON tbl_keri_product_2021.idCategory = tbl_keri_category.idCategory
                WHERE tbl_keri_product_2021.idCategory = $id";
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
                   //return $sql;

                    $result = mysqli_query($this->__connec, $sql);
                   if($result){
                       return $this->readData();
                   }else{
                       return "404";
                   }
            }else{
				   $sql = $sql.$sql_columns."VALUES".$sql_values;
                   //return $sql;

                   $result = mysqli_query($this->__connec, $sql);
				   
				   
                   if($result){
					   $insertedId = mysql_insert_id;
					   mysqli_query($this->__connec, "update tbl_keri_product_2021 set verPictureFree = verPictureFree + 1 where idProduct = '$insertedId'");
                       return $this->readData();
					   
                   }else{
                       return "404";
                   }
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
            if(true/*empty($check)*/){
                $sql = $sql." where idProduct=$id";
    
                $result = mysqli_query($this->__connec, $sql);
				
				//return $sql;
                if($result){
                    return $this->readData();
                }else{
                    return "404";
                }

            } else{
                $sql = "update $tbl_name set verPictureFree = verPictureFree+1 where idProduct=$id";
    
                $result = mysqli_query($this->__connec, $sql);
                if($result){
                    return $this->readData();
                }else{
                    return "404";
                }
            }
            
        } else if($action=='delete'){
        
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
                                <td>'.$data["nameEmployer"].'</td>
                                <td>'.$data["serinumber"].'</td>
                                <td>'.$data["nameProduct"].'</td>
                                <td>'.$data["priceProduct"].'</td>
								<td>'.$data["nicknamePicrureFree"].'</td>
                                <td>'.$data["dvtProduct"].'</td>
                                <td>'.$data["vatProduct"].'</td>
								<!--FROM FREE PICTURE-->
								<td><a href="../uploadPicture/'.$data["namePicrureFree"].'" target=blank>'.$data["namePicrureFree"].'</a></td>
								<td>'.$data["typePictureFree"].'</td>
								<td>'.$data["corePictureFree"].'</td>
								<td>'.$data["msPicrureFree"].'</td>
								<td>'.$data["verPictureFree"].'</td>
                                <td><button class="btn btn-primary btnUpdatePictureFree update_employer" id="btnUpdate" data-toggle="modal" data-target="#modalAddPictureFree"
                                        data-id_update_employer="'.$data["idProduct"].'">Sửa</button>
                                    <button class="btn btn-warning btnDeletePictureFree delete_employer " id="btnDeleteProduct"
                                        data-id_delete_employer="'.$data["idProduct"].'">Xóa</button>
                                </td>
                            </tr>';
                    }
            }
            return $template;
        }
        function checkProduct($nameProduct,$priceProduct,$dvtProduct,$vatProduct){
            $this->connect();
            $sql = "SELECT * FROM tbl_keri_product_2021 WHERE nameProduct = '$nameProduct'";
            $result = $this->getArrayList($sql);
            return $result;
        }

}
