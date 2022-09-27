<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
require_once '../module/connectDB/connectdb.module.php';
require_once '../module/connectDB/connect.php';

$output = '';
$sql = mysqli_query($mysqli,"SELECT * FROM `tbl_user` ORDER BY 'id_user' DESC");
$output .='
<div class="card-body" id="load_data_user">
<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">STT</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Password</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col" style="text-align:right;">Action</th>
        </tr>
    </thead>
';
if(mysqli_num_rows($sql)>0)
{
    $i = 0;
    while($rows = mysqli_fetch_array($sql))
    {
        $i++;
		if (isset($_SESSION['company_member']) && ($_SESSION['company_member']["name_user"] == "admin" || $_SESSION['company_member']["name_user"] == "nhphuong")) {
        $output .='
			<tbody id="load_data">
			
			<tr class="load_data_user_io">
				<td>'.$i.'</td>
				<td contenteditable="true" id="name_user" data-name_user="'.$rows['name_user'].'" name="name_user" data-id="'.$rows['id_user'].'">'.$rows['name_user'].'</td>
				<td contenteditable="true" id="date_user" data-date_user="'.$rows['date_user'].'"name="date_user" data-id="'.$rows['id_user'].'">'.$rows['date_user'].'</td>
				<td contenteditable="true" id="address_user" data-address_user="'.$rows['address_user'].'"name="address_user" data-id="'.$rows['id_user'].'">'.$rows['address_user'].'</td>
				<td contenteditable="true" id="phone_user" data-phone_user="'.$rows['phone_user'].'"name="phone_user" data-id="'.$rows['id_user'].'">0'.$rows['phone_user'].'</td>
				<td style="text-align:right;"><button class="btn btn-primary update_user" id="btnUpdate" data-id_update_user="'.$rows['id_user'].'">Sửa</button>
				<button class="btn btn-warning delete_user "id="btnDelete" data-id_delete_user="'.$rows['id_user'].'">Xóa</button>
				</td>
			</tr>
		</tbody>
		';
		} else {
			        $output .='
			<tbody id="load_data">
			
			<tr class="load_data_user_io">
				<td>'.$i.'</td>
				<td contenteditable="true" id="name_user" data-name_user="'.$rows['name_user'].'" name="name_user" data-id="'.$rows['id_user'].'">'.$rows['name_user'].'</td>
				<td contenteditable="true" id="date_user" data-date_user="'.$rows['date_user'].'"name="date_user" data-id="'.$rows['id_user'].'">xxx</td>
				<td contenteditable="true" id="address_user" data-address_user="'.$rows['address_user'].'"name="address_user" data-id="'.$rows['id_user'].'">'.$rows['address_user'].'</td>
				<td contenteditable="true" id="phone_user" data-phone_user="'.$rows['phone_user'].'"name="phone_user" data-id="'.$rows['id_user'].'">0'.$rows['phone_user'].'</td>
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
