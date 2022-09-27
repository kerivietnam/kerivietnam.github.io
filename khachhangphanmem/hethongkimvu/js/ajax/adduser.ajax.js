
$(document).ready(function(){
    
    //thêm dữ liệu
    $('#btnAddUser').on('click',function(e){
        e.preventDefault();
        var name_user = $('#name_user').val();
        var date_user = $('#date_user').val();
        var address_user = $('#address_user').val();
        var phone_user = $('#phone_user').val();
        $.ajax({
            url:"../module/adduser.module.php",
            method:"POST",
            data:{
                name_user:name_user,
                date_user:date_user,
                address_user:address_user,
                phone_user:phone_user
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
            url:"../module/readuser.module.php",
            method:"POST",
            success:function(data)
           {
            $('#load_data_user').html(data);
           }
        });
    }
    readData();
    
});


