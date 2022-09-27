$(document).ready(function () {

        readData();

    $(document).on('click', '.update_product', function () {
        $("#btnUpdateProduct").show();
        $("#btnAddProduct").hide();
        let idProduct = $(this).attr("data-id_update_product");
        window.sessionStorage.setItem("idProduct", idProduct);

        let parent = $(this).parent().parent().children();
        let nameProduct = $(parent[1]).text();
        let priceProduct = $(parent[2]).text().split("VNĐ")[0].trim();
        let dtvProduct = $(parent[3]).text();
        let vatProduct = $(parent[4]).text();
        let idCategory = $(parent[5]).attr("data-product");



        $('#nameProduct').val(nameProduct);
        $('#priceProduct').val(priceProduct);
        $('#dvtProduct').val(dtvProduct);
        $('#vatProduct').val(vatProduct);
        $('#idCategory').val(idCategory);
    });

    $("#btnUpdateProduct").on('click', function (e) {
        e.preventDefault();
        var nameProduct = $('#nameProduct').val();
        var priceProduct = $('#priceProduct').val();
        var dvtProduct = $('#dvtProduct').val();
        var vatProduct = $('#vatProduct').val();
        var idCategory = $('#idCategory').val();
        var idProduct = sessionStorage.getItem("idProduct");
        let data = {
            nameProduct: nameProduct,
            priceProduct: priceProduct,
            dvtProduct: dvtProduct,
            idCategory: idCategory,
            idProduct: idProduct,
            vatProduct: vatProduct
        }
        $.ajax({
            url: "../module/editproduct.module.php",
            method: "POST",
            data: data,
            success: function (res) {
                readData();
            },
            fail: function (err) {
                console.log("loi ", err);
            }
        });
        reset();
    })
    $("#btnClose").on('click', function (e) {
        e.stopPropagation();
        reset();
    })

    setTimeout(()=>{
        const arrProduct = document.querySelectorAll('#load_data>tr');
        console.log(arrProduct);
        $(document).on('keyup', '#searchByProduct', function () {
            let key = $(this).val();
            let html = Array.from(arrProduct).filter(item => {
                return item.children[1].innerHTML.toUpperCase().includes(key.trim().toUpperCase());
            })
            $("#load_data").html(html);
        })

    },1000)


});

function reset() {
    $("#btnUpdateProduct").hide();
    $("#btnAddProduct").show();
    $('#nameProduct').val("");
    $('#priceProduct').val("");
    $('#dvtProduct').val(0);
    $('#idCategory').val(0);
}

function readData() {
    $.ajax({
        url: "../module/readproduct.module.php",
        method: "POST",
        success: function (data) {
            $('#load_data_product').html(data);
        }
    });
}