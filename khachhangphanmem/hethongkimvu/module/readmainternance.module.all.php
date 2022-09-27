<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

function getAllStatus() {
	$sql_query = "SELECT * FROM tbl_keri_workstatus";
	//echo $sql_query;exit();

	$mysqli2 = new mysqli("localhost","root","","hpspicture");
	$sqlrowspan = mysqli_query($mysqli2, $sql_query);

	$arrayRowStatus = array();
	if($sqlrowspan != null && mysqli_num_rows($sqlrowspan)>0)
	{
		while($rowStatus = mysqli_fetch_array($sqlrowspan)) {
			array_push($arrayRowStatus,array("id"=>$rowStatus["id"], "workStatus" => $rowStatus["workStatus"]));
		}
		return $arrayRowStatus;
	}
	return $arrayRowStatus;
}

function countRowspanBasedOnId($idEmployer, $seri_id, $idProduct) {
$sql_query = "SELECT (
SELECT COUNT( * ) 
FROM tbl_keri_seri a 
LEFT JOIN tbl_keri_picture p ON a.seri_id = p.dvhNumber 
LEFT JOIN tbl_keri_picture_free pf ON p.idPictureFree = pf.idPictureFree 
WHERE a.idEmployer = '$idEmployer' and a.seri_id = '$seri_id') as rspan_seri,

(SELECT COUNT( * ) 
FROM tbl_keri_picture p 
LEFT JOIN tbl_keri_picture_free pf ON p.idPictureFree = pf.idPictureFree 
WHERE p.idCustomer = '$idEmployer' and p.dvhNumber = '$seri_id' and p.idProject='$idProduct') as rspan_product
";
//echo $sql_query;exit();

$mysqli2 = new mysqli("localhost","root","","hpspicture");
$sqlrowspan = mysqli_query($mysqli2, $sql_query);

if($sqlrowspan != null && mysqli_num_rows($sqlrowspan)>0)
{
    return mysqli_fetch_array($sqlrowspan);
}
return array("rspan_employer"=>1,"rspan_cn" => 1,  "rspan_seri"=>1, "rspan_category"=>1, "rspan_product"=>1);
}

$employerchoosed = $_POST['employer'];
$employerWhereCondition =  "e.nameEmployer = '$employerchoosed'";
if ($employerchoosed == "All" || $employerchoosed == "") {
	$employerWhereCondition =  " ";
}

$workStatus = $_POST['workStatus'];
$workstatusWhereCondition =  " prd.workStatus IN (SELECT id from tbl_keri_workstatus where workStatus = '$workStatus') ";
if ($workStatus == "") {
	$workstatusWhereCondition =  " ";
}
$allWhereCondition = "";
if ($employerWhereCondition != " ") {
	$allWhereCondition = " WHERE ".$employerWhereCondition;//.$workstatusWhereCondition;
}
if ($workstatusWhereCondition !=  " ") {
	if ($allWhereCondition != "") {
		$allWhereCondition .= " AND ".$workstatusWhereCondition;
	} else {
		$allWhereCondition .= " WHERE ".$workstatusWhereCondition;
	}
}

$querysql = "
SELECT 
e.nameEmployer

,s.serinumber

,prd.seri_id
,prd.idProduct
,prd.nameProduct
,prd.priceProduct 
,prd.nicknamePicrureFree
,prd.quantityPicture 
,prd.dvtProduct
,prd.vatProduct 	
,prd.workStatus 	

,prd.namePicrureFree		
,prd.corePictureFree		
,prd.msPicrureFree		
,prd.verPictureFree		
,prd.typePictureFree		




FROM employer e
INNER JOIN tbl_keri_seri s ON e.idEmployer = s.idEmployer
INNER JOIN tbl_keri_product_2021 prd ON prd.seri_id =s.seri_id ".$allWhereCondition.
"ORDER BY 
prd.idEmployer,
prd.seri_id,  
prd.nameProduct, 
prd.typePictureFree
DESC;";
$mysqli2 = new mysqli("localhost","root","","hpspicture");
$sql = mysqli_query($mysqli2, $querysql);



$output2 =$querysql; 
//echo $output2;return;
$output = '
<div class="card-body" id="load_data_mainternance">
<table name="mainterancedata" id="mainterancedata" border="1" cellspacing="0" cellpadding="1" class="table table-hover t-center">
<thead>
                                        <tr>
                                            <th scope="col" rowspan="2" class="bg-table">Khách Hàng</th>
                                            <th scope="col" rowspan="2" class="bg-table">SỐ DO</th>
                                            <th scope="col" rowspan="2" class="bg-table">TÊN HÀNG HÓA</th>
                                            <th scope="col" rowspan="2" class="bg-table">ĐVT</th>
                                            <th scope="col" rowspan="2" class="bg-table">SỐ LG</th>
                                            <th scope="col" rowspan="2" class="bg-table">SỐ LG HOÀN THÀNH</th>
                                            <th scope="col" colspan="4" class="bg-table">BVE</th>
                                            <th scope="col" rowspan="2" class="bg-table">Đ/GIÁ</th>
                                            <th scope="col" rowspan="2" class="bg-table">TÌNH TRẠNG</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="bg-table">LOẠI</th>
                                            <th scope="col" class="bg-table">TÊN FILE</th>
                                            <th scope="col" class="bg-table">VER</th>
                                            <th scope="col" class="bg-table">MSBV</th>
                                        </tr>
                                    </thead>
