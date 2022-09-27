<?php 
require_once 'connectDB/connectdb.module.php';
class All extends ConnectDB{

    public function getAll(){
        $result = [];
        $listID = [];
        $listCN = [];
        $listDO = [];
        $sql = "SELECT * FROM `tbl_keri_maintenancetech` WHERE 1 ORDER BY `tbl_keri_maintenancetech`.`iddvhNumber` ASC";
        $arrs = $this->getArrayList($sql);
        foreach ($arrs as $key => $value) {
            $id = $value["iddvhNumber"];
            if(!in_array($id,$listID)){
                array_push($listID,$id);
                $slqMain = "SELECT status,tbl_keri_maintenancetech.unit,amount,embryo,gc,unit_price,vat,into_money,into_money_vat,pay,rest,tbl_keri_seri.machinenumber,tbl_keri_seri.serinumber,tbl_keri_product.idProduct , tbl_keri_product.nameProduct FROM tbl_keri_maintenancetech
                JOIN tbl_keri_seri ON tbl_keri_maintenancetech.iddvhNumber = tbl_keri_seri.seri_id
                JOIN tbl_keri_contract ON tbl_keri_seri.machinecontractid = tbl_keri_contract.id
                JOIN tbl_keri_product ON tbl_keri_maintenancetech.idProduct = tbl_keri_product.idProduct
                WHERE tbl_keri_maintenancetech.iddvhNumber = $id";
                $arrItems = $this->getArrayList( $slqMain );
    
                foreach ($arrItems as $key => $items) {
                    $idProduct = $items["idProduct"];
                    $sqlPicture2d = "SELECT pictureName, verPicture FROM `tbl_keri_picture` , tbl_keri_product WHERE tbl_keri_picture.idProject = tbl_keri_product.idProduct AND tbl_keri_product.idProduct = $idProduct AND tbl_keri_picture.typePicture = '2D' ORDER BY `tbl_keri_picture`.`verPicture` ASC";
                    $sqlPicture3d = "SELECT pictureName, verPicture FROM `tbl_keri_picture` , tbl_keri_product WHERE tbl_keri_picture.idProject = tbl_keri_product.idProduct AND tbl_keri_product.idProduct = $idProduct AND tbl_keri_picture.typePicture = '3D' ORDER BY `tbl_keri_picture`.`verPicture` ASC";
                    $sqlPicturecnc = "SELECT pictureName, verPicture FROM `tbl_keri_picture` , tbl_keri_product WHERE tbl_keri_picture.idProject = tbl_keri_product.idProduct AND tbl_keri_product.idProduct = $idProduct AND tbl_keri_picture.typePicture = 'CNC' ORDER BY `tbl_keri_picture`.`verPicture` ASC";
                    $cn = $items["machinenumber"];
                    $do = $items["serinumber"];
                    $list2d = $this->getArrayList( $sqlPicture2d );
                    $list3d = $this->getArrayList( $sqlPicture3d );
                    $listcnc = $this->getArrayList( $sqlPicturecnc );
                    $colSpan2d = count($list2d);
                    $colSpan3d = count($list3d);
                    $colSpancnc = count($listcnc);
                    $colSpanProduct = $colSpan2d + $colSpan3d + $colSpancnc;
                    $item = [
                        "status" => $items["status"],
                        "unit" => $items["unit"],
                        "amount" => $items["amount"],
                        "embryo" => $items["embryo"],
                        "gc" => $items["gc"],
                        "unit_price" => $items["unit_price"],
                        "vat" => $items["vat"],
                        "into_money_vat" => $items["into_money_vat"],
                        "pay" => $items["pay"],
                        "rest" => $items["rest"],
                        "nameProduct" => $items["nameProduct"],                        
                        "listProduct" => [
                                        "2D" => [
                                            "data" => $list2d,
                                            "colSpan" => $colSpan2d],
                                        
                                        "3D" =>[ 
                                            "data" => $list3d,
                                            "colSpan"=> $colSpan3d],
                                    
                                        "CNC" =>[
                                            "data"=> $listcnc,
                                            "colSpan" => $colSpancnc],

                                        "colSpanProduct"=> $colSpanProduct
                                        ]
                        ];
                    if(!in_array($cn, $listCN)){
                        array_push($listCN,$cn);  
                        $listDO[$cn] = [$do]; 
                        $ar = [
                            "do" => $do,
                            "detail" => [$item]
                        ] ;
                        $result[$cn] = [$ar] ;
                    }else{
                       if(in_array($do,$listDO[$cn])){
                            $indexCN = count($result[$cn]) - 1;
                            array_push($result[$cn][$indexCN]["detail"] , $item);
                       }else{
                            array_push($listDO[$cn],$do); 
                            $ar = [
                                "do" => $do,
                                "detail" => [$item],
                            ];
                            array_push($result[$cn] , $ar);
                       }
                    }
                }
            }
        }
        return $result;
    }



    public function getRowSpan($dataCN){
        $rowSpanTotal = 0;
            foreach ($dataCN as $k => $do) {
                   foreach ($do["detail"] as $i => $detailItem) {
                        $rowSpanTotal += $detailItem["listProduct"]["colSpanProduct"];
                } 
            }
        return  intval($rowSpanTotal);
}

    public function renderView(){
        $arrs = $this->getAll();
        $template = "";
        foreach ($arrs as $key => $value) {
            $rowSpan  = $this->getRowSpan($value);
            $template += "<tr> <td rowspan=".$rowSpan.">ahihi</td> </tr>";
            echo $template;
        }
    }

}