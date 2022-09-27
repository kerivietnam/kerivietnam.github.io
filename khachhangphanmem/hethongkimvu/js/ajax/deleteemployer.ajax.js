$(document).ready(function(){
    $(document).on('click','.delete_employer',function()
    {
        var id = $(this).attr('data-id_delete_employer');
        $.ajax({
            url:"../module/deleteemployer.module.php",
            method:"POST",
            data:{
                idEmployer:id
            },
            success:function()
            {
                alert('Xóa thành công');
            }
        });
        readData();

    });
    function readData()
    {
        $.ajax({
            url:"../module/reademployer.module.php",
            method:"POST",
            success:function(data)
           {
            $('#load_data_employer').html(data);
           }
        });
    }
    readData();
})