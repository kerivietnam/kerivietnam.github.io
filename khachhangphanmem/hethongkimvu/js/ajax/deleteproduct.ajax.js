$(document).ready(function(){
    $(document).on('click','.delete_product',function()
    {
        var id = $(this).attr('data-id_delete_product');
        $.ajax({
            url:"../module/deleteproduct.module.php",
            method:"POST",
            data:{
                idProduct:id
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
            url:"../module/readproduct.module.php",
            method:"POST",
            success:function(data)
           {
            $('#load_data_product').html(data);
           }
        });
    }
    readData();
})