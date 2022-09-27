const InitProduct = new init();
const url = "../ajax/addProduct.ajax.php"
$(document).ready(function(){
    addProduct();
    deleteProduct();
    updateProduct();
    $(document).on("click","#closeAddEmployer",handleAfter);
    $(document).on("click",".close",handleAfter);
})

const getDataEmployer = ()=>{
    let arrItem = ["nameProduct","priceProduct","dvtProduct","vatProduct"];
    let data = InitProduct.getData(arrItem);
    return data;
}

const addProduct = ()=>{
    $(document).on("click","#btnAddProduct",function(){
        let data = getDataEmployer();
        console.log(data);
        InitProduct.hanldeAjax(url,"post",data,handelSuccess);
    })
}

const deleteProduct = ()=>{
    $(document).on("click","#btnDeleteProduct",function(){
        let idProduct = $(this).attr("data-id_delete_employer");
        InitProduct.hanldeAjax(url,"post",{idProduct : idProduct},handelSuccess);
    })
}
const handelSuccess = (res)=>{
    let data = JSON.parse(res);
    if(data == "204"){
        alert("Sản phẩm đã tồn tại trong hệ thống !!!");
    }else{
        $("#bodyEmployer").html(data);
        $("#closeAddEmployer").click();
    }
 }
 const updateProduct = ()=>{
     $(document).on("click","#btnUpdate",function(){
          let idProduct = $(this).attr("data-id_update_employer");
          window.sessionStorage.setItem("idProduct",idProduct);
          let nameProduct = $($(this).parent().parent().children()[0]).text();
          let priceProduct = $($(this).parent().parent().children()[1]).text();
          let dvtProduct = $($(this).parent().parent().children()[2]).text();
          let vatProduct = $($(this).parent().parent().children()[3]).text();
          showValue(nameProduct,priceProduct,dvtProduct,vatProduct);
     })
     $(document).on("click","#btnUpdateProduct",function(){
         let idProduct  = window.sessionStorage.getItem("idProduct");
         let data = getDataEmployer();
         let dataUpdate = {
             ...data,
             idProduct : idProduct
         }
         InitProduct.hanldeAjax(url,"post",dataUpdate,handelSuccess,null,handleAfter,null);
     })
 }
 const showValue = (nameProduct,priceProduct,dvtProduct,vatProduct)=>{
       $("#nameProduct").val(nameProduct);
       $("#priceProduct").val(priceProduct);
       $("#dvtProduct").val(dvtProduct);
       $("#vatProduct").val(vatProduct);
       $("#exampleModalLongTitle").text("Sửa sản phẩm");
       setButton();
 }
 const setButton = ()=>{
     $("#btnAddProduct").hide();
     $("#btnUpdateProduct").show();
 }
 const handleAfter = ()=>{
    $("#btnAddProduct").show();
    $("#btnUpdateProduct").hide();
    $("#nameProduct").val("");
    $("#priceProduct").val("");
    $("#dvtProduct").val(0);
    $("#vatProduct").val("");
    $("#exampleModalLongTitle").text("Thêm sản phẩm");
 }