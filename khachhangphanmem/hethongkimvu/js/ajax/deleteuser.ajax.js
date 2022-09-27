$(document).ready(function(){
    $(document).on('click','.delete_user',function()
    {
		var r = confirm("Bạn có chắc muốn xóa không?");
		if (r == true) {
		} else {
			return;
		}
        var id = $(this).data('id_delete_user');
        $.ajax({
            url:"../module/deleteuser.module.php",
            method:"POST",
            data:{
                id_user:id
            },
            success:function()
            {
               alert('Xóa thành công');
               readData();
                
            }
        });
        readData();

    });
    function readData()
    {
        $.ajax({
            url:"../module/readuser.module.php",
            method:"POST",
            success:function(data)
           {
            $('#load_data_user').html(data);
           }
        });
    }
    readData();
})