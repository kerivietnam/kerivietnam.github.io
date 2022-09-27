
$(document).ready(function(){
    $('#btnAddProduct').on('click',function(e){
        e.preventDefault();
        var nameProduct = $('#nameProduct').val();
        var priceProduct = $('#priceProduct').val();
        var dvtProduct = $('#dvtProduct').val();
        var idCategory = $('#idCategory').val();
        var vatProduct = $('#vatProduct').val();
        $.ajax({
            url:"../module/addproduct.module.php",
            method:"POST",
            data:{
                nameProduct:nameProduct,
                priceProduct:priceProduct,
                dvtProduct : dvtProduct,
                idCategory : idCategory,
                vatProduct : vatProduct
            },
            success:function(res)
            {
                console.log(res);
                alert('Thêm Sản phẩm thành công');
                readData();
            }
        });
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
    
});


