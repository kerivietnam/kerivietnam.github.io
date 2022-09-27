<?php
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';
$output = '';
$sql = mysqli_query($mysqli,"SELECT * FROM `employer` ORDER BY 'idEmployer' DESC");
$output .='
<div class="card-body" id="load_data_employer">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Xem thông tin bảo trì</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
';
if(mysqli_num_rows($sql)>0)
{
    $i=0;
    while($rows = mysqli_fetch_array($sql))
    {
        $i++;
        $output .='
        <tbody id="load_data">
        <tr class="load_data_employer_io">
            <td>'.$i.'</td>
            <td contenteditable="true"id="name_employer"data-name_employer="'.$rows['nameEmployer'].'" name="nameEmployer" data-id="'.$rows['idEmployer'].'">'.$rows['nameEmployer'].'</td>
            <td><a href="formMainternanceAll.php">TT Bảo Trì</td>
            <td><button class="btn btn-primary update_employer" id="btnUpdate" data-id_update_employer="'.$rows['idEmployer'].'">Sửa</button>
            <button class="btn btn-warning delete_employer "id="btnDeleteEmployer" data-id_delete_employer="'.$rows['idEmployer'].'">Xóa</button>
            </td>
        </tr>
    </tbody>
    ';
    }

}
else{
    $output .='<td colspan="5">Không có dữ liệu</td>';
}

$output .='</table>
</div>';
echo $output;
