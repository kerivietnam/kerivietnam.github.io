<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

$output = '';
$sql = mysqli_query($mysqli,"SELECT * FROM `tbl_keri_product` INNER JOIN tbl_keri_category ON tbl_keri_product.idCategory = tbl_keri_category.idCategory ORDER BY `tbl_keri_product`.`idProduct` ASC");
$output .='
<div class="card-body" id="load_data_product">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Đơn vị tính</th>
            <th scope="col">VAT</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
';
if(mysqli_num_rows($sql)>0)
{
    $i = 0;
    $output .= ' <tbody id="load_data">';
    while($rows = mysqli_fetch_array($sql))
    {
        $i++;
        $output .='
        <tr class="load_data_product_io">
            <td>'.$i.'</td>
            <td  id="nameproduct" data-product="'.$rows['nameProduct'].'" name="name_product" data-id="'.$rows['idProduct'].'">'.$rows['nameProduct'].'</td>
            <td  id="priceproduct" data-product="'.$rows['priceProduct'].'"name="price_product" data-id="'.$rows['idProduct'].'">'.$rows['priceProduct'].' VNĐ</td>
            <td  id="dvtproduct" data-product="'.$rows['dvtProduct'].'"name="dvt_product" data-id="'.$rows['idProduct'].'">'.$rows['dvtProduct'].'</td>
            <td  id="dvtproduct" data-product="'.$rows['vatProduct'].'"name="vatproduct" data-id="'.$rows['idProduct'].'">'.$rows['vatProduct'].'</td>
            <td  id="dvtproduct" data-product="'.$rows['idCategory'].'"name="dvt_product" data-id="'.$rows['idProduct'].'">'.$rows['categoryName'].'</td>
            <td><button class="btn btn-primary update_product" id="btnUpdate" data-id_update_product="'.$rows['idProduct'].'">Sửa</button>
            <button class="btn btn-warning delete_product "id="btnDelete" data-id_delete_product="'.$rows['idProduct'].'">Xóa</button>
            </td>
        </tr>
    ';
    }
    $output .= '</tbody>';

}
else{
    $output .='<td colspan="4">Không có dữ liệu</td>';
}

$output .='</table>
</div>';
echo $output;
