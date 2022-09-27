<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

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

$mysqli2 = new mysqli("localhost","root","Keri2021@","hpspicture");
$sqlrowspan = mysqli_query($mysqli2, $sql_query);

if($sqlrowspan != null && mysqli_num_rows($sqlrowspan)>0)
{
    return mysqli_fetch_array($sqlrowspan);
}
return array("rspan_employer"=>1,"rspan_cn" => 1,  "rspan_seri"=>1, "rspan_category"=>1, "rspan_product"=>1);
}

$employerchoosed = $_POST['employer'];
$workStatus = $_POST['workStatus'];
$workstatusWhereCondition =  " AND p.workStatus = '$workStatus' ";
if ($workStatus == "") {
	$workstatusWhereCondition =  " ";
}

$querysql = "
SELECT 
e.idEmployer 	as employer_employer
,e.nameEmployer

,s.seri_id as seri_seri_id 
,s.serinumber
,s.idEmployer

,p.idPicture
,p.idCustomer 
,p.dvhNumber 
,p.idProject as product_idProduct
,p.quantityPicture 
,p.pricePicture 
,p.vatPicture 	
,p.workStatus 	

,pf.namePicrureFree		
,pf.corePictureFree		
,pf.msPicrureFree		
,pf.verPictureFree		
,pf.typePictureFree		
,pf.nicknamePicrureFree

,prd.nameProduct
,prd.dvtProduct


FROM employer e
LEFT JOIN tbl_keri_seri s ON e.idEmployer = s.idEmployer
LEFT JOIN tbl_keri_picture p ON s.seri_id = p.dvhNumber
LEFT JOIN tbl_keri_picture_free pf ON p.idPictureFree = pf.idPictureFree
INNER JOIN tbl_keri_product prd ON prd.idProduct = p.idProject
WHERE e.idEmployer = '$employerchoosed'".$workstatusWhereCondition.
"ORDER BY 
e.idEmployer,
s.seri_id,  
p.idProject, 
pf.typePictureFree, pf.msPicrureFree
DESC;";
$mysqli2 = new mysqli("localhost","root","Keri2021@","hpspicture");
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
                                            <th scope="col" colspan="5" class="bg-table">BVE</th>
                                            <th scope="col" rowspan="2" class="bg-table">Đ/GIÁ</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="bg-table">LOẠI</th>
                                            <th scope="col" class="bg-table">TÊN GỢI NHỚ</th>
                                            <th scope="col" class="bg-table">TÊN FILE</th>
                                            <th scope="col" class="bg-table">VER</th>
                                            <th scope="col" class="bg-table">MSBV</th>
                                            <th scope="col" class="bg-table" colspan="2">TÌNH TRẠNG</th>
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
    while($rows = mysqli_fetch_array($sql))
    {
        $i++;
	
	$rowspan = countRowspanBasedOnId(
		$rows['employer_employer'], 
		$rows['seri_seri_id'], 
		$rows['product_idProduct']
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
        if ($total_rowspan_product_old == 0) $output .='<td style = "text-align:center;" rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['quantityPicture'].'</td>';


        $output .='<td style = "text-align:center;" >'.$rows['typePictureFree'].'</td>';
        $output .='<td>'.$rows['nicknamePicrureFree'].'</td>';
        $output .='<td><a href="../uploadPicture/'.$rows['namePicrureFree'].'"  target=blank>'.$rows['namePicrureFree'].'</a></td>';
        $output .='<td style = "text-align:center;" >'.$rows['verPictureFree'].'</td>';
        $output .='<td>'.$rows['msPicrureFree'].'</td>';
        if ($total_rowspan_product_old == 0) $output .='<td style = "text-align:center;"  rowspan="'.($total_rowspan_product==0?1:$total_rowspan_product).'">'.$rows['pricePicture'].'</td>';
		if ($workStatus == "") { // View all and can not update
			if ($rows['workStatus'] == 0) {
				$output .='<td>ĐANG LÀM</td>';
			} else if ($rows['workStatus'] == 1) {
				$output .='<td>HOÀN THÀNH</td>';
			}
		} else {
			if ($rows['workStatus'] == 0) {
				$output .='<td>
				<select name="inprogress" id="inprogress"  onchange="doUpdateInprogress($(this).val()'.','.$rows['seri_seri_id'].','.$rows['product_idProduct'].');">
				<option value="0" selected>ĐANG LÀM</option>
				<option value="1">HOÀN THÀNH</option>
				</td>';
			} else if ($rows['workStatus'] == 1) {
				$output .='<td>
				<select name="inprogress" id="inprogress"  onchange="doUpdateInprogress($(this).val()'.','.$rows['seri_seri_id'].','.$rows['product_idProduct'].');">
				<option value="0">ĐANG LÀM</option>
				<option value="1" selected>HOÀN THÀNH</option>
				</td>';
			}
		}
		$output .='</tr>';
		
		if ($total_rowspan_seri_old == 0)     $total_rowspan_seri_old     = $total_rowspan_seri;
		if ($total_rowspan_product_old == 0)  $total_rowspan_product_old  = $total_rowspan_product;
			
    }

}
else{
    $output .='<td colspan="9">Không có dữ liệu</td>';
}

$output .='</table>
</div>';
echo $output;
