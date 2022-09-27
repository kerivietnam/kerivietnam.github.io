
$(document).ready(function(){
    $(document).on('click','.update_user',function()
    {
        var name_user = $(this).closest('.load_data_user_io').find('td:nth-child(2)').text();
        $('#name_user').val(name_user);
        var date_user = $(this).closest('.load_data_user_io').find('td:nth-child(3)').text();
        $('#date_user').val(date_user);
        console.log(date_user);
        var address_user = $(this).closest('.load_data_user_io').find('td:nth-child(4)').text();
        $('#address_user').val(address_user);
        var phone_user = $(this).closest('.load_data_user_io').find('td:nth-child(5)').text();
        $('#phone_user').val(phone_user);

      
        var id_user = $(this).attr('data-id_update_user');

        let data = {
            id_user:id_user,
            name_user:name_user,
            date_user:date_user,
            address_user:address_user,
            phone_user:phone_user
        }
        $.ajax({
            url:"../module/edituser.module.php",
            method:"POST",
            data:data,
            success:function()
            {
               console.log(data);
                readData();
                
            }
        });
       

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