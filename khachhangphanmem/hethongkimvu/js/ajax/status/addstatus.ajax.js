
$(document).ready(function(){
    
    //thêm dữ liệu
    $('#btnAddUser').on('click',function(e){
        e.preventDefault();
        var workStatus = $('#workStatus').val();
		if (workStatus.trim() == "") {
			return;
		}
		//alert(workStatus);
        $.ajax({
            url:"../module/status/addstatus.module.php",
            method:"POST",
            data:{
                workStatus:workStatus
            },
            success:function()
            {
                alert('Thêm thành công');
                readData();
            }
        });
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
    
});


