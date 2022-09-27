<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
require_once '../connectDB/connectdb.module.php';
require_once '../connectDB/connect.php';

$output = '';
$sql = mysqli_query($mysqli,"SELECT * FROM `tbl_keri_workstatus` ORDER BY 'id' DESC");
$output .='
<div class="card-body" id="load_data_user">
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">STT</th>
            <th scope="col">Tên gọi</th>
            <th scope="col"  style="text-align:right;">Action</th>
        </tr>
    </thead>
';
if(mysqli_num_rows($sql)>0)
{
    $i = 0;
    while($rows = mysqli_fetch_array($sql))
    {
        $i++;
		if (isset($_SESSION['company_member'])) {
        $output .='
			<tbody id="load_data">
			
			<tr class="load_data_user_io">
				<td>'.$i.'</td>
				<td contenteditable="true" id="workStatus" data-workStatus="'.$rows['workStatus'].'" name="workStatus" data-id="'.$rows['id'].'">'.$rows['workStatus'].'</td>
				<td  style="text-align:right;"><button class="btn btn-primary btnUpdateStatus" id="btnUpdate" data-id_update_status="'.$rows['id'].'">Sửa</button>
				<button class="btn btn-warning btnDeleteStatus "id="btnDelete" data-id_delete_status="'.$rows['id'].'">Xóa</button>
				</td>
			</tr>
		</tbody>
		';
		} else {
			        $output .='
			<tbody id="load_data">
			
			<tr class="load_data_user_io">
				<td>'.$i.'</td>
				<td contenteditable="true" id="workStatus" data-workStatus="'.$rows['workStatus'].'" name="workStatus" data-id="'.$rows['id'].'">'.$rows['workStatus'].'</td>
				<td>
				</td>
			</tr>
		</tbody>
		';
		}
    }

}
else{
    $output .='<td colspan="5">Không có dữ liệu</td>';
}

$output .='</table>
</div>';
echo $output;