';

$output .= '<tbody id="load_data" style="text-align: left;">';
if($sql != null && mysqli_num_rows($sql)>0)
{
    $i=0;
	
	$total_rowspan_employer_old = 0;
	$total_rowspan_employer = 0;
	
	$total_rowspan_seri_old = 0;
	$total_rowspan_seri = 0;
	
	$total_rowspan_product_old = 0;
	$total_rowspan_product = 0;
	
	$old_employer = -1;
	
	$allStatusRow = getAllStatus();
    while($rows = mysqli_fetch_array($sql))
    {
        $i++;
	
	$rowspan = countRowspanBasedOnId(
		1,//$rows['nameEmployer'], 
		1,//$rows['seri_id'], 
		1,//$rows['dProduct']
	);

	
	if ($total_rowspan_seri_old > 0) {
		$total_rowspan_seri_old = $total_rowspan_seri_old - 1;
	}
	$total_rowspan_seri = 1;
	//$total_rowspan_seri = $rowspan["rspan_seri"];

	
	if ($total_rowspan_product_old > 0) {
		$total_rowspan_product_old = $total_rowspan_product_old - 1;
	}

	$total_rowspan_product = 1;
	//$total_rowspan_product = $rowspan["rspan_product"];

	$output .='
        <tr class="load_data_employer_io">';
        //if ($total_rowspan_seri_old == 0) $output .='<td rowspan="'.($total_rowspan_seri==0?1:$total_rowspan_seri).'">'.$rows['serinumber'].'</td>';
        if ($total_rowspan_seri_old == 0) $output .='<td style = "text-align:center;"  rowspan="'.($total_rowspan_seri==0?1:$total_rowspan_seri).'">'.$rows['nameEmployer'].'</td>';
        if ($total_rowspan_seri_old == 0) $output .='<td style = "text-align:center;"  rowspan="'.($total_rowspan_seri==0?1:$total_rowspan_seri).'">'.$rows['serinumber'].'</td>';
        if ($total_rowspan_product_old == 0) $output .='<td rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['nameProduct'].'</td>';
        if ($total_rowspan_product_old == 0) $output .='<td style = "text-align:center;" rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['dvtProduct'].'</td>';
		if ($total_rowspan_product_old == 0) $output .='<td style = "text-align:center;" rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['nicknamePicrureFree'].'</td>';
        if ($total_rowspan_product_old == 0) $output .='<td contenteditable="true" id = "'.$rows['idProduct'].'" onblur="updateFinishQuantaty('.$rows['idProduct'].');" style = "text-align:center;" rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['quantityPicture'].'</td>';

        $output .='<td style = "text-align:center;" >'.$rows['typePictureFree'].'</td>';
        $output .='<td><a href="../uploadPicture/'.$rows['namePicrureFree'].'"  target=blank>'.$rows['namePicrureFree'].'</a></td>';
        $output .='<td style = "text-align:center;" >'.$rows['verPictureFree'].'</td>';
        $output .='<td>'.$rows['msPicrureFree'].'</td>';
        if ($total_rowspan_product_old == 0) $output .='<td style = "text-align:center;"  rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['priceProduct'].'</td>';
		$output .='<td>
			<select name="inprogress" id="inprogress"  onchange="doUpdateInprogress($(this).val()'.','.$rows['seri_id'].','.$rows['idProduct'].');">';
			for ($i = 0; $i < count($allStatusRow); $i++) {
				$selected = "";
				if ($rows['workStatus'] == $allStatusRow[$i]["id"]) {
					$selected = "selected";
				}
				$output .= '<option value="'.$allStatusRow[$i]["id"].'" '.$selected.'>'.$allStatusRow[$i]["workStatus"].'</option>';
			}

		$output .='</select></td>';
		$output .='</tr>';
		
		if ($total_rowspan_seri_old == 0)     $total_rowspan_seri_old     = $total_rowspan_seri;
		if ($total_rowspan_product_old == 0)  $total_rowspan_product_old  = $total_rowspan_product;
			
    }
} else{
    $output .='<td colspan="9">Không có dữ liệu</td>';
}

$output .='</table>
</div>';
echo $output;
