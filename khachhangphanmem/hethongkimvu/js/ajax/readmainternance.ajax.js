
$(document).ready(function(){
    
    //thêm dữ liệu
    $('#btnAddEmployer').on('click',function(e){
        e.preventDefault();
        var nameEmployer = $('#nameEmployer').val();
        var addressEmployer = $('#addressEmployer').val();
        var phoneEmployer = $('#phoneEmployer').val();
        
        $.ajax({
            url:"../module/addemployer.module.php",
            method:"POST",
            data:{
                nameEmployer:nameEmployer,
                addressEmployer:addressEmployer,
                phoneEmployer:phoneEmployer
            },
            success:function()
            {
                alert('Thêm Khách hàng thành công');
                readData();
            }
            
        });

    });
	
    readData();
});


