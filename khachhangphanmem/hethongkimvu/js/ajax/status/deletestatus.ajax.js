$(document).ready(function(){
    $(document).on('click','.btnDeleteStatus',function()
    {
        var id = $(this).data('id_delete_status');
		//alert(id);
		
		var r = confirm("Bạn có chắc muốn xóa không?");
		if (r == true) {
		} else {
			return;
		}
        $.ajax({
            url:"../module/status/deletestatus.module.php",
            method:"POST",
            data:{
                id_workStatus:id
            },
            success:function()
            {
                //alert('Xóa thành công');
            }
        });
        readData();

    });
    function readData()
    {
        $.ajax({
            url:"../module/status/readstatus.module.php",
            method:"POST",
            success:function(data)
           {
            $('#load_data_user').html(data);
           }
        });
    }
    readData();
})